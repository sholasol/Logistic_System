<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
    if(isset($_POST['save'])){
       if(empty($_POST['fname'])){
        $e="Please enter first name."; 
        echo  " <script>alert('$e'); </script>";
	} 
        elseif(empty ($_POST['lname'])){
           
            $e="Please enter last name."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['phone'])){
           
            $e="Please enter sender's phone number."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['rfname'])){
           
            $e="Please enter receiver's first name."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['rlname'])){
           
            $e="Please enter receiver's last name."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['destination'])){
           
            $e="Please select destination landmark."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['rphone'])){
           
            $e="Please enter receiver's phone number."; 
            echo  " <script>alert('$e'); </script>";
        }
        else{
            session_start();
            
            $_SESSION['fname'] = check_input($_POST["fname"]); 
            $_SESSION['lname'] = check_input($_POST["lname"]); 
            $_SESSION['emal'] = check_input($_POST["emal"]); 
            $_SESSION['type'] = check_input($_POST["type"]); 
            $_SESSION['size'] = check_input($_POST["size"]);
            $_SESSION['address'] = check_input($_POST["address"]);
            $_SESSION['phone'] = check_input($_POST["phone"]);
            $_SESSION['rfname'] = check_input($_POST["rfname"]); 
            $_SESSION['rlname'] = check_input($_POST["rlname"]); 
            $_SESSION['remail'] = check_input($_POST["remail"]); 
            $_SESSION['raddress'] = check_input($_POST["raddress"]);
            $_SESSION['rphone'] = check_input($_POST["rphone"]);
            $_SESSION['destination'] = check_input($_POST["destination"]);
            
           
           //echo  " <script>window.location='payment' </script>";
           echo"
                    <br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=payment'>
                            <span class='itext' style='color: dimgray;'>Processing. Please Wait!...</span>
                    </div><br><br><br><br><br><br><br><br><br><br><br>";
            
        } 
        }
    
 function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">SEND</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index"><i class="la la-home font-20"></i></a>
            </li>
        </ol>
    </div>
  <div class="row">
  <div class="ibox col-lg-12">
        <div class="ibox-head">
            <div class="ibox-title">Sending Package</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-6">
                        <label class="btn btn-info col-lg-12">Sender Information</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="col-form-label">First Name</label>
                                <div>
                                 <div class="form-group">
                                     <input class="form-control" type="text" name="fname"  required/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Last Name</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" name="lname"  required/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Email</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="email" name="emal" />
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Phone</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" name="phone"  required/>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <label class="col-form-label">Package Type</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="type">
                                        <optgroup label="Package Type">
                                            <option value="">Please Select</option>
                                            <?php 
                                            $pl=  dbConnect()->prepare("SELECT package FROM package WHERE compID='$comp'");
                                            $pl->execute();
                                            while($r=$pl->fetch()){
                                            ?>
                                            <option><?php echo $r['package'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <label class="col-form-label">Package Size</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="size">
                                        <optgroup label="Package Size">
                                            <option value="">Please Select</option>
                                            <?php 
                                            $pl=  dbConnect()->prepare("SELECT size FROM size WHERE compID='$comp'");
                                            $pl->execute();
                                            while($r=$pl->fetch()){
                                            ?>
                                            <option><?php echo $r['size'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label"> Address</label>
                                <div>
                                 <div class="form-group">
                                     <textarea class="form-control" id="address" name="address"  required></textarea>
                                </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="btn btn-info col-lg-12">Receiver Information</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="col-form-label">First Name</label>
                                <div>
                                 <div class="form-group">
                                     <input class="form-control" type="text" name="rfname"  required/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Last Name</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" name="rlname"  required/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Email</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="email" name="remail"/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Phone</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" name="rphone"  required/>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-12">
                                <label class="col-form-label">Destination</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="destination">
                                        <optgroup label="Destination">
                                            <option value="">Please Select</option>
                                            <?php 
                                            $pl=  dbConnect()->prepare("SELECT place FROM places WHERE compID='$comp'");
                                            $pl->execute();
                                            while($r=$pl->fetch()){
                                            ?>
                                            <option><?php echo $r['place'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label">Receiver Address</label>
                                <div>
                                 <div class="form-group">
                                     <textarea class="form-control"  name="raddress"  required></textarea>
                                </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 ml-sm-auto">
                            <button class="btn btn-info" type="submit" name="save">Continue</button>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div> 
  </div>
<!-- END PAGE CONTENT-->

<?php include 'foot.php'; ?>