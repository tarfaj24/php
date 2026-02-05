<?php
$pole=[
    "rambo1" => ["zaner"=>"akcne", "hl_postava"=>"silvester stallone","vydania"=>1982],
    "transformers" => ["zaner"=>"scifi", "hl_postava"=>"Shia LaBeouf","vydania"=>2007],
    "kurier" => ["zaner"=>"krimi", "hl_postava"=>"Jason Statham","vydania"=>2008],
    "samo 1" => ["zaner"=>"akcne", "hl_postava"=>"Samuel Šutek","vydania"=>2008],
    "film filmov" => ["zaner"=>"drama", "hl_postava"=>"Jason Statham","vydania"=>2004],
    "hary potter" => ["zaner"=>"akcne", "hl_postava"=>"Tom Hanks","vydania"=>2000],
    
];
// print_r($pole);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="#" method="post" class="formular">
        <fieldset>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label" >nazov filmu</label>
                <input name="nazov" type="text" class="form-control" id="formGroupExampleInput" ><br>
                <label for="akcne">Akčné</label>
                <input type="radio" name = "radio" id = "akcne" value ="akcne"><br>
                <label for="drama">Dráma</label>
                <input type="radio" name = "radio" id = "drama" value = "drama"><br>
                <label for="komedia">Komédia</label>
                <input type="radio" name = "radio" id = "komedia" value = "komedia">
            </div>

            <button type="submit" class="btn">hladat</button>
        </fieldset>
    </form>
    <?php
    $film_printnuty = FALSE;
    $zaner_radio = $_POST["radio"];
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        foreach ($pole as $key => $value){
            if ($key === $_POST["nazov"]){
                if ($value["zaner"] === $zaner_radio){
                    echo $value["zaner"]."<br>";
                    echo $value["hl_postava"]."<br>";
                    echo $value["vydania"]."<br>";
                    $film_printnuty = TRUE;  
                }
            else{
                echo "HINT: ".$key." nie je ".$zaner_radio."<br>";
            }
            }
           
            
            }
            
        
        if ($film_printnuty == FALSE){
            echo "film nie je v databaze";
        }  
        
        
    }
    
    ?>
</body>
</html>