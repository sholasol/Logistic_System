<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
    if(isset($_POST['save'])){
       if(empty($_POST['width'])){
        $e="Please enter a width!"; 
        echo  " <script>alert('$e'); </script>";
	}
        if(empty($_POST['length'])){
        $e="Please enter a length!"; 
        echo  " <script>alert('$e'); </script>";
	}
      
    else{
        $wd = check_input($_POST["width"]); 
        $ln = check_input($_POST["length"]);
        $hg = check_input($_POST["height"]);
        if($wd > 0 && $ln >0 && $hg < 1){
            $z = $wd. "x". $ln;
        }elseif($wd > 0 && $ln >0 && $hg > 0){
            $z = $wd. "cm x". $ln. "cm x". $hg. "cm";
        }
        
        $ck= dbConnect()->prepare("SELECT count(id) AS count FROM size WHERE width='$wd' AND length='$ln' AND compID='$comp'");
        $ck->execute();
        $rr=$ck->fetch();
        $count = $rr['count'];
        if($count < 1){
           $ins=  dbConnect()->prepare("INSERT INTO size SET width=:width, length=:len, height=:hgt, size=:sz, compID=:comp"); 
           $ins->bindParam(':comp', $comp);
           $ins->bindParam(':width', $wd);
           $ins->bindParam(':len', $ln);
           $ins->bindParam(':hgt', $hg);
           $ins->bindParam(':sz', $z);
           if($ins->execute()){
               $e="The has been added successfully"; 
               echo  " <script>alert('$e'); </script>";
           }else{
               $e="Unable to process this operation"; 
                echo  " <script>alert('$e'); </script>";
           }
           
        }else{
            $e="This package already exists"; 
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

//
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
                                <div class="ibox-title">Sizes</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-inline" method="post">
                                    <label class="sr-only" for="ex-email">Width</label>
                                    <input class="form-control col-lg-3" id="ex-email" name="width" type="number" step="0.1" placeholder="Width">
                                    <label class="sr-only" for="ex-email">Length</label>
                                    <input class="form-control col-lg-3" id="ex-email" name="length" type="number" step="0.1" placeholder="Length">
                                    <label class="sr-only" for="ex-email">Height</label>
                                    <input class="form-control col-lg-3" id="ex-email" name="height" type="number" step="0.1" placeholder="Height" >
                                    <button class="btn btn-success col-lg-3" type="submit" name="save">Add Size</button>
                                </form>
<!--                                <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class=" col-form-label">Weight</label>
                                        <div>
                                            <input class="form-control" type="number" step="0.1" name="weight" placeholder="Weight (KG)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Height</label>
                                        <div>
                                            <input class="form-control" type="number" step="0.1" name="height" placeholder="Height" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class=" col-form-label">Width</label>
                                        <div>
                                            <input class="form-control" type="number" step="0.1" name="width" placeholder="Width (cm)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class=" col-form-label">Length</label>
                                        <div>
                                            <input class="form-control" type="number" step="0.1" name="length" placeholder="Length (cm)">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-sm-auto">
                                        <button class="btn btn-info" type="submit" name="save">Add Cost</button>
                                    </div>
                                </div>
                              </form>-->
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Recent Sizes</div>
                            </div>
                            <div class="ibox-body">
                               <ul class="media-list media-list-divider m-0" style="background: #fff !important;">
                                <?php
                                $sl=dbConnect()->query("SELECT * FROM size WHERE compID='$comp' ORDER BY id DESC LIMIT 5");
                                $sl->execute();
                                while($r=$sl->fetch()){
                                ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <i class="fa fa-cube fa-2x"></i>
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"></a>
                                            <span class="font-16 float-right"><?php echo $r['size']; ?></span>
                                        </div>
                                        <!--<div class="font-13"><?php echo $r['size']; ?></div>-->
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

            