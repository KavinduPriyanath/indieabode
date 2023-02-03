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

            $this->view->assetCreator = $this->model->getAssetsCreator($this->model->showSingleAsset($assetID));

            $this->view->screenshots = $this->model->getScreenshots($assetID);

            $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->hasClaimed = $this->model->AlreadyClaimed($assetID, $_SESSION['id']);

            $this->view->stats = $this->model->AssetStats($assetID);

            $this->view->render('SingleAsset');
        }
    }

    function checkout()
    {
        $this->view->asset = $this->model->showSingleAsset($_GET['id']);

        $this->view->render('Checkout');
    }

    function download()
    {
        $downloadingDev = $this->model->currentUser($_SESSION['id']);

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
            //header('location:/indieabode/forgotpassword/resetmailsent');
        } catch (Exception $e) {
            header('location:/indieabode/downloadfailed');
        }

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$assetFileName");
        readfile($downloadPath);

        $this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);
    }

    function reviews()
    {
        $this->view->asset = $this->model->showSingleAsset($_GET['id']);

        $this->view->render('Reviews/Asset-Reviews');
    }
}
