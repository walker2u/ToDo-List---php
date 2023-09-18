<?php

require 'db.php';
require 'model.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST['task'])){
        session_start();
        $_SESSION['error'] = "Please Enter Something!";
        header('Location:../index.php');
        die();
    }

    $task = $_POST['task'];
    saveTask($task);
    header('Location:../index.php');
}
else{
    header('Location:../index.php');
    die();
}