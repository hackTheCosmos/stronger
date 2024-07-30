<?php

session_start();
require_once "../Core/AsyncAtoloader.php";

$exercisesModel = new ExercisesModel;
$planningsModel = new PlanningsModel;
$usersModel = new UsersModel;

$exercisesModel->deleteExercises($_SESSION['id']);
$planningsModel->deletePlannings($_SESSION['id']);
$usersModel->deleteUser($_SESSION['id']);

session_destroy();



