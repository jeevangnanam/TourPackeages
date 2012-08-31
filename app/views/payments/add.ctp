<style>
#page1{
	   margin: 20px 100px 100px;
	}
#msg {
    background: none repeat scroll 0 0 #FFF ;
    border: 1px solid #D1D1D1;
    border-radius: 4px 4px 4px 4px;
    color: #000000;
    font-size: 16px;
    margin: 70px 0px 30px 150px;
    padding: 5px;
    text-align: center;
	width:600px;
	height:200px;
	padding-top:60px;
	
	
}

</style>
<script>
    $(document).ready(function() {
    $("#newform").submit();

    $('#PaymentAddForm').ketchup();
    });
    </script>
    <div class="payments form"></div>
  
<?php  echo $content; ?>

