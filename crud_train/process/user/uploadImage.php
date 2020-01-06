<?php

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('/', $_FILES['image']['type'])));
    $ext = ["jpg", "png", "jpeg"];
    if (in_array($file_ext, $ext)) {
        move_uploaded_file($file_tmp, "../../images/" . date("H:m:s") . $file_name);
        echo "<script> alert('success')</script>";
    }
