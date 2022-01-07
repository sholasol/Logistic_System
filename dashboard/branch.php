<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 

if(isset($_POST['save'])){
    
    if(empty($_POST['name'])){
        $e="Please, enter branch name"; 
        echo  " <script>alert('$e'); </script>";
    }
    elseif(empty ($_POST['phone'])){
        $e="Please, enter branch contact number"; 
        echo  " <script>alert('$e'); </script>";
    }
    elseif (empty ($_POST['address'])) {
        $e="Please, enter branch address"; 
         echo  " <script>alert('$e'); </script>";
    }else{
        $nm = check_input($_POST['name']);
        $ph = check_input($_POST['phone']);
        $ad = check_input($_POST['address']);
        $em = check_input($_POST['emal']);
        
        $chk=dbConnect()->prepare("SELECT count(id) AS count FROM branch WHERE branch='$nm' AND compID='$comp'");
        $chk->execute();
        $r=$chk->fetch();
        $no =$r['count'];
        
        if($no < 1){
            $ins=dbConnect()->prepare("INSERT INTO branch SET branch=:branch, phone=:phn, address=:add, email=:em, compID=:comp");
            $ins->bindParam(':comp', $comp);
            $ins->bindParam(':branch', $nm);
            $ins->bindParam(':phn', $ph);
            $ins->bindParam(':add', $ad);
            $ins->bindParam(':em', $em);
            if($ins->execute()){
                $e="The branch has been successfully created"; 
                echo  " <script>alert('$e'); </script>";
            }
        }else{
            $e="This brnch already exists"; 
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
                                <div class="ibox-title">Branch Setup</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label">Branch Name</label>
                                        <div>
                                         <div class="form-group">
                                             <input class="form-control" type="text" name="name" placeholder="Branch Name" required/>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-form-label">Phone</label>
                                        <div>
                                         <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Phone" name="phone" required />
                                        </div>   
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label">Email</label>
                                        <div>
                                         <div class="form-group">
                                             <input type="email" class="form-control" name="emal" placeholder="Email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"  title="email (format: username@email.xx or username@email.xxx )" />
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-form-label">Address</label>
                                        <div>
                                         <div class="form-group">
                                             <textarea class="form-control" name="address" required></textarea>
                                        </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-sm-auto">
                                        <button class="btn btn-info" type="submit" name="save">Save Branch</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Recent Branches</div>
                            </div>
                            <div class="ibox-body">
                               <ul class="media-list media-list-divider m-0" style="background: #fff !important;">
                                <?php
                                $sl=dbConnect()->prepare("SELECT * FROM branch WHERE compID='$comp' ORDER BY id DESC LIMIT 5");
                                $sl->execute();
                                while($r=$sl->fetch()){
                                ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <i class="fa fa-bank fa-2x"></i>
                                       <!-- <img src="./assets/img/image.jpg" width="50px;" />-->
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"></a>
                                            <span class="font-16 float-right"><?php echo $r['phone']; ?></span>
                                        </div>
                                        <div class="font-13"><?php echo $r['branch']; ?></div>
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