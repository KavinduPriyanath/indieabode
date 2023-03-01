<?php

class Game extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gameID = $_GET['id'];


            $this->view->game = $this->model->showSingleGame($gameID);

            $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            $this->view->screenshots = $this->model->getScreenshots($gameID);

            $this->view->ssCount = count($this->model->getScreenshots($gameID));

            $this->view->popularGames = $this->model->PopularGames();

            $this->view->reportReasons = $this->model->ComplaintReasons();

            $this->view->render('SingleGame');
        }
    }

    function reviews()
    {
        $this->view->game = $this->model->showSingleGame($_GET['id']);

        if (isset($_POST['rating_data'])) {

            $data = array(
                ':review' => $_POST['review'],
                ':rating' => $_POST['rating_data']
            );

            $this->model->Reviews($data);

            echo "Your Review & Rating Successfully Submitted";
        }

        if (isset($_POST["action"])) {

            $average_rating = 0;
            $total_review = 0;
            $five_star_review = 0;
            $four_star_review = 0;
            $three_star_review = 0;
            $two_star_review = 0;
            $one_star_review = 0;
            $total_user_rating = 0;
            $review_content = array();

            $result = $this->model->FetchReviews();

            foreach ($result as $row) {
                $review_content[] = array(
                    'review' => $row['review'],
                    'rating' => $row['rating']
                );

                if ($row["rating"] == '5') {
                    $five_star_review++;
                }

                if ($row["rating"] == '5') {
                    $four_star_review++;
                }

                if ($row["rating"] == '5') {
                    $three_star_review++;
                }

                if ($row["rating"] == '5') {
                    $two_star_review++;
                }

                if ($row["rating"] == '5') {
                    $one_star_review++;
                }

                $total_review++;

                $total_user_rating = $total_user_rating + $row["rating"];
            }

            $average_rating = $total_user_rating / $total_review;

            $output = array(
                'average_rating'    =>    number_format($average_rating, 1),
                'total_review'        =>    $total_review,
                'five_star_review'    =>    $five_star_review,
                'four_star_review'    =>    $four_star_review,
                'three_star_review'    =>    $three_star_review,
                'two_star_review'    =>    $two_star_review,
                'one_star_review'    =>    $one_star_review,
                'review_data'        =>    $review_content
            );

            echo json_encode($output);
        }

        $this->view->render('Reviews/Game-Reviews');
    }
}
