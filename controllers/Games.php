<?php

class Games extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        // sort part
        if (isset($_GET['sortWhat'])) {
            $sort = $_GET['sortWhat'];
            if ($sort == "latest") {
                $Sorder = "DESC";
                $sort = "created_at";
            } else if ($sort == "priceLH") {
                $Sorder = "ASC";
                $sort = "gamePrice";
            } else if ($sort == "priceHL") {
                $Sorder = "DESC";
                $sort = "gamePrice";
            } else if ($sort == "nameA-Z") {
                $Sorder = "ASC";
                $sort = "gameName";
            } else if ($sort == "nameZ-A") {
                $Sorder = "DESC";
                $sort = "gameName";
            }
        } else {
            $sort = "created_at";
            $Sorder = "DESC";
        }


        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        //pagination 
        $maxLimit = 24;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        $this->view->title = "Games";

        if (isset($_GET['classification'])) {
            $gameClassification = $_GET['classification'];

            if ($gameClassification == 'action') {
                $this->view->games = $this->model->showClassifiedGames('action', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('action');
                $this->view->title = "Category: Action";
            } else if ($gameClassification == 'adventure') {
                $this->view->games = $this->model->showClassifiedGames('adventure', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('adventure');
                $this->view->title = "Category: Adventure";
            } else if ($gameClassification == 'rpg') {
                $this->view->games = $this->model->showClassifiedGames('rpg', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('rpg');
                $this->view->title = "Category: RPG";
            } else if ($gameClassification == 'racing') {
                $this->view->games = $this->model->showClassifiedGames('racing', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('racing');
                $this->view->title = "Category: Racing";
            } else if ($gameClassification == 'simulation') {
                $this->view->games = $this->model->showClassifiedGames('simulation', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('simulation');
                $this->view->title = "Category: Simulation";
            } else if ($gameClassification == 'strategy') {
                $this->view->games = $this->model->showClassifiedGames('strategy', $start, $maxLimit);
                $this->view->gamesPagesCount = $this->model->totalGamesPageCount('strategy');
                $this->view->title = "Category: Strategy";
            }
        } else if (isset($_GET['platforms']) || isset($_GET['releasestatus'])) {

            $checkedPlatformTypes = [];
            $checkedReleaseStatusTypes = [];
            $checkedGameTypes = [];
            $checkedFeatures = [];

            if (isset($_GET['platforms'])) {
                $checkedPlatformTypes =  $_GET['platforms'];
            }


            if (isset($_GET['releasestatus'])) {
                $checkedReleaseStatusTypes =  $_GET['releasestatus'];
            }

            if (isset($_GET['gametypes'])) {
                $checkedGameTypes =  $_GET['gametypes'];
            }

            if (isset($_GET['features'])) {
                $checkedFeatures =  $_GET['features'];
            }


            $this->view->games = $this->model->showFilteredGames($checkedPlatformTypes, $checkedReleaseStatusTypes, $checkedGameTypes, $checkedFeatures, $start, $maxLimit);
        } else if (isset($_GET['sortWhat'])) {

            $this->view->games = $this->model->showAllSortedGames($sort, $Sorder);
        } else {

            $this->view->games = $this->model->showAllGames($start, $maxLimit);
            $this->view->gamesPagesCount = $this->model->totalGamesPageCount(null);
        }

        //to keep track of the filters selected
        $this->view->platformsChecked = [];
        $this->view->releaseStatusChecked = [];
        $this->view->featuresChecked = [];
        $this->view->typesChecked = [];

        // $selectedPlatforms = $this->view->platformsChecked;



        if (isset($_GET['platforms'])) {
            $this->view->platformsChecked = $_GET['platforms'];
        }

        if (isset($_GET['releasestatus'])) {
            $this->view->releaseStatusChecked = $_GET['releasestatus'];
        }

        if (isset($_GET['features'])) {
            $this->view->featuresChecked = $_GET['features'];
        }

        if (isset($_GET['gametypes'])) {
            $this->view->typesChecked = $_GET['gametypes'];
        }


        //for displaying filters values
        $this->view->platformFilters = $this->model->PlatformFilters();
        $this->view->releaseFilters = $this->model->ReleaseFilters();
        $this->view->featureFilters = $this->model->FeatureFilters();
        $this->view->typeFilters = $this->model->TypeFilters();

        $this->view->totalSelectedFilters = count($this->view->platformsChecked) + count($this->view->releaseStatusChecked) + count($this->view->featuresChecked) + count($this->view->typesChecked);

        //for rendering the games main page
        $this->view->render('Main/Games');
    }

    function sideFilters()
    {
        // header('location:/indieabode/aaa');
        echo "hello";
    }
}
