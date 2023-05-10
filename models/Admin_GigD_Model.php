<?php

class Admin_GigD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    // public function getData($tabale_name,$days)
    // {

    //     $select = "SELECT 0 n ";
    //     for ($i = 1; $i < $days; $i++) {
    //       $select=$select." UNION SELECT ".$i;
    //     }
    //     $sql = "
    //     SELECT 
    //       sub.date, 
    //       COALESCE(tbl.count, 0) AS count
    //     FROM 
    //       (SELECT 
    //         DATE(NOW() - INTERVAL (".$days." - n.n) DAY) AS date
    //        FROM 
    //         (".$select.") n
    //       ) sub
    //     LEFT JOIN
    //       (SELECT 
    //         DATE(created_at) AS date, 
    //         COUNT(gamerID) AS count
    //        FROM 
    //         ".$tabale_name."
    //        WHERE 
    //         created_at > CURRENT_DATE()-".$days." AND created_at < CURRENT_DATE()-1
    //        GROUP BY 
    //         DATE(created_at)
    //       ) tbl
    //     ON 
    //       sub.date = tbl.date
    //     ORDER BY 
    //       sub.date;
    //     ";

     

    //     // WHERE 
    //     //     created_at >= NOW() - INTERVAL ".$days." DAY
    //     //    GROUP BY 
    //     //     DATE(created_at)

    
        

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $count = $stmt->fetchAll();

    //     return $count;

    //     //add all types of validation testing here
    // }
}
