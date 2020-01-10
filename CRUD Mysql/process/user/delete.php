<?php
include_once "../../database/DBconnect.php";
include_once "../../database/ProductDB.php";
include_once "../../class/ProductManager.php";
include_once "../../class/Product.php";

$id = $_GET['id'];
$productManager = new ProductManager();
$productManager->delete($id);
header("location: ../../index.php");