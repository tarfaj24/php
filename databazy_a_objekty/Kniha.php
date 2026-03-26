<?php

class Kniha{
    public string $nazov;
    public string $autor;
    public int $rok_vydania;
    public int $stav;

    public function __construct($nazov, $autor, $rok_vydania, $stav){
        $this->nazov = $nazov;
        $this->autor = $autor;
        $this->rok_vydania = $rok_vydania;
        $this->stav = $stav;
    }
    public function getNazov(){
        return $this->nazov;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function get_Autor(){
        return $this->autor;
    }

    public function getRok_vydania(){
        return $this->rok_vydania;
    }

    public function getStav(){
        return $this->stav;
    }

    

}