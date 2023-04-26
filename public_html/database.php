<?php
$database = parse_ini_file(__DIR__.'/database.ini');

function displayProfessions()
{
    global $database;


    $connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);

    if ($connection->connect_error) {
        echo("Error");
        die("Connection failed: " . $connection->connect_error);
    } else {
        echo("Good");
    }

    $sql = "SELECT * FROM professions";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value = '{$row['profession_id']}'>";
            echo $row['profession_name'];
            echo "</option>";
        }
    }
    $connection->close();
}
function displayOptions(){
    global $database;

    $connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);


    if ($connection->connect_error) {
        echo("Error");
        die("Connection failed: " . $connection->connect_error);
    } else {
        echo("Good");
    }

    $sql = "SELECT * FROM poll_options";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['disabled']){
                echo "<option value = '{$row['id']}' disabled>";
                echo $row['name'];
                echo "</option>";
            } else {
                echo "<option value = '{$row['id']}'>";
                echo $row['name'];
                echo "</option>";
            }

        }
    }
    $connection->close();
}