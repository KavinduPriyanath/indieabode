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
        $assetDetails = $_POST['description'];
        $assetTags = $_POST['asset-tags'];
        $assetType = $_POST['asset-type'];
        $assetStyle = $_POST['asset-style'];
        // $assetPricing = 
        $assetLicense = $_POST['asset-license'];
        $assetVideoUrl = $_POST['asset-illustration-video'];
        $assetVisibility = $_POST['asset-visibility'];
        $assetFile = $this->model->uploadassetFile($assetName);
        $assetCoverImg = $this->model->uploadCoverImg($assetName);
        $assetScreenshots = $this->model->uploadScreenshots($assetName);

        if ($_POST['asset-price'] == "Free") {
            $assetPrice = 0.00;
        } else if ($_POST['asset-price'] == "PWYW") {
            $assetPrice = trim($_POST['asset-pwyw-default'], "$");
        } else if ($_POST['asset-price'] == "Paid") {
            $assetPrice = $_POST['asset-price-paid'];
        }

        $this->model->uploadNewAsset(
            $assetName,
            $assetPrice,
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
            $assetScreenshots
        );

        $this->model->UpdateAssetStats($assetName);

        header('location:/indieabode/');
    }
}
