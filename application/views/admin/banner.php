 	<?php if ($this->uri->segment(3) == 'update' || $this->uri->segment(3) == 'insert') { ?>
 		<h2 class="section-title">banner form</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body"> 
            <?php echo form_open_multipart('dashboard/banner-setting/'.$action.'/'.$this->uri->segment(4),['id' => 'form_news']); ?>
            		<div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">banner title</label>
                  <div class="col-sm-6 col-md-9">
                    <input type="text" class="form-control" id="bannerTitle" name="bannerTitle" placeholder="text" value="<?php echo isset($data['bannerTitle']) ? set_value('bannerTitle',$data['bannerTitle']) : '';  ?>">
                    <span class="text-danger"><?php echo form_error('bannerText') ?></span>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">banner text</label>
                  <div class="col-sm-6 col-md-9">
                    <textarea class="form-control" id="bannerText" name="bannerText" placeholder="text"><?php echo isset($data['bannerText']) ? set_value('bannerText',$data['bannerText']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('bannerText') ?></span>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">banner image</label>
                  <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                      <input type="file" name="bannerImage" class="custom-file-input" id="fileInput">
                      <label class="custom-file-label"><?php echo isset($data['bannerImage']) ? set_value('bannerImage',$data['bannerImage']) : 'Choose file';  ?></label>
                    </div>
                    <span class="text-danger"><?php echo form_error('bannerImage') ?></span>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                  </div>
                </div>
                <a href="<?php echo site_url('dashboard/banner-setting') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                <button class="btn btn-success" type="submit" value="submit" name="submit"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
 	<?php }else{ ?>
 		<h2 class="section-title">banner List</h2>
    <div class="row">
      <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-header">
          	<a href="<?php echo site_url('dashboard/banner-setting/insert'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> banner</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table_kategori" width="100%">
                <thead>
                	<tr>
                    <th>#</th>
                    <th>banner title</th>
                    <th>banner Image</th>
                    <th>opsi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($banner as $row) { ?>
                		<tr>
                      <th><?php echo $no ?></th>
                      <th><?php echo substr($row['bannerTitle'], 0,100) ?>...</th>
                      <th><img src="<?php echo base_url('upload/'.$row['bannerImage']) ?>" width="70" height="40"></th>
                      <th><a href="<?php echo site_url('dashboard/banner-setting/update/'.$row['id']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                      	<a href="<?php echo site_url('dashboard/banner-setting/delete/'.$row['id']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
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