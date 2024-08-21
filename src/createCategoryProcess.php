<?php
include "connection.php";

$category = $_POST["category"];

if (empty($category)) {
    echo ("Please Enter Category Name");
} else {
    $resultSet = Database::search("SELECT * FROM `category` WHERE `category_name`='$category' ");
    $numOfRows = $resultSet->num_rows;

    if ($numOfRows > 0) {
        echo ("Category Already Exsist");
    } else {
        Database::iud("INSERT INTO `category`(`category_name`) VALUES('$category')");
        echo ("Success");
    }
}