<h2 class="section-title">Data Service</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <div class="row">
            	<div class="col-md-6">
            		<?php echo form_open_multipart('dashboard/service/'.$this->uri->segment(3).'/'.$this->uri->segment(4),['id' => 'form_news']); ?>
            		<div class="form-group row">
	                  <label for="service_name" class="col-sm-3 col-form-label">Service</label>
	                  <div class="col-sm-9">
	                  	<input type="text" class="form-control" id="service_name" value="<?php echo isset($data['service_name']) ? set_value('service_name',$data['service_name']) : '';  ?>" name="service_name" placeholder="Service">
	                    <span class="text-danger"><?php echo form_error('service_name') ?></span>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label for="categoryId" class="col-sm-3 col-form-label">Kategori</label>
	                  <div class="col-sm-9">
	                  	<select class="form-control" id="categoryId" name="categoryId">
	                  		<option value="">select category</option>
        					<?php if (isset($data['categoryId'])) {
        						$id = $data['categoryId'];
        					}else{
        						$id = '';
        					} ?>
	                  		<?php $no=1; foreach ($category as $cat) { ?>
            					<option value="<?php echo $cat['id'] ?>" <?php echo $cat['id'] == $id ? 'selected' : '' ?>><?php echo $cat['categoryName'] ?></option>
            				<?php } ?>
	                  	</select>
	                    <span class="text-danger"><?php echo form_error('categoryId') ?></span>
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
            					<th>Kategori</th>
            					<th>Service</th>
            					<th>aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; foreach ($results as $res) { ?>
            					<tr>
	            					<td><?php echo $no++ ?></td>
	            					<td><?php echo $res['categoryName']; ?></td>
	            					<td><?php echo $res['service_name']; ?></td>
	            					<td>
	            						<a href="<?php echo site_url('dashboard/service/edit/'.$res['service_id']) ?>" class="btn btn-success">edit</a>
	            						<a href="<?php echo site_url('dashboard/service/delete/'.$res['service_id']) ?>" class="btn btn-danger">hapus</a>

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