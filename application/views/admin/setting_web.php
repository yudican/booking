<h2 class="section-title">Site Settings</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/site-setting/store',['id' => 'form_news']); ?>
                <div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                  <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                      <input type="file" name="logo" class="custom-file-input" id="fileInput">
                      <label class="custom-file-label">Choose File</label>
                    </div>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                  <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                      <input type="file" name="favicon" class="custom-file-input" id="fileInput">
                      <label class="custom-file-label">Choose File</label>
                    </div>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                  </div>
                </div>
                <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>