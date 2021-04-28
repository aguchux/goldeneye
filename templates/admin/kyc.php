<?php
$DB = new Apps\MysqliDb;
$Accounts = $DB->where("kyc", 1)->get("inv_users");
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>KYC Document</th>
                                    <th>Date Added</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Accounts as $account) :
                                    $doc = ltrim($account['kyc_document'], "./");
                                    $docarr = explode(".", $doc);
                                    @$ext = $docarr[1];
                                    $imgfls = array('jpg', 'jpeg', 'png', 'gif');
                                ?>
                                    <tr>
                                        <td><?= $account['accid'] ?></td>
                                        <td><?= "{$account['firstname']} {$account['lastname']}" ?></td>
                                        <td><?= $account['email'] ?></td>
                                        <td><?= $account['mobile'] ?></td>
                                        <?php if ($ext == "pdf") : ?>
                                            <td><a target="_blank" href="<?= domain . "{$doc}" ?>"><i class="fa fa-file-pdf fa-3x"></i></a></td>
                                        <?php elseif (in_array($ext, $imgfls)) : ?>
                                            <td><img src="<?= domain . "{$doc}" ?>" style="height: 100px;"></td>
                                        <?php else : ?>
                                            <td><a target="_blank" href="<?= domain . "{$doc}" ?>"><?= domain . "{$doc}" ?></a></td>
                                        <?php endif; ?>
                                        <td><?= $account['kyc_date'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>KYC Document</th>
                                    <th>Date Added</th>
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