

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo site_url('assets/front/') ?>js/jquery.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/popper.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/bootstrap.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/bootstrap-datepicker.js"></script>
  
  <script src="<?php echo site_url('assets/front/') ?>js/aos.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo site_url('assets/front/') ?>js/mains.js"></script>

  <script type="text/javascript">
      (function($){
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
          if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
          }
          var $subMenu = $(this).next(".dropdown-menu");
          $subMenu.toggleClass('show');

          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });

          return false;
        });
    })(jQuery)
  </script>

