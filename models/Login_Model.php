<?php

class Login_Model extends Model
{
    private $_loggedIn = false;


    function __construct()
    {
        parent::__construct();
        //session_start();
    }

    public function signin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM gamer WHERE email = '$email' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
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

    public function OTPGeneration($userID)
    {

        $otpCode = rand(10000, 99999);

        $sql = "INSERT INTO activation_keys VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$userID", "$otpCode"]);

        return $otpCode;
    }

    public function OTPValidation($first, $second, $third, $fourth, $fifth, $userID)
    {

        $sql = "SELECT * FROM activation_keys WHERE userID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $activationKey = $user['activationCode'];

        if ($activationKey[0] == $first && $activationKey[1] == $second && $activationKey[2] == $third && $activationKey[3] == $fourth && $activationKey[4] == $fifth) {
            return true;
        } else {
            return false;
        }
    }

    function ActivateAccount($userID)
    {

        $sql = "UPDATE gamer SET verified=1 WHERE gamerID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}