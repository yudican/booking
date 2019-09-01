    <?php $logo = $this->db->get('webTable',1)->row_array(); ?>
    <title><?php echo isset($title) ? $title : '' ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('upload/'.$logo['favicon']) ?>">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/aos.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/') ?>css/style.css">
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d600434eb1a6b0be6090b5d/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <style type="text/css">
        .block-30.block-30-sm, .block-30.block-30-sm .row {
            min-height: 500px;
            height: 70vh;
            margin-top: 17%;
        }
        .mb-30 {
		    margin-bottom: 23%;
		}
		.disable{
		   cursor: not-allowed;
		   pointer-events: none;
		   background-color: #e3b1b1;
		   border: 2px solid #e3b1b1;
	       color: #fff;
		}
		.dropdown{
			background-color: transparent;
			border: none;
			font-size: 16px;
			font-weight: inherit;
			padding-right: 10px;
		}

		.dropdown-submenu {
		  position: relative;
		}

		.dropdown-submenu .dropdown-menu {
		  top: 0;
		  left: 100%;
		  margin-top: -1px;
		}
    </style>