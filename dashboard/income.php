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
                                <div class="ibox-title">Sales</div>
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
            <?php include 'foot.php'; ?>