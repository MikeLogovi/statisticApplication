<?php
namespace App\classes\Enquete;

Class Enquete{
     protected $id;
     protected $nom;
     protected $idAdministrateurEnChef;
     protected $administrateurs;
     protected $dateCreation;
     protected $dateFin;
     protected $tempsMaximum;
     protected $revenue;


     public function __construct($id=null,$nom,$idAdministrateurEnChef=null,$administrateurs=null,$dateCreation=null,$dateFin=null,$tempsMaximum=null,$revenue=null){
        if($id!=null){
          $this->setId($id);
        }
        if($nom!=null){
          $this->setNom($nom);
        }
        if($idAdministrateurEnChef!=null){
          $this->setIdAdministrateurEnChef($idAdministrateurEnChef);
        }
         if($administrateurs!=null){
          $this->setadministrateurs($administrateurs);
        }
        if($dateCreation!=null){
          $this->setDateCreation($dateCreation);
        }
        if($dateFin!=null){
          $this->setDateFin($dateFin);
        }
        if($tempsMaximum!=null){
          $this->setTempsMaximum($tempsMaximum);
        }
        if($revenue!=null){
          $this->setRevenue($revenue);
        }

     }

     public function getId(){
      return $this->id;
     }
     public function setId($id){
       $this->id=$id;
     }
     public function getNom(){
      return $this->nom;
     }
     public function setNom($nom){
       $this->nom=$nom;
     }
     public function getIdAdministrateurEnChef(){
      return $this->idAdministrateurEnChef;
     }
     public function setIdAdministrateurEnChef($idAdministrateurEnChef){
        $this->idAdministrateurEnChef=$idAdministrateurEnChef;
     }
     public function getAdministrateurs(){
      return $this->administrateurs;
     }
     public function setAdministrateurs($administrateurs){
        $this->administrateurs=$administrateurs;
     }
     public function getDateCreation(){
      return $this->dateCreation;
     }
     public function setDateCreation($dateCreation){
        $this->dateCreation=$dateCreation;
     }
     public function getDateFin(){
      return $this->dateFin;
     }
     public function setDateFin($dateFin){
        $this->dateFin=$dateFin;
     }
     public function getTempsMaximum(){
      return $this->tempsMaximum;
     }
     public function setTempsMaximum($tempsMaximum){
      $this->tempsMaximum=$tempsMaximum;
     }
     public function getRevenue(){
       return $this->revenue;
     }
     public function setRevenue($revenue){
      $this->revenue=$revenue;
     }

}
