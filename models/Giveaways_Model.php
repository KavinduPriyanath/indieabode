<?php

class Giveaways_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function InsertDailySpin($gamerID, $reward)
    {

        $sql = "INSERT INTO spin_wheel(gamerID, reward) VALUES ('$gamerID', '$reward')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function HasSpinnedToday($TodayDate, $gamerID)
    {

        $sql = "SELECT * FROM spin_wheel WHERE gamerID='$gamerID' AND spinned_date='$TodayDate'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function UpdateTotalCoins($gamerID, $reward, $action)
    {


        $sql = "SELECT * FROM account WHERE userID='$gamerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentCoins = $user['indieCoins'];

        if ($action == "spin") {
            $newCoinsCount = $currentCoins + $reward;
        } else if ($action == "claim") {
            $newCoinsCount = $currentCoins - $reward;
        }

        $updateSQL = "UPDATE account SET indieCoins='$newCoinsCount' WHERE userID='$gamerID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function ShowAllGiveawayItems()
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameCoverImg, giveaways.copiesCount, giveaways.copiesLeft, giveaways.pieceWorth
                FROM giveaways INNER JOIN freegame ON freegame.gameID=giveaways.gameID";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function AddtoLibrary($gameID, $gamerID)
    {

        $sql = "INSERT INTO game_library(gamerID, gameID) VALUES (?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(["$gamerID", "$gameID"]);
    }

    function UpdateLeftCopyCount($gameID)
    {

        $sql = "SELECT * FROm giveaways WHERE gameID='$gameID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        $copiesLeft = $item['copiesLeft'] - 1;

        $updateSQL = "UPDATE giveaways SET copiesLeft='$copiesLeft' WHERE gameID='$gameID'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function MyTotalCoins($userID)
    {

        $sql = "SELECT * FROM account WHERE userID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function AddWinners($gameID, $winnerID)
    {

        $sql = "INSERT INTO giveaway_claims(gameID, winnerID) VALUES ('$gameID', '$winnerID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
}
