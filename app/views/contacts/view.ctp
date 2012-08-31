<style>
.submit{
	display:none;
}
</style>
 <script>
  $(document).ready(function(){
    $("#btn").click(
	function(){
		var check=0;
		$('#err_name').html("");
		$('#err_email').html("");
		$('#err_tel').html("");
		$("#err_msg").html("");
		if($("#cname").val()=="" || $("#cname").val()=="Name"  ) {
			$('#err_name').html("* Please enter your name");
			check=1;
		}
		if($('#email').val()=="" || $("#email").val()=="E-mail" ) {
			$('#err_email').html("* Please enter email address");
			check=1; 
		}
		else if(!ValidateEmail($('#email').val())){
			$('#err_email').html("Enter an invalid email !");
			check=1;
		}	
			
		if($("#tel").val()=="" || $("#tel").val()=="Phone" ){		
			$('#err_tel').html("* Please enter your phone no");
			check=1;
		}
		if($("#message").val()=="" || $("#message").val()=="Message" ){		
			$("#err_msg").html("* Enter your message");
			check=1;
		}
		if(check!=1){
			$("#contact-form").submit();
		}		
	}
	);
  });
  
 	function clickclear(thisfield, defaulttext) {
		if (thisfield.value == defaulttext) {
		thisfield.value = "";
		}
	}
	
	function ValidateEmail(mail) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
			return true;
		}
		else{	
			return false;
		}
}
	
	
	
  </script>
<div class="paddingb68">
<div class="background">
<div class="container_24  ">
                        <div class="col-padding">
                            <div class="wrapper">
                                <div class="grid_8">
                                	<h3>Our Address</h3>
                                        <div class="map">
                                           <figure>
                                             <iframe width="297" height="249" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                                           </figure>
                                        </div> 
                                        <div class="addresses">
                                        	<dl>
                                                <dt class="color-2 upper">8901 Marmora Road,<br>Glasgow, D04 89GR.</dt>
                                                <table>
                                                <tr height="20px"><td width="30%">Telephone</td><td>+94 112 714 851</td></tr>
                                                <tr height="20px"><td>FAX</td><td>+94 112 714 851</td></tr>
                                                <tr height="20px"><td>E-mail</td><td>ayesha@lifeleisureholidays.com</td></tr>
                                                <tr height="20px"><td>Web</td><td>www.lifeleisureholidays.com</td></tr>
                                                </table>
                                         
											</dl>
                                        </div> 
                                </div>
                                <div class="border paddingb14 grid_15 prefix_1">
                                        <h3 class="indent-bot">Contact Us</h3>
                                        <?php echo $this->Form->create("Contact",array('id'=>'contact-form','class'=>'cmxform','name'=>'frm1'),array('controller'=>'contacts','action'=>'view')) ?>
                             
                                        <fieldset>
                                            <label class="name">
                                            <div id="err_name"></div>
											<?php  echo $this->Form->input('name', array('id'=>'cname','name'=>'name','value'=>'Name','label'=>'','onclick'=>"clickclear(this, 'Name')"));?>
                                            </label>
                                            <label class="email">
                                            <div id="err_email"></div>
                                            <?php  echo $this->Form->input('email', array('id'=>'email','name'=>'email','value'=>'E-mail','label'=>'','onclick'=>"clickclear(this, 'E-mail')"));?>  
                                            </label>
                                            <label class="phone">
                                            <div id="err_tel"></div>
                                            <?php  echo $this->Form->input('tel', array('id'=>'tel','name'=>'tel','value'=>'Phone','label'=>'','onclick'=>"clickclear(this, 'Phone')"));?>    
                                            </label>
                                            <label class="message2">
                                            <div id="err_msg"></div>
											<?php echo $this->Form->textarea('message',array('id'=>'message','name'=>'message','value'=>'Message','label'=>'','onclick'=>"clickclear(this, 'Message')"))?>
                                            </label>
                                            <div class="clear"></div>
                                            <div><?php 
												echo $rechapcha;
													 echo @$message ?>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="buttons">
                                            <div class="button-1" id ="btn" data-type="submit">Submit</a>
                                            </div>	
                                       										
                                                                            
                                      </fieldset>  
                                                	         
									 <?php echo $this->Form->end(__('Save', true));?>
                      
	
                                 </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
              