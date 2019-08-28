		<div class="container" style="margin-top: 15%;">
      <div class="row mb-5">
        <div class="col-md-12">

          <div class="block-32">
          	<h3 class="text-center">Select Time</h3>
            <?php echo form_open('booking/detail'); ?>
            <input type="hidden" name="category" value="<?php echo (isset($category)) ? $category : '-' ?>">
            <input type="hidden" name="service" value="<?php echo (isset($service)) ? $service : '-' ?>">
            <input type="hidden" name="employee" value="<?php echo (isset($employee)) ? $employee : '-' ?>">
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                  <label for="checkin">I'm available on or after</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" id="available" name="tanggal" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                  <label for="checkin">Select time available</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="time" id="timeAvailable">
                    	<option>select available time</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 align-self-end">
                  <?php 
							  		 if ($this->session->userdata('login') != TRUE) { ?>
										 	<a href="<?php echo site_url('member/login'); ?>"><button class="btn btn-primary btn-block" type="button">Login To make apointment</button></a>
										<?php }else{ ?>
							  	 		<button class="btn btn-block disable" id="btn-detail">Booking Sekarang</button>
							  	<?php } ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      