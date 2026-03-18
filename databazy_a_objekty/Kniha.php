<?php

class Kniha{
    private int $id;
    private string $nazov;
    private string $autor;
    private int $rok_vydania;
    private int $stav;

    public function __construct($nazov,$autor,$rok_vydania,$stav){
        $this->nazov = $nazov;
        $this->autor = $autor;
        $this->rok_vydania = $rok_vydania;
        $this->stav = $stav;

    }

    public function setNazov($nazov){
        $this->nazov = $nazov;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNazov(){
        return $this->nazov;
    }


    public function get_Autor(){
        return $this->autor;
    }


    public function get_Rok_vydania(){
        return $this->rok_vydania;


    }

    public function get_Stav(){
        return $this->stav;
    }

    public function get_Id(){
        return $this->id;
    }

    

}

?>