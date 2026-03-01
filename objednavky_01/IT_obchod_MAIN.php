<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form method="POST" action="script.php">
    

    <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Telefóny</legend><br>


    <div class="telefony">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="samsung_phone" id="samsung_1" value="Samsung Galaxy S25" checked>
        <label class="form-check-label" for="samsung_1">
        Samsung Galaxy S25
        <p>cena:940€</p>
        </label><br>
        <img src="obrazky/samsung.jpg" alt="samsung">
      </div>

      <div class="form-check">
       
        <input class="form-check-input" type="checkbox" name="iphone" id="iphone_1" value="Iphone 17 Pro">
        <label class="form-check-label" for="iphone_1">
            Iphone 17 Pro
            <p>cena:990€</p>
        </label>
        <br>
        <img src="obrazky/iphone.jpg" alt="iphone" >
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="xiaomi_phone" id="xiaomi_1" value="Xiaomi Redmi Note 14 Pro" >
        <label class="form-check-label" for="xiaomi_1">
            Xiaomi Redmi Note 14 Pro
            <p>cena:367€</p>
        </label>
        <br>
        <img src="obrazky/xiaomi.jpg" alt="xiaomi_phone" >
      </div>
    </div>
  
  </div>
  </fieldset>

  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Tablety</legend><br>


    <div class="tablety">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="ipad" id="ipad_1" value="iPad 11" checked>
        <label class="form-check-label" for="gridRadios1">
        iPad 11
       <p>cena:200€</p>
        </label><br>
        <img src="obrazky/ipad.jpg" alt="ipad_tablet">
      </div>

      <div class="form-check">
       
        <input class="form-check-input" type="checkbox" name="xiaomi_tablet" id="xiaomi_tablet" value="Xiaomi Redmi Pad 2">
        <label class="form-check-label" for="gridRadios2">
        Xiaomi Redmi Pad 2
        <p>cena:165€</p>
        </label>
        <br>
        <img src="obrazky/xiaomi_tablet.jpg" alt="xiaomi_tablet" >
        
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="samsung_tablet" id="samsung_tablet_1" value="Samsung Galaxy Tab A9" >
        <label class="form-check-label" for="gridRadios3">
        Samsung Galaxy Tab A9
        <p>cena:150€</p>
        </label>
        <br>
        <img src="obrazky/samsung_tablet.jpg" alt="samsung_tablet" >
      </div>
    </div>
  
  </div>
  </fieldset>

    <button type="submit" class="btn btn-primary" name="objednat">Objednať</button>
    <button type="submit" class="btn btn-primary" name="vypis_obj">Zobraz objednávky</button>
    </form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>