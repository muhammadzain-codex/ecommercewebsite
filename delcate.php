<?php
include('../../include/db.php');
$cid=$_GET['cid'];
$row=mysqli_query($con, "SELECT img from categories where id='$cid' ");
		$row2=mysqli_fetch_array($row);
		$img=$row2['img'];
		if (file_exists($img)) {
			 unlink($img);
		}
mysqli_query($con, "DELETE FROM categories where id='$cid' ");

echo "<script>alert('Your Categorie is deleted')</script>";
echo "<script>window.location='managecategorie.php'</script>";

?>