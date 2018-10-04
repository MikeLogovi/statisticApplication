<?php
  if(empty($_SESSION['enquete']['etapeIntermediaire'])){
       header('Location:creer_etape1.view.php');
     }
    $dataAdministrator = $administratorManager->getList();
    $adminsId=explode(' ',$_SESSION['enquete']['administrateurs']);
    $nb=0;
    array_pop($adminsId);
    foreach($adminsId as $admin) {
      $nb++;
    }
    $col=$nb>4?2:1;
    $nbRow=ceil($nb-1/8);
    $etapeIntermediaireNumber=$_SESSION['enquete']['nombreEtapeIntermediare'];
 ?>
      <!-- partial -->

                    <p class="card-description text-danger">
                      Etape 4: Ajout d'etapes supplémentaires
                    </p>
               <form class='form-sample' method='POST' action='enqueteTreatment'>
                <?php for($nbEtapeSup=1;$nbEtapeSup<=$etapeIntermediaireNumber;$nbEtapeSup++):
                     $adminsId=explode(' ',$_SESSION['enquete']['administrateurs']);
                     array_pop($adminsId);
                  ?>
                       <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-info" for='enqueteNom'>  Nom de l'étape
                                            </label>
                                            <div class="col-sm-9">
                                                  <input type="text" class="form-control" name='etapeIntermediaireNom[]' id='etapeIntermediaireNom'/>
                                            </div>
                                      </div>
                                </div>
                       </div>
                       <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-warning" for='enqueteNom'>         Temps nécessaire
                                            </label>
                                            <div class="col-sm-9">
                                                  <select class="form-control" name='tempsNecessaireEtapeIntermediaire[]' id='enqueteChefId'>
                                                    <option value='1'> 1 jour</option>
                                                    <option value='7'> 7 jours</option>
                                                    <option value='14'> 2 semaines</option>
                                                    <option value='30'> 1 mois</option>
                                                    <option value='90'> 3 mois</option>
                                                    <option value='180'> 6 mois</option>
                                                    <option value='360'> 1 an</option>
                                                  </select>
                                            </div>
                                      </div>
                                </div>
                       </div>
                <p class="card-description text-success">
                                      Choix des  acteurs en charge
                                       </p>
                <?php for($i=0;$i<$nbRow;$i++): ?>
                   <div class="row">
                               <?php for($j=0;$j<$col;$j++):?>

                                <div class="col-md-6">
                                  <?php $nb4=0;?>
                                  <?php while(isset($adminsId[0])):?>
                                      <?php
                                         if($nb4==4){
                                            break;
                                         }
                                         else{
                                          $nb4++;
                                         }
                                      ?>

                                      <?php $administrator = $administratorManager->readById((int)($adminsId[0]))->fetch(PDO::FETCH_OBJ)?>
                                          <?php if($_SESSION['enquete']['idChef']!=$administrator->id):?>
                                              <div class="form-group">
                                                  <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                      <input type="checkbox" name='administrateurIntermediaires<?=$nbEtapeSup;?>[]' class="form-check-input" value='<?=$administrator->id;?>'> <?=$administrator->userName.'&nbsp; &nbsp;&nbsp;'.$administrator->userFirstName;?>
                                                    </label>
                                                  </div>
                                              </div>
                                            <?php endif?>

                                         <?php array_shift($adminsId);?>
                                  <?php endwhile;?>

                                 </div>
                               <?php endfor?>
                      </div>
             <?php endfor?>
           <?php endfor?>
                     <button type="submit" class="btn btn-success mr-2">Terminer</button>
                  </form>


