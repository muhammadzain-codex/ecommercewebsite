<?php

include('include/header.php');
?>
			
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Update Categories</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Categories</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Update Categories</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Update Categories</header>
								 
									<?php
									$cid=$_GET['cid'];
									$cname=$_GET['cname'];
									
									?> 
								</div>
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<form method="POST" enctype="multipart/form-data"> 
											<input class="mdl-textfield__input" name="categorie" type="text" value="<?php echo $cname?>" required id="txtDepName">
											<label class="mdl-textfield__label">Enter your Categories</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<form method="POST"> 
											<input class="mdl-textfield__input" name="img" type="file" required id="txtDepName" >
											<span class="text-danger" id="imgerror"></span>
											 
										</div>
									</div>
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" name="addcat"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update Categories</button></form>
										 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php

include('include/footer.php');
?>	 
</body>


 
</html>
<?php
if (isset($_POST['addcat'])) {
	 $cate=$_POST['categorie'];

	 $folder= "categoriesimg/";
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
		$row=mysqli_query($con, "SELECT img from categories where id='$cid' ");
		$row2=mysqli_fetch_array($row);
		$img=$row2['img'];
		if (file_exists($img)) {
			 unlink($img);
		}

		 move_uploaded_file($temname,$target);
		 mysqli_query($con,"UPDATE categories SET cname='$cate',img='$target' where id='$cid'");

		 echo "<script>alert('Categories updated successfully')</script>";
		 echo "<script>window.location='managecategorie.php'</script>";
	 }
}

?>