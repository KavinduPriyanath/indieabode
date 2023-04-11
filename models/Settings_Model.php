<?php

class Settings_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function UserInfo($userID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function UpdateUserInfo($userID, $username, $avatar)
    {

        $sql = "UPDATE gamer SET username='$username', avatar='$avatar' WHERE gamerID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function ExistingUsernameCheck($username, $userID)
    {

        $sql = "SELECT * FROM gamer WHERE username='$username' AND gamerID != '$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function currentUserBilling($userID)
    {

        $sql = "SELECT * FROM billing_addresses WHERE userID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);


        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    function addUserBillingData($fullName, $street1, $street2, $city, $province, $postalCode, $country, $userID)
    {

        $checkSQL = "SELECT * FROM billing_addresses WHERE userID='$userID' LIMIT 1";

        $checkStmt = $this->db->prepare($checkSQL);

        $checkStmt->execute();

        $hasBilling = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if (empty($hasBilling)) {

            $sql = "INSERT INTO billing_addresses (userID, fullName, streetLine1, streetLine2, city, province, zipCode, country) 
                VALUES (?,?,?,?,?,?,?,?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute(["$userID", "$fullName", "$street1", "$street2", "$city", "$province", "$postalCode", "$country"]);
        } else {

            $updateSQL = "UPDATE billing_addresses SET 
                    fullName = '$fullName',
                    streetLine1 = '$street1',
                    streetLine2 = '$street2',
                    city = '$city',
                    province = '$province', 
                    zipCode = '$postalCode', 
                    country = '$country' WHERE userID='$userID'";

            $updatestmt = $this->db->prepare($updateSQL);

            $updatestmt->execute();
        }
    }
}
