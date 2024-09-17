<?php 
require_once("./functions/db.php");
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = password_hash($password,PASSWORD_BCRYPT);
$sql = "insert into users(full_name,email,password) 
            values('$full_name','$email','$password')";
insert($sql);
header("Location: /login.php");
