<?php

class AssetUpload extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        $this->view->render('Forms/AssetUpload');
    }

    function uploadAsset()
    {

        $assetName = $_POST['asset-title'];
        $assetTagline = $_POST['asset-tagline'];
        $foreignKey = $_SESSION['id'];
        $assetClassification = $_POST['asset-classification'];
        $assetStatus = $_POST['asset-status'];
        $assetDetails = $_POST['asset-details'];
        $assetTags = $_POST['asset-tags'];
        $assetType = $_POST['asset-type'];
        $assetStyle = $_POST['asset-style'];
        // $assetPricing = 
        $assetLicense = $_POST['asset-license'];
        $assetVideoUrl = $_POST['asset-illustration-video'];
        $assetVisibility = $_POST['asset-visibility'];
        $assetFile = $this->model->uploadGameFile($assetName);
        $assetCoverImg = $this->model->uploadCoverImg($assetName);
        $assetScreenshots = $this->model->uploadScreenshots($assetName);

        $this->model->uploadNewAsset(
            $assetName,
        //$assetPricing
            $assetDetails,
            $assetTagline,
            $foreignKey,
            $assetClassification,
            $assetStatus,
            $assetTags,
            $assetType,
            $assetStyle,
            $assetLicense,
            $assetVideoUrl,
            $assetVisibility,
            $assetFile,
            $assetCoverImg,
            $assetScreenshots,
            $fileSize,
            $fileextention
        );

        header('location:/indieabode/');
    }
}
