<?php

include "../../database/DBConnect.php";
include "../../database/UserDB.php";
include "../../class/User.php";
include "../../class/UserManager.php";


$id = (int)$_GET['id'];
$userManager = new UserManager();
$user = $userManager->getUserID($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once "uploadImage.php";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    if ($_FILES['image']['type'] == "") {
        $image = $user->getImage();
    } else {
        unlink("../../images/" . $user->getImage());
        $image = date("H:m:s") . $_FILES['image']['name'];
    }
    $userManager->edit($id, $name, $age, $address, $image);
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

        img {
            width: 70px;
            height: 70px;
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
        <h1>EDIT USER:</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>User name: </label>
                <input type="text" class="form-control" name="name" value="<?php echo $user->getName(); ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Age: </label>
                <input type="number" class="form-control" name="age" value="<?php echo $user->getAge(); ?>">
            </div>
        </div>
        <div class="form-group">
            <label>Address: </label>
            <input type="text" class="form-control" placeholder="1234 Main St" name="address"
                   value="<?php echo $user->getAddress(); ?>">
        </div>
        <div>
            <label>Image: </label>
            <img src='../../images/<?php echo $user->getImage(); ?>'>
            <input type="file" class="form-control" value="Upload" name="image">
        </div>
        <button type="submit" class="btn btn-outline-success" onclick="return confirm('bạn có chắc chắn muốn sửa ?')">Edit</button>
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
