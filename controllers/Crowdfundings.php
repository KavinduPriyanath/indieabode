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
        // sort part
        if (isset($_GET['sortWhat'])) {
            $sort = $_GET['sortWhat'];
            if ($sort == "latest") {
                $Sorder = "DESC";
                $sort = "created_at";
            } else if ($sort == "priceLH") {
                $Sorder = "ASC";
                $sort = "expectedAmount";
            } else if ($sort == "priceHL") {
                $Sorder = "DESC";
                $sort = "expectedAmount";
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

        //pagination 
        $maxLimit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        if (isset($_GET['sortWhat'])) {
            $thisCrowdfunds = $this->model->showAllSortedCrowdfundings($sort, $Sorder);
        } else {
            $thisCrowdfunds = $this->model->showAllCrowdfundings($start, $maxLimit);
            $this->view->crowdfundsPagesCount = $this->model->totalCrowdfundsPageCount($maxLimit);
        }



        $crowdfundCount = count($thisCrowdfunds);

        $todayDate = date("Y-m-d");

        $origin = new DateTime($todayDate);

        for ($i = 0; $i < $crowdfundCount; $i++) {

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
