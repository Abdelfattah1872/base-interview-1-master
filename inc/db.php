<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="task";
// creat connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
    die("Connection Faild : " . mysqli_connect_error());
}?>

