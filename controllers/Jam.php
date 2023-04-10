<?php

class Jam extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];
            $currentUser = $_SESSION['id'];

            $this->view->gamejam = $this->model->showSingleJam($gameJamID);

            $this->view->hasJoinedDeveloper = $this->model->AlreadyJoinedDeveloper($_SESSION['id'], $gameJamID);

            $this->view->hasJoinedGamer = $this->model->AlreadyJoinedGamer($_SESSION['id'], $gameJamID);

            $this->view->games = $this->model->currentDevGames($currentUser);
            //$this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameJamID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->render('SingleGameJam');
        }
    }

    function joinJam()
    {
        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];
            $uID = $_SESSION['id'];

            // Check if user is already joined
            $isJoined = $this->model->AlreadyJoinedDeveloper($uID, $gameJamID);

            if ($isJoined) {
                // User already joined, leave the jam
                $this->model->leaveJam($uID, $gameJamID);
            } else {
                // User not joined, join the jam
                $this->model->joinJam($uID, $gameJamID);
            }
        }

        $this->view->gamejam = $this->model->showSingleJam($gameJamID);

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/jam?' . http_build_query($result));
    }

    function joinJamGamer()
    {
        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];
            $userID = $_SESSION['id'];



            // Check if user is already joined
            $isJoinedGamer = $this->model->AlreadyJoinedGamer($userID, $gameJamID);

            if ($isJoinedGamer) {
                // User already joined, leave the jam
                $this->model->leaveJamGamer($userID, $gameJamID);
            } else {
                // User not joined, join the jam
                $this->model->joinJamGamer($userID, $gameJamID);
            }
        }

        $this->view->gamejam = $this->model->showSingleJam($gameJamID);

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/jam?' . http_build_query($result));
    }


    // function joinJam()
    // {
    //     $gameJamID = $_GET['id'];
    //     $uID = $_SESSION['id'];

    //     $this->model->joinJam($uID, $gameJamID);

    //     $this->view->gamejam = $this->model->showSingleJam($gameJamID);

    //     $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    //     parse_str($query, $result);

    //     header('Location:/indieabode/jam/?' . http_build_query($result));
    // }

    // function leaveJam()
    // {
    //     $gameJamID = $_GET['id'];
    //     $uID = $_SESSION['id'];
    //     $this->model->leaveJam($uID, $gameJamID);

    //     $this->view->gamejam = $this->model->showSingleJam($gameJamID);

    //     $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    //     parse_str($query, $result);

    //     header('Location:/indieabode/jam/?' . http_build_query($result));
    // }

    function submission()
    {

        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];
            $currentUser = $_SESSION['id'];

            $this->view->jam = $this->model->showSingleJam($gameJamID);
            $this->view->games = $this->model->currentDevGames($currentUser);
        }

        $this->view->sGames = $this->model->submittedgames($gameJamID);

        // print_r($sGames);


        $this->view->render('GameJam/submission');
    }

    function submitproject()
    {

        if (isset($_POST['submit'])) {
            $gamerID = $_SESSION['id'];
            $gameID = $_POST['gameID'];
            $gameJamID = $_GET['id'];
            $this->model->submitproject($gameID, $gameJamID, $gamerID);
            // $this->view->gamejam = $this->model->showSingleJam($gameJamID);
            // $this->view->render('SingleGameJam');


        }

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/jam?' . http_build_query($result));
    }

    // function submittedgames()
    // {
    //     $this->view->sGames = $this->model->submittedgames();
    //     $this->view->render('Forms/submission');
    // }


}
