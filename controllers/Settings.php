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
        $this->view->user = $this->model->UserInfo($_SESSION['id']);

        $this->view->render('Settings/Profile');
    }

    function updateProfileInfo()
    {
        if ($_POST['save'] == true) {
            $userID = $_SESSION['id'];
            $username = $_POST['username'];
            $avatar = $_POST['avatar'];

            $this->model->UpdateUserInfo($userID, $username, $avatar);
        }


        // header('location:/indieabode/settings/profile');
    }

    function existingUsernameCheck()
    {

        $username = $_POST['username'];

        $username = $this->model->ExistingUsernameCheck($username, $_SESSION['id']);

        if (!empty($username)) {
            //username already exists
            echo "1";
        } else {
            echo "2";
        }
    }

    function portfolio()
    {
        $this->view->portfolioInfo = $this->model->currentUserPortfolio($_SESSION['id']);

        $this->view->render('Settings/PortfolioSettings');
    }

    function updatePortfolioInfo()
    {

        if ($_POST['save'] == true) {

            $userID = $_SESSION['id'];
            $displayName = $_POST['displayName'];
            $displayImg = $this->model->uploadPortfolioImg($_SESSION['id']);
            $website = $_POST['website'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $location = $_POST['location'];
            $phoneNumber = $_POST['phoneNumber'];
            $description = $_POST['description'];

            $this->model->updateCurrentUserPortfolio($userID, $displayName, $displayImg, $description, $website, $twitter, $linkedin, $location, $phoneNumber);
        }
    }

    function password()
    {

        $this->view->render('Settings/Password');
    }

    function updatePassword()
    {

        if ($_POST['password_update'] == true) {

            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $userID = $_POST['userID'];


            $hasedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $passwordUpdate = $this->model->UpdatePassword($oldPassword, $hasedPassword, $userID);

            if ($passwordUpdate == true) {
                echo "1";
            } else {
                echo "2";
            }
        }
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
        $this->view->currentRevenueShare = $this->model->CurrentRevenueShare($_SESSION['id']);

        $this->view->render('Settings/RevenueShare');
    }

    function emailNotifications()
    {

        $this->view->render('Settings/EmailNotifications');
    }

    function paymentprocessors()
    {

        $this->view->render('Settings/PaymentProcessor');
    }

    function billingAddress()
    {

        $userBillingAddresses = $this->model->currentUserBilling($_SESSION['id']);

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

    function updateRevenueShare()
    {

        $userID = $_SESSION['id'];
        $shareAmount = $_POST['revenueShare'];

        $this->model->UpdateRevenueShare($userID, $shareAmount);

        echo "success";
    }
}
