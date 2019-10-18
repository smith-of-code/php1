<?php
function getAllfeedback(){
    $sql ='SELECT * FROM feedback';
    $allFeedback = getAssocResult($sql);
    return $allFeedback;
}

function getFeedback($id){
    $sql = "SELECT * FROM  feedback where product_id = '$id'";
    return getAssocResult($sql);
}
function addFeedback($id){
    $id = (int)$id;
    $name = $_POST['name'];
    $content = $_POST['content'];

    $sql = "INSERT INTO `feedback` (`id`, `product_id`, `name`, `content`, `date`) VALUES (NULL, $id, '$name', 
    '$content', CURRENT_DATE()); ";
    executeQuery($sql);
    $redicet = $_SERVER['HTTP_REFERER'];
    header ("Location: $redicet");
}

