<?php
   require('src/view/partials/unset.php');
?>
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modification</h4>
                  <p class="card-description text-primary">
                   Modification  du profil administrateur
                  </p>
                  <?php require('src/view/partials/errors_form.php');?>
                  <form class="forms-sample" method='POST' action='modifProfilTreatment' enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="user_new_username">Nouveau nom d'utilisateur</label>
                      <input type="text" class="form-control" id="user_new_username" name='user_new_username' placeholder="Nouveau nom d'utilisateur  (Si besoin)" <?='value='.$function->get_input('user_new_username');?>>
                    </div>
                    <div class="form-group">
                      <label for="user_old_password">Ancien mot de passe</label>
                      <input type="password" class="form-control" id="user_old_password" name='user_old_password' placeholder="Ancien mot de passe" <?='value='.$function->get_input('user_old_password');?>>
                    </div>
                    <div class="form-group">
                      <label for="user_new_password">Nouveau mot de passe</label>
                      <input type="password" class="form-control" id="user_new_password" name='user_new_password' placeholder="Nouveau mot de passe" <?='value='.$function->get_input('user_new_password');?>>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Envoyer</button>

                  </form>
                </div>
              </div>
            </div>
           </div>
          </div>
