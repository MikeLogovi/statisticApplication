<?php
namespace App\classes\database;
use App\classes\site\Site;
use \PDO as PDO;
       Class Manager{
       	protected function baseConnection(){

       		$bdd=new PDO('mysql:host=localhost;dbname=statistique;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
       		return $bdd;
       	}
     }
