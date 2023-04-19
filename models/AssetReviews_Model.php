<?php

class AssetReviews_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function Reviews($review, $rating, $topic, $assetID, $userID, $recommendation)
    {

        $selectSQL = "SELECT * FROM asset_reviews WHERE userID='$userID' AND assetID='$assetID'";

        $selectStmt = $this->db->prepare($selectSQL);

        $selectStmt->execute();

        $reviewExist = $selectStmt->fetch(PDO::FETCH_ASSOC);

        if (empty($reviewExist)) {
            $sql = "INSERT INTO asset_reviews(rating, review, userID, assetID, reviewTopic, recommendation) VALUES ('$rating', '$review', '$userID', '$assetID', '$topic', '$recommendation')";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();
        } else if (!empty($reviewExist)) {

            $sql = "UPDATE asset_reviews SET rating='$rating', review='$review', reviewTopic='$topic', recommendation='$recommendation' WHERE userID='$userID' AND assetID='$assetID'";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();
        }
    }

    function FetchReviews($assetID)
    {
        $sql = "SELECT asset_reviews.rating, asset_reviews.review, asset_reviews.reviewTopic, 
                asset_reviews.recommendation, gamer.username FROM asset_reviews
                INNER JOIN gamer ON gamer.gamerID = asset_reviews.userID WHERE assetID='$assetID' ORDER BY id DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function HasReviewedThisAsset($reviewerID, $assetID)
    {

        $sql = "SELECT * FROM asset_reviews WHERE userID='$reviewerID' AND assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $reviewRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($reviewRecord)) {
            return false;
        } else {
            return true;
        }
    }

    function HisThisAssetReview($reviewerID, $assetID)
    {
        $sql = "SELECT * FROM asset_reviews WHERE userID='$reviewerID' AND assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $reviewRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        return $reviewRecord;
    }

    function DeleteReview($reviewerID, $assetID)
    {

        $sql = "DELETE FROM asset_reviews WHERE userID='$reviewerID' AND assetID='$assetID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function ReviewerInfo($reviewerID)
    {

        //details goes in username, totalofgamesinlibrary, totalreviews order
        $details = [];

        //Retrieving the username of the reviewer
        $accountSQL = "SELECT * FROM gamer WHERE gamerID='$reviewerID'";

        $accountStmt = $this->db->prepare($accountSQL);

        $accountStmt->execute();

        $accountRecord = $accountStmt->fetch(PDO::FETCH_ASSOC);

        array_push($details, $accountRecord['username']);

        //Retrieving the total number of games reviewer have in the library

        // $librarySQL = "SELECT * FROM library WHERE developerID='$reviewerID'";

        // $libraryStmt = $this->db->prepare($librarySQL);

        // $libraryStmt->execute();

        // $libraryRecord = $libraryStmt->fetch(PDO::FETCH_ASSOC);

        // array_push($details, $accountRecord['username']);

        return $details;
    }
}
