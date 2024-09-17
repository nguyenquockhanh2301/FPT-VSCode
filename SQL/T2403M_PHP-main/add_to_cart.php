<?php 
session_start();
$id = $_POST["id"];
$buy_qty = $_POST["buy_qty"];

if(isset($_SESSION["cart"]))
    $cart = $_SESSION["cart"];
else
    $cart = [];

if(isset($cart[$id])){
    $cart[$id] += $buy_qty;
}else{
    $cart[$id] = $buy_qty;
}
// save cart to session
$_SESSION["cart"] = $cart;

header("Location: product.php?id=$id");