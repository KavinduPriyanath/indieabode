<?php

class Passwordreset_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function CheckLinkValidity($userID, $token)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['token'] == $token) {
            return true;
        } else {
            return false;
        }
    }
}
