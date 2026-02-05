<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "<table border=1>";
    
        for($i=0;$i<$_POST["riadok"];$i++){
            echo "<tr>";
            for($a=0; $a<$_POST["stlpec"];$a++){
                echo "<td>*</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
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
    <form method="post">
        <div>
            <label for="riadok">Riadkov</label>
            <input type="number" name="riadok">
        </div>
        <div>
            <label for="stlpec">Stlpcov</label>
            <input type="number" name="stlpec">
        </div>
        <button type="submit" class="send_button">Send</button>
    </form>

    
</body>
</html>