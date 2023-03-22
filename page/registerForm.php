<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest formularz rejestracyjny
 -->
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj się</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- menu -->
    <div id="menu">
        <button class="nav-button" onclick="Menu()">Menu</button>
        <nav id="nav-menu">
            <ul>
                <li> <a href="loginForm.php"> Logowanie </a></li>
                <li class="active">Rejestracja </li>
            </ul>
        </nav>
        <div id="osoba">

        </div>
    </div>


    <!-- Formularz służący do rejestracji -->
    <div id="form">
        <form action="./../app/registerUser.php" method="post">
            <h1>Rejestracja </h1>
            <label for="imie">Imię</label>
            <input type="text" name="imie" id="imie" required>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo" required>
            <label>Potwierdź hasło: </label>
            <input type="password" name="potwierdz_haslo" oninput="check(this)" id="potwierdz_haslo" required>
            <br />
            <input type="submit" name="reg" value="Zarejestruj się" />

        </form>
    </div>

    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
    <script language='javascript' type='text/javascript'>
        // skrypt sprawdzający czy hasła w dwóch polach są takie same
        function check(input) {
            if (input.value != document.getElementById('haslo').value) {
                input.setCustomValidity('Hasła muszą być takie same');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
</body>
<script src="script.js"></script>

</html>