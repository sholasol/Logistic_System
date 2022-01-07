<!DOCTYPE html>
<html>
<head>

<style>
.loader {
    border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blueviolet;
  border-right: 16px solid lightgray;
  border-bottom: 16px solid blueviolet;
  border-left: 16px solid lightgray;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin:auto;
  
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>


<?php
include_once 'connect.php';
session_start();
if(isset($_POST['login'])){
    $em=$_POST['email'];
    if(empty($_POST['email'])){
	 header("Location:../../login?err=" . urlencode("Please fill in your email!")); 
    }
    
    elseif ((!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $em))){
        header("Location:../../login?err=" . urlencode("You have entered invalid email!"));  
       }
 
    $pwd = check_input($_POST["password"]);
    if(empty($_POST['password'])){
	header("Location:../login?err=" . urlencode("Password is required!"));  
	}
    else{
        $email = check_input($_POST["email"]);
        $pwd = check_input($_POST["password"]);
        
        $que= dbConnect()->prepare("SELECT * FROM users WHERE email=:email");
        $que->bindParam(':email', $email);
        $que->execute();
        if($row=$que->fetch()){
            $role= $row['role'];
            $phash=$row['password'];
            $password = password_verify($pwd, $phash);
            
            if($password){
                $_SESSION["email"] = $row['email']; // setting session
                $_SESSION["id"] = $row['userID'];
                $uid= $row['userID'];
                $nm= $row['fname']." ".$row['lname'];
                
                $in= dbConnect()->prepare("INSERT INTO activity SET userID='$uid', activity='User $nm logged in', created=now()");
                $in->execute();
                 if($role==1){

                echo"
                    <br><br><br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=../index'>
                            <span class='itext' style='color: dimgray;'>Logging IN. Please Wait!...</span>
                    </div>";


                            //echo  " <script>location.href='../index'</script>";
                       }
                       
                 else{  
                       $e="This user does not exists!"; 
                       echo  " <script>alert('$e'); window.location='../../login'</script>";
                   }
            }
        }
        else{
             header("Location:../../login?err=" . urlencode("This email does not exists!"));
        }
    }
}
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</div>
</body>
</html>