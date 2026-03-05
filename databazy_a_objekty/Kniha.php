<?php

class Kniha{
    public string $nazov;
    public string $autor;
    public int $rok_vydania;
    public int $stav;

    public function __construct($nazov,$autor,$rok_vydania,$stav){
        $this->nazov = $nazov;
        $this->autor = $autor;
        $this->rok_vydania = $rok_vydania;
        $this->stav = $stav;

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

    

}

?>