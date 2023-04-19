<?php

class GameReviews extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {

        if (isset($_POST['rating_data'])) {

            // $data = array(
            //     ':review' => $_POST['review'],
            //     ':rating' => $_POST['rating_data'],
            //     ':topic' => $_POST['topic'],
            //     ':gameID' => $_GET['id'],
            //     ':userID' => $_SESSION['id'],
            //     ':recommendation' => $_POST['recommendation']
            // );

            $review = $_POST['review'];
            $rating = $_POST['rating_data'];
            $topic = $_POST['topic'];
            $gameID = $_GET['id'];
            $userID = $_SESSION['id'];
            $recommendation = $_POST['recommendation'];

            $oldRating = $_POST['rating'];

            if ($rating == 0) {
                $ratedCount = $oldRating;
            } else {
                $ratedCount = $rating;
            }

            $this->model->Reviews($review, $ratedCount, $topic, $gameID, $userID, $recommendation);

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

            $gameId = $_GET['id'];

            $result = $this->model->FetchReviews($gameId);

            foreach ($result as $row) {
                $review_content[] = array(
                    'review' => $row['review'],
                    'rating' => $row['rating'],
                    'reviewTopic' => $row['reviewTopic'],
                    'reviewerName' => $row['username']
                );

                if ($row["rating"] == '5') {
                    $five_star_review++;
                }

                if ($row["rating"] == '4') {
                    $four_star_review++;
                }

                if ($row["rating"] == '3') {
                    $three_star_review++;
                }

                if ($row["rating"] == '2') {
                    $two_star_review++;
                }

                if ($row["rating"] == '1') {
                    $one_star_review++;
                }

                $total_review++;

                $total_user_rating = $total_user_rating + $row["rating"];
            }

            $average_rating = $total_user_rating / $total_review;

            $thisUserHasReviewed = $this->model->HasReviewedThisGame($_SESSION['id'], $_GET['id']);

            $thisUserReview = $this->model->HisThisGameReview($_SESSION['id'], $_GET['id']);

            $reviewerInfo = $this->model->ReviewerInfo($_SESSION['id']);


            $thisUserReviewTopic = !empty($thisUserReview) ? $thisUserReview['reviewTopic'] : null;
            $thisUserReviewContent = !empty($thisUserReview) ? $thisUserReview['review'] : null;
            $thisUserReviewRecommendation = !empty($thisUserReview) ? $thisUserReview['recommendation'] : null;
            $thisUserReviewAverageRating = !empty($thisUserReview) ? $thisUserReview['rating'] : 0;


            $output = array(
                'average_rating'    =>    number_format($average_rating, 1),
                'total_review'        =>    $total_review,
                'five_star_review'    =>    $five_star_review,
                'four_star_review'    =>    $four_star_review,
                'three_star_review'    =>    $three_star_review,
                'two_star_review'    =>    $two_star_review,
                'one_star_review'    =>    $one_star_review,
                'review_data'        =>    $review_content,
                'has_reviewed' => $thisUserHasReviewed,
                'thisUserReviewTopic'   => $thisUserReviewTopic,
                'thisUserReviewContent' => $thisUserReviewContent,
                'thisUserReviewRecommendation' => $thisUserReviewRecommendation,
                'thisUserReviewAverageRating' => number_format($thisUserReviewAverageRating, 1),
                'username'  => $reviewerInfo[0],
            );

            echo json_encode($output);
        }
    }

    function DeleteReview()
    {

        $reviewerID = $_SESSION['id'];
        $gameID = $_GET['id'];

        $this->model->DeleteReview($reviewerID, $gameID);

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/game/reviews?' . http_build_query($result));
    }
}
