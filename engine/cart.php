<?php
function getCart() {
    $session_id = session_id();
    $sql = "SELECT 
       cart.id as id,
       cart.count as count,
       products.id as product_id,
       products.name as name,
       products.image as image,
       products.price as price 
            FROM cart, products WHERE cart.product_id = products.id and session_id = '$session_id'";
    $result = getAssocResult($sql);
    return $result;
}

function getCartCount() {
    $session_id = session_id();
    $sql ="SELECT SUM(count) from cart WHERE session_id = '$session_id'";
    $sum = getAssocResult($sql);

    return $sum[0]['SUM(count)'];

}

function addToCart($id) {
    $id = (int)$id;
    $session_id = session_id();

    $sql = "select * from cart where session_id = '$session_id' and product_id = $id";

    if (empty(getAssocResult($sql))) {
        $sql = "INSERT INTO cart (session_id, product_id, count) value ('$session_id', $id, 1)";
        executeQuery($sql);
    } else {
        $sql = "UPDATE `cart` SET `count` = `count`+1 WHERE `cart`.`product_id` = $id";
        executeQuery($sql);
    }
}

function deleteFromCart($id){
    $id = (int)$id;
    $session_id = session_id();

    $sql = "select * from cart where session_id = '$session_id' and id = $id";
var_dump(getAssocResult($sql));
    if (getAssocResult($sql)[0]['count'] > 1) {
        $sql = "UPDATE `cart` SET `count` = `count`-1 WHERE `cart`.`id` = $id";
        executeQuery($sql);
    } else {
        $sql = "DELETE FROM cart WHERE id = $id";
        executeQuery($sql);
    }
}

function confirmCart($data){
    $session_id = session_id();

    $sql = "INSERT INTO confirm_carts (session_id, phone) value ('$session_id','{$data['phone']}' )";
    executeQuery($sql);
    return 'Заказ подтвержден';

}