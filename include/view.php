<?php
function viewTasks(){
    require 'db.php';

    $query = "select * from tasks";
    $result = $con->query($query);
    return $result;
}