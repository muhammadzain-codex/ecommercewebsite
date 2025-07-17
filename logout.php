<?php 
 session_start();


 if (isset($_SESSION['uid'])) {
    unset($_SESSION['uid']);
    echo "<script>window.location='index.php'</script>";
 }


?> 




 