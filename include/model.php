<?php
function saveTask($task){
    require 'db.php';
    $query = "insert into tasks(todo_item) values(?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s",$task);
    $stmt->execute();
}