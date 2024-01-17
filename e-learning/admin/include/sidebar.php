<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">

                    <div class="sidenav-menu-heading">Main</div>
                    <!-- (Dashboard)-->
                    <a class="nav-link" href="<?php base_url('admin/dashboard'); ?>">
                        <div class="nav-link-icon">
                            <i data-feather="home"></i>
                        </div>
                        Dashboards
                    </a>
                    <!-- (Guru)-->
                    <a class="nav-link" href="<?php base_url('admin/guru'); ?>">
                        <div class="nav-link-icon">
                            <i data-feather="users"></i>
                        </div>
                        Guru
                    </a>
                </div>
            </div>
            <!-- Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">
                        <?php echo $_SESSION['user']['nama']; ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>