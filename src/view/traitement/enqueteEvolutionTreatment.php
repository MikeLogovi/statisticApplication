<?php
namespace App\view\traitement;
use App\classes\Enquete\EnqueteManager;
use App\classes\Enquete\Enquete;
use App\classes\inscription\Functions;
use App\classes\site\Site;
use \PDO as PDO;
$functions=new Functions();
$site=new Site();
$enqueteManager= new EnqueteManager();
extract($_POST);

//Partie1
if(!empty($enqueteProgression)){
      $_SESSION['evolution']['partie1']=true;
      if(strtolower($enqueteProgression)=="faire evoluer"){
         $_SESSION['evolutionEnquete']['id']=$enqueteId;
         header("Location:evolution_partie2");
      }
      else if(strtolower($enqueteProgression)=="abandonner"){
         $enquete=$enqueteManager->read($enqueteId)->fetch(PDO::FETCH_OBJ);
         $enqueteManager->giveUp($enqueteId);
         $site->set_flash('Enquete '.$enquete->nom.' a été abandonnée','danger');
         header('Location:application');
      }
      else{
        $_SESSION['errors']['evolution1']="Faites un choix s'il vous plait";
      }
      if(!empty($_SESSION['errors'])){
        header('Location:evolution_partie1');
      }
}

// Partie2
if(!empty($_SESSION['evolution']['partie2_start'])){

    $enquete=$enqueteManager->read($_SESSION['evolutionEnquete']['id'])->fetch(PDO::FETCH_OBJ);

    $dataEtapePrincipale=$enqueteManager->getListeEtapePrincipaleByEnqueteId($_SESSION['evolutionEnquete']['id']);
    $e=1;
    if($inter=$enqueteManager->getListeEtapeIntermediaireByEnqueteId($_SESSION['evolutionEnquete']['id'])){
       $dataEtapeIntermediaire=$inter;
    }
    $picture=null;
    while($etapePrincipale = $dataEtapePrincipale->fetch(PDO::FETCH_OBJ)){
          if($_FILES['fichierRapportPrincipale'.$e]['name']!=""){


                 if($_FILES['fichierRapportPrincipale'.$e]['error']==0 ){
                       if($_FILES['fichierRapportPrincipale'.$e]['size']<=1000000){

                                    $info=pathinfo($_FILES['fichierRapportPrincipale'.$e]['name']);
                                              $extension=$info['extension'];
                                      if(!in_array($extension,['pdf','PDF','doc','DOC'])){
                                         $_SESSION['errors']['errformatfilePrincipale'.$e]='Format de fichier invalide!Essayez un fichier pdf ou word au niveau du rapport pour la phase principale '.$etapePrincipale->nom;
                                          header('Location:evolution_partie2');
                                      }
                                     else{
                                          $token=$enquete->nom.'_'.$etapePrincipale->nom.'_rapport';
                                          $picture='src/public/fichier_rapport_principale/'.$token.'.'.$extension;
                                           move_uploaded_file($_FILES['fichierRapportPrincipale'.$e]['tmp_name'],$picture);
                                  $enqueteManager->updatePrincipaleRapport($etapePrincipale->id,$picture);
                                           $site->set_flash('Phase principale '.$etapePrincipale->nom.' de l\'enquete '.$enquete->nom.' mise à jour avec succès');

                                      }

                        }
                        else{
                           $_SESSION['errors']['errsizefile']="Fichier de la phase principale ".$etapePrincipale->nom." de l'enquete ".$enquete->nom." trop lourd!";
                        }
                  }
                  else{
                       $_SESSION['errors']['errpostfile']="Erreur dans l'upload du fichier de la phase principale ".$etapePrincipale->nom." de l'enquete ".$enquete->nom." .Veuillez reéssayer s'il vous plait";


                  }
          }
          $e++;
    }

    $e=1;
    if($dataEtapeIntermediaire->rowCount()!=0){
                      $picture=null;
         while($etapeIntermediaire = $dataEtapeIntermediaire->fetch(PDO::FETCH_OBJ)){
                 if($_FILES['fichierRapportIntermediaire'.$e]['name']!=""){

                                     if($_FILES['fichierRapportIntermediaire'.$e]['error']==0){
                                         if($_FILES['fichierRapportIntermediaire'.$e]['size']<=1000000){

                                                      $info=pathinfo($_FILES['fichierRapportIntermediaire'.$e]['name']);
                                                                $extension=$info['extension'];
                                                        if(!in_array($extension,['pdf','PDF','doc','DOC'])){
                                                           $_SESSION['errors']['errformatfile']='Format de fichier invalide!Essayez un fichier pdf ou word au niveau du rapport de la phase supplémentaire '.$etapeIntermediaire->nom.' de l\'enquete '.$enquete->nom;
                                                            header('Location:evolution_partie2');
                                                        }
                                                       else{
                                                            $token=$enquete->nom.'_'.$etapeIntermediaire->nom.'_rapport';
                                                            $picture='src/public/fichier_rapport_supplementaire/'.$token.'.'.$extension;
                                                             move_uploaded_file($_FILES['fichierRapportIntermediaire'.$e]['tmp_name'],$picture);
                            $enqueteManager->updateIntermediaireRapport($etapeIntermediaire->id,$picture);
                            $site->set_flash('Phase supplémentaire '.$etapeIntermediaire->nom.' de l\'enquete '.$enquete->nom.' mise à jour avec succès');


                                                        }

                                          }
                                          else{
                                             $_SESSION['errors']['errsizefile']="Fichier de la phase supplémentaire ".$etapeIntermediaire->nom." de l'enquete ".$enquete->nom." trop lourd!";
                                          }
                                    }
                                    else{
                                         $_SESSION['errors']['errpostfile']="Erreur dans l'upload du fichier de la phase supplémentaire ".$etapeIntermediaire->nom." de l'enquete ".$enquete->nom.". Veuillez reéssayer s'il vous plait";

                                    }
                  }
                  $e++;
          }//while
    }
    if(!empty($_SESSION['errors'])){
      header('Location:evolution_partie2');
    }
    else{
      header('Location:application');
    }


}
