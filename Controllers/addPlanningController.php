<?php
class addPlanningController {

    public static function getAddPlanning() {
        if(isset($_SESSION['id'])) {

            
            $planningsModel = new PlanningsModel;
            $exercicesModel = new ExercisesModel;
            $nbOfExercices = $exercicesModel->countExercises($_SESSION['id']);
    
            //pagination
            $limit = 6;
            $numberOfPages = ceil($nbOfExercices / $limit);
            if(isset($_GET['pagination'])){
                $currentPage = $_GET['pagination'];
            } else {
                $currentPage = 1;
            }

            $offset = ($currentPage - 1)*$limit;

            $exercises = $exercicesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, $offset);

            if($exercises == null) {
                header("Location:index.php?page=addPlanning#anchor");
            }
            if(isset($_GET['day'])) {
                $day= $_GET['day'];
            }
            

            
            $pageTitle = "Ajouter à mon planning - Stronger";
            
            Renderer::render("Views/planning/addPlanning.php", [
                "pageTitle" => $pageTitle, "exercises" => $exercises, "nbOfPages" => $numberOfPages, "currentPage" => $currentPage, "day" => $day, "planningsModel" => $planningsModel
                
            ]);
        }
    }
}