<?php  
		echo $this->Html->script(array(
	            'jquery/ui/jquery.ui.core',
	            'jquery/ui/jquery.ui.widget',
	            'jquery/ui/jquery.ui.mouse',
	            'jquery/ui/jquery.ui.slider',
                'jquery/ui/jquery.ui.datepicker.js',
	      	),array('inline' => false));
	        
	    /*echo $this->Html->css(array(
	        	'themes/base/jquery.ui.all',
	    		'themes/demos',
	        ),array('inline' => false));*/
	?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#search').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});

	$(function() {
		$( "#checkin" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
		$( "#checkout" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
		$( "#slider-range" ).slider({
			range: true,
			min: 100,
			max: 3000,
			values: [ 100, 3000 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				/*$.ajax({
					type: "POST",
					url: "/packages/index",
					data: $("#search-form").serialize(),
					success: function(responce){
						//alert(responce);
						$('#package_main_index').html(responce);
					}
				});
				$("#package_main_index").empty().html('<img src="http://lifelh-dev.com/img/al_loading.gif" />');*/
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	});
	
	$(function() {
		$( "#slider-date_range" ).slider({
			range: true,
			min: 1,
			max: 14,
			step: 1,
			values: [ 1, 14 ],
			slide: function( event, ui ) {
				$( "#date_range" ).val( "Date(s) " + ui.values[ 0 ] + " to Date(s)" + ui.values[ 1 ] );
				
			}
		});
		$( "#date_range" ).val( "Date(s) " + $( "#slider-date_range" ).slider( "values", 0 ) +
			" - Date(s) " + $( "#slider-date_range" ).slider( "values", 1 ) );
	});
</script>

<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
                            	<div class="wrapper">
<div id="package_main_index">
	
	

	<div class="packages index">
		<h2><?php __('All Packages');?></h2>
	
		
		
		<!-- <p class="slide"><a href="#" class="btn-slide">Search Packages</a></p>-->
	
    <div class="grid_8 maxheight4">   
                                	  <?php echo $this->element('package_search'); ?>
                                </div>
                                
		<div id="packages_only" class="" style="float: right; width: 655px; padding-left:10px;">
        <div class="border paddingb14 grid_15 prefix_1 maxheight4">
                                        <h3 class="indent-bot">Packages</h3>
										<div class="column-indent">
		<?php
		$i = 0;
		foreach ($packages as $package):
		
		?>
                                             
                                             <div class="smallbox h4-indent paddingb23">
                                             
                                                 <div class="wrapper ">
                                                        <figure class="fleft img-indent">
                                                            <?php $thumbnail = $this->Html->link($this->Image->resize('' . $package['Package']['default_map'], 190,123,'', 'class = "rounded"'), array('controller' => 'packages', 'action' => 'view', $package['Package']['id']), array('escape' => false));
        
                        echo $thumbnail; ?>
                    
                    <div class="rating" style=" height:auto; width:170px !important;">
                        <table><tr><td width="30%"><span class="title"> Price</span></td><td><span class="numb">SGD:<?php echo $package['Package']['price']?></span></td></tr>
                        <tr><td><span class="title"> Max-People</span></td><td> <span class="numb"><?php echo $package['Package']['max_people']?></span></td></tr>
                        <tr><td><span class="title"> Durations</span></td><td><span class="numb"><?php echo $package['Package']['duration'];?> (days)</span></td></tr></table> 	
                       
                    </div>
                    <div class="rating" style=" height:auto; width:170px !important;">	
                        <span class="title"> Location(s)</span>
                        <script type="text/javascript">
						$(document).ready(function(){
							$('#location_loader_<?php echo $package["Package"]["id"]?>').load('<?php echo $this->webroot;?>packages/loadLocations/<?php echo $package["Package"]["location_ids"]?>');
						});
						</script>
	              		<span id="location_loader_<?php echo $package['Package']['id']?>" class="title">Loading...</span>
                        
                        
                    </div>
                    
                    </figure>
                                                    <div class="info extra-wrap">
                                                    
                                                        <strong class="heading"><?php echo $package['Package']['name'];?> : <?php echo $package['Package']['duration']?> day tour
                                                        </strong><span class="heading" style="color:#F90; font-size:10px;">Valid Till: <?php echo date('F j, Y',strtotime($package['PackageAvailability']['end_date']));?></span>
                                                
														</span>
                                                        
                                                        
                                                        <span class="block" style="background:#FFE8E8;border-radius:4px;padding:0 10px 0 10px; margin:10px 0 10px 0;"><?php echo Sanitize::clean($package['Package']['short_description'], array('remove_html' => true,'connection' =>
	'default','odd_spaces' => true,'encode' => true,'escape' =>false,'backslash' => true)); ?></span>
    													<div class="buttons-indent2 fright">
														<a class="link-2 button-1" href="<?php echo $this->webroot;?>packages/view/<?php echo $package['Package']['id'];?>">More Details</a>
														</div>
    
                                                        <!--<div class="wrapper">
                                                            <a href="#" class="fleft info-links">Review</a>
                                                            <a href="#" class="fleft info-links">Show Map</a>
                                                        </div>
                                                        <a class="link-4" href="#">View Destination Guide</a>-->
                                                    </div>
                                                </div>
                                            </div>
                                             <div>
                                             
                                                 
                                            </div>

                               
                                 
                                 
		<?php  endforeach; ?>
			<div style="clear: both; padding-top: 20px;">
			<p class='paging_p'>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
			));
			?>	</p>
		
			<div class="paging">
				<?php //$paginator->options(array('url' => $this->params['url']['city']."&q=".$this->params['named']['q'])); 
				echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
			 | 	<?php echo $this->Paginator->numbers();?>
		 |
				<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
			</div>
		</div>
         </div>
                                 </div>
		</div>
	</div>
    
    
</div>
</div>
	</div>
</div>
</div>
</div>
