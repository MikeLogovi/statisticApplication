<?php
use App\classes\Administrator\AdministratorManager;
$administratorManager=new AdministratorManager();
$_SESSION['notification']['message']=$administratorManager->deleteAdministrator($numero)!=null?"Employé supprimé avec succès":"La suppression n'a pas pu s'effectuer.Veuillez reéssayer";
$_SESSION['notification']['type']='info';
header('Location:../../application');
