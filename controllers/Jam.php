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

            $gamejam = $this->model->showSingleJam($gameJamID);

            $this->view->games = $this->model->currentDevGames($currentUser, $gamejam['submissionStartDate']);
            //$this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameJamID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->render('SingleGameJam');
        }
    }


    function joinJam()
    {
        if ($_POST['developer_attempt'] == true) {
            $gameJamID = $_POST['gamejamID'];
            $uID = $_SESSION['id'];

            // Check if user is already joined
            $isJoined = $this->model->AlreadyJoinedDeveloper($uID, $gameJamID);

            if ($isJoined) {
                // User already joined, leave the jam
                $this->model->leaveJam($uID, $gameJamID);
                $this->model->UpdateJamPartipants($gameJamID, "left");
                echo "left";
            } else {
                // User not joined, join the jam
                $this->model->joinJam($uID, $gameJamID);
                $this->model->UpdateJamPartipants($gameJamID, "joined");
                echo "joined";
            }
        }
    }

    function joinJamGamer()
    {
        if ($_POST['gamer_attempt'] == true) {
            $gameJamID = $_POST['gamejamID'];
            $userID = $_SESSION['id'];


            // Check if user is already joined
            $isJoinedGamer = $this->model->AlreadyJoinedGamer($userID, $gameJamID);

            if ($isJoinedGamer) {
                // User already joined, leave the jam
                $this->model->leaveJamGamer($userID, $gameJamID);
                echo "left";
            } else {
                // User not joined, join the jam
                $this->model->joinJamGamer($userID, $gameJamID);
                echo "joined";
            }
        }
    }




    function submission()
    {

        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];
            $currentUser = $_SESSION['id'];

            $this->view->jam = $this->model->showSingleJam($gameJamID);

            // $gamejam = $this->model->showSingleJam($gameJamID);

            // $this->view->games = $this->model->currentDevGames($currentUser, $gamejam['submissionStartDate']);
        }

        $this->view->submittedGames = $this->model->submittedgames($gameJamID);

        // print_r($sGames);


        $this->view->render('GameJam/Submission');
    }

    function submitproject()
    {

        if (isset($_POST['submit'])) {
            $gamerID = $_SESSION['id'];
            $gameID = $_POST['gameID'];
            $gameJamID = $_GET['id'];
            $this->model->submitproject($gameID, $gameJamID, $gamerID);
            $this->model->UpdateGameSubmissionStatus($gameID, $gameJamID);
            // $this->view->gamejam = $this->model->showSingleJam($gameJamID);
            // $this->view->render('SingleGameJam');


        }

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/jam?' . http_build_query($result));
    }


    function ratesubmission()
    {
        $gameJamID = $_GET['jam'];

        $gameID = $_GET['id'];

        $this->view->jam = $this->model->showSingleJam($gameJamID);

        $this->view->submission = $this->model->submissionDetails($gameID);

        $submission = $this->model->submissionDetails($gameID);

        $results = $this->model->JamResults($gameJamID);

        $resultsCount = count($results);

        $rank = 0;

        for ($i = 0; $i < $resultsCount; $i++) {

            $rank = $rank + 1;
            if ($results[$i]['submissionID'] == $gameID) {
                break;
            }
        }

        $this->view->rank = $rank;

        $this->view->totalSubmissions = $resultsCount;

        $this->view->totalRating = $this->model->ThisSubmissionTotalRating($gameID, $gameJamID);

        $this->view->screenshots = explode(",", $submission['gameScreenshots']);

        if (isset($_SESSION['logged'])) {

            $this->view->ratingData = $this->model->LoadThisGamerRating($gameJamID, $gameID, $_SESSION['id']);
        }

        $this->view->render('GameJam/Rate-Submission');
    }

    function saveRating()
    {

        if ($_POST['save_rating'] == true) {

            $voterID = $_SESSION['id'];
            $jamID = $_POST['jamID'];
            $submissionID = $_POST['submissionID'];
            $rating = $_POST['rating_data'];

            $this->model->SaveSubmissionRating($jamID, $submissionID, $voterID, $rating);

            $this->model->UpdateThisSubmissionRating($submissionID, $jamID, $rating);
        }
    }

    function loadGamerRating()
    {

        if ($_POST['load_rating'] == true) {

            $gamerID = $_SESSION['id'];
            $jamID = $_POST['jamID'];
            $submissionID = $_POST['submissionID'];

            $ratingData = $this->model->LoadThisGamerRating($jamID, $submissionID, $gamerID);

            if (!empty($ratingData)) {
                $thisUserRating = $ratingData['rating'];
            } else {
                $thisUserRating = 0;
            }



            echo json_encode($thisUserRating);
        }
    }

    function results()
    {

        $gameJamID = $_GET['id'];

        $this->view->jamResults = $this->model->OverallJamResults($gameJamID);

        $this->view->jam = $this->model->showSingleJam($gameJamID);

        $this->view->render('GameJam/Results');
    }
}
