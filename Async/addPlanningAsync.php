<?php
session_start();
require_once "../Core/AsyncAtoloader.php";

$exercisesModel = new ExercisesModel;
$planningsModel = new PlanningsModel;

if(isset($_POST['keyword']) && isset($_POST['day'])) {
    $day = $_POST['day'];
    $keyword = $_POST['keyword'];
    $exercises = $exercisesModel->getExercisesByNameAndUserId($keyword, $_SESSION['id']);

    foreach($exercises as $exercise):
        $exist = $planningsModel->checkIfExercise($day, $exercise->id, $_SESSION['id']);
            if($exist) {
                $checkIcon = "<i class='fa-solid fa-check'></i>";
                
            } else {
                $checkIcon = "";
            }?>
            <div class="exercise__wrapper">
            <?= $checkIcon ?>
                <h2><?=$exercise->name ?></h2>
                <button class ="add__exercise__button" data-name ="<?=$exercise->name?>"id="<?=$exercise->id?>">
                    Ajouter à mon planning
                </button>
        </div>
        <?php endforeach;
} else {
        if(isset($_POST['all']) && isset($_POST['day'])) {
            $day = $_POST['day'];
            $currentPage = 1;
            $nbOfExercices = $exercisesModel->countExercises($_SESSION['id']);
        
            $limit = 6;
            $numberOfPages = ceil($nbOfExercices / $limit);
            $exercises = $exercisesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, 0);
        
            
            foreach($exercises as $exercise):
                $exist = $planningsModel->checkIfExercise($day, $exercise->id, $_SESSION['id']);
                    if($exist) {
                        $checkIcon = "<i class='fa-solid fa-check'></i>";
                        
                    } else {
                        $checkIcon = "";
                    }?>
                    <div class="exercise__wrapper">
                    <?= $checkIcon ?>
                        <h2><?=$exercise->name ?></h2>
                        <button class ="add__exercise__button" data-name ="<?=$exercise->name?>"id="<?=$exercise->id?>">
                            Ajouter à mon planning
                        </button>
                </div>
                <?php endforeach;?>

            <div class="pagination">

            <?php if($currentPage > 1):?>
                    <a href="index.php?page=addPlanning&pagination=<?=$currentPage -1 ?>"><i class="fa-solid fa-angle-left"></i></a>
                <?php endif;
                for($i=1; $i<= $numberOfPages; $i++):
                
                if($currentPage!= $i): ?>
                    <a href="index.php?page=addPlanning&pagination=<?=$i?>"><?= $i ?></a>
                <?php else : ?>
                        <a class = "active" href="index.php?page=addPlanning&pagination=<?=$i?>"><?= $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>
                <?php if($currentPage < $numberOfPages):?>
                    <a href="index.php?page=addPlanning&pagination=<?=$currentPage + 1 ?>"><i class="fa-solid fa-angle-right"></i></a>
                <?php endif; ?>
            </div>
    <?php }
} 
                
if(isset($_GET['day']) && isset($_GET['exerciseId']) && isset($_GET['exerciseName'])) {
   

    $day = $_GET['day'];
    $exerciseId = $_GET['exerciseId'];
    $exerciseName = $_GET['exerciseName'];
    $registeredExercise = $planningsModel->checkIfExercise($day, $exerciseId, $_SESSION['id']);
    if(!$registeredExercise) {
        $exercisesModel->addExerciseToPlanning($day, $exerciseId, $exerciseName, $_SESSION['id']);
    }
}
