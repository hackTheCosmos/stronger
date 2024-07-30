<?php

class DaysModel {
    public $id;
    public $name;

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

    public function getDays() {

        $query = "SELECT * FROM days";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"DaysModel");
        $sth->execute();

        return $sth->fetchAll();
        
    }

    public function getDayById($id) {
        $query = "SELECT * FROM days WHERE id = :day_id";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"DaysModel");
        $sth->execute([
            ":day_id" => $id
        ]);

        return $sth->fetch();
    }
}