<?php

class Launchcrowdfunding extends Controller
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

        $this->view->render('Forms/LaunchCrowdfunding');
    }

    function launchCrowdfund()
    {

        $crowdfundName = $_POST['crowdfund-title'];
        $tagline = $_POST['crowdfund-tagline'];
        $description = $_POST['crowdfund-details'];
        $gameName = $_POST['game-name'];
        $crowdfundEnddate = $_POST['end-date'];
        $expectedamount = $_POST['expected-amount'];
        $visibility = $_POST['crowdfund-visibility'];
        $crowdfundCoverImg = $this->model->uploadCoverImg($gameName);
        $crowdfundScreenshots = $this->model->uploadScreenshots($gameName);
        $crowdfundTrailer = $_POST['crowdfund-trailer'];
        $developerName = $_SESSION['id'];
        // $developerID = $_SESSION['id'];

        $this->model->launchNewCrowdfund(
            $crowdfundName,
            $tagline,
            $description,
            $gameName,
            $crowdfundEnddate,
            $expectedamount,
            $visibility,
            $crowdfundCoverImg,
            $crowdfundScreenshots,
            $crowdfundTrailer,
            $developerName
        );

        $addedCrowdfund = $this->model->GetThisCrowdfundRecord($crowdfundName, $gameName);

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'crowdfund?id=' . $addedCrowdfund['crowdFundID']);
    }
}
