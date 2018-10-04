
    <?php
                                      require('src/view/partials/enquete_important_variables.php');
                                      while($etapePrincipale=$etapePrincipaleData->fetch(PDO::FETCH_OBJ)){
                                          if($etapePrincipale->evolution=="terminé"){
                                              $nbEtapeTermine++;
                                          }
                                      }
                                      if($etapeIntermediaireData->rowCount()!=0){
                                          while($etapeIntermediaire=$etapeIntermediaireData->fetch(PDO::FETCH_OBJ)){
                                              if($etapeIntermediaire->evolution=="terminé"){
                                                  $nbEtapeTermine++;
                                              }

                                          }
                                      }
                                      if($nbTotalEtape==$nbEtapeTermine){
                                           $enqueteManager->finEnquete($enquete->id);
                                      }




