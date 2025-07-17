<?php 
  include('db.php');
  session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITENEST</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="images/01alogof.png" type="image/x-icon">
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Protest+Guerrilla&family=Sevillana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/owlcras.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/pdetails.css" />
    <link rel="stylesheet" href="css/cards.css">
     <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- SECTION 1 -->

<div class="sectionabove">  
    <div class="container">
    <?php
      if (isset($_SESSION['uid'])) {
        $user_id=$_SESSION['uid'];
        $data=mysqli_query($con,"SELECT *from signin where id='$user_id'");
       
        $datarow=mysqli_fetch_array($data);
        $fname=$datarow['fname'];
        $lname=$datarow['lname'];
        $img=$datarow['img'];
        echo "<a href='users/dark/dashboard.php' class='username '><img src='$img' alt='' class='userimg'> $fname $lname </a>
        <a href='logout.php' class='username'> | Logout </a>
        ";
      }
      else 
      {
   echo "<a href='signup.php'> 
         <button type='button' class='btnn btn-primary white2'>
         <span class=''><i class='fa-solid fa-user     '></i> </span>  Sign in  
         </button></a>  ";
      } ?>

<a href="fvrt.php">
  <button type="button" class="btnn btn-primary white2">
  <span class="fdfd"><i class='fa-solid fa-heart'></i></span> Wishlist</button>
</a>
<a href="cart.php">
  <button type="button" class="btnn btn-primary white2">
  <span class="fdfd"><i class='fa-solid fa-cart-shopping'></i></span> My Cart</button>
</a>
</div>
</div>
<section class="section1">
  <div class="container-fluid">     
  <nav class="navbar navbar-expand-lg headertwo ">
  <div class="container-fluid headertwo">
    <a class="navbar-brand" href="index.php" class="zainlogo white">
      <img src="images/01alogof.png" alt="" class="zainlogo2"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link whiterip index " href="index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link whiterip about" href="about.php">About</a>
        </li>
        <style >.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; /* remove the gap so it doesn't close */
}</style>
        <li class="nav-item dropdown whiterip ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <?php 
$cate=mysqli_query($con , "SELECT * from categories ");
while($cate2=mysqli_fetch_array($cate)){



    ?>
            <li><a class="dropdown-item" href="products.php?categorie=<?php echo $cate2['cname']?>&cid=<?php echo $cate2['id']?>"> <?php echo $cate2['cname']?></a></li>
          <?php }?>
             
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link whiterip offer" href="offer.php">What We Offer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link whiterip contact" href="contact.php">Contact Us</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link white" href="#">Blogs</a>
        </li> -->
        
      
      </ul>
<div class="containerr">
   <div class="search">
      <form method="get" action="sresult.php">
        <input placeholder="Search..." type="text" required name="search">
        <button type="submit">Go</button>
      </form>
    </div>
</div>
</div>
</div>
</nav>
</div>
    </section>
    <!-- </div> -->
     
 