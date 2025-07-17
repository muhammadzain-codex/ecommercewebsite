<?php
include('../../include/db.php');

$pid=$_GET['pid'];
$pid2=mysqli_query($con, "SELECT * FROM products where id='$pid' ");
$pid3=mysqli_fetch_array($pid2);
$img1=$pid3['img1'];
$img2=$pid3['img2'];
$img3=$pid3['img3'];
$img4=$pid3['img4'];
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
mysqli_query($con, "DELETE FROM products where id='$pid'");
echo "<script>alert('Product deleted successfully')</script>";
echo "<script>window.location='manageproducts.php'</script>";	 
                                    
?>