<script type="text/javascript">
$(document).ready(function(){
	/*alert(<?php echo $this->params['named']['step'];?>);
	$(".submit").click(function(){*/
		var action=this.childNodes[0].value;

		switch(action){
			case "Submit":
				$("#step1").removeClass("activeDiv");
				$("#step1").addClass("inactiveDiv");
				$("#s1Arrow").removeClass("activeArrow");
				$("#s1Arrow").addClass("inactiveArrow");
				
				break;
		}
	//});
	
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
<style>
.stepFont{
	width:165px;
	float:left;
	padding-top: 5px;
    text-align: center;
}
.inactiveDiv{
	background:url(<?php echo $html->webroot;?>img/steps/stepsbg.png) repeat-x;
	height:35px;
	width:250px;
	color:#360;
}

.activeDiv{
	background:url(<?php echo $html->webroot;?>img/steps/activestep.png) repeat-x;
	height:35px;
	color:#FFF;
	width:250px;
	
}
.activeArrow{
	background:url(<?php echo $html->webroot;?>img/steps/stepsarrowactiveright.png) no-repeat;
	float:right;
	height:35px;
	width:33px;
}
.inactiveArrow{
	background:url(<?php echo $html->webroot;?>img/steps/stepsarrow.png) no-repeat;
	float:left;
	height:35px;
	width:33px;
}
.cap{
	width:auto;
	height:35px;
	color:#360;
	text-align:left;
	margin-bottom:10px;
	padding-top:10px;
	padding-left:10px;
	background: rgb(238,238,238); /* Old browsers */
	background: -moz-linear-gradient(top,  rgba(238,238,238,1) 0%, rgba(204,204,204,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(238,238,238,1)), color-stop(100%,rgba(204,204,204,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* IE10+ */
	background: linear-gradient(top,  rgba(238,238,238,1) 0%,rgba(204,204,204,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 ); /* IE6-9 */

	
	
}
.cap_span{
	width:20px;
}

.tblorder {
	/*margin-top:10px;*/
}
.tblorder td{
	border:solid 1px #999;
	padding:5px;
	vertical-align:middle;
}
</style>
<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">
<div class="packages view" >
<div class="cap">
<span class="cap_span">
<h2><?php  __('Book Package'); echo " >> ".$package['Package']['name']?></h2>
</span>
</div>
<div class="stage" id="bookStageNavInc">
<?php 

@$class = $this->params['named']['step'];

?>
  <table>
    <tbody><tr>
      <td id="step1" class="<?php echo ($class=='') ? "activeDiv" : ( ($class==2) ? "inactiveDiv" : "inactiveDiv" ); ?>">
      	 <div class="stepFont">Your Package</div>
         <div id="s1Arrow" class="<?php echo ($class=='') ? "activeArrow" : ( ($class==2) ? "inactiveArrow" : "inactiveArrow" ); ?>"></div>
        </td>
      
	      <td id="step2" class="<?php echo ($class==2) ? "activeDiv" : ( ($class==2) ? "inactiveDiv" : "inactiveDiv" );  ?>">
        	<div class="stepFont">Value Added Service</div>
            <div class="<?php echo ($class==2) ? "activeArrow" : ( ($class==2) ? "inactiveArrow" : "inactiveArrow" ); ?>"></div>
	      </td>
	      <td id="step3" class="<?php echo ($class==3) ? "activeDiv" : ( ($class==2) ? "inactiveDiv" : "inactiveDiv" );  ?>">        	
            <div class="stepFont">Confirm booking</div>
            <div class="<?php echo ($class==3) ? "activeArrow" : ( ($class==2) ? "inactiveArrow" : "inactiveArrow" ); ?>"></div>
	      </td>
	      <td id="step4" class="inactiveDiv">
            <div class="stepFont">Booking complete</div>
            <div class="inactiveArrow"></div>
	      </td>
	     
		
    </tr>
  </tbody></table>
</div>

<?php 
if(@$this->params['named']['step'] != 2 && @$this->params['named']['step'] !=3 ){?>
            <div>
<?php echo $this->Form->create('Coupon', array('controller'=>'coupons' ,'action' => 'couponCheck/'.$package['Package']['id'],'type' => 'post','id'=>'cupon_check'));?>

			  <table width="100%" border="0" cellpadding="5" cellspacing="5" class="tblorder">
  <tr>
    <td>Hotel(s)</td>
    <td><div>
			
			<?php foreach ($hotels as $hotel=>$star){
				echo $hotel; 
				for($i=1;$i<=$star;$i++){ ?>
				<img src="<?php echo $this->webroot; ?>img/icons/marker5_02.jpg" style="padding-bottom: 4px;"> 				
				<?php }?>
				<br>
			<?php }?>
			</div></td>
  </tr>
  <tr>
    <td><?php __('Meal Plan'); ?></td>
    <td><?php echo $package['MealPlan']['name']?></td>
  </tr>
  <tr>
    <td> Room Type:</td>
    <td><?php echo $package['RoomType']['name']?></td>
  </tr>
  <tr>
    <td>Location(s)</td>
    <td><?php foreach ($locations as $key=>$location){
				echo $location."<br>";
			?>
      <?php }?></td>
  </tr>
  <tr>
    <td>Package Price</td>
    <td>SGD:<span id="package_cost"><?php echo $package['Package']['price']; ?></span></td>
  </tr>
  <tr>
    <td>Additional Person Cost</td>
    <td>SGD:<?php echo $package['Package']['additional_person_cost']; ?></td>
  </tr>
  <tr>
    <td><span class="select1">
      <?php 
		echo $this->Form->input('additional_persons',array('type'=>'select','options'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'), 'empty' => 'Select'
			));?>
    </span></td>
    <td><?php echo $this->Form->input('coupon',array('label'=>'Coupon(if any)'));?></td>
  </tr>
              </table>
<?php echo $this->Form->end(__('Next', true)); ?>
            </div>
            <div style="clear:both;">&nbsp;</div>
		
		
<?php }elseif ($this->params['named']['step'] == 2){ ?>

<?php echo $this->Form->create('Package',array('controller'=>'purchases' ,'action' => 'book/'.$package['Package']['id'].'/step:3','type' => 'post'));    ?>

<table width="100%" class="tblorder">
  
  <?php foreach ($vas as $key=>$va){?>
  <tr><td>
            <div class="dwrap_div" id="dwrap_div_<?php echo $key?>">
            <input name="data[Vas][<?php echo $va['Va']['id'];?>]" id="CheckBox<?php echo $key?>" type="checkbox" class="CheckBoxClass" value="<?php echo $va['Va']['price'];?>" />
            <label id="Label<?php echo $key?>" for="CheckBox<?php echo $key?>" class="CheckBoxLabelClass"><b><?php echo $va['Va']['name'];?></b></label>
            </div>
            </td>
            <td>
                <span>Minimum People <?php echo $va['Va']['minimum'];?></span>
                <span>Maximum People <?php echo $va['Va']['maximum'];?></span>
                <span id="vas_price_<?php echo $key?>">Price <?php echo $va['Va']['price'];?></span>
                <input type="hidden" id="hidden_<?php echo $key?>" name="vas_<?php echo $key?>" value="<?php echo $va['Va']['id'];?>">
                <span><?php echo $va['Va']['description'];?></span></td>
            </tr>
        <?php }?>
    
      <tr>
        <td>Package</td>
        <td><?php echo $package['Package']['name']?></td>
      </tr>
      <tr>
        <td>Package Price</td>
        <td>SGD:<?php echo $package['Package']['price']?></td>
      </tr>
      <tr>
        <td>Additional Persons Cost</td>
        <td>SGD:<?php echo $purchase['Package']['additional_person_cost']?></td>
      </tr>
      <tr>
        <td>Additional Persons</td>
        <td><?php echo $purchase['Purchase']['additional_persons']?></td>
      </tr>
      <?php if(!empty($purchase['Purchase']['coupon_id'])){ ?>
      <tr>
        <td>Coupon Discount</td>
        <td><?php echo $purchase['Coupon']['reduce_percentage']?>%</td>
      </tr>
      <tr>
        <td>Total With Discount Price</td>
        <td>SGD:
			<span id="pac_price"><?php 
			$package_cost = $package['Package']['price'];
			$addi_person_cost = $purchase['Package']['additional_person_cost'];
			$addi_persons = $purchase['Purchase']['additional_persons'];
			$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
			
			$total_addi_person_cost = $addi_person_cost*$addi_persons;
			$total_cost = $package_cost+$total_addi_person_cost;
			
			$total_with_discount = ($total_cost)-($total_cost*($coupon_discount_per/100));
			echo $total_with_discount; ?>
			</span>
            </td>
      </tr>
      <?php }else{ ?>
      <tr>
        <td>Total </td>
        <td>SGD: <span id="pac_price">
          <?php 
				$package_cost = $package['Package']['price'];
				$addi_person_cost = $purchase['Package']['additional_person_cost'];
				$addi_persons = $purchase['Purchase']['additional_persons'];
				$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
				
				$total_addi_person_cost = $addi_person_cost*$addi_persons;
				$total_cost1 = $package_cost+$total_addi_person_cost;
				echo $total_cost1;
				?>
        </span></td>
                        <input type="hidden" id="tc" name="tc" value="<?php echo $total_cost1;?>">

      </tr>
      <?php }?>
    
  </table>
<?php echo $this->Form->end(__('Next', true)); ?>

<?php }elseif ($this->params['named']['step'] == 3){   ?>
	<?php echo $this->Form->create('Payment',array('controller'=>'Payments' ,'action' => 'add','type' => 'post'));    ?>

	
	<!--<form method="post" id="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr">-->
	<table width="100%" border="1" class="tblorder">
      <tr>
        <td>Email</td>
        <td><?php echo $this->Session->Read('Auth.User.email');?></td>
      </tr>
      <tr>
        <td>Package</td>
        <td><?php echo $package['Package']['name']?></td>
         <?php echo $this->Form->input('package', array('type' => 'hidden','value' =>$package['Package']['name']));?>
      </tr>
      <?php if (!empty($added_service)){?>
      <tr>
        <td>Value Added Services</td>
        <td><?php 
		foreach ($added_service as $key=>$service){ ?>
			<span style="display: block;"><?php echo $service['Vas']['name'];?> SGD:<?php echo $service['Vas']['price'];?></span>
		<?php }?></td>
      </tr>
       
      <tr>
        <td>Total of Value added service price</td>
        <td>SGD:<?php echo $sum_vas; ?> </td>
      </tr>
      <?php } ?>
      <tr>
        <td>Package Price</td>
        <td>SGD:<?php echo $package['Package']['price']?></td>
      </tr>
      <tr>
        <td>Additional Persons Cost</td>
        <td>SGD:<?php echo $purchase['Package']['additional_person_cost']?></td>
      </tr>
      <tr>
        <td>Additional Persons</td>
        <td><?php echo $purchase['Purchase']['additional_persons']?></td>
      </tr>
      
      <?php if(!empty($purchase['Purchase']['coupon_id'])){ ?>
      <tr>
        <td>Coupon Discount</td>
        <td><?php echo $purchase['Coupon']['reduce_percentage']?>%</td>
      </tr>
      <tr>
        <td>Total With Discount Price</td>
        <td>SGD:
		<?php 
		
			$package_cost = $package['Package']['price'];
			$addi_person_cost = $purchase['Package']['additional_person_cost'];
			$addi_persons = $purchase['Purchase']['additional_persons'];
			$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
			
			$total_addi_person_cost = $addi_person_cost*$addi_persons;
			$total_cost = $package_cost+$total_addi_person_cost;
			
			$total_with_discount = (($total_cost)-($total_cost*($coupon_discount_per/100)))+$sum_vas;
			echo $total_with_discount;
			?></td>
      </tr>
      
      <?php }else{ ?>
      <tr>
        <td>Total</td>
        <td><?php 
		       $vas_values= '';
				$value_added=$this->params;
				//debug($value_added);
				foreach($value_added as $service ){
					if(isset( $service['Vas'] )){
						  $vas_values=$service['Vas'];
						  
						 }
					}
			
				if(@$this->params['pass'][1] == 1){
					debug($bookagain);
					$total_cost= $bookagain['Payment'][0]['total_amount'];
				}
				else{
					$total_vas=array_sum($vas_values) ;
					$package_cost = $package['Package']['price'];
					$addi_person_cost = $purchase['Package']['additional_person_cost'];
					$addi_persons = $purchase['Purchase']['additional_persons'];
					$coupon_discount_per = $purchase['Coupon']['reduce_percentage'];
					//$sum_vas;
					$total_addi_person_cost = $addi_person_cost*$addi_persons;
					$total_cost = $package_cost+$total_addi_person_cost+$total_vas;
				}	
				echo 'SGD:'.$total_cost;
				?>
         </td>
      </tr>
      <?php } //debug($this->params); ?>
      <tr>
        <td>Purchase Id</td>
        <td><?php if(@$this->params['pass'][1] == 1){
			         echo $this->params['pass'][2];
			         }
					else{
						 $p_id=$this->Session->Read('LastPurchaseID');echo $p_id ;
					} 
		         ?>
        <?php echo $this->Form->input('purchase_id', array('type' => 'hidden','id' => 'purchase_id','value' => @$p_id));?></td>
      </tr>
      <?php echo $this->Form->input('amount', array('type' => 'hidden','id' => 'amount','value' => $total_cost));?>
      <?php //echo $this->Form->input('name', array('type' => 'hidden','id' => 'name','value' => $total_cost));?>
      
      <!--<tr>
        <td><?php// echo $this->Form->radio('payvia',array('AMEX'=>''));?> </td>
        <td>&nbsp;<img src="<?php //echo $this->webroot; ?>img/logo_bluebox.gif"></td>
      </tr>
      <tr>
        <td><?php// echo $this->Form->radio('payvia',array('HNB'=>''));?> </td>
        <td>&nbsp;<img src="<?php //echo $this->webroot; ?>img/main_logo.gif"><br></td>
      </tr>-->
      
    </table>
<?php echo $this->Form->end(__('Confirm Booking', true)); ?>
<?php }?>


</div>

</div>
</div>
</div>
</div>
</div>
