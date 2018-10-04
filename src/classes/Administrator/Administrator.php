<?php
namespace App\classes\Administrator;
    Class Administrator{
    	protected $id;
    	protected $userName;
        protected $userFirstName;
        protected $email;
        protected $photoDeProfil;
    	public function __construct($id=null,$userName=null,$userFirstName=null,$email=null,$photoDeProfil=null){
            if($id!=null){
                $this->setId($id);
            }
            if($userName!=null){
                $this->setUserName($userName);
            }

             if($userFirstName!=null){
                $this->setUserFirstName($userFirstName);
            }
            if($email!=null){
                $this->setEmail($email);
            }

            if($photoDeProfil!=null){
                $this->setPhotoDeProfil($photoDeProfil);
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
        public function getUserFirstName(){
            return $this->userFirstName;
        }
        public function setUserFirstName($userFirstName){
            $this->userFirstName=$userFirstName;
        }
    	public function getEmail(){
    		return $this->email;
    	}
    	public function setEmail($email){
    		$this->email=$email;
    	}

        public function getPhotoDeProfil(){
            return $this->photoDeProfil;
        }
        public function setPhotoDeProfil($photoDeProfil){
            $this->photoDeProfil=$photoDeProfil;
        }

    }
