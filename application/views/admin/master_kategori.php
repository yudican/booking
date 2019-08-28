<h2 class="section-title">Data Kategori</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <div class="row">
            	<div class="col-md-6">
            		<?php echo form_open_multipart('dashboard/category/'.$this->uri->segment(3).'/'.$this->uri->segment(4),['id' => 'form_news']); ?>
	                <div class="form-group row">
	                  <label for="categoryName" class="col-sm-3 col-form-label">Nama Kategori</label>
	                  <div class="col-sm-9">
	                  	<input type="text" class="form-control" id="categoryName" value="<?php echo isset($data['categoryName']) ? set_value('categoryName',$data['categoryName']) : '';  ?>" name="categoryName" placeholder="Nama Kategori">
	                    <span class="text-danger"><?php echo form_error('categoryName') ?></span>
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
            					<th>Nama Kategori</th>
            					<th>aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; foreach ($results as $res) { ?>
            					<tr>
	            					<td><?php echo $no++ ?></td>
	            					<td><?php echo $res['categoryName']; ?></td>
	            					<td>
	            						<a href="<?php echo site_url('dashboard/category/edit/'.$res['id']) ?>" class="btn btn-success">edit</a>
	            						<a href="<?php echo site_url('dashboard/category/delete/'.$res['id']) ?>" class="btn btn-danger">hapus</a>

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