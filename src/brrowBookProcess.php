<?php
include "connection.php";

$bookId = $_POST["bookId"];
$userId = $_POST["userId"];
$fine = $_POST["fine"];
$brrowedDate = date('Y-m-d', strtotime($_POST["brrowedDate"]));
$returnDate = date('Y-m-d', strtotime($_POST["returnDate"]));

if (empty($bookId)) {
    echo ("Please Enter the Book ID");
} else if (empty($userId)) {
    echo ("Please Enter the User ID");
} else if (empty($fine)) {
    echo ("Please Enter the Fine");
} else if (empty($brrowedDate)) {
    echo ("Please Select the Brrow Date");
} else if (empty($returnDate)) {
    echo ("Please Select the Return Date");
} else {
    Database::iud("INSERT INTO `brrow`(`user_id`,`book_id`,`brrow_date`,`return_date`,`fine`) 
        VALUES ('$userId','$bookId','$brrowedDate','$returnDate','$fine')");
    echo ("Success");
}