<?php 
		echo $this->Html->script(array(
	            'jquery/ui/jquery.ui.core',
	            'jquery/ui/jquery.ui.widget',
	            'jquery/ui/jquery.ui.mouse',
	            'jquery/ui/jquery.ui.slider',
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
                                	 <form id="search" method="post" action="javascript: document.location.href='/packages/search/q:'+encodeURI($('#package_catagory').val())+'/city:'+encodeURI($('#LocationName').val())+'/duration:'+encodeURI($('#package_duration').val());">
                                      
                                          <fieldset>
                                          <h5>Search For a Packages</h5>  
                                          
                                              <div class="select1">
                                                <?php echo $this->Form->input('package_catagory',array('options' => $packageCategories,'empty'=>'Select Package'));?>
                                              </div>
                                              <div class="clear"></div>
                                            <div class="search_block">
                                              <div class="field wrapper">
                                              
                                                <?php $cityValue = null;
                                                if (isset($this->params['named']['city'])) {
                                                    $cityValue = $this->params['named']['city'];
                                                }
                                                
                                                $duration  = $this->params['named']['duration'];
                                                
                                             echo $ajax->autoComplete('Location.name', '/locations/autoComplete',array('label' => 'Location','value' => $cityValue));
                                             
                                             //echo $ajax->autoComplete('Package.duration', '/packages/packageDurations',array('label' => 'Duration','value' => $this->params['named']['duration']));
                                             echo $this->Form->input('package_duration',array('value'=>$duration));
                                            ?>
                                              </div>
                                              <div class="field1 wrapper">
                                              <div class="text-field mr16">
                                              	<label>Check-in:</label>
                                                <input  type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
                                              <div class="text-field">
                                                <label>Check-out:</label>
                                                <input type="text" value="dd/mm/yy" onFocus="if(this.value=='dd/mm/yy'){this.value=''}" onBlur="if(this.value==''){this.value='dd/mm/yy'}" />
                                              </div>
                                              </div> 
                                            </div>
                                            
                                            
                                            <div class="wrapper">
                                            <div class="fleft buttons-indent1 fleft">
                                            <!--<a class="link-3" href="#">Show additional options</a>-->
                                            </div>
                                            <div class="buttons-indent2 fright">
                                             <a class="link-2 button-1 " href="#"  onClick="document.getElementById('search').submit()">Search</a>
                                             </div>
                                            </div>
                                          </fieldset>
                                    </form>
                                </div>
                                
		<div id="packages_only" class="" style="float: right; width: 670px; padding-left:10px;">
		<?php
		$i = 0;
		foreach ($packages as $package):
		?>
			<?php //if($package['PackageAvailability']['end_date'] >= date('Y-m-d')){?>
			<div class="resultcontainer">
	  <div class="resultfoundheading" style="height: 48px;">
	    <div class="resulttopleft"><img src="http://img1.yatra.com/images/holiday/detailleft.gif"></div>
	    <div title="Club Med Ria Bintan" alt="Club Med Ria Bintan" class="resultheading"><?php echo $package['Package']['name'];?><strong style="font-size: 14px; color: rgb(36, 115, 171);"> <?php echo$package['Package']['duration']?> tour</strong>
	      <div style="font-size: 10px; margin-top:-4px; margin-left:2px; color:#ffffff">Valid Till: <?php echo date('F j, Y',strtotime($package['PackageAvailability']['end_date']));?></div>
	    </div>
	    <div class="resulttopright">
	      <div class="resultpricecon">
	        <div class="step2priceinfo">
	          <div class="step2starting">Starting from</div>
	          <div class="step2priceheading"><span _tool_trip_="">&euro;<?php echo$package['Package']['price']?></span></div>
	          <div class="step2inclusive">All inclusive price per person on twin sharing          </div>
	          
	        </div>
	        <div style="float: right; width: 7px;"><img src="http://img1.yatra.com/images/holiday/detailright.gif"></div>
	      </div>
	      <div style="width: 162px; height: 5px; float: left;"><img align="top" src="http://img1.yatra.com/images/holiday/detailbottom.gif"></div>
	    </div>
	  </div>
	  <div class="resultfoundheading">
	    <div class="tourplanepannel">
	      <div style="width: 161px; height: 109px;">
	      <?php $thumbnail = $this->Html->link($this->Image->resize('' . $package['Package']['default_map'], 152,109,'', 'class = "rounded"'), array('controller' => 'packages', 'action' => 'view', $package['Package']['id']), array('escape' => false));
	
					echo $thumbnail; ?>
		  </div>
	      <div style="width: 153px; padding-top: 12px;">
	        <div class="commonleftpannel tour_curve1"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	        <div class="tourtopbg"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	        <div class="commonrightpannel tour_curve2"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      </div>
	      <div class="tour_plancon">
	        <div class="tourheadingpannel">
	          <div class="tourplanheading">
	            <div class="tourplaneleft">Tour Plan</div>
	            <div class="destinationright">Destination Guide</div>
	          </div>
	        </div>
	        <div class="tourplanheading" style="padding-top: 10px; padding-bottom: 5px;">
	          <div class="tableMatrix">
	            <ul>
	              <li><?php echo $package['Package']['duration'];?> ..
	              	<script type="text/javascript">
						$(document).ready(function(){
							$('#location_loader_<?php echo $package['Package']['id']?>').load('/packages/loadLocations/<?php echo $package['Package']['location_ids']?>');
						});
					</script>
	              <span id="location_loader_<?php echo $package['Package']['id']?>">Loading...</span>
	              
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	      <div style="width: 153px;">
	        <div class="commonleftpannel tour_curve3"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	        <div class="tourbottombg" style="width: 143px;"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	        <div class="commonrightpannel tour_curve4"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      </div>
	    </div>
	    <div style="float: right; width: 506px;">
	      <div class="packageinclusionpannel">
	        <div class="step2_packheading">Package Inclusions</div>
	        <div class="highlightscon" style="padding-top: 5px;">
	          <div class="packageinclusionleft"><img align="absmiddle" src="http://img1.yatra.com/images/holiday/KT1.gif"> <?php echo $package['MealPlan']['name']?></div>
	          <div class="packageinclusionright"><img align="absmiddle" src="http://img1.yatra.com/images/holiday/ACO.gif"> Hotel Accommodation</div>
	        </div>
	        <div class="highlightscon" style="padding-top: 5px;">
	          <div class="packageinclusionleft"><img align="absmiddle" src="http://img1.yatra.com/images/holiday/themes_icon/sms_icon.gif" alt="root type" title="Room Type"> <?php echo$package['RoomType']['name']?></div>
	        </div>
	        <div style="padding-top:20px;" class="step2_packheading">
	          <div class="descriptionleft">Tour Highlights </div>
	          <div class="themimagesicon"></div>
	        </div>
	        <div class="highlightscon">
	          <ul>
	            <li><img src="http://img1.yatra.com/images/holiday/highlightbullet.gif"> 
					<?php echo Sanitize::clean($package['Package']['short_description'], array('remove_html' => true,'connection' =>
	'default','odd_spaces' => true,'encode' => true,'escape' =>false,'backslash' => true)); ?>
				 </li>
	          </ul>
	          <div style="padding-top:10px;" class="highlightscon">
	            <div style="display:none;" class="datesavalidiv"><span style="display:block;float:left;" id="gtsapnP0">+</span><span style="display:none;float:left;" id="gtsapnN0">-</span>&nbsp;<a href="javascript:showHideGT(0);">Check Depature Dates &amp; Availability </a></div>
	            <div class="morelinkdiv"><a href="review.html?package_id=7282&amp;duration=4&amp;search_id=AE0963A2-E8C2-11E0-9B0C-9E0C3665824C&amp;discount=100&amp;currency=INR" class="morelink">
				<?php echo $this->Html->link('More Details', array('controller' => 'packages', 'action' => 'view', $package['Package']['id']), array('escape' => false));	?>
				</a> <img border="0" align="absmiddle" src="http://img1.yatra.com/images/holiday/more_arrow.gif"></div>
	          </div>
	        </div>
	      </div>
	      <!--Packages incliusion pannel div end here-->
	      <!--booking detail pannel start here-->
	      <div class="bookingpannel">
	        
	        <div class="discountoffer" style="padding-top: 5px;"> 
			<?php echo $this->Html->image($this->webroot."img/button-start-active.png", array('alt' => 'More Info','url' => array('controller' => 'packages', 'action' => 'view', $package['Package']['id'])))?>
			</div>
	        </div>
	    </div>
	  </div>
	  <span style="display:none;" id="grouptour0">
	  <div class="resultfoundheading">
	    <div style="width: 668px; padding-top: 2px;">
	      <div class="commonleftpannel partner_curve1"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      <div class="tourbottombg" style="width: 658px;"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      <div class="commonrightpannel partner_curve2"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	    </div>
	    <div class="packagesinfocon">
	      <div class="packagesinfotopcon">
	        <div class="availabilityleft"><strong>Availability</strong></div>
	        <div class="tripleft"><strong>Trip Date</strong></div>
	        <div class="priceleft"><strong>Price</strong></div>
	      </div>
	    </div>
	    <div style="width: 668px;">
	      <div class="commonleftpannel partner_curve3"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      <div class="tourbottombg" style="width: 658px;"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	      <div class="commonrightpannel partner_curve4"><img src="http://img1.yatra.com/images/holiday/spacer.gif" alt="" title=""></div>
	    </div>
	    _GROUP_TOUR_ </div>
	  </span></div>
					
					<?php  endforeach; ?>
		
		</div>
	</div>
    
    <div style="clear: both; padding-top: 20px;">
			<p>
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