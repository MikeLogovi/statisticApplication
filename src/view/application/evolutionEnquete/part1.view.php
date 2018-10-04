 <?php
      $dataEnquete=$enqueteManager->getList();
 ?>
               <p class="card-description text-primary">
                   Partie 1 :Choix de l'enquete
               </p>

               <form class='form-sample' method='POST' action='enqueteEvolutionTreatment'>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for='enqueteNom'>Nom de l'enquete</label>
                             <div class="col-sm-9">
                              <select class="form-control" name='enqueteId' id='enqueteId'>
                             <?php while($enquete=$dataEnquete->fetch(PDO::FETCH_OBJ)):?>
                                <?php if($enquete->evolution=="en cours"):?>
                                  <option value='<?=$enquete->id?>'><?=$enquete->nom;?></option>
                                <?php endif;?>
                              <?php endwhile;?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                          <div class="col-xs-6">
                                <input type="submit" class="btn btn-warning mr-2" value='Faire evoluer' name='enqueteProgression'/>
                          </div>
                           <div class="col-xs-6">
                                <input type="submit" class="btn btn-danger mr-2" value='Abandonner' name='enqueteProgression'/>
                          </div>
                       </div>

              </form>
