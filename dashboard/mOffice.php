<?php include 'nav.php'; ?>
<?php include 'side.php'; ?>
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Users</div>
                                <a href="office" class="btn btn-info pull-right"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                            <div class="ibox-body">
                          <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="40%">Name</th>
                                    <th width="41%">Email</th>
                                    <th width="11%">Joined</th>
                                    <th width="8%"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                $sq= dbConnect()->prepare("SELECT * FROM users WHERE role=2 AND compID='$comp' AND branch='$branch'");
                                $sq->execute();
                                while($r=$sq->fetch()){
                                    $id=$r['userID'];
                                ?>
                                <tr>
                                    <td><?php echo $r['fname']." ".$r['lname']; ?></td>
                                    <td><?php echo $r['email']; ?></td>
                                    <td><?php echo $r['joined']; ?></td>
                                    <td>
                                        <div class="btn-toolbar m-b-10">
                                            <div class="btn-group btn-rounded">
                                                <a href="Eoffice?id=<?php echo $id ?>" class="btn btn-success" title="View"><i class="fa fa-book co"></i></a>
                                                <a href="Eoffice?id=<?php echo $id ?>" class="btn btn-info" title="Edit" ><i class="fa fa-pencil co"></i></a>
                                                <a href="delOffice.php?id=<?php echo $id ?>" onclick="return confirm('Delete this user ?')" class="btn btn-danger" title="Delete"><i class="fa fa-trash co"></i></a>
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