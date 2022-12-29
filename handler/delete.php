<?php
    require '../dbBroker.php';
    require '../model/Book.php';

        if(isset($_POST['deleteid'])){
               $result=  Book::deleteBook($_POST['deleteid'],$conn);

               if($result){
                   echo 'Success';
               }else{
                   echo 'Failed';
               }
            
                
         }


?>