<?php
namespace App\classes\User;
    Class User{
    	protected $id;
    	protected $userName;
        protected $motpass;
    	public function __construct($id=null,$userName=null,$motpass=null){
            if($id!=null){
                $this->setId($id);
            }
            if($userName!=null){
                $this->setUserName($userName);
            }

            if($motpass!=null){
                $this->setMotpass($motpass);
            }

        }
        public function setId($id){
             $this->id=$id;
        }
    	public function getId(){
            return $this->id;
    	}
    	public function getUserName(){
    		return $this->userName;
    	}
    	public function setUserName($userName){
    		$this->userName=$userName;
    	}
        public function getMotpass(){
            return $this->motpass;
        }
        public function setMotpass($motpass){
            $this->motpass=$motpass;
        }

    }
