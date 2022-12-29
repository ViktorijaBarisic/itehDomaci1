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

        public static function loginUser(mysqli $conn, $usr){
            $upit = "SELECT * FROM user WHERE mail='$usr->mail' AND password='$usr->password'";
            $rez = $conn->query($upit);
            return $rez;
        }



    }
?>