<?php 
include('include/header.php');


?> 




<div class="container cn1 ">
     <div class="loginform">
        <h5 class="loginh text-center">
        Please enter your email address to search for your account.
        </h5>
        <form method="Post"> 
        <div class="form-floating mb-3">
            <input type="email" class="form-control logss" name="email" required id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="btn-1">
               
          <button type="submit" class="btn btn-primary white" name="forget" >
               sent email</button>
               </form>
          <span class="goback"><a href="index.php">Go back?</a></span>
          </div>
           
     </div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
<?php
if (isset($_POST['forget'])) {
 $email= $_POST['email'];
 $data=mysqli_query($con,"SELECT *from signin where email='$email' ");
 $rows=mysqli_num_rows($data);
//  $datarow=mysqli_fetch_array($data);
//  $uid=$datarow['id'];
 
 if ($rows==0) {
   echo "<script>alert('no email found in records')</script>";
 }
 else {
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
       $mail->FromName = "project";
       
       $mail->addAddress($email);
       
       $mail->isHTML(true);
      
       $mail->Subject = "This mail is from z store to reset your password";
       $mail->Body = "<i>click the link below  to reset your password:</i><br>
       
       http://localhost/project/forgetpass2.php?value=$email
       ";
       $mail->AltBody = "This is the plain text version of the email content";
       if(!$mail->send())
       {
        // echo "Mailer Error: " . $mail->ErrorInfo;
       }
       else
       {
       echo "<script>alert('Mail has been sent successfully')</script>";
       echo "<script> window.location='login.php'</script>";
      
       }
       }
 }

?> 
 
 
 