<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= $UserInfo->avatar ?>">
            </div>

            <h3 class="profile-username text-center"><?= "{$UserInfo->firstname} {$UserInfo->lastname}" ?></h3>

            <p class="text-muted text-center">Registered: <?= date("jS F, Y", strtotime($UserInfo->created)) ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Balance</b> <a class="float-right"><?= $Core->Monify($WalletInfo->balance) ?></a>
              </li>
              <li class="list-group-item">
                <b>Investment</b> <a class="float-right"><?= $Core->Monify($Core->SumInvestments($accid)) ?></a>
              </li>
              <li class="list-group-item">
                <b>Deposits</b> <a class="float-right"><?= $Core->Monify($Core->SumDeposit($accid)) ?></a>
              </li>
              <li class="list-group-item">
                <b>Withdrawals</b> <a class="float-right"><?= $Core->Monify($Core->SumWithdrawals($accid)) ?></a>
              </li>
              <li class="list-group-item text-muted">
                <b>Email</b> <a class="float-right"><?= $UserInfo->email ?></a>
              </li>
              <li class="list-group-item text-muted">
                <b>Mobile</b> <a class="float-right"><?= $UserInfo->mobile ?></a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">

        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Edit Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline & Notifications</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

              <div class="active tab-pane" id="profile">
                <form name="form-horizontal" class="form-horizontal" action="/user/forms/profile" method="POST">
                  <?= $Self->tokenize() ?>

                  <div class="form-group row">
                    <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="firstname" required name="firstname" placeholder="First Name" value="<?= $UserInfo->firstname ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lastname" required name="lastname" placeholder="Last Name" value="<?= $UserInfo->lastname ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" readonly aria-readonly="true" name="email" placeholder="Email Address" value="<?= $UserInfo->email ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="mobile" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mobile" required name="mobile" placeholder="Telephone" value="<?= $UserInfo->mobile ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Contact Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Contact Address" required aria-required="true" value="<?= $UserInfo->address ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="postalcode" class="col-sm-2 col-form-label">Postal Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="Postal Code" required aria-required="true" value="<?= $UserInfo->postalcode ?>">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="country" class="col-sm-2 col-form-label">Selected Country</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="country" id="country" placeholder="Country" readonly aria-readonly="true" required aria-required="true" value="<?= $UserInfo->country ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="currency" class="col-sm-2 col-form-label">Select Currency</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" required aria-required="true" value="<?= $UserInfo->currency ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Save Profile</button>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">

                  <!-- timeline time label -->
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>

                  <!-- timeline time label -->
                  <div class="time-label"><span class="bg-success"><?= date("j F, Y", strtotime($UserInfo->created)) ?></span></div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-success"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> <?= $Core->Cycle(strtotime($UserInfo->created)) ?></span>
                      <h3 class="timeline-header"><a href="javascript:;">You registered</a> with Golden Eye Capital</h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->