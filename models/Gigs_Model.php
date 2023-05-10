<?php

class Gigs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGigs($sort,$Sorder,$min, $max)
    {
        $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
        gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
        FROM gig INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1 ORDER BY $sort $Sorder LIMIT $min, $max";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllAchiveGigs($min, $max)
    {
        $sql = "SELECT gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, gig_purchases.purchasedDate
                FROM gig INNER JOIN gig_purchases ON gig_purchases.gigID = gig.gigID WHERE gigStatus=1 LIMIT $min, $max";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showMyRequestedGigs($userID)
    {
        $sql = "SELECT gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg FROM gig INNER JOIN
                requestedgigs ON gig.gigID = requestedgigs.gigID WHERE publisherID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showFilteredGigs($checkedGenres, $checkedStage, $checkedCost, $checkedShare)
    {

        $genreFilters = join("','", $checkedGenres);

        //Only Genre is filtered
        if (!empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare == null) {
            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters')";
        }
        //Only Genre and Stage is filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare == null) {
            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage'";
        }
        //Only Genre, Stage and Cost is filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare == null) {

            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 1000";
            }
        }
        //Genre, Stage, Cost and Share all are filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Stage is filtered 
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare == null) {

            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
            gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
            FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
            AND gig.currentStage = '$checkedStage'";
        }
        //Only Cost is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare == null) {

            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 AND gig.expectedCost < 1000";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost >= 1000";
            }
        }
        //Only Share is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare != null) {


            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "50-") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare >= 50";
            }
        }
        //Only Genre and Cost is Filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare == null) {
            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > 1000";
            }
        }
        //Only Genre and Share is filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare != null) {

            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare >= 50";
            }
        }
        //Only Stage and Cost is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare == null) {
            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 1000";
            }
        }
        //Only Stage and Share is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare != null) {

            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare >= 50";
            }
        }
        //Only Cost and Share is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Genre and Stage and Share is filtered
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare != null) {
            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare >= 50";
            }
        }
        //Only Genre and Cost and Share is filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Stage and Cost and Share is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function totalGigsPageCount($maxLimit)
    {

        $sql = "SELECT count(gigID) AS id FROM gig";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gigsCount = $stmt->fetchAll();

        $totalGigs = $gigsCount[0]['id'];

        $totalPages = ceil($totalGigs / $maxLimit);

        return $totalPages;
    }

    function showFilteredArchiveGigs($checkedGenres, $checkedStage, $checkedCost, $checkedShare)
    {

        $genreFilters = join("','", $checkedGenres);

        //Only Genre is filtered
        if (!empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare == null) {
            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank, gig_purchases.purchasedDate
                    FROM gig INNER JOIN freegame ON freegame.gameID=gig.game INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID 
                    INNER JOIN gig_purchases ON gig_purchases.gigID=gig.gigID WHERE freegame.gameClassification IN ('$genreFilters')";
        }
        //Only Genre and Stage is filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare == null) {
            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank, gig_purchases.purchasedDate
                    FROM gig INNER JOIN freegame ON freegame.gameID=gig.game INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID 
                    INNER JOIN gig_purchases ON gig_purchases.gigID=gig.gigID WHERE 
                    freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage'";
        }
        //Only Genre, Stage and Cost is filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare == null) {

            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank, gig_purchases.purchasedDate
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID
                    INNER JOIN gig_purchases ON gig_purchases.gigID=gig.gigID WHERE
                    freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank, gig_purchases.purchasedDate
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID 
                    INNER JOIN gig_purchases ON gig_purchases.gigID=gig.gigID WHERE
                    freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank, gig_purchases.purchasedDate
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID 
                    INNER JOIN gig_purchases ON gig_purchases.gigID=gig.gigID WHERE
                    freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 1000";
            }
        }
        //Continue adding Filters for gig archive from here
        //Genre, Stage, Cost and Share all are filtered 
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Stage is filtered 
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare == null) {

            $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
            gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
            FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
            AND gig.currentStage = '$checkedStage'";
        }
        //Only Cost is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare == null) {

            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 AND gig.expectedCost < 1000";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost >= 1000";
            }
        }
        //Only Share is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare != null) {


            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "50-") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.estimatedShare >= 50";
            }
        }
        //Only Genre and Cost is Filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare == null) {
            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > 1000";
            }
        }
        //Only Genre and Share is filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost == null && $checkedShare != null) {

            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.estimatedShare >= 50";
            }
        }
        //Only Stage and Cost is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare == null) {
            if ($checkedCost == "500-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= 500";
            } else if ($checkedCost == "500+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 500";
            } else if ($checkedCost == "1000+") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > 1000";
            }
        }
        //Only Stage and Share is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare != null) {

            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND gig.currentStage = '$checkedStage' AND gig.estimatedShare >= 50";
            }
        }
        //Only Cost and Share is filtered
        else if (empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost <= 500 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 500 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "50-") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.expectedCost > 1000 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Genre and Stage and Share is filtered
        else if (!empty($genreFilters) && $checkedStage != null && $checkedCost == null && $checkedShare != null) {
            if ($checkedShare == "10-") {
                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare <= 10";
            } else if ($checkedShare == "10+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare > 10";
            } else if ($checkedShare == "50+") {

                $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                AND freegame.gameClassification IN ('$genreFilters') AND gig.currentStage = '$checkedStage' AND gig.estimatedShare >= 50";
            }
        }
        //Only Genre and Cost and Share is filtered
        else if (!empty($genreFilters) && $checkedStage == null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND freegame.gameClassification IN ('$genreFilters') AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }
        //Only Stage and Cost and Share is filtered
        else if (empty($genreFilters) && $checkedStage != null && $checkedCost != null && $checkedShare != null) {

            if ($checkedCost == "500-") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost <= '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "500+") {

                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '500' 
                    AND gig.estimatedShare >= 50";
                }
            } else if ($checkedCost == "1000+") {


                if ($checkedShare == "10-") {
                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare <= 10";
                } else if ($checkedShare == "10+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare > 10";
                } else if ($checkedShare == "50+") {

                    $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                    gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                    FROM (freegame INNER JOIN gig ON freegame.gameID=gig.game) INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1
                    AND gig.currentStage = '$checkedStage' AND gig.expectedCost > '1000' 
                    AND gig.estimatedShare >= 50";
                }
            }
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function totalArchivedGigsPageCount($maxLimit)
    {

        $sql = "SELECT count(gigID) AS id FROM gig WHERE gigStatus=1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gigsCount = $stmt->fetchAll();

        $totalGigs = $gigsCount[0]['id'];

        $totalPages = ceil($totalGigs / $maxLimit);

        return $totalPages;
    }
}
