<?php

class SiteDashboard_Model extends Model
{

  function __construct()
  {
    parent::__construct();
  }


  function userCount()
  {
    $stmt = $this->db->prepare("SELECT * FROM gamer");
    $stmt->execute();

    $users = $stmt->fetchAll();

    $count = 0;

    foreach ($users as $user) {
      $count += 1;
    }

    return $count;
  }

  function downloadCount()
  {
    $stmt = $this->db->prepare("SELECT * FROM downloadgame");
    $stmt->execute();

    $d_game = $stmt->fetchAll();

    $count1 = 0;

    foreach ($d_game as $game) {
      $count1 += 1;
    }

    $stmt2 = $this->db->prepare("SELECT * FROM downloadasset");
    $stmt2->execute();

    $d_asset = $stmt2->fetchAll();

    $count2 = 0;

    foreach ($d_asset as $asset) {
      $count2 += 1;
    }

    return $count1 + $count2;
  }


  public function getData($tabale_name, $days)
  {

    $select = "SELECT 0 n ";
    for ($i = 1; $i < $days; $i++) {
      $select = $select . " UNION SELECT " . $i;
    }
    $sql = "
        SELECT 
          sub.date, 
          COALESCE(tbl.count, 0) AS count
        FROM 
          (SELECT 
            DATE(NOW() - INTERVAL (" . $days . " - n.n) DAY) AS date
           FROM 
            (" . $select . ") n
          ) sub
        LEFT JOIN
          (SELECT 
            DATE(created_at) AS date, 
            COUNT(gamerID) AS count
           FROM 
            " . $tabale_name . "
           WHERE 
            created_at > CURRENT_DATE()-" . $days . " AND created_at < CURRENT_DATE()-1
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

  function TopGames()
  {
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
}
