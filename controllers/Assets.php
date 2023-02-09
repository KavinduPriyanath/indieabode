<?php

class Assets extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        if (isset($_GET['classification'])) {
            $assetClassification = $_GET['classification'];

            if ($assetClassification == '2D') {
                $this->view->assets = $this->model->showClassifiedAssets('2d');
            } else if ($assetClassification == '3D') {
                $this->view->assets = $this->model->showClassifiedAssets('3d');
            } else if ($assetClassification == 'audio') {
                $this->view->assets = $this->model->showClassifiedAssets('audio');
            } else if ($assetClassification == 'visual-effects') {
                $this->view->assets = $this->model->showClassifiedAssets('visual-effects');
            } else if ($assetClassification == 'textures') {
                $this->view->assets = $this->model->showClassifiedAssets('textures');
            } else if ($assetClassification == 'maps') {
                $this->view->assets = $this->model->showClassifiedAssets('maps');
            } else if ($assetClassification == 'tools') {
                $this->view->assets = $this->model->showClassifiedAssets('tools');
            }
        } else {
            $this->view->assets = $this->model->showAllAssets();
        }

        $this->view->render('Main/Assets');
    }
}
