<?php

class Creategig extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $currentUser = $_SESSION['id'];

        $this->view->games = $this->model->currentDevGames($currentUser);

        $this->view->render('Forms/CreateGig');
    }

    function makeNewGig()
    {

        $gigName = $_POST['gig-title'];
        $tagline = $_POST['gig-tagline'];
        $description = $_POST['gig-details'];
        $gameName = $_POST['game-name'];
        $currentStage = $_POST['current-stage'];
        $plannedReleaseDate = $_POST['planned-release'];
        $estimatedShare = $_POST['est-share'];
        $expectedCost = $_POST['expected-cost'];
        $visibility = $_POST['gig-visibility'];
        $gigCoverImg = $this->model->uploadCoverImg($gigName);
        $gigScreenshots = $this->model->uploadScreenshots($gameName);
        $gigTrailer = $_POST['gig-trailer'];
        $developerID = $_SESSION['id'];

        $this->model->addNewGig(
            $gigName,
            $tagline,
            $description,
            $gameName,
            $currentStage,
            $plannedReleaseDate,
            $estimatedShare,
            $expectedCost,
            $visibility,
            $gigCoverImg,
            $gigScreenshots,
            $gigTrailer,
            $developerID
        );

        header('location:/indieabode/');
    }
}
