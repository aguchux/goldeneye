<section class="content pb-3">
    <div class="h-100 row g-2">

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Make New Deposit</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form name="form-horizontal" class="form-horizontal" action="/user/forms/deposit" method="POST">
                    <?= $Self->tokenize() ?>
                    <div class="card-body">
                        <div class="form-group">
                            
                            <label>Select Payment Method</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="deposit" value="deposit" name="method">
                                <label for="deposit" class="custom-control-label">Direct FX/Bank Transfer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="bitcoin" value="bitcoin" name="method">
                                <label for="bitcoin" class="custom-control-label">BITCOIN Payment</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="card" value="card" name="method" disabled>
                                <label for="card" class="custom-control-label">Credit/Debit Card Payment</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="paypal" value="paypal" name="method" disabled>
                                <label for="paypal" class="custom-control-label">Paypal Payment</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control form-control-lg" id="amount" name="amount" placeholder="0.00" required>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Deposit Invoice</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>