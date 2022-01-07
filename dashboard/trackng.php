<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>

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
                                        <a href="booking" class="btn btn-info btn-block"><span style="color: #fff; font-weight: bold !important;" class="fa fa-cube"> Send New</span></a>
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
                                <div class="ibox-title">Tracking</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-inline" method="post">
                                    <label class="sr-only" for="ex-email">Tracking Number</label>
                                    <input class="form-control col-lg-7" id="ex-email" name="track" type="text" placeholder="Tracking Number" required>
                                    <button class="btn btn-success" type="submit" name="submit">Track</button>
                                </form>
                            </div>
                            <div class="ibox-body">
                                <?php 
                                if(isset($_POST['submit'])){

                                    if(empty($_POST['track'])){
                                        $e="Please input the tracking number "; 
                                        echo  " <script>alert('$e'); </script>";
                                    }else{
                                        $trk=  check_input($_POST['track']);

                                        $gt=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.tracking='$trk'");
                                        $gt->execute();
                                        $r=$gt->fetch();
                                        $no = $gt->rowCount();
                                        
                                        $gt1=  dbConnect()->prepare("SELECT * FROM pickup, payment WHERE pickup.tracking = payment.tracking AND pickup.tracking='$trk'");
                                        $gt1->execute();
                                        $r1=$gt1->fetch();
                                        $no1 = $gt1->rowCount();
                                        
                                        if($no > 0 || $no1 > 0){
                                            echo"
                                            <br><br><br><br><br>
                                            <div style='width:100%;text-align:center;vertical-align:bottom'>
                                                    <div class='loader'></div>
                                                    <br>
                                                    <meta http-equiv='refresh' content='2;url=tracking?track=$trk'>
                                                    <span class='itext' style='color: blueviolet;'>Processing. Please Wait!...</span>
                                            </div><br><br><br><br><br><br><br><br><br>";
                                        }
                                        
                                        else{
                                            
                                            echo"
                                            <br><br><br><br><br>
                                            <div style='width:100%;text-align:center;vertical-align:bottom'>
                                                    <div class='loader'></div>
                                                    <br>
                                                    <meta http-equiv='refresh' content='2;url=trackng'>
                                                    <span class='itext' style='color: blueviolet;'>invalid Tracking number. Record not found!...</span>
                                            </div><br><br><br><br><br><br><br><br><br>";
                                        }
                                           
                                    }
                                }


                                function check_input($data) {
                                  $data = trim($data);
                                  $data = stripslashes($data);
                                  $data = htmlspecialchars($data);
                                  return $data;
                                }
                                if(isset($_GET['track'])){
                                    $track =$_GET['track'];



                                    $gt=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.tracking='$track'");
                                        $gt->execute();
                                        $r=$gt->fetch();
                                        $no = $gt->rowCount();
                                        $tracking=$r['tracking'];
                                        $cost=$r['cost'];
                                        $package=$r['package'];
                                        $size=$r['size'];
                                        $destination=$r['destination'];
                                        $raddress=$r['raddress'];
                                        $address=$r['address'];
                                        $phone=$r['phone'];
                                        $rphone=$r['rphone'];
                                        $sender=$r['fname']." ".$r['lname'];
                                        $receiver=$r['rfname']." ".$r['rlname'];
                                        $created=$r['created'];
                                        $status=$r['sstatus'];
                                        $sent=$r['sent'];
                                        $delivered=$r['delivered'];
                                        $deliveredby=$r['deliveredby'];
                                        
                                        $t=(5/100)*$cost;
                                        $total = $cost + $t;
                                        
                                        if($no > 0){
                                            echo" 
                                            <hr/>
                                            
                                           <div class='ibox invoice'>
                                           <div class='invoice-header'>
                                           <label class='label label-info'>Percel Delivery Service</label>
                                               <table class='table no-border' style='width:300px !important;'>
                                               <tr>
                                                   
                                                   <td>Sender:</td>
                                                   <td>$sender</td>
                                               </tr>
                                               <tr>
                                                   <td>Phone:</td>
                                                   <td>$phone</td>
                                               </tr>
                                               <tr>
                                                   <td>Origin:</td>
                                                   <td>$address</td>
                                               </tr>
                                               <tr>
                                                   <td>Receiver:</td>
                                                   <td>$receiver</td>
                                               </tr>
                                               <tr>
                                                   <td>Destination:</td>
                                                   <td>$raddress</td>
                                               </tr>
                                               <tr>
                                                   <td>Receiver Phone:</td>
                                                   <td>$rphone</td>
                                               </tr>
                                               <tr>
                                                   <td>Sent:</td>
                                                   <td>$sent</td>
                                               </tr>
                                               </table>
                                               <table class='table table-striped no-margin table-invoice'>
                                                   <thead>
                                                       <tr>
                                                           <th>Item Description</th>
                                                           <th>Size</th>
                                                           <th>Weight</th>
                                                           <th>Status</th>
                                                           <th class='text-right'>Cost</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td>
                                                            <div><strong>$package</strong></div></td>
                                                           <td>$size</td>
                                                           <td>Kg</td>
                                                            <td><span class='label label-info'>$status</span></td>
                                                           <td>$cost</td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                               <table class='table no-border'>
                                                   <thead>
                                                       <tr>
                                                           <th></th>
                                                           <th width='15%'></th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr class='text-right'>
                                                           <td>Subtotal:</td>
                                                           <td>=N= $cost</td>
                                                       </tr>
                                                       <tr class='text-right'>
                                                           <td>TAX 5%:</td>
                                                           <td>=N= $t</td>
                                                       </tr>
                                                       <tr class='text-right'>
                                                           <td class='font-bold font-18'>TOTAL:</td>
                                                           <td class='font-bold font-18'>=N= $total</td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </div>
   
   
                                       </div>
                                           
   
                                           ";
                                        }else{
                                            
                                            
                                        $gt=  dbConnect()->prepare("SELECT * FROM pickup, payment WHERE pickup.tracking = payment.tracking AND pickup.tracking='$track'");
                                        $gt->execute();
                                        $r=$gt->fetch();
                                        $no1 = $gt->rowCount();
                                        $tracking=$r['tracking'];
                                        $pcost=$r['pickup_cost'];
                                        $dcost=$r['delivery_cost'];
                                        $tcost=$r['total_cost'];
                                        $package=$r['package'];
                                        $size=$r['size'];
                                        $destination=$r['destination'];
                                        $raddress=$r['raddress'];
                                        $address=$r['address'];
                                        $phone=$r['phone'];
                                        $rphone=$r['rphone'];
                                        $sender=$r['fname']." ".$r['lname'];
                                        $receiver=$r['receiver'];
                                        $created=$r['created'];
                                        $delivered=$r['delivered'];
                                        $deliveredby=$r['deliveredby'];
                                        $pickby = $r['pickby'];
                                        $status = $r['status'];
                                        
                                        $t=(5/100)*$tcost;
                                        $total = $tcost + $t;
                                        
                                        if($no1 > 0){
                                            echo" 
                                            <hr/>
                                            
                                           <div class='ibox invoice'>
                                           <div class='invoice-header'>
                                            <label class='label label-info'>Pickup and Delivery Service</label>
                                             <table class='table no-border' style='width:300px !important;'>
                                               <tr>
                                                   
                                                   <td>Sender:</td>
                                                   <td>$sender</td>
                                               </tr>
                                               <tr>
                                                   <td>Phone:</td>
                                                   <td>$phone</td>
                                               </tr>
                                               <tr>
                                                   <td>Pickup:</td>
                                                   <td>$address</td>
                                               </tr>
                                               <tr>
                                                   <td>Receiver:</td>
                                                   <td>$receiver</td>
                                               </tr>
                                               <tr>
                                                   <td>Destination:</td>
                                                   <td>$raddress</td>
                                               </tr>
                                               <tr>
                                                   <td>Receiver Phone:</td>
                                                   <td>$rphone</td>
                                               </tr>
                                               <tr>
                                                   <td>Sent:</td>
                                                   <td>$sent</td>
                                               </tr>
                                               </table>
                                               <table class='table table-striped no-margin table-invoice'>
                                                   <thead>
                                                       <tr>
                                                           <th>Item </th>
                                                           <th>Size</th>
                                                           <th>Weight</th>
                                                           <th>Pickup</th>
                                                           <th>Delivery</th>
                                                           <th>Status</th>
                                                           <th class='text-right'>Total Cost</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td>
                                                            <div><strong>$package</strong></div></td>
                                                           <td>$size</td>
                                                           <td>Kg</td>
                                                           <td>$pcost</td>
                                                           <td>$dcost</td>
                                                            <td><span class='label label-info'>$status</span></td>
                                                           <td>$tcost</td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                               <table class='table no-border'>
                                                   <thead>
                                                       <tr>
                                                           <th></th>
                                                           <th width='15%'></th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr class='text-right'>
                                                           <td>Subtotal:</td>
                                                           <td>=N= $tcost</td>
                                                       </tr>
                                                       <tr class='text-right'>
                                                           <td>TAX 5%:</td>
                                                           <td>=N= $t</td>
                                                       </tr>
                                                       <tr class='text-right'>
                                                           <td class='font-bold font-18'>TOTAL:</td>
                                                           <td class='font-bold font-18'>=N= $total</td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </div>
   
   
                                       </div>
                                           
   
                                           ";
                                        }else{
                                            echo'No record was found for this track number: '.$track;
                                        }
                                }
                                }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php include 'foot.php'; ?>