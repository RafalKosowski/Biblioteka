<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest plik odpowiedzialny za wylogowanie z systemu  
 -->
<?php
 unset($_SESSION['osoba']);
 session_destroy();
 echo (
     '<script>
         alert("Zostałeś wylogowany");
     </script>'
 );
 header("Location: ./../page/loginForm.php");
?>