<?php

class UsersModel {
    public $id;
    public $email;
    public $pass;
    public $new_password;
    public $admin;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPass($password)
    {
        $this->pass = $password;

        return $this;
    }

    /**
     * Get the value of new_password
     */ 
    public function getNew_password()
    {
        return $this->new_password;
    }

    /**
     * Set the value of new_password
     *
     * @return  self
     */ 
    public function setNew_password($new_password)
    {
        $this->new_password = $new_password;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    public function insertUser ($email, $password) : void {
        $query = "INSERT INTO users (email, pass) VALUES (:email,:pass)";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":email" => $email,
            ":pass" => $password
        ]);
    }

    public function getByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"UsersModel");
        $sth->execute([
            ":email" => $email
        ]);

        return $sth->fetch();
    }

    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $sth = Db::getDbh()->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS,"UsersModel");
        $sth->execute([
            ":email" => $email
        ]);

        return $sth->fetch();
    }

    public function updateNewPassword(string $password, string $email) :void {
        $query = "UPDATE users SET pass = :pass, new_password= :new_password WHERE email = :email";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":pass" => $password,
            ":new_password" => 1,
            ":email" => $email
        ]);
    }

    public function refreshNewPassword($email) :void {
        $query = "UPDATE users SET new_password= :new_password WHERE email = :email";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":new_password" => 0,
            ":email" => $email
        ]);
    }

    public function updateEmail($email, $userId) {
        $query = "UPDATE users SET email= :email WHERE id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":email" => $email,
            ":id" => $userId
        ]);
    }

    public function updatePassword($password, $userId) {
        $query = "UPDATE users SET pass= :pass WHERE id = :id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute([
            ":pass" => $password,
            ":id" => $userId
        ]);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = $id";
        $sth = Db::getDbh()->prepare($query);
        $sth->execute();
    }
}