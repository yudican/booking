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
	                          <th>Name</th>
	                          <th>username</th>
	                          <th>email</th>
	                          <th>telepon</th>
	                          <th>Action</th>
	                        </tr>
                        </thead>
                        <tbody>
	                        <?php $no=1; foreach ($results as $res) { ?>
	                        	<tr>
		                          <td><?php echo $no++; ?></td>
		                          <td><?php echo $res['fullName']; ?></td>
		                          <td><?php echo $res['username']; ?></td>
		                          <td><?php echo $res['email']; ?></td>
		                          <td><?php echo $res['telepon']; ?></td>
		                          <!-- <td><div class="badge badge-<?php //echo $res['status'] == 'active' ? 'success' : 'danger'; ?>"><?php //echo $res['status']; ?></div></td> -->
		                          <td><a href="<?php echo site_url('dashboard/member-list/delete/'.$res['id']); ?>" class="btn btn-danger">Delete</a></td>
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