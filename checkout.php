<?php 
include("include/header.php");
?>
    
</head>
<body>
     
<?php 
   $quantity=$_GET['quantity'];
   $price=$_GET['price'];
   $total=$quantity*$price;
   $pid=$_GET['pid'];
        $psize=$_GET['size'];
        $color=$_GET['color'];
        // echo "<script>alert('$pid') </script>";
        // echo "<script>alert('$psize') </script>";
        // echo "<script>alert('$color') </script>";

  ?>
<!-- content -->
<section class="py-5">
  <?php
  if (!isset($_SESSION['uid'])) {
    echo "<script>alert('You must login First') </script>";

    echo "<script>window.location='login.php'</script>";
  }
   $uid=$_SESSION['uid'];

  
  // $pid=$_GET['pdid'];
  $udetails=mysqli_query($con ,"SELECT * from signin where id='$uid'");
  $udetails2=mysqli_fetch_array($udetails);
  $uemail=$udetails2['email']; 
//    $color=$pdetails2['color'];
//    $colors = explode(",", $color);
//     $size=$pdetails2['psize'];
//    $psize = explode(",", $size);
// $cdetails=mysqli_query($con ,"SELECT * from categories where id='$cid'");
//   $cdetails2=mysqli_fetch_array($cdetails);




   
   
  ?>
  <div class="container">

    <div class="row gx-5">

      <div class="text-center mx-auto mb-5"> 
        
      <h4 class="text-danger">Account No: PK-SWL-12345</h4>
      <h5 class="text-danger"> Bank Name: Mezzan bank</h5>
      <h6 class="text-danger">Account Title: Z Store</h6>
      </div>
      <aside class="col-lg-6" style="border-right: 2px solid darkred;">
      <h3 class="text-center pb-5">Your Details</h3>
 <form class="row g-3">
  <div class="col-md-6">
    
    <label for="inputEmail4" class="form-label"  >First Name</label>
    <input type="text" class="form-control" id="inputEmail4" readonly value="<?php echo $udetails2['fname'];?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  >Last Name</label>
    <input type="text" class="form-control" id="inputEmail4" readonly value="<?php echo $udetails2['lname'];?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  > Email</label>
    <input type="email" class="form-control" id="inputEmail4" readonly value="<?php echo $udetails2['email'];?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  >Phone Number</label>
    <input type="text" class="form-control" id="inputEmail4" readonly value="<?php echo $udetails2['phone'];?>">
  </div>
  </form>
      </aside>
      <!-- contact  -->

      <main class="col-lg-6">
      <h3 class="text-center pb-5">Booking Details</h3>
         <form class="row g-3" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  > Zip Code </label>
    <input type="text" class="form-control" id="inputEmail4" required name="zipcode"  >
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  >Street Number</label>
    <input type="text" class="form-control" id="inputEmail4" required name="snumber"  >
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  > City</label>
    <input type="text" class="form-control" id="inputEmail4" required name="city" >
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  >Payment Method</label>
    <select class="form-control" required name="ptype" id="options">
      
      <option value="">Choose...</option>
      <option value="Cash On Delivery" >Cash On Delivery</option>
      <option value="Bank Account" >Bank Account</option>
      <option value="Jazzcash">Jazzcash </option>
      <option value="Easypasia">Easypasia </option>
      <option value="Others">Others </option>
    </select>
    </div>
    
    <div class="col-md-12 " id="recipt">
    <label for="inputEmail4" class="form-label" >Recipt</label>
    <input type="file" class="form-control" id="inputEmail4 " name="img"   >
    <span class="text-danger" id="imgerror"></span>
  </div>

  <div class="col-md-12">
    <label for="inputEmail4" class="form-label"  >Delivery Address</label>
     <textarea class="form-control" required name="addres">
       
     </textarea>
  </div>
  <hr>
  <h3 class="text-center">Payment Details</h3>
  
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  > Quantity</label>
    <input type="text" class="form-control" id="inputEmail4" required name="quantity" readonly value="<?php echo $quantity?>" >
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"  > Price</label>
    <input type="text" class="form-control" id="inputEmail4" required name="price" readonly value="<?php echo $price?>">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label"  > Total Price</label>
    <input type="text" class="form-control" id="inputEmail4" required name="totalprice"readonly value="<?php echo  $total?>" >
  </div>
  <input type="submit" name="checkout" value="Checkout" class="btn btn-primary">
 </form>
        
      </main>
    </div>
  </div>
