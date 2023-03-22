<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
      Tutaj jest mechanika rejestrowania się do serwisu
 -->
<?php
    session_start();
    require_once("../private/connect.php");

    if (isset($_POST['reg']) ) {
        //dane z formularza
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $imie = $_POST['imie'];


        //zapytania do bazy danych
        $sql = "SELECT `id`, `imie`, `email`, haslo FROM `osoba` WHERE `email`='$email'";
        $stmt = $pdo->query($sql);
        $licz=$stmt->rowCount();  
        if ($licz > 0) {
            foreach ($stmt as $row) {
                if ($row['email']==$email ) {
                    //sprawdzenie czy osoba ma już konto
                    header("Location: ../page/loginForm.php?jest=tak");
                }else{
                    echo "Wystąpił nieznany błąd";
                }
            }  
        }
        else {
            // dodawanie osoby do bazy danych
            $sql2 = "INSERT INTO `osoba`( `imie`, `email`, `haslo`) VALUES (:imie,:email,:haslo)";
                    $dane = [
                        'imie' => $_POST['imie'],
                        'email' => $_POST['email'],
                        'haslo' => md5($_POST['haslo'])
                    ];
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute($dane);
                    header("Location: ../page/loginForm.php?jest=nie"); 
        }
    }
    else {
        echo "Wystąpił nieznany błąd";
    }
?>