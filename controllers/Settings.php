<?php

class Settings extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        // $this->view->myAssets = $this->model->showMyLibrary($_SESSION['id']);

        // $this->view->render('Library');
    }

    function profile()
    {

        $this->view->render('Settings/Profile');
    }

    function portfolio()
    {

        $this->view->render('Settings/PortfolioSettings');
    }

    function password()
    {

        $this->view->render('Settings/Password');
    }

    function emailaddress()
    {

        $this->view->render('Settings/EmailAddress');
    }

    function twofactorauth()
    {

        $this->view->render('Settings/TwoFactorAuth');
    }

    function revenueshare()
    {

        $this->view->render('Settings/RevenueShare');
    }

    function emailNotifications()
    {

        $this->view->render('Settings/EmailNotifications');
    }

    function billingAddress()
    {

        $userBillingAddresses = $this->view->userBilling = $this->model->currentUserBilling($_SESSION['id']);

        if (!empty($userBillingAddresses)) {
            $this->view->userBilling = $userBillingAddresses;
        } else {
            $this->view->userBilling['fullName'] = "";
            $this->view->userBilling['streetLine1'] = "";
            $this->view->userBilling['streetLine2'] = "";
            $this->view->userBilling['city'] = "";
            $this->view->userBilling['province'] = "";
            $this->view->userBilling['zipCode'] = "";
        }

        $this->view->render('Settings/BillingAddress');
    }

    function addBillingAddressData()
    {
        if (isset($_POST['save'])) {

            $fullName = $_POST['fullName'];
            $street1 = $_POST['street1'];
            $street2 = $_POST['street2'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $postalCode = $_POST['postalCode'];
            $country = $_POST['country'];
            $userID = $_SESSION['id'];
        }

        $this->model->addUserBillingData($fullName, $street1, $street2, $city, $province, $postalCode, $country, $userID);

        header('location:/indieabode/settings/billingAddress');
    }
}
