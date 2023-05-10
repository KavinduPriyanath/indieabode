<?php

class Crowdfundings extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        //pagination 
        $maxLimit = 16;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        $thisCrowdfunds = $this->model->showAllCrowdfundings($start, $maxLimit);
        $this->view->crowdfundsPagesCount = $this->model->totalCrowdfundsPageCount($maxLimit);

        $crowdfundCount = count($thisCrowdfunds);

        $todayDate = date("Y-m-d");

        $origin = new DateTime($todayDate);

        for ($i = 0; $i < 4; $i++) {

            $fundingPercentage = ($thisCrowdfunds[$i]['currentAmount'] / $thisCrowdfunds[$i]['expectedAmount']) * 100;

            //Adding Percentage Value of current funding amount to the associative array
            $thisCrowdfunds[$i]['fundingPercentage'] = (int)$fundingPercentage;
            $thisCrowdfunds[$i][7] = $fundingPercentage;

            //Adding remaining days count to the associative array
            $endDate = $thisCrowdfunds[$i]['deadline'];

            $target = new DateTime($endDate);

            $interval = $origin->diff($target);

            $daysLeft = $interval->format('%R%a');

            $thisCrowdfunds[$i]['daysLeft'] = $daysLeft;
            $thisCrowdfunds[$i][8] = $daysLeft;
        }

        $this->view->crowdfundings = $thisCrowdfunds;

        $this->view->render('Main/Crowdfundings');
    }
}
