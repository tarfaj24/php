<?php 

class Users
{
    private $id;
    private $meno;
    private $priezvisko;
    private $email;
    
    public function __construct($id,$meno,$priezvisko,$email) 
    {
        $this->id = $id;
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
    }

    public function get_Id()
    {
        return $this->id;
    }
    public function get_Meno()
    {
        return $this->meno;
    }
    public function get_Priezvisko()
    {
        return $this->priezvisko;
    }
    public function get_Email()
    {
        return $this->email;
    }

}

?>