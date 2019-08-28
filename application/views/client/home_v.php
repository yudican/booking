 <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
    	<?php foreach ($banner as $ban) { ?>
      <div class="block-30 item" style="background-image: url('<?php echo site_url('upload/'.$ban['bannerImage']) ?>');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-10">
              <h2 class="heading" style="font-size: 40px;"><?php echo $ban['bannerTitle'] ?></h2>
              <h4 class="text-white" style="width: 500px;"><?php echo $ban['bannerText'] ?></h4>
            </div>
          </div>
        </div>
      </div>
    	<?php } ?>
    </div>
  </div>
		<div class="container">
      <div class="row mb-5">
      	<div class="col-md-6">
      		<div class="text">
            <div class="block-32" style="margin-top: 80px;">
            	<h2 class="heading"><?php echo isset($result['title']) ? $result['title'] : ''; ?></h2>
		            <p><?php echo isset($result['bookingBody']) ? substr($result['bookingBody'], 0,170) : ''; ?></p>
		            <br>
		            <h4>Mohon lengkapi data berikut dengan benar agar permintaan anda dapat diproses oleh sistem kami atau daftar akun.</h4>
		            <a href="<?php echo site_url('member/register'); ?>"><button class="btn btn-primary" type="button">Daftar Akun</button></a>
		          </div>
            </div>
      	</div>
        <div class="col-md-6">

          <div class="block-32" style="margin-top: 80px;">
            <?php echo form_open('booking/detail',['id' => 'booking_form']); ?>
              <div class="row">
                <div class="col-md-12 mb-3 mb-lg-0">
                  <label for="checkin">Category</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="category" id="category">
                    	<option>Select Category</option>
                    	<?php foreach ($category as $cat) {
                    		echo '<option value="'.$cat['id'].'">'.$cat['categoryName'].'</option>';
                    	} ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 mb-3 mb-lg-0">
                  <label for="checkin">Service</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="service" id="service">
                    	<option>Select Service</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="checkin">Employee</label>
                  <div class="field-icon-wrap">
                    <select class="form-control" name="employee" id="employee">
                    	<option>Select Employee</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 align-self-end mt-2">
                	<?php 
							  		 if ($this->session->userdata('login') != TRUE) { ?>
										 	<a href="<?php echo site_url('member/login'); ?>"><button class="btn btn-primary btn-block" type="button">Login To make apointment</button></a>
										<?php }else{ ?>
							  	 		<button class="btn btn-block disable" id="btn-booking">Booking Sekarang</button>
							  	<?php } ?>
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>

    <div class="site-section block-13 bg-light">
      <div class="container">
         <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Berita Terbaru</span>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="nonloop-block-13 owl-carousel">
              	<?php foreach ($news as $val) { ?>
              		<?php 
		              	$url = date('Y',strtotime($val['postDate'])).'/'.date('m',strtotime($val['postDate'])).'/'.$val['newsId'].'/'.str_replace(' ', '-', $val['newsTitle']);
		               ?>
              	<a href="<?php echo site_url('news/'.$url); ?>">
                  <div class="item">
                    <div class="block-34">
                      <div class="image">
                        <img src="<?php echo site_url('upload/'.$val['newsBanner']) ?>" alt="Image placeholder">
                      </div>
                      <div class="text">
                        <h4 class="heading" style="font-size: 18px;"><b><?php echo (strlen($val['newsTitle']) > 50) ? substr($val['newsTitle'], 0,50).'...' : $val['newsTitle']; ?></b></h4>
                        <p style="color: #000"><?php $text = strip_tags($val['newsBody']); echo substr($text, 0,200) ?>...</p>
                      </div>
                    </div>
                  </div>
                </a>
              <?php } ?>
              </div>
    
            </div> <!-- .col-md-12 -->
          </div>
      </div>
    </div>

    <div class="block-30 block-30-sm item" style="background-image: url('<?php echo site_url('assets/front/') ?>images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12">
              <h4 class="heading">About Us</h4>
              <h3 class="text-white"><?php echo isset($result['bookingBody']) ? substr($result['bookingBody'], 0,170) : ''; ?></h3>
              <p><a href="<?php echo site_url('about-us/contact') ?>" class="btn py-4 px-5 btn-primary">Hubungi Kami</a></p>
            </div>
          </div>
        </div>
      </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Reviews</span>
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