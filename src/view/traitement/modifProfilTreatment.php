<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\Administrator\AdministratorManager;
use App\classes\User\User;
use App\classes\User\UserManager;
use App\classes\site\Site;
    $functions = new Functions();
    $administratorManager = new AdministratorManager();
    $functions->save_input_data();
    $site=new Site();
    extract($_POST);
    if($functions->not_empty_by_post(['user_old_password','user_new_password'])){
       $user_old_password=sha1(md5($user_old_password));
       if($_SESSION['user']['motpass']!=$user_old_password){
           $_SESSION['errors']['erruserpass']='Mot de passe incorrecte';
           header('Location:updateUser');
       }
       else{
        $userManager=new UserManager();
           if(!empty($user_new_username)){
              $userManager->updateUserName($functions->xssControl($user_new_username),$_SESSION['user']['id']);
           }
           $user_new_password=sha1(md5($user_new_password));
           $userManager->updateMotPass($functions->xssControl($user_new_password),$_SESSION['user']['id']);
            $site->set_flash('Profil administrateur mise à jour avec succès');
           header('Location:application');
       }
    }





    else{

          if(!empty($usernameModif)){
             $administratorManager->updateUserName($functions->xssControl($usernameModif),$_SESSION['administratorModif']['id']);

          }
          if(!empty($userfirstnameModif)){
             $administratorManager->updateUserFirstName($functions->xssControl($userfirstnameModif),$_SESSION['administratorModif']['id']);

          }
          if(!empty($emailModif)){
            $administratorManager->updateEmail($functions->xssControl($emailModif),$_SESSION['administratorModif']['id']);

          }

          $picture=null;
          if(!empty($_FILES['photoDeProfilModif'])){
              if($_FILES['photoDeProfilModif']['error']==0 ){
                      if($_FILES['photoDeProfilModif']['size']<=1000000){

                            $info=pathinfo($_FILES['photoDeProfilModif']['name']);
                            $extension=$info['extension'];
                            if(!in_array($extension,['jpeg','JPEG','jpg','JPG','png','PNG'])){
                               $_SESSION['errors']['errformatfile']='Format de fichier invalide!Essayez un fichier png ou jpg au niveau de profil';
                                header('Location:modificationEmploye');
                            }
                             else{
                                  $token=sha1($usernameModif.$emailModif);
                                  $picture='src/public/photo_membre/'.$token.'.'.$extension;
                                   move_uploaded_file($_FILES['photoDeProfilModif']['tmp_name'],$picture);
                                   $administratorManager->updatePhotoDeProfil($functions->xssControl($picture),$_SESSION['administratorModif']['id']);

                                 }

                      }
                      else{
                        $_SESSION['errors']['errsizefile']="Fichier trop lourd!";
                      }
             }
              else{
                  $_SESSION['errors']['errpostfile']="Erreur dans l'upload de la photo.Veuillez reéssayer s'il vous plait";
                   header('Location:modificationEmploye');
                  }
         }
         header('location:application');
    }

