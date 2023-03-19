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
        $currency = "USD";

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
}
