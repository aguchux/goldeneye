<div class="container-fluid">
    <div class="row">
        <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
            <div class="col-sm-5 authfy-panel-left" style="height:950px;">
                <div class="brand-col">
                    <div class="headline">
                        <!-- brand-logo start -->
                        <div class="brand-logo">
                            <img src="<?= $assets ?>/auth/images/brand-logo-white.png" width="220">
                        </div><!-- ./brand-logo -->
                        <p>Create a free account on Golden Eye Capital. Get started in minutes.</p>
                        <!-- social login buttons start -->
                        <?php include "./_private/auth_sidebar.php" ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 authfy-panel-right">
                <!-- authfy-login start -->
                <div class="authfy-login" style="height:950px;">


                    <!-- panel-signup start -->
                    <div class="authfy-panel panel-signup active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="authfy-heading text-center">
                                    <h3 class="auth-title">Sign up for free!</h3>
                                    <p>Already have an account? <a class="btn-link" href="/auth/login">Sign in Here!</a></p>
                                </div>
                                <div class="col-12 mb-3 text-center"><?= $Self->Toast(); ?></div>
                                <form name="signupForm" class="signupForm" action="/auth/forms/register" method="POST">
                                    <?= $Self->tokenize() ?>

                                    <div class="row">
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="form-group text-left">
                                                <label for="firstname">First Name</label>
                                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="firstname">Last Name</label>
                                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required aria-required="true">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="form-group text-left">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email address" required aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="mobile">Telephone</label>
                                                <input type="tel" class="form-control" name="mobile" placeholder="Telephone Number" required aria-required="true">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="form-group text-left">
                                                <label for="address">Contact Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Contact Address" required aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="postalcode">Postal Code</label>
                                                <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Postal Code" required aria-required="true">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="form-group text-left">
                                                <label for="country">Select Country</label>
                                                <select name="country" id="country" class="form-control" required aria-required="true">
                                                    <option value="" disabled selected>Select Country</option>
                                                    <?= $Core->LoadCountries() ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="form-group text-left">
                                                <label for="currency">Select Currency</label>
                                                <select name="currency" id="currency" class="form-control" required aria-required="true">
                                                    <option value="" disabled selected>Select Currency</option>
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Create Password</label>
                                        <div class="pwdMask">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required aria-required="true">
                                            <span class="fa fa-eye-slash pwd-toggle"></span>
                                        </div>
                                    </div>


                                    <div class="form-group text-center">
                                        <p class="term-policy text-muted small">I agree to the <a href="#">privacy policy</a> and <a href="#">terms of service</a>.</p>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up with email</button>
                                    </div>

                                </form>
                                <a class="btn-link" href="/auth/login">Already have an account?</a>
                            </div>
                        </div>
                    </div> <!-- ./panel-signup -->

                </div> <!-- ./authfy-login -->
            </div>
        </div>
    </div> <!-- ./row -->
</div>
<!-- ./container -->