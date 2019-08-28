<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php $this->load->view('_partials/client/head'); ?>
  </head>
  <body>
    
  <?php $this->load->view('_partials/client/navbar'); ?>
  
 


  	<?php $this->load->view('_partials/content'); ?>
  	<?php $this->load->view('_partials/client/footer'); ?>
		<?php $this->load->view('_partials/client/js'); ?>
		    <script type="text/javascript">
	            	
    	  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)    // Kita sembunyikan dulu untuk loadingnya    
    	  	var token = '';
	    	token = $('input[name=PointOfSale]').val();
	    	  $("#available").change(function(){ // Ketika user mengganti atau memilih 
	    	  	var val = $(this).val();
	    	  	var d = new Date();
	    	  	var date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
		    	   
	    	  token = $('input[name=PointOfSale]').val(); 
		    	  $.ajax({        
				    	  type: "POST", // Method pengiriman data bisa dengan GET atau POST        
				    	  url: "<?php echo base_url("booking/getTime"); ?>", // Isi dengan url/path file php yang dituju        
				    	  data : {
			            		tanggal:$(this).val(),
			            		PointOfSale: token
			            	}, // data yang akan dikirim ke file yang dituju        
				    	  dataType: "json",       
				    	   success: function(response){ // Ketika proses pengiriman berhasil          
				    	  if (response.status === true) {
							  	$('#btn-detail').removeClass('disable').addClass('btn-primary');
							  }else{
							    $('#btn-detail').addClass('disable').removeClass('btn-primary');
							  }
				    	  $('input[name=PointOfSale]').val(response.token);       
				    	   $("#timeAvailable").html(response.time).show();        },       
				    	   error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
				    	   console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
				    	}      
				    });    
		    	}); 


		    	$("#category").change(function(){ // Ketika user mengganti atau memilih data provinsi  
		    	 token = $('input[name=PointOfSale]').val();    
		    	 var val = $(this).val();
		    	 if (val === '0') {
					    $('#btn-booking').addClass('disable').removeClass('btn-primary');
					  }else{
					  	$('#btn-booking').removeClass('disable').addClass('btn-primary');
					  }
		    	  $.ajax({        
				    	  type: "POST", // Method pengiriman data bisa dengan GET atau POST        
				    	  url: "<?php echo base_url("booking/getService"); ?>", // Isi dengan url/path file php yang dituju        
				    	  data : {
			            		category:val,
			            		PointOfSale: token
			            	}, // data yang akan dikirim ke file yang dituju        
				    	  dataType: "json",       
				    	   success: function(response){ // Ketika proses pengiriman berhasil          

				    	  $('input[name=PointOfSale]').val(response.token);
				    	  $('#service').empty();
				    	  $("#service").append('<option value="-">Select Service</option>').show();   
				    	  $('#employee').empty();
				    	  $("#employee").append('<option value="-">Select Employee</option>').show();       
				    	   $("#service").append(response.data).show();        },       
				    	   error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
				    	   console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
				    	}      
				    });    
		    	});


		    	$("#service").change(function(){ // Ketika user mengganti atau memilih data provinsi     
		    		token = $('input[name=PointOfSale]').val();
		    	  $.ajax({        
				    	  type: "POST", // Method pengiriman data bisa dengan GET atau POST        
				    	  url: "<?php echo base_url("booking/getEmployee"); ?>", // Isi dengan url/path file php yang dituju        
				    	  data : {
			            		service:$(this).val(),
			            		PointOfSale: token
			            	}, // data yang akan dikirim ke file yang dituju        
				    	  dataType: "json",       
				    	   success: function(response){ // Ketika proses pengiriman berhasil          
				    	  // lalu munculkan kembali comboboxnya  
				    	   // $("#timeAvailable").load(window.location + " #timeAvailable");
				    	   $('#employee').empty();
				    	  $("#employee").append('<option value="-">Select Employee</option>').show();   
				    	  $('input[name=PointOfSale]').val(response.token);       
				    	   $("#employee").append(response.data).show();        },       
				    	   error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
				    	   console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
				    	}      
				    });    
		    	});  

    		});
    </script>
    
  </body>
</html>