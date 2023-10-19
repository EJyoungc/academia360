@extends('layouts.root2')


@section('content')
    <div>
        {{-- The Master doesn't talk, he acts. --}}

        <section id="hero" class="d-flex justify-cntent-center align-items-center">
            <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Welcome </h2>
                        <p class="animate__animated animate__fadeInUp">Get the best deals in the country.</p>
                        {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">Find Your stay</h2>
                        {{-- <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid.
                            Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut.
                            Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore
                            modi architecto.</p> --}}
                        {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                    </div>
                </div>




                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Icon Boxes Section ======= -->
            <section id="icon-boxes" class="icon-boxes">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 col-lg-12  align-items-stretch mb-lg-0" data-aos="fade-up">
                            @livewire('public.welcome')
                        </div>
                    </div>

                </div>
            </section><!-- End Icon Boxes Section -->

            <!-- ======= About Us Section ======= -->
            <!-- <section id="about" class="about">
                                        <div class="container" data-aos="fade-up">

                                            <div class="section-title">
                                                <h2>About Us</h2>
                                                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                                                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                                                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                                            </div>

                                            <div class="row content">
                                                <div class="col-lg-6">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                                        labore et dolore
                                                        magna aliqua.
                                                    </p>
                                                    <ul>
                                                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                                            consequat</li>
                                                        <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                                                            velit</li>
                                                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                                            consequat</li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 pt-4 pt-lg-0">
                                                    <p>
                                                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                        reprehenderit in voluptate
                                                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in
                                                        culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                    <a href="#" class="btn-learn-more">Learn More</a>
                                                </div>
                                            </div>

                                        </div>
                                    </section> -->
            <!-- End About Us Section -->

            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients">
                <div class="container" data-aos="zoom-in">
                    <div class="section-title">
                        <h2>Travel Like a local</h3>
                    </div>

                    <div class="clients-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide"><img src="assets/img/imageye/1611752121_0!!-!!lake-malawi-np.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="swiper-slide"><img
                                    src="assets/img/imageye/1611840823_3!!-!!zebra-watering-hole-majete-wildlife-reserve-malawi.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="swiper-slide"><img src="assets/img/imageye/1611842947_3!!-!!nkhotakota.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="swiper-slide"><img src="assets/img/imageye/1611843782_3!!-!!nyika-Bentley.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="swiper-slide"><img
                                    src="assets/img/imageye/1611847756_3!!-!!mount mulanje mountain in malalwi.jpg"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="swiper-slide"><img
                                    src="assets/img/imageye/1611848486_3!!-!!zomba-plateau-tours-malawia.jpg"
                                    class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

    </div>
    </section><!-- End Clients Section -->

    <!-- ======= Why Us Section ======= -->
    <!-- <section id="why-us" class="why-us">
                                        <div class="container-fluid">

                                            <div class="row">

                                                <div class="col-lg-5 align-items-stretch position-relative video-box"
                                                    style='background-image: url("assets/img/why-us.jpg");' data-aos="fade-right">
                                                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn mb-4"></a>
                                                </div>

                                                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch"
                                                    data-aos="fade-left">

                                                    <div class="content">
                                                        <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                                        </p>
                                                    </div>

                                                    <div class="accordion-list">
                                                        <ul>
                                                            <li data-aos="fade-up" data-aos-delay="100">
                                                                <a data-bs-toggle="collapse" class="collapse"
                                                                    data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at
                                                                    lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i
                                                                        class="bx bx-chevron-up icon-close"></i></a>
                                                                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                                                    <p>
                                                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                                                        laoreet non curabitur gravida. Venenatis lectus magna fringilla urna
                                                                        porttitor rhoncus dolor purus non.
                                                                    </p>
                                                                </div>
                                                            </li>

                                                            <li data-aos="fade-up" data-aos-delay="200">
                                                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                                                    class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i
                                                                        class="bx bx-chevron-down icon-show"></i><i
                                                                        class="bx bx-chevron-up icon-close"></i></a>
                                                                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                                                    <p>
                                                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper
                                                                        dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                                                    </p>
                                                                </div>
                                                            </li>

                                                            <li data-aos="fade-up" data-aos-delay="300">
                                                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                                                    class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i
                                                                        class="bx bx-chevron-down icon-show"></i><i
                                                                        class="bx bx-chevron-up icon-close"></i></a>
                                                                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                                                    <p>
                                                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet
                                                                        nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis
                                                                        convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio
                                                                        morbi quis
                                                                    </p>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <!-- <section id="services" class="services">
                                        <div class="container" data-aos="fade-up">

                                            <div class="section-title">
                                                <h2>Services</h2>
                                                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                                                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                                                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                                    <div class="icon-box">
                                                        <i class="bi bi-card-checklist"></i>
                                                        <h4><a href="#">Lorem Ipsum</a></h4>
                                                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                                            occaecati cupiditate non provident</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                                    data-aos-delay="200">
                                                    <div class="icon-box">
                                                        <i class="bi bi-bar-chart"></i>
                                                        <h4><a href="#">Dolor Sitema</a></h4>
                                                        <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                            consequat tarad limino ata</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                                    data-aos-delay="300">
                                                    <div class="icon-box">
                                                        <i class="bi bi-binoculars"></i>
                                                        <h4><a href="#">Sed ut perspiciatis</a></h4>
                                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                            nulla pariatur</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                                    data-aos-delay="400">
                                                    <div class="icon-box">
                                                        <i class="bi bi-brightness-high"></i>
                                                        <h4><a href="#">Nemo Enim</a></h4>
                                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                                            anim id est laborum</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                                    data-aos-delay="500">
                                                    <div class="icon-box">
                                                        <i class="bi bi-calendar4-week"></i>
                                                        <h4><a href="#">Magni Dolore</a></h4>
                                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                                            voluptatum deleniti atque</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                                                    data-aos-delay="600">
                                                    <div class="icon-box">
                                                        <i class="bi bi-briefcase"></i>
                                                        <h4><a href="#">Eiusmod Tempor</a></h4>
                                                        <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                                                            nobis est eligendi</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <!-- <section id="cta" class="cta">
                                        <div class="container">

                                            <div class="row" data-aos="zoom-in">
                                                <div class="col-lg-9 text-center text-lg-start">
                                                    <h3>Call To Action</h3>
                                                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                        mollit anim id est laborum.</p>
                                                </div>
                                                <div class="col-lg-3 cta-btn-container text-center">
                                                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                                                </div>
                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Cta Section -->

    <!-- ======= Portfoio Section ======= -->
    <section id="portfolio" class="portfoio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Places of Intrest</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".wild-life">Wild Life</li>
                        <li data-filter=".lake">Lake</li>
                        <li data-filter=".scenary">Scenary</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item wild-life">
                    <img src="assets/img/imageye/1611842947_3!!-!!nkhotakota.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <a href="assets/img/imageye/1611842947_3!!-!!nkhotakota.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item scenary">
                    <img src="assets/img/imageye/1611849199_3!!-!!tea estate.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="assets/img/imageye/1611849199_3!!-!!tea estate.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item wild-life">
                    <img src="assets/img/imageye/1611848486_3!!-!!zomba-plateau-tours-malawia.jpg" class="img-fluid"
                        alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <a href="assets/img/imageye/1611848486_3!!-!!zomba-plateau-tours-malawia.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item lake">
                    <img src="assets/img/imageye/1611843782_3!!-!!nyika-Bentley.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <a href="assets/img/imageye/1611843782_3!!-!!nyika-Bentley.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item scenary">
                    <img src="assets/img/imageye/1611849740_0!!-!!viphya plateau in malawi.jpg" class="img-fluid"
                        alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <a href="assets/img/imageye/1611849740_0!!-!!viphya plateau in malawi.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item wild-life">
                    <img src="assets/img/imageye/1611847756_3!!-!!mount mulanje mountain in malalwi.jpg" class="img-fluid"
                        alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <a href="assets/img/imageye/1611847756_3!!-!!mount mulanje mountain in malalwi.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item lake">
                    <img src="assets/img/imageye/1611846535_3!!-!!likoma-island-malawi.jpg" class="img-fluid"
                        alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <a href="assets/img/imageye/1611846535_3!!-!!likoma-island-malawi.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item lake">
                    <img src="assets/img/imageye/1611840823_3!!-!!zebra-watering-hole-majete-wildlife-reserve-malawi.jpg"
                        class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <a href="assets/img/imageye/1611840823_3!!-!!zebra-watering-hole-majete-wildlife-reserve-malawi.jpg"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i
                                class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item scenary">
                    <img src="assets/img/imageye/1611752121_0!!-!!lake-malawi-np.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="assets/img/imageye/1611752121_0!!-!!lake-malawi-np.jpg" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfoio Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
                                        <div class="container" data-aos="fade-up">

                                            <div class="section-title">
                                                <h2>Team</h2>
                                                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                                                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                                                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                                    <div class="member d-flex align-items-start">
                                                        <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                                                        <div class="member-info">
                                                            <h4>Walter White</h4>
                                                            <span>Chief Executive Officer</span>
                                                            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                                                            <div class="social">
                                                                <a href=""><i class="ri-twitter-fill"></i></a>
                                                                <a href=""><i class="ri-facebook-fill"></i></a>
                                                                <a href=""><i class="ri-instagram-fill"></i></a>
                                                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                                                    <div class="member d-flex align-items-start">
                                                        <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                                                        <div class="member-info">
                                                            <h4>Sarah Jhonson</h4>
                                                            <span>Product Manager</span>
                                                            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                                                            <div class="social">
                                                                <a href=""><i class="ri-twitter-fill"></i></a>
                                                                <a href=""><i class="ri-facebook-fill"></i></a>
                                                                <a href=""><i class="ri-instagram-fill"></i></a>
                                                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
                                                    <div class="member d-flex align-items-start">
                                                        <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                                                        <div class="member-info">
                                                            <h4>William Anderson</h4>
                                                            <span>CTO</span>
                                                            <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                                                            <div class="social">
                                                                <a href=""><i class="ri-twitter-fill"></i></a>
                                                                <a href=""><i class="ri-facebook-fill"></i></a>
                                                                <a href=""><i class="ri-instagram-fill"></i></a>
                                                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
                                                    <div class="member d-flex align-items-start">
                                                        <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                                                        <div class="member-info">
                                                            <h4>Amanda Jepson</h4>
                                                            <span>Accountant</span>
                                                            <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                                                            <div class="social">
                                                                <a href=""><i class="ri-twitter-fill"></i></a>
                                                                <a href=""><i class="ri-facebook-fill"></i></a>
                                                                <a href=""><i class="ri-instagram-fill"></i></a>
                                                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing">
                                        <div class="container" data-aos="fade-up">

                                            <div class="section-title">
                                                <h2>Pricing</h2>
                                                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                                                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                                                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                                    <div class="box">
                                                        <h3>Free</h3>
                                                        <h4><sup>$</sup>0<span> / month</span></h4>
                                                        <ul>
                                                            <li>Aida dere</li>
                                                            <li>Nec feugiat nisl</li>
                                                            <li>Nulla at volutpat dola</li>
                                                            <li class="na">Pharetra massa</li>
                                                            <li class="na">Massa ultricies mi</li>
                                                        </ul>
                                                        <div class="btn-wrap">
                                                            <a href="#" class="btn-buy">Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                                                    <div class="box featured">
                                                        <h3>Business</h3>
                                                        <h4><sup>$</sup>19<span> / month</span></h4>
                                                        <ul>
                                                            <li>Aida dere</li>
                                                            <li>Nec feugiat nisl</li>
                                                            <li>Nulla at volutpat dola</li>
                                                            <li>Pharetra massa</li>
                                                            <li class="na">Massa ultricies mi</li>
                                                        </ul>
                                                        <div class="btn-wrap">
                                                            <a href="#" class="btn-buy">Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                                                    <div class="box">
                                                        <h3>Developer</h3>
                                                        <h4><sup>$</sup>29<span> / month</span></h4>
                                                        <ul>
                                                            <li>Aida dere</li>
                                                            <li>Nec feugiat nisl</li>
                                                            <li>Nulla at volutpat dola</li>
                                                            <li>Pharetra massa</li>
                                                            <li>Massa ultricies mi</li>
                                                        </ul>
                                                        <div class="btn-wrap">
                                                            <a href="#" class="btn-buy">Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                                                    <div class="box">
                                                        <span class="advanced">Advanced</span>
                                                        <h3>Ultimate</h3>
                                                        <h4><sup>$</sup>49<span> / month</span></h4>
                                                        <ul>
                                                            <li>Aida dere</li>
                                                            <li>Nec feugiat nisl</li>
                                                            <li>Nulla at volutpat dola</li>
                                                            <li>Pharetra massa</li>
                                                            <li>Massa ultricies mi</li>
                                                        </ul>
                                                        <div class="btn-wrap">
                                                            <a href="#" class="btn-buy">Buy Now</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- <section id="faq" class="faq section-bg">
                                        <div class="container" data-aos="fade-up">

                                            <div class="section-title">
                                                <h2>Frequently Asked Questions</h2>
                                            </div>

                                            <div class="faq-list">
                                                <ul>
                                                    <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                                                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                                            data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i
                                                                class="bx bx-chevron-down icon-show"></i><i
                                                                class="bx bx-chevron-up icon-close"></i></a>
                                                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                                            <p>
                                                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                                                non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                                                purus non.
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <li data-aos="fade-up" data-aos-delay="200">
                                                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                            data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim
                                                            nunc? <i class="bx bx-chevron-down icon-show"></i><i
                                                                class="bx bx-chevron-up icon-close"></i></a>
                                                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                                            <p>
                                                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                                                velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                                                donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                                                cursus turpis massa tincidunt dui.
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <li data-aos="fade-up" data-aos-delay="300">
                                                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                            data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing
                                                            elit? <i class="bx bx-chevron-down icon-show"></i><i
                                                                class="bx bx-chevron-up icon-close"></i></a>
                                                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                                            <p>
                                                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                                                pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                                                Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                                                tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <li data-aos="fade-up" data-aos-delay="400">
                                                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                            data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam
                                                            sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                                                                class="bx bx-chevron-up icon-close"></i></a>
                                                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                                            <p>
                                                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                                                est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                                                suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <li data-aos="fade-up" data-aos-delay="500">
                                                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                            data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare.
                                                            Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                                                class="bx bx-chevron-down icon-show"></i><i
                                                                class="bx bx-chevron-up icon-close"></i></a>
                                                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                                            <p>
                                                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                                                integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                                                eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                                            </p>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </section> -->
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact Us</h2>
            </div>

            <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

                <div class="col-lg-5">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Office 6,2nd floor, EUROPEAN BUSINESS CENTER, Area 3, Lilongwe</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@abcatravel.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+265 984 901 590</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
