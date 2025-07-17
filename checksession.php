<?php
// session_start();
if (!isset($_SESSION['uid'])) {
    
    echo "<script>alert('you must login first')</script>";
    echo "<script>window.location='index.php'</script>";

}
 

?>
    