 <?php 
 
 include("include/header.php");
  

 ?>
<style>
   .card-container {
      position: relative;
      overflow: hidden;
      height: auto;
      margin-bottom: 20px;
    }

    .card-container img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .hover-content {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      text-align: center;
      transform: translateY(100%);
      transition: transform 0.3s ease;
    }

    .card-container:hover .hover-content {
      transform: translateY(0);
    }

    /* Icon Container */
    .shoppingcart {
      position: absolute;
      bottom: 50px; /* Adjust to avoid overlapping with button */
      right: 10px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .card-container:hover .shoppingcart {
      opacity: 1;
    }

    /* Icons */
    .shoppingcart .icon {
      font-size: 20px;
      color: white;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 10px;
      border-radius: 50%; /* Ensuring the icons are inside circles */
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    /* Hover effect for icons */
    .shoppingcart .icon:hover {
      background-color: rgba(255, 165, 0, 0.8); /* Orange hover */
    }

    .btn-hover {
      width: 100%;
      border-radius: 0;
      color: white;
      background-color: orange;
      transition: background-color 0.3s ease;
    }

    .btn-hover:hover {
      background-color: darkorange;
    }

    .product-details {
      text-align: center;
      margin-top: 10px;
    }

    .product-details .price {
      color: grey;
      text-decoration: line-through;
    }

    .product-details .new-price {
      color: #ff5733;
    }
    </style>
</head>
<body>
 
  <div class="container mt-5">
    <div class="row">
       
      <?php
      $card=mysqli_query($con, "SELECT * from products order by id desc limit 9");
      while($card2=mysqli_fetch_array($card)) {
      $img=$card2['img1'];
      
      
      $cid=$card2['cid'];
      $card3=mysqli_query($con ,"SELECT * from categories where id='$cid'");
      $card4=mysqli_fetch_array($card3);
      
                  ?>
      <div class="col-md-3">
        <div class="card-container cardshopping">
          <img  src="admin/dark/<?php echo $img ?>" alt="Product Image">
          <div class="hover-content card-hover">
            <button class="btn btn-hover">Add to Cart</button>
          </div>
          <div class="shoppingcart cart1-icons">
            <i class="fas fa-eye icon icon1-eye"></i>
            <i class="fas fa-shopping-bag icon icon1-cart"></i>
          </div>
        </div>
        <div class="product-details details1">
        <?php echo $card2['title']?>
          <p><span class="price"><?php echo $card2['price']?></span> <span class="new-price"><?php echo $card2['discountprice']?></span></p>
        </div>
      </div>
      <?php }?>
      
    </div>
  </div>
  
<script type="text/javascript"></script>
<script src="first.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script></script>
     
</body>
</html>