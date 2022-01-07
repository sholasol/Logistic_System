<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
        $fn = $_SESSION['fname']; 
        $ln = $_SESSION['lname'];
        $em = $_SESSION['emal'];
        $type = $_SESSION['type']; 
        $size = $_SESSION['size'];
        $address = $_SESSION['address'];
        $phn = $_SESSION['phone'];
        $rfn = $_SESSION['rfname'];; 
        $rln = $_SESSION['rlname'];
        $rem = $_SESSION['remail'];; 
        $raddress = $_SESSION['raddress'];;
        $rphn = $_SESSION['rphone'];
        $dest = $_SESSION['destination'];
        $date= date('Y-m-d');

        $cs=  dbConnect()->prepare("SELECT cost FROM cost WHERE type='$type' AND size='$size' AND place='$dest' AND compID='$comp'");
        $cs->execute();
        $ro=$cs->fetch();
        $cost = $ro['cost'];
        
        if(isset($_POST['save'])){

            echo"
                    <br><br><br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=pay'>
                            <span class='itext' style='color: dimgray;'>Processing. Please Wait!...</span>
                    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

           //echo  " <script>window.location='pay' </script>";
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
                    <div class="col-lg-9">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Payment</div>
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
                                     <input class="form-control" type="text" value="<?php echo $fn;?>"  disabled/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Last Name</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" value="<?php echo $ln;?>"  disabled/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Email</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="email" value="<?php echo $em;?>" disabled />
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Phone</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" value="<?php echo $phn;?>" disabled  required/>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <label class="col-form-label">Package Type</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" disabled>
                                        <optgroup label="Package Type">
                                            <option value=""><?php echo $type; ?></option>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <label class="col-form-label">Package Size</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" disabled>
                                        <optgroup label="Package Size">
                                            <option value=""><?php echo $size ?></option>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label"> Address</label>
                                <div>
                                 <div class="form-group">
                                     <textarea class="form-control" id="address"  disabled><?php echo $address; ?></textarea>
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
                                     <input class="form-control" type="text" value="<?php echo $rfn;?>" disabled/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Last Name</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" value="<?php echo $rln;?>" disabled/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Email</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="email" value="<?php echo $rem;?>" disabled/>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Phone</label>
                                <div>
                                 <div class="form-group">
                                    <input class="form-control" type="text" value="<?php echo $rphn;?>" disabled/>
                                </div>   
                                </div>
                            </div>
                             <div class="col-lg-12">
                                <label class="col-form-label">Destination</label>
                                <div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" disabled>
                                        <optgroup label="Destination">
                                            <option value=""><?php echo $dest ?></option>
                                        </optgroup>
                                    </select>
                                </div>   
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label">Receiver Address</label>
                                <div>
                                 <div class="form-group">
                                     <textarea class="form-control"  disabled> <?php  echo $raddress; ?></textarea>
                                </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="btn btn-success col-lg-12">
                        <?php echo $cost;?>
                    </label>
                    <div class="form-group row">
                        <div class="col-sm-12 ml-sm-auto">
                            <button class="btn btn-info" type="submit" name="save">Make Payment</button>
                        </div>
                    </div>
                                     
                </div>
                            </form>
                            </div>
                        </div>
                    </div>
<!--                <div class="col-lg-3">
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
                </div>-->
            </div>
            <!-- END PAGE CONTENT-->
            
            <?php include 'foot.php';  ?>