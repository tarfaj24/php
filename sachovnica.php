<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "<table border=1>";
    $farba = $_POST["farba"];
    $cislo = 0;


        if (($_POST["stlpec"] < 0) || ($_POST["riadok"] < 0)) {

            echo "error cislo musi byt vacsie ako 0";
        }
        else{
        for($i=0;$i<$_POST["riadok"];$i++){
            echo "<tr>";
            for($a=0; $a<$_POST["stlpec"];$a++){
                if ($farba === "fialova"){
            
                    $cislo+=1;
                    if ($cislo % 2 == 0){
                        echo "<td style ='background-color: purple'></td>";
                    }
           
                    else{
                        echo "<td style ='background-color: white'></td>";
                    }
                }
                
                else if ($farba === "biela"){

                    $cislo+=1;
                    if ($cislo % 2 == 0){
                        echo "<td style ='background-color: white'></td>";
                    }
                    else{
                        echo "<td style ='background-color: white'></td>";
                    }
                }
                else if ($farba === "cierna"){
                    $cislo+=1;
                    if ($cislo % 2 == 0){
                        echo "<td style ='background-color: black'></td>";
                    }
                    else{
                        echo "<td style ='background-color: white'></td>";
                    }
                    }
            
            }

            echo "</tr>";
        }
    echo "</table>";
}
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
            <label for="riadok">Riadkov</label>
            <input type="number" name="riadok">
        </div>
        <div>
            <label for="stlpec">Stlpcov</label>
            <input type="number" name="stlpec">
        </div>
        <div class="col-sm-3">
    
    <select class="form-select" id="specificSizeSelect" name="farba">
      <option value = "biela" selected>biela</option>
      <option value="fialova">fialová</option>
      <option value="cierna">čierna</option>
      
    </select>
  </div>
        <button type="submit" class="send_button">Send</button>
    </form>


</body>
</html>