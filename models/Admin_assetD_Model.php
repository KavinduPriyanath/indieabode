<?php

class Admin_assetD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function recentActivities()
    {
        $sql ="SELECT DISTINCT COALESCE(freeasset.assetName, (SELECT assetName FROM freeasset f WHERE f.assetID = downloadasset.assetID)) as assetName,
        CASE
        WHEN allassets.assetID IN (SELECT assetID FROM downloadasset) THEN downloadasset.created_at
        ELSE  freeasset.created_at
        END as created_at,
        CASE
        WHEN allassets.assetID IN (SELECT assetID FROM downloadasset) THEN 'Asset download'
        ELSE 'Asset upload'
        END as description,
        gamer.username as name
FROM (
SELECT assetID, created_at, gamerID
FROM downloadasset
UNION
SELECT assetID, created_at, assetCreatorID
FROM freeasset
) as allassets
LEFT JOIN freeasset ON allassets.assetID = freeasset.assetID
LEFT JOIN downloadasset ON allassets.assetID = downloadasset.assetID
LEFT JOIN gamer ON allassets.gamerID = gamer.gamerID
ORDER BY `created_at` DESC LIMIT 10;


        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll();

        return $data;
    }


    function TopAssets(){
      $sql = "SELECT downloadasset.assetID, freeasset.assetName as name, COUNT(downloadasset.assetID) as count, freeasset.assetCoverImg as img
      FROM downloadasset
      LEFT JOIN freeasset ON downloadasset.assetID = freeasset.assetID
      GROUP BY downloadasset.assetID, freeasset.assetName ORDER BY count DESC LIMIT 3        
      ";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();

      $data = $stmt->fetchAll();


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
