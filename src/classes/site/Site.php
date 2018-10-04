<?php
namespace App\classes\site;

      Class Site{
      	   const WEB_SITE_NAME="EMSA";
           const WEB_SITE_DEVELOPPER="Rodrigue TOSSOU";
      	   const WEB_SITE_URL='http://localhost/enquete';
           const WEB_SITE_DB_NAME='statistique';
      	   public function set_flash($message,$type='info'){
      	   	   $_SESSION['notification']['message']=$message;
      	   	   $_SESSION['notification']['type']=$type;

      	   }
      }
