<?php 
include_once "connect/connect.php";
$id=$_GET['id'];
$del= dbConnect()->prepare("DELETE FROM branch WHERE id='$id'");
$del->execute();
    if($del->execute()){
        $e="Branch has been Successfully deleted!"; 
         echo  " <script>alert('$e'); window.location='mBranch' </script>";
    } 
?>
