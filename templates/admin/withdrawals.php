<?php
$DB = new Apps\MysqliDb;
$Withdrawals = $DB->get("withdrawals");
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View all Withdrawals.</h3>
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
                                <?php foreach ($Withdrawals as $withdrawal) : ?>
                                    <tr>
                                        <td><?= $withdrawal['id'] ?></td>
                                        <td><?= $Core->Monify($withdrawal['amount']) ?></td>
                                        <td><?= date("jS F Y H:i:s", strtotime($withdrawal['created'])) ?></td>
                                        <td><?= $withdrawal['status'] ?></td>
                                        <td> - </td>
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