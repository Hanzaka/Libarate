<?php
include "connection.php";

$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($id)) {
    echo ("Please Enter User ID");
} elseif (empty($fname)) {
    echo ("Please Enter User First Name");
} elseif (strlen($fname) > 20) {
    echo ("User First Name Should be Less Than 20 Character");
} elseif (empty($lname)) {
    echo ("Please Enter User Last Name");
} elseif (strlen($lname) > 20) {
    echo ("User Last Name Should be Less Than 20 Character");
} elseif (empty($mobile)) {
    echo ("Please Enter User Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("User Mobile Number Must Contain 10 Characters");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number");
} elseif (empty($password)) {
    echo ("Please Enter User Password");
} elseif (strlen($password) < 3 || strlen($password) > 20) {
    echo ("Your Password Should Contain 3 to 20 Characters");
} else {
    $resultSet = Database::search("SELECT * FROM `user` WHERE `id`='$id' OR `mobile`='$mobile'");
    $numOfRows = $resultSet->num_rows;

    if ($numOfRows > 0) {
        echo ("User has been already Registered with the Given User ID");
    } else {
        Database::iud("INSERT INTO `user`(`user_id`,`f_name`,`l_name`,`email`,`mobile`,`password`) 
        VALUES ('$id','$fname','$lname','$email','$mobile','$password')");
        echo ("Success");
    }
}