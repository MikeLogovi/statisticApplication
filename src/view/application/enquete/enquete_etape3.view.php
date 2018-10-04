<?php
    if(empty($_SESSION['enquete']['etape2'])){
      header('Location:creer_etape1');
    }
   unset($_SESSION['enquete']['etape2_start']);
    $dataAdministrator = $administratorManager->getList();

    $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipale();
    $e=1;
    $adminsId=explode(' ',$_SESSION['enquete']['administrateurs']);

    $nb=0;
    array_pop($adminsId);
    foreach($adminsId as $admin) {
      $nb++;
    }



    $col=$nb>4?2:1;
     $nbRow=ceil($nb-1/8);
 ?>
      <!-- partial -->

                    <p class="card-description text-danger">
                      Etape 3 : Gestion des etapes de l'enquete
                    </p>
               <form class='form-sample' method='POST' action='enqueteTreatment'>
                <?php while($etapePrincipale = $dataEtapePrincipale->fetch(PDO::FETCH_OBJ)):
                     $adminsId=explode(' ',$_SESSION['enquete']['administrateurs']);
                     array_pop($adminsId);
                  ?>
                      <p class="card-description text-warning" style='font-weight: bold'>
                          Phase <?=$e;?> :<?=$etapePrincipale->nom;?>
                      </p>
                       <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-info" for='enqueteNom'>         Temps nécessaire
                                            </label>
                                            <div class="col-sm-9">
                                                  <select class="form-control" name='tempsNecessaire[]' id='enqueteChefId'>
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
                                                      <input type="checkbox" name='administrating<?=$e;?>[]' class="form-check-input" value='<?=$administrator->id;?>'> <?=$administrator->userName.'&nbsp; &nbsp;&nbsp;'.$administrator->userFirstName;?>
                                                    </label>
                                                  </div>
                                              </div>
                                            <?php endif?>

                                         <?php array_shift($adminsId); ?>
                                  <?php endwhile;?>

                                 </div>
                               <?php endfor?>
                      </div>
             <?php endfor?>
             <?php $e++;?>
             <?php if($e<=7):?>
                <hr/>
              <?php endif;?>
           <?php endwhile?>
                     <button type="submit" class="btn btn-warning mr-2">Suivant</button>
                  </form>

