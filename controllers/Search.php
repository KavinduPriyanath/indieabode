<?php

class Search extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $resultPages = [];

        if (isset($_GET['q'])) {
            $query = $_GET['q'];

            $this->view->games = $this->model->GamesQuery($query);

            $this->view->assets = $this->model->AssetsQuery($query);

            $this->view->gigs = $this->model->GigsQuery($query);

            $this->view->devlogs = $this->model->DevlogsQuery($query);

            $this->view->crowdfundings = $this->model->CrowdfundingsQuery($query);

            // if (!empty($this->model->GamesQuery($query))) {
            //     array_push($resultPages, "games");
            // }

            if (!empty($this->model->AssetsQuery($query))) {
                array_push($resultPages, "assets");
            }

            if (!empty($this->model->GigsQuery($query))) {
                array_push($resultPages, "gigs");
            }

            if (!empty($this->model->DevlogsQuery($query))) {
                array_push($resultPages, "devlogs");
            }

            if (!empty($this->model->CrowdfundingsQuery($query))) {
                array_push($resultPages, "crowdfundings");
            }
        }

        $this->view->options = $resultPages;
        $this->view->optionCount = count($resultPages);


        $this->view->render('Search');
    }

    function result()
    {

        if (isset($_POST['filter_changed'])) {

            $gigs_result = [];
            $assets_result = [];
            $crowdfundings_result = [];
            $devlogs_result = [];
            $games_result = [];
            $newFilter = $_POST['msg'];
            $query = $_GET['q'];

            if ($newFilter == "gigs") {
                $gigs = $this->model->GigsQuery($query);

                // echo "Comment Added Successfully!";

                foreach ($gigs as $row) {

                    array_push($gigs_result, $row);
                }

                echo json_encode($gigs_result);
            } else if ($newFilter == "assets") {
                $assets = $this->model->AssetsQuery($query);

                foreach ($assets as $row) {

                    array_push($assets_result, $row);
                }

                echo json_encode($assets_result);
            } else if ($newFilter == "devlogs") {

                $devlogs = $this->model->DevlogsQuery($query);

                foreach ($devlogs as $row) {

                    array_push($devlogs_result, $row);
                }

                echo json_encode($devlogs_result);
            } else if ($newFilter == "crowdfundings") {

                $crowdfundings = $this->model->CrowdfundingsQuery($query);

                foreach ($crowdfundings as $row) {

                    array_push($crowdfundings_result, $row);
                }

                echo json_encode($crowdfundings_result);
            } else if ($newFilter == "games") {

                $games = $this->model->GamesQuery($query);

                foreach ($games as $row) {

                    array_push($games_result, $row);
                }

                echo json_encode($games_result);
            }
        }
    }
}
