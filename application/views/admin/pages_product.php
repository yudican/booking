<h2 class="section-title">product</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/product/',['id' => 'form_news']); ?>
                <div class="form-group">
                  <label for="newsTitle">product title</label>
                  <input type="text" class="form-control" id="newsTitle" value="<?php echo isset($data['newsTitle']) ? set_value('newsTitle',$data['newsTitle']) : '';  ?>" name="newsTitle" placeholder="product title">
                    <span class="text-danger"><?php echo form_error('newsTitle') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBanner">product banner</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="newsBanner" id="fileInput">
                    <label class="custom-file-label" for="newsBanner">Choose file</label>
                  </div>
                    <span class="text-danger"><?php echo form_error('newsBanner') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBody">product description</label>
                   <textarea class="form-control" class="form-control" id="myEditor" name="newsBody" placeholder="product description"><?php echo isset($data['newsBody']) ? set_value('newsBody',$data['newsBody']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('title') ?></span>
                </div>
                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>