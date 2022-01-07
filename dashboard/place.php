<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
    if(isset($_POST['save'])){
       if(empty($_POST['name'])){
        $e="Please enter place name!"; 
        echo  " <script>alert('$e'); </script>";
	}
      
    else{
        $nm = check_input($_POST["name"]); 
        $dist = check_input($_POST["dist"]);
        $ck= dbConnect()->prepare("SELECT count(id) AS count FROM places WHERE place='$nm' AND  compID='$comp'");
        $ck->execute();
        $rr=$ck->fetch();
        $count = $rr['count'];
        if($count < 1){
           $ins=  dbConnect()->prepare("INSERT INTO places SET place=:place, distance=:dist, compID=:comp"); 
           $ins->bindParam(':comp', $comp);
           $ins->bindParam(':place', $nm);
           $ins->bindParam(':dist', $dist);
           if($ins->execute()){
               $e="Place has been added successfully"; 
               echo  " <script>alert('$e'); </script>";
           }else{
               $e="Unable to process this operation"; 
                echo  " <script>alert('$e'); </script>";
           }
           
        }else{
            $e=$na."This location already exists"; 
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
                                        <a href="mCost" class="btn btn-info btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-money"> Manage Cost </span></a>
                                    </li>
                                    <li class="media">
                                        <a href="mPlace" class="btn btn-primary btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-location-arrow"> Manage Places</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="mPackage" class="btn btn-warning btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-cubes"> Manage Package Type</span></a>
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
                                <div class="ibox-title">Place</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-inline" method="post">
                                    <label class="sr-only" for="ex-email">Place</label>
                                    <input class="form-control col-lg-6" id="ex-email" name="name" type="text" placeholder="Enter Place" required>
                                    <label class="sr-only" for="ex-email">Distance</label>
                                    <input class="form-control col-lg-3" id="ex-email" name="dist" type="number" placeholder="Distance" required>
                                    <button class="btn btn-success" type="submit" name="save">Add Place</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Recent Places</div>
                            </div>
                            <div class="ibox-body">
                               <ul class="media-list media-list-divider m-0" style="background: #fff !important;">
                                <?php
                                $sl=dbConnect()->query("SELECT * FROM places WHERE compID='$comp' ORDER BY id DESC LIMIT 5");
                                $sl->execute();
                                while($r=$sl->fetch()){
                                ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <i class="fa fa-road fa-2x"></i>
                                       <!-- <img src="./assets/img/image.jpg" width="50px;" />-->
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"></a>
                                            <span class="font-16 float-right"><?php echo $r['distance']." KM"; ?></span>
                                        </div>
                                        <div class="font-13"><?php echo $r['place']; ?></div>
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