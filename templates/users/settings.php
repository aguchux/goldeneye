<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
                <div class="mb-3 text-center"><?= $Self->Toast(); ?></div>
                <div class="card">
                    <div class="card-header p-2">
                        <h3>Security & Settings</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="profile">
                                <form name="form-horizontal" class="form-horizontal" action="/user/forms/settings" method="POST">
                                    <?= $Self->tokenize() ?>

                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="emailnotix" name="emailnotix" value="<?= $UserInfo->emailnotix ?>" <?= $UserInfo->emailnotix?'checked':'' ?>>
                                            <label for="emailnotix">
                                                Enable Email notification
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="smsnotix" name="smsnotix"  value="<?= $UserInfo->smsnotix ?>" <?= $UserInfo->smsnotix?'checked':'' ?> disabled>
                                            <label for="smsnotix">
                                                Enable SMS notification
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="newsnotix" name="newsnotix"  value="<?= $UserInfo->newsnotix ?>" <?= $UserInfo->newsnotix?'checked':'' ?>>
                                            <label for="newsnotix">
                                                Enable Newsletter & Update
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn btn-danger">Save Settings</button>
                                    </div>

                                </form>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
            <div class="col-md-6">
                <div class="mb-3 text-center"><?= $Self->Toast(); ?></div>
                <div class="card">
                    <div class="card-header p-2">
                        <h3>Change Password</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="settings">
                                <form name="form-horizontal" class="form-horizontal" action="/user/forms/passwordify" method="POST">
                                    <?= $Self->tokenize() ?>

                                    <div class="form-group row">
                                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="newpassword" required name="newpassword" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="confirmpassword" required name="confirmpassword" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn btn-danger">Change Password</button>
                                    </div>


                                </form>
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->