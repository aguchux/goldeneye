<section class="content pb-3">
    <div class="h-100 row g-2">

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Make New Withdrawal</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="form-horizontal" class="form-horizontal" action="/user/forms/withdraw" method="POST">
                    <?= $Self->tokenize() ?>
                    <div class="card-body">
                        <div class="form-group">
                            
                            <label>Select Withdrawal Method</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="deposit" value="deposit" name="method" required aria-required="true">
                                <label for="deposit" class="custom-control-label">Direct FX/Bank Transfer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="bitcoin" value="bitcoin" name="method" required aria-required="true">
                                <label for="bitcoin" class="custom-control-label">Withdraw to BITCOIN Wallet</label>
                            </div>
                    
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount to Withdraw <span class="text-success"><?= $Core->Monify($Wallet['balance']) ?></span></label>
                            <input type="number" class="form-control form-control-lg" id="amount" name="amount" placeholder="0.00" max="<?= $Wallet['balance'] ?>" value="<?= $Wallet['balance'] ?>" required>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Withdrawal Invoice</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>