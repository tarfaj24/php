<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">  
</head>
<body>
<form method="POST" action="script.php">
  <div class="row mb-3">
    <label for="inputName3" class="col-sm-2 col-form-label">Meno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName3" name="meno">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputSurname3" class="col-sm-2 col-form-label">Priezvisko</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSurname3" name="priezvisko">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Heslo</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="heslo">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">POT.heslo</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="pot_heslo">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email">
    </div>
  </div>

  
   
  <button type="submit" class="btn btn-primary" name="REG" value="1">Registrovať</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </form>
</body>
</html>