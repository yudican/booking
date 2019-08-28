		
		<div class="container mb-30" style="margin-top: 17%;">
      <div class="row mb-5">
        <div class="col-md-6 mx-auto">

          <div class="block-32">
          	<h3 class="text-center">Login</h3>
          	<?php if ($this->session->flashdata('success')) { ?>
			    	<p class="text-center" style="color: green;"><?php echo $this->session->flashdata('success') ?></p>
			    	<?php } ?>
			    	<?php if ($this->session->flashdata('error')) { ?>
			    	<p class="text-center" style="color: red;"><?php echo $this->session->flashdata('error') ?></p>
			    	<?php } ?>
             <?php echo form_open('member/login',['id' => 'login']); ?>
              <div class="row">
                <div class="col-md-12 mb-3 mb-lg-0">
                  <label for="userEmail">Username or email</label>
                  <div class="field-icon-wrap">
                    <input type="text" name="userEmail" class="form-control" id="userEmail" placeholder="UserEmail" value="<?php echo set_value('userEmail') ?>">
                    <small class="text-danger"><?php echo form_error('userEmail') ?></small>
                  </div>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="password">Password</label>
                  <div class="field-icon-wrap">
                     <input type="password" name="password" class="form-control" id="password" placeholder="password">
                     <small class="text-danger"><?php echo form_error('password') ?></small>
                  </div>
                </div>
                <div class="col-md-12 align-self-end mt-2">
                  <button class="btn btn-primary btn-block">login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
     