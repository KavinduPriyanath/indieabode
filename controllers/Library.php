<?php

class Library extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->myAssets = $this->model->showMyAssetLibrary($_SESSION['id']);

        $this->view->myGames = $this->model->showMyGameLibrary($_SESSION['id']);

        $this->view->render('Library');
    }

    function downloadGame()
    {
        $gameFileName = $this->model->downloadGameFile($_GET['id']);

        $this->model->updateGameDownloadStat($_GET['id'], date("Y-m-d"));

        $gameFilePath = 'public/uploads/games/file/';

        $downloadPath = $gameFilePath . $gameFileName;

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$gameFileName");
        readfile($downloadPath);
    }

    function downloadAsset()
    {
        $assetFileName = $this->model->downloadAssetFile($_GET['id']);

        // $this->model->updateGameDownloadStat($_GET['id'], date("Y-m-d"));

        $assetFilePath = 'public/uploads/assets/file/';

        $downloadPath = $assetFilePath . $assetFileName;

        header('Cache-Control: public');
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header("Content-Transfer-Encoding: utf-8");
        header("Content-Disposition: attachment; filename=$assetFileName");
        readfile($downloadPath);
    }
}
