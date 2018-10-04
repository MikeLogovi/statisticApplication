<?php
namespace App\classes\User;
use App\classes\database\Manager;
use App\classes\User\User;
use \PDO as PDO;
    Class UserManager extends Manager{

    	public function create(User $user){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('INSERT INTO utilisateur(userName,motpass) VALUES(:userName,:motpass)');
           $req->execute(array(
              'userName'=>$user->getUserName(),
              'motpass'=>$user->getMotpass(),
           ));
    	}
    	public function read($username){
           $bdd=$this->baseConnection();
           $req=$bdd->prepare('SELECT * FROM utilisateur WHERE userName=:username');
           $req->execute(array(
            'username'=>$username
           )
           );
           return $req;
    	}
    	public function update(User $user,$id=null){
          $tab_user=array('userName'=>$user->getUserName(),'motpass'=>$user->getMotpass());
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
        $req=$bdd->prepare('UPDATE utilisateur SET id=:new WHERE id=:old');
        $req->execute(array(
             'new'=>$new,
             'old'=>$old
        ));
      }

      public function updateUserName($userName,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE utilisateur SET userName=:userName WHERE id=:id');
        $req->execute(array(
             'userName'=>$userName,
             'id'=>$id
        ));
      }

      public function updateMotpass($motpass,$id){
        $bdd=$this->baseConnection();
        $req=$bdd->prepare('UPDATE utilisateur SET motpass=:motpass WHERE id=:id');
        $req->execute(array(
             'motpass'=>$motpass,
             'id'=>$id
        ));
      }
    	public function delete($id){
           $bdd=$this->baseConnection();
           $req1=$bdd->prepare('DELETE FROM utilisateur WHERE id=:id');
           $req1->execute(array(
            'id'=>$id
          ));
           $req2=$bdd->prepare('DELETE FROM message WHERE idutilisateur=:id');
           $req2->execute(array(
            'id'=>$id
          ));

           return $req1;
    	}
    	public function getList(){
          $bdd=$this->baseConnection();
          $req=$bdd->query('SELECT * FROM utilisateur');
          return $req;

    	}

    	public function userNotAlreadyExist($username){
          $exist=[];
          $bdd=$this->baseConnection();
          $req=$bdd->prepare('SELECT userName from utilisateur WHERE userName=:username');
          $req->execute(array(
            'username'=>$username
          ));
          if($req->rowCount()!=0){
            $exist['username']='username';
          }
          $req->closeCursor();
          return $exist;
    	}
      public function verifyUser($userName,$motpass){
          $bdd=$this->baseConnection();
          $req=$bdd->prepare('SELECT id FROM utilisateur WHERE userName=:userName AND motpass=:motpass');
          $req->execute(array(
              'userName'=>$userName,
              'motpass'=>$motpass

          ));
          return $req->rowCount();
      }

    }
