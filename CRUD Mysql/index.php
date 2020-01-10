<?php

include_once "database/DBconnect.php";
include_once "database/ProductDB.php";
include_once "class/ProductManager.php";
include_once "class/Product.php";

$productManager = new ProductManager();
$products = $productManager->getList();

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
        table, tr, td, th{
            text-align: center;
        }
        img {
            width: 60px;
            height: 60px;
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
                    <a class="nav-link" href="process/user/add.php">Add</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <form action="" method="POST" enctype="multipart/form-data" >
        <h1 style="color: #cccccc; font-family: sans-serif ">List User: </h1>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên hàng</th>
                <th scope="col">Loại hàng</th>
                <th scope="col">Số lượng </th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Mô tả</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product->getID(); ?></td>
                    <td><?php echo $product->getName(); ?></td>
                    <td><?php echo $product->getType(); ?></td>
                    <td><?php echo $product->getQuanlity(); ?></td>

                    <td>
                        <a href="process/user/delete.php?id=<?php echo $product->getID(); ?>">
                            <button type="button" class="btn btn-outline-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</button>
                        </a>
                        <a href="process/user/edit.php?id=<?php echo $product->getID(); ?>">
                            <button type="button" class="btn btn-outline-success">Edit</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
