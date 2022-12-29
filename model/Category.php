<?php

class Category{
    public $categoryId;
    public $categoryName;

    public function __construct($categoryId=null, $categoryName=null) {
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;

    }
    
    public static function getAllCategories($conn){
        return $conn->query("select * from category");
    }
    

}


?>

