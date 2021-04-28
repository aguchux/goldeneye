<?php
$DB = new Apps\MysqliDb;
$Packages = $DB->get("packages");
?>
<section class="content pb-3">
    <div class="container-fluid h-100 row">

        <?php foreach ($Packages as $package) : ?>
            <div class="card card-row card-secondary col-3">
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
                        <div class="card-fotter form-group row">
                            <a href="/dashboard/packages/<?= $package['pid'] ?>/select" class="btn btn-success btn-block">Subscribe To This Package</a>
                        </div>


                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>