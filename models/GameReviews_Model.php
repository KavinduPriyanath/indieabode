<?php

class GameReviews_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function Reviews($data)
    {

        $sql = "INSERT INTO game_reviews(rating, review, userID, gameID) VALUES (:rating, :review, :userID, :gameID)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($data);
    }

    function FetchReviews($gameID)
    {

        $stmt = $this->db->prepare("SELECT * FROM game_reviews WHERE gameID='$gameID' ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
