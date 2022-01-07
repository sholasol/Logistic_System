<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
$tcost =0;
$gt=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking ");
$gt->execute();
while($r=$gt->fetch()){
$tracking=$r['tracking'];
$cost=$r['cost'];

$tcost +=$cost;
}

$pk=dbConnect()->prepare("SELECT count(id) AS count from send WHERE WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$pk->execute();
$rr=$pk->fetch();
$package = $rr['count'];


$cc=  dbConnect()->prepare("SELECT sum(amount) AS amount from payment WHERE status='Paid' AND WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$cc->execute();
$cr=$cc->fetch();
$paid= $cr['amount'];


$tr=dbConnect()->prepare("SELECT sum(amount) AS amount from payment WHERE status='Pending' AND WEEKOFYEAR(created) =WEEKOFYEAR(now())");
$tr->execute();
$ro=$tr->fetch();
$pend = $ro['amount']; 

$tr1=dbConnect()->prepare("SELECT sum(amount) AS amount from payment WHERE status='Refund' AND WEEKOFYEAR(created) =WEEKOFYEAR(now())");
$tr1->execute();
$ro1=$tr1->fetch();
$refund = $ro1['amount']; 

$expected = $paid + $pend + $refund;

if($expected < 1){
    
    $pPaid = 0;
    $pPend = 0;
    $pRefund =0;
}else{

$pPaid= ($paid/$expected) * 100;
$pPend= ($pend/$expected) * 100;
$pRefund= ($refund/$expected) * 100;
}

$tr1=dbConnect()->prepare("SELECT count(id) AS count from send WHERE sstatus ='Cancel' AND  WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$tr1->execute();
$r1=$tr1->fetch();
$Wcancel = $r1['count'];

$tr2=dbConnect()->prepare("SELECT count(id) AS count from send WHERE sstatus ='Deliver' AND  WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$tr2->execute();
$r2=$tr2->fetch();
$Wdeliver = $r2['count'];
$deliver = $Wdeliver;

$tr3=dbConnect()->prepare("SELECT count(id) AS count from send WHERE sstatus ='Pending' AND  WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$tr3->execute();
$r3=$tr3->fetch();
$Wpend = $r3['count'];

$transit= $Wpend;

$ccc=  dbConnect()->prepare("SELECT sum(total_cost) AS amount from pickup WHERE  WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$ccc->execute();
$ccr=$ccc->fetch();
$pickup= $ccr['amount'];

$tr4=dbConnect()->prepare("SELECT count(id) AS count from pickup WHERE status ='Pending' AND  WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$tr4->execute();
$r4=$tr4->fetch();
$picks = $r4['count'];
?>
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo number_format($package); ?></h2>
                                <div class="m-b-5">PACKAGES</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>Weekly</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo number_format($deliver); ?></h2>
                                <div class="m-b-5">DELIVERIES</div><i class="ti-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>Weekly deliveries</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-primary color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo number_format($paid); ?></h2>
                                <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-dollar widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>Weekly Income</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo number_format($transit); ?></h2>
                                <div class="m-b-5">IN TRANSIT</div><i class="fa fa-bicycle widget-stat-icon"></i>
                                <div><i class="fa fa-level-down m-r-5"></i><small>Daily Transit</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="flexbox mb-4">
                                    <div>
                                        <h3 class="m-0">Overview</h3>
                                        <div>Weekly Delivery Overview</div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                            <div class="text-muted">WEEKLY INCOME</div>
                                            <div>
                                                <span class="text-success ml-2">=N= </span>
                                                <span class="h2 m-0"><?php echo number_format($paid); ?></span>
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <div class="text-muted">WEEKLY DELIVERIES</div>
                                            <div>
                                                <span class="h2 m-0"><?php echo $deliver; ?></span>
                                                <span class="text-warning ml-2"><i class="fa fa-cubes"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <canvas id="bar_chart" style="height:260px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Statistics</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <canvas id="doughnut_chart" style="height:160px;"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Paid <?php echo $pPaid ?>%</div>
                                        <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Pending <?php echo $pPend ?>%</div>
                                        <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Refund <?php echo $pRefund ?>%</div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-divider list-group-full">
                                    <li class="list-group-item">Pickup Service
                                        <span class="float-right text-success"><i class="fa fa-cube"></i> <?php echo number_format($picks) ;?></span>
                                    </li>
                                    <li class="list-group-item">Delivered
                                        <span class="float-right text-success"><i class="fa fa-cube"></i> <?php echo number_format($Wdeliver) ;?></span>
                                    </li>
                                    <li class="list-group-item">Pending
                                        <span class="float-right text-warning"><i class="fa fa-truck"></i> <?php echo number_format($Wpend) ;?></span>
                                    </li>
                                    <li class="list-group-item">Canceled
                                        <span class="float-right text-danger"><i class="fa fa-close"></i> <?php echo number_format($Wcancel); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title"><i class="fa fa-truck"></i> Daily Delivery Record</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                 <tr>
                                    <th></th>
                                    <th>Tracking No.</th>
                                    <th>Sender</th>
                                    <th>Address</th>
                                    <th>Destination</th>
                                    <th>Receiver</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                 <tr>
                                    <th></th>
                                    <th>Tracking No.</th>
                                    <th>Sender</th>
                                    <th>Address</th>
                                    <th>Destination</th>
                                    <th>Receiver</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sn=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.created=CURDATE() ORDER BY send.id DESC");
                                $counter=0;
                                $sn->execute();
                                while($r=$sn->fetch()){
                                    $trak= $r['tracking'];
                                ?>
                                <tr>
                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $r['tracking']; ?></td>
                                    <td><?php echo $r['fname']." ".$r['lname']; ?></td>
                                    <td><?php echo $r['address']; ?></td>
                                    <td><?php echo $r['raddress']; ?></td>
                                    <td><?php echo $r['rfname']." ".$r['rlname']; ?></td>
                                    <td><?php echo $r['package']; ?></td>
                                    <td><?php echo $r['cost']; ?></td> 
                                    <td>
                                        <div class="btn-toolbar m-b-10">
                                            <div class="btn-group btn-rounded">
                                                <a href="receipt?track=<?php echo $trak; ?>" class="btn btn-success" title="View"><i class="fa fa-upload"></i></a>
                                              <!--  <a class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Pickups</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                 <tr>
                                    <th></th>
                                    <th>Tracking No.</th>
                                    <th>Sender</th>
                                    <th>Address</th>
                                    <th>Destination</th>
                                    <th>Receiver</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                 <tr>
                                    <th></th>
                                    <th>Tracking No.</th>
                                    <th>Sender</th>
                                    <th>Address</th>
                                    <th>Destination</th>
                                    <th>Receiver</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sn=  dbConnect()->prepare("SELECT * FROM pickup, payment WHERE pickup.tracking = payment.tracking ");
                                $counter=0;
                                $sn->execute();
                                while($r=$sn->fetch()){
                                    $trk = $r['tracking'];
                                ?>
                                <tr>
                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $r['tracking']; ?></td>
                                    <td><?php echo $r['fname']." ".$r['lname']; ?></td>
                                    <td><?php echo $r['address']; ?></td>
                                    <td><?php echo $r['raddress']; ?></td>
                                    <td><?php echo $r['receiver']; ?></td>
                                    <td><?php echo $r['package']; ?></td>
                                    <td><?php echo $r['total_cost']; ?></td> 
                                    <td>
                                        <div class="btn-toolbar m-b-10">
                                            <div class="btn-group btn-rounded">
                                                <a href="receipt?track=<?php echo $trk; ?>" class="btn btn-success" title="View"><i class="fa fa-upload"></i></a>
                                               <!-- <a class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                            </div>
                            <div class="ibox-footer text-center">
                                <a href="javascript:;">View All Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php include 'foot.php'; ?>