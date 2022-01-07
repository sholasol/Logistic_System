<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
    if(isset($_POST['submit'])){
        
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
        elseif(empty ($_POST['receiver'])){
           
            $e="Please enter receiver's  name."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['location'])){
           
            $e="Please enter package location."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['size'])){
           
            $e="Please select package size."; 
            echo  " <script>alert('$e'); </script>";
        }
        elseif(empty ($_POST['destination'])){
           
            $e="Please select package destination."; 
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
            $_SESSION['location'] = check_input($_POST["location"]); 
            $_SESSION['type'] = check_input($_POST["type"]); 
            $_SESSION['size'] = check_input($_POST["size"]);
            $_SESSION['address'] = check_input($_POST["address"]);
            $_SESSION['phone'] = check_input($_POST["phone"]);
            $_SESSION['receiver'] = check_input($_POST["receiver"]); 
            $_SESSION['raddress'] = check_input($_POST["raddress"]);
            $_SESSION['rphone'] = check_input($_POST["rphone"]);
            $_SESSION['destination'] = check_input($_POST["destination"]);
            
           
           //echo  " <script>window.location='payment' </script>";
           echo"
                    <br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=pick_detail'>
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
                                        <a data-toggle='modal' data-target='#PrimaryModalhdbgc2' class="btn btn-info btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-bicycle"> New Pickup</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="deliver" class="btn btn-primary btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-check"> Delivered</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="pending" class="btn btn-warning btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-refresh"> Pending</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="cancel" class="btn btn-danger btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-power-off"> Cancel</span></a>
                                    </li>
                                    <li class="media">
                                        <a href="income" class="btn btn-success btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-dollar"> Sales: 1,000,000</span></a>
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
                                <div class="ibox-title">Pickup</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Address</th>
                                            <th>Destination</th>
                                            <th>Receiver</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Address</th>
                                            <th>Destination</th>
                                            <th>Receiver</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>
                                                <div class="btn-toolbar m-b-10">
                                                    <div class="btn-group btn-rounded">
                                                        <a class="btn btn-success" title="View"><i class="fa fa-book"></i></a>
                                                        <a class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                        <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            
            
            
            <div id="PrimaryModalhdbgc2" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
                    <div class="modal-dialog">
                        <form method="POST">
                        <div class="modal-content">
                            <div class="modal-header header-color-modal bg-color-1">
                                <h4 class="modal-title">Pickup Services</h4>
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                            </div>

                            <div class="modal-body">
                            <div class="ibox-body">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="fname" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="lname" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input class="form-control" type="text" name="phone" placeholder="sender Phone" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input class="form-control" type="text" name="rphone" placeholder="Receiver Phone" required>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input class="form-control" type="text" name="receiver" placeholder="Receiver Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2_demo_1" name="location" style="width: 100% !important;" required>
                                            <optgroup label="Location">
                                                <option value="">Pick Up Location</option>
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
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                            <input type="text" name="address"  class="form-control" placeholder="Pickup Address" style="width: 100% !important;" required>
                                        </div>
                                    </div>
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="type" style="width: 100% !important;" required>
                                        <optgroup label="Package Type">
                                            <option value="">Package Type</option>
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
                                 <div class="form-group">
                                    <select class="form-control select2_demo_1" name="size" style="width: 100% !important;" required>
                                        <optgroup label="Package Size">
                                            <option value="">Package Size</option>
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
                                   
                                    <div class="form-group">
                                        <select class="form-control select2_demo_1" name="destination" style="width: 100% !important;" required>
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
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                            <input type="text" name="raddress"  class="form-control" placeholder="Receiver Address" style="width: 100% !important;" required>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-info">Continue </button>
                            </div>
                            </div>
                        </div>
                       </div>
                        </form>
                    
                </div>

            </div>

        
            <?php include 'foot.php'; ?>