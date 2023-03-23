<?php

class Launchcrowdfunding_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function launchNewCrowdfund(
        $crowdfundName,
        $tagline,
        $description,
        $gameName,
        $crowdfundEnddate,
        $expectedamount,
        $visibility,
        $crowdfundCoverImg,
        $crowdfundScreenshots,
        $crowdfundTrailer,
        $developerName
    ) {
        $sql = "INSERT INTO crowdfund (title, tagline, details, gameName, 
        deadline, expectedAmount, visibility, crowdfundCoverImg, 
        crowdfundSS, crowdfundTrailer, gameDeveloperName) VALUES 
        (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$crowdfundName",
            "$tagline",
            "$description",
            "$gameName",
            "$crowdfundEnddate",
            "$expectedamount",
            "$visibility",
            "$crowdfundCoverImg",
            "$crowdfundScreenshots",
            "$crowdfundTrailer",
            "$developerName"
        ]);
    }

    function currentDevGames($developerID)
    {
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID = '$developerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function uploadCoverImg($gameName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");
        $crowdfund_cover_img_name = $_FILES['crowdfund-upload-cover-img']['name'];
        $crowdfund_cover_img_temp_name = $_FILES['crowdfund-upload-cover-img']['tmp_name'];

        $crowdfund_cover_img_ext = strtolower(pathinfo($crowdfund_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($crowdfund_cover_img_ext, $allowed_exts)) {
            $new_crowdfund_cover_img_name = "Cover-" . $gameName . '.' . $crowdfund_cover_img_ext;
            $crowdfund_cover_upload_path = "public/uploads/crowdfundings/cover/" . $new_crowdfund_cover_img_name;
            move_uploaded_file($crowdfund_cover_img_temp_name, $crowdfund_cover_upload_path);
        }

        return $new_crowdfund_cover_img_name;
    }

    function uploadScreenshots($gameName)
    {

        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($_FILES['crowdfund-screenshots']['name']);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $_FILES['crowdfund-screenshots']['name'][$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/crowdfundings/screenshots/' . $newSSName;

                move_uploaded_file($_FILES['crowdfund-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }
}
