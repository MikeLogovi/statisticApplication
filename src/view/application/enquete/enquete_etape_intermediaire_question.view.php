      <?php if(empty($_SESSION['enquete']['etape3'])){
                  header('Location:creer_etape1');
           }
      ?>
      <!-- partial -->

                    <p class="card-description text-danger">
                      Voulez vous ajouter des étapes supplémentaires?(Précisez le nombre d'étape pour un oui)
                    </p>
                  <form class='form-sample' method='POST' action='enqueteTreatment'>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for='etapeIntermediaireNumber'>Nombre d'étapes à créer</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name='etapeIntermediaireNumber' id='etapeIntermediaireNumber' min='1'/>
                          </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-xs-3">
                            <input type="submit" class="btn btn-warning mr-2" value='oui' name='etapeIntermediaire'/>
                      </div>
                       <div class="col-xs-3">
                            <input type="submit" class="btn btn-success mr-2" value='non' name='etapeIntermediaire'/>
                      </div>
                    </div>

                  </form>

