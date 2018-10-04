<?php
    if(empty($_SESSION['evolution']['partie1'])){
       header('Location:evolution_partie1');
    }
    $_SESSION['evolution']['partie2_start']=true;
    $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipaleByEnqueteId($_SESSION['evolutionEnquete']['id']);
    $e=1;
    if($enqueteManager->getListeEtapeIntermediaireByEnqueteId($_SESSION['evolutionEnquete']['id'])){
       $dataEtapeIntermediaire=$enqueteManager->getListeEtapeIntermediaireByEnqueteId($_SESSION['evolutionEnquete']['id']);
    }
    $enquete=$enqueteManager->read( $_SESSION['evolutionEnquete']['id'])->fetch(PDO::FETCH_OBJ);
 ?>
      <!-- partial -->

        <p class="card-description text-success">
            Partie 2 : Etat générale de l'enquete <span style='font-weight:bold'><?=ucfirst($enquete->nom);?></span>
        </p>
        <form class='form-sample' method='POST' action='enqueteEvolutionTreatment' enctype='multipart/form-data'>
                <h3 class="card-description text-primary" style='text-decoration: underline'>Les phases principales</h3>
                <?php while($etapePrincipale = $dataEtapePrincipale->fetch(PDO::FETCH_OBJ)):?>
                      <p class="card-description text-warning" style='font-weight: bold'>
                          Phase <?=$e?> : <?=$etapePrincipale->nom;?>
                      </p>
                       <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                          <div class="col-sm-3">
                                                <label class="text-info" for='statut' >statut
                                                </label>
                                          </div>
                                            <?php if($etapePrincipale->evolution=="en cours"):?>
                                                <div class="col-sm-9 text-warning" ><?=$etapePrincipale->evolution;?>
                                                </div>
                                            <?php endif;?>
                                             <?php if($etapePrincipale->evolution=="terminé"):?>
                                                <div class="col-sm-9 text-success" >
                                                       <?=$etapePrincipale->evolution;?>
                                                </div>
                                            <?php endif;?>
                                      </div>
                                </div>
                       </div>
                       <?php if($etapePrincipale->evolution=="en cours"):?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class='"col-sm-3'>
                                        <label class='col-form-label text-info' for='fichierRapportPrincipale<?=$e;?>'> Uploader le fichier de rapport
                                         </label>
                                    </div>
                                    <div class="col-sm-6">
                                                <input class="file-upload-browse btn btn-info" name='fichierRapportPrincipale<?=$e;?>' type="file"/>
                                    </div>

                                </div>
                            </div>
                       <?php endif;?>


                     <?php $e++;?>
                     <?php if($e<=7):?>
                        <hr/>
                      <?php endif;?>
                   <?php endwhile?>
<br/><br/><br/>  <?php if($dataEtapeIntermediaire->rowCount()!=0):?>
                     <h3 class="card-description text-primary" style='text-decoration: underline'>Les phases supplémentaires</h3>
                  <?php endif;?>
                    <?php $e=1;?>
                   <?php while($etapeIntermediaire = $dataEtapeIntermediaire->fetch(PDO::FETCH_OBJ)):?>
                      <p class="card-description text-warning" style='font-weight: bold'>
                          Phase <?=$e?> : <?=$etapeIntermediaire->nom;?>
                      </p>
                       <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-info" for='enqueteNom' >       Statut
                                            </label>
                                            <?php if($etapeIntermediaire->evolution=="en cours"):?>
                                                <div class="col-sm-9 text-warning" >
                                                       <?=$etapeIntermediaire->evolution;?>
                                                </div>
                                            <?php endif;?>
                                             <?php if($etapeIntermediaire->evolution=="terminé"):?>
                                                <div class="col-sm-9 text-success" >
                                                       <?=$etapeIntermediaire->evolution;?>
                                                </div>
                                            <?php endif;?>
                                      </div>
                                </div>
                       </div>
                       <?php if($etapeIntermediaire->evolution=="en cours"):?>
                            <div class="row">
                                <div class="col-md-12">
                                      <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-info" for='enqueteNom'> Uploader le fichier de rapport
                                            </label>
                                             <div class="input-group col-xs-9">
                                                <input class="file-upload-browse btn btn-info" name='fichierRapportIntermediaire<?=$e;?>' type="file">
                                            </div>
                                      </div>
                                </div>
                            </div>
                       <?php endif;?>


                     <?php $e++;?>
                     <?php if($e<=7):?>
                        <hr/>
                      <?php endif;?>
                   <?php endwhile?>


                  <button type="submit" class="btn btn-success mr-2">Terminé</button>
            </form>

