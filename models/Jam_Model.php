<?php

class Jam_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleJam($id)
    {
        $sql = "SELECT * FROM gamejam WHERE gameJamID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gamejam = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gamejam;
    }


    function joinJam($uID, $jID)
    {
        $sql = "INSERT INTO joinjam_gamedevs (gamerID, gameJamID) VALUES ('$uID', '$jID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        // $gamejam = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    function leaveJam($uID, $jID)
    {
        $sql = "DELETE FROM joinjam_gamedevs WHERE gamerID = $uID AND gameJamID = $jID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function joinJamGamer($gamerID, $jamID)
    {
        $sql = "INSERT INTO joinjam_gamers (GamerID, GameJamID) VALUES ('$gamerID', '$jamID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function leaveJamGamer($gamerID, $jamID)
    {
        $sql = "DELETE FROM joinjam_gamers WHERE GamerID = $gamerID AND GameJamID = $jamID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function currentDevGames($developerID)
    {
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID = '$developerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function submitproject($gameID, $jamID, $gamerID)
    {
        $sql = "INSERT INTO submission (submissionID, gameJamID, gamerID) VALUES ('$gameID', '$jamID', '$gamerID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }


    function AlreadyJoinedDeveloper($uID, $jID)
    {

        $sql = "SELECT * FROM joinJam_gamedevs WHERE gamerID='$uID' AND gameJamID='$jID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($asset != null) {
            return true;
        } else {
            return false;
        }
    }

    function AlreadyJoinedGamer($gamerID, $jamID)
    {

        $sql = "SELECT * FROM joinjam_gamers WHERE GamerID='$gamerID' AND GameJamID='$jamID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $asset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($asset != null) {
            return true;
        } else {
            return false;
        }
    }

    function submittedgames($gameJamID)
    {

        $sql = "SELECT * FROM submission WHERE gameJamID='$gameJamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $currentJamSubmissions = $stmt->fetchAll();

        $submissionIDs = [];

        foreach ($currentJamSubmissions as $jamSubmission) {
            array_push($submissionIDs, $jamSubmission['submissionID']);
        }

        $allGames = [];

        foreach ($submissionIDs as $submission) {

            $gameSQL = "SELECT * FROM freegame WHERE gameID='$submission'";

            $gameStmt = $this->db->prepare($gameSQL);

            $gameStmt->execute();

            $game = $gameStmt->fetch(PDO::FETCH_ASSOC);

            array_push($allGames, $game);
        }

        return $allGames;
    }

    function submissionDetails($gameID)
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameCoverImg, freegame.gameFile, freegame.platform,
                freegame.gameTagline, freegame.gameScreenshots, gamer.username FROM freegame 
                INNER JOIN gamer ON gamer.gamerID = freegame.gameDeveloperID
                WHERE freegame.gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submission = $stmt->fetch(PDO::FETCH_ASSOC);

        return $submission;
    }

    function SaveSubmissionRating($jamID, $submissionId, $gamerID, $rating)
    {

        $sql = "INSERT INTO ratesubmission(jamID, submissionID, gamerID, rating) VALUES ('$jamID', '$submissionId', '$gamerID', '$rating')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function LoadThisGamerRating($jamID, $submissionID, $gamerID)
    {

        $sql = "SELECT * FROM ratesubmission WHERE jamID='$jamID' AND submissionID='$submissionID' AND gamerID='$gamerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function UpdateThisSubmissionRating($gameID, $jamID, $newVote)
    {
        $sql = "SELECT * FROM submission WHERE gameJamID='$jamID' AND submissionID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissionInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentRating = $submissionInfo['rating'];

        $newRating = $currentRating + $newVote;

        $updateSQL = "UPDATE submission SET rating='$newRating' WHERE gameJamID='$jamID' AND submissionID='$gameID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function ThisSubmissionTotalRating($submissionID, $jamID)
    {

        $sql = "SELECT * FROM submission WHERE submissionID='$submissionID' AND gameJamID='$jamID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function JamResults($jamID)
    {

        $sql = "SELECT submissionID, rating FROM submission WHERE gameJamID='$jamID' ORDER BY rating DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function OverallJamResults($jamID)
    {

        $sql = "SELECT submission.submissionID, submission.rating, freegame.gameName, freegame.gameCoverImg
                FROM submission INNER JOIN freegame ON freegame.gameID=submission.submissionID WHERE gameJamID='$jamID' ORDER BY rating DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
