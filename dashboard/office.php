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
        elseif(empty ($_POST['email'])){
           
            $e="Please enter email address."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['password'])){
           
            $e="Please enter user password."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['branch'])){
           
            $e="Please select a branch."; 
            echo  " <script>alert('$e'); </script>";
        }
        else{
            $fn = check_input($_POST["fname"]); 
            $ln = check_input($_POST["lname"]); 
            $em = check_input($_POST["email"]); //distance
            $pass = check_input($_POST["password"]); 
            $brn = check_input($_POST["branch"]); 
            $date= date('Y-m-d');
            $rol=2;
            
            
            $chk=dbConnect()->prepare("SELECT count(userID) AS count FROM users WHERE email='$em' AND compID='$comp'");
            $chk->execute();
            $rr=$chk->fetch();
            $count = $rr['count'];
            
            if($count < 1){
                
             //Password Encryption
            $pas=$pass;
            $options = [
                'cost' => 12,
            ];
            $hash= password_hash($pas, PASSWORD_BCRYPT, $options);
                
                $ins=  dbConnect()->prepare("INSERT INTO users SET role=:role, fname=:fn, lname=:ln, email=:em, password=:pwd, branch=:brn, compID=:comp, joined=:date, createdby=:by");
                $ins->bindParam(':comp', $comp);
                $ins->bindParam(':fn', $fn);
                $ins->bindParam(':ln', $ln);
                $ins->bindParam(':em', $em);
                $ins->bindParam(':brn', $brn);
                $ins->bindParam(':by', $uid);
                $ins->bindParam(':date', $date);
                $ins->bindParam(':pwd', $hash);
                $ins->bindParam(':role', $rol);
                if($ins->execute()){
                    
                    $in= dbConnect()->prepare("INSERT INTO activity SET userID='$uid', activity='The user created User $fn, $ln', created=now()");
                    $in->execute();
                    
                    $e="The user has been successfully created"; 
                    echo  " <script>alert('$e'); </script>";
                }else{
                    $e="Operation failed!"; 
                    echo  " <script>alert('$e'); </script>";
                }
            }else{
                    $e="The user with the email already exists."; 
                    echo  " <script>alert('$e'); </script>";
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
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Actions/Operations</div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider m-0">
                                    <li class="media">
                                        <a href="mAdmin" class="btn btn-info btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-user-circle"> Manage Admin </span></a>
                                    </li>
                                    <li class="media">
                                        <a href="mOffice" class="btn btn-primary btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-user-circle-o"> Manage Users</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="mBiker" class="btn btn-warning btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-bicycle"> Manage Bikers</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="mBranch" class="btn btn-success btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-home"> Manage Branches</span></a>
                                    </li>
                                    <li class="media">
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">User Setup</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label">First Name</label>
                                        <div>
                                         <div class="form-group">
                                             <input class="form-control" type="text" name="fname" placeholder="First Name" required/>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Last Name</label>
                                        <div>
                                         <div class="form-group">
                                            <input class="form-control" type="text" name="lname" placeholder="Last Name" required/>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Email</label>
                                        <div>
                                         <div class="form-group">
                                            <input class="form-control" type="email" name="email" placeholder="Email" required/>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Password</label>
                                        <div>
                                         <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="Password" required/>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-form-label">Branch</label>
                                        <div>
                                         <div class="form-group">
                                            <select class="form-control select2_demo_1" name="branch">
                                                <optgroup label="Branches">
                                                    <option value="">Please Select</option>
                                                    <?php 
                                                    $pl=  dbConnect()->prepare("SELECT id, branch FROM branch WHERE compID='$comp'");
                                                    $pl->execute();
                                                    while($r=$pl->fetch()){
                                                    ?>
                                                    <option value="<?php echo $r['id']; ?>"><?php echo $r['branch'];?></option>
                                                    <?php } ?>
                                                </optgroup>
                                            </select>
                                        </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-sm-auto">
                                        <button class="btn btn-info" type="submit" name="save">Add User</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Recent Users</div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider m-0" style="background: #fff !important;">
                                <?php
                                $sl=dbConnect()->query("SELECT * FROM users WHERE compID='$comp' AND role=2 ORDER BY userID DESC LIMIT 5");
                                $sl->execute();
                                while($r=$sl->fetch()){
                                ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <i class="fa fa-user-circle fa-2x"></i>
                                       <!-- <img src="./assets/img/image.jpg" width="50px;" />-->
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"></a>
                                            <span class="font-16 float-right"><?php echo $r['fname']; ?></span>
                                        </div>
                                        <div class="font-13"><?php echo $r['email']; ?></div>
                                    </div>
                                </li>
                                <?php } ?>
                               </ul>
                            </div>
                        </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <?php include 'foot.php'; ?>