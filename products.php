<?php 
include('include/header.php');


?> 

</head>
<body>
 <!-- <div class="nav">
    <ul>
   <a href="#" class="index"> <li>index</li></a>
   <a href="#" class="about cusactive"> <li>about</li></a>
   <a href="#" class="contact"> <li>contact</li></a>
     
    <ul> 

 </div> -->
 <!-- braedcrum  -->
 <?php
$name=$_GET['categorie'];

 ?>
 <section class="breadcrumb-section">

    <div class="overlay"></div>
    <div class="container text-center">
        <h1 class="text-white">Items</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $name?></li>
            </ol>
        </nav>
    </div>
</section>
  
    <div class="container mt-5 mb-4">
    <div class="row g-4">
        <div class="text2  ">
        <h2 class="text2h2 text-center" style="font-weight:700; line-height: 46px;  font-size: 36px; ">SHOP WITH <span class="sp1">US</span></h2>
        <p class="text2 text-center" style="color: #6b778d; line-height: 1.5;  font-size: 16px; ">HandPick Favourites just for you</p>
    </div>
       
        
 
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
<?php 
       $cid=$_GET['cid'];
       // echo "<script>alert('$cid')</script>";
$product=mysqli_query($con , "SELECT * from products where cid='$cid' ");
while($products2=mysqli_fetch_array($product)){

   
       ?>
  <div class="col-md-4">
    
    <div class="card  " style="height:650px; overflow-y:scroll; box-sizing:border-box;">
      <img src="admin/dark/<?php echo $products2['img1']?>" class="card-img-top" alt="..." height="350px" width="100%" >
      <div class="card-body">
        <h5 class="card-title"><?php echo $products2['title']?></h5>
        <p class="card-text"><?php echo $products2['discription']?> </p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="pdetails.php?pdid=<?php echo $products2['id']?>" class="btn btn-danger"> <i class="fa-solid fa-eye"> </i> Details</a></small>
        <a href="insertcart.php?pid=<?php echo $products2['id']?>" class="btn badge-danger ms-1"><i class="fas fa-shopping-cart icon icon1-cart"></i>  Add Cart</a>
      </div>
    </div>
     
  </div>
  <?php }?>
   
</div>
 
</div>
 </div>
 </div>
 </div>
<script src="first.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        
    </script>
    <?php 
include('include/footer.php');


?> 
</body>
</html>
 