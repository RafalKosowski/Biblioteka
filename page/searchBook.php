<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest strona z wysukiwarka książek
 -->
<?php 
session_start();
if (!isset($_SESSION['osoba'])) {
  header("Location: loginForm.php?l=false");
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szukaj książki</title>
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
                <li><a href="../app/logout.php">Wyloguj</a></li>
            </ul>
        </nav> 
        <div id="osoba">
            
         </div>
     </div>

    <!-- wyszukiwanie książki -->
    <div id="form-search">
    <form action="findBook.php" method="get">
        <label for="tytul">Wpisz tytuł: </label><br>
        <input type="text" id="tytul" name="tytul"><br>
        <details>
          <summary>Wyszukiwanie szczegółowe </summary>
          <label for="autor">Autor:</label>
          <input type="text" id="author" name="autor">
          <label for="wydawnictwo">Wydawnictwo:</label>
          <input type="text" id="wydawnictwo" name="wydawnictwo">
        </details>
        <br>
        <input type="submit" value="Szukaj">
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