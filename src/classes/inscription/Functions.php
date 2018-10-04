<?php
namespace App\classes\inscription;
use App\classes\User\UserManager;
use App\classes\User\User;
use App\classes\Administrator\AdministratorManager;
use App\classes\Administrator\Administrator;


    Class Functions{


            public function not_empty_by_post($fields=[]){
                if(count($fields)!=0){
                    foreach($fields as $field){
                        if(empty($_POST[$field])||trim($_POST[$field])==""){
                            return false;
                        }
                    }
                    return true;
                }
            }

        	public function verifyMotpass($motpass,$confmotpass){
                 if($motpass==$confmotpass){
                 	return true;
                 }
                 return false;
        	}


            public function insertDb($username,$email,$motpass,$photoDeProfil){
                  $user=new User(null,$username,$email,$motpass,$photoDeProfil);
                  $userManager=new UserManager();
                  $userManager->create($user);
            }
            public function insertDbAdministrator($username,$userfirstname,$email,$photoDeProfil){
                  $administrator=new Administrator(null,$username,$userfirstname,$email,$photoDeProfil);
                  $administratorManager=new AdministratorManager();
                  $administratorManager->create($administrator);
            }
            public function uploadpicture($pseudo,$email,$motpass,$extension){
                   $token=sha1($pseudo.$email.$motpass);
                   $picture='src/public/photo_membre/'.$token.'.'.$extension;
                   move_uploaded_file($_FILES['photoDeProfil']['tmp_name'],$picture);
                   $userManager=new UserManager();
                   $user=new User($pseudo,$email,$motpass,null,null,$picture,null);
                   $userManager->update($user);
            }
            public function xssControl($value){
              return htmlspecialchars(trim($value));
            }
            public function save_input_data(){
               foreach($_POST as $key => $value){
                  if(!strpos($key, 'matricule')){
                  $_SESSION['input'][$key]=$value;
                 }
               }
            }
            public function get_input($key){
              return !empty($_SESSION['input'][$key])? $_SESSION['input'][$key] : null;
            }

            public function formatageDateSecond($seconde){

              if($seconde<=60){
                   $seconde=$seconde+' s';
                }
              else if($seconde>60 AND $seconde<=3600){
                  $min=(int)($seconde/60);
                  $sec=$seconde%60;
                  $seconde= $sec!=0 ? $min.' min '.$sec.' s': $min.' min';
                }
              else if($seconde>3600 AND $seconde<=86400){
                   $heure=(int)($seconde/3600);
                   $seconde= $heure>1 ? $heure.' heures': $heure.' heure';
                }
              else if($seconde>86400 AND $seconde<=2592000){
                   $jour=(int)($seconde/86400);
                   $seconde= $jour>1 ? $jour.' jours': $jour.' jour';
                }
              else if($seconde>2592000 AND $seconde<=31104000){
                   $mois=(int)($seconde/2592000);
                   $seconde=$mois.' mois';
                }
               else{
                   $annee=(int)($seconde/31104000);
                   $seconde= $annee>1 ? $annee.' année': $annee.' années';
                }

              return $seconde;
            }
    }

