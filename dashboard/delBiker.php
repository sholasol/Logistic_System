<?php 
include_once "connect/connect.php";
$id=$_GET['id'];
$del= dbConnect()->prepare("DELETE FROM users WHERE userID='$id'");
$del->execute();
    if($del->execute()){
        $e="User has been Successfully deleted!"; 
         echo  " <script>alert('$e'); window.location='mBiker' </script>";
    } 
?>
