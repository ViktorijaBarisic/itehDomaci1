<?php

class Book{
    public $bookId;
    public $name;
    public $price;
    public $description;
    public $image;
    public $category;

    public function __construct($bookId=null, $name=null, $price=null, $description=null, $image=null, $category=null){
        $this->bookId = $bookId;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->category = $category;

    }

   
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



}
?>