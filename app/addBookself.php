<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest plik odpowiedzialny za mechanikę dodawnia szafki 
 -->
<?php
    require_once("../private/connect.php");
    require_once("../app/Person.php");
    session_start();
    if (isset($_POST['submit'])) {
        
        $osobaId = $_SESSION['osoba']->id;

        //oblicznie nowego id dla regału
        $sql1 = "SELECT COUNT(`id`) as c FROM `regal`";
        $stmt1 = $pdo->query($sql1);
        foreach ($stmt1 as $v) {
            $id = $v['c']+1;
        }
        $dane = [
            'id' => $id,
            'nazwa' => $_POST['nazwa'],
            'rozmiar' => (int)$_POST['polki'],
            'osoba' => $osobaId
        ];



        //Tworzenie regału
        $sql2 = "INSERT INTO regal(id ,rozmiar, osoba_id, nazwa) VALUES (:id,:rozmiar,:osoba,:nazwa)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute($dane);

        //tworzenie półek
        $polki = (int)$_POST['polki'];
        for ($i = 0; $i < $polki; $i++) {
            $dane2 = [
                'regal_id' => $id,
                'rozmiar' => (int)$_POST['ksiazki'],
                'nr_polka' => $i+1,
            ];
            $sql3 = "INSERT INTO `polka`( `regal_id`, `rozmiar`, `nr_polka`) 
                VALUES (:regal_id,:rozmiar,:nr_polka)";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute($dane2);
        }

        header("Location: ../page/newBookself.php?dodane=true");
    }

    ?>