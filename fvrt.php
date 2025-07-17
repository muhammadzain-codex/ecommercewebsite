<?php
include('include/header.php');
include('include/checksession.php');


?> 

<section class="breadcrumb-section2">

<div class="overlay"></div>
<div class="container text-center">
    <h1 class="text-white">Favourites</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Favourites
        </ol>
    </nav>
</div>
</section>



 
    <div class="container-fluid">
        <div class="container">
          <div class="chss">
            <table class="table" border="1px solid black">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Preview</th>
              <th scope="col">Category</th>
              <th scope="col">Name</th>
              <th scope="col">Discount Price</th>
              <th scope="col">Discription</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $uid=$_SESSION['uid'];
            $fvrt=mysqli_query($con,"SELECT * from fvrt where userid='$uid' ");
            while ($row=mysqli_fetch_array($fvrt)) {
           $pid=$row['pid'];
           $product=mysqli_query($con,"SELECT * from products where id='$pid' ");
           $prow=mysqli_fetch_array($product);
           $cid=$prow['cid'];
           $categorie=mysqli_query($con,"SELECT * from categories where id='$cid' ");
           $crow=mysqli_fetch_array($categorie);
            
           

              
             

            ?>
            <tr>
              <th scope="row"><?php echo $pid?></th>
              <td><img src="admin/dark/<?php echo $prow['img1']?>" alt="" class="pn2" width="200px"></td>
              
              <td><?php echo $crow['cname']?></td>
              <td><?php echo $prow['title']?></td>
              <td><?php echo $prow['discountprice']?></td>
              <td><?php echo $prow['discription']?></td> 
              <td>
                <a href="pdetails.php?pdid=<?php echo $pid ?>" class="btn btn-primary">View Details</a>
               <br> <br>  
              </td>
            </tr>
            <?php }?>
        
            
          </tbody>
           
        </table>
        </div>
    </div>
</div>
    <?php
    include('include/footer.php');
    
    ?>
    </body>
</html>

