<?php

class PlanningsModel {
    public $id;
    public $exercise_id;
    public $exercise_name;
    public $day_id;
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
     * Get the value of exercise_id
     */ 
    public function getExercise_id()
    {
        return $this->exercise_id;
    }

    /**
     * Set the value of exercise_id
     *
     * @return  self
     */ 
    public function setExercise_id($exercise_id)
    {
        $this->exercise_id = $exercise_id;

        return $this;
    }

    /**
     * Get the value of exercise_name
     */ 
    public function getExercise_name()
    {
        return $this->exercise_name;
    }

    /**
     * Set the value of exercise_name
     *
     * @return  self
     */ 
    public function setExercise_name($exercise_name)
    {
        $this->exercise_name = $exercise_name;

        return $this;
    }

    /**
     * Get the value of day_id
     */ 
    public function getDay_id()
    {
        return $this->day_id;
    }

    /**
     * Set the value of day_id
     *
     * @return  self
     */ 
    public function setDay_id($day_id)
    {
        $this->day_id = $day_id;

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

    public function checkIfExercise($day, $exerciseId, $userId) {
        $query = "SELECT * FROM plannings WHERE day_id = :day_id AND exercise_id = :exercise_id AND user_id = :user_id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":day_id" => $day,
            ":exercise_id" => $exerciseId,
            ":user_id" => $userId
        ]);

        $result =  $sth->fetch();
        if($result) {
            return true;
        } else {
            return false;
        }

    }

    public function getExercisesByDay($exerciseDay, $userId) {
        $query = "SELECT * FROM plannings WHERE day_id = :day_id  AND user_id = :user_id";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"PlanningsModel");
        $sth->execute([
            ":day_id" => $exerciseDay,
            ":user_id" => $userId,
        ]);

        return $sth->fetchAll();
    }


    public function getExercisesByDayAndUserId($dayId, $userId) {
        $query = "SELECT * FROM plannings WHERE user_id = :user_id AND day_id = :day_id";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"PlanningsModel");
        $sth->execute([
            ":user_id" => $userId,
            ":day_id" => $dayId
        ]);

        return $sth->fetchAll();
    }


    public function deleteById($id){
        $query = "DELETE FROM plannings WHERE id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":id" => $id,
        ]);
    }

    public function deleteByExerciceId($id){
        $query = "DELETE FROM plannings WHERE exercise_id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":id" => $id,
        ]);
    }

    public function deletePlannings($id) {
        $query = "DELETE FROM plannings WHERE user_id = $id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute();
    }
}