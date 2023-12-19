<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
include_once 'db.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$database = new Connection();
$db = $database->openConnection();
$id = $_GET['id'];
$query = $db->prepare("select * from emw_frm_items where item_key='$id'");
$query->execute();
$count = $query->rowCount();

if($query->rowCount() > 0 ){
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $it_id = $row['id'];
    $rows = [];
    $query_sub = $db->prepare("select * from emw_frm_item_metas where item_id='$it_id' order by field_id");
    $query_sub->execute();
    while ($row = $query_sub->fetch(PDO::FETCH_ASSOC))
    {
        // $rows[] = $row;

        if($row['field_id']==1){
            $fname = $row['meta_value'];
        }
        if($row['field_id']==7){
            $lname = $row['meta_value'];
        }
        
    }
}

    // set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Galico');
$pdf->SetTitle('EMPIRE TEST');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
// $pdf->setFooterData(array(0,64,0), array(0,64,128));

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


// Print text using writeHTMLCell()
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

//$pdf->Cell(0, 15, $value['meta_value'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
// Print text using writeHTMLCell()

    $image = file_get_contents('https://empirehomecareagency.org/wp-content/uploads/2023/02/empire-130x130.png');
    $pdf->Image('@' . $image,$x=10, $y=30, $w=20, $h=20, 'PNG');
    //$pdf->MultiCell(55, 10, $image, 10, 'L', 1, 2, '', '', true);
    // $pdf->ln(30);
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 0, 'Empire Home Care Agency', 100, 0, 'C', 0, '', 0, false, 'T', 'C');
    $pdf->ln(10);
    $pdf->Cell(0, 0, '2637 E Clearfield St. Phila, PA 19134 Phone: (267)-388-6735 Fax: (267)-538-6571', 100, 0, 'C', 0, '', 0, false, 'T', 'C');
    $pdf->ln(10);
    $pdf->Cell(0, 0, 'Email: empirehomecareagency@gmail.com', 100, 0, 'C', 0, '', 0, false, 'T', 'C');
    
    $pdf->ln(50);
    
    $pdf->Cell(30, 3, 'First Name', 1, 0, 'L', 1, '', 0, false, 'T', 'C');
    $pdf->Cell(61, 3, $fname, 1, 0, 'L', 1, '', 0, false, 'T', 'C');
    $pdf->ln(6);
    
    $pdf->Cell(30, 3, 'Last Name', 1, 0, 'L', 1, '', 0, false, 'T', 'C');
    $pdf->Cell(61, 3, $lname, 1, 0, 'L', 1, '', 0, false, 'T', 'C');
    

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
// $rawData = file_get_contents("php://input");
// print_r($rawData);
// exit();


