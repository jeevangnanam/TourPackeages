<?php 
App::import('Vendor','xtcpdf'); 
//debug($userdata);
$total_amount=array();
$username=array();
$useremail=array();
$total= 0;
foreach ($userdata  as $key=>$details ){
	
	$total_amount[]=$userdata[$key]['Payment']['total_amount'];
	$total=$total_amount[$key]+$total;
	$username[]=$userdata[$key]['User']['name'];
	$useremail[]=$userdata[$key]['User']['email'];
	}

$curNtDateTime = explode(' ', Date('d-m-Y H:i:s'));
$curDate = $curNtDateTime[0];
$curTime = $curNtDateTime[1];


$tcpdf = new XTCPDF();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'
$tcpdf->AddPage();
//$tcpdf->SetAuthor("Life leasure holiday http://lifeleisureholidays.com");
//$tcpdf->xheadertext = 'Life Leasure Holidays';
//$tcpdf->SetAutoPageBreak( false );
//$tcpdf->setHeaderFont(array($textfont,'',20));
//$tcpdf->xheadercolor = array(150,055,05);

$tcpdf->xfootertext = 'Copyright@ Life leasure holiday. All rights reserved.';

// add a page (required with recent versions of tcpdf)



// Now you position and print your page content
// example: 
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'N',14);
$tcpdf->Cell(0,14, "Payments of a $username[0]", 0,1,'C');
// ...
// etc.
// see the TCPDF examples 


	
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
    <h1 align='center'>Payment details of $username[0] to $curDate </h1>
    <h4 align=\"left\">Date: $curDate </h4>
	<h4 align=\"left\">Time: $curTime</h4>
    <table  cellspacing='0' cellpadding='20'>
        <tr bgcolor=\"#CCCCCC\">
          
            <td >Payment Id</td>
            <td >Purchase Id</td>
            <td >Total amount</td>
			<td >merchant_reference]</td>
			<td >Gateway id</td>
			<td > Status</td>
           <td >Is authorized</td>
		   <td >Created date</td>
        </tr>";
		
     foreach ( @$userdata  as $key=>$details ) {

    $html.= '<tr>';
    $html.= '<td>' .$userdata[$key]['Payment']['id'] . '</td><td>' . $userdata[$key]['Payment']['purchase_id']. '</td>';
    $html.= '<td>' . $userdata[$key]['Payment']['total_amount']. '</td>';
	$html.= '<td>' .$userdata[$key]['Payment']['merchant_reference'] . '</td><td>' . $userdata[$key]['Payment']['gateway_id']. '</td>';
	$html.= '<td>' .$userdata[$key]['Payment']['status'] . '</td>';
	$html.= '<td>' .$userdata[$key]['Payment']['is_authorized'] . '</td><td>' . $userdata[$key]['Payment']['created']. '</td>';
    $html.= '</tr>';
}
	$html.="</table>";
	$html.="</br>";
	$html.="</bt>";
	$html.="Total payments of $username[0] : <b>Rs=$total</b>";
	$html.="</br>"."</br>"."</br>"."</br>";
	$html.="<h4 align=\"left\">Purcharse details of $username[0]</h4>";
	$html.="</br>";
	$html.="</bt>";
	
	$html.= "<table  cellspacing='0' cellpadding='20'>
			<tr bgcolor=\"#CCCCCC\">
			  
				<td >Purchase Id</td>
				<td >Date</td>
				<td >Package Id</td>
				<td >Hotel Id</td>
				<td >Additional persons</td>
				<td >Order process</td>
			    <td >Order approved by</td>
			    <td >coupon id</td>
				<td >Admin Remarks</td>
			    <td >Status</td>
			   
			</tr>";
			
	foreach ( @$userdata  as $key=>$details ) {
	
		$html.= '<tr>';
		$html.= '<td>' .$userdata[$key]['Purchase']['id'] . '</td><td>' . $userdata[$key]['Purchase']['date']. '</td>';
		$html.= '<td>' . $userdata[$key]['Purchase']['package_id'].'</td><td>'. $userdata[$key]['Purchase']['hotel_ids'].'</td>';
		$html.= '<td>' .$userdata[$key]['Purchase']['additional_persons'] . '</td><td>' . $userdata[$key]['Purchase']['order_processed_by']. '</td>';
		$html.= '<td>' .$userdata[$key]['Purchase']['order_approved_by'] . '</td>';
		$html.= '<td>' .$userdata[$key]['Purchase']['coupon_id'] . '</td><td>' . $userdata[$key]['Purchase']['admin_remarks']. '</td>';
		$html.= '<td>' . $userdata[$key]['Purchase']['status']. '</td>';
		$html.= '</tr>';
	}
	$html.="</table>";

// output the HTML content
$tcpdf->writeHTML($html , true, 0, true, 0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
echo $tcpdf->Output("$curDate of $username[0].pdf", 'D');

?> 