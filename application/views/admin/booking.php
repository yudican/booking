							<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Member List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                        	<tr>
	                          <th>#</th>
	                          <td>Booking ID</td>
	                          <td>Client Name</td>
				            				<td>Booking Date</td>
				            				<td>Booking Category</td>
				            				<td>Booking Time</td>
				            				<td>Booking Status</td>
				            				<td>Opsi</td>
	                        </tr>
                        </thead>
                        <tbody>
	                        <?php $no=1; foreach ($results as $res) { ?>
	                        	<tr>
		                          <td><?php echo $no++; ?></td>
		                          <td><?php echo $res['bookingId']; ?></td>
		                          <td><?php echo $res['fullName']; ?></td>
		                          <td><?php echo $res['bookDate']; ?></td>
		                          <td><?php echo $res['categoryName']; ?></td>
		                          <td><?php echo $res['bookTime']; ?></td>
		                          <td><div class="badge badge-<?php echo $res['status'] == 'active' ? 'success' : 'danger'; ?>"><?php echo $res['status']; ?></div></td>
		                          <td>
		                          	<a href="<?php echo site_url('dashboard/booking-list/detail/'.$res['bookingId']); ?>" class="btn btn-success">detail</a> <a href="<?php echo site_url('dashboard/booking-list/delete/'.$res['bookingId']); ?>" class="btn btn-danger">Delete</a></td>
		                        </tr>
	                        <?php } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <?php echo $pagination; ?>

                  </div>
                </div>
              </div>