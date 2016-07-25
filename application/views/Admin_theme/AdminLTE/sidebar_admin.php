<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Main Sidebar</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="active"><a href="<?= site_url('Admin'); ?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

    <li><a href="<?= site_url('admin/dashboard'); ?>"><i class="fa fa-link"></i> <span>Demo Dashboard</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Performance Analysis</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-bar-chart"></i> Performance of Technician</a></li>
            <li><a href="<?= site_url('Performance/supplier'); ?>"><i class="fa fa-bar-chart"></i> Performance of Supplier</a></li>
            <li><a href="<?= site_url('Performance/ranking_supplier'); ?>"><i class="fa fa-bar-chart"></i> Ranking of Supplier</a></li>
            <li><a href="<?= site_url('Performance/order_analysis'); ?>"><i class="fa fa-bar-chart"></i> Total Order Analysis</a></li>

        </ul>
    </li>
    <li class="treeview">
        <?php echo anchor('supply_info', '<i class="fa fa-link"></i> <span>Insert Info</span>'); ?>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><?php echo anchor('supply_style_no', '<i class="fa fa-link"></i>  <span>Style No</span>'); ?></li>
            <li><?php echo anchor('department', '<i class="fa fa-link"></i>  <span>Department</span>'); ?></li>
            <li><?php echo anchor('supplier', '<i class="fa fa-link"></i>  <span>Supplier</span>'); ?></li>
            <li><?php echo anchor('supply_session', '<i class="fa fa-link"></i>  <span>Supply Session</span>'); ?></li>
            <li><?php echo anchor('supply_fit_name', '<i class="fa fa-link"></i>  <span>Supply Fit Name</span>'); ?></li>
            <li><?php echo anchor('users_list', '<i class="fa fa-link"></i>  <span>Users</span>'); ?></li>
        </ul>
    </li>

    <li class="treeview">
        <?php echo anchor('qc_dashboard', '<i class="fa fa-link"></i>  <span>QC Dashboard</span>'); ?>
    </li>



    <li class="treeview">
        <?php echo anchor('search', '<i class="fa fa-link"></i>  <span>Search</span>'); ?>
    </li>

    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
</ul>
