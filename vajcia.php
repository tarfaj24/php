

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
            <label for="riadok">pocet vajec</label>
            <input type="number" name="pocet_vajec">
        </div>
        
      
    
  </div>
        <button type="submit" class="send_button">Send</button>
    </form>
    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        for($i=0;$i<$_POST["pocet_vajec"];$i++){
            echo "<img src=vajce.jpg width=60px>";
        }
    }
    ?>

</body>
</html>