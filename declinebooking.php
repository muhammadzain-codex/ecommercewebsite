<?php 

include('../../include/db.php');
$bid=$_GET['bid'];
$email=$_GET['email'];
mysqli_query($con , "UPDATE bookings set status='2' where id='$bid'");
 require '../../PHPMailer-master/PHPMailerAutoload.php';

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
       
       $mail->addAddress($email);
       
       $mail->isHTML(true);
       $mail->Subject = "Booking Information";
       $mail->Body = "<i>Your Order is DECLINE!</i>";
       $mail->AltBody = "This is the plain text version of the email content";
      
       if(!$mail->send())
       {
        // echo "Mailer Error: " . $mail->ErrorInfo;
       }
       else
       {
       echo "<script>alert('BOOKING DECLINE successfully')</script>";
       echo "<script> window.location='pbooking.php'</script>";
      
       }

 

?>