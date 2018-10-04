<?php
namespace App\view\traitement;
use App\classes\inscription\Functions;
use App\classes\User\UserManager;
use \PDO as PDO;
$userManager = new UserManager();
if($userManager->delete($_SESSION['user']['id'])){
  $_SESSION['errors']['deleteUser']="Compte supprimé avec succès";
  session_destroy();
  header('Location:acceuil');
}
else{
  $_SESSION['errors']['deleteUser']="Votre compte n'a pas pu se supprimer.Veuillez reéssayer";
  header('Location:listeMembre');
}
