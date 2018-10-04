<?php
     function registration(){
          $site=new App\classes\site\Site();
          $function= new App\classes\inscription\Functions;
          ob_start();
     	require('src/view/formulaire/formulaire.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function formularTreatment(){
          $site=new App\classes\site\Site();
     	require('src/view/traitement/formularTreatment.php');
     }
     function connexionTreatment(){
          $site=new App\classes\site\Site();
          require('src/view/traitement/connexionTreatment.php');
     }
     function connexion(){
          $site=new App\classes\site\Site();
     	require('src/view/connexion/connexion.view.php');
     }
     function page_not_found(){

          require('src/view/application/page_not_found.view.php');
     }
     function application(){
          $site=new App\classes\site\Site();
          $userManager=new App\classes\User\UserManager;
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $enqueteManager= new App\classes\Enquete\EnqueteManager();
          $functions=new App\classes\inscription\Functions();
          ob_start();
          require('src/view/application/dashboard.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function deleteAdministrator($numero){
          require('src/view/traitement/supprimerAdministrateurTreatment.php');
     }

      function modifProfil($numero){

          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $administrator=$administratorManager->readById($numero)->fetch(PDO::FETCH_OBJ);
          $_SESSION['administratorModif']['username']=$administrator->userName;
          $_SESSION['administratorModif']['userfirstname']=$administrator->userFirstName;
          $_SESSION['administratorModif']['id']=$administrator->id;
          header('Location:../../modificationEmploye');
     }
      function modifProfiler(){

          $site=new App\classes\site\Site();

          $function= new App\classes\inscription\Functions;

          ob_start();
          require('src/view/application/modif_profil/modifProfil.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }

     function modifProfilTreatment(){

          require('src/view/traitement/modifProfilTreatment.php');

     }
     function updateUser(){
          $site=new App\classes\site\Site();
          $userManager=new App\classes\User\UserManager;
          $function= new App\classes\inscription\Functions;
          ob_start();
          require('src/view/application/user/modif_profil.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function createEnqueteEtape1(){
          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          ob_start();
          require('src/view/application/enquete/enquete_etape1.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }
     function createEnqueteEtape2(){
          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          ob_start();
          require('src/view/application/enquete/enquete_etape2.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }

      function createEnqueteEtape3(){

          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $enqueteManager=new App\classes\Enquete\EnqueteManager();
         ob_start();
          require('src/view/application/enquete/enquete_etape3.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }
      function createEnqueteEtapeIntermediaireQuestion(){

          $site=new App\classes\site\Site();
          ob_start();
          require('src/view/application/enquete/enquete_etape_intermediaire_question.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }

       function createEnqueteEtape4(){

          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $enqueteManager=new App\classes\Enquete\EnqueteManager();
          ob_start();
          require('src/view/application/enquete/enquete_etape4.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }
     function createEnqueteSucces(){

          $site=new App\classes\site\Site();
           ob_start();
          require('src/view/application/enquete/enquete_succes.view.php');
          $content_enquete_etape=ob_get_clean();
          ob_start();
          require('src/view/application/enquete/enquete_template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');

     }
     function evolutionPartie1(){
          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $enqueteManager= new App\classes\Enquete\EnqueteManager();
          ob_start();
          require('src/view/application/evolutionEnquete/part1.view.php');
          $content_enquete_evolution=ob_get_clean();
          ob_start();
          require('src/view/application/evolutionEnquete/template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function evolutionPartie2(){
          $site=new App\classes\site\Site();
          $administratorManager=new App\classes\Administrator\AdministratorManager();
          $enqueteManager= new App\classes\Enquete\EnqueteManager();
          ob_start();
          require('src/view/application/evolutionEnquete/part2.view.php');
          $content_enquete_evolution=ob_get_clean();
          ob_start();
          require('src/view/application/evolutionEnquete/template.view.php');
          $content=ob_get_clean();
          require('src/view/application/application.view.php');
     }
     function enqueteTreatment(){
         require('src/view/traitement/enqueteTreatment.php');

     }
     function enqueteEvolutionTreatment(){
         require('src/view/traitement/enqueteEvolutionTreatment.php');

     }
     function supprimerProfil(){

          require('src/view/traitement/supprimerProfilTreatment.php');

     }
     function deconnexion(){

          require('src/view/traitement/deconnexionTreatment.php');

     }
