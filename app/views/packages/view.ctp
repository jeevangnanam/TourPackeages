<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">
<?php //echo $html->meta('description', 'Tour packages available from Mihin Lanka', array('type' => 'description', 'inline' => false)); ?>
<?php 
	echo $this->Html->script(array(
            'jquery/ui/jquery.ui.core',
	            'jquery/ui/jquery.ui.widget',
	            'jquery/ui/jquery.ui.mouse',
	            'jquery/ui/jquery.ui.slider',
                 'jquery/ui/jquery.ui.tabs',
                 'jquery/ui/jquery.ui.datepicker.js',
      	),array('inline' => false));
        
    /*echo $this->Html->css(array(
        	'jquery.fancybox-1.3.4',
            
        ));*/
?>
<script type="text/javascript" charset="utf-8">
		$(function () {
			var tabContainers = $('div.tabs > div');
			tabContainers.hide().filter(':first').show();
			
			$('div.tabs ul.tabNavigation a').click(function(){
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabs ul.tabNavigation a').removeClass('selected_tab');
				$(this).addClass('selected_tab');
				return false;
			}).filter(':first').click();
		});

		$(function() {
			$( "#tabs" ).tabs();
		});

		function gallery_info(){
			//$('#ph_gallery').click(function() {
				$('#fourth').load('<?php echo $this->webroot;?>packages/gallery/<?php echo $package['Package']['id']?>');
				      
			//});
		}
		function hotel_info(){
			//$('#hotel_info_link').click(function() {
				$('#second').load('<?php echo $this->webroot;?>packages/hotelsInfo/<?php echo $package['Package']['hotel_ids']?>');
				      
			//});
		}
		
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

<div class="grid_8 maxheight4">   
                                	  <?php echo $this->element('package_search'); ?>
                                </div>
        
        <!--<div style="clear:both;"></div>
<div class="left_details_boxs">
              <div class="contactlogo"><img title="" alt="" src="http://img1.yatra.com/images/holiday/phoneicon.jpg"></div>
              <div class="contactno"><strong>Call our experts</strong><div style="font-size:13px; font-weight:bold; color:#656a70;"><table><tbody><tr><td>North &amp; East:</td><td>1860 5000 900</td></tr><tr><td>West:</td><td>1860 5000 018</td></tr><tr><td>South:</td><td>1860 5000 810</td></tr></tbody></table> </div></div>
          </div>
          
          <div style="float:left; width:224px; margin-top:20px;">	<div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxleft.gif"></div><div style="width:204px;" class="optionimgbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxlright.gif"></div></div><div style="border-left:solid 1px #bababa; float:left; border-right:1px solid #bababa; width:202px; background-color:#ffffff;" class="optionmidbgs">	<div>	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-3" class="lfr-portlet-column">	<div class="portlet-boundary portlet-boundary_56_  portlet-journal-content" id="p_p_id_56_INSTANCE_bSXR_">	<a id="p_56_INSTANCE_bSXR"></a>	<div style="" class="portlet-borderless-container">	<div>	<div id="article_14_37373_1.0" class="journal-content-article">
                    
                    	<div class="yt_abouthanding">Life Leisure Holiday
