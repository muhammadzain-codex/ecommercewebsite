<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<title>Document</title>
<head> 
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
 
<link rel="stylesheet" href="css/style.css">
<style>
 
 
 
  </style>
 </head>
<body>
          <?php 

          include('include/db.php');
          
          $ss=mysqli_query($con,"SELECT * from contact
          
           
           
           
            ");
          $ss2=mysqli_fetch_array($ss);
          
          ?>
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping"><?php echo $ss2['name']?></span>
  <input type="text" class="form-control" placeholder="<?php echo $ss2['email']?>" aria-label="Username" aria-describedby="addon-wrapping">
</div>
   
   

</div>
 </div>



  
    <script src="first.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
         
    </script>
     
</body>
</html>