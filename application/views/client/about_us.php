<div class="container">
      <div class="row mb-5">
      	<div class="col-md-6">
      		<div class="text">
            <div class="block-32" style="margin-top: 80px;">
            	<h2 class="heading">Tentang Kami</h2>
		           <?php echo isset($result['aboutBody']) ? $result['aboutBody'] : ''; ?>
		          </div>
            </div>
      	</div>
		      	<div class="col-md-6">
		      		<div class="text">
		            <div class="block-32" style="margin-top: 80px;">
		            	<h2 class="heading">Partner Kami</h2>
		            	<?php foreach ($partner as $val) { ?>
	            		<div class="media block-6" style="margin-bottom: 0">
				          <div class="icon"><span class="ion-ios-checkmark"></span></div>
				          <div class="media-body">
				            <h3 class="heading"><?php echo $val['partnerName'] ?></h3>
				          </div>
					</div>  
					<?php } ?>   
			          </div>
		            </div>
		      	</div>
		      </div>
		      
		    </div>
		     <div class="block-30 block-30-sm item" style="background-image: url('<?php echo site_url('assets/front/') ?>images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	        <div class="container">
	          <div class="row align-items-center">
	            <div class="col-md-12">
	              <h5 class="heading">Punya pertanyaan?</h5>
	              <h4 class="text-white">Jika anda ingin tahu lebih lanjut mengenai kantor bersama eksport maupun lembaga yang terkait, silahkan tinggalkan pesan, pertanyaan ataupun saran melalui tombol dibawah atau melalui live chat yang tersedia</h4>
	              <p><a href="#" class="btn py-4 px-5 btn-primary">HUBUNGI KAMI</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
