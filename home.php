<?php
    require 'dbBroker.php';
    require 'model/book.php';
    require 'model/user.php';
   
    session_start();
    $userId = $_SESSION['userId'];
    $name = $_SESSION['name'];


    if (isset($_POST['cena'])) {
    
        $sortiraj = $_POST['cena'];
        
        if($sortiraj=='ASC'){
            $sveKnjige = Book::getAllBooksSortedByPriceASC($conn);
        }else if($sortiraj=='DESC'){
            $sveKnjige = Book::getAllBooksSortedByPriceDESC($conn);
        }
    }else{
        $sveKnjige = Book::getAllBooks($conn);
    }
    
 
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">

    <title>Knjižara</title>
     <!-- Icons font CSS-->
     <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- Vendor CSS-->
 <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
 <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
 integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link rel="stylesheet" href="css/home.css">
 
    <style>
        
        /* Modify the background color navbara */
         
        .navbar-custom {
            background-color:  #6C7B8B;
        }
        /* Modify brand and text color navbara */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: Black;
        }

    </style>

</head>
<body  >
        <nav class="navbar navbar-custom"  >
            <a class="navbar-brand" href="home.php">
                Knjižara <strong> <i>
                    Knjige
                </strong></i>
            </a> 
            <div>
            <a class="nav-link" href="home.php" style="color:black;text-decoration: none;float:left"><strong>Početna</strong> </a>
                <a class="nav-link" href="dodajKnjigu.php" style="color:black;text-decoration: none;float:left"><strong>Dodaj novu knjigu</strong> </a>
                
                <a   class="nav-link" href="logout.php" style="color:black;text-decoration: none;float:right">Odjava</a>
            </div>
        
        </nav>


        

        <div id="books" name="books">
        <div style="margin-top:5%"> 
            <label for="cena" style="margin-left:20%;font-size:16px">Sortiranje: </label>
            <select name="cena" id="cena" onchange="sortirajPoCeni()" style="background-color:#63B8FF;color:black;font-size:16px">
                    <option  >Cijena  </option>
                    <option value="ASC">Rastuća  </option>
                    <option value="DESC">Opadajuća </option>
            </select>

           </div>

           
        </div>

        <div class="container">
        <?php
        
            while ($row = $sveKnjige->fetch_array()):
               
        ?>
            <div class="card" id="nesto">
                <div class="card-header" style="padding:0">
                     <img src="<?php echo  $row['image']?>" style="height:300px;width: auto;" >   
                </div>
                <div class="card-body">
                    <div class="tag tag-teal">   <?php echo $row['categoryName']?>   </div>  
                    <br>
                    <h4 name = "naslovKartice">  <?php echo $row['name']?>  </h4>
                    <p>  <?php echo $row['description']?>  </p>  
                    <?php $cena =  $row['price']  ?>
                    <p style="font-size:20px;"> <strong>  Cijena:      </strong><?php echo $cena."din" ?> </p>
                    
                    <form  method="post">
                        <button type="button" class="btn btn-custom"  style="background-color:#a18cd1;"   ><i class="fas fa-trash" onclick="deleteBook(<?php echo   $row['bookId'];?>)"></i></button>  
 
                    </form>
                </div> 
            </div>

        <?php endwhile;?>
    </div>



        </div>      
       


        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>


function sortirajPoCeni() {
    var sortiraj = $("#cena").val();
    console.log(sortiraj);


    $("#books").html("");
    $.post("home.php#nesto", { cena: sortiraj }, function (data) {
        $("#books").html(data);
    });
    $('html, body').animate({
        scrollTop: $("#books").offset().top
    }, 2000);




}


function deleteBook(deleteid){


    request = $.ajax({  
        url: 'handler/delete.php',  
        type: 'post',
        data: {deleteid:deleteid},

        success: function(data, status){
            location.reload(true);
            alert("Uspjesno obrisano!");
}
}); 
}

</script>          
            

</body>
</html>