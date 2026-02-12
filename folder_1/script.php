<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nevyplnene_pole = False;
    $meno = $_POST["meno"];
    $priezvisko = $_POST["priezvisko"];
    $heslo =  $_POST["heslo"];
    $POT_heslo = $_POST["pot_heslo"];
    $email =  $_POST["email"];
    
    $registracia_udaje = ["Meno" => $meno,"Priezvisko" => $priezvisko,"Heslo" =>$heslo,"POT.heslo" => $POT_heslo,"Email" =>$email];


    
    file_put_contents('registracne_udaje.txt', $registracia_udaje,);
   


 

    if (isset($_POST["meno"])){
 

        foreach($registracia_udaje as $value){
            if ($value === ""){
                $nevyplnene_pole = True;
            }
        }
        if ($nevyplnene_pole === True){
            echo "Vsetky polia musia byt vyplnene";
        }
        else{
            echo "ahoj svet";
            header("Location:login.php");
            exit();
           
        }
    }
    if (isset($_POST["login_button"])){
        print_r($registracia_udaje);
    

    }
}

