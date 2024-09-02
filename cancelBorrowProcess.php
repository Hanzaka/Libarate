<?php
include "connection.php";

$userId = $_POST["userID"];

Database::iud("DELETE FROM `userborrowbook` WHERE `user_id` = '$userId'");
echo "Success";