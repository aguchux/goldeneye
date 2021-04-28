<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="<?= $assets ?>/admin/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GoldenEye Capital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $UserInfo->avatar ?>" class="img-circle elevation-2" alt="<?= "{$UserInfo->firstname} {$UserInfo->lastname}" ?>">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= "{$UserInfo->firstname} {$UserInfo->lastname}" ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <?php if ($UserInfo->is_admin) : ?>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="/admin" class="nav-link <?= $menukey == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard <i class="right fas fa-angle-left"></i></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/accounts" class="nav-link <?= $menukey == 'accounts' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>All Accounts</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/admin/kyc" class="nav-link <?= $menukey == 'kyc' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Manage KYCs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/deposits" class="nav-link <?= $menukey == 'deposits' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>All Deposits.</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/investments" class="nav-link <?= $menukey == 'investments' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>All Investments.</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/withdrawals" class="nav-link <?= $menukey == 'withdrawals' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>All Withdrawals.</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/activities" class="nav-link <?= $menukey == 'activities' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>All Activities.</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/auth/logout" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout & Exit</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        <?php else : ?>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="/dashboard" class="nav-link <?= $menukey == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard <i class="right fas fa-angle-left"></i></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/dashboard/profile" class="nav-link <?= $menukey == 'profile' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>My Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $menukey == 'deposits' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Manage Deposits <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/deposits" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Deposits</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/deposits/new" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Deposit</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $menukey == 'investments' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Manage Investments <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/packages" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>Investment Plans</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/investments" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Investments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/packages" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Investment</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $menukey == 'withdrawals' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Manage Withdrawals <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/dashboard/withdrawals" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Withdrawals</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/withdrawals/new" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>Withdraw Money</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/dashboard/settings" class="nav-link <?= $menukey == 'settings' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Security & Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/bank" class="nav-link <?= $menukey == 'bank' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Bank Account</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/auth/logout" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout & Exit</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        <?php endif; ?>

    </div>
    <!-- /.sidebar -->
</aside>