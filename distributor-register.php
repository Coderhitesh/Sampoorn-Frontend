<?php
// distributor_registration.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php'); ?>
    <title>Distributor Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Axios for API calls -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .hitesh-distributor-container {
            min-height: 100vh;
            background-color: #f9fafb;
            padding: 0;
            margin: 0;
        }

        .hitesh-distributor-wrapper {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 1rem;
        }

        .hitesh-distributor-form-container {
            background: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            padding: 2rem;
        }

        .hitesh-distributor-progress {
            margin-bottom: 2rem;
        }

        .hitesh-distributor-progress-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .hitesh-distributor-step-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            color: white;
            font-weight: 600;
        }

        .hitesh-distributor-step-active {
            background-color: #CF2732;
        }

        .hitesh-distributor-step-inactive {
            background-color: #d1d5db;
        }

        .hitesh-distributor-step-line {
            height: 0.25rem;
            width: 6rem;
        }

        .hitesh-distributor-step-labels {
            display: flex;
            justify-content: center;
            gap: 4rem;
            margin-top: 0.5rem;
        }

        .hitesh-distributor-step-label {
            font-size: 0.875rem;
        }

        .hitesh-distributor-step-label-active {
            color: #CF2732;
            font-weight: 600;
        }

        .hitesh-distributor-step-label-inactive {
            color: #6b7280;
        }

        .hitesh-distributor-form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .hitesh-distributor-form-group {
            display: flex;
            flex-direction: column;
        }

        .hitesh-distributor-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .hitesh-distributor-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .hitesh-distributor-input:focus {
            outline: none;
            border-color: #CF2732;
            box-shadow: 0 0 0 3px rgba(207, 39, 50, 0.1);
        }

        .hitesh-distributor-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            background-color: white;
            cursor: pointer;
        }

        .hitesh-distributor-select:focus {
            outline: none;
            border-color: #CF2732;
            box-shadow: 0 0 0 3px rgba(207, 39, 50, 0.1);
        }

        .hitesh-distributor-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            resize: vertical;
            min-height: 100px;
        }

        .hitesh-distributor-textarea:focus {
            outline: none;
            border-color: #CF2732;
            box-shadow: 0 0 0 3px rgba(207, 39, 50, 0.1);
        }

        .hitesh-distributor-file-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .hitesh-distributor-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
            border: none;
        }

        .hitesh-distributor-btn-primary {
            background-color: #CF2732;
            color: white;
        }

        .hitesh-distributor-btn-primary:hover {
            background-color: #b91c1c;
        }

        .hitesh-distributor-btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .hitesh-distributor-btn-secondary:hover {
            background-color: #4b5563;
        }

        .hitesh-distributor-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .hitesh-distributor-btn-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 2rem;
        }

        .hitesh-distributor-loading {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: hitesh-distributor-spin 1s linear infinite;
        }

        @keyframes hitesh-distributor-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hitesh-distributor-hidden {
            display: none;
        }

        .hitesh-distributor-array-input {
            margin-bottom: 0.5rem;
        }

        .hitesh-distributor-add-btn {
            background-color: #10b981;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .hitesh-distributor-remove-btn {
            background-color: #ef4444;
            color: white;
            padding: 0.25rem 0.5rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.75rem;
            margin-left: 0.5rem;
        }

        .hitesh-distributor-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem;
            border-radius: 0.375rem;
            color: white;
            font-weight: 500;
            z-index: 1000;
            transition: all 0.3s ease-in-out;
        }

        .hitesh-distributor-toast-success {
            background-color: #10b981;
        }

        .hitesh-distributor-toast-error {
            background-color: #ef4444;
        }

        @media (max-width: 640px) {
            .hitesh-distributor-wrapper {
                padding: 1rem;
            }
            
            .hitesh-distributor-form-container {
                padding: 1rem;
            }
            
            .hitesh-distributor-form-grid {
                grid-template-columns: 1fr;
            }
            
            .hitesh-distributor-btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="v-light dsn-ajax">
    <main id="main_root" class="main-root">
        <?php include('includes/topheader.php'); ?>
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

            <!-- ========== Distributor Form Section ========== -->
            <div id="page_wrapper" class="hitesh-distributor-container">
                <div class="hitesh-distributor-wrapper">
                    <div class="hitesh-distributor-form-container">
                        <!-- Progress Steps -->
                        <div class="hitesh-distributor-progress">
                            <div class="hitesh-distributor-progress-container">
                                <div class="hitesh-distributor-step-circle hitesh-distributor-step-active" id="step1Circle">
                                    <span>1</span>
                                </div>
                                <div class="hitesh-distributor-step-line" id="stepLine" style="background-color: #d1d5db;"></div>
                                <div class="hitesh-distributor-step-circle hitesh-distributor-step-inactive" id="step2Circle">
                                    <span>2</span>
                                </div>
                            </div>
                            <div class="hitesh-distributor-step-labels">
                                <span class="hitesh-distributor-step-label hitesh-distributor-step-label-active" id="step1Label">Basic Information</span>
                                <span class="hitesh-distributor-step-label hitesh-distributor-step-label-inactive" id="step2Label">Documents Upload</span>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="distributorForm" enctype="multipart/form-data">
                            <!-- Step 1: Basic Information -->
                            <div id="step1" class="hitesh-distributor-step">
                                <div class="hitesh-distributor-form-grid">
                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="distributorEntityName">Distributor Entity Name *</label>
                                        <input type="text" id="distributorEntityName" name="distributorEntityName" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="constitutionEntity">Constitution of Entity *</label>
                                        <select id="constitutionEntity" name="constitutionEntity" class="hitesh-distributor-select" required>
                                            <option value="">Select Constitution</option>
                                            <option value="proprietorship">Proprietorship</option>
                                            <option value="partnership">Partnership</option>
                                            <option value="company">Company</option>
                                            <option value="llp">LLP</option>
                                        </select>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="address">Address *</label>
                                        <textarea id="address" name="address" class="hitesh-distributor-textarea" required></textarea>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="city">City *</label>
                                        <input type="text" id="city" name="city" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="state">State *</label>
                                        <input type="text" id="state" name="state" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="pincode">Pincode *</label>
                                        <input type="text" id="pincode" name="pincode" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="location">Location</label>
                                        <input type="text" id="location" name="location" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="gstNo">GST Number</label>
                                        <input type="text" id="gstNo" name="gstNo" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="panNo">PAN Number</label>
                                        <input type="text" id="panNo" name="panNo" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="FSSAINo">FSSAI Number</label>
                                        <input type="text" id="FSSAINo" name="FSSAINo" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Owner Names</label>
                                        <div id="ownerNames">
                                            <input type="text" name="ownerName[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Owner Name 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addOwnerName()">Add Owner</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="phoneNo">Phone Number *</label>
                                        <input type="tel" id="phoneNo" name="phoneNo" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="alternatePhoneNo">Alternate Phone Number</label>
                                        <input type="tel" id="alternatePhoneNo" name="alternatePhoneNo" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="email">Email *</label>
                                        <input type="email" id="email" name="email" class="hitesh-distributor-input" required>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="associatedCompany">Associated Company</label>
                                        <input type="text" id="associatedCompany" name="associatedCompany" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Coverage Area</label>
                                        <div id="coverageAreas">
                                            <input type="text" name="coverageArea[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Coverage Area 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addCoverageArea()">Add Coverage Area</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Coverage Area Description</label>
                                        <div id="coverageAreaDescriptions">
                                            <textarea name="coverageAreaDescription[]" class="hitesh-distributor-textarea hitesh-distributor-array-input" placeholder="Description 1"></textarea>
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addCoverageAreaDescription()">Add Description</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="startingYear">Starting Year</label>
                                        <input type="number" id="startingYear" name="startingYear" class="hitesh-distributor-input" min="1900" max="2024">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="numberOfCustomers">Number of Customers</label>
                                        <input type="number" id="numberOfCustomers" name="numberOfCustomers" class="hitesh-distributor-input" min="0">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="godownArea">Godown Area (sq ft)</label>
                                        <input type="number" id="godownArea" name="godownArea" class="hitesh-distributor-input" min="0">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="noOfEmployees">Number of Employees</label>
                                        <input type="number" id="noOfEmployees" name="noOfEmployees" class="hitesh-distributor-input" min="0">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="noOfVehicles">Number of Vehicles</label>
                                        <input type="number" id="noOfVehicles" name="noOfVehicles" class="hitesh-distributor-input" min="0">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Type of Vehicles</label>
                                        <div id="typeOfVehicles">
                                            <input type="text" name="typeOfVehicles[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Vehicle Type 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addVehicleType()">Add Vehicle Type</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="monthlyTurnOver">Monthly Turnover</label>
                                        <input type="number" id="monthlyTurnOver" name="monthlyTurnOver" class="hitesh-distributor-input" min="0">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Channels of Operation</label>
                                        <div id="channelsOfOperation">
                                            <input type="text" name="channelsOfOperation[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Channel 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addChannel()">Add Channel</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Types of Operation</label>
                                        <div id="typesOfOperation">
                                            <input type="text" name="typesOfOperation[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Operation Type 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addOperationType()">Add Operation Type</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label">Business Operations</label>
                                        <div id="businessOperations">
                                            <input type="text" name="businessOperations[]" class="hitesh-distributor-input hitesh-distributor-array-input" placeholder="Business Operation 1">
                                        </div>
                                        <button type="button" class="hitesh-distributor-add-btn" onclick="addBusinessOperation()">Add Business Operation</button>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="isERPUsed">Is ERP Used?</label>
                                        <select id="isERPUsed" name="isERPUsed" class="hitesh-distributor-select">
                                            <option value="">Select Option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="distributorAssociationName">Distributor Association Name</label>
                                        <input type="text" id="distributorAssociationName" name="distributorAssociationName" class="hitesh-distributor-input">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="Password">Password *</label>
                                        <input type="password" id="Password" name="Password" class="hitesh-distributor-input" required>
                                    </div>
                                </div>

                                <div class="hitesh-distributor-btn-group">
                                    <div></div>
                                    <button type="button" class="hitesh-distributor-btn hitesh-distributor-btn-primary" onclick="nextStep()">Next Step</button>
                                </div>
                            </div>

                            <!-- Step 2: Documents Upload -->
                            <div id="step2" class="hitesh-distributor-step hitesh-distributor-hidden">
                                <div class="hitesh-distributor-form-grid">
                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="officeAndGodownImage">Office and Godown Images</label>
                                        <input type="file" id="officeAndGodownImage" name="officeAndGodownImage[]" class="hitesh-distributor-file-input" multiple accept="image/*">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="gstImage">GST Certificate Image</label>
                                        <input type="file" id="gstImage" name="gstImage" class="hitesh-distributor-file-input" accept="image/*">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="fssaiImage">FSSAI Certificate Image</label>
                                        <input type="file" id="fssaiImage" name="fssaiImage" class="hitesh-distributor-file-input" accept="image/*">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="partner1Image">Partner 1 Image</label>
                                        <input type="file" id="partner1Image" name="partner1Image" class="hitesh-distributor-file-input" accept="image/*">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="partner2Image">Partner 2 Image</label>
                                        <input type="file" id="partner2Image" name="partner2Image" class="hitesh-distributor-file-input" accept="image/*">
                                    </div>

                                    <div class="hitesh-distributor-form-group">
                                        <label class="hitesh-distributor-label" for="anyOtherDocImage">Any Other Document Image</label>
                                        <input type="file" id="anyOtherDocImage" name="anyOtherDocImage" class="hitesh-distributor-file-input" accept="image/*">
                                    </div>
                                </div>

                                <div class="hitesh-distributor-btn-group">
                                    <button type="button" class="hitesh-distributor-btn hitesh-distributor-btn-secondary" onclick="prevStep()">Previous Step</button>
                                    <button type="submit" class="hitesh-distributor-btn hitesh-distributor-btn-primary" id="submitBtn">
                                        <span id="submitText">Submit Registration</span>
                                        <span id="submitLoading" class="hitesh-distributor-loading hitesh-distributor-hidden"></span>
                                    </button>
                                </div>
                            </div>

                            <input type="hidden" name="type" value="Distributor">
                        </form>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php'); ?>
        </div>
    </main>

    <script>
        let currentStep = 1;
        let isLoading = false;

        // Step navigation functions
        function nextStep() {
            if (validateStep1()) {
                currentStep = 2;
                updateStepDisplay();
            }
        }

        function prevStep() {
            currentStep = 1;
            updateStepDisplay();
        }

        function updateStepDisplay() {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const step1Circle = document.getElementById('step1Circle');
            const step2Circle = document.getElementById('step2Circle');
            const stepLine = document.getElementById('stepLine');
            const step1Label = document.getElementById('step1Label');
            const step2Label = document.getElementById('step2Label');

            if (currentStep === 1) {
                step1.classList.remove('hitesh-distributor-hidden');
                step2.classList.add('hitesh-distributor-hidden');
                
                step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-inactive';
                stepLine.style.backgroundColor = '#d1d5db';
                
                step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
                step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
            } else {
                step1.classList.add('hitesh-distributor-hidden');
                step2.classList.remove('hitesh-distributor-hidden');
                
                step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                stepLine.style.backgroundColor = '#CF2732';
                
                step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
                step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
            }
        }

        // Validation function for step 1
        function validateStep1() {
            const requiredFields = [
                'distributorEntityName',
                'constitutionEntity',
                'address',
                'city',
                'state',
                'pincode',
                'phoneNo',
                'email',
                'Password'
            ];

            let isValid = true;
            let firstErrorField = null;

            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (!field.value.trim()) {
                    field.style.borderColor = '#ef4444';
                    isValid = false;
                    if (!firstErrorField) {
                        firstErrorField = field;
                    }
                } else {
                    field.style.borderColor = '#d1d5db';
                }
            });

            if (!isValid) {
                showToast('Please fill in all required fields', 'error');
                if (firstErrorField) {
                    firstErrorField.focus();
                }
            }

            return isValid;
        }

        // Dynamic field addition functions
        function addOwnerName() {
            const container = document.getElementById('ownerNames');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="ownerName[]" class="hitesh-distributor-input" placeholder="Owner Name" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addCoverageArea() {
            const container = document.getElementById('coverageAreas');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="coverageArea[]" class="hitesh-distributor-input" placeholder="Coverage Area" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addCoverageAreaDescription() {
            const container = document.getElementById('coverageAreaDescriptions');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <textarea name="coverageAreaDescription[]" class="hitesh-distributor-textarea" placeholder="Description" style="display: inline-block; width: calc(100% - 60px);"></textarea>
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addVehicleType() {
            const container = document.getElementById('typeOfVehicles');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="typeOfVehicles[]" class="hitesh-distributor-input" placeholder="Vehicle Type" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addChannel() {
            const container = document.getElementById('channelsOfOperation');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="channelsOfOperation[]" class="hitesh-distributor-input" placeholder="Channel" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addOperationType() {
            const container = document.getElementById('typesOfOperation');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="typesOfOperation[]" class="hitesh-distributor-input" placeholder="Operation Type" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function addBusinessOperation() {
            const container = document.getElementById('businessOperations');
            const div = document.createElement('div');
            div.className = 'hitesh-distributor-array-input';
            div.innerHTML = `
                <input type="text" name="businessOperations[]" class="hitesh-distributor-input" placeholder="Business Operation" style="display: inline-block; width: calc(100% - 60px);">
                <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
            `;
            container.appendChild(div);
        }

        function removeField(button) {
            button.parentElement.remove();
        }

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `hitesh-distributor-toast hitesh-distributor-toast-${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Form submission
        document.getElementById('distributorForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isLoading) return;
            
            isLoading = true;
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitLoading = document.getElementById('submitLoading');
            
            submitBtn.disabled = true;
            submitText.classList.add('hitesh-distributor-hidden');
            submitLoading.classList.remove('hitesh-distributor-hidden');

            try {
                const formData = new FormData(this);
                
                const response = await axios.post('http://localhost:5001/api/v1/create_distributor', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                if (response.data.success) {
                    showToast('Distributor created successfully!', 'success');
                    // Reset form or redirect
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    showToast(response.data.message || "Something went wrong!", 'error');
                }
            } catch (error) {
                console.error("Error:", error);
                const errorMessage = error?.response?.data?.message || "Something went wrong!";
                showToast(errorMessage, 'error');
            } finally {
                isLoading = false;
                submitBtn.disabled = false;
                submitText.classList.remove('hitesh-distributor-hidden');
                submitLoading.classList.add('hitesh-distributor-hidden');
            }
        });

        // Initialize form
        document.addEventListener('DOMContentLoaded', function() {
            updateStepDisplay();
            
            // Add event listeners for real-time validation
            const requiredFields = [
                'distributorEntityName',
                'constitutionEntity',
                'address',
                'city',
                'state',
                'pincode',
                'phoneNo',
                'email',
                'Password'
            ];

            requiredFields.forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        if (this.value.trim()) {
                            this.style.borderColor = '#d1d5db';
                        }
                    });
                }
            });
        });
    </script>

    <?php include('includes/cursor.php'); ?>
    <?php include('includes/footerlink.php'); ?>
</body>

</html>