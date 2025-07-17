<?php 
include('include/header.php');


?> 
<div class="container cn1 ">
  <form method="post"> 
     <div class="loginform">
        <h1 class="loginh text-center" >
            Login into Account
        </h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control logss" name="email"id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control logss"name="password" required id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>  <br> 
          <a href="forgetpass.php">Forget Password?</a> <br> <br>
          <button type="submit" class="btn btn-primary mx-auto text-center " name="btn-login"  id="move">login</button> <span class="gotosignuppage"> <a href="signup.php">Don't have an account?</a></span>
          </form>
     </div>
</div>
<?php include('include/footer.php');?> 
</script>
</body>
</html>
<?php 
session_start();
 if (isset($_POST['btn-login'])) {
  $email= $_POST['email'];
  $password= $_POST['password'];

  $data=mysqli_query($con,"SELECT *from signin where email='$email' AND cpassword='$password'  ");
  $rows=mysqli_num_rows($data);
  $datarow=mysqli_fetch_array($data);
  $uid=$datarow['id'];
  
  if ($rows==0) {
    echo "<script>alert('invalid information')</script>";
    
    
  }
  else {
   $_SESSION['uid']=$uid;
    echo "<script>alert('login successful')</script>";

    echo "<script>window.location='index.php'</script>";
  }
 }




?>