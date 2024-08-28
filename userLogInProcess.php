<?php
session_start();
include "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

if(empty($username)){
    echo "Enter Username";
}else if(empty($password)){
    echo "Enter Password";
}else{

    $resultSet = Database::search("SELECT * FROM `user` WHERE `user_id`='".$username."' AND `password`='".$password."' ");
    $numOfRows = $resultSet->num_rows;

    if($numOfRows == 1){
        $data = $resultSet->fetch_assoc();
        $_SESSION["user"] = $data;
        echo "Success";
    }else{
        echo "Invalid Username or Password";
    }

}