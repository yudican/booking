		<h2 class="section-title">Information</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/information',['id' => 'form_news']); ?>
                <div class="form-group">
                  <label for="informationBody">Information</label>
                   <textarea class="form-control" class="form-control" id="myEditor" name="informationBody" placeholder="body About Us"><?php echo isset($data['informationBody']) ? set_value('informationBody',$data['informationBody']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('informationBody') ?></span>
                </div>
                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>