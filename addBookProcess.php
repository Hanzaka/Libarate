<?php
include "connection.php";

$bookId = $_POST["bookId"];
$bookName = $_POST["bookName"];
$category = $_POST["category"];
$author = $_POST["author"];
$publisher = $_POST["publisher"];

if (empty($bookId)) {
    echo ("Please Enter the Book ID");
} else if (empty($bookName)) {
    echo ("Please Enter the Book Name");
} else if (empty($category)) {
    echo ("Please Select the Book Category");
}else if (empty($author)) {
    echo ("Please Select the Book Author");
}else if (empty($publisher)) {
    echo ("Please Select the Book Publisher");
}else {
    $resultSet = Database::search("SELECT * FROM `book` WHERE `book_id` = '$bookId' AND `book_name`='$bookName'");
    $numOfRows = $resultSet->num_rows;

    if ($numOfRows > 0) {
        echo ("The Book Already Exsist");
    } else {
        Database::iud("INSERT INTO `book`(`book_id`,`book_name`,`category_id`,`author_id`,`publisher_id`) 
        VALUES('$bookId','$bookName','$category','$author','$publisher')");
        echo ("Success");
    }
}