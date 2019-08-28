			<?php $notif = $this->db->order_by('messageId','DESC')->get_where('message',['type' => 1],10); ?>
			<?php $getNotif = $this->db->get_where('message',['status' => 0,'type' => 1]); ?>
			<?php $testimonial = $this->db->order_by('messageId','DESC')->get_where('message',['type' => 2],10); ?>
			<?php $getNotifTestimonial = $this->db->get_where('message',['status' => 0,'type' => 2]); ?>
			<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle <?php echo ($getNotif->num_rows() > 0) ? 'beep' : '' ?>"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
              </div>
              <div class="dropdown-list-content dropdown-list-message">
              <?php foreach ($notif->result_array() as $n) { ?>
                <a href="<?php echo site_url('dashboard/messages/detail/'.$n['messageId']); ?>" class="dropdown-item dropdown-item-unread" style="<?php echo ($n['status'] == 0) ? 'background-color: lemonchiffon;' : ''; ?>">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?php echo base_url('assets'); ?>/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b><?php echo $n['name'] ?></b>
                    <p><?php echo substr($n['isi'], 0,20) ?>...</p>
                    <div class="time"><?php echo time_elapsed_string($n['datePost']) ?></div>
                  </div>
                </a>
              <?php } ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?php echo site_url('dashboard/messages') ?>">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo ($getNotifTestimonial->num_rows() > 0) ? 'beep' : '' ?>"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <?php foreach ($testimonial->result_array() as $t) { ?>
                <a href="<?php echo site_url('dashboard/testimonial/detail/'.$t['messageId']); ?>" class="dropdown-item" style="<?php echo ($t['status'] == 0) ? 'background-color: lemonchiffon;' : ''; ?>">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b><b><?php echo $t['name'] ?></b> Add Testimonial
                    <p><?php echo substr($t['isi'], 0,20) ?>...</p>
                    <div class="time"><?php echo time_elapsed_string($t['datePost']) ?></div>
                  </div>
                </a>
                <?php } ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?php echo site_url('dashboard/testimonial') ?>">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url('assets'); ?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('username'); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo site_url('dashboard/change/profile') ?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo site_url('dashboard/log-out') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>