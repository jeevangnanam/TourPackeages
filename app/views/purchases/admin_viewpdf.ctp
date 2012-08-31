<?php 
App::import('Vendor','tcpdf/tcpdf'); 

// create new PDF document 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  

// set document information 
$pdf->SetCreator(PDF_CREATOR); 
$pdf->SetAuthor('Life Leisure Holiday'); 
$pdf->SetTitle('Life Leisure Holiday'); 
$pdf->SetSubject('Life Leisure Holiday'); 
$pdf->SetKeywords('TCPDF, CakePHP, PDF, example, test, guide'); 

// set default header data 
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'TCPDF using CakePHP', '');

// set header and footer fonts 
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 

// set default monospaced font 
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

//set margins 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); 
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 

//set auto page breaks 
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

//set image scale factor 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

// add a page 
$pdf->AddPage(); 


// print a line using Cell() 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(80, 10,'Life Leisure Holiday', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 16); 
$pdf->Cell(100, 10, 'Package Invoice', 0, 1, 'L'); 

$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(180, 5,'Date:', 0, 1, 'R');
$pdf->Cell(180, 5,'PO # :', 0, 1, 'R');

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 48,'Vendor', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'AAAAAAAAA AAAAAAAAAA', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 48,'Ship To', 0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'AAAAAAAAA AAAAAAAAAA', 0, 1, 'L'); 


$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Company Name ', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Company Name  ', 0, 1, 'L'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Street Address ', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Street Address  ', 0, 1, 'L'); 


$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'City, ST  ZIP Code ', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'',0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'City, ST  ZIP Code  ', 0, 1, 'L'); 


$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Phone ', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Phone  ', 0, 1, 'L'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Customer ID ', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 0,'', 0, 0, 'C');  
$pdf->SetFont('times', 'BI', 8); 
$pdf->Cell(60, 8, 'Customer ID  ', 0, 1, 'L');

$pdf->SetFont('times', 'BI', 12); 
$pdf->Cell(50, 10,'Package Name', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 12); 
$pdf->Cell(70, 10,'Package Name', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 12); 
$pdf->Cell(70, 10,'Package Price', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(50, 8,'test', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(70, 8,'2011-09-07 00:00:00', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(70, 8,'€547', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(190, 8,'', 1, 1, 'C'); 


$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(22, 8,'Hotels', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(28, 8,'Location', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 8,'Payment', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(45, 8,'Additional Peoples', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 8,'Cuopon', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 8,'Value Added Services', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(22, 8,'', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(28, 8,'', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 8,'', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(45, 8,' ', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(30, 8,'', 1, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 8,'  ', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 8,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 8,'  ', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 8,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 8,'  ', 1, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 8,'', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 8,'  ', 1, 1, 'C'); 

$str1="Please send two copies of your invoice.";
$str2="Enter this order in accordance with the prices, terms, delivery method, and specifications listed above.";
$str3="Please notify us immediately if you are unable to ship as specified.";
$str4="Send all correspondence to:";

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 6,$str1, 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 6,'  ', 0, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 6,$str2, 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 6,'  ', 10, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 6,$str3, 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 6,'  ', 0, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 6,$str4, 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 6,'  ', 10, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 5,'[Name]', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 5,'  ', 0, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 5,'[Street Address]', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 5,'  ', 0, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 5,'[City, ST  ZIP Code]', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 5,'  ', 10, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 5,'Phone [000-000-0000]', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 5,'  ', 0, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 5,'Fax [000-000-0000]', 0, 0, 'L'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 5,'  ', 10, 1, 'C'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(180, 4,'', 0, 1, 'C'); 


$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(155, 4,'Authorized by', 0, 0, 'C'); 
$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(35, 4,'Date 2011-10-28', 10, 1, 'R'); 

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(180, 10,'', 0, 1, 'C');

$pdf->SetFont('times', 'BI', 10); 
$pdf->Cell(180, 4,'[Your Company Name]  [Street Address],[City, ST  ZIP Code]  Phone [000-000-0000]  Fax [000-000-0000]  [e-mail]', 0, 1, 'C'); 

//Close and output PDF document 
$pdf->Output('filename.pdf', 'I'); 

?>

