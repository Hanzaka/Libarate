<?php
include "connection.php";

$id = $_GET["id"];

$resultSet = Database::search("SELECT * FROM `brrow` WHERE `id`='$id' ");
$numOfRows = $resultSet->num_rows;

if ($numOfRows > 0) {
    $row = $resultSet->fetch_assoc();

    $status = 1;
    if ($row["status_id"] == 1) {
        $status = 2;
    }

    Database::iud("UPDATE `brrow` SET `status_id`='$status' WHERE `id`='$id' ");
    echo ("Success");

} else {
    echo ("Not Found");
}