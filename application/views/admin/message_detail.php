						<div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $this->uri->segment(2) ?> Detail</h4>
                  </div>
                  <div class="card-body">
                    <div class="tickets">
                      <div class="ticket-content">
                        <div class="ticket-header">
                          <div class="ticket-sender-picture img-shadow">
                            <img src="<?php echo base_url('assets'); ?>/img/avatar/avatar-5.png" alt="image">
                          </div>
                          <div class="ticket-detail">
                            <div class="ticket-title">
                              <h4><?php echo (isset($row['name'])) ? $row['name'] :''; ?></h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600"><?php echo (isset($row['email'])) ? $row['email'] :''; ?></div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p><?php echo (isset($row['isi'])) ? $row['isi'] :''; ?></p>

                          <div class="ticket-divider"></div>
                         <a href="<?php echo site_url('dashboard/'.$this->uri->segment(2)) ?>" class="btn btn-warning">kembali</a>
                         <?php if ($this->uri->segment(2) == 'testimonial') { ?>
                         	<?php if ($row['publish'] == 1) { ?>
                         		<a href="<?php echo site_url('dashboard/testimonial/unpublish/'.$row['messageId']) ?>" class="btn btn-danger">unpublish</a>
	                         <?php }else{ ?>
	                         	<a href="<?php echo site_url('dashboard/testimonial/publish/'.$row['messageId']) ?>" class="btn btn-success">publish</a>
	                        <?php 
	                        	}
	                      } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>