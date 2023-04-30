<?php

class Support_center extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {
        // if (isset($_SESSION['id'])) {
        //     print_r($_SESSION['id']);
        // }

        // echo "Im index controller";
        $this->view->render('SupportCenter/SupportCenter');
    }

    function publishing()
    {
        if (isset($_GET['games']) && isset($_GET['page'])) {

            if ($_GET['games'] == "true" && $_GET['page'] == "portfolio") {
                $this->view->render('SupportCenter/Publishing/Games/Portfolio');
            } else if ($_GET['games'] == "true" && $_GET['page'] == "devlogs") {
                $this->view->render('SupportCenter/Publishing/Games/Devlogs');
            } else if ($_GET['games'] == "true" && $_GET['page'] == "analytics") {
                $this->view->render('SupportCenter/Publishing/Games/Analytics');
            } else if ($_GET['games'] == "true" && $_GET['page'] == "sales") {
                $this->view->render('SupportCenter/Publishing/Games/Sales');
            }
        } else if (isset($_GET['crowdfunds']) && isset($_GET['page'])) {

            if ($_GET['crowdfunds'] == "true" && $_GET['page'] == "introduction") {
                $this->view->render('SupportCenter/Publishing/Crowdfunds/Introduction');
            } else if ($_GET['crowdfunds'] == "true" && $_GET['page'] == "basic_terminology") {
                $this->view->render('SupportCenter/Publishing/Crowdfunds/Basics');
            } else if ($_GET['crowdfunds'] == "true" && $_GET['page'] == "funding_mechanism") {
                $this->view->render('SupportCenter/Publishing/Crowdfunds/Funding');
            } else if ($_GET['crowdfunds'] == "true" && $_GET['page'] == "revenue_sharing") {
                $this->view->render('SupportCenter/Publishing/Crowdfunds/RevenueSharing');
            } else if ($_GET['crowdfunds'] == "true" && $_GET['page'] == "more") {
                $this->view->render('SupportCenter/Publishing/Crowdfunds/MoreInfo');
            }
        } else if (isset($_GET['gigs']) && isset($_GET['page'])) {

            if ($_GET['gigs'] == "true" && $_GET['page'] == "introduction") {
                $this->view->render('SupportCenter/Publishing/Gigs/Introduction');
            } else if ($_GET['gigs'] == "true" && $_GET['page'] == "basic_terminology") {
                $this->view->render('SupportCenter/Publishing/Gigs/Basics');
            } else if ($_GET['gigs'] == "true" && $_GET['page'] == "negotiations") {
                $this->view->render('SupportCenter/Publishing/Gigs/Negotiations');
            } else if ($_GET['gigs'] == "true" && $_GET['page'] == "revenue_sharing") {
                $this->view->render('SupportCenter/Publishing/Gigs/RevenueShare');
            } else if ($_GET['gigs'] == "true" && $_GET['page'] == "chat_functionality") {
                $this->view->render('SupportCenter/Publishing/Gigs/ChatFunctionality');
            }
        } else if (isset($_GET['jams']) && isset($_GET['page'])) {

            if ($_GET['jams'] == "true" && $_GET['page'] == "introduction") {
                $this->view->render('SupportCenter/Publishing/GameJams/Introduction');
            } else if ($_GET['jams'] == "true" && $_GET['page'] == "submissions") {
                $this->view->render('SupportCenter/Publishing/GameJams/Submissions');
            } else if ($_GET['jams'] == "true" && $_GET['page'] == "ranking_criteria") {
                $this->view->render('SupportCenter/Publishing/GameJams/Rankings');
            } else if ($_GET['jams'] == "true" && $_GET['page'] == "certificates") {
                $this->view->render('SupportCenter/Publishing/GameJams/Certificate');
            } else if ($_GET['jams'] == "true" && $_GET['page'] == "rules") {
                $this->view->render('SupportCenter/Publishing/GameJams/Rules');
            }
        } else {
            $this->view->render('SupportCenter/Publishing/Overview');
        }
    }
}
