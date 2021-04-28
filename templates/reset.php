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
                        <p>If you forgot your account login information, reset it here.</p>
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
                                    <h3 class="auth-title">Recover your password</h3>
                                    <p>Fill in your e-mail address below and we will send you an email with further instructions.</p>
                                </div>
                                <div class="col-12 mb-3 text-center"><?= $Self->Toast(); ?></div>
                                <form name="forgetForm" class="forgetForm" action="/auth/forms/reset" method="POST">
                                    <?= $Self->tokenize() ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" required aria-required="true" placeholder="Email OR Mobile">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Recover your password</button>
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