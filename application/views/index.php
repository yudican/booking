<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('_partials/head.php'); ?>
</head>
  <style type="text/css">
		.modal-backdrop {
		  position: relative;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  left: 0;
		  background-color: #000000;
		}
		.modal__content {
      height: 700px !important;
      max-height: calc(100vh - 50px) !important;
    }

  </style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="height: 70px;"></div>
      <!-- navbar -->
      <?php $this->load->view('_partials/navbar.php'); ?>
      <!-- sidebar -->
      <?php $this->load->view('_partials/sidebar.php'); ?>
      

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
        	<?php if ($this->session->flashdata('success')) { ?>
        		<div class="alert alert-success mt-3"><?php echo $this->session->flashdata('success') ?></div>
        	<?php } if ($this->session->flashdata('error')) { ?>
        		<div class="alert alert-danger mt-3"><?php echo $this->session->flashdata('error') ?></div>
        	<?php } ?>
          	<?php $this->load->view('_partials/content.php'); ?>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
  	<!-- js -->
  	<?php $this->load->view('_partials/js.php'); ?>
  
</body>
</html>