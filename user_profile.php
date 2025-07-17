<?php include('include/header.php');?>
<!-- start page container -->
		<div class="page-container">
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class="pull-left">
								<div class="page-title">User Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">User Profile</li>
							</ol>
						</div>
					</div>
					<div class="row">	
						<div class="col-md-6">
						<div class="card userprofilecard" >
  <img src="../../images/1c.jpeg" class="card-img-top imgcard" alt="..."  >
  <div class="card-body">
    <h5 class="card-title username1"><?php echo $name?></h5>
    <p class="card-text"> Role: Admin</p>
    
  </div>
</div>
						</div>
						<div class="col-md-6">
						<div class="container "> 
    <section class="b1">
      
          <form class="row g-3 " method="post" enctype="multipart/form-data" >
          <div class="col-md-6">
    
    <label for="inputEmail4" class="form-label  "    >Current Password</label>
    <input type="password" class="form-control fname" id="fname" name="cpassword" required >
    <span class="text-danger" id="scpassword"></span>
    </div>
    <div class="col-md-6">
    
<label for="inputEmail4" class="form-label  " name="lname" >username</label>
<input type="text" class="form-control" id="lname" name="username" required value="<?php echo $name?>">
<span class="text-danger" id="slname"></span>
</div>
 
 
<div class="col-md-6">
<label for="inputPassword4" class="form-label"     >new Password</label>
<input type="password" class="form-control" id="password" name="npassword" required >
<span class="text-danger" id="spassword"></span>

</div>
<div class="col-md-6">
    <label for="inputPassword4" class="form-label"     >Confirm Password</label>
    <input type="password" class="form-control" id="cnpassword" name="cnpassword" required >
    <span class="text-danger" id="scpassword"></span>
    </div>
<div class="col-12">
<label for="inputAddress" class="form-label"  >Images</label>
<input type="file" class="form-control" name="img" id="img"  > 
<span class="text-danger" id="imgerror"></span>
</div>
 
	 
<div class="col-12">
<br>
<button type="submit" class="btn btn-primary" name="updateprofile"  >Update Profile</button><span>
    
</span>
</div>
</form>
       </div>
        </div>
    </section>
    </div>
						</div>
					</div>
			</div>
			<!-- end page container -->
            <?php include('include/footer.php');?>		 	
</body>
</html>
<?php  
if (isset($_POST['updateprofile'])) {
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
    $npassword=mysqli_real_escape_string($con,$_POST['npassword']);
    $cnpassword=mysqli_real_escape_string($con,$_POST['cnpassword']);
    $data=mysqli_query($con, "SELECT * FROM admin where password='$cpassword'");

    $row=mysqli_num_rows($data);
    if ($row == 1){
        echo "<script>document.getElementById('scpassword').innerHTML=''</script>";
    }
    else{
        echo "<script>document.getElementById('scpassword').innerHTML='current password is invalid'</script>";
        exit();
    }
    if ($cnpassword==$npassword){
        echo "<script> document.getElementById('scpassword').innerHTML=''</script>";
        
    }
    else{
       "<script> document.getElementById('scpassword').innerHTML='password not matching'</script>";
        return false;
        exit();
    }

    $folder= "img/";
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
        $data=mysqli_query($con,"SELECT img from admin ");
        $row=mysqli_fetch_array($data);
        $img=$row['img'];
        if (isset($img)) {
             unlink($img);

        }
        move_uploaded_file($temname,$target);
        $aid=$_SESSION['aid'];
        mysqli_query($con, "UPDATE admin set name='$username',password='$cnpassword',img='$target'where id='$aid'");
        echo "<script>alert('Profile updated successfully')</script>";
        unset($_SESSION['aid']);
        echo "<script>window.location='index.php'</script>";
        


    }
}

?>