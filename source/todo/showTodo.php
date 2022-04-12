<?php

require 'database/database.php';

use Database\DB;

try {
    $conn = new DB('localhost', 'root', '', 'crud');

    $conn->connect();
    
    $table = 'todo';
    $params = ['name', 'description', 'completed'];

    $todos = $conn->index($table, $params);
    
    
} catch(Exception $e) {
    echo $e->getMessage();
}