<?php

function getConfirmCarts(){
    $sql = "SELECT * from confirm_carts";
    return getAssocResult($sql);
}

function aproveCart($id){
    $id = (int)$id;
    $sql = "UPDATE confirm_carts set status = 'approved' where id = $id";
    return executeQuery($sql);
}
function disaproveCart($id){
    $id = (int)$id;
    $sql = "UPDATE confirm_carts set status = 'disapproved' where id = $id";
    return executeQuery($sql);
}
function getCartStatus($id){
    $sql = "SELECT status from confirm_carts where id = $id";
    return getAssocResult($sql)[0]['status'];


}
