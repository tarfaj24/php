<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form class = "mt-3" method="POST" action="/device_manager/public/home">
            <div class = "row">
                <div class = "col">
                    <select class="form-select" name = "status_id" aria-label="Default select example">
                        <option value = "all" selected>All</option>
                        <option value="1">Functional</option>
                        <option value="2">Non-functional</option>  
                    </select>
                </div>
                <div class = "col">
                    <button class = "btn btn-primary"type="submit">Filter</button>
                </div>
            </div>
        </form>

        <div class="table-responsive border mt-5"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Inventory number</th>
                    <th scope="col">Type</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($all_devices as $device):?>
                        <tr>
                        <th scope="row"><?=$device->getId();?></th>
                        <td class= "text-centre"><?=$device->getInventoryNumber();?></td>
                        <td><?=$device->getType();?></td>
                        <td><?=$device->getBrand();?></td>
                        <td><?=$device->getModel();?></td>
                        <td><?=$status_id_array[$device->getStatusId()];?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>