<?php
function getCatalog(){
    $sql = "SELECT * FROM products";
    $catalog = getAssocResult($sql);
    return $catalog;
}

function getProduct($id){
    $sql = "SELECT * FROM  products where id = '$id'";
    $product = getAssocResult($sql);
    $result = [];
    if(isset($product[0]))
        $result = $product[0];
    return $result;
}
