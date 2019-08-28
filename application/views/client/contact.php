<div class="site-section">
	<?php if ($this->session->flashdata('success')) { ?>
	<p class="text-center" style="color: green;">Terima kasih telah melakukan feedback</p>
	<?php } ?>
  <div class="container">
    <div class="row block-9">
    	<div class="col-md-5 pr-md-5">
  			
  			<div class="media block-6" style="margin-bottom: 0">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Phone</h3>
            <p><?php echo (isset($contact['contactPhone']) ? $contact['contactPhone'] : ''); ?></p>
          </div>
	      </div>     

	      <div class="media block-6" style="margin-bottom: 0">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Email</h3>
            <p><?php echo (isset($contact['contactPhone']) ? $contact['contactEmail'] : ''); ?></p>
          </div>
	      </div>   

	      <div class="media block-6" style="margin-bottom: 0">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Alamat kantor</h3>
            <p><?php echo (isset($contact['contactPhone']) ? $contact['contactAdress'] : ''); ?></p>
          </div>
	      </div>   

	      <div class="media block-6" style="margin-bottom: 0">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading">Office</h3>
            <p><?php echo (isset($contact['contactPhone']) ? $contact['contactOffice'] : ''); ?></p>
          </div>
	      </div>   


  		</div>
      <div class="col-md-6 pl-md-5">
        <?php echo form_open(site_url('about-us/contact-send')); ?>
        <input type="hidden" name="type" value="1">
          <div class="form-group">
            <input type="text" class="form-control px-3 py-3" name="name" placeholder="Your Name" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control px-3 py-3" name="email" placeholder="Your Email" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control px-3 py-3" name="telepon" placeholder="Telepon" required="">
          </div>
          <div class="form-group">
            <textarea cols="30" rows="7" name="isi" class="form-control px-3 py-3" placeholder="Message" required=""></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Hubungi Kami" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>
    </div>
  </div>
</div>