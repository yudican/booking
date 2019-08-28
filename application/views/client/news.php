<div class=" site-section bg-light" id="blog">
    
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-4">
      	<?php foreach ($news as $val) { ?>
          <div class="block-3 d-md-flex">
            <div class="text" style="width: 100%">
              <h2 class="heading"><a href="#"><?php echo (strlen($val['newsTitle']) > 50) ? substr($val['newsTitle'], 0,50).'...' : $val['newsTitle']; ?></a></h2>
              <p class="meta"><em>Posted on</em> <?php echo mediumdate_indo($val['postDate']) ?> <span class="sep">&bullet;</span> <em>by</em> <a href="#">Admin</a> </p>
              <p><?php $text = strip_tags($val['newsBody']); echo substr($text, 0,200) ?>...</p>
              <?php 
              	$url = date('Y',strtotime($val['postDate'])).'/'.date('m',strtotime($val['postDate'])).'/'.$val['newsId'].'/'.str_replace(' ', '-', $val['newsTitle']);
               ?>
              <p><a href="<?php echo site_url('news/'.$url); ?>" class="btn btn-primary">Read More</a></p>
            </div>
          </div>  
        <?php } ?>
        </div>
        <div class="col-md-4">
        	<h5>Recent Articles</h5>
        	<?php foreach ($recent as $re) { ?>
        		<?php 
              	$url = date('Y',strtotime($val['postDate'])).'/'.date('m',strtotime($val['postDate'])).'/'.$val['newsId'].'/'.str_replace(' ', '-', $val['newsTitle']);
               ?>
        	<div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="<?php echo site_url('upload/'.$re['newsBanner']) ?>" alt="" class="img-fluid">
            </figure>
            <div class="text" style="width: 100%">
              <h5 class="heading" style="font-size: 16px;"><a href="<?php echo site_url('news/'.$url); ?>"><?php echo (strlen($re['newsTitle']) > 50) ? substr($re['newsTitle'], 0,30).'...' : $re['newsTitle']; ?></a></h5>
              <div class="meta">
                <div><span class="icon-calendar"></span> <?php echo mediumdate_indo($re['postDate']) ?></a></div>
              </div>
            </div>
          </div>
          <?php } ?>

          <!-- tag -->
        </div>

      </div>

      <div class="row mt-5">
        <div class="col-md-7 pt-5">
         <?php echo $pagination; ?>
      </div>
        </div>
      </div>
  </div>
 </div>