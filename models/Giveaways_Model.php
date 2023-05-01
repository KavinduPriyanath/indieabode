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
}
