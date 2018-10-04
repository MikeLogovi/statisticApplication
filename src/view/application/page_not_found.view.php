<?php
   $site = new App\classes\site\Site();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$site::WEB_SITE_NAME;?>-PAGE INTROUVABLE</title>

  <link rel="stylesheet" href="src/public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.addons.css">

  <link rel="stylesheet" href="src/public/css/style.css">

  <link rel="shortcut icon" href="src/public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>Désolé!</h2>
                <h3 class="font-weight-light">Cette page n'est malheuresement pas sur notre serveur.</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="application">Retourner au tableau de bord</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="application" target="_blank" style='color:red'>ESMA</a>. Tous droits reservés.</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <script src="src/public/vendors/js/vendor.bundle.base.js"></script>
  <script src="src/public/vendors/js/vendor.bundle.addons.js"></script>

  <script src="src/public/js/off-canvas.js"></script>
  <script src="src/public/js/misc.js"></script>

</body>

</html>
