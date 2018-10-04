<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\Administrator\AdministratorManager;
use App\classes\site\Site;
use \PDO as PDO;
    $functions = new Functions();
    $functions->save_input_data();
    $administratorManager=new AdministratorManager();
    $site=new Site();
    if($functions->not_empty_by_post(['email','username','userfirstname'])){

                  $exist=$administratorManager->userNotAlreadyExist($_POST['username'],$_POST['userfirstname']);
                  if(!empty($exist)){
                     if(!empty($exist['username'])){
                         $_SESSION['errors']['errusernamealreadyexist']="Employé déjà existant";
                      }
                  }
                if(isset($_SESSION['errors'])){
                       header('Location:inscription');
                  }
                  else{

                     $picture=null;
                      if(!empty($_FILES['photoDeProfil'])){

                        if($_FILES['photoDeProfil']['error']==0 ){
                              if($_FILES['photoDeProfil']['size']<=1000000){

                                    $info=pathinfo($_FILES['photoDeProfil']['name']);
                                              $extension=$info['extension'];
                                      if(!in_array($extension,['jpeg','JPEG','jpg','JPG','png','PNG'])){
                                         $_SESSION['errors']['errformatfile']='Format de fichier invalide!Essayez un fichier png ou jpg au niveau de profil';
                                          header('Location:inscription');
                                      }
                                     else{
                                          $token=sha1($_POST['username'].$_POST['email']);
                                          $picture='src/public/photo_membre/'.$token.'.'.$extension;
                                           move_uploaded_file($_FILES['photoDeProfil']['tmp_name'],$picture);
                                      }

                              }
                               else{
                                      $_SESSION['errors']['errsizefile']="Fichier trop lourd!";
                              }
                        }
                        else{
                            $_SESSION['errors']['errpostfile']="Erreur dans l'upload de la photo.Veuillez reéssayer s'il vous plait";

                            header('Location:inscription');
                          }
                      }

                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $userfirstname=$_POST['userfirstname'];
                    $photoDeProfil=$picture;
                    $functions->insertDbAdministrator($functions->xssControl($username),$functions->xssControl($userfirstname),$functions->xssControl($email),$functions->xssControl($photoDeProfil));

                    $req=$administratorManager->read($username,$userfirstname)->fetch(PDO::FETCH_OBJ);
                    $_SESSION['administrator']['id']=$req->id;
                    $_SESSION['administrator']['username']=$req->userName;
                    $_SESSION['administrator']['email']=$req->email;
                    $_SESSION['administrator']['userfirstname']=$req->userFirstName;
                    $_SESSION['administrator']['photoDeProfil']=$req->photoDeProfil;

                    $site->set_flash('Employé ajouté avec succès!');
                    header('location:application');
                  }
   }
    else{
     $_SESSION['errors']['errchamp']="Tous les champs sauf pour la photo sont obligatoires";
    	header('location:inscription');
    }
