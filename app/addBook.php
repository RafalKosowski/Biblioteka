<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        Tu jest strona odpowiedzialna za mechanikę dodawania książki. 
 -->
<?php
require_once("../private/connect.php");
require_once("Person.php");
require_once("Book.php");
require_once("arrayBooks.php");

if (isset($_POST['submit'])) {


    $osobaId = $_SESSION['osoba']->id;
    //Sprawdzanie czy istnieje autor w bazie danych i ewentyalne dodawanie go 
    $imie_au = $_POST['autorimie'];
    $nazwisko_au = $_POST['autornazw'];
    $au_id;
    function findAutor($imie_au, $nazwisko_au, $pdo)
    {
        $sql1 = "SELECT * FROM autor WHERE imie='$imie_au' AND nazwisko='$nazwisko_au'";
        $stmt1 = $pdo->query($sql1);
        foreach ($stmt1 as $au) {
            return $au['id'];
        }
    }
    $au_id = findAutor($imie_au, $nazwisko_au, $pdo);
    if (empty($au_id)) {
        $sql2 = "INSERT INTO `autor`(`imie`, `nazwisko`) VALUES (:imie,:nazwisko)";
        $dane2 = [
            'imie' => $imie_au,
            'nazwisko' => $nazwisko_au
        ];
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute($dane2);
        $au_id = findAutor($imie_au, $nazwisko_au, $pdo);
    }

    //Sprawdzanie czy istnieje wydawnictwo w bazie danych i ewentyalne dodawanie go
    $wydawnictwo = $_POST['wydawnictwo'];
    $wyd_id;
    function findWyd($wydawnictwo, $pdo)
    {
        $sql3 = "SELECT * FROM wydawnictwo WHERE nazwa='$wydawnictwo'";
        $stmt3 = $pdo->query($sql3);
        foreach ($stmt3 as $wy) {
            return $wy['id'];
        }
    }
    $wyd_id = findWyd($wydawnictwo, $pdo);
    if (empty($wyd_id)) {
        $sql4 = "INSERT INTO `wydawnictwo`(`nazwa`) VALUES (:nazwa)";
        $dane4 = [
            'nazwa' => $wydawnictwo
        ];
        $stmt4 = $pdo->prepare($sql4);
        $stmt4->execute($dane4);
        $wyd_id = findWyd($wydawnictwo, $pdo);
    }
    ////Sprawdzanie czy dana pozycja jest zajęta 
    if (!empty($books[(int) $_POST['regal']][(int) $_POST['polka']][(int) $_POST['pozycja']])) {
        header("Location: ../page/newBook.php?dodane=false");
        ;
    } else {
        //dodawanie ksiązki 
        $dane = [
            'tytul' => $_POST['tytul'],
            'autor_id' => (int) $au_id,
            'wydawnictwo_id' => (int) $wyd_id,
            'rok' => (int) $_POST['rok'],
            'kolor' => $_POST['kolor'],
            'regal_id' => (int) $_POST['regal'],
            'polka' => (int) $_POST['polka'],
            'pozycja' => (int) $_POST['pozycja']
        ];
        $sql = 'INSERT INTO ksiazka(tytul, autor_id, wydawnictwo_id, rok, kolor,  regal_id, polka, pozycja)
         VALUES (:tytul, :autor_id, :wydawnictwo_id, :rok, :kolor,  :regal_id, :polka, :pozycja)';
        $stmt = $pdo->prepare($sql);
        $r = $stmt->execute($dane);
        echo ($r);
        header("Location: ../page/newBook.php?dodane=true");
    }
}
?>