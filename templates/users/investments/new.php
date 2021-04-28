<section class="content pb-3">
    <div class="h-100 row g-2">

        <div class="col-4">
            <div class="card card-row card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= $package['name'] ?>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-info card-outline">

                        <div class="card-header">
                            <h5 class="card-title">From <strong><?= $Core->Monify($package['mindeposit']) ?></strong></h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link"><?= $package['roi'] ?>%</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" disabled>
                                <label class="custom-control-label">Package Name : &nbsp;&nbsp;<strong class="text-info"><?= $package['name'] ?></strong></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" disabled>
                                <label class="custom-control-label">Minimum Deposit : &nbsp;&nbsp;<strong class="text-info"><?= $Core->Monify($package['mindeposit']) ?></strong></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" disabled>
                                <label class="custom-control-label">Maximum Deposit : &nbsp;&nbsp;<strong class="text-info"><?= $Core->Monify($package['maxdeposit']) ?></strong></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" disabled>
                                <label class="custom-control-label">Return on Investment : &nbsp;&nbsp;<strong class="text-info"><?= $package['roi'] ?>%</strong></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" disabled>
                                <label class="custom-control-label">Duration of Investment : &nbsp;&nbsp;<strong class="text-info"><?= $package['duration'] ?> Days</strong></label>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Setup New Investment</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="form-horizontal" class="form-horizontal" action="/user/forms/<?= $package['pid'] ?>/invest" method="POST">
                  <?= $Self->tokenize() ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="plan">Selected Plan/Package</label>
                            <input type="text" class="form-control" id="plan" name="plan" placeholder="<?= $package['name'] ?>" value="<?= $package['name'] ?>" readonly aria-readonly="false" />
                        </div>
                        <div class="form-group">
                            <label for="amount">Investment Amount</label>
                            <input type="number" class="form-control form-control-lg" id="amount" name="amount" placeholder="0.00" min="<?= $package['mindeposit'] ?>" max="<?= $package['maxdeposit'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="notes">Additional Notes</label>
                            <textarea class="form-control summernote" name="notes" id="summernote"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Investment</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>