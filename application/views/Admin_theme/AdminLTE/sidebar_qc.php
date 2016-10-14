<!-- Sidebar Menu -->
<ul class="sidebar-menu">
    <li class="header">Main Sidebar</li>
    <!-- Optionally, you can add icons to the links -->

   

    
    <li class="treeview">
        <?php echo anchor('qc_dashboard', '<i class="fa fa-link"></i>  <span>Dashboard</span>'); ?>
    </li>
    <li class="treeview">
        <?php echo anchor('users_list/account_managment', '<i class="fa fa-edit"></i>  <span>Account Management</span>'); ?>
    </li>
    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
</ul>
