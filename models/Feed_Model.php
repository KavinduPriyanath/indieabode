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
        "SELECT games_cart.gamerID,games_cart.checkw,games_cart.time,games_cart.itemID,freegame.gameName,gamer.username,gamer.avatar
        FROM games_cart 
        INNER JOIN freegame ON games_cart.itemID = freegame.gameID
        INNER JOIN gamer ON games_cart.gamerID = gamer.gamerID

        UNION 
        
        SELECT library.id,library.itemID,library.time ,library.checkw,freegame.gameName,gamer.username,gamer.avatar
        FROM library 
        INNER JOIN freegame ON library.itemID = freegame.gameID
        INNER JOIN gamer ON library.developerID = gamer.gamerID
        ORDER BY time DESC";

        // SELECT name, time FROM table1
        // UNION
        // SELECT name, time FROM table2
        // ORDER BY time DESC

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

}
