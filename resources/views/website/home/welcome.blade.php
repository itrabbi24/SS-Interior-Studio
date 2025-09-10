@extends('website.shared.layout')

@section('title', 'Home Page - SS Interior')

@section('content')
    @include('website.shared.slider')
    

<!-- About End -->

			<section class="section-xl">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6">
							<div class="about-two-leftbox">
								<img src="{{ asset('/public/images/homepage-2/about-mask-img.jpg') }}" class="about-two-img img-fluid" alt="">
								<div class="ihbox-style-area">
									<div class="pbmit-ihbox-style-11">
										<div class="pbmit-ihbox-headingicon">
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-text">100<span>%</span></div>
											</div>
											<div class="pbmit-ihbox-contents">
												<h2 class="pbmit-element-title">Satisfaction<br>Guarantee</h2>
											</div>
											<div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
												</svg>
											</div>
											<div class="pbmit-sticky-corner pbmit-top-right-corner">
												<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
													<path d="M30 30V0C30 16 16 30 0 30H30Z"></path>
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="about-two-content">
								<div class="pbmit-heading-subheading animation-style3">
									<h4 class="pbmit-subtitle">Since 2019</h4>
									<h2 class="pbmit-title">We design thoughtful, livable spaces.</h2>
									<div class="pbmit-heading-desc">
										Interior design is the art of transforming spaces into environments that are both functional and beautiful. 
										Every element, from furniture to lighting, contributes to the overall harmony of a room.
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<ul class="list-group list-group-borderless">
											<li class="list-group-item">
												<span class="pbmit-icon-list-icon">
													<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
												</span>
												<span class="pbmit-icon-list-text">Latest technologies</span>
											</li>
											<li class="list-group-item">
												<span class="pbmit-icon-list-icon">
													<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
												</span>
												<span class="pbmit-icon-list-text">5 Years Warranty</span>
											</li>
											<li class="list-group-item">
												<span class="pbmit-icon-list-icon">
													<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
												</span>
												<span class="pbmit-icon-list-text">High-Quality Designs</span>
											</li>
											<li class="list-group-item">
												<span class="pbmit-icon-list-icon">
													<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
												</span>
												<span class="pbmit-icon-list-text">Innovative and functional</span>
											</li>
											<li class="list-group-item">
												<span class="pbmit-icon-list-icon">
													<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
												</span>
												<span class="pbmit-icon-list-text">Sustainable</span>
											</li>
										</ul>
										<!-- <div class="pbmit-animation-style1 pb-2">
											<img src="{{ asset('/public/images/homepage-2/sign.png') }}" alt="">
										</div> -->
										<!-- <h2 class="pbmit-text-editor">@ Founder</h2> -->
									</div>
									<div class="col-md-6 pbmit-fid-style-one">
										<div class="pbminfotech-ele-fid-style-1 mb-2">
											<div class="pbmit-fld-contents d-flex align-items-center">
												<div class="pbmit-circle-outer" data-digit="96" data-fill="#bb9a65" data-emptyfill="" data-before="" data-after="<span>%</span>" data-thickness="1" data-size="127">
													<div class="pbmit-circle">
														<div class="pbmit-fid-inner">
															<span class="pbmit-fid-before"></span>
															<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="96" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">96</span>
															<span class="pbmit-fid"><span>%</span></span>
														</div>
													</div>
												</div>
												<div class="pbmit-fid-sub">
													<h3 class="pbmit-fid-title">Work Experiences</h3>
												</div>
											</div>
										</div>
										<div class="pbminfotech-ele-fid-style-1">
											<div class="pbmit-fld-contents d-flex align-items-center">
												<div class="pbmit-circle-outer" data-digit="85" data-fill="#bb9a65" data-emptyfill="" data-before="" data-after="<span>%</span>" data-thickness="1" data-size="127">
													<div class="pbmit-circle">
														<div class="pbmit-fid-inner">
															<span class="pbmit-fid-before"></span>
															<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="85" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">85</span>
															<span class="pbmit-fid"><span>%</span></span>
														</div>
													</div>
												</div>
												<div class="pbmit-fid-sub">
													<h3 class="pbmit-fid-title">High-Quality Designs</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- About End -->


            <!-- Service Start --> 
            <section class="pbmit-extend-animation section-xl pbmit-bg-color-secondary service-three">
				<div class="container pbmit-col-stretched-yes pbmit-col-right">
					<div class="pbmit-col-stretched-right">
						<div class="row">
							<div class="col-md-12 col-lg-3 pbmit-servicebox-left">
								<div>
									<div class="pbmit-heading-subheading animation-style2">
										<h4 class="pbmit-subtitle">since 2019</h4>
										<h2 class="pbmit-title">Different case, need different services.</h2>
										<div class="pbmit-heading-desc">
											<!-- Lorem ipsum dolor sit amet consectetur elit venenatis dolor sit amet. -->
										</div>
									</div>
									<div class="service-arrow swiper-btn-custom d-inline-flex flex-row-reverse"></div>
								</div>
								<div class="pbmit-service-highlight">
									<h2>Service</h2>
								</div>
							</div>
							<div class="pbmit-servicebox-right col-md-12 col-lg-9">
								<div class="swiper-slider" data-arrows-class="service-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="2.6" data-margin="30" data-effect="slide">
									<div class="swiper-wrapper">
										<!-- Slide1 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-01.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">01</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Kitchen</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">Transforming Rooms</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="Transforming Rooms">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
										<!-- Slide2 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-02.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">02</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Interior</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">Weaving Dreams</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="Weaving Dreams">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
										<!-- Slide3 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-03.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">03</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Bedroom</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">Interior Decorator</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="Interior Decorator">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
										<!-- Slide4 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-04.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">04</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Furniture</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">Professional Interior</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="Professional Interior">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
										<!-- Slide5 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-05.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">05</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Kitchen</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">Interior Work Plan</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="Interior Work Plan">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
										<!-- Slide6 -->
										<article class="pbmit-ele-service pbmit-service-style-3 swiper-slide">
											<div class="pbminfotech-post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-service-image-wrapper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<img src="{{ asset('/public/images/homepage-3/service/service-06.jpg') }}" class="img-fluid" alt="">
															</div>
														</div>
													</div>
													<div class="pbminfotech-box-number">06</div>
														<div class="pbmit-service-icon elementor-icon">
															<i class=""></i>		
														</div>
													<div class="pbmit-content-box">
														<div class="pbmit-serv-cat">
															<a href="#" rel="tag">Bedroom</a>
														</div>
														<h3 class="pbmit-service-title">
															<a href="service-details">2D/3D Layouts</a>
														</h3>
													</div>
												</div>
												<a class="pbmit-service-btn" href="service-details" title="2D/3D Layouts">
													<span class="pbmit-button-icon">
														<i class="pbmit-base-icon-pbmit-up-arrow"></i>
													</span>
												</a>
											</div>
										</article>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
            </section>
            <!-- Service End -->


            	<!-- Tab Start --> 
			<section class="section-xl tab-sec-one">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">since 2019</h4>
						<h2 class="pbmit-title">What Can We Offer</h2>
					</div>
					<div class="pbmit-tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#tab-2-1" aria-selected="true" role="tab"> 
									<span>Design Consultancy</span>
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
								</a>	
							</li>
							<li class="nav-item" role="presentation"> 
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2-2" aria-selected="false" role="tab" tabindex="-1"> 
									<span>Architecture Design</span>
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2-3" aria-selected="false" role="tab" tabindex="-1"> 
									<span>Corporate Interior</span>
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2-4" aria-selected="false" role="tab" tabindex="-1"> 
									<span>Commercial Interior </span>
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2-5" aria-selected="false" role="tab" tabindex="-1"> 
									<span>Residential Interior</span>
									<i class="pbmit-base-icon-pbmit-up-arrow"></i>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane show active" id="tab-2-1" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 col-md-12 pbmit-tab-img">
											<img src="{{ asset('/public/images/homepage-3/tab-img1.jpg') }}" class="img-fluid" alt="">
										</div>
										<div class="col-xl-7 col-md-12 pbmit-tab-list">
											<h2>Giving your home a new style.</h2>
											Giving your home a fresh and stylish new look has never been easier. 
											Our team of experienced, time-tested engineers ensures every project is completed with precision and care. 
											We are committed to delivering exceptional customer service, 
											making sure your experience is smooth and stress-free from start to finish.
											<ul class="list-group list-group-borderless">
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Experienced, time-served engineers</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to customer service</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to taking the stress out of your project.</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Flexible with any structure of the building</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-2-2" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 pbmit-tab-img">
											<img src="{{ asset('/public/images/homepage-3/tab-img2.jpg') }}" class="img-fluid" alt="">
										</div>
										<div class="col-xl-7 pbmit-tab-list">
											<h2>Giving your home a new style.</h2>
											From initial planning to final touches, we focus on creating beautiful, functional, and livable interiors. 
											Every detail, from materials and lighting to furniture arrangement, is carefully considered to reflect 
											your personality and lifestyle.
											<ul class="list-group list-group-borderless">
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Experienced, time-served engineers</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to customer service</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to taking the stress out of your project.</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Flexible with any structure of the building</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-2-3" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 pbmit-tab-img">
											<img src="{{ asset('/public/images/homepage-3/tab-img3.jpg') }}" class="img-fluid" alt="">
										</div>
										<div class="col-xl-7 pbmit-tab-list">
											<h2>Interior Design Transformations.</h2>
											Transform your living spaces into stylish, functional, and inviting environments. Our team of skilled, experienced engineers ensures every detail is carefully planned and executed. We pride ourselves on providing exceptional customer service and making your renovation or design project completely stress-free.
											<ul class="list-group list-group-borderless">
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Experienced, time-served engineers</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to customer service</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to taking the stress out of your project.</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Flexible with any structure of the building</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-2-4" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 pbmit-tab-img">
											<img src="{{ asset('/public/images/homepage-3/tab-img4.jpg') }}" class="img-fluid" alt="">
										</div>
										<div class="col-xl-7 pbmit-tab-list">
											<h2>Let's Have A Look At What Creativity</h2>
											Step inside spaces where creativity meets functionality. Our experienced, time-tested engineers craft interiors that are not only visually striking but also practical for everyday use. We are committed to delivering exceptional customer service, ensuring your project is seamless and stress-free from start to finish.
											<ul class="list-group list-group-borderless">
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Experienced, time-served engineers</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to customer service</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to taking the stress out of your project.</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Flexible with any structure of the building</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-2-5" role="tabpanel">
								<div class="pbmit-column-inner">
									<div class="row g-0 align-items-center">
										<div class="col-xl-5 pbmit-tab-img">
											<img src="{{ asset('/public/images/homepage-3/tab-img5.jpg') }}" class="img-fluid" alt="">
										</div>
										<div class="col-xl-7 pbmit-tab-list">
											<h2>Strategy - 3D Interior Design.</h2>
											Bring your vision to life with innovative 3D interior design strategies. Our team of experienced engineers combines technical expertise with creative insight to design spaces that are both stunning and practical. We prioritize exceptional customer service, ensuring your project runs smoothly and without stress.
											<ul class="list-group list-group-borderless">
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Experienced, time-served engineers</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to customer service</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Commitment to taking the stress out of your project.</span>
												</li>
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
													</span>
													<span class="pbmit-icon-list-text">Flexible with any structure of the building</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> 
			<!-- Tab end -->  

            <!-- Ihbox Start -->
            <!-- <section class="ihbox-section-three">
				<div class="container">
					<div class="heading-area">
						<div class="pbmit-heading">
							<h2><span class="pbmit-award">Award &amp; achievement</span></h2>
						</div>
					</div>
					<div class="row g-0 pt-3">
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ asset('/public/images/homepage-3/ihbox/ih-award01.png') }}" alt="">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ asset('/public/images/homepage-3/ihbox/ih-award02.png') }}" alt="">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ asset('/public/images/homepage-3/ihbox/ih-award03.png') }}" alt="">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ asset('/public/images/homepage-3/ihbox/ih-award04.png') }}" alt="">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="pbmit-col-20">
							<div class="pbmit-ihbox-style-10">
								<div class="pbmit-ihbox-headingicon">
									<div class="pbmit-ihbox-icon">
										<div class="pbmit-ihbox-icon-wrapper pbmit-ihbox-icon-type-image">
											<img src="{{ asset('/public/images/homepage-3/ihbox/ih-award05.png') }}" alt="">
										</div>
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title">Top 5 Interior Design Inspiration 2023</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section> -->
            <!-- Ihbox End -->



            	<!-- Static Box Start -->
			<section class="section-xl pbmit-element-static-box-style-1">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">since 2019</h4>
						<h2 class="pbmit-title">How organization works</h2>
					</div>
					<div class="pbmit-element-posts-wrapper row g-0">
						<article class="pbmit-static-box-style-1">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-bg-imgbox" style="background-image: url('{{ asset('public/images/homepage-5/static-box/sbox-img-01.jpg') }}')">
									<div class="pbmit-img">
										<img src="{{ asset('public/images/homepage-5/static-box/sbox-img-01.jpg') }}" alt="">		
									</div>
									<div class="pbmit-box-number">01</div>
									<h4 class="pbmit-static-box-title">Meet Designer </h4>
								</div>
								<div class="pbmit-content-box">
									<div class="pbmit-box-number">01</div>
									<div class="pbmit-content-inner">
										<h4 class="pbmit-static-box-title">Meet Designer </h4>
										<div class="pbmit-static-box-desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout, the point of using lorem ipsum </div>
									</div>
									<div class="pbmit-static-btn">
										<a class="pbmit-button-inner" href="#">
											<span class="pbmit-button-wrapper">
												<span class="pbmit-button-text">View Detail</span>
											</span>
										</a>
									</div>
								</div>
								<a class="pbmit-link" href="#"></a>
							</div>
						</article>
						<article class="pbmit-static-box-style-1">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-bg-imgbox" style="background-image: url('{{ asset('public/images/homepage-5/static-box/sbox-img-02.jpg') }}')">
									<div class="pbmit-img">
										<img src="{{ asset('public/images/homepage-5/static-box/sbox-img-02.jpg') }}" alt="">		
									</div>
									<div class="pbmit-box-number">02</div>
									<h4 class="pbmit-static-box-title">Finalized layout</h4>
								</div>
								<div class="pbmit-content-box">
									<div class="pbmit-box-number">02</div>
									<div class="pbmit-content-inner">
										<h4 class="pbmit-static-box-title">Finalized layout</h4>
										<div class="pbmit-static-box-desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout, the point of using lorem ipsum </div>
									</div>
									<div class="pbmit-static-btn">
										<a class="pbmit-button-inner" href="#">
											<span class="pbmit-button-wrapper">
												<span class="pbmit-button-text">View Detail</span>
											</span>
										</a>
									</div>
								</div>
								<a class="pbmit-link" href="#"></a>
							</div>
						</article>
						<article class="pbmit-static-box-style-1">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-bg-imgbox" style="background-image: url('{{ asset('public/images/homepage-5/static-box/sbox-img-03.jpg') }}')">
									<div class="pbmit-img">
										<img src="{{ asset('public/images/homepage-5/static-box/sbox-img-03.jpg') }}" alt="">		
									</div>
									<div class="pbmit-box-number">03</div>
									<h4 class="pbmit-static-box-title">Work in progress</h4>
								</div>
								<div class="pbmit-content-box">
									<div class="pbmit-box-number">03</div>
									<div class="pbmit-content-inner">
										<h4 class="pbmit-static-box-title">Work in progress</h4>
										<div class="pbmit-static-box-desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout, the point of using lorem ipsum </div>
									</div>
									<div class="pbmit-static-btn">
										<a class="pbmit-button-inner" href="#">
											<span class="pbmit-button-wrapper">
												<span class="pbmit-button-text">View Detail</span>
											</span>
										</a>
									</div>
								</div>
								<a class="pbmit-link" href="#"></a>
							</div>
						</article>
						<article class="pbmit-static-box-style-1">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-bg-imgbox" style="background-image: url('{{ asset('public/images/homepage-5/static-box/sbox-img-04.jpg') }}')">
									<div class="pbmit-img">
										<img src="{{ asset('public/images/homepage-5/static-box/sbox-img-04.jpg') }}" alt="">		
									</div>
									<div class="pbmit-box-number">04</div>
									<h4 class="pbmit-static-box-title">Smooth delivery</h4>
								</div>
								<div class="pbmit-content-box">
									<div class="pbmit-box-number">04</div>
									<div class="pbmit-content-inner">
										<h4 class="pbmit-static-box-title">Smooth delivery</h4>
										<div class="pbmit-static-box-desc">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout, the point of using lorem ipsum </div>
									</div>
									<div class="pbmit-static-btn">
										<a class="pbmit-button-inner" href="#">
											<span class="pbmit-button-wrapper">
												<span class="pbmit-button-text">View Detail</span>
											</span>
										</a>
									</div>
								</div>
								<a class="pbmit-link" href="#"></a>
							</div>
						</article>
					</div>
				</div>
            </section>
            <!-- Static Box End -->

            
			<!-- Portfolio Start -->
            <section class="section-xl">
				<div class="container">
					<div class="pbmit-heading-subheading text-center animation-style2">
						<h4 class="pbmit-subtitle">since 2019</h4>
						<h2 class="pbmit-title">Recent case studies</h2>
					</div>
					<div class="swiper-slider portfolio-three-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="3" data-margin="30" data-effect="slide">
						<div class="swiper-wrapper">
							<!-- Slide1 -->
							<article class="pbmit-portfolio-style-1 swiper-slide">
								<div class="pbminfotech-post-content">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('/public/images/homepage-3/portfolio/portfolio-01.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-titlebox">
											<div class="pbmit-port-cat">
												<a href="portfolio-grid-col-3.html" rel="tag">Bedroom</a>
											</div>
											<h3 class="pbmit-portfolio-title">
												<a href="portfolio-detail-style-1.html">Innovation</a>
											</h3>
										</div>
									</div>
								</div>
							</article>
							<!-- Slide2 -->
							<article class="pbmit-portfolio-style-1 swiper-slide">
								<div class="pbminfotech-post-content">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('/public/images/homepage-3/portfolio/portfolio-02.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-titlebox">
											<div class="pbmit-port-cat">
												<a href="portfolio-grid-col-3.html" rel="tag">Furniture</a>
											</div>
											<h3 class="pbmit-portfolio-title">
												<a href="portfolio-detail-style-1.html">Minimalism</a>
											</h3>
										</div>
									</div>
								</div>
							</article>
							<!-- Slide3 -->
							<article class="pbmit-portfolio-style-1 swiper-slide">
								<div class="pbminfotech-post-content">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('/public/images/homepage-3/portfolio/portfolio-03.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-titlebox">
											<div class="pbmit-port-cat">
												<a href="portfolio-grid-col-3.html" rel="tag">Interior</a>
											</div>
											<h3 class="pbmit-portfolio-title">
												<a href="portfolio-detail-style-1.html">Lighting</a>
											</h3>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
            </section>
            <!-- Portfolio End -->

            <!-- About Us Start -->
			<section class="about-us-three-sec">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-4">
							<div class="about-us-three-content">
								<div class="pbmit-heading-subheading animation-style2">
									<h2 class="pbmit-title">Hello! I`m Saidur Rahman</h2>
									<div class="pbmit-heading-desc">
										Hello! I’m Saidur Rahman. I specialize in transforming homes and commercial spaces into beautiful, functional, and inspiring environments. With years of experience in interior design, my team and I focus on creating spaces that reflect your personality, lifestyle, and vision.	
									</div>
								</div>
								<!-- <div class="pbmit-animation-style1">
									<img src="{{ asset('/public/images/homepage-3/sign2.png') }}" alt="">
								</div>
								<div class="pbmit-text-editor">@ Founder</div> -->
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="pbmit-animation-style7 single-img">
								<img src="{{ asset('/public/images/homepage-3/single-image.png') }}" style="border-radius: 150px;" alt="">
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="fid-style-area">
								<div class="pbminfotech-ele-fid-style-2">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-icon-title">
												<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xinterio-icon pbmit-xinterio-icon-offer"></i>
												</div>
												<span class="pbmit-fid-title">Happy Client Review</span>
											</div>
											<h4 class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="235" data-interval="1" data-before="" data-before-style="" data-after="" data-after-style="">235</span>
												<span class="pbmit-fid"><sup>+</sup></span>
											</h4>
										</div>
									</div>
								</div>
								<div class="pbminfotech-ele-fid-style-2 py-3">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-icon-title">
												<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xinterio-icon pbmit-xinterio-icon-engineer"></i>
												</div>
												<span class="pbmit-fid-title">Work Departments</span>
											</div>
											<h4 class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="420" data-interval="1" data-before="" data-before-style="" data-after="" data-after-style="">420</span>
												<span class="pbmit-fid"><sup>+</sup></span>
											</h4>
										</div>
									</div>
								</div>
								<div class="pbminfotech-ele-fid-style-2">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-icon-title">
												<div class="pbmit-sbox-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xinterio-icon pbmit-xinterio-icon-client"></i>
												</div>
												<span class="pbmit-fid-title">Our Happy Client</span>
											</div>
											<h4 class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="30" data-interval="1" data-before="" data-before-style="" data-after="" data-after-style="">30</span>
												<span class="pbmit-fid"><span>K</span></span>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- About Us End -->



<!-- Blog Start -->
<section class="section-md">
    <div class="container">
        <div class="pbmit-heading-subheading text-center animation-style3">
            <h4 class="pbmit-subtitle">since 2019</h4>
            <h2 class="pbmit-title">Read Our Articles and News</h2>
        </div>
        <div class="swiper-slider" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false" data-columns="3" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">

                @forelse($blogs as $blog)
                <article class="pbmit-ele-blog pbmit-blog-style-1 swiper-slide">
                    <div class="post-item">
                        <div class="pbminfotech-box-content">
                            <div class="pbmit-featured-container">
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="{{ asset('public/' . ($blog->thumbnail ?? 'images/default-thumbnail.jpg')) }}"
                                             class="img-fluid"
                                             alt="{{ $blog->title }}">
                                    </div>
                                </div>
                                <a class="pbmit-blog-btn"
                                   href="{{ route('blog.show', $blog->id) }}"
                                   title="{{ $blog->title }}">
                                    <span class="pbmit-button-icon">
                                        <i class="pbmit-base-icon-pbmit-up-arrow"></i>
                                    </span>
                                </a>
                                <a class="pbmit-link"
                                   href="{{ route('blog.show', $blog->id) }}"></a>
                            </div>
                            <div class="pbmit-content-wrapper">
                                <div class="pbmit-date-wraper d-flex align-items-center">
                                    <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                        <div class="pbmit-meta-date">
                                            <span class="pbmit-post-date">
                                                <i class="pbmit-base-icon-calendar-3"></i>
                                                {{ $blog->publish_date?->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pbmit-meta-author pbmit-meta-line">
                                        <span class="pbmit-post-author">
                                            <i class="pbmit-base-icon-user-3"></i>
                                            <span>By</span> admin
                                        </span>
                                    </div>
                                </div>
                                <h3 class="pbmit-post-title">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>
                                <div class="pbminfotech-box-desc">
                                    {{ Str::limit(strip_tags($blog->description), 120) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                @empty
                    <p class="text-center">No blogs available yet.</p>
                @endforelse

            </div>
        </div>
    </div>
</section>
<!-- Blog End -->

    
@endsection