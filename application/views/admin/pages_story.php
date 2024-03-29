<h2 class="section-title">story</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/story/',['id' => 'form_news']); ?>
                <div class="form-group">
                  <label for="newsTitle">story title</label>
                  <input type="text" class="form-control" id="newsTitle" value="<?php echo isset($data['newsTitle']) ? set_value('newsTitle',$data['newsTitle']) : '';  ?>" name="newsTitle" placeholder="story title">
                    <span class="text-danger"><?php echo form_error('newsTitle') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBanner">story banner</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="newsBanner" id="fileInput">
                    <label class="custom-file-label" for="newsBanner">Choose file</label>
                  </div>
                    <span class="text-danger"><?php echo form_error('newsBanner') ?></span>
                </div>
                <div class="form-group">
                  <label for="newsBody">story description</label>
                   <textarea class="form-control" class="form-control" id="myEditor" name="newsBody" placeholder="story description"><?php echo isset($data['newsBody']) ? set_value('newsBody',$data['newsBody']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('title') ?></span>
                </div>
                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>