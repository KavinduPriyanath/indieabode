<?php

class Admin_assetD extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        // get data for the game db pie chart
        $earlyAccessGame = $this->model->getGameTypeCount('early access');
        $upcomingGame = $this->model->getGameTypeCount('Upcoming');
        $releasedGame = $this->model->getGameTypeCount('Released');

        $this->view->gameTypes = [];
        $this->view->gameTypes[0] = $earlyAccessGame;
        $this->view->gameTypes[1] = $upcomingGame;
        $this->view->gameTypes[2] = $releasedGame;

        //get data for the total transactions of game
        $this->view->totalTxAssets = $this->model->getTotalTxAsset();

        //get data for the transaction graph
        $assetTxSummary = $this->model->getTxSummary();
        if ($assetTxSummary !== null) {
            $this->view->txDates = $assetTxSummary['dates'];
            $this->view->txTotals = $assetTxSummary['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get upload games details
        $uploadGames = $this->model->getUploadGame();
        if ($uploadGames !== null) {
            $this->view->Dates = $uploadGames['dates'];
            $this->view->Totals = $uploadGames['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get data of game purchasings
       // $this->view->assetPurchases = $this->model->getAllPayments();

        $gameR = $this->model->getAllPayments();

        for($i=0;$i<count($gameR);$i++){
            $gameR[$i]['name'] = $this->model->getAssetName($gameR[$i]['assetID']);
        }

        $this->view->assetPurchases = $gameR;

        //get game revenues shares for each day
        $totalRevenues = $this->model->getAllAssetRevenues();
        if ($totalRevenues !== null) {
            $this->view->revenueDates = $totalRevenues['dates'];
            $this->view->revenueTotals = $totalRevenues['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get total game revenue
        $this->view->totalAssetRevenue = $this->model->getTotalAssetRevenue();

        $assetR = $this->model->getAssetRevenueShare();

        for($i=0;$i<count($assetR);$i++){
            $assetR[$i]['name'] = $this->model->getAssetName($assetR[$i]['assetID']);
        }

        $this->view->assetRevenues = $assetR;

        //game revenue all the details
       // $this->view->assetRevenues = $this->model->getAssetRevenueShare();
        $this->view->render('Admin/Admin_assetD');

    }

    function downloadrevenuePDF(){
        require_once('includes/tcpdf/tcpdf.php');

        ob_start();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // Disable header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->SetFont('times', 'BI', 14);

        // add a page
        $pdf->AddPage();

        $pdf->Cell(0, 10, 'INDIE ABODE', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Game Publishing Platform', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Asset Revenue Report', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);

        $pdf->Ln(4);
        $currentDateTime = date('Y-m-d H:i:s');
        $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

        $pdf->SetFont('helvetica', 'BU', 12);
        $pdf->Ln(6);

        // add a table
        $header = array('Transaction ID', 'Asset ID','Sale Date', 'Site Share');
        $pdf->Ln(10); // add some vertical spacing before the table
        $pdf->SetFont('times', '', 14);
        $pdf->SetFillColor(240, 240, 240); // set background color for header row
        $pdf->SetTextColor(0); // set text color for header row
        $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
        $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[3], 1, 1, 'C', 1);
        $pdf->SetFillColor(255, 255, 255); // set background color for data rows
        $pdf->SetTextColor(0); // set text color for data rows
        $pdf->SetLineWidth(0.3); // Set the border width for cells
        $pdf->SetFont('times', '', 12);
        $totalCost = 0;
        $assetRevenues = $this->model->getAssetRevenueShare();
        foreach ($assetRevenues as $revenue) {

            $aa = $this->model->getAssetName($revenue['assetID']);
            $pdf->Cell(40, 6, $revenue['id'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $aa, 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $revenue['sale_date'], 1, 0, 'C', 1);
            $totalCost = $totalCost + floatval($revenue['siteShare']);
            $pdf->Cell(40, 6, '$'.$revenue['siteShare'], 1, 1, 'R', 1);

        }    

        $pdf->Ln(10);
       
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Total Asset Revenue:     $'.$totalCost, 0, 1, 'C');
        $pdf->Ln(2); // move down by 2 units
        $pdf->SetLineWidth(0.5); // set line width to 0.5 units
        $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
        $pdf->Ln(2); // move down by 2 units again
        $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        
        // ---------------------------------------------------------

        ob_clean();
        ob_flush();
        //Close and output PDF document
        $pdf->Output('AssetRevenue.pdf', 'D');

        ob_end_flush();
        ob_end_clean();
    }
    function downloadPDF(){
        require_once('includes/tcpdf/tcpdf.php');

        ob_start();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // Disable header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->SetFont('times', 'BI', 14);

        // add a page
        $pdf->AddPage();

        $pdf->Cell(0, 10, 'INDIE ABODE', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Game Publishing Platform', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Asset Payment Report', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);

        $pdf->Ln(4);
        $currentDateTime = date('Y-m-d H:i:s');
        $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

        $pdf->SetFont('helvetica', 'BU', 12);
        $pdf->Ln(6);

        // add a table
        $header = array('Asset ID', 'Buyer ID','Payment Date', 'Payment Amount');
        $pdf->Ln(10); // add some vertical spacing before the table
        $pdf->SetFont('times', '', 14);
        $pdf->SetFillColor(240, 240, 240); // set background color for header row
        $pdf->SetTextColor(0); // set text color for header row
        $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
        $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(40, 7, $header[3], 1, 1, 'C', 1);
        $pdf->SetFillColor(255, 255, 255); // set background color for data rows
        $pdf->SetTextColor(0); // set text color for data rows
        $pdf->SetLineWidth(0.3); // Set the border width for cells
        $pdf->SetFont('times', '', 12);
        $totalCost = 0;
        $assetPurchases = $this->model->getAllPayments();
        foreach ($assetPurchases as $asset) {

            $aa = $this->model->getAssetName($asset['assetID']);

            $pdf->Cell(40, 6, $aa, 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $asset['buyerID'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $asset['purchasedData'], 1, 0, 'C', 1);
            $totalCost = $totalCost + floatval($asset['purchasedPrice']);
            $pdf->Cell(40, 6, '$'.$asset['purchasedPrice'], 1, 1, 'C', 1);

        }    

        $pdf->Ln(10);
       
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Total Payments:     $'.$totalCost, 0, 1, 'C');
        $pdf->Ln(2); // move down by 2 units
        $pdf->SetLineWidth(0.5); // set line width to 0.5 units
        $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
        $pdf->Ln(2); // move down by 2 units again
        $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        
        // ---------------------------------------------------------

        ob_clean();
        ob_flush();
        //Close and output PDF document
        $pdf->Output('Payment.pdf', 'D');

        ob_end_flush();
        ob_end_clean();
    }
}
