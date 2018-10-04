 <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php if($dataEnquete->rowCount()==0):?>
                          <h4 class="card-title">Auncune enquete en cours</h4>
                  <?php else: ?>

                  <h4 class="card-title">Enquetes en cours</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                           Nom
                          </th>
                          <th>
                            Progression
                          </th>
                          <th>
                           Cout
                          </th>
                          <th>
                            Responsable
                          </th>
                          <th>
                            Date limite de l'enquete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $dataEnquete=$enqueteManager->getList();?>
                        <?php while($enquete = $dataEnquete->fetch(PDO::FETCH_OBJ)):?>

                              <tr>
                                <td class="font-weight-medium">
                                  <?=$e++;?>
                                </td>
                                <td>
                                 <?=$enquete->nom;?>
                                </td>
                                <td>

                                      <?php require('src/view/partials/enquete_time_progression.php');?>

                                  <div class="progress">
                                    <?php if($evolutionPourcentage<=25):?>
                                          <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: <?=$evolutionPourcentage;?>%" aria-valuenow="<?=$evolutionPourcentage;?>" aria-valuemin="0"
                                            aria-valuemax="100">

                                          </div>
                                            <?php if($enquete->evolution=="echec"):?>
                                               <div class='text-danger'>
                                                    ECHEC
                                               </div>
                                            <?php endif;?>
                                    <?php endif;?>

                                     <?php if($evolutionPourcentage>25 AND $evolutionPourcentage<=50):?>
                                          <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: <?=$evolutionPourcentage;?>%" aria-valuenow="<?=$evolutionPourcentage;?>" aria-valuemin="0"
                                            aria-valuemax="100">

                                            </div>
                                            <?php if($enquete->evolution=="echec"):?>
                                               <div class='text-danger'>
                                                    ECHEC
                                               </div>
                                            <?php endif;?>
                                    <?php endif;?>

                                     <?php if($evolutionPourcentage>50 AND $evolutionPourcentage<=75):?>
                                          <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: <?=$evolutionPourcentage;?>%" aria-valuenow="<?=$evolutionPourcentage;?>" aria-valuemin="0"
                                            aria-valuemax="100">

                                            </div>
                                            <?php if($enquete->evolution=="echec"):?>
                                               <div class='text-danger'>
                                                    ECHEC
                                               </div>
                                            <?php endif;?>
                                    <?php endif;?>

                                     <?php if($evolutionPourcentage>75 AND $evolutionPourcentage<100):?>
                                          <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: <?=$evolutionPourcentage;?>%" aria-valuenow="<?=$evolutionPourcentage;?>" aria-valuemin="0"
                                            aria-valuemax="100">

                                            </div>
                                            <?php if($enquete->evolution=="echec"):?>
                                               <div class='text-danger'>
                                                    ECHEC
                                               </div>
                                            <?php endif;?>
                                    <?php endif;?>
                                     <?php if($evolutionPourcentage==100):?>
                                          <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: <?=$evolutionPourcentage;?>%" aria-valuenow="<?=$evolutionPourcentage;?>" aria-valuemin="0"
                                            aria-valuemax="100">

                                            </div>
                                            <?php if($enquete->evolution=="echec"):?>
                                               <div class='text-danger'>
                                                    ECHEC
                                               </div>
                                            <?php endif;?>
                                    <?php endif;?>
                                  </div>
                                </td>
                                <td>
                                  <?=$enquete->revenue;?> $
                                </td>
                                <?php
               $chef=$administratorManager->readById($enquete->idAdministrateurEnChef)->fetch(PDO::FETCH_OBJ);
                                ?>
                                <td class="text-default"><?=$chef->userName.' '.$chef->userFirstName;?></td>

                                <?php
                                    $dateCreationEnquete=$enqueteManager->getDateCreationFormat($enquete->id)->fetch(PDO::FETCH_OBJ)->dateDebut;
                                    $dat=explode('/',$dateCreationEnquete);
                                    $datTimestamps=mktime((int)$dat[0],(int)$dat[1],(int)$dat[2],(int)$dat[3],(int)$dat[4],(int)$dat[5])+$tempsTotal;
                                    $dateLimite=date('d M Y',$datTimestamps);
                                    $datActuel=date('H/i/s/M/d/Y');
                                    $datActuelTab=explode('/',$datActuel);
                                    $dateActuelTimestamps=mktime((int)$datActuelTab[0],(int)$datActuelTab[1],(int)$datActuelTab[2],(int)$datActuelTab[3],(int)$datActuelTab[4],(int)$datActuelTab[5]);
                                    if($dateActuelTimestamps>$datTimestamps){
                                      $enqueteManager->giveUp($enquete->id);
                                      $_SESSION['errors']['echec'.$enquete->id]="L'enquete ".$enquete->nom." est un echec car il est arrivé à sa date limite";
                                    }
                                ?>
                                <td>
                                  <?=$dateLimite;?>
                                </td>
                              </tr>
                       <?endwhile;?>
                      </tbody>
                    </table>
                  </div>
                <?php endif;?>
                </div>
              </div>
            </div>
          </div>
