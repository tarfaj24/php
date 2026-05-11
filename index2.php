<?php
$pole=[
    "rambo1" => ["zaner"=>"akcne", "hl_postava"=>"silvester stallone","vydania"=>1982],
    "transformers" => ["zaner"=>"scifi", "hl_postava"=>"Shia LaBeouf","vydania"=>2007],
    "kurier" => ["zaner"=>"krimi", "hl_postava"=>"Jason Statham","vydania"=>2002],
];
// print_r($pole);
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach ($pole as $key => $value){
        if ($key === $_POST["nazov"]){
            echo "<p>$key</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            width: 25px;
            height: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="#" method="post" class="formular">
        <fieldset>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label" >nazov filmu</label>
                <input name="nazov" type="text" class="form-control" id="formGroupExampleInput" placeholder="Zadaj cislo">
            </div>
            <button type="submit" class="btn">hladat</button>
        </fieldset>
    </form>
</body>
</html>