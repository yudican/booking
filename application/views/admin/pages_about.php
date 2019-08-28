            <?php if ($this->uri->segment(3) == 'update') { ?>
            	<h2 class="section-title">About Page Update</h2>
            <div class="col-lg-12 col-md-12 ">
                <div class="card">
                  <div class="card-body">
                    <?php echo form_open('dashboard/about-us/update/'.$this->uri->segment(4),['id' => 'form_about']); ?>
		                    <div class="form-group row">
		                      <label for="title" class="col-sm-3 col-form-label">title Booking</label>
		                      <div class="col-sm-9">
		                        <input type="text" class="form-control" id="title" value="<?php echo set_value('title',$data['title']) ?>" name="title" placeholder="title">
		                        <span class="text-danger"><?php echo form_error('title') ?></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
		                      <label for="bookingBody" class="col-sm-3 col-form-label">body Booking</label>
		                      <div class="col-sm-9">
		                        <textarea class="form-control" name="bookingBody" placeholder="body Booking"><?php echo set_value('bookingBody',$data['bookingBody']) ?></textarea>
		                        <span class="text-danger"><?php echo form_error('bookingBody') ?></span>
		                      </div>
		                    </div>
		                    <div class="form-group row">
		                      <label for="aboutBody" class="col-sm-3 col-form-label">body About Us</label>
		                      <div class="col-sm-9">
		                        <textarea class="form-control" class="form-control" id="aboutBody" name="aboutBody" placeholder="body About Us"><?php echo set_value('aboutBody',$data['aboutBody']) ?></textarea>
		                        <span class="text-danger"><?php echo form_error('aboutBody') ?></span>
		                      </div>
		                    </div>
		                    <a href="<?php echo site_url('dashboard/about-us') ?>" class="btn btn-danger"><i class="fa fa-times"></i> cancel</a>
		                    <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
		                  <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
            	<h2 class="section-title">About Page</h2>
            <div class="row">
              <div class="col-lg-12 col-md-12 ">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="table_kategori" width="100%">
                        <thead>
                        	<tr>
	                          <th>#</th>
	                          <th>title</th>
	                          <th>text booking</th>
	                          <th>text about</th>
	                          <th>opsi</th>
	                        </tr>
                        </thead>
                        <tbody>
                        	<?php $no=1; foreach ($about as $data) { ?>
                        		<tr>
		                          <th><?php echo $no ?></th>
		                          <th><?php echo $data['title'] ?></th>
		                          <th><?php echo substr($data['bookingBody'], 0,50) ?>...</th>
		                          <th><?php echo substr($data['aboutBody'], 0,50) ?>...</th>
		                          <th><a href="<?php echo site_url('dashboard/about-us/update/'.$data['aboutId']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></th>
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


            
            