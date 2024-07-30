<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

$exercisesModel = new ExercisesModel;
$planningsModel = new PlanningsModel;
if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $exercises = $exercisesModel->getExercisesByNameAndUserId($keyword, $_SESSION['id']);

    foreach($exercises as $exercise): ?>
        <div class="exercise__wrapper">
            <a class = "trash__link" href="index.php?action=delete&id=<?= $exercise->id?>">
                <i class="fa-solid fa-trash-can trash__button"></i>
            </a>
            <a class = "update__link" href="index.php?action=update&id=<?= $exercise->id?>">
                <i class="fa-solid fa-pencil update__button"></i>
            </a>
            <h2><?= $exercise->name ?></h2>
            <p>Charge : <?= $exercise->weight ?> Kg</p>
            <p>Nombre de répétitions : <?= $exercise->reps ?></p>
            <p>Nombre de séries : <?= $exercise->series ?></p>
        </div>
    <?php endforeach;

} else {
    if(isset($_POST['all']) && isset($_POST['currentPage'])) {
        $currentPage = $_POST['currentPage'];
        $nbOfExercices = $exercisesModel->countExercises($_SESSION['id']);
     
        $limit = 6;
        $numberOfPages = ceil($nbOfExercices / $limit);
        $exercises = $exercisesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, 0);

       foreach($exercises as $exercise): ?>
            <div class="exercise__wrapper">
                <a class = "trash__link" href="index.php?action=delete&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-trash-can trash__button"></i>
                </a>
                <a class = "update__link" href="index.php?action=update&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-pencil update__button"></i>
                </a>
                <h2><?= $exercise->name ?></h2>
                <p>Charge : <?= $exercise->weight ?> Kg</p>
                <p>Nombre de répétitions : <?= $exercise->reps ?></p>
                <p>Nombre de séries : <?= $exercise->series ?></p>
            </div>
            <?php endforeach;
        
    }
}

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    if(isset($_GET['id'])) {

        $exerciseId = $_GET['id'];
        $exercisesModel->delete($exerciseId);
        $planningsModel->deleteByExerciceId($exerciseId);

        $currentPage = 1;
        $nbOfExercices = $exercisesModel->countExercises($_SESSION['id']);
     
        $limit = 6;
        $numberOfPages = ceil($nbOfExercices / $limit);
        $exercises = $exercisesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, 0);

       
            
    
        foreach($exercises as $exercise): ?>
            <div class="exercise__wrapper">
                <a class = "trash__link" href="index.php?action=delete&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-trash-can trash__button"></i>
                </a>
                <a class = "update__link" href="index.php?action=update&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-pencil update__button"></i>
                </a>
                <h2><?= $exercise->name ?></h2>
                <p>Charge : <?= $exercise->weight ?> Kg</p>
                <p>Nombre de répétitions : <?= $exercise->reps ?></p>
                <p>Nombre de séries : <?= $exercise->series ?></p>
            </div>
            <?php endforeach;
    }
}

if(isset($_GET['action']) && $_GET['action'] == "update") {
    if(isset($_GET['id'])) {
        $exerciseId = $_GET['id'];
        $exercise = $exercisesModel->getExerciceById($exerciseId);
        if(isset($_GET['name'])) {
            if(empty($_GET['name'])) {
                $name = $exercise->name;
            } else {
                $name = $_GET['name'];
            }
        }

        if(isset($_GET['weight'])) {
            if(empty($_GET['weight'])) {
                $weight = $exercise->weight;
            } else {
                $weight = $_GET['weight'];
            }
        }
        if(isset($_GET['reps'])) {
            if(empty($_GET['reps'])) {
                $reps = $exercise->reps;
            } else {
                $reps = $_GET['reps'];
            }
        }
        if(isset($_GET['series'])) {
            if(empty($_GET['series'])) {
                $series = $exercise->series;
            } else {
                $series = $_GET['series'];
            }
        }

        
        $exercisesModel->updateExercise($exerciseId, $name, $weight, $reps, $series);

        $currentPage = 1;
        $nbOfExercices = $exercisesModel->countExercises($_SESSION['id']);
     
        $limit = 6;
        $numberOfPages = ceil($nbOfExercices / $limit);
        $exercises = $exercisesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, 0);
            
        foreach($exercises as $exercise): ?>
            <div class="exercise__wrapper">
                <a class = "trash__link" href="index.php?action=delete&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-trash-can trash__button"></i>
                </a>
                <a class = "update__link" href="index.php?action=update&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-pencil update__button"></i>
                </a>
                <h2><?= $exercise->name ?></h2>
                <p>Charge : <?= $exercise->weight ?> Kg</p>
                <p>Nombre de répétitions : <?= $exercise->reps ?></p>
                <p>Nombre de séries : <?= $exercise->series ?></p>
            </div>
            <?php endforeach;
    }
}

