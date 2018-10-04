<?php
namespace App\view\formulaire;
use App\classes\inscription\Functions;
$function=new Functions();
/*if(isset($_SESSION['user']['id'])){
  header('Location:application');
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$site::WEB_SITE_NAME.'-CONNEXION';?></title>

  <link rel="stylesheet" href="src/public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.addons.css">

  <link rel="stylesheet" href="src/public/css/style.css">

  <link rel="shortcut icon" href="src/public/images/favicon.png" />
   <script src="src/public/vendors/js/jquery.min.js"></script>
</head>

<body>

  <form method='post' action='connexionTreatment'>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <?php require('src/view/partials/errors_form.php');?>
              <form action="#">
                <div class="form-group">
                  <label class="label">Nom d'utilisateur</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name='verusername' placeholder="Nom d'utilisateur">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Mot de passe</label>
                  <div class="input-group">
                    <input type="password" name='vermotpass' class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Connexion</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" name='souvenir' class="form-check-input" checked> Se souvenir de moi
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Mot de passe oublié?</a>
                </div>

              </form>
            </div>

            <p class="footer-text text-center">copyright © 2018 EMSA.Tous droits reservés.</p>
          </div>
        </div>
      </div>

    </div>

  </div>
 </form>
  <script src="src/public/vendors/js/vendor.bundle.base.js"></script>
  <script src="src/public/vendors/js/vendor.bundle.addons.js"></script>

  <script src="src/public/js/off-canvas.js"></script>
  <script src="src/public/js/misc.js"></script>

</body>

</html>
