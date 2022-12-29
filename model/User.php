<?php
    class User{
        public $userId;
        public $name;
        public $mail;
        public $password;

        public function __construct($userId=null, $name=null, $mail=null, $password=null){
            $this->userId = $userId;
            $this->name = $name;
            $this->mail = $mail;
            $this->password = $password;
        }

        
    }
?>