<?php
include "connection.php";

$userId = $_POST["userId"];
$bookId = $_POST["bookId"];

Database::iud("DELETE FROM `userborrowbook` WHERE `user_id` = '$userId' AND `id`='$bookId'");
echo "Success";