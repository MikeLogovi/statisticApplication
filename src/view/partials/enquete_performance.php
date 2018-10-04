
    <?php $nbEnquete++;


                                      require('src/view/partials/enquete_important_variables.php');

                                      $tempsTotal=0;
                                      $dateCreationEnquete=$enqueteManager->getDateCreationFormat($enquete->id)->fetch(PDO::FETCH_OBJ)->dateDebut;
                                      $dat=explode('/',$dateCreationEnquete);
                                      $datCreationTimestamps=mktime((int)$dat[0],(int)$dat[1],(int)$dat[2],(int)$dat[3],(int)$dat[4],(int)$dat[5]);


                                      while($etapePrincipale=$etapePrincipaleData->fetch(PDO::FETCH_OBJ)){
                                          if($etapePrincipale->evolution=="terminé"){
                                              $nbEtapeTermine++;
                                              $dateFPFin=$enqueteManager->getEtapePrincipaleDateFinFormat($etapePrincipale->id)->fetch(PDO::FETCH_OBJ)->dateFin;
                                              $datFP=explode('/',$dateFPFin);
                                              $datFPTimestamps=mktime((int)$datFP[0],(int)$datFP[1],(int)$datFP[2],(int)$datFP[3],(int)$datFP[4],(int)$datFP[5]);

                                              $tempsTotal+=($datFPTimestamps-$datCreationTimestamps);
                                          }

                                      }
                                      if($etapeIntermediaireData->rowCount()!=0){
                                          while($etapeIntermediaire=$etapeIntermediaireData->fetch(PDO::FETCH_OBJ)){
                                              if($etapeIntermediaire->evolution=="terminé"){
                                                  $nbEtapeTermine++;
                                                  $dateFIFin=$enqueteManager->getEtapeIntermediaireDateFinFormat($etapeIntermediaire->id)->fetch(PDO::FETCH_OBJ)->dateFin;
                                                  $datFI=explode('/',$dateFIFin);
                                                  $datFITimestamps=mktime((int)$datFI[0],(int)$datFI[1],(int)$datFI[2],(int)$datFI[3],(int)$datFI[4],(int)$datFI[5]);

                                                  $tempsTotal+=($datFITimestamps-$datCreationTimestamps);
                                              }

                                          }
                                      }
                                      $evolutionPourcentage=($nbEtapeTermine/$nbTotalEtape)*100;
                                      $tabEvolution[$nbEnquete]=$evolutionPourcentage;

                                      $tabTemps[$nbEnquete]=$tempsTotal;
                                      $tabIdEnquete[$nbEnquete]=$enquete->id;




