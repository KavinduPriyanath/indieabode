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

        $this->view->title = "Assets";

        //pagination 
        $maxLimit = 24;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        if (isset($_GET['classification'])) {
            $assetClassification = $_GET['classification'];

            if ($assetClassification == '2D') {
                $this->view->assets = $this->model->showClassifiedAssets('2d');
                $this->view->title = "Category: 2D";
            } else if ($assetClassification == '3D') {
                $this->view->assets = $this->model->showClassifiedAssets('3d');
                $this->view->title = "Category: 3D";
            } else if ($assetClassification == 'audio') {
                $this->view->assets = $this->model->showClassifiedAssets('audio');
                $this->view->title = "Category: Audio";
            } else if ($assetClassification == 'visual-effects') {
                $this->view->assets = $this->model->showClassifiedAssets('visual-effects');
                $this->view->title = "Category: Visual-Effects";
            } else if ($assetClassification == 'textures') {
                $this->view->assets = $this->model->showClassifiedAssets('textures');
                $this->view->title = "Category: Textures";
            } else if ($assetClassification == 'maps') {
                $this->view->assets = $this->model->showClassifiedAssets('maps');
                $this->view->title = "Category: Maps";
            } else if ($assetClassification == 'tools') {
                $this->view->assets = $this->model->showClassifiedAssets('tools');
                $this->view->title = "Category: Tools";
            }
        } else {
            $this->view->assets = $this->model->showAllAssets($start, $maxLimit);
            $this->view->totalAssetPages = $this->model->totalAssetsPageCount($maxLimit);
        }

        $this->view->render('Main/Assets');
    }
}
