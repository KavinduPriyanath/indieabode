<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Cart extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        $cartTotal = 0;
        $saleDiscount = 0;

        if (isset($_SESSION['logged']) && $_SESSION['userRole'] == "gamer") {

            $this->view->myGames = $this->model->showMyGameCart($_SESSION['id']);

            $cartItems = $this->model->showMyGameCart($_SESSION['id']);

            foreach ($cartItems as $cartGame) {

                $cartTotal = $cartTotal + floatval($cartGame['gamePrice']);
            }

            $this->view->cartTotal = number_format($cartTotal, 2);

            $this->view->discountTotal = number_format($saleDiscount, 2);

            $this->view->subTotal = number_format($cartTotal - $saleDiscount, 2);
        } else if (isset($_SESSION['logged']) && ($_SESSION['userRole'] == "game developer" || $_SESSION['userRole'] == "asset creator")) {

            $this->view->myAssets = $this->model->showMyAssetCart($_SESSION['id']);

            $cartItems = $this->model->showMyAssetCart($_SESSION['id']);

            foreach ($cartItems as $cartAsset) {

                $cartTotal = $cartTotal + floatval($cartAsset['assetPrice']);
            }

            $this->view->cartTotal = number_format($cartTotal, 2);

            $this->view->discountTotal = number_format($saleDiscount, 2);

            $this->view->subTotal = number_format($cartTotal - $saleDiscount, 2);
        } else if (!isset($_SESSION['logged'])) {

            header('location:/indieabode/');
        }




        $this->view->render('Cart');
    }

    function removeAssetFromCart()
    {

        $this->model->RemoveAssetFromCart($_SESSION['id'], $_GET['id']);

        header('location:/indieabode/cart');
    }

    function removeGameFromCart()
    {
        $this->model->RemoveGameFromCart($_SESSION['id'], $_GET['id']);

        header('location:/indieabode/cart');
    }

    function cartGameCheckout()
    {


        $cartGameItems = $this->model->showMyGameCart($_SESSION['id']);

        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);

        $cartTotal = 0;
        $saleDiscount = 0;

        foreach ($cartGameItems as $cartGame) {

            $cartTotal = $cartTotal + floatval($cartGame['gamePrice']);
        }

        $subTotal = $cartTotal - $saleDiscount;
        $cartName = 'cart' . $_SESSION['id'];


        $amount = $subTotal;
        $item = $cartName;
        // $amount = 30.00;
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
        $array['item'] = $item;
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

    function cartGameCheckoutSuccessful()
    {

        $orderId = $_POST['orderID'];
        $amount = $_POST['amount'];

        $cartGameItems = $this->model->showMyGameCart($_SESSION['id']);

        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $developerEmail = $downloadingDev['email'];

        foreach ($cartGameItems as $cartGame) {



            //updating game_purchas table
            $this->model->SuccessfulGamePurchase($cartGame['gameID'], $_SESSION['id'], $cartGame['gamePrice'], $orderId);

            //upading game_stats for increment the total revenue of that game
            $revenueShare = $this->model->GetGameRevenueShare($cartGame['gameID']);

            $this->model->GameDeveloperShare($cartGame['gameID'], $revenueShare['revenueShare'], $cartGame['gamePrice']);

            $this->model->IndieabodeGameShare($cartGame['gameID'], $orderId, $revenueShare['revenueShare'], $cartGame['gamePrice']);

            $this->model->AddtoGameLibrary($cartGame['gameID'], $_SESSION['id']);

            $this->model->RemoveGameFromCart($_SESSION['id'], $cartGame['gameID']);
        }

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
            <p>You have purchased these games in cart</p>
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


    function cartAssetCheckout()
    {

        $cartAssetItems = $this->model->showMyAssetCart($_SESSION['id']);

        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);

        $cartTotal = 0;
        $saleDiscount = 0;

        foreach ($cartAssetItems as $cartAsset) {

            $cartTotal = $cartTotal + floatval($cartAsset['assetPrice']);
        }

        $subTotal = $cartTotal - $saleDiscount;
        $cartName = 'cart' . $_SESSION['id'];


        $amount = $subTotal;
        $item = $cartName;
        // $amount = 30.00;
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
        $array['item'] = $item;
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

    function cartAssetCheckoutSuccessful()
    {


        $orderId = $_POST['orderID'];
        $amount = $_POST['amount'];

        $cartAssetItems = $this->model->showMyAssetCart($_SESSION['id']);

        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $developerEmail = $downloadingDev['email'];

        foreach ($cartAssetItems as $cartAsset) {


            //updating game_purchas table
            $this->model->SuccessfulAssetPurchase($cartAsset['assetID'], $_SESSION['id'], $cartAsset['assetPrice'], $orderId);

            //upading game_stats for increment the total revenue of that game
            $revenueShare = $this->model->GetAssetRevenueShare($cartAsset['assetID']);

            $this->model->AssetCreatorShare($cartAsset['assetID'], $revenueShare['revenueShare'], $cartAsset['assetPrice']);

            $this->model->IndieabodeAssetShare($cartAsset['assetID'], $orderId, $revenueShare['revenueShare'], $cartAsset['assetPrice']);

            $this->model->AddtoAssetLibrary($cartAsset['assetID'], $_SESSION['id']);

            $this->model->removeAssetFromCart($_SESSION['id'], $cartAsset['assetID']);
        }

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
            <p>You have purchased these games in cart</p>
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
}
