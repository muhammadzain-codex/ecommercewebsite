<?php 


include("include/header.php");
    
?>
    
</head>
<body>
     

<!-- content -->
<section class="py-5">
  <?php
  
   
  
  $pid=$_GET['pdid'];
  $pdetails=mysqli_query($con ,"SELECT * from products where id='$pid'");
  $pdetails2=mysqli_fetch_array($pdetails);
  $cid=$pdetails2['cid']; 
   $color=$pdetails2['color'];
   $colors = explode(",", $color);
    $size=$pdetails2['psize'];
   $psize = explode(",", $size);
$cdetails=mysqli_query($con ,"SELECT * from categories where id='$cid'");
  $cdetails2=mysqli_fetch_array($cdetails);




   
   
  ?>
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="admin/dark/<?php echo  $pdetails2['img1'] ?> ">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="admin/dark/<?php echo  $pdetails2['img1'] ?> " />
          </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="admin/dark/<?php echo  $pdetails2['img1'] ?> " class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="admin/dark/<?php echo  $pdetails2['img1'] ?> " />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="admin/dark/<?php echo  $pdetails2['img2'] ?> ">
            <img width="60" height="60" class="rounded-2" src="admin/dark/<?php echo  $pdetails2['img2'] ?> " />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="admin/dark/<?php echo  $pdetails2['img3'] ?> ">
            <img width="60" height="60" class="rounded-2" src="admin/dark/<?php echo  $pdetails2['img3'] ?> " />
          </a>
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="admin/dark/<?php echo  $pdetails2['img4'] ?> ">
            <img width="60" height="60" class="rounded-2" src=" admin/dark/<?php echo  $pdetails2['img4'] ?> " />
          </a>
          
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <!-- <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div> -->
             
          </div>
          <p>
          
          </p>

          <div class="row">
            <dt class="col-3">Prodcut:</dt>
            <dd class="col-9"><?php  echo $pdetails2['title']?></dd>

            <dt class="col-3">Categorie:</dt>
            <dd class="col-9"><?php  echo $cdetails2['cname']?></dd>

            <dt class="col-3">Actual Price:</dt>
            <dd class="col-9">Rs.<del><?php  echo $pdetails2['price']?></del></dd>

            <dt class="col-3">Discounted Price:</dt>
            <dd class="col-9">Rs.<?php  echo $pdetails2['discountprice']?></dd>

            <dt class="col-3">Description:</dt>
            <dd class="col-9"><?php  echo $pdetails2['discription']?></dd>
          </div>

          <hr />
          <form method="get" action="checkout.php"> 

          <div class="row mb-4">
            <div class="col-md-4 col-6">

            <input type="hidden" name="pid" value="<?php echo $pdetails2['id']?>">
            <input type="hidden" name="price" value="<?php echo $pdetails2['discountprice']?>">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" style="height: 35px;" name="size" required>
                <?php  

 foreach ($psize as $value2) {
           echo " <option value='$value2'>$value2</option>";
        }
?>
              </select>
            </div>
            <div class="col-md-4 col-6">
              <label class="mb-2">Colors</label>
              <select class="form-select border border-secondary" style="height: 35px;" name="color" required>
                
<?php  

 foreach ($colors as $value) {
           echo " <option value='$value'>$value</option>";
        }
?>
               
                 
              </select>
            </div>
            <!-- col.// -->
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
               <input type="number" value="01" min="1" max="100" class="form-control" name="quantity" required>
            </div>
            
          </div>
          <button class="btn btn-warning shadow-0" type="submit" name="buy"> Buy now </button></form> <br>
          
          <a href="insertfvrt.php?pid=<?php echo $pid ?>" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
        </div>
      </main>
    </div>
  </div>
</section>
<?php  
    ?>
<!-- content -->

 
<?php include("include/footer.php");
    ?>
</body>
</html>

