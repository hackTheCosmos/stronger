<?php
class planningController {

    public static function getPlanning() {

        if(isset($_SESSION['id'])) {

            $planningsModel = new PlanningsModel;
            $userId = $_SESSION['id'];
            $exercises1 = $planningsModel->getExercisesByDay(1, $userId);
            $exercises2 = $planningsModel->getExercisesByDay(2, $userId); 
            $exercises3 = $planningsModel->getExercisesByDay(3, $userId); 
            $exercises4 = $planningsModel->getExercisesByDay(4, $userId); 
            $exercises5 = $planningsModel->getExercisesByDay(5, $userId); 
            $exercises6 = $planningsModel->getExercisesByDay(6, $userId); 
            $exercises7 = $planningsModel->getExercisesByDay(7, $userId);  
            
            $daysModel = new DaysModel;
            $days = $daysModel->getDays(); 

            $pageTitle = "Mon planning - Stronger";
            
            Renderer::render("Views/planning/planning.php", [
                "pageTitle" => $pageTitle, "exercises1" => $exercises1, "exercises2" => $exercises2, "exercises3" => $exercises3, "exercises4" => $exercises4, "exercises5" => $exercises5, "exercises6" => $exercises6, "exercises7" => $exercises7, 'days' => $days
            
            ]);
        }
    }
}