<?php

     if(empty($_SESSION['enquete']['readyWithoutIntermediaire'])  AND empty($_SESSION['enquete']['readyWithIntermediaire'])){
    header('Location:creer_etape1');
  }
?>


                    <p class="card-description text-danger">
                      Enquete créée
                    </p>


                    <h3 class="card-description text-primary">Votre enquete a été créée avec succès!</h3>
                      <br/>
                      <a href='application' class="btn btn-success mr-2"> OK</a>

