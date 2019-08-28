<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/components.css">

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <?php echo form_open('dashboard/login',['id' => 'login']); ?>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="userEmail" class="form-control" id="userEmail" placeholder="UserEmail" value="<?php echo set_value('userEmail') ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('userEmail') ?>
                    </div>
                  </div>

                  <div class="form-group">
                     <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    <div class="invalid-feedback">
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <?php if ($this->session->flashdata('error')) { ?>
					    	<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
					    	<?php } ?>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets'); ?>/modules/jquery.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/popper.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/tooltip.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/moment.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets'); ?>/js/scripts.js"></script>
  <script src="<?php echo base_url('assets'); ?>/js/custom.js"></script>
</body>
</html>