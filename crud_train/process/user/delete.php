<?php

include_once "../../database/DBConnect.php";
include_once "../../database/UserDB.php";
include_once "../../class/UserManager.php";
include_once "../../class/User.php";

$id = $_GET['id'];
$userManager = new UserManager();
//$user = $userManager->getUserID($id);
//unlink("../../images/".$user->getAvatar());
$userManager->delete($id);
header("location:../../index.php");