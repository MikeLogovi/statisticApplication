<?php if(isset($_SESSION['notification']['message'])):?>
     <div class="container">
                  	   <div class="row">
                  	   	     <div <?="class='col-xs-12 alert alert-dismissable alert-".$_SESSION['notification']['type']."'";?>>
                                 <button type="button" class="close">×</button>
                  	   	     	  <p><strong><?=$_SESSION['notification']['message'];?></strong></p>

                  	   	     </div>

                  	   </div>
    </div>
<?php $_SESSION['notification']=[]; endif;?>
<script>
$(function (){
     $(".close").click(function() {
          $(".alert").hide("slow");
     });
});
</script>
