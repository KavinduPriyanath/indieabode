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
}
