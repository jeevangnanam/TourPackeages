<script type="text/javascript">
$(document).ready(function(){
	$(".CheckBoxClass").change(function(){
		var pac_text = $('#pac_price').text();
		if($(this).is(":checked")){
			$(this).next("label").addClass("LabelSelected");
			var vas_price = $(this).val();
			var total_with_vas = parseInt(vas_price) + parseInt(pac_text);
			$('#pac_price').text(total_with_vas);
		}else{
			var vas_price = $(this).val();
			var total_without_vas = parseInt(pac_text)-parseInt(vas_price);
			$(this).next("label").removeClass("LabelSelected");
			$('#pac_price').text(total_without_vas);
		}
	});
	
	$("#CouponAdditionalPersons").change(function () {
		var str = "";
		$("#CouponAdditionalPersons option:selected").each(function () {
            if($("#CouponAdditionalPersons").val() == ""){
            	str = <?php echo $package['Package']['price']; ?>;
            }else{
            	str += (($("#CouponAdditionalPersons").val())*<?php echo $package['Package']['additional_person_cost'] ?>) + <?php echo $package['Package']['price']; ?>;
            }
          });
      	$("#package_cost").text(str);
	});
	$("#package_cost").text(<?php echo $package['Package']['price'];?>);
});

function vas_popup(j) {
	$("#vas_popup").css("display","block");
	$("#vas_popup").html(j);
}

/*jQuery(document).ready(function($) {
		$('#CouponAdditionalPersons').jqTransform({imgPath:'jqtransformplugin/img/'});	
});*/
</script>
<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">
<div class="packages view">
<h2><?php  __('Book Package'); echo " >> ".$package['Package']['name']?></h2> 

<div class="stage" id="bookStageNavInc">
  <table>
    <tbody><tr>
      <td class="off">1.
        	Your Package
        </td>
      
	      <td class="on">2.
        	Your details
	      </td>
	      <td class="off">3.
        	Value Added Service
	      </td>
	      <td class="off">4.
        		
        		Confirm booking
        	
	      </td>
	      <td class="off">5.
        		
      		  	Booking complete
      		 
	      </td>
		
    </tr>
  </tbody></table>
</div>

