<?php
namespace App\view\formulaire;
use App\classes\inscription\Functions;
use \PDO as PDO;

$function=new Functions();
if(empty($_SESSION['user']['id'])){
  header('Location:connexion');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Application <?=$site::WEB_SITE_NAME;?></title>
  <link rel="stylesheet" href="src/public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="src/public/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="src/public/vendors/icheck/skins/all.css">
  <link rel="stylesheet" href="src/public/css/style.css">
  <link rel="shortcut icon" href="src/public/images/favicon.png" />

  <link rel="stylesheet" href="src/public/vendors/iconfonts/font-awesome/css/font-awesome.css">
  <script src="src/public/vendors/js/jquery.min.js"></script>
</head>

<body>
  <div class="container-scroller">

    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="src/public/images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="src/public/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="evolution_partie1" class="nav-link">Faire evoluer une enquete
              <span class="badge badge-primary ml-1">Nouveau</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="application" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Rapports</a>
          </li>
          <li class="nav-item">
            <a href="deconnexion" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Déconnexion</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">


          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Bienvenue, cher Administrateur!</span>

            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>

              <a href='updateUser' class="dropdown-item">
                Mettre à jour le profil administrateur
              </a>

              <a href='deconnexion' class="dropdown-item">
                Déconnexion
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">

                <div class="text-wrapper">
                  <p class="profile-name">ADMINISTRATEUR</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <a class="btn btn-success btn-block" href='creer_etape1'>Nouvelle Enquete
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="application">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="inscription">
              <i class="fa fa-handshake-o "></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Nouvel employé</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Raccourcis</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="src/public/pages/ui-features/buttons.html">Enquetes en cours</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="src/public/pages/ui-features/typography.html">Liste des employés</a>
                </li>
              </ul>
            </div>
          </li>


        </ul>
      </nav>

          <?=$content;?>



        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="application" target="_blank">ESMA</a>. Tous droits reservés.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Application faite par un statisticien pour des statisticiens
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>

      </div>

    </div>

  </div>

  <script src="src/public/vendors/js/vendor.bundle.base.js"></script>
  <script src="src/public/vendors/js/vendor.bundle.addons.js"></script>

  <script src="src/public/js/off-canvas.js"></script>
  <script src="src/public/js/misc.js"></script>

  <script src="src/public/js/dashboard.js"></script>

</body>

</html>
