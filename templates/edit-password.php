<div class="container-fluid">
    <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
            <div class="col-sm-5 authfy-panel-left">
                <div class="brand-col">
                    <div class="headline">
                        <!-- brand-logo start -->
                        <div class="brand-logo">
                        <img src="<?= $assets ?>/auth/images/brand-logo-white.png" width="220">
                        </div><!-- ./brand-logo -->
                        <p>Kindly change your password to a new one to continue.</p>
                        <?php include "./_private/auth_sidebar.php" ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 authfy-panel-right">
                <!-- authfy-login start -->
                <div class="authfy-login">



                    <!-- panel-forget start -->
                    <div class="authfy-panel panel-forgot active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="authfy-heading">
                                    <h3 class="auth-title">Change your password</h3>
                                    <p>You can now change to a new password, this process is not reversible.</p>
                                </div>
                                <div class="col-12 mb-3 text-center"><?= $Self->Toast(); ?></div>
                                <form name="forgetForm" class="forgetForm" action="/auth/forms/edit-password" method="POST">
                                    <?= $Self->tokenize() ?>
                                    
                                    <h3>Welcome <?= $Self->storage("ThisUser") ?>, use the box below to change your password.</h3>
                                    
                                    <div class="form-group">
                                            <input type="password" class="form-control password" name="password" placeholder="New Password" required aria-required="true">
                                    </div>

                                    <div class="form-group">
                                            <input type="password" class="form-control password" name="password_cmf" placeholder="Confirm Password" required aria-required="true">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn-link" href="/auth/login">Already have an account?</a>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn-link" href="/auth/register">Don’t have an account?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ./panel-forgot -->

                </div>
                <!-- ./authfy-login -->
            </div>
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->