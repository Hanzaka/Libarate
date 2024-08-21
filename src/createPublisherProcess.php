<?php
include "connection.php";

$publisher = $_POST["publisher"];

if (empty($publisher)) {
    echo ("Please Enter Publisher Name");
} else {
    $resultSet = Database::search("SELECT * FROM `publisher` WHERE `name`='$publisher' ");
    $numOfRows = $resultSet->num_rows;

    if ($numOfRows > 0) {
        echo ("Publisher Already Exsist");
    } else {
        Database::iud("INSERT INTO `publisher`(`name`) VALUES('$publisher')");
        echo ("Success");
    }
}