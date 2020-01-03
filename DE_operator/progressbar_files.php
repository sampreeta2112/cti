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

<?php
if(isset($_GET["files"])) $txtfiles = $_GET["files"];
else if(isset($_POST["files"])) $txtfiles = $_POST["files"];
else $txtfiles = '';

$somePath="../pdf files";
$filesPath="../pdf_output";
$directories = glob($somePath . '/*' , GLOB_ONLYDIR);
//print_r( $directories);
$totalfiles=0;
$dirs = array();
foreach ($directories as  $value) {
	$dirname=explode("/", $value);
	$abc=end($dirname);
    if($txtfiles!="")
    {
        if($txtfiles==$abc)
        {

        $a = scandir($value);
        
        array_push($dirs, $value);
        $filecount=count($a);

        $totalfiles=$totalfiles+$filecount;
        }
    }
    else
    {
     if(!file_exists($filesPath."/".$abc.".pdf"))
   
    {
       
   
	
	    $a = scandir($value);
        array_push($dirs, $value);
	    $filecount=count($a);

        $totalfiles=$totalfiles+$filecount;
    }
 }

}
$files=count($directories);
   $txtfiles  =count($directories);
     $totaltime=$totalfiles;
       

    
    echo"<H1 id='information'>Your Estimated Wait Time for all files is  less than ".gmdate("H:i:s", $totaltime)."</H1>";
   $i=0;
    foreach ($dirs as  $value) {
	$dirname=explode("/", $value);
	$abc=end($dirname);
	 
	$a = scandir($value);

	
	


  
                
            

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
  foreach ($a as  $file) {
  	//$chkext=end(explode(".",$file))
                   $image=$somePath."/".$value."/".$file;
                   if(strtoupper(pathinfo($image,PATHINFO_EXTENSION))=="JPG")
                   {


                  
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
                }



// Print a text
//$html = '<span style="color:white;text-align:center;font-weight:bold;font-size:80pt;">PAGE </span>';
//$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$filePath="../pdf_output/".$abc.".pdf";
$pdf->Output($filePath, 'F');


//============================================================+
// END OF FILE
//============================================================+
    //RunQry("insert into pdf values('$txtid')");

     
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("information").innerHTML="'.$i.' file(s) processed.";
    </script>';
    $i++;

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
        parent.location.reload();

    });
</script>
</body>
</html>

<?php

?>