<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tu jest strona do dodania nowej książki
 -->
<?php
require_once("../private/connect.php");
require_once("../app/Person.php");
require_once("../app/Book.php");
session_start();
if (!isset($_SESSION['osoba'])) {
    header("Location: loginForm.php?l=false");
}
if (isset($_GET['dodane'])) {
    if($_GET['dodane']=='true'){
        echo '<script>  alert("Książka została dodana.") </script>'; 
    }else if($_GET['dodane']=='false'){
        echo '<script> alert("W tym miejscu jest już książka. ") </script>';
    }

}

$sql1 = "SELECT * FROM regal where osoba_id =" . $_SESSION['osoba']->id;
$stmt1 = $pdo->query($sql1);
$licz1 = $stmt1->rowCount();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Dodaj książkę</title>
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


    <!-- formularz dodawania książki -->
    <div id="form-add">
        <form action="./../app/addBook.php" method="post">
            <label for="tytul">Tytuł: </label>
            <input type="text" id="tytul" name="tytul" required>
            <label for="autorimie">Imię autora:</label>
            <input type="text" id="autorimie" name="autorimie" required>
            <label for="autornazw">Nazwisko autora:</label>
            <input type="text" id="autornazw" name="autornazw" required>
            <label for="wydawnictwo">Wydawnictwo:</label>
            <input type="text" id="wydawnictwo" name="wydawnictwo" required>
            <label for="rok">Rok wydania:</label>
            <input type="number" id="rok" name="rok" required>
            <label for="kolor">Kolor:</label>
            <input type="color" id="kolor" name="kolor" required>
            <label for="okladka">Zdjęcie okładki: </label>
            <input type="file" name="okladka" id="okladka" accept="image/*">
            <label for="regal">Regał:</label>
            <select id="regal" name="regal" required>
            <?php
                foreach ($stmt1 as $bookself) {
                   echo('<option value="'.$bookself['id'].'">'. $bookself['nazwa'].'</option>');
                }
            
            ?>
            </select>
            <label for="polka">Pólka:</label>
            <input type="number" id="polka" name="polka" required>
            <label for="pozycja">Pozycja:</label>
            <input type="number" id="pozycja" name="pozycja" required>
            <br>
            <input name="submit" type="submit" value="Dodaj">
           
            
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