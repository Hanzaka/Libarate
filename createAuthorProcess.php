<?php
include "connection.php";

$author = $_POST["author"];

if (empty($author)) {
    echo ("Please Enter Author Name");
} else {
    $resultSet = Database::search("SELECT * FROM `author` WHERE `author_name`='$author' ");
    $numOfRows = $resultSet->num_rows;

    if ($numOfRows > 0) {
        echo ("Author Already Exsist");
    } else {
        Database::iud("INSERT INTO `author`(`author_name`) VALUES('$author')");
        echo ("Success");
    }
}