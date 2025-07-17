<?php 
include('include/header.php');


?> 
<div class ="signupp cn1">
<div class="container "> 
    <section class="b1">
      
          <form class="row g-3 " method="post" enctype="multipart/form-data" >
          <div class="col-md-6">
    
    <label for="inputEmail4" class="form-label  "    >First name</label>
    <input type="text" class="form-control fname" id="fname" name="fname" required >
    <span class="text-danger" id="sfname"></span>
    </div>
    <div class="col-md-6">
    
<label for="inputEmail4" class="form-label  " name="lname" >Last name</label>
<input type="text" class="form-control" id="lname" name="lname" required >
<span class="text-danger" id="slname"></span>
</div>
<div class="col-md-6">

<label for="inputEmail4" class="form-label  "  >Email</label>
<input type="email" class="form-control" id="inputEmail4" name="email" required >
</div>
<div class="col-md-6 ">
    <label for="inputEmail4" class="form-label"  >Phone Number</label>
    <input type="text" class="form-control" id="inputEmail4" name="phonenumber" required >
    </div>
<div class="col-md-6">
<label for="inputPassword4" class="form-label"     >Password</label>
<input type="password" class="form-control" id="password" name="password" required >
<span class="text-danger" id="spassword"></span>

</div>
<div class="col-md-6">
    <label for="inputPassword4" class="form-label"     >Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required >
    <span class="text-danger" id="scpassword"></span>
    </div>
<div class="col-12">
<label for="inputAddress" class="form-label"  >Images</label>
<input type="file" class="form-control" name="img" id="img"  > 
<span class="text-danger" id="imgerror"></span>
</div>
<div class="col-12">
    <label for="inputAddress" class="form-label"  >Addresss</label>
    <input type="text" class="form-control" name="addresss" id="inputAddress" placeholder="1234 Main St" required >
    </div>
<div class="col-12">
<button type="submit" class="btn btn-primary" name="signup" onclick="return validate();">Sign up</button><span>
    <a href="login.php">Already have an account?</a>
</span>
</div>
</form>
       </div>
        </div>
    </section>
    </div>
</div>


<script type=text/javascript>
function validate(){
    var fname=document.getElementById('fname').value;
    var lname=document.getElementById('lname').value;
    var password=document.getElementById('password').value;
    var cpassword=document.getElementById('cpassword').value;

    var fnameCheck=/^[A-Za-z]{3,20}$/;
    var lnameCheck=/^[A-Za-z]{3,20}$/;
     
    var passwordCheck =/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    if (fnameCheck.test(fname)){
        document.getElementById('sfname').innerHTML="";
    }
    else{
        document.getElementById('sfname').innerHTML="Invalid name";
        return false;
    }
    if (lnameCheck.test(lname)){
        document.getElementById('slname').innerHTML="";
    }
    else{
        document.getElementById('slname').innerHTML="Invalid name";
        return false;
    }
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
</script>
<?php include('include/footer.php');?> 
</script>
</body>
</html>
<?php 
if (isset($_POST['signup'])){
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $phonenumber= $_POST['phonenumber'];
    $cpassword= $_POST['cpassword'];
    
    $addresss= $_POST['addresss'];
   
    $dataemail=mysqli_query($con, "SELECT email from signin where email='$email'");
    $row=mysqli_num_rows($dataemail);
    if ($row==1) {
        echo "<script>alert('Email already exist try another emaiil') </script>";
        exit();
    }
    $folder= "suploads/";
    $filename=$_FILES['img']["name"];
    $unique= uniqid().$filename;
    $temname=$_FILES['img']["tmp_name"];
    $size=$_FILES['img']["size"];
    $target=$folder.basename($unique);
    $filetype=strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="jpeg" && $filetype !="png" ){
echo "<script>document.getElementById('imgerror').innerHTML='file is not an image';</script>";
exit();
    }
    else if($size>2097152){
        "<script>document.getElementById('imgerror').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
    else{
        move_uploaded_file($temname,$target);
        mysqli_query($con,"INSERT INTO signin(fname,lname,email,phone,cpassword,img,addresss) VALUES('$fname','$lname','$email','$phonenumber','$cpassword','$target','$addresss')");

        echo "<script>alert('Data Sent') </script>";
     
        echo "<script>window.location='index.php'</script>";
    }
}
?> 
