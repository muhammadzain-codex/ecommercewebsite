 		
		 <?php 
		 include('include/header.php');
		 
		 ?>
		
		 	<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Update Product</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="manageproducts.php"> Manage Products</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Update Product</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Basic Information</header>
									 
								</div>
								<form method="POST" enctype="multipart/form-data">
								<div class="card-body row">
								 
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<select name="cid" id="" class="mdl-textfield__input" required>
                                               <option value="" >Choose Categories</option>
											   <?php
												$cp=mysqli_query($con ,"SELECT * FROM categories");
												while($cp2=mysqli_fetch_array($cp)){

											

												?>
												<option value="<?php echo $cp2['id']?>"><?php echo $cp2['cname']?></option>
												<?php }?>
											</select>
										</div>
									</div>
                                    <?php
                                    $pid=$_GET['pid'];
                                    $pid2=mysqli_query($con, "SELECT * FROM products where id='$pid' ");
                                    $pid3=mysqli_fetch_array($pid2);
                                    $img1=$pid3['img1'];
                                    $img2=$pid3['img2'];
                                    $img3=$pid3['img3'];
                                    $img4=$pid3['img4'];
                                    


                                    ?>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="title" required value="<?php echo $pid3['title']?>">
											<label class="mdl-textfield__label">Title</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" required name="size" value="<?php echo $pid3['psize']?>">
											<label class="mdl-textfield__label">Size</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtRollNo" required name="colors" value="<?php echo $pid3['color']?>">
											<label class="mdl-textfield__label">Colors</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="number" id="txtemail" required name="price" min="100" max="100000" value="<?php echo $pid3['price']?>">
											<label class="mdl-textfield__label"  >Price</label>
										 
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="number" id="date" required name="discountprice" min="100" max="1000000" value="<?php echo $pid3['discountprice']?>">
											<label class="mdl-textfield__label">Discount Price</label>
										</div>
									</div>
									 <div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" name='discription' rows="4" id="text7"><?php echo $pid3['discription']?></textarea>
											<label class="mdl-textfield__label" for="text7">Discription</label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										 
										<div class="col-md-12">
										<input type="file" name="img1" id="" class="mdl-textfield__input" required>
										<span class="text-danger" id="imgerror1"></span>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										 
										<div class="col-md-12">
										<input type="file" name="img2" id="" class="mdl-textfield__input" required>
										<span class="text-danger" id="imgerror2"></span>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										 
										<div class="col-md-12">
										<input type="file" name="img3" id="" class="mdl-textfield__input" required>
										<span class="text-danger" id="imgerror3"></span>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										 
										<div class="col-md-12">
										<input type="file" name="img4" id="" class="mdl-textfield__input" required>
										<span class="text-danger" id="imgerror4"></span>
										</div>
									</div>
									
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" name="btn-p"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update products</button>
										 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			 <?php  include("include/footer.php");?>


</body>
</html>
<?php  
if(isset($_POST['btn-p'])){
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$psize=$_POST['size'];
	$colors=$_POST['colors'];
	$price=$_POST['price'];
	$discountprice=$_POST['discountprice'];
	$discription=$_POST['discription'];

	$folder= "products/";
    $filename=$_FILES['img1']["name"];
    $unique= uniqid().$filename;
    $temname=$_FILES['img1']["tmp_name"];
    $size=$_FILES['img1']["size"];

    $target=$folder.basename($unique);
    $filetype=strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="jpeg" && $filetype !="png" ){
echo "<script>document.getElementById('imgerror1').innerHTML='file is not an image';</script>";
exit();
    }
     if($size>2097152){
        "<script>document.getElementById('imgerror1').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
	$folder2= "products/";
    $filename2=$_FILES['img2']["name"];
    $unique2= uniqid().$filename2;
    $temname2=$_FILES['img2']["tmp_name"];
    $size2=$_FILES['img2']["size"];

    $target2=$folder2.basename($unique2);
    $filetype2=strtolower(pathinfo($target2,PATHINFO_EXTENSION));
    if ($filetype2 !="jpg" && $filetype2 !="jpeg" && $filetype2 !="png" ){
echo "<script>document.getElementById('imgerror2').innerHTML='file is not an image';</script>";
exit();
    }
     if($size>2097152){
        "<script>document.getElementById('imgerror2').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
	$folder3= "products/";
    $filename3=$_FILES['img3']["name"];
    $unique3= uniqid().$filename3;
    $temname3=$_FILES['img3']["tmp_name"];
    $size3=$_FILES['img3']["size"];

    $target3=$folder3.basename($unique3);
    $filetype3=strtolower(pathinfo($target3,PATHINFO_EXTENSION));
    if ($filetype3 !="jpg" && $filetype3 !="jpeg" && $filetype3 !="png" ){
echo "<script>document.getElementById('imgerror3').innerHTML='file is not an image';</script>";
exit();
    }
     if($size>2097152){
        "<script>document.getElementById('imgerror3').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
	$folder4= "products/";
    $filename4=$_FILES['img4']["name"];
    $unique4= uniqid().$filename4;
    $temname4=$_FILES['img4']["tmp_name"];
    $size4=$_FILES['img4']["size"];

    $target4=$folder4.basename($unique4);
    $filetype4=strtolower(pathinfo($target4,PATHINFO_EXTENSION));
    if ($filetype4 !="jpg" && $filetype4 !="jpeg" && $filetype4 !="png" ){
echo "<script>document.getElementById('imgerror4').innerHTML='file is not an image';</script>";
exit();
    }
     if($size>2097152){
        "<script>document.getElementById('imgerror4').innerHTML='file is larger than 2mp';</script>";
        exit();
    }
	 
		if (file_exists($img1)) {
			 unlink($img1);
		}
		 
		if (file_exists($img2)) {
			 unlink($img2);
		}
	 
		if (file_exists($img3)) {
			 unlink($img3);
		}
		 
		if (file_exists($img4)) {
			 unlink($img4);
		}
        move_uploaded_file($temname,$target);
		move_uploaded_file($temname2,$target2);
		move_uploaded_file($temname3,$target3);
		move_uploaded_file($temname4,$target4);
        mysqli_query($con,"UPDATE  products  SET cid='$cid',title='$title',psize='$psize',color='$colors',price='$price',discountprice='$discountprice',discription='$discription',img1='$target',img2='$target2',img3='$target3',img4='$target4' where id='$pid'");
		echo "<script>alert('Product updated successfully')</script>";
		echo "<script>window.location='manageproducts.php'</script>";	 
}
?>