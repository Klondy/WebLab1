<?php session_start(); ?>
<?php
function destroy(){
// Unset all of the session variables.
    $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
}
?>
<!DOCTYPE html>
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/results.css">
    <script src="js/expertCodes.js"></script>
    <?php if(isset($_SESSION['sent']) && $_SESSION['sent']): ?>
    <script>
        alert('Данные отправлены успешно.');
        <?php destroy(); ?>
    </script>
    <?php elseif(isset($_SESSION['sent']) && !$_SESSION['sent']): ?>
    <script>
        alert('Произошла ошибка при отправке, повторите попытку');
        <?php destroy(); ?>
    </script>
    <?php endif; ?>
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
