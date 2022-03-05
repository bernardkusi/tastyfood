<?php

$server="localhost";
$user="root";
$passcode="";
$database="tastyfood";
$conn=mysqli_connect($server,$user,$passcode,$database);

if(!$conn){
    die("connection error".mysqli_connect_error());
}else{
    
}


?>