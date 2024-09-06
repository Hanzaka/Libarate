<?php
include "connection.php";

$userId = $_POST["userId"];
$id = $_POST["id"];

Database::iud("DELETE FROM `userborrowbook` WHERE `user_id` = '$userId' AND `id`='$id'");
echo "Success";