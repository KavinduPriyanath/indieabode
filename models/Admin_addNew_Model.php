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

    public function insertUser($email, $username, $password)
    {
        $sql = "INSERT INTO admin (email, username, password) VALUES (?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$email", "$username", "$password"]);
    }
}
