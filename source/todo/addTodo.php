<?php

$name = $_POST['name']; 
$desc = $_POST['description'];


require './../../database/database.php';

use Database\DB;

try {
    $conn = new DB('localhost', 'root', '', 'crud');

    $conn->connect();
    
    $table = 'todo';
    $params = ['name', 'description', 'completed'];
    
    $values = [
        'name' => $name, 
        'description' => $desc, 
        'completed' => false
    ];
    
    $conn->add($table, $params, $values);
    
    
} catch(Exception $e) {
    echo $e->getMessage();
}