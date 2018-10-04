<?php
namespace App\view\traitement;
use App\classes\Enquete\EnqueteManager;
use App\classes\Enquete\Enquete;
use App\classes\inscription\Functions;
use \PDO as PDO;
$functions=new Functions();
$enqueteManager= new EnqueteManager();
extract($_POST);

// Etape 1
if($functions->not_empty_by_post(['enqueteChefId'])){
      if(empty($enqueteNom)){
          $_SESSION['errors']['enqueteNom']="Une enquete doit etre nommée";
      }
      if(empty($enqueteRevenue) OR ($enqueteRevenue<=0)){
          $_SESSION['errors']['enqueteCout']="Une enquete a besoin d'un cout";
      }
      if(empty($enqueteChefId)){
          $_SESSION['errors']['enqueteCout']="Une enquete a besoin d'un administrateur en chef";
      }


      if(empty($_SESSION['errors'])){
          $_SESSION['enquete']['nom']=$functions->xssControl($enqueteNom);
          $_SESSION['enquete']['idChef']=$functions->xssControl($enqueteChefId);
          $_SESSION['enquete']['revenue']=$functions->xssControl($enqueteRevenue);
          $_SESSION['enquete']['etape1']=true;
          header('Location:creer_etape2');

      }
      else{
          header('Location:creer_etape1');
      }

}

// Etape 2
if(!empty($_SESSION['enquete']['etape2_start'])){
    if(empty($administrateurs)){
        $_SESSION['errors']['enqueteActeurSecondaire']="Une enquete a besoin d'au moins un acteur secondaire";
        header('Location:creer_etape2');
    }
    else{
          $_SESSION['enquete']['administrateurs']='';
          foreach($administrateurs as $administrateur  ){
            $_SESSION['enquete']['administrateurs'].=$functions->xssControl($administrateur).' ';
          }
          $_SESSION['enquete']['etape2']=true;
          header('Location:creer_etape3');
    }

}
//Etape 3

if(!empty($tempsNecessaire)){
   $e=1;
   $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipale();
   while($etapePrincipale=$dataEtapePrincipale->fetch(PDO::FETCH_OBJ)){
              if(!empty($tempsNecessaire)){
                 $_SESSION[''.$etapePrincipale->nom]['temps']=$functions->xssControl($tempsNecessaire[0]);
                 array_shift($tempsNecessaire);
              }
              else{
                 $_SESSION['errors']['phaseTemps']="Chaque phase a besoin d'un temps necessaire";
                  header('Location:creer_etape3');
              }
              if(!empty($_POST['administrating'.$e])){
                  $_SESSION[''.$etapePrincipale->nom]['administrateurs']='';
                  foreach($_POST['administrating'.$e] as $adminId){
                   $_SESSION[''.$etapePrincipale->nom]['administrateurs'].=$functions->xssControl($adminId).' ';
                  }
              }
              else{
                  $_SESSION['errors']['phaseActeur']="Chaque phase a besoin d'au moins un acteur";
                   header('Location:creer_etape3');
              }
              $e++;
   }
   if(empty($_SESSION['errors'])){
        $_SESSION['enquete']['etape3']=true;
        header('Location:creer_etape_intermediaire_question');
   }
   else{
        header('Location:creer_etape3');
   }

}

// Etape_Intermediaire_Question
if(!empty($etapeIntermediaire)){
  $etapeIntermediaire=$functions->xssControl($etapeIntermediaire);
  if($etapeIntermediaire=='non'){
     $_SESSION['enquete']['readyWithoutIntermediaire']=true;
     header('Location:enqueteTreatment');
  }
  if($etapeIntermediaire=='oui'){
    if(empty($etapeIntermediaireNumber)){
      $_SESSION['errors']['nombreEtapeIntermediaires']="Choisissez un nombre d'étapes si vous voulez en créer";
    }
    if(empty($_SESSION{'errors'})){
      $_SESSION['enquete']['etapeIntermediaire']=true;
      $_SESSION['enquete']['nombreEtapeIntermediare']=$etapeIntermediaireNumber;
      header('Location:creer_etape4');
    }
    else{
       header('Location:creer_etape_intermediaire_question');
    }

  }
}

//Etape 4
if(!empty($tempsNecessaireEtapeIntermediaire)){
    $nbEtapeIntermediaire=$_SESSION['enquete']['nombreEtapeIntermediare'];
    for($nbEI=1;$nbEI<=$nbEtapeIntermediaire;$nbEI++){
          if(!empty($etapeIntermediaireNom[0])){
               $_SESSION['etapeIntermediaire'.$nbEI]['nom']=$functions->xssControl($etapeIntermediaireNom[0]);
               array_shift($etapeIntermediaireNom);
          }
          else{
            $_SESSION['errors']['etapeIntermediaireNom']='Chaque étape intermediaire doit etre nommée';
          }
          if(!empty($tempsNecessaireEtapeIntermediaire[0])){
              $_SESSION['etapeIntermediaire'.$nbEI]['temps']=$functions->xssControl($tempsNecessaireEtapeIntermediaire[0]);
              array_shift($tempsNecessaireEtapeIntermediaire);
          }
          if(!empty($_POST['administrateurIntermediaires'.$nbEI])){
             $_SESSION['etapeIntermediaire'.$nbEI]['administrateurs']='';
             foreach($_POST['administrateurIntermediaires'.$nbEI] as $adminIntermediaire){
               $_SESSION['etapeIntermediaire'.$nbEI]['administrateurs'].=$functions->xssControl($adminIntermediaire).' ';
             }
          }
          else{
             $_SESSION['errors']['etapeIntermediaireAdmin']="Chaque étape intermédiaire a besoin d'au moins un acteur";
          }
    }
    if(empty($_SESSION['errors'])){
       $_SESSION['enquete']['readyWithIntermediaire']=true;
      header('Location:enqueteTreatment');
    }
    else{
      header('Location:creer_etape4');
    }
}

