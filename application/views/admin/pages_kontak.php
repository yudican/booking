<h2 class="section-title">Contact Update</h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart('dashboard/contact',['id' => 'form_news']); ?>
                <div class="form-group row">
                  <label for="contactPhone" class="col-sm-3 col-form-label">Telephone</label>
                  <div class="col-sm-9">
                  	<input type="text" class="form-control" id="contactPhone" value="<?php echo isset($data['contactPhone']) ? set_value('contactPhone',$data['contactPhone']) : '';  ?>" name="contactPhone" placeholder="08443943xxx">
                    <span class="text-danger"><?php echo form_error('contactPhone') ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="contactEmail" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="contactEmail" value="<?php echo isset($data['contactEmail']) ? set_value('contactEmail',$data['contactEmail']) : '';  ?>" name="contactEmail" placeholder="email@email.com">
                    <span class="text-danger"><?php echo form_error('contactEmail') ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="contactOffice" class="col-sm-3 col-form-label">Office</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="contactOffice" value="<?php echo isset($data['contactOffice']) ? set_value('contactOffice',$data['contactOffice']) : '';  ?>" name="contactOffice" placeholder="Tower suqare lt.1">
                    <span class="text-danger"><?php echo form_error('contactOffice') ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jadwal" class="col-sm-3 col-form-label">Hari kerja</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="jadwal" value="<?php echo isset($data['jadwal']) ? set_value('jadwal',$data['jadwal']) : '';  ?>" name="jadwal" placeholder="Selasa & Kamis , 09.00-16.00">
                    <span class="text-danger"><?php echo form_error('jadwal') ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="contactAdress" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                   <textarea class="form-control" class="form-control" name="contactAdress" placeholder="Jl . sawit no.10"><?php echo isset($data['contactAdress']) ? set_value('contactAdress',$data['contactAdress']) : '';  ?></textarea>
                    <span class="text-danger"><?php echo form_error('title') ?></span>
                  </div>
                </div>
                <button class="btn btn-success"><i class="fa fa-check"></i> save</button>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>