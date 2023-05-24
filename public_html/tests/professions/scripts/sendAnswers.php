<?php
$database = parse_ini_file(__DIR__ . '/../database.ini');
$connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);

#$sql = "INSERT INTO answers (expert_id, poll_id, profession_id) VALUES ('" . $_POST['expert_id'] .
#"', '" .$_POST[''];
$expert_id = $_POST['expert_id'];
$answer = $_POST['answer'];
$profession_id = $_POST['profession'];

$sql = "INSERT INTO answers (expert_id, poll_id, profession_id) VALUES ('" . $expert_id .
    "', '" . $answer[0] . "', '" . $profession_id . "')";
for ($i = 1; $i<count($answer); $i++){
    if($answer[$i] == 0){
        continue;
    }
    $sql .= ", ('" . $expert_id . "', '" . $answer[$i] . "', '" . $profession_id . "')";
}
try {
    $connection->query($sql);

} catch (Exception $ex){
    echo json_encode(false);
}
$connection->close();
echo json_encode(true);