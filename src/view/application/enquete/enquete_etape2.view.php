<?php
    $dataAdministrator = $administratorManager->getList();
    $nbRow=ceil($dataAdministrator->rowCount()/8);
    $_SESSION['enquete']['etape2_start']=true;
    if(empty($_SESSION['enquete']['etape1'])){
       header('Location:creer_etape1');
    }
 ?>
      <!-- partial -->

                    <p class="card-description text-danger">
                      Etape 2 : Choix des acteurs secondaires
                    </p>
                  <form class='form-sample' method='POST' action='enqueteTreatment'>
                <?php for($i=0;$i<$nbRow;$i++):?>
                   <div class="row">
                               <?php for($j=0;$j<2;$j++):?>

                                <div class="col-md-6">
                                  <?php $nb4=0;?>
                                  <?php while($administrator = $dataAdministrator->fetch(PDO::FETCH_OBJ)):?>
                                    <?php if($_SESSION['enquete']['idChef']!=$administrator->id):?>
                                       <?php
                                                 if($nb4==4){
                                                   break;
                                                 }
                                                 else{
                                                  $nb4=$nb4+1;
                                                 }

                                        ?>

                                          <div class="form-group">
                                            <div class="form-check form-check-flat">
                                              <label class="form-check-label">
                                                <input type="checkbox" name='administrateurs[]' class="form-check-input" value='<?=$administrator->id;?>'> <?=$administrator->userName.'&nbsp; &nbsp;&nbsp;'.$administrator->userFirstName;?>
                                              </label>
                                            </div>
                                        </div>
                                      <?php endif?>
                                    <?php endwhile?>
                                 </div>
                               <?php endfor?>
                      </div>
             <?php endfor?>
                     <button type="submit" class="btn btn-warning mr-2" >Suivant</button>
                  </form>