<?php 
if($this->params['named']['step'] != 2 && $this->params['named']['step'] !=3 ){?>
<?php echo $this->Form->create('Coupon', array('controller'=>'coupons' ,'action' => 'couponCheck/'.$package['Package']['id'],'type' => 'post','id'=>'cupon_check'));?>
		<ul>
			<li><?php //echo $package['Hotel']['name']?>
			<?php foreach ($hotels as $hotel=>$star){
				echo $hotel; 
				for($i=1;$i<=$star;$i++){ ?>
				<img src="<?php echo $this->webroot; ?>img/icons/marker5_02.jpg" style="padding-bottom: 4px;"> 				
				<?php }?>
				<br>
			<?php }?>
			
			</li>
			<li><?php __('Meal Plan'); ?>: <?php echo $package['MealPlan']['name']?> </li>
			<li>Room Type: <?php echo $package['RoomType']['name']?></li>
			<li>
				<?php foreach ($locations as $key=>$location){
				echo $location."<br>";
			?>
			<?php }?>
			</li>
			<li>Package Price: &euro;<span id="package_cost"><?php echo $package['Package']['price']; ?></span></li>
			<li>Additional Person Cost: &euro;<?php echo $package['Package']['additional_person_cost']; ?></li>
		</ul>
		<div class="select1">
		<?php 
		//$max_people = $package['Package']['max_people'];
		
		//for($i=1; $i <= $max_people; $i++){
			//$max_pople_ar.= "$i"."=>".$i;
		//}
		
		echo $this->Form->input('additional_persons',array('type'=>'select','options'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'), 'empty' => 'Select'
			));?>
		</div>
		<?php echo $this->Form->input('coupon');?>
		
		<?php echo $this->Form->end(__('Submit', true)); 
		
}elseif ($this->params['named']['step'] == 2){ ?>

<?php echo $this->Form->create('Package',array('controller'=>'purchases' ,'action' => 'book/'.$package['Package']['id'].'/step:3','type' => 'post'));    ?>

<div id="dwrap">
	<?php foreach ($vas as $key=>$va){?>
		<div class="dwrap_div" id="dwrap_div_<?php echo $key?>">
		<input name="data[Vas][<?php echo $va['Va']['id'];?>]" id="CheckBox<?php echo $key?>" type="checkbox" class="CheckBoxClass" 
		value="<?php echo $va['Va']['price'];?>" />
		<?php //echo $this->Form->input('vas_'. $key ,array('type'=>'checkbox','class'=>'CheckBoxClass','value'=>$va['Vas']['price'],'hiddenField' => false,'lable'=>false));?>
		<label id="Label<?php echo $key?>" for="CheckBox<?php echo $key?>" class="CheckBoxLabelClass"><b><?php echo $va['Va']['name'];?></b></label>
			<span>Minimum People <?php echo $va['Va']['minimum'];?></span>
			<span>Maximum People <?php echo $va['Va']['maximum'];?></span>
			<span id="vas_price_<?php echo $key?>">Price <?php echo $va['Va']['price'];?></span>
			<input type="hidden" id="hidden_<?php echo $key?>" name="vas_<?php echo $key?>" value="<?php echo $va['Va']['id'];?>">
			<span><?php echo $va['Va']['description'];?></span>
		</div>
		
	<?php }?>
</div>

<ul>
		<li>Package = <?php echo $package['Package']['name']?></li>
		<li>Package Price = 	&euro;<?php echo $package['Package']['price']?></li>
		<li>Additional Persons Cost = &euro;<?php echo $purchase['Package']['additional_person_cost']?></li>
		<li>Additional Persons = <?php echo $purchase['Purchase']['additional_persons']?></li>
		
		<?php if(!empty($purchase['Purchase']['coupon_id'])){ ?>
		<li>Coupon Discount = <?php echo $purchase['Coupon']['reduce_percentage']?>%</li>
		<li>Total With Discount Price = 	&euro;
			<span id="pac_price"><?php 
			$package_cost = $package['Package']['price'];
			$addi_person_cost = $purchase['Package']['additional_person_cost'];
			$addi_persons = $purchase['Purchase']['additional_persons'];
			$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
			
			$total_addi_person_cost = $addi_person_cost*$addi_persons;
			$total_cost = $package_cost+$total_addi_person_cost;
			
			$total_with_discount = ($total_cost)-($total_cost*($coupon_discount_per/100));
			echo $total_with_discount;
			//echo ($package['Package']['price']+($purchase['Package']['additional_person_cost']*$purchase['Purchase']['additional_persons']))-($package['Package']['price']+($purchase['Package']['additional_person_cost']*$purchase['Purchase']['additional_persons']))*($purchase['Coupon']['reduce_percentage']/100);?>
			</span>
		</li>
		
		<?php }else{ ?>
		<li>Total = &euro; 
				<span id="pac_price"><?php 
				$package_cost = $package['Package']['price'];
				$addi_person_cost = $purchase['Package']['additional_person_cost'];
				$addi_persons = $purchase['Purchase']['additional_persons'];
				$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
				
				$total_addi_person_cost = $addi_person_cost*$addi_persons;
				$total_cost = $package_cost+$total_addi_person_cost;
				echo $total_cost;
				?>
				</span>
		</li>	
		<?php }?>
		
</ul>

	<?php echo $this->Form->end(__('Next', true)); ?>


<?php }elseif ($this->params['named']['step'] == 3){ ?>

<ul>
		<li>Email = <?php echo $this->Session->Read('Auth.User.email');?></li>
		<li>Package = <?php echo $package['Package']['name']?></li>
		<?php if (!empty($added_service)){?><li>Value Added Services 
		<?php 
		foreach ($added_service as $key=>$service){ ?>
			<span style="display: block;"><?php echo $service['Vas']['name'];?> &euro;<?php echo $service['Vas']['price'];?></span><br>
		<?php }?>
		</li>
		<li>Total of Value added service price &euro;<?php echo $sum_vas; ?> </li>
		
		<?php }?>
		<li>Package Price = 	&euro;<?php echo $package['Package']['price']?></li>
		<li>Additional Persons Cost = &euro;<?php echo $purchase['Package']['additional_person_cost']?></li>
		<li>Additional Persons = <?php echo $purchase['Purchase']['additional_persons']?></li>
		
		<?php if(!empty($purchase['Purchase']['coupon_id'])){ ?>
		<li>Coupon Discount = <?php echo $purchase['Coupon']['reduce_percentage']?>%</li>
		<li>Total With Discount Price = 	&euro;
		<?php 
			$package_cost = $package['Package']['price'];
			$addi_person_cost = $purchase['Package']['additional_person_cost'];
			$addi_persons = $purchase['Purchase']['additional_persons'];
			$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
			
			$total_addi_person_cost = $addi_person_cost*$addi_persons;
			$total_cost = $package_cost+$total_addi_person_cost;
			
			$total_with_discount = (($total_cost)-($total_cost*($coupon_discount_per/100)))+$sum_vas;
			echo $total_with_discount;
			//echo ($package['Package']['price']+($purchase['Package']['additional_person_cost']*$purchase['Purchase']['additional_persons']))-($package['Package']['price']+($purchase['Package']['additional_person_cost']*$purchase['Purchase']['additional_persons']))*($purchase['Coupon']['reduce_percentage']/100);?></li>
		
		<?php }else{ ?>
		<li>Total = <?php 
				$package_cost = $package['Package']['price'];
				$addi_person_cost = $purchase['Package']['additional_person_cost'];
				$addi_persons = $purchase['Purchase']['additional_persons'];
				$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
				
				$total_addi_person_cost = $addi_person_cost*$addi_persons;
				$total_cost = $package_cost+$total_addi_person_cost+$sum_vas;
				echo "&euro;".$total_cost;
				?>
		</li>	
		<?php }?>
		
		<li>Purchase Id = <?php echo $this->Session->Read('LastPurchaseID');?></li>
</ul>
	<?php echo $this->Form->create('Payment',array('controller'=>'coupons' ,'action' => 'couponCheck/'.$package['Package']['id'],'type' => 'post'));    ?>
	<div>
   		<?php echo $this->Form->radio('payvia',array('AMEX'=>''));?> <img src="<?php echo $this->webroot; ?>img/logo_bluebox.gif">
   	</div>
   	<div>
    	<?php echo $this->Form->radio('payvia',array('HNB'=>''));?> <img src="<?php echo $this->webroot; ?>img/main_logo.gif"><br>
	</div>
	<?php echo $this->Form->end(__('Confirm Booking', true)); ?>

<?php }?>
</div>

<div id="vas_popup" style="margin: auto; margin-top: 20%; width: 500px; display: none; border: solid 1px red;">
</div>

</div>
</div>
</div>
</div>
</div>
