<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
 <?php $this->load->view('_partials/client/head'); ?>
</head>

<style type="text/css">
	.carousel-caption {
    width:100%;
    height:100%;
    left:0 !important;
	}

	.carousel-caption h3 {
	  text-align:left;
	  margin-left:10px;
	  margin-top:20%;
	}
	.carousel-caption p {
	  text-align:left;
	  margin-left:10px;
	}
	#msform {
  text-align: center;
  position: relative;
  margin-top: 30px;
}

#msform fieldset {
  border: 0 none;
  border-radius: 0px;
  box-sizing: border-box;
  width: 100%;
  margin: 0 10%;

  /*stacking fieldsets above each other*/
  position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
  display: none;
}

/*inputs*/
#msform input,
#msform select {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 0px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #2c3e50;
  font-size: 13px;
}

#msform input:focus,
#msform select:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid #ee0979;
  outline-width: 0;
  transition: All 0.5s ease-in;
  -webkit-transition: All 0.5s ease-in;
  -moz-transition: All 0.5s ease-in;
  -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
  width: 100px;
  background: #ee0979;
  font-weight: bold;
  color: white;
  border: 0 none;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
  text-align: center;
  position: relative;
}

#msform .action-button:hover,
#msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
}

#msform .action-button-previous {
  width: 100px;
  background: #c5c5f1;
  font-weight: bold;
  color: white;
  border: 0 none;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #c5c5f1;
}

/*headings*/
.fs-title {
  font-size: 18px;
  text-transform: uppercase;
  color: #2c3e50;
  margin-bottom: 10px;
  letter-spacing: 2px;
  font-weight: bold;
}

.fs-subtitle {
  font-weight: normal;
  font-size: 13px;
  color: #666;
  margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
  margin-left: 70px;
}

#progressbar li {
  list-style-type: none;
  color: black;
  text-transform: uppercase;
  font-size: 9px;
  width: 33.33%;
  float: left;
  position: relative;
  letter-spacing: 1px;
}

#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 24px;
  height: 24px;
  line-height: 26px;
  display: block;
  font-size: 12px;
  color: #333;
  background: white;
  border-radius: 25px;
  margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
  content: "";
  width: 100%;
  height: 2px;
  background: white;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,
#progressbar li.active:after {
  background: #ee0979;
  color: black;
}

/* Not relevant to this form */
.dme_link {
  margin-top: 30px;
  text-align: center;
}
.dme_link a {
  background: #fff;
  font-weight: bold;
  color: #ee0979;
  border: 0 none;
  border-radius: 25px;
  cursor: pointer;
  padding: 5px 25px;
  font-size: 12px;
}

.dme_link a:hover,
.dme_link a:focus {
  background: #c5c5f1;
  text-decoration: none;
}

</style>

