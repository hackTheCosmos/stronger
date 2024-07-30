<?php

class exercisesController {

    public static function getExercises() {

        if(isset($_SESSION['id'])) {
            $exercisesModel = new ExercisesModel;

            if(isset($_POST['add__exercise'])){
                if(!empty($_POST['name'])) {
                    $name = Form::sanitize($_POST['name']);
                    $weight = Form::sanitize($_POST['weight']);
                    $reps = Form::sanitize($_POST['reps']);
                    $series = Form::sanitize($_POST['series']);
                    $userId = $_SESSION['id'];
                    $exercisesModel->insertExercise($name, $weight, $reps, $series, $userId);
                    header("Location:index.php?page=exercises");
                    die;
                }
            }

            $nbOfExercices = $exercisesModel->countExercises($_SESSION['id']);

            //pagination
            $limit = 6;
            $numberOfPages = ceil($nbOfExercices / $limit);
            if(isset($_GET['pagination'])){
                $currentPage = $_GET['pagination'];
            } else {
                $currentPage = 1;
            }

            $offset = ($currentPage - 1)*$limit;

            $exercises = $exercisesModel->getAllUserExercisesWithLimit($_SESSION['id'], $limit, $offset);

            if(!$exercises) {
                header("Location:index.php?page=createExercise");
            }

            $pageTitle = "Mes exercices - Stronger";
            
            Renderer::render("Views/users/exercises.php", [
                "pageTitle" => $pageTitle, "exercises" => $exercises, "nbOfPages" => $numberOfPages, "currentPage" => $currentPage
            
            ]);
        }
    }
}