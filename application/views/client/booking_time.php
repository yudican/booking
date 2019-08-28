		<div class="container mb-30" style="margin-top: 17%;">
      <div class="row mb-5">
        <div class="col-md-12">

          <div class="block-32">
          	<h3 class="text-center">Booking Form</h3>
            <?php echo form_open('booking/detail'); ?>
            	<div class="row">
                <div class="col-md-4 mb-3 mb-lg-0">
                  <label for="checkin">Category</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="category" id="category">
                    	<option value="0">Select Category</option>
                    	<?php foreach ($category as $cat) {
                    		echo '<option value="'.$cat['id'].'">'.$cat['categoryName'].'</option>';
                    	} ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 mb-3 mb-lg-0">
                  <label for="checkin">Service</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="service" id="service">
                    	<option>Select Service</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                  <label for="checkin">Employee</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="employee" id="employee">
                    	<option>Select Employee</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4 align-self-end mt-4">
                  <?php 
							  		 if ($this->session->userdata('login') != TRUE) { ?>
										 	<a href="<?php echo site_url('member/login'); ?>"><button class="btn btn-primary btn-block" type="button">Login To make apointment</button></a>
										<?php }else{ ?>
							  	 		<button class="btn btn-block disable" id="btn-booking">Booking Sekarang</button>
							  	<?php } ?>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
     