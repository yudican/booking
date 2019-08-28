<h2 class="section-title">Data Employee</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <div class="row">
            	<div class="col-md-6">
            		<?php echo form_open_multipart('dashboard/employee/'.$this->uri->segment(3).'/'.$this->uri->segment(4),['id' => 'form_news']); ?>
            		<div class="form-group row">
	                  <label for="employeeName" class="col-sm-3 col-form-label">Employee</label>
	                  <div class="col-sm-9">
	                  	<input type="text" class="form-control" id="employeeName" value="<?php echo isset($data['employeeName']) ? set_value('employeeName',$data['employeeName']) : '';  ?>" name="employeeName" placeholder="Employee">
	                    <span class="text-danger"><?php echo form_error('employeeName') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="serviceId" class="col-sm-3 col-form-label">Service</label>
	                  <div class="col-sm-9">
	                  	<select class="form-control" id="serviceId" name="serviceId">
	                  		<option value="">Select Service</option>
        					<?php if (isset($data['serviceId'])) {
        						$id = $data['serviceId'];
        					}else{
        						$id = '';
        					} ?>
	                  		<?php $no=1; foreach ($service as $cat) { ?>
            					<option value="<?php echo $cat['service_id'] ?>" <?php echo $cat['service_id'] == $id ? 'selected' : '' ?>><?php echo $cat['service_name'] ?></option>
            				<?php } ?>
	                  	</select>
	                    <span class="text-danger"><?php echo form_error('serviceId') ?></span>
	                  </div>
	                </div>
	                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
	            	<?php echo form_close(); ?>
            	</div>
            	<div class="col-md-6">
            		<table width="100%" class="table table-striped">
            			<thead>
            				<tr>
            					<th>#</th>
            					<th>Employee</th>
            					<th>Service</th>
            					<th>aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; foreach ($results as $res) { ?>
            					<tr>
	            					<td><?php echo $no++ ?></td>
	            					<td><?php echo $res['employeeName']; ?></td>
	            					<td><?php echo $res['service_name']; ?></td>
	            					<td>
	            						<a href="<?php echo site_url('dashboard/employee/edit/'.$res['id']) ?>" class="btn btn-success">edit</a>
	            						<a href="<?php echo site_url('dashboard/employee/delete/'.$res['id']) ?>" class="btn btn-danger">hapus</a>

	            					</td>
	            				</tr>
            				<?php } ?>
            			</tbody>
            		</table>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>