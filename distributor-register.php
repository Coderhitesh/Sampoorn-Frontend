<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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

        .error-field {
            border-color: #ef4444 !important;
        }

        .success-field {
            border-color: #10b981 !important;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 5px;
            color: white;
            z-index: 1000;
        }

        .toast-success {
            background-color: #10b981;
        }

        .toast-error {
            background-color: #ef4444;
        }

        .loading {
            display: none;
        }

        .image-preview {
            max-width: 200px;
            max-height: 150px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .preview-item {
            position: relative;
            display: inline-block;
        }

        .remove-preview {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="v-light dsn-ajax">
    <!-- <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div> -->
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
            <div class="error-alert" id="errorAlert">
                <span id="errorText"></span>
            </div>

            <div class="hitesh-distributor-container">
                <!-- <div class="hitesh-distributor-wrapper"> -->
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
                                    <span class="error-message" id="distributorEntityName-error"></span>
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
                                    <span class="error-message" id="constitutionEntity-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="address">Address *</label>
                                    <textarea id="address" name="address" class="hitesh-distributor-textarea" required></textarea>
                                    <span class="error-message" id="address-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="city">City *</label>
                                    <input type="text" id="city" name="city" class="hitesh-distributor-input" required>
                                    <span class="error-message" id="city-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="state">State *</label>
                                    <input type="text" id="state" name="state" class="hitesh-distributor-input" required>
                                    <span class="error-message" id="state-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="pincode">Pincode *</label>
                                    <input type="text" id="pincode" name="pincode" class="hitesh-distributor-input" required pattern="[0-9]{6}">
                                    <span class="error-message" id="pincode-error"></span>
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
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="ownerName[]" class="hitesh-distributor-input" placeholder="Owner Name 1">
                                        </div>
                                    </div>
                                    <button type="button" class="hitesh-distributor-add-btn" onclick="addOwnerName()">Add Owner</button>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="phoneNo">Phone Number *</label>
                                    <input type="tel" id="phoneNo" name="phoneNo" class="hitesh-distributor-input" required pattern="[0-9]{10}">
                                    <span class="error-message" id="phoneNo-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="alternatePhoneNo">Alternate Phone Number</label>
                                    <input type="tel" id="alternatePhoneNo" name="alternatePhoneNo" class="hitesh-distributor-input" pattern="[0-9]{10}">
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="email">Email *</label>
                                    <input type="email" id="email" name="email" class="hitesh-distributor-input" required>
                                    <span class="error-message" id="email-error"></span>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="associatedCompany">Associated Company</label>
                                    <input type="text" id="associatedCompany" name="associatedCompany" class="hitesh-distributor-input">
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label">Coverage Area</label>
                                    <div id="coverageAreas">
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="coverageArea[]" class="hitesh-distributor-input" placeholder="Coverage Area 1">
                                        </div>
                                    </div>
                                    <button type="button" class="hitesh-distributor-add-btn" onclick="addCoverageArea()">Add Coverage Area</button>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label">Coverage Area Description</label>
                                    <div id="coverageAreaDescriptions">
                                        <div class="hitesh-distributor-array-input">
                                            <textarea name="coverageAreaDescription[]" class="hitesh-distributor-textarea" placeholder="Description 1"></textarea>
                                        </div>
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
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="typeOfVehicles[]" class="hitesh-distributor-input" placeholder="Vehicle Type 1">
                                        </div>
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
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="channelsOfOperation[]" class="hitesh-distributor-input" placeholder="Channel 1">
                                        </div>
                                    </div>
                                    <button type="button" class="hitesh-distributor-add-btn" onclick="addChannel()">Add Channel</button>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label">Types of Operation</label>
                                    <div id="typesOfOperation">
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="typesOfOperation[]" class="hitesh-distributor-input" placeholder="Operation Type 1">
                                        </div>
                                    </div>
                                    <button type="button" class="hitesh-distributor-add-btn" onclick="addOperationType()">Add Operation Type</button>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label">Business Operations</label>
                                    <div id="businessOperations">
                                        <div class="hitesh-distributor-array-input">
                                            <input type="text" name="businessOperations[]" class="hitesh-distributor-input" placeholder="Business Operation 1">
                                        </div>
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
                                    <input type="password" id="Password" name="Password" class="hitesh-distributor-input" required minlength="6">
                                    <span class="error-message" id="Password-error"></span>
                                </div>
                            </div>

                            <div class="hitesh-distributor-btn-group">
                                <div></div>
                                <button type="button" class="hitesh-distributor-btn hitesh-distributor-btn-primary" onclick="nextStep()">Next Step</button>
                            </div>
                        </div>

                        <!-- Step 2: Documents Upload -->
                        <div id="step2" class="hitesh-distributor-step hidden">
                            <div class="hitesh-distributor-form-grid">
                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="officeAndGodownImage">Office and Godown Images</label>
                                    <input type="file" id="officeAndGodownImage" name="officeAndGodownImage[]" class="hitesh-distributor-file-input" multiple accept="image/*" onchange="previewImages(this, 'officePreview')">
                                    <div id="officePreview" class="preview-container"></div>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="gstImage">GST Certificate Image</label>
                                    <input type="file" id="gstImage" name="gstImage" class="hitesh-distributor-file-input" accept="image/*" onchange="previewSingleImage(this, 'gstPreview')">
                                    <div id="gstPreview" class="preview-container"></div>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="fssaiImage">FSSAI Certificate Image</label>
                                    <input type="file" id="fssaiImage" name="fssaiImage" class="hitesh-distributor-file-input" accept="image/*" onchange="previewSingleImage(this, 'fssaiPreview')">
                                    <div id="fssaiPreview" class="preview-container"></div>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="partner1Image">Partner 1 Image</label>
                                    <input type="file" id="partner1Image" name="partner1Image" class="hitesh-distributor-file-input" accept="image/*" onchange="previewSingleImage(this, 'partner1Preview')">
                                    <div id="partner1Preview" class="preview-container"></div>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="partner2Image">Partner 2 Image</label>
                                    <input type="file" id="partner2Image" name="partner2Image" class="hitesh-distributor-file-input" accept="image/*" onchange="previewSingleImage(this, 'partner2Preview')">
                                    <div id="partner2Preview" class="preview-container"></div>
                                </div>

                                <div class="hitesh-distributor-form-group">
                                    <label class="hitesh-distributor-label" for="anyOtherDocImage">Any Other Document Image</label>
                                    <input type="file" id="anyOtherDocImage" name="anyOtherDocImage" class="hitesh-distributor-file-input" accept="image/*" onchange="previewSingleImage(this, 'otherDocPreview')">
                                    <div id="otherDocPreview" class="preview-container"></div>
                                </div>
                            </div>

                            <div class="hitesh-distributor-btn-group">
                                <button type="button" class="hitesh-distributor-btn hitesh-distributor-btn-secondary" onclick="prevStep()">Previous Step</button>
                                <button type="submit" onclick="submitForm()" class="hitesh-distributor-btn hitesh-distributor-btn-primary" id="submitBtn">
                                    <span id="submitText">Submit Registration</span>
                                    <span id="submitLoading" class="loading">Loading...</span>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="type" value="Distributor">
                </div>
                <!-- </div> -->
            </div>

            <script>
                let currentStep = 1;
                let isLoading = false;

                // Enhanced logging function
                function logInfo(message, data = null) {
                    console.log(`[DISTRIBUTOR FORM] ${message}`, data || '');
                }

                function logError(message, error = null) {
                    console.error(`[DISTRIBUTOR FORM ERROR] ${message}`, error || '');
                }

                function logWarning(message, data = null) {
                    console.warn(`[DISTRIBUTOR FORM WARNING] ${message}`, data || '');
                }

                // Enhanced error handling wrapper
                function safeExecute(func, funcName) {
                    try {
                        //logInfo(`Executing ${funcName}`);
                        return func();
                    } catch (error) {
                        logError(`Error in ${funcName}`, error);
                        showToast(`An error occurred in ${funcName}. Please try again.`, 'error');
                        return false;
                    }
                }

                // Step navigation functions with enhanced logging
                function nextStep() {
                    return safeExecute(() => {
                        //logInfo('Attempting to move to next step', { currentStep });

                        if (validateStep1()) {
                            currentStep = 2;
                            //logInfo('Validation successful, moving to step 2');
                            updateStepDisplay();
                            showToast('Step 1 completed successfully!', 'success');
                            return true;
                        } else {
                            logWarning('Step 1 validation failed');
                            return false;
                        }
                    }, 'nextStep');
                }

                function prevStep() {
                    return safeExecute(() => {
                        //logInfo('Moving to previous step', { currentStep });
                        currentStep = 1;
                        updateStepDisplay();
                        showToast('Returned to Step 1', 'info');
                        return true;
                    }, 'prevStep');
                }

                function updateStepDisplay() {
                    return safeExecute(() => {
                        //logInfo('Updating step display', { currentStep });

                        const elements = {
                            step1: document.getElementById('step1'),
                            step2: document.getElementById('step2'),
                            step1Circle: document.getElementById('step1Circle'),
                            step2Circle: document.getElementById('step2Circle'),
                            stepLine: document.getElementById('stepLine'),
                            step1Label: document.getElementById('step1Label'),
                            step2Label: document.getElementById('step2Label')
                        };

                        // Check if all required elements exist
                        const missingElements = Object.entries(elements)
                            .filter(([key, element]) => !element)
                            .map(([key]) => key);

                        if (missingElements.length > 0) {
                            logError('Missing DOM elements for step display', missingElements);
                            alert('Error: Some form elements are missing. Please refresh the page.');
                            return false;
                        }

                        if (currentStep === 1) {
                            //logInfo('Displaying step 1');
                            elements.step1.classList.remove('hidden');
                            elements.step2.classList.add('hidden');

                            elements.step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                            elements.step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-inactive';
                            elements.stepLine.style.backgroundColor = '#d1d5db';

                            elements.step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
                            elements.step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
                        } else {
                            //logInfo('Displaying step 2');
                            elements.step1.classList.add('hidden');
                            elements.step2.classList.remove('hidden');

                            elements.step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                            elements.step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
                            elements.stepLine.style.backgroundColor = '#CF2732';

                            elements.step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
                            elements.step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
                        }

                        //logInfo('Step display updated successfully');
                        return true;
                    }, 'updateStepDisplay');
                }

                // Enhanced validation function for step 1
                function validateStep1() {
                    return safeExecute(() => {
                        //logInfo('Starting Step 1 validation');

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
                        let errorCount = 0;
                        let validationErrors = [];

                        // Clear previous errors
                        try {
                            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
                            document.querySelectorAll('.error-field').forEach(el => el.classList.remove('error-field'));
                            //logInfo('Previous errors cleared');
                        } catch (error) {
                            logError('Error clearing previous validation errors', error);
                        }

                        requiredFields.forEach(fieldName => {
                            try {
                                const field = document.getElementById(fieldName);
                                const errorElement = document.getElementById(fieldName + '-error');

                                if (!field) {
                                    logError(`Field not found: ${fieldName}`);
                                    validationErrors.push(`Field ${fieldName} not found in DOM`);
                                    return;
                                }

                                //logInfo(`Validating field: ${fieldName}`, { value: field.value?.substring(0, 20) + '...' });

                                if (!field.value.trim()) {
                                    field.classList.add('error-field');
                                    if (errorElement) {
                                        errorElement.textContent = 'This field is required';
                                        errorElement.style.color = '#ef4444';
                                        errorElement.style.fontSize = '0.875rem';
                                    } else {
                                        logWarning(`Error element not found for field: ${fieldName}`);
                                    }
                                    isValid = false;
                                    errorCount++;
                                    validationErrors.push(`${fieldName} is required`);
                                    if (!firstErrorField) {
                                        firstErrorField = field;
                                    }
                                } else {
                                    field.classList.remove('error-field');
                                    field.classList.add('success-field');

                                    // Additional validation with enhanced error handling
                                    if (fieldName === 'email' && !isValidEmail(field.value)) {
                                        field.classList.add('error-field');
                                        field.classList.remove('success-field');
                                        if (errorElement) errorElement.textContent = 'Please enter a valid email';
                                        isValid = false;
                                        errorCount++;
                                        validationErrors.push('Invalid email format');
                                        logWarning('Invalid email format', {
                                            email: field.value
                                        });
                                    }

                                    // if (fieldName === 'phoneNo' && !isValidPhone(field.value)) {
                                    //     field.classList.add('error-field');
                                    //     field.classList.remove('success-field');
                                    //     if (errorElement) errorElement.textContent = 'Please enter a valid 10-digit phone number';
                                    //     isValid = false;
                                    //     errorCount++;
                                    //     validationErrors.push('Invalid phone number format');
                                    //     logWarning('Invalid phone format', { phone: field.value });
                                    // }

                                    // if (fieldName === 'pincode' && !isValidPincode(field.value)) {
                                    //     field.classList.add('error-field');
                                    //     field.classList.remove('success-field');
                                    //     if (errorElement) errorElement.textContent = 'Please enter a valid 6-digit pincode';
                                    //     isValid = false;
                                    //     errorCount++;
                                    //     validationErrors.push('Invalid pincode format');
                                    //     logWarning('Invalid pincode format', { pincode: field.value });
                                    // }

                                    if (fieldName === 'Password' && field.value.length < 6) {
                                        field.classList.add('error-field');
                                        field.classList.remove('success-field');
                                        if (errorElement) errorElement.textContent = 'Password must be at least 6 characters';
                                        isValid = false;
                                        errorCount++;
                                        validationErrors.push('Password too short');
                                        logWarning('Password too short', {
                                            length: field.value.length
                                        });
                                    }
                                }
                            } catch (error) {
                                logError(`Error validating field ${fieldName}`, error);
                                validationErrors.push(`Validation error for ${fieldName}`);
                                isValid = false;
                            }
                        });

                        if (!isValid) {
                            logError(`Validation failed with ${errorCount} errors`, validationErrors);
                            showToast(`Please fix ${errorCount} error${errorCount > 1 ? 's' : ''} and try again`, 'error');

                            if (firstErrorField) {
                                try {
                                    firstErrorField.focus();
                                    firstErrorField.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'center'
                                    });
                                    //logInfo('Focused on first error field');
                                } catch (error) {
                                    logError('Error focusing on first error field', error);
                                }
                            }

                            // Show detailed error in console for debugging
                            console.table(validationErrors);
                        } else {
                            //logInfo('All validations passed successfully');
                        }

                        return isValid;
                    }, 'validateStep1');
                }

                // Enhanced validation helper functions
                function isValidEmail(email) {
                    try {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        const result = emailRegex.test(email);
                        //logInfo('Email validation', { email: email.substring(0, 20) + '...', isValid: result });
                        return result;
                    } catch (error) {
                        logError('Error in email validation', error);
                        return false;
                    }
                }

                function isValidPhone(phone) {
                    try {
                        const phoneRegex = /^[0-9]{10}$/;
                        const result = phoneRegex.test(phone);
                        //logInfo('Phone validation', { phone: phone.substring(0, 5) + '...', isValid: result });
                        return result;
                    } catch (error) {
                        logError('Error in phone validation', error);
                        return false;
                    }
                }

                function isValidPincode(pincode) {
                    try {
                        const pincodeRegex = /^[0-9]{6}$/;
                        const result = pincodeRegex.test(pincode);
                        //logInfo('Pincode validation', { pincode, isValid: result });
                        return result;
                    } catch (error) {
                        logError('Error in pincode validation', error);
                        return false;
                    }
                }

                // Enhanced image preview functions
                function previewImages(input, previewId) {
                    return safeExecute(() => {
                        //logInfo('Starting image preview', { inputId: input.id, previewId, fileCount: input.files?.length });

                        const previewContainer = document.getElementById(previewId);
                        if (!previewContainer) {
                            logError(`Preview container not found: ${previewId}`);
                            alert('Error: Preview container not found. Please refresh the page.');
                            return false;
                        }

                        previewContainer.innerHTML = '';

                        if (input.files && input.files.length > 0) {
                            if (input.files.length > 10) {
                                logWarning('Too many files selected', {
                                    count: input.files.length
                                });
                                alert('Warning: You have selected more than 10 files. Only the first 10 will be processed.');
                            }

                            Array.from(input.files).slice(0, 10).forEach((file, index) => {
                                if (!file.type.startsWith('image/')) {
                                    logWarning('Non-image file selected', {
                                        fileName: file.name,
                                        type: file.type
                                    });
                                    showToast(`File "${file.name}" is not an image and will be skipped`, 'warning');
                                    return;
                                }

                                if (file.size > 5 * 1024 * 1024) { // 5MB limit
                                    logWarning('File too large', {
                                        fileName: file.name,
                                        size: file.size
                                    });
                                    showToast(`File "${file.name}" is too large (max 5MB)`, 'warning');
                                    return;
                                }

                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    try {
                                        const previewItem = document.createElement('div');
                                        previewItem.className = 'preview-item';
                                        previewItem.innerHTML = `
                                    <img src="${e.target.result}" class="image-preview" alt="Preview ${index + 1}">
                                    <button type="button" class="remove-preview" onclick="removePreview(this, '${input.id}', ${index})">×</button>
                                `;
                                        previewContainer.appendChild(previewItem);
                                        //logInfo(`Image preview created for file ${index + 1}`, { fileName: file.name });
                                    } catch (error) {
                                        logError(`Error creating preview for file ${index + 1}`, error);
                                    }
                                };

                                reader.onerror = function(error) {
                                    logError(`Error reading file: ${file.name}`, error);
                                    showToast(`Error reading file: ${file.name}`, 'error');
                                };

                                reader.readAsDataURL(file);
                            });
                        } else {
                            //logInfo('No files selected for preview');
                        }

                        return true;
                    }, 'previewImages');
                }

                function previewSingleImage(input, previewId) {
                    return safeExecute(() => {
                        //logInfo('Starting single image preview', { inputId: input.id, previewId });

                        const previewContainer = document.getElementById(previewId);
                        if (!previewContainer) {
                            logError(`Preview container not found: ${previewId}`);
                            alert('Error: Preview container not found. Please refresh the page.');
                            return false;
                        }

                        previewContainer.innerHTML = '';

                        if (input.files && input.files[0]) {
                            const file = input.files[0];

                            if (!file.type.startsWith('image/')) {
                                logError('Selected file is not an image', {
                                    fileName: file.name,
                                    type: file.type
                                });
                                alert('Please select a valid image file.');
                                input.value = '';
                                return false;
                            }

                            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                                logError('File too large', {
                                    fileName: file.name,
                                    size: file.size
                                });
                                alert('File is too large. Please select an image smaller than 5MB.');
                                input.value = '';
                                return false;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                try {
                                    const previewItem = document.createElement('div');
                                    previewItem.className = 'preview-item';
                                    previewItem.innerHTML = `
                                <img src="${e.target.result}" class="image-preview" alt="Preview">
                                <button type="button" class="remove-preview" onclick="removeSinglePreview(this, '${input.id}')">×</button>
                            `;
                                    previewContainer.appendChild(previewItem);
                                    //logInfo('Single image preview created successfully', { fileName: file.name });
                                } catch (error) {
                                    logError('Error creating single image preview', error);
                                }
                            };

                            reader.onerror = function(error) {
                                logError(`Error reading file: ${file.name}`, error);
                                alert(`Error reading file: ${file.name}`);
                            };

                            reader.readAsDataURL(file);
                        } else {
                            //logInfo('No file selected for single image preview');
                        }

                        return true;
                    }, 'previewSingleImage');
                }

                function removePreview(button, inputId, index) {
                    return safeExecute(() => {
                        //logInfo('Removing image preview', { inputId, index });

                        const input = document.getElementById(inputId);
                        if (!input) {
                            logError(`Input element not found: ${inputId}`);
                            return false;
                        }

                        const dt = new DataTransfer();
                        const files = Array.from(input.files);

                        files.forEach((file, i) => {
                            if (i !== index) {
                                dt.items.add(file);
                            }
                        });

                        input.files = dt.files;
                        button.parentElement.remove();

                        //logInfo('Image preview removed successfully', { remainingFiles: input.files.length });
                        showToast('Image removed', 'info');
                        return true;
                    }, 'removePreview');
                }

                function removeSinglePreview(button, inputId) {
                    return safeExecute(() => {
                        //logInfo('Removing single image preview', { inputId });

                        const input = document.getElementById(inputId);
                        if (!input) {
                            logError(`Input element not found: ${inputId}`);
                            return false;
                        }

                        input.value = '';
                        button.parentElement.remove();

                        //logInfo('Single image preview removed successfully');
                        showToast('Image removed', 'info');
                        return true;
                    }, 'removeSinglePreview');
                }

                // Enhanced dynamic field addition functions
                function addField(containerId, fieldName, placeholder, isTextarea = false) {
                    return safeExecute(() => {
                        //logInfo('Adding dynamic field', { containerId, fieldName, placeholder, isTextarea });

                        const container = document.getElementById(containerId);
                        if (!container) {
                            logError(`Container not found: ${containerId}`);
                            alert(`Error: Container ${containerId} not found. Please refresh the page.`);
                            return false;
                        }

                        const div = document.createElement('div');
                        div.className = 'hitesh-distributor-array-input';

                        const inputElement = isTextarea ? 'textarea' : 'input';
                        const inputType = isTextarea ? '' : 'type="text"';

                        div.innerHTML = `
                    <${inputElement} ${inputType} name="${fieldName}[]" class="hitesh-distributor-${isTextarea ? 'textarea' : 'input'}" placeholder="${placeholder}" style="display: inline-block; width: calc(100% - 70px); margin-right: 10px;"></${inputElement}>
                    <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
                `;
                        container.appendChild(div);

                        // Focus on the new field
                        const newInput = div.querySelector(inputElement);
                        if (newInput) {
                            newInput.focus();
                        }

                        //logInfo('Dynamic field added successfully');
                        showToast(`${placeholder} field added`, 'success');
                        return true;
                    }, 'addField');
                }

                function addOwnerName() {
                    return addField('ownerNames', 'ownerName', 'Owner Name');
                }

                function addCoverageArea() {
                    return addField('coverageAreas', 'coverageArea', 'Coverage Area');
                }

                function addCoverageAreaDescription() {
                    return addField('coverageAreaDescriptions', 'coverageAreaDescription', 'Description', true);
                }

                function addVehicleType() {
                    return addField('typeOfVehicles', 'typeOfVehicles', 'Vehicle Type');
                }

                function addChannel() {
                    return addField('channelsOfOperation', 'channelsOfOperation', 'Channel');
                }

                function addOperationType() {
                    return addField('typesOfOperation', 'typesOfOperation', 'Operation Type');
                }

                function addBusinessOperation() {
                    return addField('businessOperations', 'businessOperations', 'Business Operation');
                }

                function removeField(button) {
                    return safeExecute(() => {
                        //logInfo('Removing dynamic field');

                        if (!button || !button.parentElement) {
                            logError('Invalid button or parent element for field removal');
                            return false;
                        }

                        const fieldValue = button.parentElement.querySelector('input, textarea')?.value;
                        button.parentElement.remove();

                        //logInfo('Dynamic field removed successfully', { fieldValue: fieldValue?.substring(0, 20) });
                        showToast('Field removed', 'info');
                        return true;
                    }, 'removeField');
                }

                // Enhanced toast notification function
                function showToast(message, type = 'success') {
                    return safeExecute(() => {
                        //logInfo('Showing toast notification', { message, type });

                        // Remove existing toasts
                        try {
                            document.querySelectorAll('.toast').forEach(toast => toast.remove());
                        } catch (error) {
                            logError('Error removing existing toasts', error);
                        }

                        const toast = document.createElement('div');
                        toast.className = `toast toast-${type}`;
                        toast.textContent = message;

                        // Add some basic styling if not already defined
                        if (!document.querySelector('style[data-toast-styles]')) {
                            const style = document.createElement('style');
                            style.setAttribute('data-toast-styles', 'true');
                            style.textContent = `
                        .toast {
                            position: fixed; top: 20px; right: 20px; z-index: 10000;
                            padding: 12px 20px; border-radius: 4px; color: white;
                            font-family: Arial, sans-serif; font-size: 14px;
                            transition: opacity 0.3s ease;
                        }
                        .toast-success { background-color: #10b981; }
                        .toast-error { background-color: #ef4444; }
                        .toast-warning { background-color: #f59e0b; }
                        .toast-info { background-color: #3b82f6; }
                    `;
                            document.head.appendChild(style);
                        }

                        document.body.appendChild(toast);

                        // Auto remove after 5 seconds
                        setTimeout(() => {
                            if (toast.parentNode) {
                                toast.style.opacity = '0';
                                setTimeout(() => {
                                    if (toast.parentNode) {
                                        toast.remove();
                                        //logInfo('Toast notification removed');
                                    }
                                }, 300);
                            }
                        }, 5000);

                        return true;
                    }, 'showToast');
                }

                // Form submission with enhanced error handling
                async function submitForm() {
                    //logInfo('Starting form submission');

                    if (isLoading) {
                        logWarning('Form submission already in progress');
                        showToast('Form submission in progress, please wait...', 'warning');
                        return false;
                    }

                    try {
                        isLoading = true;
                        showToast('Submitting form...', 'info');

                        // Collect all form data
                        const formData = new FormData();

                        // Add type field as 'distributor'
                        formData.append('type', 'Distributor');
                        console.log('✅ Added type: "distributor" to form data');

                        // Step 1 data
                        const step1Fields = [
                            "distributorEntityName", "constitutionEntity", "address", "city", "state", "pincode", "location", "gstNo", "panNo", "FSSAINo", "phoneNo", "alternatePhoneNo", "email", "associatedCompany", "startingYear", "numberOfCustomers", "godownArea", "noOfEmployees", "noOfVehicles", "monthlyTurnOver", "website", "noOfRetailerOutlets", "customerFacilitiesProvided", "associationRegisteredAs", "nameOfHead", "numberOfHead", "nameOfExecutiveHead", "numberOfExecutiveHead", "memberOfAssociation", "noOfAssociation", "isERPUsed", "distributorAssociationName", "typeOfBusinessAssociation", "noOfMember", "type", "Password"

                        ];
                        step1Fields.forEach(fieldName => {
                            const field = document.getElementById(fieldName);
                            if (field) {
                                const value = field.value;
                                console.log(`${fieldName}: "${value}"`);

                                if (value.trim()) {
                                    formData.append(fieldName, value.trim());
                                    console.log(`✅ Added ${fieldName} to form data`);
                                } else {
                                    console.log(`⚠️ Skipped ${fieldName} - empty or whitespace only`);
                                }
                            } else {
                                console.log(`❌ ${fieldName} not found in DOM`);
                            }
                        });


                        // Step 2 dynamic arrays
                        const arrayFields = [{
                                container: 'ownerNames',
                                name: 'ownerName'
                            },
                            {
                                container: 'coverageAreas',
                                name: 'coverageArea'
                            },
                            {
                                container: 'coverageAreaDescriptions',
                                name: 'coverageAreaDescription'
                            },
                            {
                                container: 'typeOfVehicles',
                                name: 'typeOfVehicles'
                            },
                            {
                                container: 'channelsOfOperation',
                                name: 'channelsOfOperation'
                            },
                            {
                                container: 'typesOfOperation',
                                name: 'typesOfOperation'
                            },
                            {
                                container: 'businessOperations',
                                name: 'businessOperations'
                            }
                        ];

                        arrayFields.forEach(({
                            container,
                            name
                        }) => {
                            const containerEl = document.getElementById(container);
                            if (containerEl) {
                                const inputs = containerEl.querySelectorAll('input, textarea');
                                inputs.forEach(input => {
                                    if (input.value.trim()) {
                                        // Append each value directly instead of JSON.stringify
                                        formData.append(`${name}[]`, input.value.trim());
                                    }
                                });
                                console.log(`Added ${name} values to form data`);
                            }
                        });

                        // File uploads
                        const fileFields = [
                            'officeAndGodownImage', 'gstImage', 'fssaiImage', 'partner1Image',
                            'partner2Image', 'anyOtherDocImage'
                        ];

                        fileFields.forEach(fieldName => {
                            const fileInput = document.getElementById(fieldName);
                            if (fileInput && fileInput.files) {
                                if (fileInput.multiple) {
                                    // Multiple files
                                    Array.from(fileInput.files).forEach((file, index) => {
                                        formData.append(`${fieldName}[${index}]`, file);
                                    });
                                    //logInfo(`Added ${fileInput.files.length} files for ${fieldName}`);
                                } else {
                                    // Single file
                                    if (fileInput.files[0]) {
                                        formData.append(fieldName, fileInput.files[0]);
                                        //logInfo(`Added single file for ${fieldName}`);
                                    }
                                }
                            }
                        });

                        // Log total form data size
                        let totalSize = 0;
                        for (let pair of formData.entries()) {
                            if (pair[1] instanceof File) {
                                totalSize += pair[1].size;
                            }
                        }
                        //logInfo(`Total form data size: ${(totalSize / 1024 / 1024).toFixed(2)} MB`);

                        // Submit to API
                        //logInfo('Sending POST request to API');
                        const response = await fetch('https://api.sampoornmarketing.com/api/v1/create_distributor', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                // Don't set Content-Type header - let browser set it with boundary for FormData
                            }
                        });

                        logInfo('API response received', {
                            status: response.status,
                            statusText: response.statusText,
                            ok: response.ok
                        });

                        if (!response.ok) {
                            const errorText = await response.text();
                            logError('API returned error response', {
                                status: response.status,
                                statusText: response.statusText,
                                error: errorText
                            });
                            throw new Error(`Server error: ${response.status} - ${response.statusText}`);
                        }

                        const result = await response.json();
                        //logInfo('Form submission successful', result);

                        showToast('Distributor created successfully!', 'success');

                        // Optional: Reset form or redirect
                        // if (confirm('Distributor created successfully! Would you like to create another distributor?')) {
                        //     // Reset form
                        //     document.querySelectorAll('input, textarea, select').forEach(input => {
                        //         if (input.type !== 'button' && input.type !== 'submit') {
                        //             input.value = '';
                        //             input.classList.remove('error-field', 'success-field');
                        //         }
                        //     });
                        //     document.querySelectorAll('.preview-item').forEach(item => item.remove());
                        //     currentStep = 1;
                        //     updateStepDisplay();
                        //     //logInfo('Form reset for new entry');
                        // } else {
                        //     // Could redirect to dashboard or show success page
                        //     //logInfo('User chose not to create another distributor');
                        // }

                        return result;

                    } catch (error) {
                        logError('Form submission failed', error);

                        if (error.name === 'TypeError' && error.message.includes('fetch')) {
                            showToast('Network error: Please check your internet connection and server status', 'error');
                            // alert('Network Error: Unable to connect to the server. Please check:\n\n1. Your internet connection\n2. Server is running on localhost:5001\n3. CORS is properly configured on the server');
                        } else if (error.message.includes('Server error')) {
                            showToast('Server error: Please try again later', 'error');
                            alert(`Server Error: ${error.message}\n\nPlease check the server logs for more details.`);
                        } else {
                            showToast('Submission failed: Please try again', 'error');
                            alert(`Submission Error: ${error.message}\n\nPlease check the console for more details.`);
                        }

                        return false;
                    } finally {
                        isLoading = false;
                        //logInfo('Form submission process completed');
                    }
                }

                // Initialize the form when DOM is loaded
                document.addEventListener('DOMContentLoaded', function() {
                    //logInfo('DOM loaded, initializing form');

                    try {
                        updateStepDisplay();
                        //logInfo('Form initialized successfully');
                        showToast('Form loaded successfully', 'success');
                    } catch (error) {
                        logError('Error initializing form', error);
                        alert('Error initializing form. Please refresh the page.');
                    }
                });

                // Global error handler
                window.addEventListener('error', function(event) {
                    logError('Global error caught', {
                        message: event.message,
                        filename: event.filename,
                        lineno: event.lineno,
                        colno: event.colno,
                        error: event.error
                    });
                    showToast('An unexpected error occurred. Please check the console for details.', 'error');
                });

                // Unhandled promise rejection handler
                window.addEventListener('unhandledrejection', function(event) {
                    logError('Unhandled promise rejection', event.reason);
                    showToast('An unexpected error occurred. Please try again.', 'error');
                });

                //logInfo('Distributor form script loaded successfully');
            </script>


        </div>
    </main>
</body>

</html>