<!DOCTYPE html>
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/results.css">
    <script src="js/expertCodes.js"></script>
    <script>
        async function redirect() {
            let code = Number(prompt('Введите код эксперта', `12345678`));
            let aval = await checkCode(code);
            if(aval){
                window.location.href="poll.php?code=" + code;
            } else {
                alert('Код не существует или введён неверно.')
            }
        }
    </script>
</head>
<body>
<header>
    <h1><a style="all: unset; cursor: pointer" onclick="redirect()">Пройти тест</a></h1>
</header>
<main id="main">
<div style="">

    <?php
        require('scripts/getAnswers.php');
        for ($i = 1; $i<=3;$i++){
            getAnswersForProfession($i);
        };
    ?>
</div>
</main>
<!--<div class="bottom"></div>-->
</body>
