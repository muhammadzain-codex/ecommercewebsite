<?php
include('../../include/db.php');
$cid=$_GET['cid'];
mysqli_query($con, "DELETE FROM contact where id='$cid' ");
echo "<script>alert('Your Message is deleted')</script>";
echo "<script>window.location='contact.php'</script>";

?>