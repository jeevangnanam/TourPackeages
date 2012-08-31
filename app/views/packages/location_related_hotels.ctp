<?php 
if(!empty($hotels)) {
	$i = 0;
	foreach ($hotels as $key2=>$hotel){
	?>
		<div style="margin: 15px;">
	    	<?php 
	    	echo $this->Form->input('Hotel.hotel_id_'.str_replace(' ','_',$hotel['Hotel']['name']).'_'.$key2 ,array(
	    	'label' => $hotel['Hotel']['name'],'type'=>'checkbox' ,'value' => $hotel['Hotel']['id'],
	    	 'id'=>'hotel_'.str_replace(' ','_',$hotel['Hotel']['name']).'_'.$key2,'hiddenField' => false ));
	    	?>
		</div>
<?php }
}else{
	echo "No Hotels fonded to related location";
}
	?>
	