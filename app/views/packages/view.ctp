<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">

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
			//	$('#second').load('<?php echo $this->webroot;?>packages/hotelsInfo/<?php echo $package['Package']['hotel_ids']?>');
				      
			//});
		}
		
	jQuery(document).ready(function($) {
		$('#search').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
		

	
	
	
</script>

<div class="grid_8 maxheight4">   
                                	  <?php echo $this->element('package_search'); ?>
                                </div>
        


	
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
                          echo "<img src='/".$package['Package']['default_map']."' />";
                          ?>
                    </div> 
        </div>
    
        <div id="packagePrice">
        			    <div class="pricecontainer w156">
                          <div  class="review_step2priceinfo">
                            <ul>
                              <li style="padding-top:4px" class="step2inclusive">Starting from</li>
                              <li class="step2priceheading">USD :<span id="priceLarge"><?php echo $package['Package']['price']?></span></li>
                              <li class="step2inclusive">All inclusive price per person,twin sharing basis.</li>
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
      <li class="overview"><a style="width:129px;" href="#first" class="selected_tab">Package Inclusions</a></li>
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
        
        <?php /*
          <div class="w161">
            
            <div class="inclusionheading">Package Inclusions</div>
            
          </div>
        
          <div class="inclusion_container">
            <ul>
              <li><img align="absmiddle" src="/img/icons/IBF.gif"> <?php echo $package['MealPlan']['name']?></li>
              <li><img align="absmiddle" src="/img/icons/ACO.gif"> Hotel Accommodation</li>
              <!--<li><img align="absmiddle" src="/img/icons/sms_icon.gif"> <?php echo $package['RoomType']['name']?></li> -->
              <li><img align="absmiddle" src="/img/icons/fam_icon.gif" width="20px" height="20px">  <?php echo $package['Package']['max_people']?> <?php echo ($package['Package']['max_people'] ==1)?'Person':'People';?></li>
            </ul>
          </div>
         */ ?>  
        </div>
      </div>
    </div>
    <!-- =========================== Hotel Info =====================================-->
    <div id="second" style="display: none; margin-top: 60px; background:#EFEFEF; border-radius:5px;"> 
    

    <ul class="list">
                              <li ><b>Colombo</b></li><br />
                              	<ul>
                                   <ol>One</ol>
                                   <ol>Two</ol>
                                   <ol>Three</ol>
                                </ul><br />
                              <li ><b>Kandy</b></li><br />
                              	<ul>
                                   <ol>One</ol>
                                   <ol>Two</ol>
                                   <ol>Three</ol>
                                </ul><br />
                              <li ><b>Arugambe</b></li><br />
                              	<ul>
                                   <ol>One</ol>
                                   <ol>Two</ol>
                                   <ol>Three</ol>
                                </ul><br />
                               <li ><b>Galle</b></li><br />
                                 <ul>
                                   <ol>One</ol>
                                   <ol>Two</ol>
                                   <ol>Three</ol>
                                </ul><br />
                            </ul>
     </div>
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