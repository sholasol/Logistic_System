<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<?php 
$track = $_GET['track'];

$gt=  dbConnect()->prepare("SELECT * FROM send, payment WHERE send.tracking = payment.tracking AND send.tracking='$track'");
$gt->execute();
$r=$gt->fetch();
?>
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Receipt</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox invoice">
                    <div class="invoice-header">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="invoice-logo">
                                    <img src="assets/img/logos/logo-vue.png" height="65px"/>
                                </div>
                                <div>
                                    <div class="m-b-5 font-bold">Receipt</div>
                                    <div>ABC Logistics</div>
                                    <ul class="list-unstyled m-t-10">
                                        <li class="m-b-5">
                                            <span class="font-strong">A:</span> 4, Lekan Carenna Street,Fidiso Estate, Abijo.</li>
                                        <li class="m-b-5">
                                            <span class="font-strong">W:</span> info@abclogistics.com</li>
                                        <li>
                                            <span class="font-strong">P:</span> (+234) 817 0000 000</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-5 text-right">
                                <div class="clf" style="margin-bottom:30px;">
                                    <dl class="row pull-right" style="width:250px;">
                                        <dt class="col-sm-6">Invoice Date</dt>
                                        <dd class="col-sm-6"><?php echo $r['created'] ?></dd>
                                        <dt class="col-sm-6">Tracking No.</dt>
                                        <dd class="col-sm-6"><span class="btn btn-info"><?php echo $r['tracking']; ?></span></dd> 
                                    </dl>
                                </div>
                                <div>
                                    <div class="m-b-5 font-bold">Sender</div>
                                    <div><?php echo $r['fname']." ".$r['lname']; ?></div>
                                    <ul class="list-unstyled m-t-10">
                                        <li class="m-b-5"><?php echo $r['address']; ?></li>
                                        <li class="m-b-5"><?php echo $r['email']; ?></li>
                                        <li><?php echo $r['phone']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-1 text-right">
                        </div>
                    </div>
                    <table class="table table-striped no-margin table-invoice">
                        <thead>
                            <tr>
                                <th>Item Description</th>
                                <th>Size</th>
                                <th>Weight</th>
                                <th>Destination</th>
                                <th class="text-right">Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div><strong><?php echo $r['package']; ?></strong></div></td>
                                <td><?php echo $r['size']; ?></td>
                                <td>$220.00</td>
                                <td><?php echo $r['destination']; ?><br><?php echo $r['raddress']; ?></td>
                                <td><?php echo $r['cost']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-right">
                                <td>Subtotal:</td>
                                <td>$1840</td>
                            </tr>
                            <tr class="text-right">
                                <td>TAX 5%:</td>
                                <td>$92</td>
                            </tr>
                            <tr class="text-right">
                                <td class="font-bold font-18">TOTAL:</td>
                                <td class="font-bold font-18">$1748</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
                
                
            </div>
            <!-- END PAGE CONTENT-->
            <?php 
            session_write_close();
            include 'foot.php'; 
            ?>