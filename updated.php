<?php

echo "updated<br>";



$connection = mysqli_connect("localhost", "root", "", "sample_login");



$id = $_GET['id'];
$name=$_GET['name'];
$email = $_GET['email'];
$age = $_GET['age'];
$role=$_GET['role'];
$password=$_GET['password'];
 

    echo $id ."<br>";
    echo $name ."<br>";
    echo $email;


  
?>