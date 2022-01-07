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
                                <div class="ibox-title">Package Pending Delivery</div>
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
                                $sn=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.sstatus !='Delivered' AND send.sstatus !='Cancel'");
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
                </div>
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php include 'foot.php'; ?>