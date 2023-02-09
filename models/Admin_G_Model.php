<?php

class Admin_G_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function recentActivities()
    {
        $sql ="SELECT DISTINCT COALESCE(freegame.gameName, (SELECT gameName FROM freegame f WHERE f.gameID = downloadgame.gameID)) as gameName,
                        CASE
                        WHEN allgames.gameID IN (SELECT gameID FROM downloadgame) THEN downloadgame.created_at
                        ELSE  freegame.created_at
                        END as created_at,
                        CASE
                        WHEN allgames.gameID IN (SELECT gameID FROM downloadgame) THEN 'game download'
                        ELSE 'game upload'
                        END as description,
                        gamer.username as name
                FROM (
                SELECT gameID, created_at,gamerID
                FROM downloadgame
                UNION
                SELECT gameID, created_at,gameDeveloperID
                FROM freegame
                ) as allgames
                LEFT JOIN freegame ON allgames.gameID = freegame.gameID
                LEFT JOIN downloadgame ON allgames.gameID = downloadgame.gameID
                LEFT JOIN gamer ON gamer.gamerID = allgames.gamerID
                ORDER BY `created_at` DESC LIMIT 10";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll();

        return $data;
    }

    function TopGames(){
      $sql = "SELECT downloadgame.gameID, freegame.gameName as name, COUNT(downloadgame.gameID) as count, freegame.gameCoverImg as img
      FROM downloadgame
      LEFT JOIN freegame ON downloadgame.gameID = freegame.gameID
      GROUP BY downloadgame.gameID, freegame.gameName ORDER BY count DESC LIMIT 3        
      ";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();

      $data = $stmt->fetchAll();

      // print_r($data);
      return $data;

    }

    public function getData($tabale_name,$days)
    {

        $select = "SELECT 0 n ";
        for ($i = 1; $i < $days; $i++) {
          $select=$select." UNION SELECT ".$i;
        }
        $sql = "
        SELECT 
          sub.date, 
          COALESCE(tbl.count, 0) AS count
        FROM 
          (SELECT 
            DATE(NOW() - INTERVAL (".$days." - n.n) DAY) AS date
           FROM 
            (".$select.") n
          ) sub
        LEFT JOIN
          (SELECT 
            DATE(created_at) AS date, 
            COUNT(gamerID) AS count
           FROM 
            ".$tabale_name."
           WHERE 
            created_at > CURRENT_DATE()-".$days." AND created_at < CURRENT_DATE()-1
           GROUP BY 
            DATE(created_at)
          ) tbl
        ON 
          sub.date = tbl.date
        ORDER BY 
          sub.date;
        ";

     

        // WHERE 
        //     created_at >= NOW() - INTERVAL ".$days." DAY
        //    GROUP BY 
        //     DATE(created_at)

    
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $count = $stmt->fetchAll();

        return $count;

        //add all types of validation testing here
    }
}
