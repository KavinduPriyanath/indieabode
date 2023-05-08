<?php

class Home extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {
        $this->view->topSellerGames = $this->model->TopSellers();

        $this->view->latestGames = $this->model->NewReleases();

        $this->view->mostPopular = $this->model->MostPopular();

        $this->view->topRated = $this->model->TopRated();

        $this->view->comingSoon = $this->model->ComingSoon();

        $this->view->render('HomePages/GamerHome');
    }

    function developer()
    {

        $this->view->games = $this->model->showRecentGames();

        $this->view->assets = $this->model->showRecentAssets();

        $this->view->devlogs = $this->model->showRecentDevlogs();

        // $this->view->gamejams = $this->model->showRecentJams();

        $this->view->gigs = $this->model->showRecentGigs();


        $this->view->render('HomePages/DeveloperHome');
    }

    function organizer()
    {
        $this->view->thismonthJams = $this->model->showThisMonthJams();

        $this->view->upcomingJams = $this->model->showUpcomingJams();

        $this->view->pastJams = $this->model->showPastJams();

        $this->view->render('HomePages/OrganizerHome');
    }

    function publisher()
    {
        $this->view->mostPopularGigs = $this->model->showPopularGigs();

        $this->view->latestGigs = $this->model->showLatestGigs();

        $this->view->mostDemandGigs = $this->model->showMostDemandGigs();

        $this->view->render('HomePages/PublisherHome');
    }

    function creator()
    {

        $this->view->topSellerAssets = $this->model->TopSellerAssets();

        $this->view->latestAssets = $this->model->NewReleaseAssets();

        $this->view->mostPopular = $this->model->MostPopularAssets();

        $this->view->topRated = $this->model->TopRatedAssets();

        $this->view->render('HomePages/CreatorHome');
    }
}
