<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $heslo = $_POST["heslo"];
    $meno = $_POST["meno"];  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p></p>
    <form method="post">
    
        <div>
            <label for="riadok">Meno</label>
            <input type="text" name="meno">
        </div>
        <div>
            <label for="stlpec">Heslo*</label>
            <input type="password" name="heslo">
        </div>
        <div class="col-sm-3">
    
  
  </div>
        <button type="submit" class="send_button">Send</button>
    </form>
    <?php
         if ((($heslo === "") || ($meno === ""))) {
            echo "nevyplnene pole";
        }
        else{
            if (mb_strlen($heslo) < 5){
                echo "heslo musi mat aspon 5 znakov";
            }
            else{
                if ($heslo === "NBU123"){
                    echo "Vitaj ADMIN\n";
    
                }
                else{
                    echo "nespravny uzivatel";
                }
        }
        }
    ?>
  


</body>
</html>