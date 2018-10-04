<?php
namespace App\classes\Enquete;
use App\classes\database\Manager;
use App\classes\Enquete\Enquete;
Class EnqueteManager extends Manager{
   public function createEnquete(Enquete $enquete){
     $bdd=$this->baseConnection();

    $req=$bdd->prepare('INSERT INTO
      enquete(nom,idAdministrateurEnChef,administrateurs,tempsMaximum,revenue,dateCreation)
      VALUES(:nom,:idAdministrateurEnChef,:administrateurs,:tempsMaximum,:revenue,NOW())');
    $req->execute(array(
      'nom'=>$enquete->getNom(),
      'idAdministrateurEnChef'=>$enquete->getIdAdministrateurEnChef(),
      'administrateurs'=>$enquete->getAdministrateurs(),
      'tempsMaximum'=>$enquete->getTempsMaximum(),
      'revenue'=>$enquete->getRevenue()
    ));
    return $req;
  }

  public function read($id=null,$nom=null){
     $bdd=$this->baseConnection();
     if($nom==null){
          $req=$bdd->prepare('SELECT * FROM enquete WHERE id=:id ORDER BY nom');
          $req->execute(compact('id'));
     }
     else{
          $req=$bdd->prepare('SELECT * FROM enquete WHERE nom=:nom ORDER BY nom');
           $req->execute(compact('nom'));
     }
     return $req;
  }
  public function giveUp($id){
         $bdd=$this->baseConnection();
         $req=$bdd->prepare('UPDATE enquete set evolution="echec" WHERE id=:id');
         $req->execute(compact('id'));

         return $req;
  }
  public function getList(){
       $bdd=$this->baseConnection();
       $req=$bdd->query('SELECT * FROM enquete ORDER BY nom');
       return $req;
  }
  public function getEchec(){
       $bdd=$this->baseConnection();
       $req=$bdd->query('SELECT * FROM enquete WHERE evolution="echec" ORDER BY nom');
       return $req;
  }
  public function getDepense(){
       $bdd=$this->baseConnection();
       $req=$bdd->query('SELECT sum(revenue) as depense FROM enquete');
       return $req;
  }
  public function delete($id){
     $bdd=$this->baseConnection();
     $req=$bdd->prepare('DELETE FROM enquete WHERE id=:id');
     $req->execute(compact('id'));
     return $req;
  }
  public function update(Enquete $enquete,$id=null){
          $tab_enquete=array('nom'=>$enquete->getNom(),'idAdministrateurEnChef'=>$enquete->getIdAdministrateurEnChef(),'administrateurs'=>$enquete->getAdministrateurs(),'dateCreation'=>$enquete->getDateCreation(),'dateFin'=>$enquete->getDateFin(),'tempsMaximu'=>$enquete->getTempsMaximum(),'revenue'=>$enquete->getRevenue());
         // var_dump($tab_enquete);
          //var_dump(get_class_methods(get_class($enquete)));

          //die();
          foreach($tab_enquete as $attribute=>$value){
            $ucattr=ucfirst($attribute);
            $method1='get'.$ucattr;
            //var_dump($method1);
                 try{
                  if(method_exists(get_class($enquete), $method1)){
                    //echo "Parfait";
                    //die();
                    if($enquete->$method1()!=null){
                       $method2='set'.$ucattr;
                       if(method_exists(get_class($enquete),$method2)){
                         $enquete->$method2($enquete->$method1());
                         $method3='update'.$ucattr;
                         if(method_exists($this, $method3)){
                          if($enquete->getId()!=null)
                            {
                               $req=$this->read(null,$enquete->getNom())->fetch(PDO::FETCH_OBJ);
                               $this->$method3($enquete->$method1(),$req->id);
                            }
                            else{
                               $this->$method3($enquete->$attribute,$id);
                            }

                         }
                       }
                    }
                  }
                  else{
                    echo "ImParfait";
                    die();
                  }
                }catch(Exception $e){
                      die("Erreur ".$e->getMessage());
                }
          }
  }
  public function updateNom($nom,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET nom=:nom WHERE id=:id');
       $req->execute(compact('nom','id'));
       return $req;
  }
  public function updateIdAdministrateurEnChef($idAdministrateurEnChef,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET idAdministrateurEnChef=:idAdministrateurEnChef WHERE id=:id');
       $req->execute(compact('idAdministrateurEnChef','id'));
       return $req;
  }
  public function updateAdministrateurs($administrateurs,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET administrateurs=:administrateurs WHERE id=:id');
       $req->execute(compact('administrateurs','id'));
       return $req;
  }
  public function updateDateCreation($dateCreation,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET dateCreation=:dateCreation WHERE id=:id');
       $req->execute(compact('dateCreation','id'));
       return $req;
  }
    public function updateDateFin($dateFin,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET dateFin=:dateFin WHERE id=:id');
       $req->execute(compact('dateFin','id'));
       return $req;
  }

  public function updateTempsMaximum($tempsMaximum,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET tempsMaximum=:tempsMaximum WHERE id=:id');
       $req->execute(compact('tempsMaximum','id'));
       return $req;
  }
  public function updateRevenue($revenue,$id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('UPDATE enquete SET revenue=:revenue WHERE id=:id');
       $req->execute(compact('revenue','id'));
       return $req;
  }
  public function updatePrincipaleRapport($id,$rapport){
       $bdd=$this->baseConnection();
        $req1=$bdd->prepare('UPDATE etapePrincipale SET rapport=:rapport WHERE id=:id');
        $req1->execute(compact('rapport','id'));
        $req2=$bdd->prepare('UPDATE etapePrincipale SET evolution="terminé" WHERE id=:id');
        $req2->execute(compact('id'));
        $req3=$bdd->prepare('UPDATE etapePrincipale SET dateFin=NOW() WHERE id=:id');
        $req3->execute(compact('id'));
       return $req3;

  }
  public function updateIntermediaireRapport($id,$rapport){
       $bdd=$this->baseConnection();
       $req1=$bdd->prepare('UPDATE etapeIntermediaire SET rapport=:rapport WHERE id=:id');
       $req1->execute(compact('rapport','id'));
       $req2=$bdd->prepare('UPDATE etapeIntermediaire SET evolution="terminé" WHERE id=:id');
       $req2->execute(compact('id'));
       $req3=$bdd->prepare('UPDATE etapeIntermediaire SET dateFin=NOW() WHERE id=:id');
       $req3->execute(compact('id'));
       return $req3;

  }
  public function getListeEtapePrincipale(){
      $bdd=$this->baseConnection();
      $req=$bdd->query('SELECT * FROM listeEtape WHERE type="principale"');
      return $req;
  }
   public function getListeEtapeIntermediaire(){
      $bdd=$this->baseConnection();
      $req=$bdd->query('SELECT * FROM listeEtape WHERE type="intermediaire"');
      return $req;
  }
   public function getListeEtapePrincipaleByEnqueteId($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('SELECT * FROM etapePrincipale WHERE idEnquete=:id');
      $req->execute(compact('id'));
      return $req;
  }

  public function getListeEtapeIntermediaireByEnqueteId($id){
       $bdd=$this->baseConnection();
       $req=$bdd->prepare('SELECT * FROM etapeIntermediaire WHERE idEnquete=:id');
       $req->execute(compact('id'));
       return $req;
  }

  public function createEnqueteEtapePrincipale($idEnquete,$nom,$administrateurs,$tempsMaximum){
     $bdd=$this->baseConnection();
     $req=$bdd->prepare('INSERT INTO etapePrincipale(idEnquete,nom,administrateurs,tempsMaximum) VALUES(:idEnquete,:nom,:administrateurs,:tempsMaximum)');
     $req->execute(compact('idEnquete','nom','administrateurs','tempsMaximum'));
     return $req;

  }
  public function createEnqueteEtapeIntermediaire($idEnquete,$nom,$administrateurs,$tempsMaximum){
     $bdd=$this->baseConnection();
     $req1=$bdd->prepare('INSERT INTO etapeIntermediaire(idEnquete,nom,administrateurs,tempsMaximum) VALUES(:idEnquete,:nom,:administrateurs,:tempsMaximum)');
     $req1->execute(compact('idEnquete','nom','administrateurs','tempsMaximum'));
     $req2=$bdd->prepare('INSERT INTO listeEtape(nom,type) VALUES(:nom,"intermediaire")');
     $req2->execute(compact('nom'));
     return $req2;
  }


  public function getDateCreationFormat($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('SELECT DATE_FORMAT(dateCreation,"%H/%i/%s/%m/%d/%Y") as dateDebut FROM enquete WHERE id=:id');
      $req->execute(compact('id'));
      return $req;
  }

  public function getDateCreationFormatY($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('SELECT DATE_FORMAT(dateCreation,"%Y") as dateDebut FROM enquete WHERE id=:id');
      $req->execute(compact('id'));
      return $req;
  }
  public function getEtapePrincipaleDateFinFormat($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('SELECT DATE_FORMAT(dateFin,"%H/%i/%s/%m/%d/%Y") as dateFin FROM etapePrincipale WHERE id=:id');
      $req->execute(compact('id'));
      return $req;
  }
  public function getEtapeIntermediaireDateFinFormat($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('SELECT DATE_FORMAT(dateFin,"%H/%i/%s/%m/%d/%Y") as dateFin FROM etapeIntermediaire WHERE id=:id');
      $req->execute(compact('id'));
      return $req;
  }
  public function finEnquete($id){
      $bdd=$this->baseConnection();
      $req=$bdd->prepare('UPDATE enquete SET dateFin=NOW() WHERE id=:id');
      $req->execute(compact('id'));
      return $req;
  }


}
