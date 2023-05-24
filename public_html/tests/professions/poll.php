<?php session_start();
if(isset($_GET['code'])){
    $_SESSION['expert_code'] = $_GET['code'];
}?>
<!DOCTYPE html>
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/poll.css">
    <script src="js/poll.js"></script>

    <script src="js/expertCodes.js"></script>
    <script>
            (async () => {
                let url = new URL(window.location.href);
                if(!await checkCode(Number(url.searchParams.get('code')))){
                    window.location.href = 'results.php';
                }
            })()
    </script>
</head>
<body>


    <header></header>
    <main id="main">
        <h1>Какие ПВК важны для программиста?</h1>
        <form id="poll-form" method="post" action="scripts/sendAnswers.php">
        <p>Выберите профессию:</p>
        <form method="get" action="">
            <label>
                <select name="profession"><?php require(__DIR__ . '/database.php'); displayProfessions(); ?></select>
            </label>
            <button type="button" onclick="window.location.href='descriptions.php'">Посмотреть описание</button>
            <br>
            <div id="poll" hidden>
                <p></p>
                <label>
                    <select name="answer[]" class="options" style="width: 250px">
                        <option selected value="0">--Choose--</option>
                        <?php displayOptions();?>
                    </select>
                    <input name="points[]" type="range" min="1" max="10" value="1" oninput="displayValue(this)"><span>1</span>
                    <br>
                </label>
                <button type="submit">Отправить результат</button>
            </div>

        </form>
    </main>
    <script>
        displayOptions(10);
    </script>
    <script>
        let slider = document.getElementById("slider");
        let output = document.getElementById("slider-value");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
    <script src="js/sendAnswers.js"></script>
<?php
$_SESSION['expert_id'] = getExpertId($_SESSION['expert_code']);
?>
    <!--<div class="bottom"></div>-->
</body>
