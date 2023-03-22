<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest klasa Osoba. Definiuje ona pojedyńczą osobę  
 -->
<?php
  class Person{
    //właściwości
    public $id,$imie,$email;

    //konstruktor
    public function __construct($id,$imie,$email) {
      $this->id=$id;
      $this->imie=$imie;
      $this->email=$email;
    }  
  }

?>