<?php

class Forgotpassword_Model extends Model
{
    private $_loggedIn = false;


    function __construct()
    {
        parent::__construct();
        //session_start();
    }


    public function resetPassword()
    {
        $email = $_POST['email'];

        $sql = "SELECT * FROM gamer WHERE email = '$email' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    function UpdateToken($userID, $token)
    {

        $sql = "UPDATE gamer SET token='$token' WHERE gamerID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function ResetUserPassword($userID, $token, $password, $newToken)
    {

        $sql = "UPDATE gamer SET 
                password = '$password',
                token = '$newToken' WHERE gamerID= '$userID' AND token='$token'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
