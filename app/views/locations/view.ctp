
<div class="locations view" style="padding:5px; background: #F8CA9C">

<h2 align="center"><?php    __($location['Location']['name']);?></h2>
 
    <table width="90%" border="0">
   <tr>
    <td style="color:#CC0000; margin:10px; padding:5px;text-align:justify" ><?php echo $location['Location']['info']; ?></td>
  </tr>
  </table>
  <h2>Hotels</h2>
  
  <div style="margin:5px; color:#CC0000";>
<?php 
$hotel=array(); 
foreach ($location['Hotel'] as $key => $hotels){
echo $hotels['name'].'</br>';
	}
?>

</div>
<h2>Available Packages</h2>
<div style="color:#CC0000""> 
<?php foreach ($packeges as $package){

 echo $package['Package']['name'].'</br>';

	}

  ?>
</div>

