<?php

class Settings_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    //Functions for profile page of the settings page

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

    //Functions for portfolio page of the settings page

    function currentUserPortfolio($userID)
    {

        $sql = "SELECT * FROM account WHERE userID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updateCurrentUserPortfolio($userID, $displayName, $displayImg, $description, $website, $twitter, $linkedin, $location, $phoneNumber)
    {

        $sql = "UPDATE account SET
                displayName='$displayName',
                profilePhoto='$displayImg',
                website='$website',
                twitter='$twitter',
                linkedin='$linkedin',
                location='$location',
                introduction='$description',
                phoneNumber='$phoneNumber' WHERE userID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    public function uploadPortfolioImg($userID)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");
        $game_cover_img_name = $_FILES['portfolio-img']['name'];
        $game_cover_img_temp_name = $_FILES['portfolio-img']['tmp_name'];

        $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($game_cover_img_ext, $allowed_exts)) {
            $new_game_cover_img_name = "Portfolio-" . $userID . '.' . $game_cover_img_ext;
            $game_cover_upload_path = "public/uploads/portfolio/" . $new_game_cover_img_name;
            move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
        }

        return $new_game_cover_img_name;
    }


    //Functions for billing address page of the settings page

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
