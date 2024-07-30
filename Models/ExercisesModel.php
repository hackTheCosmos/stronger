<?php

class ExercisesModel {
    public $id;
    public $name;
    public $weight;
    public $reps;
    public $series;
    public $user_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of reps
     */ 
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * Set the value of reps
     *
     * @return  self
     */ 
    public function setReps($reps)
    {
        $this->reps = $reps;

        return $this;
    }

    /**
     * Get the value of series
     */ 
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set the value of series
     *
     * @return  self
     */ 
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function insertExercise ($name, $weight, $reps, $series, $userId) : void {
        $query = "INSERT INTO exercises (name , weight, reps, series, user_id) VALUES (:name,:weight,:reps, :series, :user_id)";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":name" => $name,
            ":weight" => $weight,
            ":reps" => $reps,
            ":series" => $series,
            ":user_id" => $userId,
        ]);
    }

    public function delete ($exerciseId) : void {
        $query = "DELETE FROM exercises WHERE id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":id" => $exerciseId,
        ]);
    }

    public function countExercises($userId) {
        $query = "SELECT COUNT(id) FROM exercises WHERE user_id = $userId";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute();

        return $sth->fetch()[0];
    }

    public function getAllUserExercisesWithLimit($id, $limit, $offset) {
        $query = "SELECT * FROM exercises WHERE user_id = :id ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"ExercisesModel");
        $sth->execute([
            ":id" => $id,
        ]);

        return $sth->fetchAll();
    }

    public function getAllUserExercises($id) {
        $query = "SELECT * FROM exercises WHERE user_id = :id ORDER BY id DESC";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"ExercisesModel");
        $sth->execute([
            ":id" => $id,
        ]);

        return $sth->fetchAll();
    }

    public function getExerciceById ($id) {
        $query = "SELECT * FROM exercises WHERE id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"ExercisesModel");
        $sth->execute([
            ":id" => $id,
        ]);

        return $sth->fetch();
    }

    public function getExercisesByNameAndUserId($keyword, $userId) {
        $query = "SELECT * FROM exercises WHERE user_id = :user_id AND name LIKE :name LIMIT 8";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"ExercisesModel");
        $sth->execute([
            ":user_id" => $userId,
            ":name" => "$keyword%"
        ]);

        return $sth->fetchAll();
    }

    public function updateExercise ($exerciseId, $name, $weight, $reps, $series) {
        $query = "UPDATE exercises SET name = :name, weight = :weight, reps = :reps, series = :series WHERE id = :exercise_id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":exercise_id" => $exerciseId,
            ":name" => $name,
            ":weight" => $weight,
            ":reps" => $reps,
            ":series" => $series,
        ]);
    }

    public function addExerciseToPlanning($day, $exerciseId, $exerciseName, $userId) {
        $query = "INSERT INTO plannings (day_id, exercise_id, exercise_name, user_id) VALUES (:day_id, :exercise_id, :exercise_name, :user_id)";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":day_id" => $day,
            ":exercise_id" => $exerciseId,
            ":exercise_name" => $exerciseName,
            ":user_id" => $userId
        ]);
    }

    public function deleteExercises($id) {
        $query = "DELETE FROM exercises WHERE user_id = $id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute();
    }
  
}