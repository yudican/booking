	
      <div class="container-fluid" style="margin-top: 10%;">
      <div class="row mb-5">
        <div class="col-md-12">

          <div class="block-32">
          	<div class="row">
          		<div class="col-md-4">
          			<div class="sidebar-box">
                  <div class="categories">
                    <h3>Profil Detail

                  	<a href="<?php echo site_url('member/change/profile') ?>" class="float-right">Edit profile</a>
                    </h3>
                    <li><a href="#" style="color: #000;">Nama <span style="color: #000;"><?php echo $profile['fullName'] ?></span></a></li>
                    <li><a href="#" style="color: #000;">Email <span style="color: #000;"><?php echo $profile['email'] ?></span></a></li>
                    <li><a href="#" style="color: #000;">Telepon <span style="color: #000;"><?php echo $profile['telepon'] ?></span></a></li>
                  </div>
                </div>
          		</div>
          		<div class="col-md-8">
          			<div class="table-responsive">
		            	<h3 class="text-center">My Booking List</h3>
		            	<table width="100%" class="table table-striped">
		            		<thead>
		            			<tr>
		            				<td>Booking ID</td>
		            				<td>Booking Date</td>
		            				<td>Booking Category</td>
		            				<td>Booking Time</td>
		            				<td>Booking Status</td>
		            				<td>Opsi</td>
		            			</tr>
		            		</thead>
		            		<tbody>
		            			<?php foreach ($results as $a) { ?>
		            				<tr>
			            				<td><?php echo $a['bookingId'] ?></td>
			            				<td><?php echo $a['bookDate'] ?></td>
			            				<td><!-- <?php //echo $a['categoyName'] ?> --></td>
			            				<td><?php echo $a['bookTime'] ?></td>
			            				<td><?php echo $a['status'] ?></td>
			            				<td><a href="<?php echo site_url('member/booking/detail/'.$a['bookingId']) ?>" ><button class="btn btn-primary" style="height:35px;">detail</button></a></td>
			            			</tr>
		            			<?php } ?>
		            		</tbody>
		            	</table>
		            </div>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>