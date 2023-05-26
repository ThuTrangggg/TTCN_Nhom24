<?php 
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "nhom_24";

//Creat connection
$conn = new mysqli($severname,$username,$password,$dbname);

//Check connection
if($conn -> connect_error){
    die("connection failed:".$conn->connect_error);
}

$ket_noi = mysqli_connect("localhost", "root", "", "nhom_24");
?>