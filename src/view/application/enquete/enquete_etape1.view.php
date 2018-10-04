<?php
    $dataAdministrator = $administratorManager->getList();

 ?>
      <!-- partial -->

                    <p class="card-description text-danger">
                      Etape 1
                    </p>
                  <form class='form-sample' method='POST' action='enqueteTreatment'>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for='enqueteNom'>Nom de l'enquete</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name='enqueteNom' id='enqueteNom'/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for='enqueteChefId'>Administrateur en chef</label>
                          <div class="col-sm-9">
                            <select class="form-control" name='enqueteChefId' id='enqueteChefId'>
                           <?php while($administrator=$dataAdministrator->fetch(PDO::FETCH_OBJ)):?>
                              <option value='<?=$administrator->id?>'><?=$administrator->userName.' '.$administrator->userFirstName;?></option>
                            <?php endwhile;?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for='enqueteRevenue'>Cout de l'enquete</label>
                        <div class="input-group col-sm-9">

                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name='enqueteRevenue' id='enqueteRevenue'>
                          <div class="input-group-append bg-primary border-primary">
                            <span class="input-group-text bg-transparent text-white">$</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                     <button type="submit" class="btn btn-warning mr-2">Suivant</button>
                  </form>


