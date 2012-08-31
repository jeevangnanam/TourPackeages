<script>
    $(document).ready(function() {
    $("#newform").submit();

    $('#PaymentAddForm').ketchup();
    });
    </script>
    <div class="payments form">
<?php  //$getresponse = file_get_contents("http://pg.enstage.com/pgcsr/merchant/pgresponse.jsp"); 
                debug($getresponse);
				echo $content; ?>
