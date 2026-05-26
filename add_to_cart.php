<?php
session_start();

if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

$product = array(
    "id" => $_POST['id'],
    "name" => $_POST['name'],
    "price" => $_POST['price'],
    "image" => $_POST['image']
);

$_SESSION['cart'][] = $product;

header("Location: cart.php");
exit();
?>