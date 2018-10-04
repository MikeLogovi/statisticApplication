
    <?php
                                     require('src/view/partials/enquete_important_variables.php');
                                      $tempsTotal=0;

                                      while($etapePrincipale=$etapePrincipaleData->fetch(PDO::FETCH_OBJ)){
                                          if($etapePrincipale->evolution=="terminé"){
                                              $nbEtapeTermine++;
                                          }
                                          $tempsTotal+=$etapePrincipale->tempsMaximum;

                                      }
                                      if($etapeIntermediaireData->rowCount()!=0){
                                          while($etapeIntermediaire=$etapeIntermediaireData->fetch(PDO::FETCH_OBJ)){
                                              if($etapeIntermediaire->evolution=="terminé"){
                                                  $nbEtapeTermine++;
                                              }
                                             $tempsTotal+=$etapeIntermediaire->tempsMaximum;
                                          }
                                      }
                                      $evolutionPourcentage=($nbEtapeTermine/$nbTotalEtape)*100;
                                      $tempsTotal*=24*3600;




