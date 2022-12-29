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

    





}
?>