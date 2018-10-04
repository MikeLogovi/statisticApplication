<?php
    require('src/view/partials/dashboard_initialize.php');
?>
   <div class="main-panel">
        <div class="content-wrapper">
              <div class='row'>
                   <div class='col-xs-12'>
                         <?php require('src/view/partials/errors_form.php');?>
                   </div>
              </div>
               <div class='row'>
                   <div class='col-xs-12'>
                        <?php require('src/view/partials/flash.php');?>
                   </div>
              </div>

              <?php require('src/view/partials/dashboard_global_stats.php');?>
              <div class="row">
               <?php
                      $tabEvolution=[];$tabTemps=[];$nbEnquete=0;$tabIdEnquete=[];
                      while($enquete = $dataEnquete->fetch(PDO::FETCH_OBJ)):
               ?>
                     <?php require('src/view/partials/enquete_performance.php');?>
               <?php endwhile;?>
               <?php require('src/view/partials/enquete_find_performance.php');?>
               <?php require('src/view/partials/dashboard_performance.php');?>
               <?php require('src/view/partials/dashboard_view_enquete.php');?>
               <?php require('src/view/partials/dashboard_view_employe.php');?>
        </div>
  </div>
