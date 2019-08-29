<h2 class="section-title">market content</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/export',['id' => 'form_news']); ?>
            <input type="hidden" name="status" value="2">
            <input type="hidden" name="redirect" value="market">
                <div class="form-group row align-items-center">
                  <label class="form-control-label col-sm-3 text-md-right">file pdf</label>
                  <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                      <input type="file" name="file_export" class="custom-file-input" id="fileInput">
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