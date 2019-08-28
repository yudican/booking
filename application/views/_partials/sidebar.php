			<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo site_url('dashboard') ?>">DASHBOARD</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo site_url('dashboard') ?>">DB</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="<?php echo site_url('dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="dropdown <?php echo ($this->uri->segment(1) == 'master') ? 'active':''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($this->uri->segment(2) == 'category') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/category') ?>">Category</a></li>
                <li class="<?php echo ($this->uri->segment(2) == 'service') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/service') ?>">Service</a></li>
                <li class="<?php echo ($this->uri->segment(2) == 'employee') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/employee') ?>">employee</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(1) == 'master') ? 'active':''; ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Pages Setting</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo ($this->uri->segment(2) == 'about-us') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/about-us') ?>">About Us</a></li>
                <li class="<?php echo ($this->uri->segment(2) == 'contact') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/contact') ?>">Contact</a></li>
                <li class="<?php echo ($this->uri->segment(2) == 'contact') ? 'active':''; ?>"><a class="nav-link" href="<?php echo site_url('dashboard/information') ?>">Information</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?php echo site_url('dashboard/news-list') ?>"><i class="far fa-square"></i> <span>News</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('dashboard/partner') ?>"><i class="far fa-square"></i> <span>Partner</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('dashboard/testimonial') ?>"><i class="far fa-square"></i> <span>Testimonial</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('dashboard/member-list') ?>"><i class="far fa-square"></i> <span>Member</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('dashboard/booking-list') ?>"><i class="far fa-square"></i> <span>Booking List</span></a></li>
             <li><a class="nav-link" href="<?php echo site_url('dashboard/messages') ?>"><i class="far fa-square"></i> <span>Messages</span></a></li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Setting</span></a>
              <ul class="dropdown-menu">
              	<li><a class="nav-link" href="<?php echo site_url('dashboard/site-setiing') ?>">Website Setting</a></li>
                <li><a class="nav-link" href="<?php echo site_url('dashboard/banner-setting') ?>">Banner Setting</a></li>
                <li><a class="nav-link" href="<?php echo site_url('dashboard/change/profile') ?>">Change profile</a></li>
              </ul>
            </li>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            
          </div>        </aside>
      </div>