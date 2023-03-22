<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      To jest strona z wynikami wyszukiwania
 -->
<?php

require_once("../private/connect.php");
require_once("../app/Person.php");
session_start();
if (!isset($_SESSION['osoba'])) {
  header("Location: loginForm.php?l=false");
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['tytul'])) {

  $query = trim($_GET['tytul']);
  $author = isset($_GET['autor']) ? trim($_GET['autor']) : '';
  $publisher = isset($_GET['wydawnictwo']) ? trim($_GET['wydawnictwo']) : '';
  $sql = "
  SELECT *,autor.imie as au_imie,wydawnictwo.nazwa as wyd_nazwa
  FROM ksiazka
  JOIN autor ON ksiazka.autor_id = autor.id
  JOIN wydawnictwo ON ksiazka.wydawnictwo_id = wydawnictwo.id
   JOIN polka on polka.id = ksiazka.polka_id
   join regal on regal.id = polka.regal_id
   JOIN osoba on osoba.id=regal.osoba_id
   where osoba.id =" . $_SESSION['osoba']->id . "
  And ksiazka.tytul LIKE '%$query%'";

  if ($author != '') {
    $sql .= "  AND (autor.nazwisko LIKE '%$author%' OR CONCAT(autor.imie, ' ', autor.nazwisko) LIKE '%$author%')";
  }
  if ($publisher != '') {
    $sql .= " AND wydawnictwo.nazwa LIKE '%$publisher%'";
  }

  $stmt = $pdo->query($sql);
  $licz = $stmt->rowCount();

?>

  <!DOCTYPE html>
  <html lang="pl">

  <head>
    <meta charset="UTF-8">
    <title>Wyniki wyszukiwania</title>
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
    </div>
    <div id="pole">
      <div id="wyniki">

        <h1>Wyniki wyszukiwania</h1>

        <?php if ($licz > 0) : ?>
          <p>Znalezione książki: <strong><?php echo ($licz); ?></strong></p>
          <ul>
            <?php foreach ($stmt as $book) : ?>

              <li>
                <h2><?php echo $book['tytul']; ?></h2>
                <p>Autor: <?php echo $book['au_imie'] . ' ' . $book['nazwisko']; ?></p>
                <p>Wydawnictwo: <?php echo $book['wyd_nazwa']; ?> </p>
                <p>Ta książka znajduje się: <br>
                <ul>
                  <li> Regał: <i> <?php echo $book['nazwa']; ?></i></li>
                  <li> Półka nr: <?php echo $book['nr_polka']; ?> </li>
                  <li> Pozycja nr: <?php echo $book['pozycja']; ?> </li>
                </ul>
                </p>

              </li>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <p>Nie znaleziono żadnej książki</p>
        <?php endif; ?>
      <?php } ?>
      </div>
    </div>

    <footer>
      <p>
        Created by Rafał Kosowski &copy; 2022
      </p>
    </footer>
  </body>
  <script src="script.js"></script>
  </html>