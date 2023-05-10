<?php

class AssetReviews extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        if (isset($_POST['rating_data'])) {

            $review = $_POST['review'];
            $rating = $_POST['rating_data'];
            $topic = $_POST['topic'];
            $assetID = $_GET['id'];
            $userID = $_SESSION['id'];
            $recommendation = $_POST['recommendation'];

            $oldRating = $_POST['rating'];

            if ($rating == 0) {
                $ratedCount = $oldRating;
            } else {
                $ratedCount = $rating;
            }

            $this->model->Reviews($review, $ratedCount, $topic, $assetID, $userID, $recommendation);

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

            $assetID = $_GET['id'];

            $result = $this->model->FetchReviews($assetID);

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

            if (isset($_SESSION['logged'])) {

                $thisUserHasReviewed = $this->model->HasReviewedThisAsset($_SESSION['id'], $_GET['id']);

                $thisUserReview = $this->model->HisThisAssetReview($_SESSION['id'], $_GET['id']);
            } else {

                $thisUserHasReviewed = null;

                $thisUserReview = null;
            }



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
            );

            echo json_encode($output);
        }
    }

    function DeleteReview()
    {

        $reviewerID = $_SESSION['id'];
        $assetID = $_GET['id'];

        $this->model->DeleteReview($reviewerID, $assetID);

        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $result);

        header('Location:/indieabode/game/reviews?' . http_build_query($result));
    }
}
