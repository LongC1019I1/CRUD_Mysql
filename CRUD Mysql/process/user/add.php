<?php
include_once "../../database/DBconnect.php";
include_once "../../database/ProductDB.php";
include_once "../../class/ProductManager.php";
include_once "../../class/Product.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    if ($_FILES['avatar']['type'] == "") {
        $avatar = "user.jpeg";
    } else {
        $avatar = date("H:m:s").$_FILES['avatar']['name'];
    }
    $userManager = new ProductManager();
    $user = new Product(null, $username, $age, $address, $avatar);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        h1 {
            color: #cccccc;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">User Manager</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php"> Home </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <form method="post" enctype="multipart/form-data">
        <h1>ADD USER:</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tên</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
                <label>Loại hàng </label>
                <input type="text" class="form-control" name="type">
            </div>

            <div class="form-group col-md-6">
                <label>Loại hàng </label>
                <input type="text" class="form-control" name="type">
            </div>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="1234 Main St" name="address">
        </div>
        <div>
            <label>Avatar</label>
            <input type="file" class="form-control" value="Upload" name="avatar">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Add</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
</body>
</html>