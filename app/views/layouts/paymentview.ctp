<?php
/**
 * Default Theme for Croogo CMS
 *
 * @author Fahad Ibnay Heylaal <contact@fahad19.com>
 * @link http://www.croogo.org
 */
?>

<?php echo $this->Facebook->html(); ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if IE 9]> <?php echo $this->Html->css(array('iestyle.css'));?><![endif]-->
    <title>  <?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
    <?php
        //echo $this->Layout->meta();
       // echo $this->Layout->feed();
        echo $this->Html->css(array(
            'reset','packages',
        	'style','grid','prettyPhoto','jqtransform',
            'themes/base/jquery.ui.all','jquery-ui.css',
	    	'themes/demos','ie6style.css',
        ));
        echo $this->Layout->js();
        echo $this->Html->script(array(
            'jquery/jquery.min',
            'jquery/jquery.hoverIntent.minified',
            'jquery/supersubs',
        	'jquery/thickbox-compressed',
        	'jquery.autocomplete.min',
            'theme','superfish','jquery.easing.1.3','tms-0.3','tms_presets','jquery.prettyPhoto','easyTooltip',
            'jquery.jqtransform','jquery-latest',
			'accodian/jquery-ui.min',
        ));
        echo $scripts_for_layout;
    ?>

	<!--[if lt IE 7]>
        <div style=' clear: both; text-align:center; position: relative; z-index:2;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"  alt="" /></a>
        </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
    <style>
 #dashboard {
  
    float: right;
}
    </style>
    <script type="text/javascript" charset="utf-8">
		$(document).ready(function() { 
			$('ul.menu').superfish({ 
				delay:       800,                            // one second delay on mouseout 
				animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
				speed:       'normal',                          // faster animation speed 
				autoArrows:  false,                           // disable generation of arrow mark-up 
				dropShadows: false                            // disable drop shadows 
			}); 
				$('.list li a, .list-5 li a').hover(function(){th=$(this).find('span'); th.stop().animate({textIndent:'5px'},250) },
										function(){th.stop().animate({textIndent:'0px'},250)});
			
			$(".lightbox-image").append("<span></span>");
	
			$('.lightbox-image')
				.live('mouseenter',function(){
					$(this).find("span").stop()
					.animate({top:'55px'},{duration:'300', easing:'easeOutQuart'});
				})
				.live('mouseleave',function(){
					$(this).find("span").stop()
					.animate({top:'-60px'},{duration:'300', easing:'easeOutQuart'});
			});
			$(".tblorder tr:odd").css("background-color", "#E6E6E6");
		}); 
		
		(function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((	maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
		$(window).load(function(){
			if($(".maxheight").length){
			$(".maxheight").equalHeights();}
			if($(".maxheight1").length){
			$(".maxheight1").equalHeights();}
			if($(".maxheight2").length){
			$(".maxheight2").equalHeights();}
			if($(".maxheight3").length){
			$(".maxheight3").equalHeights();}
			if($(".maxheight4").length){
			$(".maxheight4").equalHeights();}
			if($(".maxheight5").length){
			$(".maxheight5").equalHeights();}
		});
		
		if($.browser.mozilla||$.browser.opera)
			(function(){
			window.addEventListener('pageshow', PageShowHandler, false);
			window.addEventListener('unload', UnloadHandler, false);
				function PageShowHandler() {
						window.addEventListener('unload', UnloadHandler, false);
				}
				function UnloadHandler() {
						window.removeEventListener('beforeunload', UnloadHandler, false);
				}
		})();
		(function() {
			//$("table tr:nth-child(odd)").not('.tblorder').addClass("striped");
			
			} );
	</script>
<link rel="stylesheet" type="text/css" href="styles/ie6style.css" />
</head>
<body id="page1">

<div class="main">

        <header>
        <div id='dashboard'>You are logging as <?php echo $this->Session->Read('Auth.User.name');  echo ' <span>|</span> '; echo $this->Html->link(__("Log out", true), array('plugin' => 0, 'controller' => 'users', 'action' => 'logout')); ?>  </div>
        	<div class="header-padding">
            
                            	<div style="float:right; margin-top:-40px; height:24px !important; overflow:hidden;"><?php echo $facebook->login(array('perms' => 'email,publish_stream')); ?></div>
                <div class="main">
                    <div class="paddingb14">
                        <div class="header-bg">
                                    <nav>
                                        <?php echo $this->Layout->menu('main', array('dropdown' => true)); ?>
                                    </nav>
                                    </br><h1><a class="logo" href="/">logo</a><span><font color="#666666">Life Leisure<br />Holiday</font></span></h1>
                                    <div class="clear"></div>                               
                            </div>
                        </div>
                        
                </div>
            </div>
        </header>

        

                <section id="content">
                       <div id="main" class="container_16">
                            <div id="content" class="grid_11">
                            <?php
                                $this->Layout->sessionFlash();
                                echo $content_for_layout;
                            ?>
                            </div>
                
                            <!--<div id="sidebar" class="grid_5">
                            <?php echo $this->Layout->blocks('right'); ?>
                            </div>-->
                
                
                        </div>
                </section>
    
	<!--==============================footer=================================-->
    
    <div class="clear"></div>
            <footer>
            <div class="background">
            	<div class="footer-padding">
                    
                        <div class="wrapper">
                            <!--<span class="mail fright">E-mail: <a href="#">info@demolink.org</a></span>-->
                            <span class="footer_link fleft">Loops &copy; 2011 <a href="#"> Privacy policy</a></span>
                        <span class="footer_link fleft"><div class="loopssolutions"><a href="http://www.loooops.com" target="_blank" title="Loops solutions - , Social media marketing, Online marketing"><img src="http://logos.loooops.com/loooops/powered/small/loops_power_small.png" alt="Social media marketing, Online marketing" title="Loops solutions - , Social media marketing, Online marketing" border="0" /></a></div></span>
    
                        </div>
                   
                </div>
               </div>
            </footer>


    
</div>
	
</body>
<?php  echo $this->Facebook->init(); ?>
</html>
