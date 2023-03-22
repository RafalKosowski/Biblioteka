<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tu jest strona do dodania nowej książki
 -->
<?php
session_start();
if (!isset($_SESSION['osoba'])) {
    header("Location: loginForm.php?l=false");
  }
  if (isset($_GET['dodane'])&&$_GET['dodane']=='true') {
    echo '<script> alert("Regał został dodany ") </script>'; 
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Dodaj regał</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div id="menu">
        <button class="nav-button" onclick="Menu()">Menu</button>
        <nav id="nav-menu">
            <ul>
                <li><a href="searchBook.php">Szukaj książki</a></li>
                <li><a href="newBook.php">Dodaj książkę</a></li>
                <li><a href="newBookself.php">Dodaj regał</a></li>
                <li><a href="showBookself.php">Przeglądaj regały</a></li>
                <li><a href="./../app/logout.php">Wyloguj</a></li>
            </ul>
        </nav>
        <div id="osoba">

        </div>
    </div>

    <!-- wyszukiwanie książki -->
    <div id="form-add">
        <form action="/Biblioteka/app/addBookself.php" method="post">
            <label for="nazwa">Wpisz nazwę: </label>
            <input type="text" id="nazwa" name="nazwa" required>
            <label for="polki">Liczba półek</label>
            <input type="number" name="polki" id="polki" required>
            <label for="ksiazki">Liczba książek na półce</label>
            <input type="number" name="ksiazki" id="ksiazki" required>
            <br>
            <input type="submit" name="submit" value="Dodaj">
        </form>
    </div>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
</body>
<script src="script.js"></script>
</html>