<?php 
include('include/header.php');


?> 
<div class="container cn1 ">
  <form method="post"> 
     <div class="loginform">
        <h1 class="loginh text-center">
            Create new Password
        </h1>
        <div class="form-floating mb-3">
            
           
           <input type="password" class="form-control" id="password"  placeholder="password" name="password" required >
            <span class="text-danger" id="spassword"></span>
          </div>
          <div class="form-floating">
           
             
            <input type="password" class="form-control" id="cpassword"  placeholder="confirm password" name="cpassword" required >
            <span class="text-danger" id="scpassword"></span>
          </div>  <br> 
         
          <button type="submit" class="btn btn-primary mx-auto text-center " name="forget-pass2" 
          
          
          
          id="move" onclick="return validate();">update password</button> 
          <span class="gotosignuppage"> <a href="signup.php">Go back</a></span>
          </form>
     </div>
</div>


<script type=text/javascript>
function validate(){
     
    var password=document.getElementById('password').value;
    var cpassword=document.getElementById('cpassword').value;

    
     
    var passwordCheck =/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  
    if (passwordCheck.test(password)){
        document.getElementById('spassword').innerHTML="";
    }
    else{
        document.getElementById('spassword').innerHTML="required pattern not matching";
        return false;

    }
    if (passwordCheck.test(cpassword)){
        document.getElementById('scpassword').innerHTML="";
    }
    else{
        document.getElementById('scpassword').innerHTML="required pattern not matching";
        return false;

    }
    if (cpassword==password){
        document.getElementById('scpassword').innerHTML="";
        
    }
    else{
        document.getElementById('scpassword').innerHTML="password not matching";
        return false;
    }


};

<?php include('include/footer.php');?> 
</script>
</body>
</html>
<?php 
 


 if (isset($_POST['forget-pass2'])){
    
    $cpassword= $_POST['cpassword'];
    
 $email=$_GET['value'];
   
mysqli_query($con,"UPDATE signin set cpassword='$cpassword' where email='$email' ");


    
echo "<script>alert('password successfully updated') </script>";
 
echo "<script>window.location='login.php'</script>";
    
    
}
 

?>