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
    <title>Biblioteka</title>
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

public static function getAllBooks($conn) 
    {
        $upit = " select * from book b inner join category c on b.category=c.categoryId";
           
        return $conn->query($upit); 

    }

    public static function getAllBooksSortedByPriceDESC($conn){
        $upit = " select * from book b inner join category c on b.category=c.categoryId order by b.price desc";
       
        return $conn->query($upit); 
    }
    public static function getAllBooksSortedByPriceASC($conn){
        $upit = " select * from book b inner join category c on b.category=c.categoryId order by b.price asc";
       
        return $conn->query($upit); 
    }

    public static function deleteBook($id, $conn){
        $upit = " delete from book where bookId='$id'";
       
        return $conn->query($upit); 
    }

    public static function addBook($b, $conn){
        $upit = "insert into book (name,price,description,image,category) values ('$b->name','$b->price','$b->description','$b->image','$b->category')";
         
        return $conn->query($upit); 

    }

    za Book


    public static function getAllCategories($conn){
        return $conn->query("select * from category");
    }


    public static function loginUser(mysqli $conn, $usr){
            $upit = "SELECT * FROM user WHERE mail='$usr->mail' AND password='$usr->password'";
            //*$result = mysqli_query($conn, $upit);*/
            $rez = $conn->query($upit);
            return $rez;
        }
