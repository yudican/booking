  <?php 
  	$about = $this->db->get('aboutUs',1)->row_array();
		$newss = $this->db->get('newsTable',3)->result_array();
		$contact = $this->db->get('contactTable',1)->row_array();
   ?>
  <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">About Us</h3>
          <p class="mb-5"><?php echo isset($about['aboutBody']) ? substr($about['aboutBody'], 0,350) : ''; ?></p>
        </div>
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">News</h3>
          <?php foreach ($newss as $val) { ?>
          	<?php 
	          	$url = date('Y',strtotime($val['postDate'])).'/'.date('m',strtotime($val['postDate'])).'/'.$val['newsId'].'/'.str_replace(' ', '-', $val['newsTitle']);
	           ?>
          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="<?php echo site_url('upload/'.$val['newsBanner']) ?>" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="<?php echo site_url('news/'.$url) ?>"><?php echo (strlen($val['newsTitle']) > 50) ? substr($val['newsTitle'], 0,50).'...' : $val['newsTitle']; ?></a></h3>
            </div>
          </div>
				<?php } ?>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-23">
            <h3 class="heading-section">Contact Info</h3>
              <ul>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo isset($contact['contactPhone']) ? $contact['contactPhone'] : '' ?></span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo isset($contact['contactEmail']) ? $contact['contactEmail'] : '' ?></span></a></li>
                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo isset($contact['contactAdress']) ? $contact['contactAdress'] : '' ?></span></li>
                <li><span class="icon icon-clock-o"></span><span class="text"><?php echo isset($contact['jadwal']) ? $contact['jadwal'] : '' ?></span></li>
              </ul>
            </div>
        </div>
        
        
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-left">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>