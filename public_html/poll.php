<!DOCTYPE html>
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/poll.css">
    <script src="js/index.js"></script>
    <!--<script>
        function redirect() {
            window.location.href="poll.php?code=" + document.getElementById('codeInput').value;
        }
    </script>-->
</head>
<body>

    <header></header>
    <main id="main">
        <h1>Какие ПВК важны для программиста?</h1>
        <form method="post" action="scripts/sendAnswers.php">
        <label>
            <p>Введите код эксперта для прохождения опроса:
            <input name="expert_id" type="number">
            </p>
        </label>
        <p>Выберите профессию:</p>
        <form method="get" action="">
            <label>
                <select name="profession"><?php require (__DIR__ . '/database.php'); displayProfessions(); ?></select>
            </label>
            <button type="button" onclick="window.location.href='descriptions.php'">Посмотреть описание</button>
            <br>
            <label for="countPVKInput" id="countPVK">
                <p>Сколько ПВК вы желаете выбрать? (от 5 до 10)
                <input id="countPVKInput" type="number" min="5" max="10" onkeyup="checkNumber(this);" value="5">
                </p>
                <button id="continueButton" type="button" onclick="displayOptions(parseInt(document.getElementById('countPVKInput').value))">Подтвердить</button>
            </label>
            <div id="poll" hidden>
                <p></p>
                <label>
                    <select name="answer[]"><?php displayOptions();?></select>
                    <!--<input type="number" min="5" max="10" onkeyup="checkNumber(this);" value="5">-->
                    <br>
                </label>
                <button type="submit">Отправить результат</button>
            </div>

        </form>
    </main>
    <!--<div class="bottom"></div>-->
</body>
