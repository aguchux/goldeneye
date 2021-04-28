<section class="content pb-3">
    <div class="h-100 row g-2">

    <div class="col-3"></div>

        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Bank Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
                <form name="form-horizontal" class="form-horizontal" action="/user/forms/bank/update" method="POST">
                    <?= $Self->tokenize() ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bank_owner_name">Beneficiary Name</label>
                            <input type="text" class="form-control" id="bank_owner_name" name="bank_owner_name" placeholder="Beneficiary Name" value="<?= $UserInfo->bank_owner_name  ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="bank_owner_address">Beneficiary Address</label>
                            <input type="text" class="form-control" id="bank_owner_address" name="bank_owner_address" placeholder="Beneficiary Address" value="<?= $UserInfo->bank_owner_address  ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="<?= $UserInfo->bank_name  ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="bank_address">Bank Address</label>
                            <input type="text" class="form-control" id="plan" name="bank_address" placeholder="Bank Address" value="<?= $UserInfo->bank_address  ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="bank_account">Account Number</label>
                            <input type="text" class="form-control" id="plan" name="bank_account" placeholder="Account Number" value="<?= $UserInfo->bank_account  ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="bank_notes">Additional Iformation (SORT CODE / ABA / BRANCH CODE)</label>
                            <textarea class="form-control summernote" name="bank_notes" id="summernote"><?= $UserInfo->bank_notes  ?></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update BankAccount</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-3"></div>

    </div>
</section>