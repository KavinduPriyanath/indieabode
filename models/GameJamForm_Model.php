<?php

class GameJamForm_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function hostGameJam(
        $gamejamTitle,
        $gamejamTagline,
        $jamStartDate,
        $jamEndtDate,
        $jamVEndDate,
        $jamContent,
        $jamType,
        $jamCriteria,
        $jamVisibility,
        $jamHostID,
        $jamVoters,
        $jamTwitterHashtag,
        $jamCoverImg,
        $jamTheme
    ) {
        $sql = "INSERT INTO gamejam (jamTitle, jamTagline, 
        submissionStartDate, 
        submissionEndDate,
        votingEndDate,  
        jamContent, 
        jamType, 
        jamCriteria, 
        jamVisibility, 
        jamHostID, 
        jamVoters, 
        jamTwitter, 
        jamCoverImg,
        jamTheme) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$gamejamTitle",
            "$gamejamTagline",
            "$jamStartDate",
            "$jamEndtDate",
            "$jamVEndDate",
            "$jamContent",
            "$jamType",
            "$jamCriteria",
            "$jamVisibility",
            "$jamHostID",
            "$jamVoters",
            "$jamTwitterHashtag",
            "$jamCoverImg",
            "$jamTheme"
        ]);
    }

    public function uploadCoverImg($gamejamTitle)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");
        $jam_cover_img_name = $_FILES['coverImg']['name'];
        $jam_cover_img_temp_name = $_FILES['coverImg']['tmp_name'];

        $jam_cover_img_ext = strtolower(pathinfo($jam_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($jam_cover_img_ext, $allowed_exts)) {
            $new_jam_cover_img_name = "Cover-" . $gamejamTitle . '.' . $jam_cover_img_ext;
            $jam_cover_upload_path = "public/uploads/gamejams/covers/" . $new_jam_cover_img_name;
            move_uploaded_file($jam_cover_img_temp_name, $jam_cover_upload_path);
        }

        return $new_jam_cover_img_name;
    }
}
