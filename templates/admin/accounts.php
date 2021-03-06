<?php
$DB = new Apps\MysqliDb;
$Accounts = $DB->get("inv_users");
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View all Accounts.</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Country(Currency)</th>
                                    <th>Address</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Accounts as $account) : ?>
                                    <tr>
                                    <td><?= $account['accid'] ?></td>
                                        <td><?= "{$account['firstname']} {$account['lastname']}" ?></td>
                                        <td><?= $account['email'] ?></td>
                                        <td><?= $account['mobile'] ?></td>
                                        <td><?= "{$account['country']}({$account['currency']})" ?></td>
                                        <td><?= $account['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Country(Currency)</th>
                                    <th>Address</th>
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