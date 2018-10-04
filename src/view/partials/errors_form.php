            <?php if(isset($_SESSION['errors'])){ ?>


                  	   <div class="row">
                  	   	     <div class="col-xs-12  alert alert-danger alert-dismissable">
                                     <button type="button" class="close">×</button>
                                    <?php
                                     foreach($_SESSION['errors'] as $errors =>$error){
                                     	echo '<p>'.$error.'</p>';
                                     }
                  	   	     	?>

                  	   	     </div>

                  	   </div>

             <?php } unset($_SESSION['errors']);?>
<script>
$(function (){
     $(".close").click(function() {
          $(".alert").hide("slow");
     });
});
</script>
