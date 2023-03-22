<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest klasa Book. Definiuje ona pojedyńczą książkę  
 -->
<?php
class Book
{
    public $id, $tytul, $rok_wydania, $opis, $zdjecie, $kolor, $autor_id, $wydawnictwo_id, $polka_id,$pozycja;

    public function __construct($id, $tytul, $rok_wydania, $opis, $zdjecie, $kolor, $autor_id, $wydawnictwo_id, $polka_id,$pozycja )
    {
        $this->id= $id;
        $this->tytul= $tytul;
        $this->rok_wydania=$rok_wydania ;
        $this->opis= $opis;
        $this->zdjecie=$zdjecie; 
        $this->kolor= $kolor;
        $this->autor_id= $autor_id;
        $this->wydawnictwo_id = $wydawnictwo_id;
        $this->polka_id = $polka_id;
        $this->pozycja = $pozycja;
    }
    
}


?>