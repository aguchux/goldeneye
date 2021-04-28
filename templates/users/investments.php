    <?php
    $DB = new Apps\MysqliDb;
    $Investments = $DB->where("accid", $Self->storage("accid"))->get("investments");
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View all your Investments.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Expected Payout</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Current Earning</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Investments as $investment) : ?>
                                        <tr>
                                            <td><?= $investment['id'] ?></td>
                                            <td><?= $investment['plan'] ?>(<?= $investment['package'] ?>)</td>
                                            <td><?= $Core->Monify($investment['amount']) ?></td>
                                            <td><?= $Core->Monify($investment['payout']) ?></td>

                                            <td><?= date("jS F Y", strtotime($investment['starts'])) ?></td>
                                            <td><?= date("jS F Y", strtotime($investment['ends'])) ?></td>

                                            <?php if ($investment['status'] == "running") : ?>
                                                <td class="text-success"><i class="fa fa-cog fa-spin"></i> Running</td>
                                            <?php elseif ($investment['status'] == "completed") : ?>
                                                <td class="text-success"><i class="fa fa-checked"></i> Completed</td>
                                            <?php endif; ?>
                                            <td><?= $Core->Monify($Core->ROI($investment['id'])) ?></td>
                                            <td> - </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Expected Payout</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Current Earning</th>
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