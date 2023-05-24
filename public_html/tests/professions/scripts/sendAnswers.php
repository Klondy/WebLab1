<?php
session_start();
function sendAnswers($post): bool
{
    $database = parse_ini_file(__DIR__ . '/../../../database.ini');
    $connection = new mysqli($database['ip'], $database['username'], $database['password'], $database['database'], 3306);

#$sql = "INSERT INTO answers (expert_id, poll_id, profession_id) VALUES ('" . $_POST['expert_id'] .
#"', '" .$_POST[''];
    $expert_id = $post['expert_id'];
    $answer = $post['answer'];
    $profession_id = $post['profession'];
    $points = $post['points'];
    echo 123445;
    $sql = "INSERT INTO answers (expert_id, poll_id, profession_id, points) VALUES ('" . $expert_id .
        "', '" . $answer[0] . "', '" . $profession_id . "', '" . $points[0] . "')";
    for ($i = 1; $i<count($answer); $i++){
        if($answer[$i] == 0){
            echo 123;
            continue;
        }
        echo 1234;
        $sql .= ", ('" . $expert_id . "', '" . $answer[$i] . "', '" . $profession_id  . "', '" . $points[$i] . "')";
    }
    try {
        $connection->query($sql);

    } catch (Exception $ex){
        echo $ex;
        return false;
    }
    $connection->close();
    return true;
}

$post = array_merge($_SESSION, $_POST);
print_r($post);
if(sendAnswers($post)){
    $_SESSION['sent'] = true;
} else {
    $_SESSION['sent'] = false;
}
header("Location: /site/public_html/tests/professions/results.php");
//header("Location: results.php");
