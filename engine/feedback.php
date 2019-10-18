<?php
function getAllfeedback(){
    $sql ='SELECT * FROM feedback';
    $allFeedback = getAssocResult($sql);
    return $allFeedback;
}

function doFeedbackAction($id, $action = 'read'){
    $id = (int)$id;

    if ($action === 'add'){
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $content = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['content'])));

        $sql = "INSERT INTO `feedback` (`id`, `product_id`, `name`, `content`, `date`) VALUES (NULL, $id, '$name', 
    '$content', CURRENT_DATE()); ";

        executeQuery($sql);

        $redicet = $_SERVER['HTTP_REFERER'];
        header ("Location: $redicet");
    }
    if ($action === 'delete'){
        $sql = "DELETE FROM `feedback` where id = $id";
        executeQuery($sql);
        $redicet = $_SERVER['HTTP_REFERER'];
        header ("Location: $redicet");
    }
    if ($action === 'update'){

    }
    if ($action === 'read'){
        $sql = "SELECT * FROM  feedback where product_id = '$id'";
        return getAssocResult($sql);
    }

}