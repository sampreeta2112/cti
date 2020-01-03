<?php
 include('_header.php'); 
require_once('../tcpdf/config/tcpdf_config.php');
    require_once('../tcpdf/tcpdf.php');
    include('dynamic.php');
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'logo.png';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>Progress Bar</title>
</head>
<body>
  
<!-- Progress bar holder -->
<div id="progress" style="width:350px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
if(isset($_GET["files"])) $txtfiles = $_GET["files"];
else if(isset($_POST["files"])) $txtfiles = $_POST["files"];
else $txtfiles = '';

 $filesids = array();

    $q="select file_id from file_records where file_id not in (select pdf_id from pdf)";
    $r=RunQry($q);
    $numrow = mysqli_num_rows($r);
    
    if($numrow)
        {   
            for($i=1; $o = mysqli_fetch_object($r); $i++) 
                {   
                    $file=$o->file_id;
                    array_push($filesids, $file);
                }
        }
        
    $files=count($filesids);
    $totalfiles=0;
        for ($k=0; $k< $txtfiles; $k++) 
    {
        $txtid=$filesids[$k];
         $filecount=GetSingleValue("Select count(*) from attachments where file_id=$txtid");
         $totalfiles=$totalfiles+$filecount;
    } 

    $totaltime=$totalfiles*5;
    echo"<H1>Your Estimated Wait Time for all files is  ".gmdate("H:i:s", $totaltime)."</H1>";
    for ($i=1; $i <= $txtfiles; $i++) {
$ind=$i-1; 
    $txtid=$filesids[$ind];
    
     $cano=GetSingleValue("select file_no from file_records where file_id=$txtid");
                $inst_date=GetSingleValue("select file_name from file_records where file_id=$txtid");
                $name=GetSingleValue("select inward_date from file_records where file_id=$txtid");
                $inv_itemsq="Select * from attachments where file_id=$txtid order by page_no asc"; 
                $inv_itemsr=RunQry($inv_itemsq);
                
            

//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).



// Extend the TCPDF class to create custom Header and Footer


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Pdf Output');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

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

// set font
//$pdf->SetFont('times', '', 48);
$pdf->setPrintHeader(false);


// Print a text
/*$html = '<span style="background-color:yellow;color:blue;">&nbsp;PAGE 1&nbsp;</span>
<p stroke="0.2" fill="true" strokecolor="yellow" color="blue" style="font-family:helvetica;font-weight:bold;font-size:26pt;">You can set a full page background.</p>';*/
//$pdf->writeHTML($html, true, false, true, false, '');


// add a page

// Print a text
//$html = '<span style="background-color:yellow;color:blue;">&nbsp;PAGE 2&nbsp;</span>';
//$pdf->writeHTML($html, true, false, true, false, '');

// --- example with background set on page ---

// remove default header


// add a page


// -- set new background ---
// add a page
  for($j=1;$inv_itemso = mysqli_fetch_object($inv_itemsr);$j++)
                {
                   $image=$inv_itemso->att_filename;
                  
                    $pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = $image;
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
                }



// Print a text
//$html = '<span style="color:white;text-align:center;font-weight:bold;font-size:80pt;">PAGE </span>';
//$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
echo$filePath="../pdf_output/".$txtid.'_CA_no_'.$cano.".pdf";
$pdf->Output($filePath, 'F');


//============================================================+
// END OF FILE
//============================================================+
    RunQry("insert into pdf values('$txtid')");

     $percent = intval($i/$txtfiles * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
    </script>';
    

// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
    

// Sleep one second so we can see the delay
    sleep(1);
}

echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

?>
<script type="text/javascript">
    $(document).ready(function(){
        parent.$.fancybox.close();
    });
</script>
</body>
</html>
