<?php 
include('include/header.php');


?>

<!-- <div class="loader">
    <h3>Welcome to </h3>
    <h3>the </h3>
    <h3>Zain's Store </h3>
</div> -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }


  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
<!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper " speed="100" loop="true">
    <div class="swiper-slide"> <img src="images/banner3.jpg" class="d-block w-100" alt="..."></div>
    <div class="swiper-slide"><img src="images/banner2.jpg" class="d-block w-100" alt="..."></div>
    <div class="swiper-slide"><img src="images/banner1.jpg" class="d-block w-100" alt="..."></div>

  </div>
  <div class="swiper-pagination"></div>
</div>

<style>
  .sw1 {
    border: 1px solid transparent;
    border-radius: 50%;
    width: 180px;
    height: 180px;
  }

  .cardiv {
    text-align: center;
    margin: 0 auto;
  }
</style>

<!-- cras  -->
<div class="section2 mt-5 mb-5 pt-5 pb-5 ">
  <div class="text2  ">
    <h2 class="text2h2 text-center" style="font-weight:700; line-height: 46px;  font-size: 36px; ">SHOP WITH <span
        class="sp1">US</span></h2>
    <p class="text2 text-center" style="color: #6b778d; line-height: 1.5;  font-size: 16px; ">HandPick Favourites just
      for you</p>
  </div>
  <div class="container mb-5">

    <div class="owl-carousel">

      <?php 
$cate=mysqli_query($con , "SELECT * from categories ");
while($cate2=mysqli_fetch_array($cate)){



    ?>
      <div class="cardiv"> <img src="admin/dark/<?php echo $cate2['img']?>" class="sw1">
        <a href="products.php?categorie=<?php echo $cate2['cname']?>&cid=<?php echo $cate2['id']?>"
          style="text-decoration:none">
          <div class="itstext1 text-center mt-4 ">
            <?php echo $cate2['cname']?>
          </div>

        </a>
      </div>
      <?php }?>
    </div>

  </div>

</div>

<!-- Section 2 -->





<!-- section before section 3 -->

<div class="sectionmss  bg-light" style="padding:70px;">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="tt1">All Branded Men's Suits are Flat <span class="sp1"> 30% Discount</span> </h1>
        <h5 class="tt2 mt-4">Visit our shop to see amazing creations from our designers.</h5>
        <a href="about.php" class=""><button class="btns1 mx-auto text-center mt-4">Explore More</button></a>


      </div>

      <div class="col-md-5 "><img src="images/1.jpg" alt="" class="img-fluid floating mt-4"></div>
    </div>
  </div>
</div>
<!-- SECTION 3 -->



<div class="section3  p-5 ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 ">
        <img src="images/33.jpg" alt="" class="img-fluid floating mt-4">
      </div>
      <div class="col-md-4 ps-5">
        <h2 class="text2  pt-5 ">
          ALL BRANDED WOMEN'S<br>BAGS ARE FLAT <span class="sp1">30% <br> DISCOUNT</span>
        </h2>
        <p class="texto2  ">
          Visit our shop to see amazing creations from our designers.
        </p>
        <div class="btn2  pb-5 pt-2">
          <a href="offer.php"> <button class="btnn2  ">
              See Our Amazing Offers
            </button></a>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- SECTION 5 -->
