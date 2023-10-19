<?php
$host="localhost";
$username="u388624621_ykecom";
$password="Yk@2023181";
$database="u388624621_ykecom";

// creating a database connection
$con=mysqli_connect($host,$username,$password,$database);

if(!$con){
    die("connection failed:".mysqli_connect_error());
}



?>
