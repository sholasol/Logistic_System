<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
$tcost =0;
$gt=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking ");
$gt->execute();
while($r=$gt->fetch()){
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

$tcost +=$cost;
}

$cc=  dbConnect()->prepare("SELECT count(id) AS count from send WHERE sstatus='Deliver'");
$cc->execute();
$cr=$cc->fetch();
$deliver = $cr['count'];

$pk=dbConnect()->prepare("SELECT count(id) AS count from send WHERE WEEKOFYEAR(created) =WEEKOFYEAR(now()) ");
$pk->execute();
$rr=$pk->fetch();
$package = $rr['count'];

$tr=dbConnect()->prepare("SELECT count(id) AS count from send WHERE sstatus !='Deliver' AND sstatus !='Cancel' AND created=CURDATE()");
$tr->execute();
$ro=$tr->fetch();
$transit = $ro['count'];
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
                                <h2 class="m-b-5 font-strong"><?php echo number_format($tcost); ?></h2>
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
                                                <span class="h2 m-0">$850</span>
                                                <span class="text-success ml-2"><i class="fa fa-dollar"></i> +25%</span>
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <div class="text-muted">WEEKLY DELIVERIES</div>
                                            <div>
                                                <span class="h2 m-0">240</span>
                                                <span class="text-warning ml-2"><i class="fa fa-cubes"></i> -12%</span>
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
                                        <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Received 52%</div>
                                        <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Delivered 27%</div>
                                        <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Pending 21%</div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-divider list-group-full">
                                    <li class="list-group-item">Delivered
                                        <span class="float-right text-success"><i class="fa fa-cube"></i> 200</span>
                                    </li>
                                    <li class="list-group-item">Pending
                                        <span class="float-right text-warning"><i class="fa fa-truck"></i> 50</span>
                                    </li>
                                    <li class="list-group-item">Canceled
                                        <span class="float-right text-danger"><i class="fa fa-close"></i> 4</span>
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
                                                <a class="btn btn-success" title="View"><i class="fa fa-upload"></i></a>
                                                <a class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
                                $sn=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.sstatus='Pickup'");
                                $counter=0;
                                $sn->execute();
                                while($r=$sn->fetch()){
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
                                                <a class="btn btn-success" title="View"><i class="fa fa-upload"></i></a>
                                                <a class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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