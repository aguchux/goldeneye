<?php
$DB = new Apps\MysqliDb;
$Deposits = $DB->where("accid", $Self->storage("accid"))->get("deposits");
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View all your Deposits.</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Amount</th>
                                    <th>Action Date</th>
                                    <th>Status</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Deposits as $deposit) : ?>
                                    <tr>
                                        <td><?= $deposit['id'] ?></td>
                                        <td><?= $Core->Monify($deposit['amount']) ?></td>
                                        <td><?= date("jS F Y H:i:s", strtotime($deposit['created'])) ?></td>
                                        <td><?= $deposit['status'] ?></td>
                                        <td>
                                            <?php if ($deposit['status'] == "pending") : ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#depositview">View Payment Details</button>
                                                <div class="modal fade" id="depositview">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Deposit #<?= $deposit['id'] ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h2>Payment Details</h2>
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Payment ID</th>
                                                                            <td><?= $deposit['id'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Method</th>
                                                                            <td><?= $deposit['method'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Pay To</th>
                                                                            <td>- - -</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">I understand</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            <?php elseif ($deposit['status'] == "processed") : ?>
                                                <a type="button" class="text-success">Processed & Funded</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Amount</th>
                                    <th>Action Date</th>
                                    <th>Status</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->