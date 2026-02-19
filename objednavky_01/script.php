<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (isset($_POST["objednat"])){
        $elektronika = ["Samsung Galaxy S25"=>"940€","Iphone 17 Pro"=>"980€","Xiaomi Redmi Note 14 Pro" => "367€","Xiaomi Redmi Pad 2" => "350€","iPad 11" => "200€","Samsung Galaxy Tab A9" => "150€","Xiaomi Redmi Pad 2"=>"165€"];
        $objednavka_for_file = [];
        foreach($_POST as $value){
            if ($value!= ""){
                $jed_objednavka = [$value, $elektronika[$value]];
                $objednavka_for_file[]= implode(" ",$jed_objednavka);
                
            }
        }
        file_put_contents("objednavky.txt",implode(" * ",$objednavka_for_file),FILE_APPEND);
        file_put_contents("objednavky.txt","\n",FILE_APPEND);
        
        print_r($objednavka_for_file);
    }
    if (isset($_POST["vypis_obj"])){
        $counter = 0
        $subor = file("objednavky.txt");
        foreach($subor as $value){
            echo "objednavka".$counter.str_replace("*"," ", $value);
            echo "<br>";
        }
    }
    
}