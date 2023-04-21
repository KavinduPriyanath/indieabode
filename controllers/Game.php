<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class Game extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        if (isset($_GET['id'])) {
            $gameID = $_GET['id'];


            $this->view->game = $this->model->showSingleGame($gameID);

            $thisGame = $this->model->showSingleGame($gameID);

            if ($thisGame['gamePrice'] == "0") {
                $this->view->gamePrice = "FREE";
            } else if ($thisGame['gamePrice'] != "0") {
                $this->view->gamePrice = "$" . $thisGame['gamePrice'];
            }

            $platforms = $thisGame['platform'];

            if ($thisGame['gamePublisherID'] == 0) {
                $this->view->publisher = $this->model->getUserDetails($thisGame['gameDeveloperID']);
            } else {
                $this->view->publisher = $this->model->getUserDetails($thisGame['gamePublisherID']);
            }

            $this->view->platforms = explode(',', $platforms);

            $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            $this->view->screenshots = $this->model->getScreenshots($gameID);

            $this->view->ssCount = count($this->model->getScreenshots($gameID));

            $this->view->popularGames = $this->model->PopularGames($gameID, $thisGame['gameClassification']);

            $this->view->reportReasons = $this->model->ComplaintReasons();

            $this->view->Isfree = $this->model->free($gameID);

            if (isset($_SESSION['logged'])) {

                $this->view->hasInCart = $this->model->AlreadyInCart($gameID, $_SESSION['id']);

                $this->view->hasClaimed = $this->model->AlreadyClaimed($gameID, $_SESSION['id']);

                $ViewTracker = $this->model->GameViewTracker($_SESSION['id'], $_SESSION['session'], $gameID);

                if ($ViewTracker) {
                    $this->model->updateGameViewStat($_GET['id'], date("Y-m-d"));
                    $this->model->updateGameViews($_GET['id']);
                }
            }

            $this->view->render('SingleGame');
        }
    }

    function reviews()
    {

        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        $this->view->game = $this->model->showSingleGame($_GET['id']);

        // $this->view->hasReviewed = $this->model->HasReviewedThisGame($_SESSION['id'], $_GET['id']);

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

    function download()
    {
        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $this->model->updateGameDownloadStat($_GET['id'], date("Y-m-d"));

        $developerEmail = $downloadingDev['email'];

        $gameFileName = $this->model->downloadFile($_GET['id']);

        $gameFilePath = 'public/uploads/games/file/';

        $downloadPath = $gameFilePath . $gameFileName;

        //sending an email receipt
        try {
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->Username = "tech2019man@gmail.com";
            $mail->Password = "qohvqzbaieleualv";

            $mail->setFrom("tech2019man@gmail.com", "Indieabode");
            $mail->addAddress($developerEmail);

            $email_template = '
                <h2>Hello</h2>
                <p>You have purchased this game</p>
            ';

            $mail->isHTML(true);
            $mail->Subject = "New game";
            $mail->Body = $email_template;

            $mail->send();
            //header('location:/indieabode/forgotpassword/resetmailsent');


        } catch (Exception $e) {
            $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            parse_str($query, $result);
            header('location:/indieabode/game?' . http_build_query($result));
        }

        $this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$gameFileName");
        readfile($downloadPath);
    }

    function addtoLibrary()
    {
        if ($_POST['add_to_library'] == true) {
            $gameID = $_POST['gameID'];

            $gamerID = $_SESSION['id'];

            $this->model->AddtoLibrary($gameID, $gamerID);

            echo "1";
        }
    }

    function downloadGame()
    {

        $gameFileName = $this->model->downloadGameFile($_GET['id']);

        $this->model->updateGameDownloadStat($_GET['id'], date("Y-m-d"));

        $this->model->updateGameDownloads($_GET['id']);

        $gameFilePath = 'public/uploads/games/file/';

        $downloadPath = $gameFilePath . $gameFileName;

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$gameFileName");
        readfile($downloadPath);
    }

    function checkout()
    {
        $this->view->game = $this->model->showSingleGame($_GET['id']);
        $this->view->render('Checkouts/AssetCheckout');
    }


    function buyGame()
    {

        $gameID = $_GET['id'];

        $game = $this->model->showSingleGame($gameID);

        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);



        // if (empty($asseID)) {
        //     echo "2";
        // }

        // $amount = $asset['assetPrice'];
        $amount = 30.00;
        $merchant_id = "1222729";
        $order_id = uniqid();
        $merchant_secret = "MjczNjU0OTYzMzM3NDA3NzYzMjczNzEyMjI2MjM4MTQ3MjE2OTkxMg==";
        $currency = "LKR";

        //more information
        $address = $userBillingInfo['streetLine1'];
        $city = $userBillingInfo['city'];
        $country = $userBillingInfo['country'];
        $firstName = $userDetails['firstName'];
        $lastName = $userDetails['lastName'];
        $email = $userDetails['email'];


        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );

        $array = [];

        $array['amount'] = $amount;
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;

        $array['address'] = $address;
        $array['city'] = $city;
        $array['country'] = $country;
        $array['firstName'] = $firstName;
        $array['lastName'] = $lastName;
        $array['email'] = $email;

        $jsonObj = json_encode($array);

        echo $jsonObj;
    }

    function purchaseSuccessful()
    {

        $orderId = $_POST['orderID'];
        $amount = $_POST['assetID'];

        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $developerEmail = $downloadingDev['email'];

        $this->model->SuccessfulGamePurchase($_GET['id'], $_SESSION['id'], $amount, $orderId);

        $this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);

        //sending an email receipt
        try {
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->Username = "tech2019man@gmail.com";
            $mail->Password = "qohvqzbaieleualv";

            $mail->setFrom("tech2019man@gmail.com", "Indieabode");
            $mail->addAddress($developerEmail);

            $email_template = '
                <h2>Hello</h2>
                <p>You have purchased this game</p>
            ';

            $mail->isHTML(true);
            $mail->Subject = "New Asset";
            $mail->Body = $email_template;

            $mail->send();


            //$this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);
            //header('location:/indieabode/forgotpassword/resetmailsent');
            //header("location:/indieabode/asset?id=" . $_GET['id']);
        } catch (Exception $e) {
            header('location:/indieabode/downloadfailed');
            // echo "1";
        }
    }

    function thankyou()
    {


        $this->view->render('ThankYou/AssetPurchase');
    }


    function report()
    {
        // $reason = $_POST['reason'];
        // $des = $_POST['Rdes'];
        // $email = $_POST['email'];
        // $id = $_SESSION['id'];

        // $this->model->reportSubmit($reason, $des, $id, $email);

        // $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // parse_str($query, $result);
        // header('location:/indieabode/game?' . http_build_query($result));

        if (isset($_POST['report_submit'])) {

            $reason = $_POST['reason'];
            $description = $_POST['description'];
            $type = "Game";
            $gamerID = $_SESSION['id'];

            $this->model->reportSubmit($reason, $description, $gamerID, $type);
        }

        // echo "Successful";
    }

    function AddToCart()
    {

        if ($_POST['add_to_cart'] == true) {

            $gameID = $_POST['gameID'];

            $this->model->AddtoCart($gameID, $_SESSION['id']);

            echo "1";
        }



        // $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // parse_str($query, $result);

        // header('Location:/indieabode/game/?' . http_build_query($result));
    }
}
