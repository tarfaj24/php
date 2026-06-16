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
        <div class = "row">  
            <div class = "to_do col-lg-4 bg-secondary-subtle p-4">
                <h1 class="bg-secondary text-center p-2 rounded mt-3">To do</h1>
                <form action = "/project_tasks/public/create" method = "POST" class="border border-3 border-secondary p-2 rounded">
                    <h1 class = "text-center">Create Task</h1>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                        <input type="text" name = "name"class="form-control" id="colFormLabel" placeholder="Name of the task" required>
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="text_area" class="form-label">Description:</label>
                        <textarea class="form-control" name = "description" id="text_area" rows="3"></textarea>
                    </div>
                    <div class = "row">
                        <div class = "col">
                            <label for="inlineRadio1" class="col-sm-2 col-form-label">Importance:</label>
                        </div>
                        <div class = "col">
                            <div class = "row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="importance" id="inlineRadio1" value="low" required>
                                    <label class="form-check-label" for="inlineRadio1">Low</label>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="importance" id="inlineRadio2" value="medium" required>
                                    <label class="form-check-label" for="inlineRadio2">Medium</label>
                                </div>
                            </div>
                            <div class = "row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="importance" id="inlineRadio3" value="high" required>
                                <label class="form-check-label" for="inlineRadio3">High</label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <button type = "submit" class = "btn btn-primary">Create</button>

                </form>
                <?php foreach($to_do as $task):?>
                    <div class="card mt-4">
                        <h5 class="card-header bg-<?=$importance_colors[$task->getImportance()];?>"><?=$task->getImportance();?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?=$task->getName();?></h5>
                            <p class="card-text"><?=$task->getDescription();?></p>
                            <div class="row gap-2">
                                <div class = "col">
                                    <form action = "/project_tasks/public/update" method="POST">
                                        <input type="hidden" name = "update_id" value = <?=$task->getId();?>>
                                        <input type="hidden" name = "update_status" value = <?=$task->getTaskStatus();?>>
                                        <button type = "submit" class = "btn btn-primary text-nowrap" >Update status</button>
                                    </form>
                                </div>
                                <div class = "col">
                                    <form action = "/project_tasks/public/delete" method="POST">
                                        <input type="hidden" name = "delete_id" value = <?=$task->getId();?>>
                                        <button type = "submit" class = "btn btn-danger text-nowrap">Delete task</button>
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class = "in_progress col-lg-4 bg-info-subtle p-4">
                <h1 class= "bg-info text-center p-2 rounded mt-3">In progress</h1>
                <?php foreach($in_progress as $task):?>
                    <div class="card mt-4">
                        <h5 class="card-header bg-<?=$importance_colors[$task->getImportance()];?>"><?=$task->getImportance();?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?=$task->getName();?></h5>
                            <p class="card-text"><?=$task->getDescription();?></p>
                                <div class="row gap-2">
                                    <div class = "col">
                                        <form action = "/project_tasks/public/update" method="POST">
                                            <input type="hidden" name = "update_id" value = <?=$task->getId();?>>
                                            <input type="hidden" name = "update_status" value = <?=$task->getTaskStatus();?>>
                                            <button type = "submit" class = "btn btn-primary text-nowrap" >Update status</button>
                                        </form>
                                    </div>
                                    <div class = "col">
                                        <form action = "/project_tasks/public/delete" method="POST">
                                            <input type="hidden" name = "delete_id" value = <?=$task->getId();?>>
                                            <button type = "submit" class = "btn btn-danger text-nowrap">Delete task</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class = "done col-lg-4 bg-success-subtle p-4">
                <h1 class = "bg-success text-center p-2 rounded mt-3">Done</h1>
                <?php foreach($done as $task):?>
                    <div class="card mt-4">
                        <h5 class="card-header bg-<?=$importance_colors[$task->getImportance()];?>"><?=$task->getImportance();?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?=$task->getName();?></h5>
                            <p class="card-text"><?=$task->getDescription();?></p>
                            <div class="row gap-2">
                                <div class = "col">
                                    <form action = "/project_tasks/public/update" method="POST">
                                        <input type="hidden" name = "update_id" value = <?=$task->getId();?>>
                                        <input type="hidden" name = "update_status" value = <?=$task->getTaskStatus();?>>
                                        <button type = "submit" class = "btn btn-primary text-nowrap" >Update status</button>
                                    </form>
                                </div>
                                <div class = "col">
                                    <form action = "/project_tasks/public/delete" method="POST">
                                        <input type="hidden" name = "delete_id" value = <?=$task->getId();?>>
                                        <button type = "submit" class = "btn btn-danger text-nowrap">Delete task</button>
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>