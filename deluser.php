<?php
include('../../include/db.php');

$uid=$_GET['uid'];
$data=mysqli_query($con, "SELECT * FROM signin where id='$uid' ");
$row=mysqli_fetch_array($data);
$img=$row['img'];

if (file_exists("../../".$img)) {
    unlink("../../".$img);
}

 
mysqli_query($con, "DELETE FROM signin where id='$uid'");
echo "<script>alert('User profile deleted successfully')</script>";
echo "<script>window.location='user.php'</script>";	 
                                    
?>