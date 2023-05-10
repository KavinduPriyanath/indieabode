<?php

class Devlog extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            } else if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        if (isset($_GET['id'])) {
            $devlogID = $_GET['id'];


            $this->view->likesStatus = null;

            $this->view->devlog = $this->model->showSingleDevlog($devlogID);

            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleDevlog($devlogID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $gameId = $this->model->showSingleDevlog($devlogID)['gameName'];

            if (isset($_SESSION['logged'])) {

                $likedorNot = $this->model->AlreadyLiked($_SESSION['id'], $_GET['id']);

                $this->view->likesStatus = ($likedorNot == true) ? "liked" : "disliked";

                $this->view->hasInCart = $this->model->AlreadyInCart($gameId, $_SESSION['id']);

                $this->view->hasClaimed = $this->model->AlreadyClaimed($gameId, $_SESSION['id']);

                $viewTracker = $this->model->DevlogViewTracker($_SESSION['id'], $_SESSION['session'], $devlogID);

                if ($viewTracker) {
                    $this->model->UpdateDevlogViews($devlogID);
                }
            }



            $this->view->game = $this->model->GetGame($gameId);

            $thisGame = $this->model->GetGame($gameId);

            if ($thisGame['gamePrice'] == "0") {
                $this->view->gamePrice = "FREE";
            } else if ($thisGame['gamePrice'] != "0") {
                $this->view->gamePrice = "$" . number_format(floatval($thisGame['gamePrice']), 2);
            }

            $currentdevlog = $this->model->showSingleDevlog($devlogID);


            $this->view->game = $this->model->gameDetails($currentdevlog['gameName']);

            $this->view->render('SingleDevlog');
        }
    }


    function addtoLibrary()
    {
        if ($_POST['add_to_library'] == true) {
            $gameID = $_POST['gameID'];

            $gamerID = $_SESSION['id'];

            $this->model->AddtoLibrary($gameID, $gamerID);

            echo "1";
        }
    }


    function AddToCart()
    {

        if ($_POST['add_to_cart'] == true) {

            $gameID = $_POST['gameID'];

            $this->model->AddtoCart($gameID, $_SESSION['id']);

            echo "1";
        }
    }
}
