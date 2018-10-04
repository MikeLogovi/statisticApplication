<?php
session_start();
require('src/controller/frontend.php');
require('vendor/autoload.php');

$router=new App\Router\Router($_GET['url']);
 if(!empty($_COOKIE['username']) AND !empty($_COOKIE['id'])){
       $_SESSION['user']['id']=$_COOKIE['id'];
       $_SESSION['user']['username']=$_COOKIE['username'];

       $_SESSION['user']['motpass']=$_COOKIE['motpass'];

       $router->get('/',function(){application();}) ;
 }
 else{
       $router->get('/',function(){connexion();});
 }
$router->get('/acceuil',function(){homePage();});

$router->get('/inscription',function(){registration();});

$router->get('/formularTreatment',function(){ formularTreatment();});
$router->post('/formularTreatment',function(){ formularTreatment();});

$router->get('/connexion',function(){ connexion();});

$router->get('/connexionTreatment',function(){connexionTreatment();});
$router->post('/connexionTreatment',function(){connexionTreatment();});

$router->get('/page_not_found',function(){page_not_found();});
$router->post('/page_not_found',function(){page_not_found();});


$router->get('/application',function(){ application();});

$router->get('application/supprimerEmploye/:numero',function($numero){ deleteAdministrator($numero);})->with('numero','[0-9]+');
$router->post('application/supprimerEmploye/:numero',function($numero){deleteAdministrator($numero);})->with('numero','[0-9]+');



$router->get('application/modificationEmploye/:numero',function($numero){ modifProfil($numero);})->with('numero','[0-9]+');
$router->post('application/modificationEmploye/:numero',function($numero){ modifProfil($numero);})->with('numero','[0-9]+');
$router->get('modificationEmploye',function(){ modifProfiler();});
$router->post('modificationEmploye',function(){ modifProfiler();});

$router->get('/modifProfilTreatment',function(){ modifProfilTreatment();});
$router->post('/modifProfilTreatment',function(){ modifProfilTreatment();});
$router->get('/updateUser',function(){ updateUser();});
$router->post('/updateUser',function(){ updateUser();});

$router->get('/creer_etape1',function(){ createEnqueteEtape1();});
$router->post('/creer_etape1',function(){ createEnqueteEtape1();});
$router->get('/creer_etape2',function(){ createEnqueteEtape2();});
$router->post('/creer_etape2',function(){ createEnqueteEtape2();});
$router->get('/creer_etape3',function(){ createEnqueteEtape3();});
$router->post('/creer_etape3',function(){ createEnqueteEtape3();});
$router->get('/creer_etape_intermediaire_question',function(){ createEnqueteEtapeIntermediaireQuestion();});
$router->post('/creer_etape_intermediaire_question',function(){ createEnqueteEtapeIntermediaireQuestion();});
$router->get('/creer_etape4',function(){ createEnqueteEtape4();});
$router->post('/creer_etape4',function(){ createEnqueteEtape4();});
$router->get('/enquete_succes',function(){ createEnqueteSucces();});
$router->post('/enquete_succes',function(){ createEnqueteSucces();});

$router->get('/enqueteTreatment',function(){ enqueteTreatment();});
$router->post('/enqueteTreatment',function(){  enqueteTreatment();});


$router->get('/enqueteEvolutionTreatment',function(){ enqueteEvolutionTreatment();});
$router->post('/enqueteEvolutionTreatment',function(){  enqueteEvolutionTreatment();});

$router->get('/evolution_partie1',function(){ evolutionPartie1();});
$router->post('/evolution_prtie1',function(){  evolutionPartie1();});
$router->get('/evolution_partie2',function(){ evolutionPartie2();});
$router->post('/evolution_prtie2',function(){  evolutionPartie2();});

$router->get('/deconnexion',function(){ deconnexion();});
$router->post('/deconnexion',function(){ deconnexion();});

$router->run();
