

<?php

// require "includes/tcpdf/tc


require_once('includes/tcpdf/tcpdf.php');

class Admin_assetCreator_report extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    

    function index(){

        // echo $user['gamerID'];
        $this->view->render('Admin/reports/Admin_assetCreator_report');
    }

    function downloadPDF()
    {
        // function Header() {
        //     // Logo
        //   //  $image_file = K_PATH_IMAGES.'logo_example.jpg';
        //    // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //     // Set font
        //     $this->SetFont('helvetica', 'B', 20);
        //     // Title
        //     $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // }

        // function Footer() {
        //     // Position at 15 mm from bottom
        //     $this->SetY(-15);
        //     // Set font
        //     $this->SetFont('helvetica', 'I', 8);
        //     // Page number
        //     $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // }

        ob_start();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Nadee Darshika');
        // $pdf->SetTitle('TCPDF');
        // $pdf->SetSubject('TCPDF');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // $pdf->SetTitle('My Document Title');
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Disable header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);


        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
    

        $pdf->SetFont('times', 'BI', 12);

        // add a page
        $pdf->AddPage();

        $pdf->Cell(0, 10, 'My Document Title', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->MultiCell(0, 10, 'This is my paragraph of text. It can span multiple lines and will automatically wrap to fit within the page margins.', 0, 'J', false);

        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(60, 10, 'Column 1', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Column 2', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Column 3', 1, 1, 'C', 1);
        $pdf->SetFont('helvetica', '', 10);
        for ($i = 1; $i <= 10; $i++) {
            $pdf->Cell(60, 10, 'Row ' . $i . ', Column 1', 1, 0, 'L', 1);
            $pdf->Cell(60, 10, 'Row ' . $i . ', Column 2', 1, 0, 'L', 1);
            $pdf->Cell(60, 10, 'Row ' . $i . ', Column 3', 1, 1, 'L', 1);
        }




        // set some text to print
        $txt = <<<EOD
        INDIE ABODE 
        Asset Creator  Report<br>

        EOD;

        // add a table
        $header = array('Name', 'Age', 'Country');
        $data = array(
            array('John Doe', '35', 'USA'),
            array('Jane Smith', '27', 'Canada'),
            array('Bob Johnson', '42', 'Australia')
        );
        $pdf->Ln(10); // add some vertical spacing before the table
        $pdf->SetFont('times', '', 10);
        $pdf->SetFillColor(240, 240, 240); // set background color for header row
        $pdf->SetTextColor(0); // set text color for header row
        $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
        $pdf->Cell(30, 7, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(30, 7, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(30, 7, $header[2], 1, 1, 'C', 1);
        $pdf->SetFillColor(255, 255, 255); // set background color for data rows
        $pdf->SetTextColor(0); // set text color for data rows
        $pdf->SetFont('times', '', 8);
        foreach ($data as $row) {
            $pdf->Cell(30, 6, $row[0], 1, 0, 'C', 1);
            $pdf->Cell(30, 6, $row[1], 1, 0, 'C', 1);
            $pdf->Cell(30, 6, $row[2], 1, 1, 'C', 1);
        }


        

        

        // print a block of text using Write()
        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);


        
        // ---------------------------------------------------------

        ob_clean();
        ob_flush();
        //Close and output PDF document
        $pdf->Output('example_003.pdf', 'I');

        ob_end_flush();
        ob_end_clean();


     
        // // create new PDF document
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // // set document information
        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Nadee ');
        // $pdf->SetTitle('INDIEABODE - ASSET CREATOR REPORT');
        // $pdf->SetSubject('assetcreator@gmail.com');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // // set default monospaced font
        // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // // set margins
        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // // set auto page breaks
        // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // // set image scale factor
        // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // // set some language-dependent strings (optional)
        // if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        //     require_once(dirname(__FILE__).'/lang/eng.php');
        //     $pdf->setLanguageArray($l);
        // }

        // // ---------------------------------------------------------

        // // set default font subsetting mode
        // $pdf->setFontSubsetting(true);

        // // Set font
        // // dejavusans is a UTF-8 Unicode font, if you only need to
        // // print standard ASCII chars, you can use core fonts like
        // // helvetica or times to reduce file size.
        // $pdf->SetFont('dejavusans', '', 14, '', true);

        // // Add a page
        // // This method has several options, check the source code documentation for more information.
        // $pdf->AddPage();

        // // set text shadow effect
        // $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // // Set some content to print

        // // create some HTML content
        // $html = '<h1>HTML Example</h1>';

        // // output the HTML content
        // $pdf->writeHTML($html, true, false, true, false, '');
        // ob_end_clean();

        // // ---------------------------------------------------------

        // // Close and output PDF document
        // // This method has several options, check the source code documentation for more information.
        // $pdf->Output('example_001.pdf', 'I');

        // //============================================================+
        // // END OF FILE
        // //============================================================+
    }
}


