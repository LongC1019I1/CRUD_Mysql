<?php
include_once "../../database/DBconnect.php";
include_once "../../database/ProductDB.php";
include_once "../../class/ProductManager.php";
include_once "../../class/Product.php";

$id = $_GET['id'];
$userManager = new ProductManager();
$user = $userManager->getUserID($id);
unlink("../../images/".$user->getAvatar());
$userManager->delete($id);
header("location: ../../index.php");