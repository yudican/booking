 			<h2 class="section-title text-capitalize"><?php echo $this->uri->segment(2) ?> List</h2>
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
	                          <th>name</th>
	                          <th>email</th>
	                          <th>isi</th>
	                          <?php if ($this->uri->segment(2) == 'testimonial') { ?>
		                          <th>status</th>
		                        <?php } ?>
	                          <th>opsi</th>
	                        </tr>
                        </thead>
                        <tbody>
                        	<?php $no=1; foreach ($results as $data) { ?>
                        		<tr>
		                          <th><?php echo $no ?></th>
		                          <th><?php echo $data['name'] ?></th>
		                          <th><?php echo $data['email'] ?></th>
		                          <th><?php echo substr($data['isi'], 0,50) ?>...</th>
		                          	<?php if ($this->uri->segment(2) == 'testimonial') { ?>
		                          <th>
		                          	<?php if ($data['status'] == 1) { ?>
		                          		<button class="btn btn-success btn-sm">PUBLISHED</button>
		                          	<?php }else{ ?>
		                          		<button class="btn btn-danger btn-sm">NOT PUBLISHED</button>
		                          <?php } ?>
		                          </th>
		                          	<?php } ?>
		                          <th><a href="<?php echo site_url('dashboard/'.$this->uri->segment(2).'/detail/'.$data['messageId']); ?>" class="btn btn-success"><i class="fa fa-folder-open"></i></a>
		                          	<a href="<?php echo site_url('dashboard/'.$this->uri->segment(2).'/delete/'.$data['messageId']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
		                        </tr>
                        	<?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
         
                </div>
              </div>
            </div>