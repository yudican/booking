<div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <h2 class="heading">Testimonial</h2>
          </div>
        </div>
        <div class="row">
        	<?php foreach($results as $result): ?>
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="name-text align-self-center">
                  <h2 class="heading"><b><?php echo $result['name'] ?></b></h2>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; <?php echo $result['isi'] ?> &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
        	<?php endforeach; ?>
        </div>
      </div>
    </div>


    <div class="site-section">
    	<h1 class="text-center">Feedback Anda Sangat Membantu Kami</h1>
    	<p class="text-center">Silahkan isi formulir dibawah untuk memberi testiomoni tentang pelayanan kami</p>
    	<?php if ($this->session->flashdata('success')) { ?>
    	<p class="text-center" style="color: green;">Terima kasih telah melakukan feedback,feedback akan di tampilkan setelah disetujui oleh admin</p>
    	<?php } ?>
		  <div class="container">
		    <div class="row block-9">
		      <div class="col-md-8 mx-auto pr-md-5">
		        <?php echo form_open(site_url('about-us/contact-send')); ?>
			        <input type="hidden" name="type" value="2">
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
			            <input type="submit" value="Kirim" class="btn btn-primary py-3 px-5">
			          </div>
			        </form>
		      
		      </div>
		    </div>
		  </div>
		</div>