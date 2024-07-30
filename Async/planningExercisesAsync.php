<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

$planningsModel = new PlanningsModel;
$daysModel = new DaysModel;

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    if(isset($_GET['id']) && isset($_GET['day'])) {

        $exerciseId = $_GET['id'];
        $dayId = $_GET['day'];
        
        $days = $daysModel->getDays();

        $planningsModel->deleteById($exerciseId);
        
        foreach($days as $day):
        $exercises = $planningsModel->getExercisesByDayAndUserId($day->id,$_SESSION['id']);?>
        <div class="day__item__wrapper">
        
            <div class="header">
                <h2><?= $day->name ?></h2>
                <div class="add__link__wrapper">
                    <a href="index.php?page=addPlanning&day=<?=$day->id?>">
                        <i class="fa-regular fa-square-plus"></i>
                        ajouter un exercice
                    </a>
                </div>
            </div>

            <div class="exercises__wrapper">
                <?php foreach($exercises as $exercise):?>

                <div class="exercise__wrapper">
                    <h3><?= $exercise->exercise_name ?></h3>
                    <a class ="delete__link" href="index.php?action=delete&day=<?=$exercise->day_id?>&id=<?= $exercise->id?>">
                        <i class="fa-solid fa-trash-can trash__button"></i>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
            
        <?php endforeach;
    }
}