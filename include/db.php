<?php

$host = "localhost";
$usename = "root";
$pass = "";
$db = "todo";

$con = new mysqli($host,$usename,$pass,$db);

if($con->error){
    die("Connection Error!");
}