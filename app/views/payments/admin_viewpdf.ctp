<?php 
App::import('Vendor','xtcpdf'); 

/*debug($data);
$htmlcontent=array();
$total=0;
foreach ($data  as $key=>$details ){
	$htmlcontent[]=$data[$key]['Payment']['total_amount'];
	 
		 $total=$htmlcontent[$key]+$total;
	}
	debug($htmlcontent);
	echo $total;

*/
$tcpdf = new XTCPDF();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'
$tcpdf->AddPage();
//$tcpdf->SetAuthor("Life leasure holiday http://lifeleisureholidays.com");
//$tcpdf->SetAutoPageBreak( false );
$tcpdf->setHeaderFont(array($textfont,'',20));
//$tcpdf->xheadercolor = array(150,055,05);
//$tcpdf->xheadertext = 'Life Leasure Holidays';
//$tcpdf->xfootertext = 'Copyright@ Life leasure holiday. All rights reserved.';

// add a page (required with recent versions of tcpdf)


// Now you position and print your page content
// example: 
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'N',14);
$tcpdf->Cell(0,14, "Payments", 0,1,'C');
// ...
// etc.
// see the TCPDF examples 

$htmlcontent=array();
$total=0;
foreach ($data  as $key=>$details ){
	$htmlcontent[]=$data[$key]['Payment']['total_amount'];
	 $total=$htmlcontent[$key]+$total;
}
	
$curNtDateTime = explode(' ', Date('d-m-Y H:i:s'));
$curDate = $curNtDateTime[0];
$curTime = $curNtDateTime[1];
	
$html = "<style>
    table
    {
        border-collapse:collapse;
    }
    table,th, td
    {
        border: 1px solid black;
    }
   </style>
    </br></br></br></br>
    <h1 align='center'>Payment details of the $curDate </h1>
    <h4 align='left'>Date: $curDate </h4>
	<h4 align='right'>Time: $curTime</h4>
    <table  cellspacing='0' cellpadding='20'>
        <tr bgcolor=\"#CCCCCC\">
          
            <td >Id</td>
            <td >User id</td>
            <td >Purchase id</td>
            <td >Total amount</td>
			<td >merchant_reference]</td>
			<td >Gateway id</td>
			<td > Status</td>
           
        </tr>";
 foreach ( @$data  as $key=>$details ) {

    $html.= '<tr>';
    $html.= '<td>' .$data[$key]['Payment']['id'] . '</td><td>' . $data[$key]['Payment']['user_id']. '</td>';
    $html.= '<td>' .$data[$key]['Payment']['purchase_id'] . '</td><td>' . $data[$key]['Payment']['total_amount']. '</td>';
	$html.= '<td>' .$data[$key]['Payment']['merchant_reference'] . '</td><td>' . $data[$key]['Payment']['gateway_id']. '</td>';
	$html.= '<td>' .$data[$key]['Payment']['status'] . '</td>';
    $html.= '</tr>';
}

$html.="</table>";
$html.="</br>";
$html.="</bt>";
$html.="<b>Total payments of the date is : Rs =$total </b>";



// output the HTML content
$tcpdf->writeHTML($html , true, 0, true, 0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
echo $tcpdf->Output("$curDate.pdf", 'D');

?> 