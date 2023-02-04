<?php

class Admin_addNew_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function checkUser($email)
    {
        $sql = "SELECT * FROM gamer WHERE email = '$email'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $count = $stmt->fetchAll();

        return $count;

        //add all types of validation testing here
    }

    public function insertUser($email, $username, $password, $firstname, $lastname,$userRole)
    {
        $sql = "INSERT INTO gamer (email, username, password, firstName, lastName,userRole) VALUES (?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$email", "$username", "$password", "$firstname", "$lastname","$userRole"]);
    }
}
