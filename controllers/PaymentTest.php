<?php

class PaymentTest extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $assetID = $_GET['id'];

        $asset = $this->model->findAsset($assetID);

        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);



        // if (empty($asseID)) {
        //     echo "2";
        // }

        $amount = $asset['assetPrice'];
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

        $this->model->SuccessfulAssetPurchase($_GET['id'], $_SESSION['id'], $amount, $orderId);


        echo "1";
        // header('location:/indieabode/fefefef');

        // $merchant_id        = $_POST['merchant_id'];
        // $order_id           = $_POST['order_id'];
        // $payhere_amount     = $_POST['payhere_amount'];
        // $payhere_currency   = $_POST['payhere_currency'];
        // $status_code        = $_POST['status_code'];
        // $md5sig             = $_POST['md5sig'];
        // $status_message     = $_POST['status_message'];
        // $customer_token     = $_POST['customer_token'];

        // $merchant_secret = 'MjczNjU0OTYzMzM3NDA3NzYzMjczNzEyMjI2MjM4MTQ3MjE2OTkxMg=='; // Replace with your Merchant Secret

        // $local_md5sig = strtoupper(
        //     md5(
        //         $merchant_id .
        //             $order_id .
        //             $payhere_amount .
        //             $payhere_currency .
        //             $status_code .
        //             strtoupper(md5($merchant_secret))
        //     )
        // );

        // if (($local_md5sig === $md5sig) and ($status_code == 2)) {
        //     //TODO: Store the encrypted token ($customer_token) securely in your database against your customer
        //     $this->model->SuccessfulAssetPurchase($_GET['id'], $_SESSION['id'], 7.50);

        //     header('location:/indieabode/fefefef');
        // }
    }
}
