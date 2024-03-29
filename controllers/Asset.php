<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Asset extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $assetID = $_GET['id'];

            $this->view->asset = $this->model->showSingleAsset($assetID);

            $thisAsset = $this->model->showSingleAsset($assetID);

            //Calculating the Asset File's size
            //Getting the asset file's path
            $assetFilePath = 'public/uploads/assets/file/' . $thisAsset['assetFile'];
            //Using filesize function to get the size in Bytes format
            $filesize = filesize($assetFilePath);
            //Converting the Byte sized value of the file into MegaBytes
            $this->view->fileSize = round($filesize / 1024 / 1024, 2);

            if ($thisAsset['assetPrice'] == "0") {
                $this->view->assetPrice = "FREE";
            } else if ($thisAsset['assetPrice'] != "0") {
                $this->view->assetPrice = "$" . number_format(floatval($thisAsset['assetPrice']), 2);
            }

            $this->view->assetCreator = $this->model->getAssetsCreator($this->model->showSingleAsset($assetID));

            $this->view->screenshots = $this->model->getScreenshots($assetID);

            $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->stats = $this->model->AssetStats($assetID);

            $this->view->popularAssets = $this->model->PopularAssets($thisAsset['assetType'], $thisAsset['assetID']);

            $this->view->reportReasons = $this->model->ComplaintReasons();

            if (isset($_SESSION['logged'])) {
                $this->view->hasClaimed = $this->model->AlreadyClaimed($assetID, $_SESSION['id']);

                $this->view->hasInCart = $this->model->AlreadyInCart($assetID, $_SESSION['id']);

                $ViewTracker = $this->model->AssetViewTracker($_SESSION['id'], $_SESSION['session'], $assetID);

                if ($ViewTracker) {
                    $this->model->updateAssetViewStat($_GET['id'], date("Y-m-d"));
                    $this->model->updateAssetViews($_GET['id']);
                }
            }

            $this->view->render('SingleAsset');
        }
    }

    function checkout()
    {
        $this->view->asset = $this->model->showSingleAsset($_GET['id']);

        $this->view->render('Checkouts/AssetCheckout');
    }

    function buyAsset()
    {

        $assetID = $_GET['id'];

        $asset = $this->model->showSingleAsset($assetID);

        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        if (empty($userBillingInfo)) {
            echo "empty";
        } else {
            $userDetails = $this->model->getUserDetails($_SESSION['id']);

            $amount = $asset['assetPrice'];
            $item = $asset['assetName'];
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
    }

    function purchaseSuccessful()
    {

        $orderId = $_POST['orderID'];
        $amount = $_POST['amount'];

        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $developerEmail = $downloadingDev['email'];

        $this->model->SuccessfulAssetPurchase($_GET['id'], $_SESSION['id'], $amount, $orderId);

        //upadating game_stats for increment the total revenue of that game
        $revenueShare = $this->model->GetRevenueShare($_GET['id']);

        $this->model->AssetCreatorShare($_GET['id'], $revenueShare['revenueShare'], $amount);

        $this->model->IndieabodeShare($_GET['id'], $orderId, $revenueShare['revenueShare'], $amount);

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
                <p>You have purchased this asset</p>
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

    function download()
    {
        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $this->model->updateAssetDownloadStat($_GET['id'], date("Y-m-d"));

        $developerEmail = $downloadingDev['email'];

        $assetFileName = $this->model->downloadFile($_GET['id']);

        $assetFilePath = 'public/uploads/assets/file/';

        $downloadPath = $assetFilePath . $assetFileName;

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
                <p>You have purchased this asset</p>
            ';

            $mail->isHTML(true);
            $mail->Subject = "New Asset";
            $mail->Body = $email_template;

            $mail->send();


            $this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);
            //header('location:/indieabode/forgotpassword/resetmailsent');
            header("location:/indieabode/asset?id=" . $_GET['id']);
        } catch (Exception $e) {
            header('location:/indieabode/downloadfailed');
        }



        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$assetFileName");
        readfile($downloadPath);
    }

    function reviews()
    {
        $this->view->asset = $this->model->showSingleAsset($_GET['id']);

        $this->view->render('Reviews/Asset-Reviews');
    }

    function AddToCart()
    {

        if ($_POST['add_to_cart'] == true) {

            $assetID = $_POST['assetID'];

            $this->model->AddtoCart($assetID, $_SESSION['id']);

            echo "1";
        }
    }

    function thankyou()
    {


        $this->view->render('ThankYou/AssetPurchase');
    }

    function report()
    {
        if (isset($_POST['report_submit'])) {

            $reason = $_POST['reason'];
            $description = $_POST['description'];
            $type = "Asset";
            $itemID = $_POST['assetID'];
            $gamerID = $_SESSION['id'];

            $this->model->reportSubmit($reason, $description, $gamerID, $type, $itemID);
        }
    }

    function downloadAsset()
    {
        $assetFileName = $this->model->downloadAssetFile($_GET['id']);

        $this->model->updateAssetDownloadStat($_GET['id'], date("Y-m-d"));

        $this->model->updateAssetDownloads($_GET['id']);

        $assetFilePath = 'public/uploads/assets/file/';

        $downloadPath = $assetFilePath . $assetFileName;

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$assetFileName");
        readfile($downloadPath);
    }

    function addtoLibrary()
    {
        if ($_POST['add_to_library'] == true) {
            $assetID = $_POST['assetID'];

            $developerID = $_SESSION['id'];

            $this->model->AddtoLibrary($assetID, $developerID);

            echo "1";
        }
    }
}
