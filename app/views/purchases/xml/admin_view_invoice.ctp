<style type="text/css">
<!--
table.MsoNormalTable {
font-size:12.0pt;
font-family:"Times New Roman","serif";
}
p.rightalignedtext {
margin:0in;
margin-bottom:.0001pt;
text-align:right;
line-height:12.0pt;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
}
p.slogan {
margin-top:0in;
margin-right:0in;
margin-bottom:3.0pt;
margin-left:0in;
font-size:7.0pt;
font-family:"Franklin Gothic Book","sans-serif";
letter-spacing:.2pt;
font-style:italic;
}
p.DateandNumber {
margin:0in;
margin-bottom:.0001pt;
text-align:right;
line-height:110%;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
letter-spacing:.2pt;
}
p.headingright {
margin:0in;
margin-bottom:.0001pt;
text-align:right;
line-height:12.0pt;
font-size:8.0pt;
font-family:"Franklin Gothic Medium","sans-serif";
color:#C19859;
font-weight:bold;
}
p.ColumnHeadings {
margin:0in;
margin-bottom:.0001pt;
font-size:8.0pt;
font-family:"Franklin Gothic Medium","sans-serif";
color:#C19859;
font-weight:bold;
}
p.MsoNormal {
margin:0in;
margin-bottom:.0001pt;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
}
p.Amount {
margin:0in;
margin-bottom:.0001pt;
text-align:right;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
}
p.labels {
margin:0in;
margin-bottom:.0001pt;
text-align:right;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#C19859;
font-weight:bold;
}
p.numberedlist {
margin-top:0in;
margin-right:0in;
margin-bottom:3.0pt;
margin-left:.25in;
text-indent:-.25in;
line-height:110%;
tab-stops:list 0in;
font-size:7.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
letter-spacing:.2pt;
}
p.loweraddresslist {
margin-top:0in;
margin-right:0in;
margin-bottom:.0001pt;
margin-left:.3in;
font-size:7.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
}
p.authorizedby {
margin:0in;
margin-bottom:.0001pt;
font-size:7.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
}
p.lowercenteredtext {
margin-top:24.0pt;
margin-right:0in;
margin-bottom:.0001pt;
margin-left:0in;
text-align:center;
font-size:8.0pt;
font-family:"Franklin Gothic Book","sans-serif";
color:#664D26;
}
-->
</style>
<div style="padding:10px;"><?php echo $this->Html->link(__('View PDF Invoice', true), array('controller' => 'purchases', 'action' => 'admin_viewpdf',$purchase['Purchase']['id']),array('target' => '_blank')); ?></div>
<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" align="left" width="624" style="border-collapse:collapse;margin-left:7.1pt;margin-right:7.1pt;" id="invoice_table">
  <tr style="height:33.75pt;">
    <td width="624" colspan="2" valign="bottom" style="width:1.0in;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt .05in 5.75pt;height:33.75pt;"><p class="rightalignedtext"> </p></td>
    <td width="624" colspan="4" valign="bottom" style="width:1.5in;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:33.75pt;"><p class="slogan">Life Leisure Holiday</p></td>
    <td width="624" colspan="8" valign="bottom" style="width:4.0in;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:33.75pt;"><h1>Package Invoice</h1></td>
  </tr>
  <tr style="height:31.9pt;">
    <td width="624" colspan="14" style="width:6.5in;border:none;padding:0in 5.75pt 0in 5.75pt;height:31.9pt;"><p class="DateandNumber">Date:    [Enter a date]</p>
      <p class="DateandNumber">PO #    [100]</p></td>
  </tr>
  <tr style="height:92.25pt;">
    <td width="624" colspan="4" valign="top" style="width:113.05pt;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:92.25pt;"><p class="headingright">Vendor</p>
      <p class="headingright">&nbsp;</p></td>
    <td width="624" colspan="4" valign="top" style="width:146.0pt;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:92.25pt;"><p class="rightalignedtext">[Name]</p>
      <p class="rightalignedtext">[Company     Name]</p>
      <p class="rightalignedtext">[Street     Address]</p>
      <p class="rightalignedtext">[City,     ST  ZIP Code]</p>
      <p class="rightalignedtext">[Phone]</p>
      <p class="rightalignedtext">Customer    ID [ABC123]</p></td>
    <td width="624" colspan="3" valign="top" style="width:62.4pt;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:92.25pt;"><p class="headingright">Ship To</p>
      <p class="headingright">&nbsp;</p></td>
    <td width="624" colspan="3" valign="top" style="width:146.55pt;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:92.25pt;"><p class="rightalignedtext">[Name]</p>
      <p class="rightalignedtext">[Company     Name]</p>
      <p class="rightalignedtext">[Street     Address]</p>
      <p class="rightalignedtext">[City,     ST  ZIP Code]</p>
      <p class="rightalignedtext">[Phone]</p>
      <p class="rightalignedtext">Customer    ID [ABC123] </p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="5" style="width:156.0pt;border-top:none;border-left:solid #997339 1.0pt;border-bottom:solid #997339 1.0pt;border-right:none;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Package Name</p></td>
    <td width="624" colspan="5" style="width:156.0pt;border:none;border-bottom:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Order Date</p></td>
    <td width="624" colspan="4" style="width:156.0pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Package Price</p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="5" style="width:156.0pt;border:solid #997339 1.0pt;border-top:none;background:white;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="white"><p class="MsoNormal"><?php echo $purchase['Package']['name']; ?></p></td>
    <td width="624" colspan="5" style="width:156.0pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="white"><p class="MsoNormal"><?php echo $purchase['Purchase']['date']; ?></p></td>
    <td width="624" colspan="4" style="width:156.0pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="white"><p class="MsoNormal">&euro;<?php echo $purchase['Package']['price']; ?></p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="14" style="width:6.5in;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.2in;"><p class="MsoNormal">&nbsp;</p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" style="width:49.6pt;border-top:none;border-left:solid #997339 1.0pt;border-bottom:solid #997339 1.0pt;border-right:none;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Hotels</p></td>
    <td width="624" colspan="2" style="width:54.5pt;border:none;border-bottom:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Location</p></td>
    <td width="624" colspan="4" style="width:105.4pt;border:none;border-bottom:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Payment</p></td>
    <td width="624" colspan="2" style="width:93.35pt;border:none;border-bottom:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Additional Peoples</p></td>
    <td width="624" colspan="4" style="width:76.3pt;border:none;border-bottom:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Cuopon</p></td>
    <td width="624" style="width:88.85pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:#F2EADD;padding:0in 5.75pt 0in 5.75pt;height:.2in;" bgcolor="#F2EADD"><p class="ColumnHeadings">Value Added Services</p></td>
  </tr>
  <tr style="height:15.0pt;">
    <td width="624" bgcolor="white" style="width:49.6pt;border-top:none;border-left:solid #997339 1.0pt;border-bottom:none;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:15.0pt;">
    
    <?php foreach ($hotels as $hotel){
    	echo "<p class='MsoNormal'>".$hotel."</p>";
    	  } ?></td>
    <td width="624" colspan="2" bgcolor="white" style="width:54.5pt;border:none;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:15.0pt;"><?php foreach ($locations as $location){
    	echo "<p class='MsoNormal'>".$location."</p>";
    	  } ?></td>
    <td width="624" colspan="4" bgcolor="white" style="width:105.4pt;border:none;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:15.0pt;"><p class="MsoNormal"><?php echo $purchase['Payment'][0]['gateway_id']; ?></p></td>
    <td width="624" colspan="2" bgcolor="white" style="width:93.35pt;border:none;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:15.0pt;"><p class='MsoNormal'><?php echo "Person(s) ".$purchase['Purchase']['additional_persons']; 
    				$additional_per_cost = $purchase['Purchase']['additional_persons']*$purchase['Package']['additional_person_cost']; 
                    ?></p></td>
    <td width="624" colspan="4" bgcolor="white" style="width:76.3pt;border:none;border-right:solid #997339 1.0pt;background:white;padding:0in .15in 0in 5.75pt;height:15.0pt;"><p class='MsoNormal'>Cuopon ID: <?php echo $purchase['Purchase']['coupon_id']; ?></p>
    
    <p class='MsoNormal'>Reduce Precentage <?php echo $purchase['Coupon']['reduce_percentage']; ?>%</p></td>
    <td width="624" bgcolor="white" style="width:88.85pt;border:none;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:15.0pt;">
    
    <?php 
    $toatl_vas = 0;
    foreach ($added_services as $added_service){
    	
    	echo "<p class='MsoNormal'>".$added_service['Vas']['name']." &euro;".$added_service['Vas']['price']."</p>";
        $toatl_vas+= $added_service['Vas']['price'];
    	} ?>
    </td>
  </tr>
  <tr style="height:14.25pt;">
    <td width="624" style="width:49.6pt;border:solid #997339 1.0pt;border-top:none;background:white;padding:0in 5.75pt 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="MsoNormal">&nbsp;</p></td>
    <td width="624" colspan="2" style="width:54.5pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="MsoNormal">&nbsp;</p></td>
    <td width="624" colspan="4" style="width:105.4pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="MsoNormal">&nbsp;</p></td>
    <td width="624" colspan="2" style="width:93.35pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="MsoNormal"><?php echo "Cost &euro;".$additional_per_cost; ?></p></td>
    <td width="624" colspan="4" style="width:76.3pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in .15in 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="Amount">&nbsp;</p></td>
    <td width="624" style="width:88.85pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in 5.75pt 0in 5.75pt;height:14.25pt;" bgcolor="white"><p class="Amount">Total &euro;<?php echo $toatl_vas; ?></p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="13" style="width:379.15pt;border:none;border-right:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.2in;"><p class="labels">Total Due</p></td>
    <td width="624" style="width:88.85pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in .15in 0in 5.75pt;height:.2in;" bgcolor="white"><p class="Amount">&euro;<?php echo (($purchase['Package']['price'])-($purchase['Package']['price'])*($purchase['Coupon']['reduce_percentage']/100)+$toatl_vas)+$additional_per_cost; ?></p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="13" style="width:379.15pt;border:none;border-right:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.2in;"><p class="labels"> Tax</p></td>
    <td width="624" style="width:88.85pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in .15in 0in 5.75pt;height:.2in;" bgcolor="white"><p class="Amount">None</p></td>
  </tr>
  <tr style="height:.2in;">
    <td width="624" colspan="13" style="width:379.15pt;border:none;border-right:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.2in;"><p class="labels">Total</p></td>
    <td width="624" style="width:88.85pt;border-top:none;border-left:none;border-bottom:solid #997339 1.0pt;border-right:solid #997339 1.0pt;background:white;padding:0in .15in 0in 5.75pt;height:.2in;" bgcolor="white"><p class="Amount">&euro;<?php echo (($purchase['Package']['price'])-($purchase['Package']['price'])*($purchase['Coupon']['reduce_percentage']/100)+$toatl_vas)+$additional_per_cost; ?></p></td>
  </tr>
  <tr style="height:116.5pt;">
    <td width="624" colspan="7" rowspan="2" style="width:209.5pt;padding:0in 5.75pt 0in 5.75pt;height:116.5pt;"><p class="numberedlist">Please send two copies of your invoice.</p>
      <p class="numberedlist">Enter this order in accordance with the    prices, terms, delivery method, and specifications listed above.</p>
      <p class="numberedlist">Please notify us immediately if you are unable    to ship as specified.</p>
      <p class="numberedlist">Send all correspondence to:</p>
      <p class="loweraddresslist">[Name]<br>
        [Street Address]<br>
        [City, ST  ZIP Code]<br>
        Phone [000-000-0000]<br>
        Fax [000-000-0000]</p></td>
    <td width="624" colspan="7" style="width:258.5pt;border:none;border-bottom:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:116.5pt;"><p class="Amount">&nbsp;</p></td>
  </tr>
  <tr style="height:13.9pt;">
    <td width="624" colspan="5" style="width:127.05pt;border:none;padding:0in 5.75pt 0in 5.75pt;height:13.9pt;"><p class="authorizedby">Authorized by</p></td>
    <td width="624" colspan="2" style="width:131.45pt;border:none;border-top:solid #997339 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:13.9pt;"><p class="loweraddresslist">Date <?php echo date('Y-m-d');?></p></td>
  </tr>
  <tr style="height:.9in;">
    <td width="624" colspan="14" style="width:6.5in;padding:0in 5.75pt 0in 5.75pt;height:.9in;"><p class="lowercenteredtext">[Your     Company Name]  [Street     Address],[City, ST  ZIP Code]  Phone [000-000-0000]     Fax [000-000-0000]  [e-mail]</p></td>
  </tr>
</table>
<p class="MsoNormal">&nbsp;</p>
