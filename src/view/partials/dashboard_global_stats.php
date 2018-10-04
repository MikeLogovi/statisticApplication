 <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Totale Dépense</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?=$cout->depense!=0? $cout->depense:0;?> $</h3>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total enquetes</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?=$dataEnquete->rowCount();?></h3>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Echecs
                      </p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?=$dataEchec->rowCount();?></h3>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total employés</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?=$dataAdministrator->rowCount();?></h3>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
