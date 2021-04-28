<div class="container-fluid">
    <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
            <div class="col-sm-5 authfy-panel-left" style="height:500px;">
                <div class="brand-col">

                    <div class="headline">
                        <!-- brand-logo start -->
                        <div class="brand-logo">
                        <img src="<?= $assets ?>/auth/images/brand-logo-white.png" width="220">
                        </div><!-- ./brand-logo -->
                        <p>Login to Golden Eye Capital to access your investment portfolios.</p>
                        <!-- social login buttons start -->
                        <?php include "./_private/auth_sidebar.php" ?>
                    </div>

                </div>
            </div>
            <div class="col-sm-7 authfy-panel-right">
                <!-- authfy-login start -->
                <div class="authfy-login" style="height:500px;">

                    <!-- panel-login start -->
                    <div class="authfy-panel panel-login text-center active">
                        <div class="authfy-heading">
                            <h3 class="auth-title">Login to your account</h3>
                            <p>Don’t have an account? <a class="btn-link" href="/auth/register">Sign Up Free!</a></p>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3 text-center"><?= $Self->Toast(); ?></div>
                            <div class="col-xs-12 col-sm-12">
                                <form name="loginForm" class="loginForm" action="/auth/forms/login" method="POST">
                                    <?= $Self->tokenize() ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control email" name="username" placeholder="Email address" required aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <div class="pwdMask">
                                            <input type="password" class="form-control password" name="password" placeholder="Password" required aria-required="true">
                                            <span class="fa fa-eye-slash pwd-toggle"></span>
                                        </div>
                                    </div>
                                    <!-- start remember-row -->
                                    <div class="row remember-row">
                                        <div class="col-xs-6 col-sm-6">
                                            <label class="checkbox text-left">
                                                <input type="checkbox" value="remember-me">
                                                <span class="label-text">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <p class="forgotPwd">
                                                <a class="btn-link" href="/auth/reset">Forgot password?</a>
                                            </p>
                                        </div>
                                    </div> <!-- ./remember-row -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login with email</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ./panel-login -->

                </div> <!-- ./authfy-login -->
            </div>
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->