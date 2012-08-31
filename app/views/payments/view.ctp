

 <style>

.pending {
    background: none repeat scroll 0 0 #DB95AD;
    border: 1px solid #58051B;
    border-radius: 4px 4px 4px 4px;
    color: #FF0000;
    height: 20px;
    padding-left: 10px;
    width: 85px;
}
.approve{
	background: none repeat scroll 0 0  #B1F1C8;
    border: 1px solid #033;
    border-radius: 4px 4px 4px 4px;
    color: #033;
    height: 20px;
    padding-left: 10px;
    width: 85px;
	}
img{
	vertical-align:middle;}		
	
	#accordion {
	list-style: none;
	padding: 0 0 0 0;

}
#accordion li{
	display: block;
	background-color: #F8F8F8;
	font-weight: bold;
	margin: 1px;
	cursor: pointer;
	padding: 5 5 5 7px;

}
#accordion ul {
	list-style: none;
	padding: 0 0 0 0;
	display: none;
}
#accordion ul li{
	font-weight: normal;
	cursor: auto;
	background-color:#F8F8F8;
	padding: 0 0 0 7px;

}
.headingacc{
	background:#D3D3D3;
	padding: 24px 0 24px 42px;;
	color:#FFF;
	float:left;
	width:99%;
	height:30px;
	padding: 0 5 0 7px;
	}
.descriptions{
	padding:40px;
	background: #D3D3D3;
		}
.details{
    float: left;
	width:200px;
    
	 }
a{
	text-decoration:none;
	}
.pending {
    background: none repeat scroll 0 0 #FFFF66;
    border-radius: 4px 4px 4px 4px;
    color: #000000;
    float: left;
    height: 20px;
    margin-left: 200px;
    padding: 5px 0 5px 5px;
    width: 65px
	
}
.approved{
	float: left;
    margin-left: 200px;
    padding: 5px 0 5px 5px;
	width:80px;
	height: 20px;
	background:#66CC99;
	color:#003300;
	border:#003300 solid 1px;
	border-radius:4px;
		}	
		
.complete{
	float: left;
    margin-left: 200px;
    padding: 5px 0 5px 5px;
	width:85px;
	height:20px;
	background: #71A8EC;
	color: #006;
	border:#006 solid 1px;
	border-radius:4px;
		}	
.button_status{
	padding-top:25px;

	}						
.email{
	
    margin-left: 400px;
    padding: 12px 20px 20px;
	}			
#cover{
	
	background:#F8F8F8;
	height:auto;
	margin-bottom:12px;
	padding-bottom:15px;
	}
	 		

 </style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>		
 <script>

 $(document).ready(function()	{  
$("#accordion > li").click(function(){
	 $("#accordion > li div img").attr('src',"/img/icons/go.png");
var cls= $(this).attr('class') ;
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
		$("#"+cls).attr('src',"/img/icons/go2.png");	
	}

	$(this).next().slideToggle(300);
	

});


//$('#accordion > ul:eq(0)').show();	
  });


 </script> 
   <?php  //debug( $payments );
  // debug($payments_total);
   ?>
 <div id="cover">
<div class="headingacc"> <div style="float:left; width:25%">Purcharse Id</div><div style="float:left;width:35%">Packege Name</div> <div style="float:left;width:35%">Status</div></div></br>
<ul id="accordion">
	  <?php $i=1;foreach ($payments as $key=>$u_payments) : ?>
      <li style=" height:25px" class='check_<?php echo $i; ?>'><div style="float:left;width:25%" id="list"><?php echo $payments[$key]['Payment']['id'] ?></div><div style="float:left;width:35%;">&nbsp;<?php echo $payments[$key]['Package']['name']; ?></div> <div style="float:left;width:20%"><?php echo  $payments[$key]['Payment']['status'];?></div><div style="float:left;"><?php echo $this->Html->image('icons/go.png', array('id' => 'check_'.$i)); ?></div></li>
    <ul> <h1 style="padding:10px 0 0 40px;">Payments descriptions </h1>
		<div class='descriptions'>
                                
       							<!--<li> <div class='details'>user  Id</div> <?php  echo $payments[$key]['User']['id'] ?></li>-->
                                 <li> <div class='details'> Payment Id</div> <?php  echo $payments[$key]['Payment']['id'] ?></li>
                                 <li> <div class='details'> Purcharse Date</div> <?php  echo $payments[$key]['Purchases']['date'] ?></li>
                                 <li> <div class='details'> Package name </div><?php  echo $payments[$key]['Package']['name'] ?></li>
                                 <li> <div class='details'> Package Price </div><?php  echo $payments[$key]['Package']['price'] ?></li>
                                 <li> <div class='details'> Package total price </div><?php  echo $payments[$key]['Payment']['total_amount'] ?></li>
                                 <li> <div class='details'> Status </div><?php  echo $payments[$key]['Payment']['status'] ?></li>
                 
          <div class='button_status'>
           <?php  
		     if($payments[$key]['Payment']['status']=='NOT APPROVED'){
			   echo '<div class ="pending" title="Buy again">' . $this->Html->link('PENDING', array('controller'=>'packages','action' => 'book' ,$payments[$key]['Package']['id'].'/step:3/1/'.$payments[$key]['Purchases']['id'])).'</div>';
			   
			   }
			elseif($payments[$key]['Payment']['status']=='APPROVED'){
				 echo '<div class ="approved">'.$payments[$key]['Payment']['status'].'</div>';
				}  
			else{
				 echo '<div class ="complete">COMPLATED</div>';
				}	 
		   ?>   
          </div>                
           <div class='email' title="Send a email"><?php echo $html->link($html->image("email.png"), array('controller'=>'payments', 'action' => 'sendemail',$payments[$key]['Payment']['id']), array('escape' => false));?></div>
        
        </div>
   
	</ul>
    <?php $i++ ;endforeach; ?>

</ul>



 <div class="paging" style="margin: 30px 0 5px;">
 
 <p class="paging_p">
 <?php
 echo $this->Paginator->counter(array(
 'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
 ));
 ?> </p>

  <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
  |  <?php echo $this->Paginator->numbers();?>
 |
  <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
 </div>
 
 </div>
 <?php  //echo $this->element('sql_dump'); ?>