<?php

class AssetUpload_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function uploadNewAsset(
        $assetName,
        $assetPrice,
        $assetDetails,
        $assetTagline,
        $foreignKey,
        $assetClassification,
        $assetStatus,
        $assetTags,
        $assetType,
        $assetStyle,
        $assetLicense,
        $assetVideoUrl,
        $assetVisibility,
        $assetFile,
        $assetCoverImg,
        $assetScreenshots

    ) {
        $sql = "INSERT INTO freeasset (assetName,
        assetPrice,
        assetDetails, 
        assetTagline, 
        assetCreatorID, 
        assetClassification, 
        assetReleaseStatus, 
        assetTags, 
        assetType,
        assetStyle,
        assetLicense, 
        assetVideoURL,
        assetVisibility,
        assetFile, 
        assetCoverImg, 
        assetScreenshots
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$assetName",
            "$assetPrice",
            "$assetDetails",

            "$assetTagline",
            "$foreignKey",

            "$assetClassification",
            "$assetStatus",
            "$assetTags",
            "$assetType",
            "$assetStyle",
            "$assetLicense",
            "$assetVideoUrl",
            "$assetVisibility",
            "$assetFile",
            "$assetCoverImg",
            "$assetScreenshots"

        ]);
    }

    public function uploadCoverImg($assetName)
    {
        //upload cover image
        $allowed_exts = array("jpg", "jpeg", "png");
        $asset_cover_img_name = $_FILES['asset-upload-cover-img']['name'];
        $asset_cover_img_temp_name = $_FILES['asset-upload-cover-img']['tmp_name'];

        $asset_cover_img_ext = strtolower(pathinfo($asset_cover_img_name, PATHINFO_EXTENSION));

        if (in_array($asset_cover_img_ext, $allowed_exts)) {
            $new_asset_cover_img_name = "Cover-" . $assetName . '.' . $asset_cover_img_ext;
            $asset_cover_upload_path = "public/uploads/assets/cover/" . $new_asset_cover_img_name;
            move_uploaded_file($asset_cover_img_temp_name, $asset_cover_upload_path);
        }

        return $new_asset_cover_img_name;
    }

    function uploadScreenshots($assetName)
    {

        //Screenshots
        $allowed_exts = array("jpg", "jpeg", "png");
        $screenshots = [];
        $ssCount = count($_FILES['asset-screenshots']['name']);
        for ($i = 0; $i < $ssCount; $i++) {
            $ssName = $_FILES['asset-screenshots']['name'][$i];
            $ssExt = strtolower(pathinfo($ssName, PATHINFO_EXTENSION));
            if (in_array($ssExt, $allowed_exts)) {

                $newSSName = "SS-" . $assetName . '-' . $i . '.' . $ssExt;
                $ss_upload_path = 'public/uploads/assets/ss/' . $newSSName;

                move_uploaded_file($_FILES['asset-screenshots']['tmp_name'][$i], $ss_upload_path);

                array_push($screenshots, $newSSName);
            }
        }

        $screenshotsURL = implode(',', $screenshots);

        return $screenshotsURL;
    }

    function uploadassetFile($assetName)
    {

        //asset File
        $asset_file = $_FILES['upload-asset']['name'];
        //$asset_file_size = $_FILES['upload-asset']['size'];
        $asset_file_temp_name = $_FILES['upload-asset']['tmp_name'];

        $asset_file_ext = strtolower(pathinfo($asset_file, PATHINFO_EXTENSION));

        $allowed_asset_types = array("zip", "blend", "txt");

        if (in_array($asset_file_ext, $allowed_asset_types)) {
            $new_asset_file_name = "asset-" . $assetName . '.' . $asset_file_ext;
            $asset_upload_path = 'public/uploads/assets/file/' . $new_asset_file_name;
            move_uploaded_file($asset_file_temp_name, $asset_upload_path);
        } else if (!in_array($asset_file_ext, $allowed_asset_types) && $asset_file) {
            $incompatibleFileType = true;
        }

        return $new_asset_file_name;
    }

    function UpdateAssetStats($assetName)
    {

        $sql = "SELECT * FROM freeasset WHERE assetName='$assetName' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $uploadedAsset = $stmt->fetch(PDO::FETCH_ASSOC);

        $insertSQL = "INSERT INTO asset_stats(assetID, downloads, views, ratings, ratingCount) VALUES (?,?,?,?,?) ";

        $stmtInsert = $this->db->prepare($insertSQL);

        $assetID = $uploadedAsset['assetID'];

        $stmtInsert->execute([
            "$assetID",
            "0",
            "0",
            "0",
            "0"
        ]);
    }

    function AssetNameAvailabilityCheck($assetName, $userID)
    {

        $sql = "SELECT * FROM freeasset WHERE assetName='$assetName' AND assetCreatorID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($game)) {
            return "true";
        } else {
            return "false";
        }
    }

    function CheckAssetNameWholeSite($assetName, $userID)
    {

        $Namesql = "SELECT * FROM freeasset WHERE assetName='$assetName' AND NOT assetCreatorID='$userID'";

        $Namestmt = $this->db->prepare($Namesql);

        $Namestmt->execute();

        return $Namestmt->fetch(PDO::FETCH_ASSOC);
    }
}
