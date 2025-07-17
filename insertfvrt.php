<?php 
include("include/db.php");
session_start();
$uid=$_SESSION['uid'];
$pid=$_GET['pid'];
$data=mysqli_query($con, "SELECT * FROM fvrt where userid='$uid' AND pid='$pid'");
$data2=mysqli_num_rows($data);
if ($data2>0) {
	 echo "<script> alert('product already added to favourite')</script>";
echo "<script> window.location='fvrt.php'</script>";
}
else   {
	 mysqli_query($con, "INSERT INTO fvrt (userid,pid) values('$uid','$pid')");
echo "<script> alert('product added to favourite successfully')</script>";
echo "<script> window.location='fvrt.php'</script>";
}
 
?>