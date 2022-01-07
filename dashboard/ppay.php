<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
        $fn = $_SESSION['fname']; 
        $ln = $_SESSION['lname'];
        $loc = $_SESSION['location'];
        $type = $_SESSION['type']; 
        $size = $_SESSION['size'];
        $address = $_SESSION['address'];
        $phn = $_SESSION['phone'];
        $receiver = $_SESSION['receiver'];
        $raddress = $_SESSION['raddress'];;
        $rphn = $_SESSION['rphone'];
        $dest = $_SESSION['destination'];
        

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
        
        if(empty($_POST['name'])){
        $e="Please enter card holder's name."; 
        echo  " <script>alert('$e'); </script>";
	}
        elseif(empty($_POST['card'])){
        $e="Please enter card number."; 
        echo  " <script>alert('$e'); </script>";
	} 
        elseif(empty($_POST['cvv'])){
        $e="Please enter Card cvv."; 
        echo  " <script>alert('$e'); </script>";
	} 
        else{
          
            $cname=check_input($_POST["name"]); 
            $card=check_input($_POST["card"]); 
            $cvv=check_input($_POST["cvv"]); 
            $fn1=check_input($_POST["fname"]); 
            $ln1=check_input($_POST["lname"]);  
            $phn1=check_input($_POST["phone"]);
            $loc1=check_input($_POST["location"]);
            $address1=check_input($_POST["address"]); 
            $receiver=check_input($_POST["receiver"]); 
            $rphn1=check_input($_POST["rphone"]);
            $raddress1=check_input($_POST["raddress"]);
            $type1=check_input($_POST["type"]); 
            $size1=check_input($_POST["size"]);  
            $dest1=check_input($_POST["destination"]); 
            $date= date('Y-m-d');
            $brn=check_input($_POST["branch"]);
            $pickup=check_input($_POST["pickup"]); 
            $delivery=check_input($_POST["delivery"]); 
            $total=check_input($_POST["total"]); 
            $mode="Payment Gateway";
            $sender = $fn." ".$ln;
            $status="Paid";
            
            
         //Tracking number
        function random_num($size) {
            $length = $size;
            $key = '';
            $keys = range(0, 7);

                for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                }
                return  $key;
        }
        $code= random_num(7);
        $track="LAG".$code;
        
         $ins=  dbConnect()->prepare("INSERT INTO pickup SET  fname=:fn, lname=:ln, phone=:phn, location=:loc, address=:add, tracking=:track,
                      receiver=:receiver, rphone=:rphn, destination=:dest, raddress=:radd, size=:size, package=:pack, pickup_cost=:pickup, 
                     delivery_cost=:delivery, total_cost=:total, branch=:brn, created=:date, createdby=:by, compID=:comp");
                //$ins->bindParam(':user', $id);
                $ins->bindParam(':fn', $fn1);
                $ins->bindParam(':ln', $ln1);
                $ins->bindParam(':phn', $phn1);
                $ins->bindParam(':add', $address1);
                $ins->bindParam(':loc', $loc1);
                $ins->bindParam(':receiver', $receiver);
                $ins->bindParam(':rphn', $rphn1);
                $ins->bindParam(':radd', $raddress1);
                $ins->bindParam(':dest', $dest1);
                $ins->bindParam(':size', $size1);
                $ins->bindParam(':pack', $type1);
                $ins->bindParam(':delivery', $delivery);
                $ins->bindParam(':pickup', $pickup_cost);
                $ins->bindParam(':total', $total);
                $ins->bindParam(':brn', $brn);
                $ins->bindParam(':by', $uid);
                $ins->bindParam(':date', $date);
                $ins->bindParam(':comp', $comp);
                $ins->bindParam(':track', $track);
                if($ins->execute()){
                    
                    $in= dbConnect()->prepare("INSERT INTO activity SET userID='$uid', activity='Percel pickup operation by userID $uid for Sender $fn, $ln (Tracking Number: $track)', created=now()");
                    $in->execute();
                    
                    $pym=  dbConnect()->prepare("INSERT INTO payment SET sender=:send, phone=:pho, amount=:amt, mode=:mode, capturedby=:cby, created=:created, status=:status, compID=:comp, tracking=:track, cardno=:cno, holder=:holder, cvv=:cvv");
                    $pym->bindParam(':cby', $uid);
                    $pym->bindParam(':status', $status);
                    $pym->bindParam(':send', $sender);
                    $pym->bindParam(':pho', $phn1);
                    $pym->bindParam(':amt', $total);
                    $pym->bindParam(':mode', $mode);
                    $pym->bindParam(':created', $date);
                    $pym->bindParam(':comp', $comp);
                    $pym->bindParam(':track', $track);
                    $pym->bindParam(':cno', $card);
                    $pym->bindParam(':holder', $cname);
                    $pym->bindParam(':cvv', $cvv);
                    if($pym->execute()){
                        //$e="Operation succesful"; 
                        //echo  " <script>alert('$e'); window.location='receipt?track=$track'</script>";


                        echo"
                    <br><br><br><br><br><br><br><br><br>
                    <div style='width:100%;text-align:center;vertical-align:bottom'>
                            <div class='loader'></div>
                            <br>
                            <meta http-equiv='refresh' content='2;url=sreceipt?track=$track'>
                            <span class='itext' style='color: blueviolet;'>Processing. Please Wait!...</span>
                    </div><br><br><br><br><br><br><br><br>";

                    }else{
                        $e="UNable to process payment"; 
                        echo  " <script>alert('$e'); </script>";
                    }
                    
                    
                }else{
                    $e="Operation failed! Unable to process Percel Sending "; 
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
                                <div class="ibox-title">Actions/Operations </div>
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
                                <div class="ibox-title">Transaction Payment</div>
                            </div>
                            <div class="ibox-body">
                                <form class="form-inline" method="post">
                                    <input   name="pickup" type="hidden" value="<?php echo $pickup_cost; ?>" />
                                    <input   name="delivery" type="hidden" value="<?php echo $delivery_cost; ?>" />
                                    <input   name="total" type="hidden" value="<?php echo $total_cost; ?>" />
                                    <input   name="fname" type="hidden" value="<?php echo $fn; ?>" />
                                    <input   name="lname" type="hidden" value="<?php echo $ln; ?>" />
                                    <input   name="phone" type="hidden" value="<?php echo $phn; ?>" />
                                    <input   name="address" type="hidden" value="<?php echo $address; ?>" />
                                    <input   name="receiver" type="hidden" value="<?php echo $receiver; ?>" />
                                    <input   name="rphone" type="hidden" value="<?php echo $rphn; ?>" />
                                    <input   name="raddress" type="hidden" value="<?php echo $raddress; ?>" />
                                    <input   name="location" type="hidden" value="<?php echo $loc; ?>" />
                                    <input   name="destination" type="hidden" value="<?php echo $dest; ?>" />
                                    <input   name="branch" type="hidden" value="<?php echo $branch; ?>" />
                                    <input   name="type" type="hidden" value="<?php echo $type; ?>" />
                                    <input   name="size" type="hidden" value="<?php echo $size; ?>" />
                                    <label class="sr-only" for="ex-email">Amount</label>
                                    <input class="form-control col-lg-3" id="ex-email" value="<?php echo number_format($total_cost); ?>"  disabled>
                                    <input class="form-control col-lg-3" id="ex-email" name="card" type="number" placeholder="Card Number" required>
                                    <input class="form-control col-lg-3" id="ex-email" name="name" type="text" placeholder="Card holder's name"  required>
                                    <input class="form-control col-lg-2" id="ex-email" name="cvv" type="number" placeholder="cvv"  required>
                                    <button class="btn btn-success" type="submit" name="save">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php include 'foot.php'; ?>