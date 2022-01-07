<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
    if(isset($_POST['save'])){
       if(empty($_POST['weight'])){
        $e="Please enter a weight!"; 
        echo  " <script>alert('$e'); </script>";
	} 
        elseif(empty ($_POST['size'])){
           
            $e="Please select a size!"; 
            echo  " <script>alert('$e'); </script>";
        }else{
            $wg = check_input($_POST["weight"]); 
            $cost = check_input($_POST["cost"]); 
            $pla = check_input($_POST["distance"]); //distance
            $typ = check_input($_POST["type"]); 
            $siz = check_input($_POST["size"]); 
            
            $pp=dbConnect()->prepare("SELECT distance  FROM places WHERE place='$pla' AND compID='$comp'");
            $pp->execute();
            $ro=$pp->fetch();
            $dst= $ro['distance'];
            
            $chk=dbConnect()->prepare("SELECT count(id) AS count FROM cost WHERE place='$pla' AND distance='$dst' AND compID='$comp'");
            $chk->execute();
            $rr=$chk->fetch();
            $count = $rr['count'];
            
            if($count < 1){
                
                $ins=  dbConnect()->prepare("INSERT INTO cost SET weight=:wgt, cost=:cost, distance=:dst, place=:place, type=:type, size=:size, compID=:comp");
                $ins->bindParam(':comp', $comp);
                $ins->bindParam(':wgt', $wg);
                $ins->bindParam(':cost', $cost);
                $ins->bindParam(':dst', $dst);
                $ins->bindParam(':place', $pla);
                $ins->bindParam(':type', $typ);
                $ins->bindParam(':size', $siz);
                if($ins->execute()){
                    $e="Cost has been successfully added"; 
                    echo  " <script>alert('$e'); </script>";
                }else{
                    $e="Operation failed!"; 
                    echo  " <script>alert('$e'); </script>";
                }
            }else{
                    $e="Price had been set for the same location and distance"; 
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
                                <div class="ibox-title">Cost</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Weight</label>
                                        <div>
                                         <div class="form-group">
                                            <select class="form-control select2_demo_1" name="weight">
                                                <optgroup label="Weight">
                                                    <option value="">Please Select</option>
                                                    <?php
                                                        for($x=1; $x < 2000; $x++){
                                                            echo"<option value='$x'> $x Kg</option>";
                                                        }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Item Size</label>
                                        <div>
                                         <div class="form-group">
                                            <select class="form-control select2_demo_1" name="size">
                                                <optgroup label="size">
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
                                </div>
                                 <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Distance/Places</label>
                                        <div>
                                         <div class="form-group">
                                            <select class="form-control select2_demo_1" name="distance">
                                                <optgroup label="Places">
                                                    <option value="">Please Select</option>
                                                    <?php 
                                                    $pl=  dbConnect()->prepare("SELECT id, place, distance FROM places WHERE compID='$comp'");
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
                                    <div class="col-lg-6">
                                        <label class="col-form-label">Item Size</label>
                                        <div>
                                         <div class="form-group">
                                            <select class="form-control select2_demo_1" name="type">
                                                <optgroup label="Package">
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
                                     
                                     <div class="col-lg-12">
                                        <label class="col-form-label">Price</label>
                                        <div>
                                            <input class="form-control" type="number" step="0.1" name="cost" placeholder="Amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-sm-auto">
                                        <button class="btn btn-info" type="submit" name="save">Add Cost</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Package Cost</div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider m-0" style="background: #fff !important;">
                                <?php
                                $sl=dbConnect()->query("SELECT * FROM cost WHERE compID='$comp' ORDER BY id DESC LIMIT 5");
                                $sl->execute();
                                while($r=$sl->fetch()){
                                ?>
                                <li class="media">
                                    <a class="media-img" href="javascript:;">
                                        <i class="fa fa-dollar fa-2x"></i>
                                       <!-- <img src="./assets/img/image.jpg" width="50px;" />-->
                                    </a>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="javascript:;"></a>
                                            <span class="font-16 float-right"><?php echo $r['distance']." KM"; ?></span>
                                        </div>
                                        <div class="font-13"><?php echo $r['place']; ?> (<?php echo number_format($r['cost']); ?>)</div>
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