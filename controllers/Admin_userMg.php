<?php

class Admin_userMg extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->users = $this->model->viewUser();
        $this->view->active="all";
        $this->view->render('Admin/Admin_userMg');
    }

    public function viewFilteredUser($filter_text){
        if($filter_text=="gd")
            $usertype = "game developer";
        if($filter_text=="gp")
            $usertype = "game publisher";
        if($filter_text=="go")
            $usertype = "gamejam organizer";
        if($filter_text=="gamer")
            $usertype = "gamer";
        if($filter_text=="ac")
            $usertype = "asset creator";
        
        $this->view->users = $this->model->viewUser($usertype);

        $this->view->active=$usertype;
        $this->view->render('Admin/Admin_userMg');
    }

    public function viewFilteredBlockUser($filter_text){
        $this->view->users = $this->model->viewBlockUser($filter_text);
        $this->view->render('Admin/Admin_userMg');
    }

    public function deleteUser($userid){
        $result = $this->model->delete_user($userid);
        if ($result === true) {
            //echo "<script>alert('User deleted successfully.'); window.location.href = '/indieabode/Admin_userMg/viewFilteredBlockUser/block';</script>";
            $this->view->users = $this->model->viewBlockUser('block');
            $this->view->render('Admin/Admin_userMg');
        } else {
            $this->view->users = $this->model->viewUser();

            // $this->view->active=$usertype;
            // echo "<script>alert('Error deleting user.'); window.location.href = '/indieabode/Admin_userMg';</script>";
            $this->view->render('Admin/Admin_userMg');
        }

    }
    public function unblockUser($userid){
        $result = $this->model->unblock_user($userid);
        if ($result === true) {
            // $this->view->active=$usertype;
            $this->view->users = $this->model->viewUser();
            //echo "<script>alert('User deleted successfully.'); window.location.href = '/indieabode/Admin_userMg/viewFilteredBlockUser/block';</script>";
            
            $this->view->render('Admin/Admin_userMg');
        } else {
            $this->view->users = $this->model->viewBlockUser('block');
           // echo "<script>alert('Error deleting user.'); window.location.href = '/indieabode/Admin_userMg';</script>";
            $this->view->render('Admin/Admin_userMg');
        }

    }

    public function viewUser($userid){
        
     
        $user = $this->model->download_user($userid);

        if($user['userRole']=="game developer"){
            $this->view->render('Admin/reports/Admin_report');
        }
        if($user['userRole']=="gamer"){ 
            $this->view->render('Admin/reports/Admin_gamer_report');
        }
        if($user['userRole']=="gamejam organizer"){
            $this->view->render('Admin/reports/Admin_jamOrganizer_report');
        }
        if($user['userRole']=="asset creator"){
            $ac_user = $this->model->assetCreator($userid);
            $this->view->render('Admin/reports/Admin_assetCreator_report');
        }
        if($user['userRole']=="game publisher"){
            $this->view->render('Admin/reports/Admin_gamePublisher_report');
        }

    }

    public function downloadUser($userid){
        $user = $this->model->download_user($userid);

          
        if($user['userRole']=="game developer"){
            $this->view->render('Admin/reports/Admin_report');
        }
        if($user['userRole']=="gamer"){
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
            $pdf->Cell(0, 10, 'Gamer\'s Report', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);

            $pdf->Ln(4);
            // $name = $user['firstName'].' '.$user['lastName'];
            $name = 'Name: ' . $user['firstName'] . ' ' . $user['lastName'];
            // $accountStatus = ($user['accountStatus'] == 1) ? "Active" : "Blocked";
            $currentDateTime = date('Y-m-d H:i:s');
            // $pdf->Rect(10, 60, 70, 20, 'D');
            $pdf->MultiCell(0, 10, $name, 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Account Status: Active', 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Downloaded Games', 0, 'L', false);

            // add a table
            $header = array('Game Name', 'Downloaded Date','Price');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $dw_games = $this->model->gamer($userid);
            foreach ($dw_games as $game) {

                $id = $game['gameID'];
                $currentGame = $this->model->dwGames($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $currentGame[0]['gameName'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $game['created_at'], 1, 0, 'C', 1);
                $totalCost = $totalCost + floatval($currentGame[0]['gamePrice']);
                $pdf->Cell(40, 6, '$'.$currentGame[0]['gamePrice'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Expenditure:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

            //PARTICIPATED CROWDFUNDS TABLE

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Participated Crowdfunds', 0, 'L', false);

            // add a table
            $header = array('Game Name', 'Donated Date','Donated Amount');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $donatedcrowdfunds = $this->model->participateCrowdfund($userid);
            foreach ($donatedcrowdfunds as $crowdfund) {

                $id = $crowdfund['crowdFundID'];
                $curr_crowdfund = $this->model->getCrowdfund($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $curr_crowdfund[0]['gameName'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $crowdfund['date'], 1, 0, 'C', 1);
                $totalCost = $totalCost + floatval($crowdfund['donatedAmount']);
                $pdf->Cell(40, 6, '$'.$crowdfund['donatedAmount'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');


            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Donations:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line
            
            //RATED JAMS TABLE

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Rated Jams', 0, 'L', false);

            // add a table
            $header = array('Jam Name', 'Rated Game','Rates','Rank');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(40, 7, $header[2], 1, 1, 'C', 1);
            // $pdf->Cell(40, 7, $header[4], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetLineWidth(0.3); // Set the border width for cells
            $pdf->SetFont('times', '', 12);
            $totalCost = 0;

            $ratedSubmissions = $this->model->getRatedSubmissions($userid);
            foreach ($ratedSubmissions as $submission) {

                $id = $submission['submissionID'];
                $jam = $this->model->getJam($id);
                $game = $this->model->dwGames($id);
                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $jam[0]['jamTitle'], 1, 0, 'L', 1);
                $pdf->Cell(40, 6, $game[0]['gameName'], 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $submission['rating'], 1, 0, 'C', 1);
                //$pdf->Cell(40, 6, '$'.$crowdfund['donatedAmount'], 1, 1, 'R', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Donations:     $'.$totalCost, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line

            // $signature = 'John Doe';
            // $date = date('F j, Y');

            // $pdf->SetY(-30);
            // $pdf->SetFont('helvetica', 'B', 12);
            // $pdf->Cell(0, 10, 'Signature: '.$signature, 0, 1, 'L');
            // $pdf->Cell(0, 10, 'Date: '.$date, 0, 1, 'R');
            // $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

            // print a block of text using Write()
            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

            
            // ---------------------------------------------------------

            ob_clean();
            ob_flush();
            //Close and output PDF document
            $pdf->Output('Gamer.pdf', 'D');

            ob_end_flush();
            ob_end_clean();

            $this->view->render('Admin/reports/Admin_gamer_report');
        }
        if($user['userRole']=="gamejam organizer"){


            $gj_user = $this->model->jamOrganizer($userid);

            // print_r($ac_user);

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
            $pdf->Cell(0, 10, 'Game Jam Organizer\'s Report', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);

            $pdf->Ln(4);
            // $name = $user['firstName'].' '.$user['lastName'];
            $name = 'Name: ' . $user['firstName'] . ' ' . $user['lastName'];
            // $accountStatus = ($user['accountStatus'] == 1) ? "Active" : "Blocked";
            $currentDateTime = date('Y-m-d H:i:s');
            // $pdf->Rect(10, 60, 70, 20, 'D');
            $pdf->MultiCell(0, 10, $name, 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Account Status: Active', 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Hosted Jams', 0, 'L', false);

            // add a table
            $header = array('Jam Title', 'Jam Status','Count', 'First Place');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(40, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(50, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(20, 7, $header[2], 1, 0, 'C', 1);
            $pdf->Cell(70, 7, $header[3], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetFont('times', '', 12);
            $count = 0;
            foreach ($gj_user as $host) {

                $count = $count + 1;
                $pdf->Cell(40, 6, $host['jamTitle'], 1, 0, 'C', 1);

                // $currentDateTime = new DateTime(); // Current date and time
                $submissionStartDate = new DateTime($host['submissionStartDate']);
                $submissionEndDate = new DateTime($host['submissionEndDate']);
                $votingEndDate = new DateTime($host['votingEndDate']);
               // $givenDateTime = new DateTime('2023-04-01 10:30:00'); // Given date and time

               if($submissionStartDate < $currentDateTime) // jam started
               {
                    if($submissionEndDate < $currentDateTime) // jam submission ended
                    {
                        if($votingEndDate < $currentDateTime) // voting ended
                        {
                            $pdf->Cell(50, 6,'Game Jam Has Totally Ended.', 1, 0, 'C', 1);
                        }else 
                        {
                            $pdf->Cell(50, 6,'Voting is ongoing', 1, 0, 'C', 1);
                            // $pdf->Cell(80, 6,'Voting is ongoing(end on '.$votingEndDate->format('Y-m-d H:i:s'), 1, 0, 'C', 1);
                        }
                    }
                    else
                    {
                        $pdf->Cell(50, 6,'Jam is ongoing', 1, 0, 'C', 1);
                        //$pdf->Cell(80, 6,'Jam is ongoing(end on '.$submissionEndDate->format('Y-m-d H:i:s'), 1, 0, 'C', 1);
                    }
               }else
               {
                    $pdf->Cell(50, 6, 'Jam not yet started', 1, 0, 'C', 1);
                    // $pdf->Cell(80, 6, 'Jam not yet started(starts on '.$submissionStartDate->format('Y-m-d H:i:s'), 1, 0, 'C', 1);
               }


                $totalSubmissions = $this->model->getTotalSubmissions($host['gameJamID']);
                // if($totalSubmissions != 0){
                //     $pdf->Cell(20, 6, $totalSubmissions, 1, 0, 'C', 1);
                // }
                // else
                    $pdf->Cell(20, 6, $totalSubmissions, 1, 0, 'C', 1);


                
                $rankFirst = $this->model->getFirstPlace($host['gameJamID']);
                $pdf->Cell(70, 6,$rankFirst['gameName'], 1, 1, 'C', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Hosted Jams: '.$count, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line


            // $signature = 'John Doe';
            // $date = date('F j, Y');

            // $pdf->SetY(-30);
            // $pdf->SetFont('helvetica', 'B', 12);
            // $pdf->Cell(0, 10, 'Signature: '.$signature, 0, 1, 'L');
            // $pdf->Cell(0, 10, 'Date: '.$date, 0, 1, 'R');
            // $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

            // print a block of text using Write()
            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

            
            // ---------------------------------------------------------

            ob_clean();
            ob_flush();
            //Close and output PDF document
            $pdf->Output('gamejamOrganizer.pdf', 'D');

            ob_end_flush();
            ob_end_clean();



            // $this->view->render('Admin/reports/Admin_jamOrganizer_report');
        }


        //Asset Creator's report generate
        if($user['userRole']=="asset creator"){

            $ac_user = $this->model->assetCreator($userid);

            // print_r($ac_user);

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
            $pdf->Cell(0, 10, 'Asset Creator\'s Report', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);

            $pdf->Ln(4);
            // $name = $user['firstName'].' '.$user['lastName'];
            $name = 'Name: ' . $user['firstName'] . ' ' . $user['lastName'];
            // $accountStatus = ($user['accountStatus'] == 1) ? "Active" : "Blocked";
            $currentDateTime = date('Y-m-d H:i:s');
            // $pdf->Rect(10, 60, 70, 20, 'D');
            $pdf->MultiCell(0, 10, $name, 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Account Status: Active', 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Uploaded Assets', 0, 'L', false);

            // add a table
            $header = array('Cover Image', 'Asset Name', 'Price','Uploaded Date', 'Downloads','Earnings');
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 14);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(30, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[2], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[3], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[4], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[5], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetFont('times', '', 12);
            $totalEarnings = 0;
            foreach ($ac_user as $user) {

                $pdf->Cell(30, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(30, 6, $user['assetName'], 1, 0, 'C', 1);
                if($user['assetPrice']=='')
                    $pdf->Cell(30, 6, 'Free', 1, 0, 'C', 1);
                else
                    $pdf->Cell(30, 6, $user['assetPrice'], 1, 0, 'C', 1);
                $pdf->Cell(30, 6, $user['created_at'], 1, 0, 'C', 1);

                $downloads = $this->model->downloadAssets($user['assetID']);

                print_r($downloads);
                if($downloads != 0)
                    $pdf->Cell(30, 6, $downloads, 1, 0, 'C', 1);
                else
                    $pdf->Cell(30, 6, 0, 1, 0, 'C', 1);

                $totalPrice = $this->model->assetPrice($user['assetID']);
                $totalEarnings = $totalEarnings + $totalPrice;
                $pdf->Cell(30, 6, '$'.$totalPrice, 1, 1, 'C', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, 'Total Earnings:     $'.$totalEarnings, 0, 1, 'C');
            $pdf->Ln(2); // move down by 2 units
            $pdf->SetLineWidth(0.5); // set line width to 0.5 units
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw first line
            $pdf->Ln(2); // move down by 2 units again
            $pdf->Line(50, $pdf->GetY(), $pdf->GetPageWidth() - 50, $pdf->GetY()); // draw second line


            // $signature = 'John Doe';
            // $date = date('F j, Y');

            // $pdf->SetY(-30);
            // $pdf->SetFont('helvetica', 'B', 12);
            // $pdf->Cell(0, 10, 'Signature: '.$signature, 0, 1, 'L');
            // $pdf->Cell(0, 10, 'Date: '.$date, 0, 1, 'R');
            // $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

            // print a block of text using Write()
            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

            
            // ---------------------------------------------------------

            ob_clean();
            ob_flush();
            //Close and output PDF document
            $pdf->Output('Assetcreator.pdf', 'D');

            ob_end_flush();
            ob_end_clean();




            //$this->view->render('Admin/reports/Admin_assetCreator_report');
        }


        //Game Publisher's report genr
        if($user['userRole']=="game publisher"){

            $gp_user = $this->model->gamePublisher($userid);

            // print_r($ac_user);

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
            $pdf->Cell(0, 10, 'Game Publisher\'s Report', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);

            $pdf->Ln(4);
            // $name = $user['firstName'].' '.$user['lastName'];
            $name = 'Name: ' . $user['firstName'] . ' ' . $user['lastName'];
            // $accountStatus = ($user['accountStatus'] == 1) ? "Active" : "Blocked";
            $currentDateTime = date('Y-m-d H:i:s');
            // $pdf->Rect(10, 60, 70, 20, 'D');
            $pdf->MultiCell(0, 10, $name, 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Account Status: Active', 0, 'L', false);
            $pdf->MultiCell(0, 10, 'Date: '.$currentDateTime, 0, 'L', false);

            $pdf->SetFont('helvetica', 'BU', 12);
            $pdf->Ln(6);
            $pdf->MultiCell(0, 10, 'Ordered Gigs', 0, 'L', false);

            // add a table
            $header = array('Game Name', 'Estimated Share','Date', 'Ordered Amount');
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
            foreach ($gp_user as $user) {

                // $pdf->Cell(40, 6, 'hi', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $user['game'], 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $user['estimatedShare'], 1, 0, 'C', 1);
                $pdf->Cell(40, 6, $user['orderedDate'], 1, 0, 'C', 1);
                $totalCost = $totalCost + floatval($user['expectedCost']);
                $pdf->Cell(40, 6, '$'.$user['expectedCost'], 1, 1, 'C', 1);

            }    

            $pdf->Ln(10);
            // $pdf->Cell(0, 10, 'Total Earnings: $'.$totalEarnings, 0, 1, 'C');

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
            $pdf->Output('GamePublisher.pdf', 'D');

            ob_end_flush();
            ob_end_clean();

        }

    }
}
