    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            <h1 class="card-title text-center">Upload Your KYC</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form name="forgetForm" class="forgetForm" action="/users/forms/kyc/verify" method="POST" enctype="multipart/form-data">
                                <?= $Self->tokenize() ?>

                                <strong><i class="far fa-file-alt mr-1"></i>Upload KYC to verify your account</strong>
                                <p class="text-muted">We need to verify your identity before you can perform financial transactions on the platform.</p>
                                <hr>
                                <img src="<?= $assets ?>/admin/dist/img/sample.jpg" class="w-100">
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Relevant Document (<i>*jpg or pdf*</i>)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" required aria-required="true" class="custom-file-input" id="documents" name="documents">
                                            <label class="custom-file-label" for="exampleInputFile">Select document</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="input-group-text btn-info" type="submit">Upload KYC file</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3"></div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->