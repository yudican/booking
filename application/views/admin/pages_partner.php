            <?php if ($this->uri->segment(3) == 'update' || $this->uri->segment(3) == 'insert') { ?>
            	<h2 class="section-title">Partner Page Form</h2>
            <div class="col-lg-12 col-md-12 ">
                <div class="card">
                  <div class="card-body">
                    <?php echo form_open_multipart('dashboard/partner/'.$action.'/'.$this->uri->segment(4),['id' => 'form_about']); ?>
		                    <div class="form-group row">
		                      <label for="partnerName" class="col-sm-3 col-form-label">Partner Name</label>
		                      <div class="col-sm-9">
		                        <input type="text" class="form-control" id="partnerName" value="<?php echo isset($data['partnerName']) ? set_value('partnerName',$data['partnerName']) : ''; ?>" name="partnerName" placeholder="partner Name">
		                        <span class="text-danger"><?php echo form_error('partnerName') ?></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
		                      <label for="partnerTitle" class="col-sm-3 col-form-label">Partner Title</label>
		                      <div class="col-sm-9">
		                        <input type="text" class="form-control" id="partnerTitle" value="<?php echo isset($data['partnerTitle']) ? set_value('partnerTitle',$data['partnerTitle']) : ''; ?>" name="partnerTitle" placeholder="partner Title">
		                        <span class="text-danger"><?php echo form_error('partnerTitle') ?></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
				                  <label for="partnerImage" class="col-sm-3 col-form-label">Partner Image</label>
					                 <div class="col-sm-9">
					                 		 <div class="custom-file">
						                    <input type="file" class="custom-file-input" name="partnerImage" id="fileInput">
						                    <label class="custom-file-label" for="partnerImage">Choose file</label>
						                  </div>
					                    <span class="text-danger"><?php echo form_error('partnerImage') ?></span>
					                 </div>
				                </div>
		                    <div class="form-group row">
		                      <label for="partnerBody" class="col-sm-3 col-form-label">Partner Text</label>
		                      <div class="col-sm-9">
		                        <textarea class="form-control" class="form-control" id="partnerBody" name="partnerBody" placeholder="body About Us"><?php echo isset($data['partnerBody']) ? set_value('partnerBody',$data['partnerBody']) : ''; ?></textarea>
		                        <span class="text-danger"><?php echo form_error('partnerBody') ?></span>
		                      </div>
		                    </div>
		                    <a href="<?php echo site_url('dashboard/partner') ?>" class="btn btn-danger"><i class="fa fa-times"></i> cancel</a>
		                    <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
		                  <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
            	<h2 class="section-title">Partner Page</h2>
            <div class="row">
              <div class="col-lg-12 col-md-12 ">
                <div class="card">
                  <div class="card-header">
                  	<a href="<?php echo site_url('dashboard/partner/insert'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> partner</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="table_kategori" width="100%">
                        <thead>
                        	<tr>
	                          <th>#</th>
	                          <th>title</th>
	                          <th>name</th>
	                          <th>opsi</th>
	                        </tr>
                        </thead>
                        <tbody>
                        	<?php $no=1; foreach ($partner as $data) { ?>
                        		<tr>
		                          <th><?php echo $no ?></th>
		                          <th><?php echo $data['partnerTitle'] ?></th>
		                          <th><?php echo $data['partnerName'] ?></th>
		                          <th><a href="<?php echo site_url('dashboard/partner/update/'.$data['partnerId']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></th>
		                        </tr>
                        	<?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
         
                </div>
              </div>
            </div>
            <?php } ?>


            
            