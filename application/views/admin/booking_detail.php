<h2 class="section-title">detai booking #<?php echo $this->uri->segment(4) ?></h2>
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
          <div class="card-body">
            <table width="100%">
            		<thead>
            			<tr>
            				<td width="15%">Booking ID</td>
            				<td width="35%" id="bookId">: <?php echo isset($data['bookingId']) ? $data['bookingId'] : '-' ?></td>
            				<td width="15%">Category</td>
            				<td width="35%" id="bookCategori">: <?php echo isset($data['categoryName']) ? $data['categoryName'] : '-' ?></td>
            			</tr>
            			<tr>
            				<td width="15%">Booking Date</td>
            				<td width="35%" id="bookDate">: <?php echo isset($data['bookDate']) ? $data['bookDate'] : '-' ?></td>
            				<td width="15%">Service</td>
            				<td width="35%" id="bookService">: <?php echo isset($data['service_name']) ? $data['service_name'] : '-' ?></td>
            			</tr>
            			<tr>
            				<td width="15%">Booking Time</td>
            				<td width="35%" id="bookTime">: <?php echo isset($data['bookTime']) ? $data['bookTime'] : '-' ?></td>
            				<td width="15%">Employee</td>
            				<td width="35%" id="bookEmployee">: <?php echo isset($data['employeeName']) ? $data['employeeName'] : '-' ?></td>
            			</tr>
            		</thead>
            	</table>
            	<a href="<?php echo site_url('dashboard/booking-list') ?>" ><button class="btn btn-primary" style="height:35px;">Kembali</button></a>
          </div>
        </div>
      </div>
    </div>