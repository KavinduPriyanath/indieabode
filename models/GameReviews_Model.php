<?php

class GameReviews_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function Reviews($review, $rating, $topic, $gameID, $userID, $recommendation)
    {

        $selectSQL = "SELECT * FROM game_reviews WHERE userID='$userID' AND gameID='$gameID'";

        $selectStmt = $this->db->prepare($selectSQL);

        $selectStmt->execute();

        $reviewExist = $selectStmt->fetch(PDO::FETCH_ASSOC);

        if (empty($reviewExist)) {
            $sql = "INSERT INTO game_reviews(rating, review, userID, gameID, reviewTopic, recommendation) VALUES ('$rating', '$review', '$userID', '$gameID', '$topic', '$recommendation')";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();
        } else if (!empty($reviewExist)) {

            $sql = "UPDATE game_reviews SET rating='$rating', review='$review', reviewTopic='$topic', recommendation='$recommendation' WHERE userID='$userID' AND gameID='$gameID'";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();
        }
    }

    function FetchReviews($gameID)
    {
        $sql = "SELECT game_reviews.rating, game_reviews.review, game_reviews.reviewTopic, 
                game_reviews.recommendation, gamer.username FROM game_reviews
                INNER JOIN gamer ON gamer.gamerID = game_reviews.userID WHERE gameID='$gameID' ORDER BY id DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function HasReviewedThisGame($reviewerID, $gameID)
    {

        $sql = "SELECT * FROM game_reviews WHERE userID='$reviewerID' AND gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $reviewRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($reviewRecord)) {
            return false;
        } else {
            return true;
        }
    }

    function HisThisGameReview($reviewerID, $gameID)
    {
        $sql = "SELECT * FROM game_reviews WHERE userID='$reviewerID' AND gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $reviewRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        return $reviewRecord;
    }

    function DeleteReview($reviewerID, $gameID)
    {

        $sql = "DELETE FROM game_reviews WHERE userID='$reviewerID' AND gameID='$gameID'";

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
