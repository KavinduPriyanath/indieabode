<?php

class Legal extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        echo "Legal Main Page";
    }

    function privacy_policy()
    {

        $this->view->render('SupportCenter/Legals/PrivacyPolicy');
    }

    function terms_of_service()
    {

        $this->view->render('SupportCenter/Legals/TermsOfService');
    }

    function cookie_policy()
    {

        $this->view->render('SupportCenter/Legals/CookiePolicy');
    }
}
