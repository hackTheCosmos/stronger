<?php

class createExerciseController {

    public static function getCreateExercise() {
        if(isset($_SESSION['id'])){
            if(isset($_POST['add__exercise'])) {
                if(isset($_POST['name']) && !empty($_POST['name'])) {
                    $name = Form::sanitize($_POST['name']);
                
                    if(isset($_POST['weight'])) {
                        if(!empty($_POST['weight'])) {
                            $weight = Form::sanitize($_POST['weight']);
                        } else {
                            $weight = "";
                        }
                    }
                    if(isset($_POST['reps'])) {
                        if(!empty($_POST['reps'])) {
                            $reps = Form::sanitize($_POST['reps']);
                        } else {
                            $reps = "";
                        }
                    }
                    if(isset($_POST['series'])) {
                        if(!empty($_POST['series'])) {
                            $series = Form::sanitize($_POST['series']);
                        } else {
                            $series = "";
                        }
                    }

                    $exercisesModel = new ExercisesModel;
                    $exercisesModel->insertExercise ($name, $weight, $reps, $series, $_SESSION['id']);

                    sleep(3);
                    header("Location: index.php?page=createExercise");
                    die;
                }
            }
            $pageTitle = "Créeation d'exercises - Stronger";
            
            Renderer::render("Views/users/createExercise.php", [
                "pageTitle" => $pageTitle
            ]);
        }
    }
}