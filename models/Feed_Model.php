<?php

class Feed_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showCart()
    {
        $sql =
            "SELECT game_cart.userID,game_cart.ActivityCheck,game_cart.addedDate,game_cart.gameID,freegame.gameName,gamer.username,gamer.avatar
        FROM game_cart 
        INNER JOIN freegame ON game_cart.gameID = freegame.gameID
        INNER JOIN gamer ON game_cart.userID = gamer.gamerID

        UNION 
        
        SELECT game_library.id,game_library.gameID,game_library.addedDate,game_library.ActivityCheck,freegame.gameName,gamer.username,gamer.avatar
        FROM game_library 
        INNER JOIN freegame ON game_library.gameID = freegame.gameID
        INNER JOIN gamer ON game_library.gamerID = gamer.gamerID
        ORDER BY addedDate DESC";

        // SELECT name, time FROM table1
        // UNION
        // SELECT name, time FROM table2
        // ORDER BY time DESC

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
