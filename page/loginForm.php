
<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tu jest strona z formularzem logowania
 -->
<?php
session_start();
if (isset($_GET['l'])&&$_GET['l']=='false') {
    echo '<script>  alert("Najpierw musisz się zalogować") </script>'; 
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- menu -->
    <div id="menu">
        <button class="nav-button" onclick="Menu()">Menu</button>
        <nav id="nav-menu">
            <ul>
                <li class="active"> Logowanie </li>
                <li> <a href="registerForm.php">Rejestracja </a></li>

            </ul>
        </nav>
        <div id="osoba">

        </div>
    </div>



    <!-- Formularz służący do logowania się na stronie -->
    <div id="form" style="width: 100%;">
        <form action="./../app/login.php" method="post">
            <h1>Logowanie </h1>
            <div class="loginerror">
                <?php
                if (isset($_GET['login']) && $_GET['login'] == 'false') {
                    echo ('<p>
                            &nbsp; Podano błędny email lub hasło.&nbsp;
                            </p>'
                    );
                }
                ?>
            </div>
            <div class="istniejacekonto">
                <?php
                if (isset($_GET['jest']) && $_GET['jest'] == 'tak') {
                    echo ('<p>
                                &nbsp;Masz już u nas konto. Zaloguj się&nbsp;
                            </p>'
                    );
                }
                if (isset($_GET['jest']) && $_GET['jest'] == 'nie') {
                    echo ('<p>
                                &nbsp;Konto zostało utworzone pomyślnie. Zaloguj się&nbsp;
                            </p>'
                    );
                }
                ?>
            </div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo" required>
            <input type="submit" name="log" value="Zaloguj się">

        </form>
    </div>

    <br>
    <script src="script.js"></script>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2023
        </p>
    </footer>

</body>

</html>