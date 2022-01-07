<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>

        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Tracking Result</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                
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
                                 echo"
                                     <hr/>
                                    <div class='ibox invoice'>
                                    <div class='invoice-header'>
                                        <table class='table no-border' style='width:300px !important;'>
                                        <tr>
                                            <td>Sender:</td>
                                            <td>$sender</td>
                                        </tr>
                                        <tr>
                                            <td>Origin:</td>
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
                                                    <th>Destination</th>
                                                    <th>Status</th>
                                                    <th class='text-right'>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                     <div><strong>$package</strong></div></td>
                                                    <td>$size</td>
                                                    <td>$220.00</td>
                                                    <td>$destination<br>$raddress</td>
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

                                }
                            }


                            function check_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                            ?>
                        </div>
            <!-- END PAGE CONTENT-->
            <?php 
            session_write_close();
            include 'foot.php'; 
            ?>