<?php
    namespace Models;

    class User{

        private $userId;
        private $email;
        private $password;

        public function __construct($userId = null, $email = null, $password = null){
            $this->setUserId($userId);
            $this->setEmail($email);
            $this->setPassword($password);
        }

        public function getUserId(){return $this->userId;}
        public function setUserId($id){$this->userId = $id;}

        public function getEmail(){return $this->email;}
        public function setEmail($email){$this->email = $email;}

        public function getPassword(){return $this->password;}
        public function setPassword($password){$this->password = $password;}
    }
?>