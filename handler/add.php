<?php
    require '../dbBroker.php';
    require '../model/Book.php';
   

    if ( isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])) {
           
           
            $b = new Book(null,$_POST['name'],$_POST['price'], $_POST['description'], $_POST['image'], $_POST['category']);
  
       
            $status=Book::addBook($b,$conn);
        
        
            
            if($status){
                
                echo 'Success';
                
            }else{
                echo 'Failed';
            }



      }
 




?>