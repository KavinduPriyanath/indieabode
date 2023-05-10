<?php

class Makedevlog_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function addNewDevlog(
        $name,
        $tagline,
        $description,
        $type,
        $visibility,
        $devlogImg,
        $gameName,
    ) {
        $sql = "INSERT INTO devlog (name, Tagline, description,
        Type, Visibility, devlogImg, gameName) VALUES 
        (?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$name",
            "$tagline",
            "$description",
            "$type",
            "$visibility",
            "$devlogImg",
            "$gameName",
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
        $devlog_cover_img_name = $_FILES['devlog_ss']['name'];
        $devlog_cover_img_temp_name = $_FILES['devlog_ss']['tmp_name'];

        $devlog_cover_img_ext = strtolower(pathinfo($devlog_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($devlog_cover_img_ext, $allowed_exts)) {
            $new_devlog_cover_img_name = "SS-" . $gameName . '.' . $devlog_cover_img_ext;
            $devlog_cover_upload_path = "public/uploads/devlogs/" . $new_devlog_cover_img_name;
            move_uploaded_file($devlog_cover_img_temp_name, $devlog_cover_upload_path);
        }

        return $new_devlog_cover_img_name;
    }

    function DevlogPostTypes()
    {
        $sql = "SELECT * FROM devlog_posttype";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
