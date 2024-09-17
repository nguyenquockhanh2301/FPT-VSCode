<?php 
session_start();
require_once("./functions/db.php");
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from users where email = '$email' limit 1";
$data = select($sql); // array
if(count($data) == 0 ){
    die("email or password is not correct!");
}
// user existed
$user = $data[0];
$compare = password_verify($password,$user["password"]);
if($compare == false){
    die("email or password is not correct!");
}
// login successfully
$_SESSION["user"]= [
    "id"=>$user["id"],
    "full_name"=>$user["full_name"],
    "email"=>$user["email"],
    "role"=>$user["role"],
];
if($user["role"] == "ADMIN")
    header("Location: /admin");
else
    header("Location: /");