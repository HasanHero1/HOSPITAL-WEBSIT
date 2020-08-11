<?php
    include_once 'database/connect.php';

    $table1 ="admin";
    $table2 ="categorie";
    $table3 ="product";

    $sql ="CREATE TABLE $table1(
        id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        mobile VARCHAR(255) NOT NULL,
        details VARCHAR(255) NOT NULL,
        )";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo "Table1 Created Successfully";
    }
    else{
        echo "Table1 does not create".mysqli_error($conn);
    }
    mysqli_close($conn);

    $sql ="CREATE TABLE $table1(
        id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cat_name VARCHAR(255) NOT NULL,
        status VARCHAR(255) NOT NULL,
        details VARCHAR(255) NOT NULL,
        )";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo "Table1 Created Successfully";
    }
    else{
        echo "Table1 does not create".mysqli_error($conn);
    }
    mysqli_close($conn);

    $sql ="CREATE TABLE $table1(
        id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cat_name VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        code VARCHAR(255) NOT NULL,
        mrp VARCHAR(255) NOT NULL,
        price VARCHAR(255) NOT NULL,
        qty VARCHAR(255) NOT NULL,
        image VARCHAR(255) NOT NULL,
        status VARCHAR(255) NOT NULL,
        product_desc VARCHAR(255) NOT NULL,
        )";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo "Table1 Created Successfully";
    }
    else{
        echo "Table1 does not create".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
