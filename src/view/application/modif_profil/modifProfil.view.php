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
                  <p class="card-description text-warning">
                   Modification du profil de <?=$_SESSION['administratorModif']['username'].' '. $_SESSION['administratorModif']['userfirstname'];?>
                  </p>
                  <?php require('src/view/partials/errors_form.php');?>
                  <form class="forms-sample" method='POST' action='modifProfilTreatment' enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="usernameModif">Nom</label>
                      <input type="text" class="form-control" id="usernameModif" name='usernameModif' placeholder="Nom" <?='value='.$function->get_input('usernameModif');?>>
                    </div>
                    <div class="form-group">
                      <label for="userfirstnameModif">Prénoms</label>
                      <input type="text" class="form-control" id="userfirstnameModif" name='userfirstnameModif' placeholder="Prénoms" <?='value='.$function->get_input('userfirstnameModif');?>>
                    </div>
                    <div class="form-group">
                      <label for="emailModif">Adresse email</label>
                      <input type="emailModif" class="form-control" id="emailModif" name='emailModif' placeholder="email" <?='value='.$function->get_input('emailModif');?>>
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