</section>
 
<?php include("include/footer.php");
    ?>
    <script type="text/javascript">
      const option = document.getElementById('options');
        const recipt = document.getElementById('recipt');
      
        option.addEventListener('change', function() {
            if (this.value === 'Cash On Delivery') {
                recipt.style.display='none';
            }
            else{
               recipt.style.display='initial';
            }
             
        });

    </script>

</body>
</html>
<?php 
if (isset($_POST['checkout'])){
    $zipcode= $_POST['zipcode'];
    $snumber= $_POST['snumber'];
    $city= $_POST['city'];
    $ptype= $_POST['ptype'];
    $addres= $_POST['addres'];
    $status=0;



    $folder= "recepit/";
    $filename=$_FILES['img']["name"];
    $unique= uniqid().$filename;
    $temname=$_FILES['img']["tmp_name"];
    $size=$_FILES['img']["size"];

    $target=$folder.basename($unique);
    $filetype=strtolower(pathinfo($target,PATHINFO_EXTENSION));
if ($ptype!="Cash On Delivery") {
  
    if ($filetype !="jpg" && $filetype !="jpeg" && $filetype !="png" && $filetype !="pdf"  ){
echo "<script>document.getElementById('imgerror').innerHTML='file is not an image';</script>";
exit();
    }
    else if($size>2097152){
        "<script>document.getElementById('imgerror').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
  }
    else{
        move_uploaded_file($temname,"admin/dark/".$target); 
                $bdate=date('y/m/d');
       


        mysqli_query($con,"INSERT INTO bookings(uid,pid,psize,color,quantity,tprice,zipcode,snumber,city,addresss,ptype,img,bdate,status) VALUES('$uid','$pid','$psize','$color','$quantity','$total','$zipcode', '$snumber' ,'$city','$addres','$ptype','$target','$bdate','$status')");

        

        require 'PHPMailer-master/PHPMailerAutoload.php';

     $mail = new PHPMailer();
       
       //Enable SMTP debugging.
       $mail->SMTPDebug = 1;
       //Set PHPMailer to use SMTP.
       $mail->isSMTP();
       //Set SMTP host name
       $mail->Host = "smtp.gmail.com";
       $mail->SMTPOptions = array(
                         'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false,
                             'allow_self_signed' => true
                         )
                     );
       //Set this to true if SMTP host requires authentication to send email
       $mail->SMTPAuth = TRUE;
       //Provide username and password
       $mail->Username = "tzain4040@gmail.com";
       $mail->Password = "kwtuojtiuowigxck";
       //If SMTP requires TLS encryption then set it
       $mail->SMTPSecure = "false";
       $mail->Port = 587;
       //Set TCP port to connect to
       
       $mail->From = "tzain4040@gmail.com";
       $mail->FromName = "ELITENEST";
       
       $mail->addAddress($uemail);
       
       $mail->isHTML(true);
      
       $mail->Subject = "Booking Information";
       $mail->Body = "<i>Your Order is Placed Wait Until Management Approvel</i>";
       $mail->AltBody = "This is the plain text version of the email content";
       if(!$mail->send())
       {
        // echo "Mailer Error: " . $mail->ErrorInfo;
       }
       else
       {
      echo "<script>alert('Booking Successfull Wait until admin approves') </script>";
     
         echo "<script>window.location='index.php'</script>";
      
       }
    }
}
?> 