// TESTS UTILITAIRES
/*
if(!empty($_SESSION['enquete']['readyWithoutIntermediaire']) OR !empty($_SESSION['enquete']['readyWithIntermediaire'])){

   echo 'Nom de l enquete '.$_SESSION['enquete']['nom'].'<br/>';
   echo 'Id chef de l enquete '.$_SESSION['enquete']['idChef'].'<br/>';
   echo 'Cout de l enquete '.$_SESSION['enquete']['revenue'].'<br/>';
   echo 'Id des administrateurs de l enquete ';
   $enquete_admin=explode(' ',$_SESSION['enquete']['administrateurs']);
   array_pop($enquete_admin);
   foreach($enquete_admin as $admini ){
           echo $admini.', ';
   }
   echo '<br/>';

   $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipale();
   while($etapePrincipale=$dataEtapePrincipale->fetch(PDO::FETCH_OBJ)){
         echo 'L etape principale '.$etapePrincipale->nom.' a pour temps maxi '. $_SESSION[''.$etapePrincipale->nom]['temps'].'<br/>';
         echo 'Les id de ses acteurs sont ';
         $principale_admin=explode(' ',$_SESSION[''.$etapePrincipale->nom]['administrateurs']);
         array_pop($principale_admin);
         foreach($principale_admin as $principalAdmin){
            echo $principalAdmin.', ';
         }
         echo '<br/>';

   }
   if(!empty($_SESSION['enquete']['readyWithIntermediaire'])){
       for($env=1;$env<=$_SESSION['enquete']['nombreEtapeIntermediare'];$env++){
         echo "L'etape intermediaire ".$env.' a pour nom '.$_SESSION['etapeIntermediaire'.$env]['nom'].' et pour temps maximum '.$_SESSION['etapeIntermediaire'.$env]['temps'].'<br/>';
           echo "les id des acteurs sont ";
           $intermediaire_admin=explode(' ',$_SESSION['etapeIntermediaire'.$env]['administrateurs']);
           array_pop($intermediaire_admin);
           foreach($intermediaire_admin as $intermediaireAdmin){
               echo $intermediaireAdmin.', ';
           }
           echo'<br/>';
       }
   }

}
*/

//INSERTION DANS LA BASE DE DONNEEES

if(!empty($_SESSION['enquete']['readyWithoutIntermediaire']) OR !empty($_SESSION['enquete']['readyWithIntermediaire'])){

     //Calcul du temps maxi
       $temps=0;
       $nbEtapeIntermediaire=$_SESSION['enquete']['nombreEtapeIntermediare'];
       $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipale();
       while($etapePrincipale=$dataEtapePrincipale->fetch(PDO::FETCH_OBJ)){
            $temps+=$_SESSION[''.$etapePrincipale->nom]['temps'];
       }
       if(!empty($_SESSION['enquete']['readyWithIntermediaire'])){
            for($nbEI=1;$nbEI<=$nbEtapeIntermediaire;$nbEI++){
                $temps+=$_SESSION['etapeIntermediaire'.$nbEI]['temps'];
            }
       }
       $nom=$_SESSION['enquete']['nom'];
       $idAdministrateurEnChef=$_SESSION['enquete']['idChef'];
       $administrateurs=substr($_SESSION['enquete']['administrateurs'],0,-1);
       $tempsMaximum=$temps;
       $revenue=$_SESSION['enquete']['revenue'];
       $enquete = new Enquete(null,$nom,$idAdministrateurEnChef,$administrateurs,null,null,$temps,$revenue);
       $enqueteManager->createEnquete($enquete);
       $enqueteRead=$enqueteManager->read(null,$nom)->fetch(PDO::FETCH_OBJ);

       $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipale();
       while($etapePrincipale=$dataEtapePrincipale->fetch(PDO::FETCH_OBJ)){
             $adminPrinp=substr($_SESSION[''.$etapePrincipale->nom]['administrateurs'],0,-1);

             $enqueteManager->createEnqueteEtapePrincipale($enqueteRead->id,$etapePrincipale->nom,$adminPrinp,$_SESSION[''.$etapePrincipale->nom]['temps']);
       }
       if(!empty($_SESSION['enquete']['readyWithIntermediaire'])){

          for($nbEI=1;$nbEI<=$nbEtapeIntermediaire;$nbEI++){
              $adminInter=substr($_SESSION['etapeIntermediaire'.$nbEI]['administrateurs'],0,-1);

              $enqueteManager->createEnqueteEtapeIntermediaire($enqueteRead->id,$_SESSION['etapeIntermediaire'.$nbEI]['nom'],$adminInter,$_SESSION['etapeIntermediaire'.$nbEI]['temps']);
           }
       }

       header('Location:enquete_succes');
}
