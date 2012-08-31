<?php 

//debug($packages);
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
/*$(document).ready(function(){
	$("#panel").slideToggle("slow");
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});*/
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
          <h2>
            <?php __($cat_name['PackageCategory']['name']);?>
          </h2>
          <div class="grid_8 maxheight4">
          
          
          
 <?php echo $this->element('package_search'); ?>
            
            
            
            
            
          </div>
          
          <!-- <div style="clear:both;"></div>
          <div class="left_details_boxs">
              <div class="contactlogo"><img title="" alt="" src="http://img1.yatra.com/images/holiday/phoneicon.jpg"></div>
              <div class="contactno"><strong>Call our experts</strong><div style="font-size:13px; font-weight:bold; color:#656a70;"><table><tbody><tr><td>North &amp; East:</td><td>1860 5000 900</td></tr><tr><td>West:</td><td>1860 5000 018</td></tr><tr><td>South:</td><td>1860 5000 810</td></tr></tbody></table> </div></div>
          </div>
          
          <div style="float:left; width:224px; margin-top:20px;">	<div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxleft.gif"></div><div style="width:204px;" class="optionimgbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxlright.gif"></div></div><div style="border-left:solid 1px #bababa; float:left; border-right:1px solid #bababa; width:202px; background-color:#ffffff;" class="optionmidbgs">	<div>	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-3" class="lfr-portlet-column">	<div class="portlet-boundary portlet-boundary_56_  portlet-journal-content" id="p_p_id_56_INSTANCE_bSXR_">	<a id="p_56_INSTANCE_bSXR"></a>	<div style="" class="portlet-borderless-container">	<div>	<div id="article_14_37373_1.0" class="journal-content-article">
                    
                    	<div class="yt_abouthanding">Life Leisure Holiday</div><div style="padding:10px 0px 4px 0px;"><table width="100%" cellspacing="1" cellpadding="1" border="0">     <tbody>         <tr><td><img width="92" height="31" src="http://img.yatra.com/image/image_gallery?uuid=8f980b48-913d-4a77-9ca6-9271256daaa9&amp;groupId=14&amp;t=1243928316991" alt=""></td></tr><tr><td>Walk into a Reliance World&nbsp; and book India's finest hotels. <a href="http://www.yatra.com/reliance-worlds.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="93" height="40" src="http://img.yatra.com/image/image_gallery?uuid=aca04786-cfa1-46b0-a4d6-9f285546f6e1&amp;groupId=14&amp;t=1243928331223" alt=""></td></tr><tr><td>Book flights &amp; hotels at the nearest Hughes Net Fusion center. <a href="http://www.yatra.com/hughes-net.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="101" height="33" src="http://img.yatra.com/image/image_gallery?uuid=05ee6fee-5bfe-4e4c-85d6-382eb63e23ee&amp;groupId=14&amp;t=1243928311168" alt=""></td></tr><tr><td>Walk in to any&nbsp; Sify iWay and book your flight tickets.</td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="68" height="54" src="http://img.yatra.com/image/image_gallery?uuid=a9000c5a-c90e-4361-b937-2843c692d470&amp;groupId=14&amp;t=1243928339654" alt=""></td></tr><tr><td>Call our travel specialists at 0987 1800 800 (From All Networks)</td></tr></tbody> </table></div></div></div></div></div></div></div></div></div><div style="margin-top:16px; float:left;">	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-4" class="lfr-portlet-column empty"></div></div></div></div></div><div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotleft.gif"></div><div style="width:204px;" class="optionimgbotbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotright.gif"></div></div></div>--> 
          
          <!-- <p class="slide"><a href="#" class="btn-slide">Search Packages</a></p>-->
          
          <div id="packages_only" class="" style="float: right; width: 655px; padding-left:10px;">
            <div class="border paddingb14 grid_15 prefix_1 maxheight4">
              <h3 class="indent-bot">Packages</h3>
              <div class="column-indent">
                <div style="clear: both; padding-top: 20px;">
                  <p class="paging_p">
                    <?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>
                  </p>
                  <div class="paging">
                    <?php //$paginator->options(array('url' => $this->params['url']['city']."&q=".$this->params['named']['q'])); 
			echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                    | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?> </div>
                </div>
                <?php
	$i = 0;
	
	foreach ($packages as $key => $package):
	?>
                <div class="smallbox h4-indent paddingb23">
                  <div class="wrapper ">
                    <figure class="fleft img-indent" style="margin-left:10px;">
                      <?php $thumbnail = $this->Html->link($this->Image->resize('' . $package['Package']['default_map'], 190,123,'', 'class = "rounded"'), array('controller' => 'packages', 'action' => 'view', $package['Package']['id']), array('escape' => false));
	
					echo $thumbnail; ?>
                    
                    <div class="rating" style="min-height:30px; width:170px !important;">
                    	<span class="numb">&euro;<?php echo $package['Package']['price']?></span>
                    	<span class="title"> Price</span>
                    	
                        <span class="numb"><?php echo $package['Package']['max_people']?></span>
                        <span class="title"> Max-People</span>
                    </div>
                    <div class="rating" style="min-height:30px; width:170px !important;">	
                        <span class="numb"><?php echo $package['Package']['duration'];?> (days)</span>
                        <span class="title"> Location(s)</span>
                        <script type="text/javascript">
						$(document).ready(function(){
							$('#location_loader_<?php echo $package["Package"]["id"]?>').load('<?php echo $this->webroot;?>packages/loadLocations/<?php echo $package["Package"]["location_ids"]?>');
						});
						</script>
	              		<span id="location_loader_<?php echo $package['Package']['id']?>" class="title">Loading...</span>
                    </div>
                    
                    
                    </figure>
                    <div class="info extra-wrap"> <strong class="heading"><?php echo $package['Package']['name'];?> <?php echo $package['Package']['duration']?> tour </strong><span class="heading" style="color:#F90; font-size:10px;">Valid Till: <?php echo date('F j, Y',strtotime($package['PackageAvailability'][0]['end_date']));?></span> <span class="block"><?php echo Sanitize::clean($package['Package']['short_description'], array('remove_html' => true,'connection' =>
	'default','odd_spaces' => true,'encode' => true,'escape' =>false,'backslash' => true)); ?></span>
                      <div class="wrapper">  </div>
                      </div>
                  </div>
                </div>
                <?php endforeach; ?>
                <div style="clear: both; padding-top: 20px;">
                  <p class='paging_p'>
                    <?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>
                  </p>
                  <div class="paging">
                    <?php //$paginator->options(array('url' => $this->params['url']['city']."&q=".$this->params['named']['q'])); 
			echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                    | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?> </div>
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
