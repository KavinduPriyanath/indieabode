<?php

class Admin_G extends Controller
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
        $this->view->totalTxGames = $this->model->getTotalTxGame();

        //get data for the transaction graph
        $gameTxSummary = $this->model->getTxSummary();
        if ($gameTxSummary !== null) {
            $this->view->txDates = $gameTxSummary['dates'];
            $this->view->txTotals = $gameTxSummary['totals'];
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
        $this->view->gamePurchases = $this->model->getAllPayments();

        //get game revenues shares for each day
        $totalRevenues = $this->model->getAllGameRevenues();
        if ($totalRevenues !== null) {
            $this->view->revenueDates = $totalRevenues['dates'];
            $this->view->revenueTotals = $totalRevenues['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get total game revenue
        $this->view->totalGameRevenue = $this->model->getTotalGameRevenue();

        //game revenue all the details
        $this->view->gameRevenues = $this->model->getGameRevenueShare();
        $this->view->render('Admin/Admin_G');



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
        $pdf->Cell(0, 10, 'Game Revenue Report', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);

        $pdf->Ln(4);
        $currentDateTime = date('Y-m-d H:i:s');
        $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

        $pdf->SetFont('helvetica', 'BU', 12);
        $pdf->Ln(6);

        // add a table
        $header = array('Transaction ID', 'Game ID','Sale Date', 'Site Share');
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
        $gameRevenues = $this->model->getGameRevenueShare();
        foreach ($gameRevenues as $revenue) {

            $pdf->Cell(40, 6, $revenue['id'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $revenue['gameID'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $revenue['sale_date'], 1, 0, 'C', 1);
            $totalCost = $totalCost + floatval($revenue['siteShare']);
            $pdf->Cell(40, 6, '$'.$revenue['siteShare'], 1, 1, 'R', 1);

        }    

        $pdf->Ln(10);
       
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Total Game Revenue:     $'.$totalCost, 0, 1, 'C');
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
        $pdf->Output('GameRevenue.pdf', 'D');

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
        $pdf->Cell(0, 10, 'Game Payment Report', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);

        $pdf->Ln(4);
        $currentDateTime = date('Y-m-d H:i:s');
        $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

        $pdf->SetFont('helvetica', 'BU', 12);
        $pdf->Ln(6);

        // add a table
        $header = array('game ID', 'Gamer ID','Payment Date', 'Payment Price');
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
        $gamePurchases = $this->model->getAllPayments();
        foreach ($gamePurchases as $game) {

            $pdf->Cell(40, 6, $game['gameID'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $game['buyerID'], 1, 0, 'C', 1);
            $pdf->Cell(40, 6, $game['purchasedDate'], 1, 0, 'C', 1);
            $totalCost = $totalCost + floatval($game['purchasedPrice']);
            $pdf->Cell(40, 6, '$'.$game['purchasedPrice'], 1, 1, 'C', 1);

        }    

        $pdf->Ln(10);
       
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Total Expenditure:     $'.$totalCost, 0, 1, 'C');
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
