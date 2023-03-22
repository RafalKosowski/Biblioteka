<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest wyświetlanie półek z książkami
 -->
<?php
require_once("../private/connect.php");
require_once("../app/Person.php");
require_once("../app/Book.php");
session_start();
if (!isset($_SESSION['osoba'])) {
    header("Location: loginForm.php?l=false");
}
$books = [];

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
array_push($books, new Book(0, "Puste", 0, 0, 0, 0, 0, 0, 0, 0));
foreach ($stmt as $book) {
    array_push($books, new Book($book['ks_id'], $book['tytul'], $book['rok_wydania'], $book['opis'], $book['zdjecie'], $book['kolor'], $book['autor_id'], $book['wydawnictwo_id'], $book['polka_id'], $book['pozycja']));
}

//szafki
$sql1 = "SELECT * FROM regal where osoba_id =" . $_SESSION['osoba']->id;
$stmt1 = $pdo->query($sql1);
$licz1 = $stmt1->rowCount();

$sql2 = "SELECT *, polka.rozmiar as pol_roz, polka.id as pol_id FROM regal JOIN polka on regal.id = polka.regal_id where regal.osoba_id =" . $_SESSION['osoba']->id;
$stmt2 = $pdo->query($sql2);
$licz2 = $stmt2->rowCount();
$selff = $stmt2->fetchAll();

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dodaj regał</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .book-shelf {
            display: flex;
            flex-wrap: wrap;
            border: rgb(87, 51, 22) 20px solid;
            margin: 5px;
            min-height: 10px;
        }

        .shelf {
            width: 100%;
            height: 152px;
            background-color: rgb(243, 183, 134);
            /* margin: 10px; */
            border: solid black 1px;
            border-bottom: rgb(87, 51, 22) 10px solid;
            display: flex;


        }

        .book {
            width: auto;
            height: 140px;
            background-color: rgb(243, 183, 134);
            margin: 1px;
            text-align: center;
            position: relative;
            float: left;
            border: 1px solid black;
            display: flex;


        }

        .book-title {

            display: none;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            /* transform: rotate(-90deg);
            transform-origin:bottom; */
            font-size: 3em;
            background-color: #333333;
            z-index: 2;
            color: white;
            padding: 1rem;



        }


        .book:active .book-title {
            display: block;
        }

        /* .book:active{

        } */
        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .shelf {
                width: 100%;
            }
        }

        .polki {
            background-color: #f1f1f1;
            padding-bottom: 20px;
        }
    </style>
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
    <br>
    <div class="polki">
        <?php




        ?>

        <?php foreach ($stmt1 as $bookself) { ?>

            <h3><?php echo ($bookself['nazwa']); ?> </h3>
            <div class="book-shelf">
                <?php for (/*$stmt2 as $selff*/$j = 0; $j < $licz2; $j++) {

                    if ($selff[$j]['regal_id'] == $bookself['id']/*true*/) {

                ?>
                        <div class="shelf">
                            <style>
                                <?php echo (".book{
                                            width:" . 90 / $selff[$j]['pol_roz'] . "%
                                        } "
                                ) ?>;
                            </style>
                            <?php

                            for ($i = 1; $i <= $selff[$j]['rozmiar']; $i++) {

                                $book_poz = array_column($books, 'pozycja');
                                $found_key = array_search($i, $book_poz);
                                // echo ($found_key);


                                if ($selff[$j]['pol_id'] == $books[$found_key]->polka_id) {

                            ?>

                                    <div class="book" style="background-color: <?php echo (@$books[$found_key]->kolor); ?>;" title="<?php echo (@$books[$found_key]->tytul); ?>">
                                        <div class="book-title"><?php echo (@$books[$found_key]->tytul); ?></div>

                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="book" title="Puste">
                                        <div class="book-title">Puste</div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                <?php
                    }
                }

                ?>

            </div>
        <?php } ?>


    </div>


    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2022
        </p>
    </footer>
    <script src="script.js"></script>
</body>

</html>