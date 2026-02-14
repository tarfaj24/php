<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nevyplnene_pole = False;
    
    
    


    
 


 

    if (isset($_POST["meno"])){
        $meno = $_POST["meno"];
        $priezvisko = $_POST["priezvisko"];
        $heslo =  $_POST["heslo"];
        $POT_heslo = $_POST["pot_heslo"];
        $email =  $_POST["email"];
        $registracia_udaje = ["Meno" => $meno,"Priezvisko" => $priezvisko,"Heslo" =>$heslo,"POT.heslo" => $POT_heslo,"Email" =>$email];

        file_put_contents("registracne_udaje.txt",implode("\n",$registracia_udaje));

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
        $login_email = $_POST["email_login"];
        $login_heslo = $_POST["heslo_login"];
        $login_udaje = ["email" => $login_email,"heslo"=>$login_heslo];

        foreach($login_udaje as $value){
            if ($value === ""){
                $nevyplnene_pole = True;
            }
        }
        if ($nevyplnene_pole === True){
            echo "Vsetky polia musia byt vyplnene";
        }
        else{
            $registracia_udaje_file_array = file("registracne_udaje.txt");
            $email_file = trim($registracia_udaje_file_array[4]);
            $heslo_file = trim($registracia_udaje_file_array[2]);
            if (($login_email === $email_file) && ($login_heslo === $heslo_file)){
                echo "Vitaj Admin";
            }
            else{
                echo "nespravne udaje skus znova";
            }
        }
    }
}

