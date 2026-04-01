<?php 

class Users{
    private $id;
    private $meno;
    private $priezvisko;
    private $email;
    
    public function __construct($id,$meno,$priezvisko,$email) {
        $this->id = $id;
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
    }
    

}


?>