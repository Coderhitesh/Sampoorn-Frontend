<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Brands</title>
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

    <main id="main_root" class="main-root">
        <!-- PHP top header would be included here -->
        <?php include('includes/topheader.php') ?>
        <div id="dsn-scrollbar">
            <!-- ========== Header ========== -->
            <header class="header-page v-dark-head dsn-header-animation pb-80 pt-section p-relative">

                <div class="box-img h-100 w-100 h-100 p-absolute top-0 right-0" data-overlay="7">
                    <img class="cover-bg-img" src="assets/img/bg.svg" alt="">
                </div>

                <div class="p-relative container dsn-hero-parallax-title h-100">
                    <div class="p-relative d-flex align-items-center w-100 h-100">

                        <div class="box-content z-index-1">

                            <h1 class="title-lg text-upper">Our Brands</h1>

                            <div class="contact-links w-75 mt-20">
                                <p class="subtitle">Trusted by Industry Leaders</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="footer-head w-100 p-relative mt-80 z-index-2">
                    <div class="container d-flex justify-content-between">
                        <div class="dsn-btn dsn-btn-shape rotate-icon d-flex">

                            <a class="button v-dark background-section" href="#page_wrapper">
                                <span class="title-btn text-upper p-relative z-index-1 heading-color" data-animate-text="Scroll Down">
                                    <span>Scroll Down</span>
                                </span>
                            </a>

                            <span class="icon v-dark background-section">
                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                    <path d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                    </path>
                                </svg>
                            </span>

                        </div>

                        <div class="social-box d-flex align-items-center">

                            <ul class="dsn-socials box-social">
                                 <li>
                        <a href="https://www.facebook.com/profile.php?id=61572648208427" target="_blank" class="background-main">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i> <span>FB</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/sampoornmarketing_pvtltd?igsh=MW8zaHl1OGw5MTY2cg==" target="_blank" class="background-main">
                            <i class="fab fa-instagram" aria-hidden="true"></i> <span>IN</span>
                        </a>
                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ========== End Header ========== -->
            <div id="page_wrapper" class="wrapper">
                
                <!-- Brand Section Start -->
                <section class="brand-section">
                    <div class="container">
                        <div class="section-title">
                            <h2>Our Partner Brands</h2>
                            <p >We're proud to collaborate with leading brands across various industries to deliver exceptional results.</p>
                        </div>
                        
                        <!-- Filters -->
                        <div class="filter-container">
                            <button class="filter-btn active" data-filter="all">All</button>
                            <button class="filter-btn" data-filter="fmcg">FMCG</button>
                            <button class="filter-btn" data-filter="personal-care">Personal Care</button>
                            <button class="filter-btn" data-filter="beverages">Beverages</button>
                            <button class="filter-btn" data-filter="automotive">Automotive</button>
                            <button class="filter-btn" data-filter="institutional">Institutional</button>
                        </div>
                        
                        <!-- Logo Carousel -->
                        <div class="logo-carousel">
                            <div class="logo-carousel-inner">
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/nes.webp" alt="Nestle Logo">
                                    <span class="year">since 1987</span>
                                </div>
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/Britannia.png" alt="Britannia Logo">
                                    <span class="year">since 1993</span>
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/Colgate.png" alt="Colgate Palmolive Logo">
                                </div>
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/Hershey.jpg" alt="Hershey's Logo">
                                </div>
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/Dabur.png" alt="Dabur Logo">
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/nivea.png" alt="Nivea Logo">
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/Johnson.png" alt="Johnson & Johnson Logo">
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/vlcc.png" alt="VLCC Logo">
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/lorem.png" alt="L'Oréal Logo">
                                </div>
                                <div class="brand-logo" data-category="personal-care">
                                    <img src="assets/img/brand-log/mamaearth.png" alt="Mamaearth Logo">
                                </div>
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/Patanjali.png" alt="Patanjali Logo">
                                </div>
                                <!-- Duplicate logos for continuous scrolling effect -->
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/nestle.png" alt="Nestle Logo">
                                    <span class="year">since 1987</span>
                                </div>
                                <div class="brand-logo" data-category="fmcg">
                                    <img src="assets/img/brand-log/Britannia.png" alt="Britannia Logo">
                                    <span class="year">since 1993</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Success Snippets -->
                        <div class="success-snippets">
                            <div class="snippet">
                                <p>"Scaled Nestle's presence in Ladakh's remote markets."</p>
                            </div>
                            <div class="snippet">
                                <p>"Streamlined Castrol's supply chain in Noida."</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- CTA Section -->
                <section class="hitesh-cta-section">
                    <div class="container">
                        <h2>Become Part of Our Success Story</h2>
                        <p>Join our network of trusted brands and experience excellence in distribution and market reach.</p>
                        <a href="contact.php" class="hitesh-cta-button">Join Our Brand Network</a>
                    </div>
                </section>
                <!-- End Brand Section -->

                <?php include('includes/footer.php') ?>
            </div>
        </div>
    </main>
    <!-- PHP cursor and footer links would be included here -->
    <?php include('includes/cursor.php') ?>
    <?php include('includes/footerlink.php') ?>

    <script>
        // Simple filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const brandLogos = document.querySelectorAll('.brand-logo');
            
            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(b => b.classList.remove('active'));
                    
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    const filter = btn.getAttribute('data-filter');
                    
                    brandLogos.forEach(logo => {
                        if (filter === 'all') {
                            logo.style.display = 'flex';
                        } else {
                            const category = logo.getAttribute('data-category');
                            logo.style.display = category === filter ? 'flex' : 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>