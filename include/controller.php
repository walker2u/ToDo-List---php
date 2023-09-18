<?php

function delTask($id){

    require 'db.php';
    $query = "delete from tasks where id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
}