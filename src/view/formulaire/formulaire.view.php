<?php
  require('src/view/partials/unset.php');
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Inscription</h4>
                  <p class="card-description text-info">
                    Nouvel employé
                  </p>
                  <?php require('src/view/partials/errors_form.php');?>
                  <form class="forms-sample" method='POST' action='formularTreatment' enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="username">Nom</label>
                      <input type="text" class="form-control" id="username" name='username' placeholder="Nom" <?='value='.$function->get_input('username');?>>
                    </div>
                    <div class="form-group">
                      <label for="userfirstname">Prénoms</label>
                      <input type="text" class="form-control" id="userfirstname" name='userfirstname' placeholder="Prénoms" <?='value='.$function->get_input('userfirstname');?>>
                    </div>
                    <div class="form-group">
                      <label for="email">Adresse email</label>
                      <input type="email" class="form-control" id="email" name='email' placeholder="Email" <?='value='.$function->get_input('email');?>>
                    </div>

                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                           <input class="file-upload-browse btn btn-info" name='photoDeProfil' type="file">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Envoyer</button>

                  </form>
                </div>
              </div>
            </div>
           </div>
          </div>
