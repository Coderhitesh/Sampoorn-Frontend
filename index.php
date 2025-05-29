<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sampoorn</title>
    <?php include('includes/headerlink.php') ?>
</head>

<body class="v-light dsn-ajax">
    

    <svg width="0" height="0" class="p-absolute hidden">
        <defs>
            <filter id="buttonFilter">
                <fegaussianblur in="SourceGraphic" stddeviation="5" result="blur">
                </fegaussianblur>
                <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                    result="buttonFilter"></fecolormatrix>
                <fecomposite in="SourceGraphic" in2="buttonFilter" operator="atop">
                </fecomposite>
                <feblend in="SourceGraphic" in2="buttonFilter"></feblend>
            </filter>
        </defs>
    </svg>

    <main id="main_root" style="overflow: hidden;" class="main-root">
        <?php include('includes/topheader.php') ?>
        <div id="dsn-scrollbar">
            <?php include('includes/header.php') ?>

            <div id="page_wrapper" class="wrapper">

                <!-- ========== About Us ========== -->
                <section class="about-section section-padding p-relative">
                    <div class="container">
                        <div class="d-grid grid-lg-2">
                            <div class="box-text p-relative">
                                <div class="bg-pattern p-absolute w-100 "></div>
                                <h2 class="title mb-30 dsn-fill">
                                    <span
                                        data-dsn-animation='{"from":{"paddingLeft":"10%"},"to":{"paddingLeft":"20%"},"responsive":["tablet","desktop"]}'>A
                                        LEGACY</span>
                                    <br> OF TRUST<br>
                                </h2>
                                <p class="dsn-up">Founded in 1987, Sampoorn Marketing Pvt. Ltd. is a family-led powerhouse headquartered in Noida.</p>

                                <div class="dsn-btn dsn-btn-shape mt-30 d-flex">

                                    <a class="button background-theme effect-ajax" href="about.php">
                                        <span class="title-btn p-relative  z-index-1 heading-color"
                                            data-animate-text="ABOUT US">
                                            <span>ABOUT US</span>
                                        </span>
                                    </a>

                                    <span class="icon background-theme">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                            <path
                                                d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                            </path>
                                        </svg>
                                    </span>

                                </div>
                            </div>

                            <div class="corner-box over-hidden">
                                <div class="corner__lb"></div>
                                <div class="box-img h-100 img-box-parallax before-z-index dsn-animate dsn-effect-down"
                                    data-dsn-triggerhook="bottom" data-dsn-grid="move-up" data-overlay="0">

                                    <img class="cover-bg-img" src="assets/img/hero2.jpg" alt="">
                                </div>
                            </div>

                        </div>

                        <div
                            class="experience d-flex justify-content-between background-section mt-30 d-flex dsn-layout-fade-up">

                            <div class="facts-inner p-10 d-grid grid-lg-2 gap-10 d-grid-no-space">
                                <div class="fact-item background-main has-border-radius p-30 dsn-up">
                                    <h3 class="title d-flex align-items-start justify-content-center">100 <span
                                            class="background-theme p-5 has-border-radius">%</span></h3>
                                    <p class="text-upper mt-20 v-light background-main p-5 text-center heading-color">
                                        High-Altitude Logistics Mastery
                                    </p>
                                </div>

                                <div class="fact-item background-main has-border-radius p-30 dsn-up">
                                    <h3 class="title d-flex align-items-start justify-content-center">100 <span
                                            class="background-theme p-5 has-border-radius">%</span></h3>
                                    <p class="text-upper mt-20 v-light background-main p-5 text-center heading-color">
                                        Extensive North India Reach</p>
                                </div>

                            </div>

                            <div class="box-video dsn-up v-dark-head">
                                <div class="box-img h-100 w-100 h-100 p-absolute top-0 right-0 dsn-hero-parallax-img before-z-index h-100"
                                    data-overlay="5">
                                    <!-- <img class="cover-bg-img" src="assets/img/bg-video.jpg" alt=""> -->
                                    <img class="cover-bg-img" src="assets/img/homeabout.jpg" alt="">
                                </div>
                                <div class="ex d-flex align-items-end h-100 p-relative z-index-1">
                                    <h2 class="title theme-color dsn-animate-number">
                                        <span class="animate-number">35+</span>
                                    </h2>
                                    <span class="ml-5 text-upper heading-color">Years <br>
                                        experience</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ========== End About Us ========== -->

                <!-- ==========  Service ========== -->
                <section
                    class="dsn-service padding-service section-padding background-section hover-box-item dsn-layout-fade-up">
                    <div class="container">
                        <div class="section-title dsn-fill mb-70 d-flex flex-column">
                            <span class="sub-heading mb-5">SERVICES</span>
                            <h2 class="title ">Find a Service That<br> Helps Your Business Grow</h2>
                        </div>
                    </div>

                    <div class="container">
                        <div class="d-grid grid-lg-3 grid-md-2 dsn-icon-theme-color">
                            <div class="service-item grid-item background-main has-border-radius p-relative">
                                <div class="service-item-inner dsn-up">

                                    <h4 class="title-block">Streamline Your Supply Chain with Reliable Connections</h4>
                                    <p class="mt-30">We act as a trusted bridge between distributors and retailers, facilitating smooth, efficient business transactions.</p>

                                    <div class="number mt-50">
                                        <div class="big-text">01</div>
                                    </div>

                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 62 61" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M27 8.5V26.5C27 30.0898 24.0899 33 20.5 33C16.9102 33 14 30.0899 14 26.5V8.5C14 4.91015 16.9102 2 20.5 2C24.0899 2 27 4.91015 27 8.5ZM12 8.5C12 3.80558 15.8056 0 20.5 0C25.1944 0 29 3.80558 29 8.5V26.5C29 31.1944 25.1944 35 20.5 35C15.8056 35 12 31.1944 12 26.5V8.5ZM41.5 22C44.5376 22 47 19.5376 47 16.5C47 13.4624 44.5376 11 41.5 11C38.4624 11 36 13.4624 36 16.5C36 19.5376 38.4624 22 41.5 22ZM41.5 24C45.6421 24 49 20.6421 49 16.5C49 12.3579 45.6421 9 41.5 9C37.3579 9 34 12.3579 34 16.5C34 20.6421 37.3579 24 41.5 24ZM42.8632 58.6403C39.1021 60.1982 35.071 61 31 61C26.929 61 22.8979 60.1982 19.1368 58.6403C15.3757 57.0824 11.9583 54.7989 9.07968 51.9203C6.20107 49.0417 3.91763 45.6243 2.35973 41.8632C0.801836 38.1021 0 34.071 0 30V29H0.999999L7.5 29L7.5 31L2.01725 31C2.13687 34.4672 2.87779 37.8876 4.20749 41.0978C5.66487 44.6163 7.801 47.8132 10.4939 50.5061C13.1868 53.199 16.3837 55.3351 19.9022 56.7925C23.4206 58.2499 27.1917 59 31 59C34.8083 59 38.5794 58.2499 42.0978 56.7925C45.6163 55.3351 48.8132 53.199 51.5061 50.5061C54.199 47.8132 56.3351 44.6163 57.7925 41.0978C59.1222 37.8877 59.8631 34.4672 59.9828 31L33.5 31V29L61 29H62V30C62 34.071 61.1982 38.1021 59.6403 41.8632C58.0824 45.6243 55.7989 49.0417 52.9203 51.9203C50.0417 54.7989 46.6243 57.0824 42.8632 58.6403Z"
                                                fill="#121212"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="service-item grid-item background-main has-border-radius p-relative">
                                <div class="service-item-inner dsn-up">

                                    <h4 class="title-block">Enable Seamless Online Ordering with Advanced Tech Solutions</h4>
                                    <p class="mt-30">Our platform connects distributors with retailers through efficient digital tools, ensuring smooth and timely order management.</p>

                                    <div class="number mt-50">
                                        <div class="big-text">02</div>
                                    </div>

                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 60 60" fill="none">
                                            <path
                                                d="M30.0115 7.23803e-06C24.723 -0.00367286 19.5281 1.39604 14.9573 4.05635C14.2603 4.47264 13.573 4.90839 12.9147 5.3634C7.44186 9.15007 3.38539 14.6509 1.38526 20.9984C-0.614867 27.3458 -0.444969 34.1786 1.86838 40.4188C1.96519 40.7092 2.08145 40.9899 2.19762 41.2706C2.39124 41.7482 2.59467 42.2131 2.80765 42.6649C2.8851 42.8391 2.96255 43.0135 3.04968 43.1877C5.89744 49.0029 10.5494 53.7411 16.3114 56.695C22.0734 59.6489 28.6363 60.6601 35.0202 59.5776C41.4041 58.4951 47.2666 55.377 51.7327 50.6887C56.1988 46.0004 59.0289 39.9934 59.8004 33.5645C59.8876 32.8771 59.9553 32.1802 59.9843 31.4831C59.9843 30.9894 59.9843 30.515 59.9843 30.0116C59.9843 22.0587 56.8278 14.4309 51.208 8.8038C45.5881 3.17665 37.9644 0.010269 30.0115 7.23803e-06ZM1.93621 30.0116C1.93916 25.2663 3.14495 20.5993 5.44066 16.4464C7.73637 12.2934 11.0471 8.7901 15.0639 6.26368C18.2802 7.83988 20.9705 10.315 22.8088 13.3891C22.0143 13.9806 21.4205 14.8014 21.1073 15.7411C20.7941 16.6807 20.7767 17.6939 21.0574 18.6438C21.3382 19.5936 21.9035 20.4345 22.6772 21.053C23.4509 21.6714 24.3955 22.0376 25.3839 22.1021C25.3839 22.3345 25.3839 22.5571 25.3839 22.7895C25.38 24.5233 25.129 26.2478 24.6385 27.9108C16.7655 30.074 9.55333 34.1592 3.64979 39.7993C2.49553 36.6661 1.91506 33.3505 1.93621 30.0116ZM23.8835 30.147C22.4514 33.4234 20.0952 36.2115 17.1034 38.1699C14.1117 40.1283 10.6139 41.1722 7.03819 41.174C6.40763 41.176 5.77747 41.1436 5.15042 41.077C10.4659 36.0325 16.878 32.288 23.8835 30.1373V30.147ZM30.0115 58.0869C24.8848 58.0846 19.8567 56.6786 15.4723 54.0213C11.088 51.3641 7.51493 47.5571 5.14073 43.0133C5.77 43.0714 6.39928 43.1102 7.07696 43.1102C11.2855 43.1049 15.3886 41.7934 18.8203 39.3571C22.252 36.9207 24.8431 33.4795 26.236 29.5081C36.8666 26.8406 48.0935 27.9458 57.9999 32.6351C57.3459 39.6025 54.1135 46.0746 48.9361 50.7828C43.7587 55.491 37.0095 58.0958 30.0115 58.0869ZM58.0869 30.5635C48.3041 26.105 37.327 24.9859 26.8458 27.3783C27.1992 25.8708 27.3811 24.3282 27.388 22.7798C27.388 22.4603 27.388 22.1408 27.388 21.8117C28.4446 21.4145 29.3293 20.6607 29.8889 19.6804C30.4485 18.7001 30.6478 17.5551 30.4526 16.4433C30.2573 15.3315 29.6797 14.3229 28.8196 13.5919C27.9595 12.8609 26.8709 12.4537 25.7422 12.4404C25.3766 12.4407 25.0123 12.4861 24.6578 12.5758C22.8395 9.47138 20.2392 6.89784 17.1162 5.11168C21.3949 2.88658 26.1747 1.80118 30.9948 1.96011C35.8149 2.11904 40.513 3.51693 44.6358 6.01905C48.7587 8.52117 52.1673 12.0431 54.5335 16.2455C56.8997 20.4478 58.1435 25.1889 58.145 30.0116C58.0869 30.1858 58.0772 30.3698 58.0675 30.5538L58.0869 30.5635Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="service-item grid-item background-main has-border-radius p-relative">
                                <div class="service-item-inner dsn-up">
                                    <h4 class="title-block">Craft user-friendly interfaces for outstanding user experiences</h4>
                                    <p class="mt-30">Our designs focus on user needs, boosting engagement and improving overall usability.</p>
                                    <div class="number mt-50">
                                        <div class="big-text">03</div>
                                    </div>

                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 62 61" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M27 8.5V26.5C27 30.0898 24.0899 33 20.5 33C16.9102 33 14 30.0899 14 26.5V8.5C14 4.91015 16.9102 2 20.5 2C24.0899 2 27 4.91015 27 8.5ZM12 8.5C12 3.80558 15.8056 0 20.5 0C25.1944 0 29 3.80558 29 8.5V26.5C29 31.1944 25.1944 35 20.5 35C15.8056 35 12 31.1944 12 26.5V8.5ZM41.5 22C44.5376 22 47 19.5376 47 16.5C47 13.4624 44.5376 11 41.5 11C38.4624 11 36 13.4624 36 16.5C36 19.5376 38.4624 22 41.5 22ZM41.5 24C45.6421 24 49 20.6421 49 16.5C49 12.3579 45.6421 9 41.5 9C37.3579 9 34 12.3579 34 16.5C34 20.6421 37.3579 24 41.5 24ZM42.8632 58.6403C39.1021 60.1982 35.071 61 31 61C26.929 61 22.8979 60.1982 19.1368 58.6403C15.3757 57.0824 11.9583 54.7989 9.07968 51.9203C6.20107 49.0417 3.91763 45.6243 2.35973 41.8632C0.801836 38.1021 0 34.071 0 30V29H0.999999L7.5 29L7.5 31L2.01725 31C2.13687 34.4672 2.87779 37.8876 4.20749 41.0978C5.66487 44.6163 7.801 47.8132 10.4939 50.5061C13.1868 53.199 16.3837 55.3351 19.9022 56.7925C23.4206 58.2499 27.1917 59 31 59C34.8083 59 38.5794 58.2499 42.0978 56.7925C45.6163 55.3351 48.8132 53.199 51.5061 50.5061C54.199 47.8132 56.3351 44.6163 57.7925 41.0978C59.1222 37.8877 59.8631 34.4672 59.9828 31L33.5 31V29L61 29H62V30C62 34.071 61.1982 38.1021 59.6403 41.8632C58.0824 45.6243 55.7989 49.0417 52.9203 51.9203C50.0417 54.7989 46.6243 57.0824 42.8632 58.6403Z"
                                                fill="#121212"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- ========== End Service ========== -->

                <!-- ==========  Work ========== -->
                <section class="our-work section-margin has-parallax-image ">

                    <div class="container">
                        <div class="section-title dsn-fill mb-70 d-flex flex-column">
                            <span class="sub-heading mb-5">SERVICES</span>
                            <h2 class="title ">Tailored
                                Solutions for<br>
                                Traditional Trade</h2>
                        </div>
                    </div>


                    <div class="dsn-cards root-posts img-h80">
                        <div class="dsn-grid-layout dsn-grid dsn-posts dsn-post-type-cards use-horizontal-scroll box-image-normal"
                            data-dsn-option='{"speed":10,"start":"0"}'>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="7">
                                    <img src="assets/img/portfolio/project1/2.webp"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">UX / UI Design</span>
                                        <span class="background-section heading-color">Architecture</span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2
                                            class="post-title word-wrap d-inline-block title-block text-upper text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">FMCG Distribution
                                                <br> Precision delivery to 3,500+ <span class="fw-200">
                                                    General Trade outlets.</span></a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="5">
                                    <img src="assets/img/portfolio/project1/2.jpg"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Character design </span>
                                        <span class="background-section heading-color">Digital Art </span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2
                                            class="post-title word-wrap d-inline-block title-block text-upper text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">HORECA Supply <br>
                                                Serving 550+ hotels, restaurants,
                                                <span class="fw-200">and catering businesses.</span></a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="3">
                                    <img src="assets/img/portfolio/project3/a.jpg"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Photography </span>
                                        <span class="background-section heading-color">branding </span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2 class="post-title word-wrap d-inline-block title-block text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">Automotive Retail <br>
                                                Supporting 480+ auto <span class="fw-200">shops and workshops.</span></a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="6">
                                    <img src="assets/img/portfolio/project4/a.jpg"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Photography </span>
                                        <span class="background-section heading-color">branding </span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2 class="post-title word-wrap d-inline-block title-block text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">Super Stockist Management <br>
                                                Overseeing 133+ distributors <span class="fw-200">across regions</span></a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="6">
                                    <img src="assets/img/portfolio/project5/a.webp"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Photography </span>
                                        <span class="background-section heading-color">Architecture </span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2 class="post-title word-wrap d-inline-block title-block text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">Clearing & Forwarding
                                                <br> Scalable logistics and warehousing solutions</a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article>

                            <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="5">
                                    <img src="assets/img/portfolio/project6/a.webp"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <!-- <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Photography </span>
                                        <span class="background-section heading-color">Architecture </span>
                                    </div> -->

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2 class="post-title word-wrap d-inline-block title-block text-upper">
                                            <a class="effect-ajax" data-dsn-ajax="work">Distribution Franchise <br>
                                                Opportunities to join our trusted network <span class="fw-200">with comprehensive support</span></a>
                                        </h2>

                                        <a
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                            </article>

                            <!-- <article
                                class="dsn-item-post grid-item h-max-content over-hidden p-relative z-index-2 v-dark-head">

                                <div class="box-image-bg w-100 over-hidden before-z-index dsn-swiper-parallax-transform has-border-radius"
                                    data-overlay="4">
                                    <img src="assets/img/portfolio/project7/1.jpg"
                                        class="cover-bg-img dsn-swiper-parallax-transform" alt="">
                                </div>

                                <div class="content d-flex flex-column p-absolute bottom-0 left-0 w-100 p-20 z-index-1">

                                    <div class="cat p-0 d-flex">
                                        <span class="background-section heading-color">Architecture </span>
                                        <span class="background-section heading-color">Interior Design </span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-15">
                                        <h2 class="post-title word-wrap d-inline-block title-block text-upper">
                                            <a href="project-7.html" class="effect-ajax" data-dsn-ajax="work">Samokat
                                                <br> office <span class="fw-200">© 2021</span></a>
                                        </h2>

                                        <a href="project-7.html"
                                            class="dsn-btn dsn-btn-shape d-flex background-section border-circle effect-ajax">
                                            <span class="icon v-dark background-section">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                    <path
                                                        d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                                    </path>
                                                </svg>
                                            </span>

                                        </a>
                                    </div>
                                </div>

                            </article> -->
                        </div>
                    </div>
                </section>
                <!-- ========== End Work ========== -->

                <!-- ==========  Award ========== -->
                <div class="section-seat section-padding background-section p-relative">
                    <div class="p-absolute top-0 left-0 bottom-0 w-100">
                        <div class="img-box-parallax before-z-index h-100" data-overlay="4" data-dsn-grid="move-up">
                            <img src="assets/img/b.webp" class="has-bigger-scale cover-bg-img has-direction" alt="">
                        </div>
                    </div>
                    <div class="bg-line"></div>

                    <div class="container z-index-1 p-relative">
                        <div class="p-relative d-grid grid-lg-2 align-items-center justify-content-center text-center ml-auto mr-auto">

                            <div class="ex content-blure has-border-radius v-dark-head">
                                <h2 class="big-text">35</h2>
                                <h5 class="text-upper fw-bold mt-15 color-yellow">(years of work)</h5>
                                <p class="mt-30 ml-auto mr-auto text-upper">
                                    Sampoorn has over three decades of experience bridging the gap between distributors and retailers, ensuring seamless collaboration across the supply chain.
                                </p>
                            </div>

                            <div class="ex content-blure has-border-radius v-dark-head">
                                <h2 class="big-text">150</h2>
                                <h5 class="text-upper fw-bold mt-15 color-yellow">(people)</h5>
                                <p class="mt-30 ml-auto mr-auto text-upper">
                                    Our dedicated team of 150 professionals works passionately to streamline connections, optimize business processes, and deliver growth for both distributors and retailers.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ========== End Award ========== -->

                <!-- ==========  End Service ========== -->
                <div class="seat background-section section-padding">
                    <div class="dsn-container">
                        <div class="d-grid grid-lg-2">
                            <div class="dsn-item heading v-light has-border-radius">
                                <h3 class=" text-center text-upper">Feature
                                    <span>Blocks</span>
                                </h3>
                                <!-- <p class="mt-30 text-center">Fusce at enim vel ante tempor rutrum. Cras euismod
                                    condimentum ex pharetra congue. Etiam in risus feugiat, finibus nulla nec</p> -->

                                <div class="counter-wrapper mt-30">
                                    <div class="counter-item">
                                        <h3 class="counter">
                                            Reach
                                        </h3>
                                        <p class=" text-center">3,500+ outlets across General Trade, HORECA, and Automotive.</p>
                                    </div>
                                    <div class="pertition"></div>
                                    <div class="counter-item">
                                        <h3 class="counter">
                                            Brands
                                        </h3>
                                        <p class=" text-center">Trusted by 70+ industry leaders like Nestle and Britannia.</p>
                                    </div>
                                </div>
                                <div class="counter-wrapper mt-30">
                                    <div class="counter-item">
                                        <h3 class="counter">
                                            Distribution
                                        </h3>
                                        <p class=" text-center">133+ distributors ensuring nationwide access.</p>
                                    </div>
                                    <div class="pertition"></div>
                                    <div class="counter-item">
                                        <h3 class="counter">
                                            Innovation
                                        </h3>
                                        <p class=" text-center">Streamlined operations through cutting-edge technology.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dsn-item-has-bg has-border-radius v-dark-head">
                                <div class="box-image has-border-radius w-100 h-100 p-absolute top-0 bottom-0 before-z-index" data-dsn-grid="move-up">
                                    <img src="assets/img/b.jpeg" class="cover-bg-img" alt="Sampoorn Background">
                                </div>

                                <div class="tab">
                                    <div class="cat d-flex p-0">
                                        <span class="background-section heading-color text-upper">Retail Solutions</span>
                                    </div>

                                    <div class="cat d-flex p-0">
                                        <span class="heading-color text-upper">Distributor Network</span>
                                    </div>
                                </div>

                                <div class="text d-flex flex-column align-items-center justify-content-center">
                                    <div class="heading text-upper">
                                        <h3>Looking to <span>connect</span> with reliable partners?</h3>
                                    </div>

                                    <div class="dsn-btn dsn-btn-shape d-flex mt-30">

                                        <a class="button v-dark background-section effect-ajax" href="about.php">
                                            <span class="title-btn text-upper p-relative z-index-1 heading-color" data-animate-text="join Sampoorn now">
                                                <span>join Sampoorn now</span>
                                            </span>
                                        </a>

                                        <span class="icon v-dark background-section">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                                <path d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z"></path>
                                            </svg>
                                        </span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ==========  End Service ========== -->

                <!-- ==========   testimonials ========== -->
                <section class="dsn-testimonials testimonials-small full-testimonials section-margin dsn-swiper"
                    data-dsn-option='{"spaceBetween":30,"centeredSlides":false,"direction":"horizontal","autoHeight":false,"slideToClickedSlide":false,"grabCursor":true,"mousewheel":false,"loop":true,"parallax":false,"slidesPerGroup":1,"slidesPerView":2,"speed":1000,"effect":"card"}'>
                    <div class="container">
                        <div class="section-title dsn-fill d-flex flex-column mb-70">
                            <span class="sub-heading mb-5">testimonials</span>
                            <h2 class="title ">What People Are Saying </h2>

                            <!-- <p class="mt-20">Consumers today rely heavily on digital <br>
                                means to research products. We research
                                a brand of bldend</p> -->
                        </div>
                        <div class="testimonials-inner d-flex over-hidden">
                            <div class="swiper swiper-container">
                                <div class="swiper-wrapper">
                                    <div
                                        class="swiper-slide testimonal-item background-section has-border-radius d-flex flex-column align-items-center">
                                        <div class="content">
                                            <div class="rating">
                                                <h3 class="heading">4.9
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                        </path>
                                                    </svg>
                                                </h3>

                                                <p class="text-upper">out of 5 stars</p>
                                            </div>

                                            <p class="title-block mt-50 text-upper">
                                                Sampoorn connects us with trusted retailers quickly and efficiently.</p>

                                            <div class="quote mt-30">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                                    viewbox="0 0 40 30" fill="none">
                                                    <path d="M0 0V30L15.0025 15V0H0Z" fill="#030104"></path>
                                                    <path d="M24.9961 0V30L39.9986 15V0H24.9961Z" fill="#030104">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="box-authoer w-100 v-light background-main p-20">
                                            <div class="authoer d-flex">
                                                <div class="img">
                                                    <img class="cover-bg-img" src="assets/img/team/1.jpg" alt="">
                                                </div>

                                                <svg width="26" height="19" viewbox="0 0 26 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 0C10.6801 7.41878 16.3937 7.34643 26 0V19C15.594 10.5293 9.86673 10.5632 0 19V0Z"
                                                        fill="#E0E0E0"></path>
                                                </svg>

                                                <div class="text background-section">
                                                    <h5>Sonu Sharma</h5>
                                                    <span>Distributor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="swiper-slide testimonal-item background-section has-border-radius d-flex flex-column align-items-center">
                                        <div class="content">
                                            <div class="rating">
                                                <h3 class="heading">4.9
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                        </path>
                                                    </svg>
                                                </h3>

                                                <p class="text-upper">out of 5 stars</p>
                                            </div>

                                            <p class="title-block mt-50 text-upper">
                                                A reliable bridge between distributors and retailers—highly recommended!</p>

                                            <div class="quote mt-30">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                                    viewbox="0 0 40 30" fill="none">
                                                    <path d="M0 0V30L15.0025 15V0H0Z" fill="#030104"></path>
                                                    <path d="M24.9961 0V30L39.9986 15V0H24.9961Z" fill="#030104">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="box-authoer w-100 v-light background-main p-20">
                                            <div class="authoer d-flex">
                                                <div class="img">
                                                    <img class="cover-bg-img" src="assets/img/team/1.jpg" alt="">
                                                </div>

                                                <svg width="26" height="19" viewbox="0 0 26 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 0C10.6801 7.41878 16.3937 7.34643 26 0V19C15.594 10.5293 9.86673 10.5632 0 19V0Z"
                                                        fill="#E0E0E0"></path>
                                                </svg>

                                                <div class="text background-section">
                                                    <h5>Anmol kolhi</h5>
                                                    <span>Retailer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="swiper-slide testimonal-item background-section has-border-radius d-flex flex-column align-items-center">
                                        <div class="content">
                                            <div class="rating">
                                                <h3 class="heading">4.9
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                        </path>
                                                    </svg>
                                                </h3>

                                                <p class="text-upper">out of 5 stars</p>
                                            </div>

                                            <p class="title-block mt-50 text-upper">
                                                Great service! Streamlined our supply chain like never before.</p>

                                            <div class="quote mt-30">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                                    viewbox="0 0 40 30" fill="none">
                                                    <path d="M0 0V30L15.0025 15V0H0Z" fill="#030104"></path>
                                                    <path d="M24.9961 0V30L39.9986 15V0H24.9961Z" fill="#030104">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="box-authoer w-100 v-light background-main p-20">
                                            <div class="authoer d-flex">
                                                <div class="img">
                                                    <img class="cover-bg-img" src="assets/img/team/1.jpg" alt="">
                                                </div>

                                                <svg width="26" height="19" viewbox="0 0 26 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 0C10.6801 7.41878 16.3937 7.34643 26 0V19C15.594 10.5293 9.86673 10.5632 0 19V0Z"
                                                        fill="#E0E0E0"></path>
                                                </svg>

                                                <div class="text background-section">
                                                    <h5>Sachin</h5>
                                                    <span>Retailer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="swiper-slide testimonal-item background-section has-border-radius d-flex flex-column align-items-center">
                                        <div class="content">
                                            <div class="rating">
                                                <h3 class="heading">4.9
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                        </path>
                                                    </svg>
                                                </h3>

                                                <p class="text-upper">out of 5 stars</p>
                                            </div>

                                            <p class="title-block mt-50 text-upper">
                                                Sampoorn simplifies business connections and boosts growth for everyone involved.</p>

                                            <div class="quote mt-30">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                                    viewbox="0 0 40 30" fill="none">
                                                    <path d="M0 0V30L15.0025 15V0H0Z" fill="#030104"></path>
                                                    <path d="M24.9961 0V30L39.9986 15V0H24.9961Z" fill="#030104">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="box-authoer w-100 v-light background-main p-20">
                                            <div class="authoer d-flex">
                                                <div class="img">
                                                    <img class="cover-bg-img" src="assets/img/team/1.jpg" alt="">
                                                </div>

                                                <svg width="26" height="19" viewbox="0 0 26 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 0C10.6801 7.41878 16.3937 7.34643 26 0V19C15.594 10.5293 9.86673 10.5632 0 19V0Z"
                                                        fill="#E0E0E0"></path>
                                                </svg>

                                                <div class="text background-section">
                                                    <h5>Manish</h5>
                                                    <span>Distributor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ==========  End testimonials ========== -->

                <!-- ========== Team ========== -->
                <!-- <section class="dsn-team section-padding background-section">
                    <div class="container">
                        <div class="section-title dsn-fill mb-70 d-flex flex-column">
                            <span class="sub-heading mb-5">Team</span>
                            <h2 class="title ">Meet Our<br>
                                Team</h2>
                        </div>
                    </div>

                    <div class="container">
                        <div class="d-grid grid-lg-3 grid-md-2">
                            <div class="team-item d-flex align-items-end">
                                <div class="box-img">
                                    <img class="cover-bg-img has-border-radius" src="assets/img/team/1.jpg" alt="">
                                </div>
                                <div class="content d-flex justify-content-between w-100">
                                    <div class="text">
                                        <h4 class="title-block text-upper mb-5">Moustafa <br>
                                            Sabry</h4>
                                        <span>Web Designer</span>
                                    </div>
                                    <div class="social-inner d-flex">
                                        <h6 class="theme-color">SOCIAL MEDIA</h6>
                                        <div class="social d-flex flex-column background-section">
                                            <a href="#" class="social-item">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-instagram"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="team-item d-flex align-items-end">
                                <div class="box-img has-border-radius">
                                    <img class="cover-bg-img has-border-radius" src="assets/img/team/2.jpg" alt="">
                                </div>
                                <div class="content d-flex justify-content-between w-100">
                                    <div class="text">
                                        <h4 class="title-block text-upper mb-5">Ahmed <br>
                                            Shawky</h4>
                                        <span>Web Designer</span>
                                    </div>
                                    <div class="social-inner d-flex">
                                        <h6 class="theme-color">SOCIAL MEDIA</h6>
                                        <div class="social d-flex flex-column background-section">
                                            <a href="#" class="social-item">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-instagram"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="team-item d-flex align-items-end">
                                <div class="box-img">
                                    <img class="cover-bg-img has-border-radius" src="assets/img/team/3.jpg" alt="">
                                </div>
                                <div class="content w-100 d-flex justify-content-between">
                                    <div class="text">
                                        <h4 class="title-block text-upper mb-5">Hisham <br>
                                            Megahed</h4>
                                        <span>Web Designer</span>
                                    </div>
                                    <div class="social-inner d-flex">
                                        <h6 class="theme-color">SOCIAL MEDIA</h6>
                                        <div class="social d-flex flex-column background-section">
                                            <a href="#" class="social-item">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-instagram"></i>
                                            </a>

                                            <a href="#" class="social-item">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
                <!-- ========== End Team ========== -->


                <!-- ========== Blog ========== -->
                <!-- <section class="dsn-cards-post section-padding">
                    <div class="container">
                        <div class="section-title dsn-fill mb-70 d-flex flex-column">
                            <span class="sub-heading mb-5">SERVICES</span>
                            <h2 class="title">Connecting<br>
                                Distributors & Retailers<br>
                                Seamlessly</h2>
                        </div>
                    </div>

                    <div class="container">
                        <div class="dsn-posts">
                            <div class="d-grid grid-lg-3 grid-md-2">
                                <div class="post-item p-relative d-flex flex-column justify-content-end over-hidden">
                                    <div class="cat background-main d-flex p-absolute top-0 right-0 z-index-1">
                                        <svg class="top-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <svg class="bottom-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <span class="background-section heading-color">Distribution</span>
                                    </div>

                                    <div class="box-img w-100 h-500">
                                        <img class="cover-bg-img has-border-radius" src="assets/img/blog/1.jpg" alt="">
                                    </div>

                                    <div class="content p-relative z-index-1 mt-20">
                                        <span class="date mb-10 background-section p-5">Distribution Network</span>
                                        <h4 class="title-block text-upper fw-bold">Streamlining Supply Chain For Maximum Efficiency</h4>
                                    </div>
                                </div>

                                <div class="post-item p-relative d-flex flex-column justify-content-end over-hidden">
                                    <div class="cat background-main d-flex p-absolute top-0 right-0 z-index-1">
                                        <svg class="top-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <svg class="bottom-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <span class="background-section heading-color">Retail</span>
                                    </div>

                                    <div class="box-img w-100 h-500">
                                        <img class="cover-bg-img has-border-radius" src="assets/img/blog/2.jpg" alt="">
                                    </div>

                                    <div class="content p-relative z-index-1 mt-20">
                                        <span class="date mb-10 background-section p-5">Retail Solutions</span>
                                        <h4 class="title-block text-upper fw-bold">Empowering Retailers With Direct Supplier Access</h4>
                                    </div>
                                </div>

                                <div class="post-item p-relative d-flex flex-column justify-content-end over-hidden">
                                    <div class="cat background-main d-flex p-absolute top-0 right-0 z-index-1">
                                        <svg class="top-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <svg class="bottom-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0"
                                            y="0" viewbox="0 0 100 100" xml:space="preserve">
                                            <path d="M98.1 0h1.9v51.9h-1.9c0-27.6-22.4-50-50-50V0h50z">
                                            </path>
                                        </svg>
                                        <span class="background-section heading-color">Technology</span>
                                    </div>

                                    <div class="box-img w-100 h-500">
                                        <img class="cover-bg-img has-border-radius" src="assets/img/blog/3.jpg" alt="">
                                    </div>

                                    <div class="content p-relative z-index-1 mt-20">
                                        <span class="date mb-10 background-section p-5">Digital Platform</span>
                                        <h4 class="title-block text-upper fw-bold">Our Innovative Marketplace Connects Businesses Seamlessly</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section> -->
                <!-- ========== End Blog ========== -->

                <!-- ========== Brand ========== -->
                <!-- <div class="dsn-brand brand-radu p-relative section-padding background-section dsn-skew-scroll">
                    <div class="p-absolute top-0 left-0 bottom-0 w-100 h-100">
                        <div class="img-box-parallax before-z-index w-100 h-100 p-absolute top-0 bottom-0 left-0"
                            data-overlay="7" data-dsn-grid="move-up">
                            <img src="assets/img/img-under-header.jpg"
                                class="has-bigger-scale cover-bg-img has-direction" alt="">
                        </div>
                    </div>

                    <div class="container">
                        <div class="brand-inner d-grid grid-md-2 grid-lg-4  align-items-center p-relative z-index-1">
                            <div class="brand-boxs d-flex flex-column align-items-end">
                                <div class="brand-item brand-item-lg content-blure">
                                    <img src="assets/img/brand/1.svg" alt="">
                                </div>

                                <div class="brand-item brand-item-sm content-blure mt-30">
                                    <img src="assets/img/brand/2.svg" alt="">
                                </div>
                            </div>

                            <div class="brand-boxs d-flex flex-column align-items-start">
                                <div class="brand-item brand-item-sm content-blure">
                                    <img src="assets/img/brand/6.svg" alt="">
                                </div>

                                <div class="brand-item brand-item-lg content-blure mt-30">
                                    <img src="assets/img/brand/5.svg" alt="">
                                </div>
                            </div>

                            <div class="brand-boxs d-flex flex-column align-items-start">
                                <div class="brand-item brand-item-sm content-blure">
                                    <img src="assets/img/brand/3.svg" alt="">
                                </div>

                                <div class="brand-item brand-item-lg content-blure mt-30">
                                    <img src="assets/img/brand/4.svg" alt="">
                                </div>
                            </div>

                            <div class="brand-boxs d-flex flex-column align-items-start">
                                <div class="brand-item brand-item-lg content-blure">
                                    <img src="assets/img/brand/5.svg" alt="">
                                </div>

                                <div class="brand-item brand-item-sm content-blure mt-30">
                                    <img src="assets/img/brand/6.svg" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ========== End Brand ========== -->

                <!-- <section class="next-page v-dark section-padding">
                    <div class="container">
                        <div class="tob-box d-flex justify-content-between align-items-end border-bottom pb-50 mb-50">
                            <h2 class="title text-upper">time to <br> roar! </h2>

                            <div class="dsn-btn dsn-btn-shape d-flex">

                                <a class="button background-main v-light effect-ajax" href="contact.html">
                                    <span class="title-btn p-relative  z-index-1 heading-color"
                                        data-animate-text="Let's talk!">
                                        <span>Let's talk!</span>
                                    </span>
                                </a>

                                <span class="icon background-main v-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                        <path
                                            d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="dsn-container dsn-right-container over-hidden">
                        <div class="bottom-box ">
                            <div class="d-grid custom-width">
                                <div class="text">
                                    <h4 class="title-block mb-15">IS YOUR BIG IDEA READY <br> TO GO WILD?</h4>
                                    <p>DON’T BE SHY. SAY HI TO UNLOCK CREATIVITY AND INNOVATION FOR YOUR SEAMLESS
                                        PROJECT</p>
                                </div>

                                <div class="p-relative dsn-marquee over-hidden"
                                    data-dsn-option='{"speed":0,"duplicatedNumber":7,"duration":7000,"gap":60,"delayBeforeStart":1000,"direction":"left","duplicated":true,"pauseOnHover":false,"startVisible":true,"pauseOnCycle":false,"allowCss3Support":true}'>
                                    <h2 class="dsn-text-marquee d-flex title-lg">DIGITAL STUDIOS</h2>
                                </div>
                            </div>

                        </div>
                    </div>

                </section> -->

            </div>

            <?php include('includes/footer.php') ?>
        </div>
    </main>

</body>
<?php include('includes/cursor.php') ?>
<?php include('includes/footerlink.php') ?>

</html>