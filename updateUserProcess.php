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
    echo ("User First Name Should be Less Than 20 Characters");
} elseif (empty($lname)) {
    echo ("Please Enter User Last Name");
} elseif (strlen($lname) > 20) {
    echo ("User Last Name Should be Less Than 20 Characters");
} elseif (empty($mobile)) {
    echo ("Please Enter User Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("User Mobile Number Must Contain 10 Characters");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number");
} else {

    $resultSet = Database::search("SELECT * FROM `user` WHERE `user_id`='$id'");

    if ($resultSet->num_rows > 0) {

        $row = $resultSet->fetch_assoc();
        $existingPassword = $row["password"];

        if (empty($password)) {

            $passwordToUpdate = $existingPassword;
        } else {

            $passwordToUpdate = $password;
        }

        Database::iud("UPDATE `user` 
            SET `f_name` = '$fname', `l_name` = '$lname', `email` = '$email', `mobile` = '$mobile', `password` = '$passwordToUpdate' 
            WHERE `user_id` = '$id'");

        echo ("Success");
    } else {
        echo ("User not found");
    }
}

