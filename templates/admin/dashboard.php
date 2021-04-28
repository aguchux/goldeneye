<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $Core->Monify($WalletInfo->balance) ?></h3>
                        <p>Availabe Balance</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $Core->Monify($Core->SumInvestments($accid)) ?></h3>
                        <p>My Investments</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $Core->Monify($Core->SumDeposit($accid)) ?></h3>
                        <p>My Deposits</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $Core->Monify($Core->SumWithdrawals($accid)) ?></h3>
                        <p>My Withdrawals</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->



        <!-- Main row -->
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
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>