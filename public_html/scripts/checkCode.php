<?php

function check(): bool|string
{
    $database = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'\database.ini');
    $connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    };



    $sql = "SELECT *  FROM `experts` WHERE `expert_code` = ".$_GET['code'];
    $result = $connection->query($sql);
    if($result->num_rows > 0){
        return true;
    } else {
        return false;
    }
}
