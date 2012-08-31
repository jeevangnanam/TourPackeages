<?php 
//debug($gethotels);
?><h2><span id="querypod_title">
        Search for Hotels</span></h2>
<?php if(!empty($hotels)){
		foreach ($hotels as $hotel){ 
	
	?>
<div style="border: solid 1px red; margin-top: 10px; height: 40px;">
	Name :<?php echo $hotel['Hotel']['name'];?><br>
	Location : <?php echo $hotel['Location']['name']?>
</div>
<?php }  ?>

<p>
	<?php 
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	<?php } ?>
<?php //if(empty($hotels)){ ?>
<div >
<form id="searchForm" method="post" action="">
      
      <ul class="steps" style="list-style: none;">
        <li id="step1">
          
          <fieldset class="destination">
            <h3>Where are you going?</h3>
            
               <p> <?php echo $this->Form->input('location_id', array('label'=> 'Location','options'=> $locations)); ?></p>
              </fieldset>
        </li>
        <?php //echo $form->input('rooms', array('options' => array(1,2,3,4,5,6,7,8,9))); ?>
        
        <li id="step1">
          
          <fieldset class="destination">
            <h3>Name Of Hotel?</h3>
            
               <p> <?php echo $this->Form->input('hotel', array('label'=> 'Hotel'/*,'options'=> $gethotels*/)); ?></p>
          </fieldset>
        </li>
        
        
        <li id="step1">
          
          <fieldset class="destination">
            <h3>Need Package?</h3>
            
               <p> <?php echo $this->Form->input('duration', array('label'=> 'Duration')); ?></p>
          </fieldset>
        </li>
        
        <li id="step1">
          
          <fieldset class="destination">
            <h4>Price Between</h4>
            
               <p> <?php echo $this->Form->input('Price_one', array('label'=> 'Price','options' => array(50,100,150,200,250,300))); ?> 
               <?php echo $this->Form->input('Price_two', array('label'=> 'Price','options' => array(100,150,200,250,350))); ?></p>
          </fieldset>
        </li>
        
        <li id="step1">
          
          <fieldset class="destination">
            <h3></h3>
            
               <p> <?php echo $this->Form->input('room_type_id', array('label'=> 'Room Type','options'=> $roomTypes)); ?></p>
          </fieldset>
        </li>
        
        <li id="step1">
          
          <fieldset class="destination">
            <h3></h3>
            
               <p> <?php echo $this->Form->input('meal_plan_id', array('label'=> 'Meal Plan','options'=> $mealPlans)); ?></p>
          </fieldset>
        </li>
     </ul>
      <div class="foot clearfix feedbackButton">
        <div class="buttonBorder1">
          <div class="buttonBorder2">
            <button id="btn_search_submit" type="submit">Search</button>
          </div>
        </div>
      </div>
      <div class="hr"></div>
    </form>
</div>
<?php //}?>
