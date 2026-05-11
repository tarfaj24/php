
<?php
$cislo_1 = $_POST["cislo_1"];
$cislo_2 = $_POST["cislo_2"];
$operacia = $_POST["operacia"];
if ($operacia === "+"){
  echo $cislo_1 + $cislo_2;
}
else if ($operacia === "*"){
  echo $cislo_1 * $cislo_2;
}
else if ($operacia === "/"){
  if ($cislo_2 != 0){
    echo $cislo_1 / $cislo_2;
  }
  else{
    echo "error";
  }
}
else if ($operacia === "-"){
  echo $cislo_1 - $cislo_2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="kalkulacka.css">
    <title>Document</title>
</head>
<body>
    <form class="row gx-3 gy-2 align-items-center" method="POST">
  <div class="col-sm-3">
   
    <input name = "cislo_1" type="text" class="form-control" id="specificSizeInputName" placeholder="Zadaj cislo">
  </div>

   <div class="col-sm-3">
  
    <input name = "cislo_2" type="text" class="form-control" id="specificSizeInputName" placeholder="Zadaj cislo">
  </div>

  <div class="col-sm-3">
    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
    <select class="form-select" id="specificSizeSelect" name="operacia">
      <option value = "" selected>Vyber Operaciu...</option>
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Vypocet</button>
  </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>