<div class="section5">
  <div class="text5">
    <h2 class="text2h2 text-center" style="font-weight:700; line-height: 46px;  font-size: 36px; ">SHOP WITH <span
        class="sp1">US</span></h2>
    <p class="text2 text-center" style="color: #6b778d; line-height: 1.5;  font-size: 16px; ">HandPick Favourites just
      for you</p>
  </div>


  <!-- SECTION P1  -->

  <div class="container mt-5">
    <div class="row">

      <?php
      $card=mysqli_query($con, "SELECT * from products order by id desc limit 12");
      while($card2=mysqli_fetch_array($card)) {
      $img=$card2['img1'];
      
      
      $cid=$card2['cid'];
      $card3=mysqli_query($con ,"SELECT * from categories where id='$cid'");
      $card4=mysqli_fetch_array($card3);
      
                  ?>
      <div class="col-md-3">
        <div class="card-container cardshopping">
          <img src="admin/dark/<?php echo $img ?>" alt="Product Image">
          <div class="hover-content card-hover">
            <a href="pdetails.php?pdid=<?php echo $card2['id']?>"><button class="btn btn-hover">Details</button></a>
          </div>
          <div class="shoppingcart cart1-icons">
            <a href="pdetails.php?pdid=<?php echo $card2['id']?>"> <i class="fas fa-eye icon icon1-eye"></i></a>
            <a href="insertcart.php?pid=<?php echo $card2['id']?>"> <i
                class="fas fa-shopping-cart icon icon1-cart"></i></a>
          </div>
        </div>
        <div class="product-details details1">
          <?php echo $card2['title']?>
          <p><span class="price">
              <?php echo $card2['price']?>
            </span> <span class="new-price">
              <?php echo $card2['discountprice']?>
            </span></p>
        </div>
      </div>
      <?php }?>

    </div>
  </div><!-- SECTION 6 -->
  <div class="section6">
    <h1 class="s6one text-center pt-5 " style=" color:white; line-height: 46px;  font-size: 36px; ">TONS OF PRODUCTS &
      <br> OPTIONS TO <span class="sp1">CHANGE</span>
    </h1>

    <p class="text6 text-center pt-2 pb-4" style="    line-height: 25px;font-size: 16px; color: #fff; opacity: 0.9;"> Ea
      consequuntur illum facere aperiam sequi optio consectetur adipisicing <br> elitFuga, suscipit totam animi
      consequatur saepe blanditiis.Lorem ipsum <br> dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
      consectetur <br> adipisicing elit.. </p>
    <div class="btn6 mx-auto text-center pb-5 ">
      <a href="contact.php"> <button class="btnn99  ">
          Reaches Us
        </button></a>
    </div>
  </div>
  <!-- section 8  -->
  <section class="scalable-web-data-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-section">
          <h1 class="display-4">Getting Scalable Web Data on Autopilot</h1>
          <p class="lead">Grow your business faster with our advanced technologies for converting websites into
            actionable data.</p>
          <a href="offer.php" class="btn btn-primary btn-lg btnn2 mb-4 ">See What We Offer</a>
        </div>
        <div class="col-md-6">
          <!-- You can replace the src with a real image URL or path -->
          <img src="images/11.jpg" alt="Web Data Illustration" class="img-fluid floating">
        </div>
      </div>
    </div>
  </section>

  <!-- feedback review -->
  <div class="text2 mt-5  ">
    <h2 class="text2h2 text-center" style="font-weight:700; line-height: 46px;  font-size: 36px; ">CUSTOMER <span
        class="sp1">REVIEWS</span></h2>
    <p class="text2 text-center" style="color: #6b778d; line-height: 1.5;  font-size: 16px; ">OUR CUSTOMER OUR FIRST
      PIORITY</p>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="review-card shadow p-3 mb-5 bg-body rounded">
          <div class="d-flex align-items-center">
            <img src="images/c1.jpg" class="rounded-circle me-3" alt="User 1" width="50">
            <div>
              <h5 class="mb-0">John Doe</h5>
              <small class="text-muted">October 17, 2024</small>
            </div>
          </div>
          <p class="mt-3">This is a fantastic product! Highly recommended.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="review-card shadow p-3 mb-5 bg-body rounded">
          <div class="d-flex align-items-center">
            <img src="images/c2.jpg" class="rounded-circle me-3" alt="User 2" width="50">
            <div>
              <h5 class="mb-0">Jane Smith</h5>
              <small class="text-muted">October 16, 2024</small>
            </div>
          </div>
          <p class="mt-3">Great value for the price. Will buy again!</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="review-card shadow p-3 mb-5 bg-body rounded">
          <div class="d-flex align-items-center">
            <img src="images/c3.jpg" class="rounded-circle me-3" alt="User 3" width="50">
            <div>
              <h5 class="mb-0">Alice Johnson</h5>
              <small class="text-muted">October 15, 2024</small>
            </div>
          </div>
          <p class="mt-3">Amazing quality and fast shipping. Love it!</p>
        </div>
      </div>
    </div>
  </div>




  <?php 
include('include/footer.php');


?>

  </body>

  </html>