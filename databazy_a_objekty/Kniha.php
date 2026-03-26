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
    public function get_Nazov(){
        return $this->nazov;
    }
    public function set_Id($id){
        $this->id = $id;
    }

    public function get_Id(){
        return $this->id;
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