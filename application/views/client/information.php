<style type="text/css">
	img {
	    max-width: 100%;
	}
</style>
    
		
<div id="blog" class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center">
                <?php echo isset($result['informationBody']) ? $result['informationBody'] : '' ?>
            </div>
            <!-- .col-md-8 -->
            <div class="col-md-4">
                <h5>Recent Articles</h5>
                	<?php foreach ($recent as $re) { ?>
                    <?php 
	              	$url = date('Y',strtotime($re['postDate'])).'/'.date('m',strtotime($re['postDate'])).'/'.$re['newsId'].'/'.str_replace(' ', '-', $re['newsTitle']);
	               ?>
                  <div class="block-21 d-flex mb-4">
                      <figure class="mr-3">
                          <img src="<?php echo site_url('upload/'.$re['newsBanner']) ?>" alt="" class="img-fluid">
                      </figure>
                      <div class="text" style="width: 100%">
                          <h5 class="heading" style="font-size: 16px;"><a href="<?php echo site_url('news/'.$url); ?>"><?php echo (strlen($re['newsTitle']) > 50) ? substr($re['newsTitle'], 0,30).'...' : $re['newsTitle']; ?></a></h5>
                          <div class="meta">
                              <div><span class="icon-calendar"></span>
                                  <?php echo mediumdate_indo($re['postDate']) ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
            </div>
        </div>
    </div>
</div>