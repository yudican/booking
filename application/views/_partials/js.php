	<!-- General JS Scripts -->
  <script src="<?php echo base_url('assets'); ?>/modules/jquery.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/popper.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/tooltip.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/moment.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets'); ?>/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/sweetalert/sweetalert.min.js"></script>

  <script src="<?php echo base_url('assets'); ?>/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/modules/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <!-- modal -->
  <script src="<?php echo base_url('assets'); ?>/js/page/bootstrap-modal.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets'); ?>/js/scripts.js"></script>
  <script src="<?php echo base_url('assets'); ?>/js/script.js"></script>
  <script src="<?php echo base_url('assets'); ?>/js/custom.js"></script>

  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-rc.2/js/froala_editor.pkgd.min.js'></script>
    <script src="<?php echo base_url('assets'); ?>/js/image.min.js"></script>
    <script>
      new FroalaEditor('#myEditor', {
        requestWithCORS: false,
        toolbarInline: false,
        imageUploadURL: '<?php echo site_url('dashboard/upload') ?>',
        imageUploadParams: {id: 'my_editor'},

        // Set request type.
        imageUploadMethod: 'POST',
      })
    </script>
    <script>
        $('#fileInput').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
