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
            // if(empty($this->users)){
            //     echo "empty";

            // }else{
            //     echo "na";
            // }
        //$this->view->totalDownloads = $this->model->totalDownloads();

        // $this->view = $this->model->delete_user($user['id']);

        // if(isset($_POST['delete_user'])){
        //    $user_id = mysqli_real_escape_string($con, $_POST['id']); 
        //    echo $user_id;
        //    $this->view = $this->model->delete_user($user_id);
        // }
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

    public function deleteUser($userid){
        
     
               $this->view = $this->model->delete_user($userid);
               if($this->view){
                 echo" wade hari";
               }else{
                echo "ba";
               }
            

    }
    public function viewUser($userid){
        
     
        $user = $this->model->download_user($userid);

        $totalPrice = $this->model->assetPrice(2);
        print('totalprice'.$totalPrice);
            
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

            print_r($ac_user);
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
            $this->view->render('Admin/reports/Admin_gamer_report');
        }
        if($user['userRole']=="gamejam organizer"){
            $this->view->render('Admin/reports/Admin_jamOrganizer_report');
        }


        //Asset Creator's report generate
        if($user['userRole']=="asset creator"){

            $ac_user = $this->model->assetCreator($userid);

            print_r($ac_user);

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


        
        if($user['userRole']=="game publisher"){
            $this->view->render('Admin/reports/Admin_gamePublisher_report');
        }

    }
}
