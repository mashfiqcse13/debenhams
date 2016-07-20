<!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Main Sidebar</li>
        <!-- Optionally, you can add icons to the links -->
        
        <li class="active"><a href="<?= site_url('Admin'); ?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Performance Analysis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?= site_url('Performance/technician'); ?>"><i class="fa fa-bar-chart"></i> Performance of Technician</a></li>
             
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Insert Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><?php echo anchor('supply_info', '<i class="fa fa-plus-circle"></i>  <span>Insert Info</span>'); ?></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Style No</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><?php echo anchor('supply_style_no', '<i class="fa fa-slideshare"></i>  <span>Style No</span>'); ?></li>
          </ul>
        </li>

        <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
      </ul>
      