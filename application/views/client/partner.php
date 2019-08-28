<div class="container" style="margin-top: 15%;">
	<div class="row">
		<?php foreach ($partner as $val) { ?>
  <div class="col-md-12 block-13">
    <div class="nonloop-block-13 owl-carousel">
      <div class="item">
        <div class="block-34">
          <div class="image">
            <a href="#"><img src="<?php echo site_url('upload/') ?><?php echo isset($val['partnerImage']) ? $val['partnerImage'] : ''; ?>" alt="Image placeholder"></a>
          </div>
          <div class="text">
            <h4 class="heading text-center" style="font-size: 16px;"><b> <?php echo isset($val['partnerTitle']) ? $val['partnerTitle'] : ''; ?></b></h4>
            <p class="text-center" style="font-size: 14px;"> <?php echo isset($val['partnerBody']) ? $val['partnerBody'] : ''; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</div>