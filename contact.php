<?php 
include('include/header.php');


?> 
<section class="banner-section">
    <div class="dark-overlay"></div>
    <div class="content-box text-center">
        <h1 class="title-text">Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="path-navigation justify-content-center">
                <li class="path-item"><a href="index.php">Home</a></li>
                <li class="path-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</section>

 <div class="container-fluid">
 <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5 col-sm-12">
        <h3 class="h3a">
            GET IN  <span class="hss">TOUCH</span>
        </h3>
        <p class="tsa">
            We're ready to lead you into the future with Business Services
        </p>
<h5 class="hs">
Contact us :  <span class="no">0332455555</span>
                </h5> 
                <h5 class="hs">
                    Email : <span class="no">zain33@gmail.com</span>
                                    </h5> 
                                    <p class="tsa">
                                    433 California St, Suite 300 San Francisco, CA 94104, USA
        </p>
        <h3 class="h3a">
            Working <span class="hss">Hours</span>
        </h3>
        <p class="tsa">
             Business Services
        </p>
 
                                    <p class="tsa">
                                    Monday to Friday 8.00 am - 6.00 pm <br>

Saturday and Sunday - Closed 
        </p>
        <p class="tsa">
        Customer support:
        </p>
 
                                    <p class="tsa">
                                    Monday to Friday 8.00 am - 6.00 pm <br>

Saturday 10.00 am - 4.00 pm <br>

Sunday - Closed
        </p>

    </div>
    <div class="col-md-5 mt-4 col-sm-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3431.254367293983!2d73.07802581119827!3d30.68311847450236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8467c1326d5cd0e1%3A0x5303bf60233cd7b5!2sTwo%20Lions%20Media!5e0!3m2!1sen!2s!4v1713769898010!5m2!1sen!2s" width="330" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-md-1"></div> 
 
</div>
 </div> 

 <div class="b3"> 
    <section class="container-fluid">
      
          <form class="row g-3 " method="post"  >
            <h3 class="contact1 text-center">Fill out the form</h3>
          <div class="col-md-4 col-sm-12" style="padding-left:0;">
    
    
    <input type="text" class="form-control fname cnt12  " id="fname" name="name" required placeholder="Name"  >
    <span class="text-danger" id="sfname"></span>
    </div>
     
<div class="col-md-4 col-sm-12">

 
<input type="email" class="form-control cnt12" id="inputEmail4" name="email" required placeholder="Email" >
</div>
<div class="col-md-4 col-sm-12 " style="padding-right:0;">
    
    <input type="text" class="form-control cnt12" id="inputEmail4" name="subject" required placeholder="Subject" >
    </div>
    <textarea name="msg" id="" class="form-control col-md-12 " placeholder="Write down your message"  ></textarea>
 
 
<div class="col-md-12 " style="padding-left:0;">
<button type="submit" class="btn btn-primary m-auto ps-5 pe-5 pt-3 pb-3 ora btnn2" name="btn-msg"  >
    Send </button><span>
    
</span>
</div>
</form>
       </div>
        </div>
    </section>
    <!-- <section class="container">
  <form class="row g-3" method="post">
    <h3 class="contact1 text-center">Fill out the form</h3>
    <div class="col-md-4 col-sm-12" style="padding-left:0;">
      <input type="text" class="form-control fname cnt12" id="fname" name="name" required placeholder="Name">
      <span class="text-danger" id="sfname"></span>
    </div>
    <div class="col-md-4 col-sm-12">
      <input type="email" class="form-control cnt12" id="inputEmail4" name="email" required placeholder="Email">
    </div>
    <div class="col-md-4 col-sm-12" style="padding-right:0;">
      <input type="text" class="form-control cnt12" id="inputEmail4" name="subject" required placeholder="Subject">
    </div>
    <div class="col-12">
      <textarea name="msg" id="" class="form-control" placeholder="Write down your message"></textarea>
    </div>
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary m-auto ps-5 pe-5 pt-3 pb-3 ora btnn2" name="btn-msg">
        Send
      </button>
    </div>
  </form>
</section> -->
    </div>

<script type="text/javascript">

 







</script>
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
     
     
     
     if (isset($_POST['btn-msg'])){
        $name= $_POST['name'];
        
        $email= $_POST['email'];
        $subject= $_POST['subject'];
        $msg= $_POST['msg'];
        $date=date('d-m-y');
        
           $contact=mysqli_query($con,"SELECT email,msgdate from contact where email='$email'");
           $datamsg =mysqli_fetch_array($contact);
           $dbdate=$datamsg["msgdate"];
           if ($date==$dbdate) {
            echo "<script>alert('you cant sent message before 24 hours') </script>";
            exit();
             
           }
            else {
              
            mysqli_query($con,"INSERT INTO contact(name ,email,subject,message ,msgdate) VALUES('$name','$email','$subject','$msg','$date')");
    
            echo "<script>alert('messsage sent successfully') </script>";
         
            echo "<script>window.location='index.php'</script>"; 
            }
    }  
     ?> 
</body>
</html>