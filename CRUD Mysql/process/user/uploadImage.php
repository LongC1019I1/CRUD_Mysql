<?php

    $file_name = $_FILES['avatar']['name'];
    $file_tmp = $_FILES['avatar']['tmp_name'];
    $file_type = $_FILES['avatar']['type'];
    $file_ext = strtolower(end(explode('/', $_FILES['avatar']['type'])));
    $ext = ["jpg", "png", "jpeg"];
    if (in_array($file_ext, $ext)) {
        move_uploaded_file($file_tmp, "../../images/" . date("H:m:s") . $file_name);
        echo "<script> alert('success')</script>";
    }
