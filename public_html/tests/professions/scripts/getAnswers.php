<?php
$database = parse_ini_file(__DIR__ . '/../../../database.ini');
$connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);

function getAnswersForProfession($profession_id){
    global $connection;
    $sql = "SELECT profession_name FROM professions WHERE profession_id=".$profession_id;
    $result = $connection->query($sql);
    echo "<h1>{$result->fetch_assoc()['profession_name']}</h1>";

    $sql = "SELECT description from professions where profession_id={$profession_id}";
    echo "<p>{$connection->query($sql)->fetch_assoc()['description']}</p>";
    echo "<p>В соответствии с результатами опроса, для этой профессии были выбраны следующие ПВК:</p>";

    $sql = "SELECT COUNT(profession_id), poll_id from answers where profession_id={$profession_id} group by poll_id ORDER BY COUNT(profession_id) DESC";
    $result = $connection->query($sql);



    #echo "Для это профессии есть ".count($result->fetch_all())."ответов";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //echo print_r($row);
            $temp = $connection->query("SELECT name FROM poll_options where id={$row['poll_id']}")->fetch_assoc();
            $pointsCon = $connection->query("SELECT points FROM answers where poll_id={$row['poll_id']}");
            $point = 0;
            while($row1 = $pointsCon->fetch_assoc()){
                $point += $row1['points'];
            }
            echo "<p>{$temp['name']} встречается {$row['COUNT(profession_id)']} раз и набрало {$point} баллов.</p>";
        }
    }
//    $sql = "SELECT * FROM answers WHERE profession_id=" . $profession_id;
//    $result = $connection->query($sql);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            echo print_r($row);
//
//        }
//    }
}

function getDescriptions($profession_id){
    global $connection;
    $sql = "SELECT profession_name FROM professions WHERE profession_id=".$profession_id;
    $result = $connection->query($sql);
    echo "<h1>{$result->fetch_assoc()['profession_name']}</h1>";

    $sql = "SELECT description from professions where profession_id={$profession_id}";
    echo "<p>{$connection->query($sql)->fetch_assoc()['description']}</p>";
}