<?php
include "connection.php";

$bookName = $_POST["bookName"];
$categoryName = $_POST["categoryName"];
$authorName = $_POST["authorName"];
$publisherName = $_POST["publisherName"];
$userID = $_POST["userID"];
$currentDate = date('Y-m-d');

$resultSet = Database::search("SELECT * FROM `userborrowbook` WHERE `book_id` = '$bookName' AND `user_id`='$userID'");
$numOfRows = $resultSet->num_rows;

if ($numOfRows > 0) {
    echo ("Brrow Request Already Completed");
} else {
    Database::iud("INSERT INTO `userborrowbook`(`book_id`,`user_id`,`borrow_date`,`status_id`,`author_id`,`publisher_id`,`category_id`) 
        VALUES('$bookName','$userID','$currentDate','3','$authorName','$publisherName','$categoryName')");
    echo ("Success");
}