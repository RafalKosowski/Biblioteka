
<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest plik odpowiedzialny za przygotowanie tablicy z książkami. 
 -->
 <?php

require_once("../private/connect.php");
require_once("./Person.php");
require_once("./Book.php");
session_start();

$sql = "
SELECT *,polka.rozmiar as pol_roz, ksiazka.id as ks_id
FROM ksiazka
JOIN autor ON ksiazka.autor_id = autor.id
JOIN wydawnictwo ON ksiazka.wydawnictwo_id = wydawnictwo.id
 JOIN polka on polka.id = ksiazka.polka_id
 join regal on regal.id = polka.regal_id
 JOIN osoba on osoba.id=regal.osoba_id
 where osoba.id =" . $_SESSION['osoba']->id;
$stmt = $pdo->query($sql);
$licz = $stmt->rowCount();

$books = [];
foreach ($stmt as $book) {
    $books[$book['regal_id']][$book['nr_polka']][$book['pozycja']]=new Book($book['ks_id'], $book['tytul'], $book['rok_wydania'], $book['opis'], $book['zdjecie'], $book['kolor'], $book['autor_id'], $book['wydawnictwo_id'], $book['polka_id'], $book['pozycja']);
}
?>

