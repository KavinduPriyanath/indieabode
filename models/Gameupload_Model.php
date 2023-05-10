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
        $GameOS,
        $GameProcessor,
        $GameMemory,
        $GameStorage,
        $GameGraphics,
        $GameOther,
        $platform,
        $gameType,
        $gamePrice
    ) {
        $sql = "INSERT INTO freegame (gameName, releaseStatus, 
        gameDetails, 
        gameTrailor, 
        gameTagline, 
        gameClassification, 
        gameTags, 
        gameFeatures, 
        gameFile, 
        gameCoverImg, 
        gameScreenshots,
        gameDeveloperID, 
        minOS, 
        minProcessor, 
        minMemory, 
        minStorage, 
        minGraphics, 
        recommendOS, 
        recommendProcessor, 
        recommendMemory, 
        recommendStorage, 
        recommendGraphics, 
        other, platform, gameType, gamePrice) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
            "$gameScreenshots",
            "$gameDeveloperID",
            "$minGameOS",
            "$minGameProcessor",
            "$minGameMemory",
            "$minGameStorage",
            "$minGameGraphics",
            "$GameOS",
            "$GameProcessor",
            "$GameMemory",
            "$GameStorage",
            "$GameGraphics",
            "$GameOther",
            "$platform",
            "$gameType",
            "$gamePrice"
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

    function uploadScreenshots($gameName)
    {

        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($_FILES['game-screenshots']['name']);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $_FILES['game-screenshots']['name'][$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $gameName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/games/ss/' . $newSSName;

                move_uploaded_file($_FILES['game-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    function uploadGameFile($gameName)
    {

        //Game File
        $game_file = $_FILES['upload-game']['name'];
        //$asset_file_size = $_FILES['upload-asset']['size'];
        $game_file_temp_name = $_FILES['upload-game']['tmp_name'];

        $game_file_ext = strtolower(pathinfo($game_file, PATHINFO_EXTENSION));

        $allowed_game_types = array("zip", "blend", "txt");

        if (in_array($game_file_ext, $allowed_game_types)) {
            $new_game_file_name = "Game-" . $gameName . '.' . $game_file_ext;
            $game_upload_path = 'public/uploads/games/file/' . $new_game_file_name;
            move_uploaded_file($game_file_temp_name, $game_upload_path);
        } else if (!in_array($game_file_ext, $allowed_game_types) && $game_file) {
            $incompatibleFileType = true;
        }

        return $new_game_file_name;
    }
}
