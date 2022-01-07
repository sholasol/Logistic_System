<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
        $fn = $_SESSION['fname']; 
        $ln = $_SESSION['lname'];
        $type = $_SESSION['type']; 
        $size = $_SESSION['size'];
        $address = $_SESSION['address'];
        $phn = $_SESSION['phone'];
        $loc = $_SESSION['location'];; 
        $receiver = $_SESSION['receiver']; 
        $raddress = $_SESSION['raddress'];;
        $rphn = $_SESSION['rphone'];
        $dest = $_SESSION['destination'];
        $date= date('Y-m-d');

        $cs=  dbConnect()->prepare("SELECT cost FROM cost WHERE type='$type' AND size='$size' AND place='$dest' AND compID='$comp'");
        $cs->execute();
        $ro=$cs->fetch();
        $delivery_cost = $ro['cost'];


        $cs1=  dbConnect()->prepare("SELECT cost FROM cost WHERE type='$type' AND size='$size' AND place='$loc' AND compID='$comp'");
        $cs1->execute();
        $ro1=$cs1->fetch();
        $pickup_cost = $ro1['cost'];
        
        $total_cost = $delivery_cost + $pickup_cost;
        
        if(isset($_POST['save'])){

            echo"
                    <br><br><br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=ppay'>
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
                                <div class="ibox-title">Pickup Summary</div>
                            </div>
                            <div class="ibox-body">
                                
                                
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="fname" value="<?php echo $fn;?>"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo $ln;?>"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input class="form-control" type="text" name="phone" value="<?php echo $phn;?>"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input class="form-control" type="text" name="rphone" value="<?php echo $rphn;?>"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2_demo_1" name="location" style="width: 100% !important;" disabled>
                                            <optgroup label="Location">
                                                <option value=""><?php echo $loc; ?></option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                            <input type="text" name="address"  class="form-control" value="<?php echo $address;?>"  disabled style="width: 100% !important;" >
                                        </div>
                                    </div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="type" style="width: 100% !important;" disabled>
                                        <optgroup label="Package Type">
                                            <option value=""><?php echo $type ?></option>
                                        </optgroup>
                                    </select>
                                </div> 
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="size" style="width: 100% !important;" disabled>
                                        <optgroup label="Package Size">
                                            <option value=""><?php echo $size ?></option>
                                        </optgroup>
                                    </select>
                                </div> 
                                <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="rname" value="<?php echo $receiver;?>"  disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2_demo_1" name="destination" style="width: 100% !important;" disabled>
                                            <optgroup label="Destination">
                                                <option value=""><?php echo $dest; ?></option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                            <input type="text" name="raddress"  class="form-control" value="<?php echo $raddress;?>"  disabled style="width: 100% !important;" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Pickup cost</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">=N=</span>
                                                <input class="form-control" type="text" name="pick" value="<?php echo number_format($pickup_cost); ?>"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Delivery cost</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">=N=</span>
                                                <input class="form-control" type="text" name="deliver" value="<?php echo number_format($delivery_cost); ?>"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label>Total Amount Due</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">=N=</span>
                                                <input class="form-control" type="text" name="total" value="<?php echo number_format($total_cost); ?>"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-12 ml-sm-auto">
                                            <button class="btn btn-info" type="submit" name="save">Continue</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
            </div>
            <!-- END PAGE CONTENT-->
            
            <?php include 'foot.php';  ?>