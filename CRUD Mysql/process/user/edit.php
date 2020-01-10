<?php
include_once "../../database/DBconnect.php";
include_once "../../database/ProductDB.php";
include_once "../../class/ProductManager.php";
include_once "../../class/Product.php";

$id = (int)$_GET['id'];
$productManager = new ProductManager();
$product = $productManager->getProductID($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quanlity = $_POST['quanlity'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $productManager->edit ($id, $name, $type, $price, $quanlity, $date, $description);
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

    <form method="post" >
        <h1>ADD USER:</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="<?php echo $product->getName()?>">
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1"> Loại hàng</label>
            <select name="type" class="form-control" id="exampleFormControlSelect1">
                <option value="<?php echo $product->getType()?>"><?php echo $product->getType()?></option>
                <option value="Điện thoại">Điện thoại</option>
                <option value="Điều hòa">Điều hòa</option>
                <option value="Tủ lạnh">Tủ Lạnh</option>

            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Gia</label>
                <input type="number" class="form-control" name="price" value="<?php echo $product->getPrice() ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>So luong</label>
                <input type="number" class="form-control" name="quanlity" value="<?php echo $product->getQuanlity() ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Ngay nhap</label>
                <input type="text" class="form-control" name="date" value="<?php echo $product->getDate()?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Mo ta</label>
                <input type="text" class="form-control" name="description" value="<?php echo $product->getDescription() ?>">
            </div>
        </div>


        <br>
        <button type="submit" class="btn btn-outline-success">Edit</button>
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
