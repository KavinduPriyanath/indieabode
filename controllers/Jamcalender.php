<?php

class Jamcalender extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {


        $this->view->render('JamCalender');
    }
}
