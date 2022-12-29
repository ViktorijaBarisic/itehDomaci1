<?php

require "dbBroker.php";
require "model/user.php";


session_start();

    if( isset($_POST['mail']) && isset($_POST['password'])){
        
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $korisnik = new User(null, null, $mail, $password);

        $odgovor = User::loginUser($conn, $korisnik); 
        
        
        if($odgovor->num_rows == 1){
            
            $korsink_red = $odgovor->fetch_assoc;

            $_SESSION['userId'] = $korisnik_red['userId'];
            $_SESSION['name']= $korsinik_red['name'];

            
            header("Location: home.php");
            exit();
        }
        else{
        
            
            $korisnik=null;
            
        }
        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <title>Knjižara</title>
</head>
<body>

<h1 class="naslov"> Dobro došli u svijet knjiga! </h1>

    
<div class="login-form">


        <form method="POST" action="#">

            <div class="container">
                <label for="mail" class="lbl">Mail</label>
                <input type="mail" name="mail" id="mail" class="inpt" required>
                <br>
                <label for="password" class="lbl">Password</label>
                <input type="password" name="password" id="password" class="inpt" required>
                <br>
                <button type="submit" name="submit" value="login" class="btn btn-login">Prijavi se</button>
            </div>

        </form>
    </div>

</body>
</html>
