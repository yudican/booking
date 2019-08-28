 	<?php if ($this->uri->segment(3) == 'update' || $this->uri->segment(3) == 'insert') { ?>
 		<h2 class="section-title">About Page Update</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/news-list/'.$action.'/'.$this->uri->segment(4),['id' => 'form_news']); ?>
                <div class="form-group">
                  <label for="newsTitle">news title</label>
                  <input type="text" class="form-control" id="newsTitle" value="<?php echo isset($data['newsTitle']) ? set_value('newsTitle',$data['newsTitle']) : '';  ?>" name="newsTitle" placeholder="newsTitle">
                    <span class="text-danger"><?php echo form_error('newsTitle') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBanner">banner</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="newsBanner" id="fileInput">
                    <label class="custom-file-label" for="newsBanner">Choose file</label>
                  </div>
                    <span class="text-danger"><?php echo form_error('newsBanner') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBody">body</label>
                   <textarea class="form-control" class="form-control" id="myEditor" name="newsBody" placeholder="body About Us"><?php echo isset($data['newsBody']) ? set_value('newsBody',$data['newsBody']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('title') ?></span>
                </div>
                <a href="<?php echo site_url('dashboard/news-list') ?>" class="btn btn-danger"><i class="fa fa-times"></i> cancel</a>
                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
 	<?php }else{ ?>
 		<h2 class="section-title">News List</h2>
    <div class="row">
      <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-header">
          	<a href="<?php echo site_url('dashboard/news-list/insert'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> news</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md" id="table_kategori" width="100%">
                <thead>
                	<tr>
                    <th>#</th>
                    <th>title</th>
                    <th>isi</th>
                    <th>opsi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($news as $row) { ?>
                		<tr>
                      <th><?php echo $no ?></th>
                      <th><?php echo substr($row['newsTitle'], 0,30) ?>...</th>
                      <th><?php echo substr($row['newsBody'], 0,70) ?>...</th>
                      <th><a href="<?php echo site_url('dashboard/news-list/update/'.$row['newsId']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                      	<a href="<?php echo site_url('dashboard/news-list/delete/'.$row['newsId']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
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