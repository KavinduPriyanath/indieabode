<?php

class Creategig_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function addNewGig(
        $gigName,
        $tagline,
        $description,
        $gameName,
        $currentStage,
        $plannedReleaseDate,
        $estimatedShare,
        $expectedCost,
        $visibility,
        $gigCoverImg,
        $gigScreenshots,
        $gigTrailer,
        $developerID
    ) {
        $sql = "INSERT INTO gig (gigName, gigTagline, gigDetails, game, currentStage, 
        plannedReleaseDate, estimatedShare, expectedCost, visibility, gigCoverImg, 
        gigScreenshot, gigTrailor, gameDeveloperID) VALUES 
        (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$gigName",
            "$tagline",
            "$description",
            "$gameName",
            "$currentStage",
            "$plannedReleaseDate",
            "$estimatedShare",
            "$expectedCost",
            "$visibility",
            "$gigCoverImg",
            "$gigScreenshots",
            "$gigTrailer",
            "$developerID"
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
        $game_cover_img_name = $_FILES['game-upload-cover-img']['name'];
        $game_cover_img_temp_name = $_FILES['game-upload-cover-img']['tmp_name'];

        $game_cover_img_ext = strtolower(pathinfo($game_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($game_cover_img_ext, $allowed_exts)) {
            $new_game_cover_img_name = "Cover-" . $gameName . '.' . $game_cover_img_ext;
            $game_cover_upload_path = "public/uploads/gigs/cover/" . $new_game_cover_img_name;
            move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
        }

        return $new_game_cover_img_name;
    }

    function uploadScreenshots($gameName)
    {

        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($_FILES['gig-screenshots']['name']);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $_FILES['gig-screenshots']['name'][$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/gigs/screenshots/' . $newSSName;

                move_uploaded_file($_FILES['gig-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }
}
