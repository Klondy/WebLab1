<!DOCTYPE html>
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/results.css">
</head>
<body>
<header>
    <h1>Test</h1>
</header>
<main id="main">
    <div style="">

        <?php
        require(__DIR__ . '/scripts/getAnswers.php');
        for ($i = 1; $i<=3;$i++){
            getDescriptions($i);
        };
        ?>
    </div>
</main>
<!--<div class="bottom"></div>-->
</body>
