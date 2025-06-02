<!DOCTYPE html>
<html lang="en">

<head>
    <title>For Brand</title>
    <!-- PHP header links would be included here -->
    <?php include('includes/headerlink.php') ?>
    <style>
        /* Custom CSS for For Brand Page */
        .for-brands-container {
            padding: 100px 0;
        }
        
        .section-heading {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-heading h2 {
            font-size: 36px;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-heading h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #333;
        }
        
        .section-heading p {
            font-size: 18px;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .info-blocks {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 50px 0;
        }
        
        .info-block {
            background-color: #f7f7f7;
            border-radius: 10px;
            padding: 40px 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .info-block:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .info-block-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #ED8C25;
            display: inline-block;
        }
        
        .info-block h3 {
            font-size: 24px;
            margin-bottom: 15px;
            position: relative;
        }
        
        .info-block h3:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #333;
        }
        
        .info-block p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .info-block ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0 0 0;
        }
        
        .info-block ul li {
            padding: 8px 0;
            display: flex;
            align-items: center;
        }
        
        .info-block ul li:before {
            content: '•';
            color: #ED8C25;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .process-flow {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 60px 0;
            position: relative;
        }
        
        .process-flow:before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #ddd;
            z-index: 0;
        }
        
        .process-step {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 0 15px;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ED8C25;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto 20px;
        }
        
        .process-step h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .process-step p {
            font-size: 14px;
            color: #666;
        }
        
        .value-metrics {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 40px 0;
        }
        
        .metric {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 30px;
            margin: 15px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .metric h3 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ED8C25;
        }
        
        .metric p {
            font-size: 16px;
            color: #555;
        }
        
        .cta-container {
            text-align: center;
            background-color: #f1f1f1;
            padding: 80px 0;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }
        
        .cta-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ED8C25, #555);
        }
        
        .cta-container h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .cta-container p {
            font-size: 18px;
            color: #555;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .cta-btn {
            display: inline-block;
            background-color: #ED8C25;
            color: #fff;
            padding: 15px 40px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid #ED8C25;
        }
        
        .cta-btn:hover {
            background-color: transparent;
            color: #ED8C25;
        }
        
        @media (max-width: 768px) {
            .process-flow:before {
                display: none;
            }
            
            .process-step {
                margin-bottom: 40px;
            }
            
            .info-blocks {
                grid-template-columns: 1fr;
            }
        }
    </style>
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

                            <h1 class="title-lg text-upper">For Brands</h1>

                            <div class="contact-links w-75 mt-20">
                                <p class="subtitle">Your Gateway to India's Traditional Trade</p>
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
                
                <!-- For Brands Content Start -->
                <section class="for-brands-container">
                    <div class="container">
                        <div class="section-heading">
                            <h2>Why Partner With Us?</h2>
                            <p>Expand your market reach and drive growth with our proven distribution network</p>
                        </div>
                        
                        <!-- Why Partner Section -->
                        <div class="info-blocks">
                            <div class="info-block">
                                <div class="info-block-icon">
                                    <i class="fas fa-door-open"></i>
                                </div>
                                <h3>Low Entry Barriers</h3>
                                <p>We make it easy for brands of all sizes to enter the traditional trade market with minimal initial investment and hassle-free onboarding.</p>
                                <ul>
                                    <li>Simplified documentation</li>
                                    <li>Flexible payment terms</li>
                                    <li>Zero setup costs</li>
                                </ul>
                            </div>
                            
                            <div class="info-block">
                                <div class="info-block-icon">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                                <h3>Multi-Channel Expertise</h3>
                                <p>Leverage our expertise across various distribution channels to maximize your product reach and market penetration.</p>
                                <ul>
                                    <li>Traditional retail outlets</li>
                                    <li>Modern trade integration</li>
                                    <li>E-commerce enablement</li>
                                </ul>
                            </div>
                            
                            <div class="info-block">
                                <div class="info-block-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3>Proven Scalability</h3>
                                <p>Our track record shows successful growth patterns for brands across diverse market segments and geographical areas.</p>
                                <ul>
                                    <li>Market expansion strategies</li>
                                    <li>Volume-based growth models</li>
                                    <li>Customized scaling plans</li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- How It Works Section -->
                        <div class="section-heading">
                            <h2>How It Works</h2>
                            <p>A seamless process designed for maximum efficiency and transparency</p>
                        </div>
                        
                        <div class="process-flow">
                            <div class="process-step">
                                <div class="step-number">1</div>
                                <h4>Onboarding</h4>
                                <p>Simple documentation and system integration to bring your brand into our network</p>
                            </div>
                            
                            <div class="process-step">
                                <div class="step-number">2</div>
                                <h4>Channel Allocation</h4>
                                <p>Strategic planning to determine optimal distribution channels for your products</p>
                            </div>
                            
                            <div class="process-step">
                                <div class="step-number">3</div>
                                <h4>Real-Time Tracking</h4>
                                <p>Advanced digital systems to monitor inventory, sales, and market performance</p>
                            </div>
                        </div>
                        
                        <!-- Value Delivered Section -->
                        <div class="section-heading">
                            <h2>Value Delivered</h2>
                            <p>Tangible benefits that make our partnership valuable</p>
                        </div>
                        
                        <div class="value-metrics">
                            <div class="metric">
                                <h3>5000+</h3>
                                <p>Retail Touchpoints</p>
                            </div>
                            
                            <div class="metric">
                                <h3>97%</h3>
                                <p>On-time Delivery</p>
                            </div>
                            
                            <div class="metric">
                                <h3>18+</h3>
                                <p>Years of Experience</p>
                            </div>
                        </div>
                        
                        <div class="info-blocks">
                            <div class="info-block">
                                <div class="info-block-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h3>Trusted Franchise Network</h3>
                                <p>Access to our carefully vetted network of franchise partners who understand local markets and customer preferences.</p>
                            </div>
                            
                            <div class="info-block">
                                <div class="info-block-icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <h3>Transparent Operations</h3>
                                <p>Complete visibility into inventory movement, sales performance, and market dynamics through our digital reporting systems.</p>
                            </div>
                        </div>
                        
                        <!-- CTA Section -->
                        <div class="cta-container">
                            <h2>Ready to Expand Your Market Reach?</h2>
                            <p>Join our brand network and leverage our distribution expertise to grow your business across North India's diverse markets.</p>
                            <a href="contact.php" class="cta-btn">Start Distributing Today</a>
                        </div>
                    </div>
                </section>
                <!-- For Brands Content End -->

                <!-- PHP footer would be included here -->
                <?php include('includes/footer.php') ?>
            </div>

        </div>
    </main>

    <!-- PHP cursor and footer links would be included here -->
    <?php include('includes/cursor.php') ?>
    <?php include('includes/footerlink.php') ?>

</body>

</html>