</div><div style="padding:10px 0px 4px 0px;"><table width="100%" cellspacing="1" cellpadding="1" border="0">     <tbody>         <tr><td><img width="92" height="31" src="http://img.yatra.com/image/image_gallery?uuid=8f980b48-913d-4a77-9ca6-9271256daaa9&amp;groupId=14&amp;t=1243928316991" alt=""></td></tr><tr><td>Walk into a Reliance World&nbsp; and book India's finest hotels. <a href="http://www.yatra.com/reliance-worlds.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="93" height="40" src="http://img.yatra.com/image/image_gallery?uuid=aca04786-cfa1-46b0-a4d6-9f285546f6e1&amp;groupId=14&amp;t=1243928331223" alt=""></td></tr><tr><td>Book flights &amp; hotels at the nearest Hughes Net Fusion center. <a href="http://www.yatra.com/hughes-net.html">More...</a></td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="101" height="33" src="http://img.yatra.com/image/image_gallery?uuid=05ee6fee-5bfe-4e4c-85d6-382eb63e23ee&amp;groupId=14&amp;t=1243928311168" alt=""></td></tr><tr><td>Walk in to any&nbsp; Sify iWay and book your flight tickets.</td></tr><tr><td>&nbsp;</td></tr><tr><td><img width="68" height="54" src="http://img.yatra.com/image/image_gallery?uuid=a9000c5a-c90e-4361-b937-2843c692d470&amp;groupId=14&amp;t=1243928339654" alt=""></td></tr><tr><td>Call our travel specialists at 0987 1800 800 (From All Networks)</td></tr></tbody> </table></div></div></div></div></div></div></div></div></div><div style="margin-top:16px; float:left;">	<div class="opt_formcon">	<div class="lfr-column">	<div id="layout-column_column-4" class="lfr-portlet-column empty"></div></div></div></div></div><div class="optiontopimgs">	<div class="optionimgleft"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotleft.gif"></div><div style="width:204px;" class="optionimgbotbg"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/spacer.gif"></div><div class="optionimgright"><img alt="" src="http://video.tv18online.com/general/ytrimg/images/yatra_blue-theme/images/common/dealboxbotright.gif"></div></div></div>-->

	
<div class="packages_view">

	<div id="holidatrightpannel">
    
    <div id='packageTitleAndDetails'>
   			 <?php echo $package['Package']['name'];?> 
            	 <strong style="font-size:14px; color:#2473ab; margin-left:10px;">
			         <?php echo $package['Package']['duration']?> days  tour
             	</strong>
              <div class="subtext"><i>Visiting</i> - 
                  <?php foreach($locations as $location){?>
                  <?php echo $location.",";?>
                  <?php } ?>
              </div>
    
    </div>
    
    <div id="packageImagePriceHolder">
    
        <div id="packageImage">
        		    <div class="w503" style='margin-top: 10px;float:left;'>
						  <?php 
                          $thumbnail = $this->Image->resize('' . $package['Package']['default_map'], 500,150,'', 'class = ""');
                          echo $thumbnail;
                          ?>
                    </div> 
        </div>
    
        <div id="packagePrice">
        			    <div class="pricecontainer w156">
                          <div  class="review_step2priceinfo">
                            <ul>
                              <li style="padding-top:4px" class="step2inclusive">Starting from</li>
                              <li class="step2priceheading">USD :<span id="priceLarge"><?php echo $package['Package']['price']?></span></li>
                              <li class="step2inclusive">All inclusive price per person</li>
                            </ul>
                 
                              <div id="book_now_package" > 
                              <?php echo $this->Html->link('Book Now', array('controller' => 'packages', 'action' => 'book', $package['Package']['id']),array('class'=>'link-2 button-1')); ?> 
                              </div>
                     
                          </div>
                          
                        </div>
                      
                        
        </div>
    </div>
    



  <div class="tabs reviewdeatilpannel " id="tabs"> <span class="re_tabcontainer"> 
    <ul class="tabNavigation re_tabcontainer tabmidcontainer">
      <li class="overview"><a style="width:129px;" href="#first" class="selected_tab">Overview</a></li>
      <li class="hotelinfo"><a style="width:129px;" href="#second" class="" id="hotel_info_link" onclick="hotel_info();">Hotel Info</a></li>
      <li class="photogalary"><a style="width:129px;" href="#fourth" class="" id="ph_gallery" onclick="gallery_info();">Photo Gallery</a> </li>
      <li class="term_cond"><a style="width:129px;" href="#fifth" class="">Terms &amp; Conditions</a></li>
    </ul>
    </span>
    <!-- =========================== Overview ===================================== -->
    <div id="first" style="display: block;">
    <div id="package_description" >
    	<?php echo $package['Package']['description']?>
    </div>
      <!-- tab div end here-->
      <div class="reviewdeatilpannel">
        <div class="re_inclisionright">
          <div class="w161">
            
            <div class="inclusionheading">Package Inclusions</div>
            
          </div>
          <div class="inclusion_container">
            <ul>
              <li><img align="absmiddle" src="http://img1.yatra.com/images/holiday/IBF.gif"> <?php echo $package['MealPlan']['name']?></li>
              <li><img align="absmiddle" src="http://img1.yatra.com/images/holiday/ACO.gif"> Hotel Accommodation</li>
              <li><img align="absmiddle" src="http://img1.yatra.com/images/holiday/themes_icon/sms_icon.gif"> <?php echo $package['RoomType']['name']?></li>
              <li><img align="absmiddle" src="http://img1.yatra.com/images/holiday/themes_icon/fam_icon.gif" width="20px" height="20px"> Maximum <?php echo $package['Package']['max_people']?> People</li>
            </ul>
          </div>
        
        </div>
      </div>
    </div>
    <!-- =========================== Hotel Info =====================================-->
    <div id="second" style="display: none; margin-top: 60px; background:#EFEFEF; border-radius:5px;"> Loading Hotels Info... </div>
    <!-- =========================== Inclusions =====================================-->
    <div id="third" style="display: none; margin-top: 20px;">  </div>
    <!-- =========================== Photo Galary =====================================-->
    <div id="fourth" style="display: none; margin-top: 20px;"> Loading Gallery... </div>
    <!-- =========================== Terms & conditions =====================================-->
    <div id="fifth" style="display: none; margin-top: 60px; background:#EFEFEF; border-radius:5px;"> <?php echo $package['Package']['terms']?></div>
  </div>
</div>
	
</div>

</div>
</div>
</div>
</div>
</div>