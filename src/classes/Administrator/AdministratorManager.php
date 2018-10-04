<?php
namespace App\classes\Administrator;
use App\classes\database\Manager;
use App\classes\Administrator\Administrator;
use \PDO as PDO;
    Class AdministratorManager extends Manager{

    	public function create(Administrator $user){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('INSERT INTO administrateur(userName,userFirstName,email,photoDeProfil) VALUES(:userName,:userFirstName,:email,:photoDeProfil)');
           $req->execute(array(

              'userName'=>$user->getUserName(),
              'userFirstName'=>$user->getUserFirstName(),
              'email'=>$user->getEmail(),
              'photoDeProfil'=>$user->getPhotoDeProfil()==null?'src/public/photo_administrateur/anonyme.jpg':$user->getPhotoDeProfil()
           ));
    	}
    	public function read($username,$userfirstname){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('SELECT * FROM administrateur WHERE userName=:username AND userFirstName=:userfirstname');
           $req->execute(array(
            'username'=>$username,
            'userfirstname'=>$userfirstname
           )
           );
           return $req;
}
        public function readById($id){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('SELECT * FROM administrateur WHERE id=:id');
           $req->execute(compact('id'));
           return $req;
        }
      	public function update(Administrator $user,$id=null){
          $tab_user=array('userName'=>$user->getUserName(),'email'=>$user->getEmail(),'motpass'=>$user->getMotpass(),'photoDeProfil'=>$user->getPhotoDeProfil());
         // var_dump($tab_user);
          //var_dump(get_class_methods(get_class($user)));

          //die();
          foreach($tab_user as $attribute=>$value){
            $ucattr=ucfirst($attribute);
            $method1='get'.$ucattr;
            //var_dump($method1);
                 try{
                  if(method_exists(get_class($user), $method1)){
                    //echo "Parfait";
                    //die();
                    if($user->$method1()!=null){
                       $method2='set'.$ucattr;
                       if(method_exists(get_class($user),$method2)){
                         $user->$method2($user->$method1());
                         $method3='update'.$ucattr;
                         if(method_exists($this, $method3)){
                          if($user->getId()!=null)
                            {
                               $req=$this->read($user->getUserName())->fetch(PDO::FETCH_OBJ);
                               $this->$method3($user->$method1(),$req->id);
                            }
                            else{
                               $this->$method3($user->$attribute,$id);
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



      public function updateId($new,$old){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE administrateur SET id=:new WHERE id=:old');
        $req->execute(array(
             'new'=>$new,
             'old'=>$old
        ));
      }

       public function updateEmail($email,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE administrateur SET email=:email WHERE id=:id');
        $req->execute(array(
             'email'=>$email,
             'id'=>$id
        ));
      }

      public function updateUserName($userName,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE administrateur SET userName=:userName WHERE id=:id');
        $req->execute(array(
             'userName'=>$userName,
             'id'=>$id
        ));
      }
       public function updateUserFirstName($userFirstName,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE administrateur SET userFirstName=:userFirstName WHERE id=:id');
        $req->execute(array(
             'userFirstName'=>$userFirstName,
             'id'=>$id
        ));
      }

      public function updatePhotoDeProfil($photoDeProfil,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE administrateur SET photoDeProfil=:photoDeProfil WHERE id=:id');
        $req->execute(array(
             'photoDeProfil'=>$photoDeProfil,
             'id'=>$id
        ));
      }

    	public function deleteAdministrator($id){
           $bdd=$this->baseConnection();
           $req1=$bdd->prepare('DELETE FROM administrateur WHERE id=:id');
           $req1->execute(array(
            'id'=>$id
          ));

           return $req1;
    	}
    	public function getList(){
          $bdd=$this->baseConnection();
          $req=$bdd->query('SELECT * FROM administrateur');
          return $req;

    	}

    	public function userNotAlreadyExist($username,$userfirstname){
          $exist=[];
          $bdd=$this->baseConnection();
          $req=$bdd->prepare('SELECT userName from administrateur WHERE userName=:username AND userFirstName=:userfirstname');
          $req->execute(array(
            'username'=>$username,
            'userfirstname'=>$userfirstname

          ));
          if($req->rowCount()!=0){
            $exist['username']='username';
          }
          $req->closeCursor();
          return $exist;
    	}

    }
