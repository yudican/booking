<h2 class="section-title">Change Profile</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <div class="row">
            	<div class="col-md-6">
            		<?php echo form_open_multipart('dashboard/change/profile',['id' => 'form_news']); ?>
	                <div class="form-group row">
	                  <label for="fullName" class="col-sm-3 col-form-label">Nama Lengkap</label>
	                  <div class="col-sm-9">
	                  	<input type="text" class="form-control" id="fullName" value="<?php echo isset($data['fullName']) ? set_value('fullName',$data['fullName']) : '';  ?>" name="fullName" placeholder="08443943xxx">
	                    <span class="text-danger"><?php echo form_error('fullName') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="username" class="col-sm-3 col-form-label">Username</label>
	                  <div class="col-sm-9">
	                  <input type="text" class="form-control" id="username" value="<?php echo isset($data['username']) ? set_value('username',$data['username']) : '';  ?>" name="username" placeholder="jhon123">
	                    <span class="text-danger"><?php echo form_error('username') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="email" class="col-sm-3 col-form-label">Email</label>
	                  <div class="col-sm-9">
	                  <input type="text" class="form-control" id="email" value="<?php echo isset($data['email']) ? set_value('email',$data['email']) : '';  ?>" name="email" placeholder="email@email.com">
	                    <span class="text-danger"><?php echo form_error('email') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
	                  <div class="col-sm-9">
	                  <input type="text" class="form-control" id="telepon" value="<?php echo isset($data['telepon']) ? set_value('telepon',$data['telepon']) : '';  ?>" name="telepon" placeholder="Tower suqare lt.1">
	                    <span class="text-danger"><?php echo form_error('telepon') ?></span>
	                  </div>
	                </div>
	                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
	            	<?php echo form_close(); ?>
            	</div>
            	<div class="col-md-6">
            		<?php echo form_open_multipart('dashboard/change/password',['id' => 'form_news']); ?>
	                <div class="form-group row">
	                  <label for="old_password" class="col-sm-3 col-form-label">Password Lama</label>
	                  <div class="col-sm-9">
	                  	<input type="password" class="form-control" id="old_password" name="old_password" placeholder="08443943xxx">
	                    <span class="text-danger"><?php echo form_error('old_password') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
	                  <div class="col-sm-9">
	                  <input type="password" class="form-control" id="password" name="password" placeholder="jhon123">
	                    <span class="text-danger"><?php echo form_error('password') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="confirm_password" class="col-sm-3 col-form-label">Konfirm Password Baru</label>
	                  <div class="col-sm-9">
	                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm_password">
	                    <span class="text-danger"><?php echo form_error('confirm_password') ?></span>
	                  </div>
	                </div>
	                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
	            	<?php echo form_close(); ?>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>