<body>
	<?php $this->load->view('_partials/client/navbar'); ?>
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container" style="margin-top: 70px;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="<?php echo base_url('assets/front/') ?>img/about-img.png" alt="First slide">
			      <div class="carousel-caption">
				    <h3>sdfdsfdsfdsfdsfdsfdsfdsfsfdsfdsfdsgrhgfh</h3>
				    <p>sdfdsfdsfdsfdsfdsfdsfdsfsfdsfdsfdsgrhgfh</p>
				  </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="<?php echo base_url('assets/front/') ?>img/about-img.png" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="<?php echo base_url('assets/front/') ?>img/about-img.png" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start home-about Area -->
    <section class="home-about-area pt-120">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-7 home-about-right">
                    <h6>About Me</h6>
                    <h1 class="text-uppercase">Personal Details</h1>
                    <p>
                        Here, I focus on a range of items and features that we use in life without giving them a second thought. such as Coca Cola. Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">View Full Details</a>
                </div>
                <div class="col-lg-7 col-md-7 home-about-left">
			        <?php echo form_open('#',['id' => 'msform']); ?>
			            <!-- progressbar -->
			            <ul id="progressbar">
			                <li class="active">Service</li>
			                <li>Time</li>
			                <li>Detail</li>
			            </ul>
			            <!-- fieldsets -->
			            <fieldset>
			                <div class="row">
			                	<div class="col-md-4">
			                		<label class="text-left">Category</label>
			                		<select name="category" id="category">
			                			<option>Pilih Kategory</option>
			                		</select>
			                	</div>
			                	<div class="col-md-4">
			                		<label class="text-left">Service</label>
					                <select name="service" id="service">
			                			<option>Pilih Service</option>
			                		</select>
			                	</div>
			                	<div class="col-md-4">
			                		<label class="text-left">Employee</label>
					                <select name="employee" id="employee">
			                			<option>Pilih Employee</option>
			                		</select>
			                	</div>
			                	<div class="col-md-4">
			                		<label class="text-left">I'm available on or after</label>
					                <input type="date" name="available" id="available" placeholder="Phone"/>
			                	</div>
			                </div>
			                <input type="button" name="next" class="next action-button" value="Next"/>
			            </fieldset>
			            <fieldset>
			                <div class="row" id="timeAvailable">
			                	<div class="col-md-3 col-sm-3">
			                		<div id="ck-button">
									   <input tabindex="10" type="checkbox" id="square-checkbox-2">
                  					   <label for="square-checkbox-2">13:00-14:00</label>
									</div>
			                	</div>
			                	<div class="col-md-3 col-sm-3">
			                		<div id="ck-button">
									   <input tabindex="10" type="checkbox" id="square-checkbox-2">
                  					   <label for="square-checkbox-2">13:00-14:00</label>
									</div>
			                	</div>
			                	<div class="col-md-3 col-sm-3">
			                		<div id="ck-button">
									   <input tabindex="10" type="checkbox" id="square-checkbox-2">
                  					   <label for="square-checkbox-2">13:00-14:00</label>
									</div>
			                	</div>
			                </div>
			                <input type="button" name="next" class="next action-button" value="Next"/>
			            </fieldset>
			            <fieldset>
			                <input type="text" name="email" placeholder="Email"/>
			                <input type="password" name="pass" placeholder="Password"/>
			                <input type="password" name="cpass" placeholder="Confirm Password"/>
			                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
			                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
			            </fieldset>
			        </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start services Area -->
    <section class="services-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content  col-lg-7">
                    <div class="title text-center">
                        <h1 class="mb-10">My Offered Services</h1>
                        <p>At about this time of year, some months after New Year’s resolutions have been made and kept, or made and neglected.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-pie-chart"></span>
                        <a href="#"><h4>Web Design</h4></a>
                        <p>
                            “It is not because things are difficult that we do not dare; it is because we do not dare that they are difficult.”
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-laptop-phone"></span>
                        <a href="#"><h4>Web Development</h4></a>
                        <p>
                            If you are an entrepreneur, you know that your success cannot depend on the opinions of others. Like the wind, opinions.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-camera"></span>
                        <a href="#"><h4>Photography</h4></a>
                        <p>
                            Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-picture"></span>
                        <a href="#"><h4>Clipping Path</h4></a>
                        <p>
                            Hypnosis quit smoking methods maintain caused quite a stir in the medical world over the last two decades. There is a lot of argument.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-tablet"></span>
                        <a href="#"><h4>Apps Interface</h4></a>
                        <p>
                            Do you sometimes have the feeling that you’re running into the same obstacles over and over again? Many of my conflicts.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <span class="lnr lnr-rocket"></span>
                        <a href="#"><h4>Graphic Design</h4></a>
                        <p>
                            You’ve heard the expression, “Just believe it and it will come.” Well, technically, that is true, however, ‘believing’ is not just thinking that.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End services Area -->

    <!-- Start fact Area -->
    <section class="facts-area section-gap" id="facts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">2536</h1>
                    <p>Projects Completed</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">6784</h1>
                    <p>Happy Clients</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">2239</h1>
                    <p>Cups of Coffee</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">435</h1>
                    <p>Real Professionals</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end fact Area -->

    <!-- Start portfolio-area Area -->
    <section class="portfolio-area section-gap" id="portfolio">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Our Latest Featured Projects</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>

            <div class="filters">
                <ul>
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".vector">Vector</li>
                    <li data-filter=".raster">Raster</li>
                    <li data-filter=".ui">UI/UX</li>
                    <li data-filter=".printing">Printing</li>
                </ul>
            </div>

            <div class="filters-content">
                <div class="row grid">
                    <div class="single-portfolio col-sm-4 all vector">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p1.jpg" alt="">
                            </div>
                            <a href="img/p1.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>
                        </div>
                        <div class="p-inner">
                            <h4>2D Vinyl Design</h4>
                            <div class="cat">vector</div>
                        </div>
                    </div>
                    <div class="single-portfolio col-sm-4 all raster">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p2.jpg" alt="">
                            </div>
                            <a href="img/p2.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>
                        </div>
                        <div class="p-inner">
                            <h4>2D Vinyl Design</h4>
                            <div class="cat">vector</div>
                        </div>
                    </div>
                    <div class="single-portfolio col-sm-4 all ui">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p3.jpg" alt="">
                            </div>
                            <a href="img/p3.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>

                        </div>
                        <div class="p-inner">
                            <h4>Creative Poster Design</h4>
                            <div class="cat">Agency</div>
                        </div>
                    </div>
                    <div class="single-portfolio col-sm-4 all printing">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p4.jpg" alt="">
                            </div>
                            <a href="img/p4.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>
                        </div>
                        <div class="p-inner">
                            <h4>Embosed Logo Design</h4>
                            <div class="cat">Portal</div>
                        </div>
                    </div>
                    <div class="single-portfolio col-sm-4 all vector">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p5.jpg" alt="">
                            </div>
                            <a href="img/p5.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>
                        </div>
                        <div class="p-inner">
                            <h4>3D Helmet Design</h4>
                            <div class="cat">vector</div>
                        </div>
                    </div>
                    <div class="single-portfolio col-sm-4 all raster">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="<?php echo base_url('assets/front/') ?>img/p6.jpg" alt="">
                            </div>
                            <a href="img/p6.jpg" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex"><img src="<?php echo base_url('assets/front/') ?>img/preview.png" alt=""></div>
                                </div>
                            </a>
                        </div>
                        <div class="p-inner">
                            <h4>2D Vinyl Design</h4>
                            <div class="cat">raster</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End portfolio-area Area -->

    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Client’s Feedback About Me</h1>
                        <p>It is very easy to start smoking but it is an uphill task to quit it. Ask any chain smoker or even a person.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="<?php echo base_url('assets/front/') ?>img/elements/user1.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.
                            </p>
                            <h4>Harriet Maxwell</h4>
                            <p>CEO at Google</p>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="<?php echo base_url('assets/front/') ?>img/elements/user2.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
                            </p>
                            <h4>Carolyn Craig</h4>
                            <p>CEO at Facebook</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial Area -->

    <!-- Start price Area -->
    <section class="price-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Choose Your Plan</h1>
                        <p>When someone does something that they know that they shouldn’t do, did they.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 single-price">
                    <div class="top-part">
                        <h1 class="package-no">01</h1>
                        <h4>Economy</h4>
                        <p class="mt-10">For the individuals</p>
                    </div>
                    <div class="package-list">
                        <ul>
                            <li>Secure Online Transfer</li>
                            <li>Unlimited Styles for interface</li>
                            <li>Reliable Customer Service</li>
                        </ul>
                    </div>
                    <div class="bottom-part">
                        <h1>£199.00</h1>
                        <a class="price-btn text-uppercase" href="#">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-price">
                    <div class="top-part">
                        <h1 class="package-no">02</h1>
                        <h4>Business</h4>
                        <p class="mt-10">For the individuals</p>
                    </div>
                    <div class="package-list">
                        <ul>
                            <li>Secure Online Transfer</li>
                            <li>Unlimited Styles for interface</li>
                            <li>Reliable Customer Service</li>
                        </ul>
                    </div>
                    <div class="bottom-part">
                        <h1>£299.00</h1>
                        <a class="price-btn text-uppercase" href="#">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-price">
                    <div class="top-part">
                        <h1 class="package-no">03</h1>
                        <h4>Premium</h4>
                        <p class="mt-10">For the individuals</p>
                    </div>
                    <div class="package-list">
                        <ul>
                            <li>Secure Online Transfer</li>
                            <li>Unlimited Styles for interface</li>
                            <li>Reliable Customer Service</li>
                        </ul>
                    </div>
                    <div class="bottom-part">
                        <h1>£399.00</h1>
                        <a class="price-btn text-uppercase" href="#">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 single-price">
                    <div class="top-part">
                        <h1 class="package-no">04</h1>
                        <h4>Exclusive</h4>
                        <p class="mt-10">For the individuals</p>
                    </div>
                    <div class="package-list">
                        <ul>
                            <li>Secure Online Transfer</li>
                            <li>Unlimited Styles for interface</li>
                            <li>Reliable Customer Service</li>
                        </ul>
                    </div>
                    <div class="bottom-part">
                        <h1>£499.00</h1>
                        <a class="price-btn text-uppercase" href="#">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End price Area -->

    <!-- Start recent-blog Area -->
    <section class="recent-blog-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 pb-30 header-text">
                    <h1>Latest posts from our blog</h1>
                    <p>
                        You may be a skillful, effective employer but if you don’t trust your personnel and the opposite, then the chances of improving and expanding the business
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="single-recent-blog col-lg-4 col-md-4">
                    <div class="thumb">
                        <img class="f-img img-fluid mx-auto" src="<?php echo base_url('assets/front/') ?>img/b1.jpg" alt="">
                    </div>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <img class="img-fluid" src="<?php echo base_url('assets/front/') ?>img/user.png" alt="">
                            <a href="#"><span>Mark Wiens</span></a>
                        </div>
                        <div class="meta">
                            13th Dec
                            <span class="lnr lnr-heart"></span> 15
                            <span class="lnr lnr-bubble"></span> 04
                        </div>
                    </div>
                    <a href="#">
                        <h4>Break Through Self Doubt
								And Fear</h4>
                    </a>
                    <p>
                        Dream interpretation has many forms; it can be done be done for the sake of fun, hobby or can be taken up as a serious career.
                    </p>
                </div>
                <div class="single-recent-blog col-lg-4 col-md-4">
                    <div class="thumb">
                        <img class="f-img img-fluid mx-auto" src="<?php echo base_url('assets/front/') ?>img/b2.jpg" alt="">
                    </div>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <img class="img-fluid" src="<?php echo base_url('assets/front/') ?>img/user.png" alt="">
                            <a href="#"><span>Mark Wiens</span></a>
                        </div>
                        <div class="meta">
                            13th Dec
                            <span class="lnr lnr-heart"></span> 15
                            <span class="lnr lnr-bubble"></span> 04
                        </div>
                    </div>
                    <a href="#">
                        <h4>Portable Fashion for
								young women</h4>
                    </a>
                    <p>
                        You may be a skillful, effective employer but if you don’t trust your personnel and the opposite, then the chances of improving.
                    </p>
                </div>
                <div class="single-recent-blog col-lg-4 col-md-4">
                    <div class="thumb">
                        <img class="f-img img-fluid mx-auto" src="<?php echo base_url('assets/front/') ?>img/b3.jpg" alt="">
                    </div>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <img class="img-fluid" src="<?php echo base_url('assets/front/') ?>img/user.png" alt="">
                            <a href="#"><span>Mark Wiens</span></a>
                        </div>
                        <div class="meta">
                            13th Dec
                            <span class="lnr lnr-heart"></span> 15
                            <span class="lnr lnr-bubble"></span> 04
                        </div>
                    </div>
                    <a href="#">
                        <h4>Do Dreams Serve As
								A Premonition</h4>
                    </a>
                    <p>
                        So many of us are demotivated to achieve anything. Such people are not enthusiastic about anything. They don’t want to work involved.
                    </p>
                </div>

            </div>
        </div>
    </section>
    <!-- end recent-blog Area -->

    <!-- Start brands Area -->
    <section class="brands-area">
        <div class="container">
            <div class="brand-wrap">
                <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                    <div class="col single-brand">
                        <a href="#"><img class="mx-auto" src="<?php echo base_url('assets/front/') ?>img/l1.png" alt=""></a>
                    </div>
                    <div class="col single-brand">
                        <a href="#"><img class="mx-auto" src="<?php echo base_url('assets/front/') ?>img/l2.png" alt=""></a>
                    </div>
                    <div class="col single-brand">
                        <a href="#"><img class="mx-auto" src="<?php echo base_url('assets/front/') ?>img/l3.png" alt=""></a>
                    </div>
                    <div class="col single-brand">
                        <a href="#"><img class="mx-auto" src="<?php echo base_url('assets/front/') ?>img/l4.png" alt=""></a>
                    </div>
                    <div class="col single-brand">
                        <a href="#"><img class="mx-auto" src="<?php echo base_url('assets/front/') ?>img/l5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End brands Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>About Me</h4>
                        <p>
                            We have tested a number of registry fix and clean utilities and present our top 3 list on our site for your convenience.
                        </p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Stay updated with our latest trends</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </button>
                                    </div>
                                    <div class="info"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h4>Follow Me</h4>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
    <?php $this->load->view('_partials/client/js'); ?>
    <script type="text/javascript">
	            	
    	  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)    // Kita sembunyikan dulu untuk loadingnya    
    	  	var token = '';
	    	token = $('input[name=PointOfSale]').val();
	    	  $("#available").change(function(){ // Ketika user mengganti atau memilih data provinsi     
	    	  token = $('input[name=PointOfSale]').val(); 
	    	  $.ajax({        
			    	  type: "POST", // Method pengiriman data bisa dengan GET atau POST        
			    	  url: "<?php echo base_url("booking/getTime"); ?>", // Isi dengan url/path file php yang dituju        
			    	  data : {
		            		bookDate:$(this).val(),
		            		PointOfSale: token
		            	}, // data yang akan dikirim ke file yang dituju        
			    	  dataType: "json",       
			    	   success: function(response){ // Ketika proses pengiriman berhasil          
			    	  // lalu munculkan kembali combobox kotanya   
			    	   $("#timeAvailable").load(window.location + " #timeAvailable");
			    	  var token = $('input[name=PointOfSale]').val(response.token);       
			    	   $("#timeAvailable").html(response.time).show();        },       
			    	   error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
			    	   console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
			    	}      
			    });    
	    	});  

    	});
    </script>
</body>

</html>