 <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php if($dataAdministrator->rowCount()==0):?>
                      <h4 class="card-title">Aucun employé enregistré</h4>
                  <?php else:?>
                  <h4 class="card-title">Liste des employés</h4>
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
                            Prénoms
                          </th>
                          <th>
                           Email
                          </th>
                          <th>
                            Photo
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($administrator=$dataAdministrator->fetch(PDO::FETCH_OBJ)):?>
                        <tr>
                          <td class="font-weight-medium">
                            <?=$i++;?>
                          </td>
                          <td>
                            <?=$administrator->userName;?>
                          </td>
                          <td>
                             <?=$administrator->userFirstName;?>
                          </td>
                          <td>
                             <?=$administrator->email;?>
                          </td>
                          <td class="text-default">
                                     <img src="<?=$administrator->photoDeProfil;?>" alt="image" class="profile-pic">
                          </td>
                          <td>
                                <div class="ticket-actions col-md-2">
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gerer
                          </button>
                          <div class="dropdown-menu">

                            <a class="dropdown-item" href="application/modificationEmploye/<?=$administrator->id;?>">
                              <i class="fa fa-history fa-fw"></i>Modifier</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="application/supprimerEmploye/<?=$administrator->id;?>">
                              <i class="fa fa-times text-danger fa-fw"></i>Supprimer</a>
                          </div>
                        </div>
                      </div>
                          </td>
                        </tr>
                      <?php endwhile?>
                      </tbody>
                    </table>
                  </div>
                <?php endif?>
                </div>
              </div>
