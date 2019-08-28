<?php $logo = $this->db->get('webTable',1)->row_array(); ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled sleep awake" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url() ?>"><img src="<?php echo base_url('upload/'.$logo['logo']) ?>" alt="logo" style="width: 80px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php echo (empty($this->uri->segment(1))) ? 'active' : ''; ?>"><a href="<?php echo site_url(); ?>" class="nav-link">Home</a></li>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'booking') ? 'active' : ''; ?>"><a href="<?php echo site_url('booking'); ?>" class="nav-link">Appointment</a></li>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'news') ? 'active' : ''; ?>"><a href="<?php echo site_url('news'); ?>" class="nav-link">News</a></li>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'information') ? 'active' : ''; ?>"><a href="<?php echo site_url('information'); ?>" class="nav-link">Information</a></li>
        </ul>
	      <div class="dropdown">
				  <button id="dLabel" type="button" data-toggle="dropdown" class="dropdown" aria-haspopup="true" aria-expanded="false">
				    About
				  </button>
				  <div class="dropdown-menu">
					  <a class="dropdown-item" href="<?php echo site_url('about-us'); ?>">About us</a>
					  <a class="dropdown-item" href="<?php echo site_url('about-us/partner'); ?>">Partner</a>
					  <a class="dropdown-item" href="<?php echo site_url('about-us/testimonial'); ?>">Testimonial</a>
					  <a class="dropdown-item" href="<?php echo site_url('about-us/contact'); ?>">Contact</a>
					</div>
				</div>
				<div class="dropdown">
				  <button id="dLabel" type="button" data-toggle="dropdown" class="dropdown" aria-haspopup="true" aria-expanded="false">
				    Account
				  </button>
				  <div class="dropdown-menu">
				  	<?php 
				  		 if ($this->session->userdata('login') != TRUE) { ?>
							 	<a class="dropdown-item" href="<?php echo site_url('member/register'); ?>">Register</a>
					  		<a class="dropdown-item" href="<?php echo site_url('member/login'); ?>">Login</a>
							<?php }else{ ?>
				  	 		<a class="dropdown-item" href="<?php echo site_url('member/profile'); ?>">profile</a>
					  		<a class="dropdown-item" href="<?php echo site_url('member/log-out'); ?>">logout</a>
				  	<?php } ?>
					  
					</div>
				</div>
      </div>
    </div>
  </nav>
  <!-- END nav -->