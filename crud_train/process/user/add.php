<?php
include_once "../../database/DBConnect.php";
include_once "../../database/UserDB.php";
include_once "../../class/User.php";
include_once "../../class/UserManager.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once "uploadImage.php";
    $username = $_POST['username'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    if ($_FILES['image']['type'] == "") {
        $avatar = "user.jpeg";
    } else {
        $avatar = date("H:m:s").$_FILES['image']['name'];
    }
    $userManager = new UserManager();
    $user = new User(null, $username, $age, $address, $avatar);
    $userManager->add($user);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <h1>Add User</h1>
    <label>User Name</label>
    <input type="text" name="username">

    <label>Age</label>
    <input type="number" name="age">

    <label>Address</label>
    <input type="text" name="address">

    <label>Avatar</label>
    <input type="file" value="Upload" name="image">
<div>
    <button type="submit">Add</button>
</div>
</form>

</body>
</html>