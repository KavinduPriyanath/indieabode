<?php

class Gameupload_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function uploadNewGame(
        $gameName,
        $releaseStatus,
        $gameDetails,
        $gameScreenshots,
        $gameTrailor,
        $gameTagline,
        $gameClassification,
        $gameTags,
        $gameFeatures,
        $gameFile,
        $gameCoverImg,
        $gameDeveloperID,
        $minGameOS,
        $minGameProcessor,
        $minGameMemory,
        $minGameStorage,
        $minGameGraphics,
        $minGameOther,
        $GameOS,
        $GameProcessor,
        $GameMemory,
        $GameStorage,
        $GameGraphics,
        $GameOther
    ) {
        $sql = "INSERT INTO freegame (gameName, releaseStatus, 
        gameDetails, 
        gameTrailor, 0
        gameTagline, 
        gameClassification, 
        gameTags, 
        gameFeatures, 
        gameFile, 
        gameCoverImg, 
        gameDeveloperID, 
        minOS, 
        minProcessor, 
        minMemory, 
        minStorage, 
        minGraphics, 
        minOther, 
        recommendOS, 
        recommendProcessor, 
        recommendMemory, 
        recommendStorage, 
        recommendGraphics, 
        recommendOther) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$gameName",
            "$releaseStatus",
            "$gameDetails",
            "$gameTrailor",
            "$gameTagline",
            "$gameClassification",
            "$gameTags",
            "$gameFeatures",
            "$gameFile",
            "$gameCoverImg",
            "$gameDeveloperID",
            "$minGameOS",
            "$minGameProcessor",
            "$minGameMemory",
            "$minGameStorage",
            "$minGameGraphics",
            "$minGameOther",
            "$GameOS",
            "$GameProcessor",
            "$GameMemory",
            "$GameStorage",
            "$GameGraphics",
            "$GameOther"
        ]);
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
            $game_cover_upload_path = "public/uploads/games/cover/" . $new_game_cover_img_name;
            move_uploaded_file($game_cover_img_temp_name, $game_cover_upload_path);
        }

        return $new_game_cover_img_name;
    }
}
