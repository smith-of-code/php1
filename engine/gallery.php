<?php
function getGallery($folder){
    $sql = "SELECT * FROM gallery ORDER BY `views` DESC";
    $images = getAssocResult($sql);
    return $images;
}

function getGalleryItem($id){
    $id = (int)$id;

    executeQuery("UPDATE `gallery` SET `views` = `views`+1 WHERE `gallery`.`id` = {$id}");

    $sql = "SELECT * FROM gallery WHERE id = {$id}";

    $image = getAssocResult($sql);

    $result = [];
    if(isset($image[0]))
        $result = $image[0];

    return $result;
}