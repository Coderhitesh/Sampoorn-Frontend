<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <style>
        .hitesh-register-container {
            background: linear-gradient(to bottom right, #f9fafb, #f3f4f6);
            min-height: 100vh;
            padding: 60px 20px;
            font-family: 'Poppins', sans-serif;
        }

        .hitesh-register-inner {
            max-width: 800px;
            margin: auto;
        }

        .hitesh-register-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #1f2937;
        }

        .hitesh-register-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .hitesh-register-option {
            position: relative;
        }

        .hitesh-register-option input[type="radio"] {
            display: none;
        }

        .hitesh-register-option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #fff;
            padding: 15px 25px;
            border-radius: 12px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: 0.3s;
            min-width: 150px;
            text-align: center;
            font-weight: 500;
        }

        .hitesh-register-option input[type="radio"]:checked+label {
            border-color: #D70808;
            background-color: #e7f1ff;
            color: #D70808;
        }

        .hitesh-register-content {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .hitesh-register-content h2 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #111827;
        }

        .hitesh-register-content p {
            font-size: 16px;
            color: #4b5563;
        }
    </style>
</head>

<body class="v-light dsn-ajax">
    <main id="main_root" class="main-root">
        <?php include('includes/topheader.php') ?>
        <div id="dsn-scrollbar">

         <!-- ========== Header ========== -->
            <header class="header-page v-dark-head dsn-header-animation pb-80 p-relative">

                <div class="box-img h-100 w-100 h-100 p-absolute top-0 right-0" data-overlay="7">
                    <img class="cover-bg-img" src="https://media.istockphoto.com/id/1059548978/photo/technical-support-concept-business-person-touching-helpdesk-icon-on-screen-hotline-assistance.jpg?s=612x612&w=0&k=20&c=ur4WfDWZzBWZ4-k8UdZ5SPxJ9M4r1uRAsgFx6GoBs-4=" alt="">
                </div>

                <div class="p-relative container dsn-hero-parallax-title h-100">
                    <div class="p-relative d-flex align-items-center w-100  h-100 ">

                        <div class="box-content d-flex flex-column z-index-1">


                            <h1 class="title-lg text-upper">Register</h1>

                            <!-- <div class="contact-links d-flex flex-column w-50 mt-50">
                                <a href="mailto:sumit@sampoornmarketing.com" class="sm-title-block text-upper d-flex justify-content-between align-items-center">sumit@sampoornmarketing.com
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                            <path d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="tel:9811913990" class="sm-title-block text-upper d-flex justify-content-between align-items-center">+91 9811913990
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 384 512">
                                            <path d="M328 96h24v288h-48V177.9L81 401l-17 17-33.9-34 17-17 223-223H64V96h264z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div> -->
                        </div>


                    </div>
                </div>

                <div class="footer-head w-100 p-relative mt-80 z-index-2">
                    <div class="container d-flex justify-content-between">
                        <div class="dsn-btn dsn-btn-shape rotate-icon d-flex">

                            <a class="button v-dark background-section" href="#page_wrapper" rel="nofollow" data-dsn-option='{"ease": "power4.inOut" , "duration" : 1.5}'>
                                <span class="title-btn text-upper p-relative  z-index-1 heading-color" data-animate-text="Scroll Down">
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
                                    <a href="#0" target="_blank" class="background-main">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i> <span>LN</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0" target="_blank" class="background-main">
                                        <i class="fab fa-instagram" aria-hidden="true"></i> <span>IN</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ========== End Header ========== -->

            <!-- Register Component -->
            <div class="hitesh-register-container" id="page_wrapper">
                <div class="hitesh-register-inner">
                    <h1 class="hitesh-register-title">Select Your Business Type</h1>

                    <div class="hitesh-register-options">
                        <div class="hitesh-register-option">
                            <input type="radio" id="distributor" name="business-type" value="distributor" checked>
                            <label for="distributor">Distributor</label>
                        </div>
                        <div class="hitesh-register-option">
                            <input type="radio" id="retailer" name="business-type" value="retailer">
                            <label for="retailer">Retailer</label>
                        </div>
                        <div class="hitesh-register-option">
                            <input type="radio" id="dealer" name="business-type" value="dealer">
                            <label for="dealer">Association</label>
                        </div>
                    </div>

                    <div id="hitesh-register-component" class="hitesh-register-content"></div>
                </div>
            </div>

            <?php include('includes/footer.php') ?>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const componentBox = document.getElementById("hitesh-register-component");

            const contentMap = {
                distributor: `
                <h2>Distributor</h2>
                <p>Manage large-scale distribution networks and supply chains efficiently.</p>
            `,
                retailer: `
                <h2>Retailer</h2>
                <p>Connect directly with customers and handle point-of-sale operations.</p>
            `,
                dealer: `
                <h2>Association</h2>
                <p>Represent specific brands and provide specialized product knowledge.</p>
            `
            };

            function loadComponent(value) {
                componentBox.innerHTML = contentMap[value];
            }

            // Initial load
            loadComponent('distributor');

            // Radio button change listener
            document.querySelectorAll('input[name="business-type"]').forEach((input) => {
                input.addEventListener('change', function() {
                    loadComponent(this.value);
                });
            });
        });
    </script>

</body>
<?php include('includes/cursor.php') ?>
<?php include('includes/footerlink.php') ?>

</html>