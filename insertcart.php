<?php 
session_start();
if(!isset($_SESSION['uid'])){
    echo "<script>alert('You must login first')</script>";
    echo "<script>window.location='login.php'</script>";
}
else {
    include("include/db.php");
    $pid=$_GET['pid'];
    $uid=$_SESSION['uid'];
    $cartemail=mysqli_query($con, "SELECT *  from cart where pid='$pid' AND userid='$uid'");
    $row=mysqli_num_rows($cartemail);
    
    if ($row==1) {
        echo "<script>alert('Product already added to cart try another') </script>";
        echo "<script>window.location='index.php'</script>";
    }
    else {
        
    
  mysqli_query($con, "INSERT into cart (pid,userid) values('$pid','$uid')");
  echo "<script>alert('Product Added Successfully to Cart')</script>";
    echo "<script>window.location='index.php'</script>";
}
}
?>