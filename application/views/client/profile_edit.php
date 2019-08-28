		
		<div class="container mb-30" style="margin-top: 17%;">
      <div class="row mb-5">
        <div class="col-md-12 mx-auto">

          <div class="block-32">
          	<h3 class="text-center">Change Profile</h3>
          	<?php if ($this->session->flashdata('success')) { ?>
			    	<p class="text-center" style="color: green;"><?php echo $this->session->flashdata('success') ?></p>
			    	<?php } ?>
			    	<?php if ($this->session->flashdata('error')) { ?>
			    	<p class="text-center" style="color: red;"><?php echo $this->session->flashdata('error') ?></p>
			    	<?php } ?>
            <div class="row">
            	<div class="col-md-6">
            		 <?php echo form_open('member/change/profile',['id' => 'register']); ?>
		              <div class="row">
		                <div class="col-md-12 mb-3 mb-lg-0">
		                  <label for="fullName">Nama Lengkap</label>
		                  <div class="field-icon-wrap">
		                    <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Nama Lengkap" value="<?php echo set_value('fullName',$data['fullName']) ?>">
		                    <small class="text-danger"><?php echo form_error('fullName') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 mb-3 mb-lg-0">
		                  <label for="username">Username</label>
		                  <div class="field-icon-wrap">
		                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo set_value('username',$data['username']) ?>">
		                    <small class="text-danger"><?php echo form_error('username') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 mb-3 mb-lg-0">
		                  <label for="email">Email</label>
		                  <div class="field-icon-wrap">
		                    <input type="text" name="email" class="form-control" id="email" placeholder="email" value="<?php echo set_value('email',$data['email']) ?>">
		                    <small class="text-danger"><?php echo form_error('email') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 mb-3 mb-md-0">
		                  <label for="telepon">Telepon</label>
		                  <div class="field-icon-wrap">
		                     <input type="text" name="telepon" class="form-control" id="telepon" placeholder="telepon" value="<?php echo set_value('telepon',$data['telepon']) ?>">
		                     <small class="text-danger"><?php echo form_error('telepon') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 align-self-end mt-2">
		                  <button class="btn btn-primary btn-block">change profile</button>
		                </div>
		              </div>
		            </form>
            	</div>
            	<div class="col-md-6">
            		 <?php echo form_open('member/change/password',['id' => 'register']); ?>
		              <div class="row">
		              	<div class="col-md-12 mb-3 mb-md-0">
		                  <label for="password">Password Lama</label>
		                  <div class="field-icon-wrap">
		                     <input type="old_password" name="old_password" class="form-control" id="old_password" placeholder="old password">
		                     <small class="text-danger"><?php echo form_error('old_password') ?></small>
		                  </div>
		                </div>
		               <div class="col-md-12 mb-3 mb-md-0">
		                  <label for="password">Password Baru</label>
		                  <div class="field-icon-wrap">
		                     <input type="password" name="password" class="form-control" id="password" placeholder="password">
		                     <small class="text-danger"><?php echo form_error('password') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 mb-3 mb-md-0">
		                  <label for="confirm_password">Confirm Password Baru</label>
		                  <div class="field-icon-wrap">
		                     <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="confirm password">
		                     <small class="text-danger"><?php echo form_error('confirm_password') ?></small>
		                  </div>
		                </div>
		                <div class="col-md-12 align-self-end mt-2">
		                  <button class="btn btn-primary btn-block">change Password</button>
		                </div>
		              </div>
		            </form>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
     