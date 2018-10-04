
 <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-primary mb-5">Performances historiques</h2>
                  <?php if($nbEnquete<2):?>
                       Aucune performance reportorié pour l'instant
                  <?php else:?>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2 text-warning">La meilleure performance</p>
                      <p class="display-3 mb-5 font-weight-light" style='font-size:20px;'><strong class='text-success'><?=$maxPerformanceEvolution;?>%</strong> en <strong class='text-success'><?=$maxPerformanceTemps;?></strong> pour l'enquete <strong class='text-success'><?=$maxEnquete->nom;?></strong> menée par <strong class='text-success'><?=$maxAdmin->userName.' '.$maxAdmin->userFirstName;?></strong></p>
                    </div>
                    <div class="side-right">
                      <small class="text-muted"><?=$enqueteManager->getDateCreationFormatY($maxEnquete->id)->fetch(PDO::FETCH_OBJ)->dateDebut;?></small>
                    </div>
                  </div>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2 text-warning" >La plus faible performance</p>
                      <p class="display-3 mb-5 font-weight-light" style='font-size:20px;'><strong class='text-danger'><?=$minPerformanceEvolution;?>%</strong> en <strong class='text-danger'><?=$minPerformanceTemps;?></strong> pour l'enquete <strong class='text-danger'><?=$minEnquete->nom;?></strong> menée par <strong class='text-danger'><?=$minAdmin->userName.' '.$minAdmin->userFirstName;?></strong></p>
                    </div>
                    <div class="side-right">
                      <small class="text-muted"><?=$enqueteManager->getDateCreationFormatY($minEnquete->id)->fetch(PDO::FETCH_OBJ)->dateDebut;?></small>
                    </div>
                  </div>


                </div>
              <?php endif;?>
              </div>
            </div>

          </div>
