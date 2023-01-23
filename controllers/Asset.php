<?php

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

            $this->view->render('SingleAsset');
        }
    }
}
