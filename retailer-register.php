<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <style>
        .hitesh-retailer-container {
            background: linear-gradient(to bottom right, #f9fafb, #f3f4f6);
            min-height: 100vh;
            padding: 60px 20px;
            font-family: 'Poppins', sans-serif;
        }

        .hitesh-retailer-form-wrapper {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .hitesh-retailer-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .hitesh-retailer-title {
            font-size: 32px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .hitesh-retailer-subtitle {
            font-size: 16px;
            color: #6b7280;
        }

        .hitesh-retailer-section-title {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin: 30px 0 20px;
            border-bottom: 2px solid #D70808;
            padding-bottom: 8px;
        }

        .hitesh-retailer-form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .hitesh-retailer-form-group {
            margin-bottom: 20px;
        }

        .hitesh-retailer-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .hitesh-retailer-input,
        .hitesh-retailer-select,
        .hitesh-retailer-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background-color: #ffffff;
        }

        .hitesh-retailer-input:focus,
        .hitesh-retailer-select:focus,
        .hitesh-retailer-textarea:focus {
            outline: none;
            border-color: #D70808;
            box-shadow: 0 0 0 3px rgba(215, 8, 8, 0.1);
        }

        .hitesh-retailer-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .hitesh-retailer-dynamic-list {
            background: #f9fafb;
            border-radius: 8px;
            padding: 16px;
        }

        .hitesh-retailer-list-item {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }

        .hitesh-retailer-list-item:last-child {
            margin-bottom: 0;
        }

        .hitesh-retailer-list-input {
            flex: 1;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .hitesh-retailer-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .hitesh-retailer-btn-small {
            padding: 6px 12px;
            font-size: 12px;
        }

        .hitesh-retailer-btn-add {
            background-color: #10b981;
            color: white;
        }

        .hitesh-retailer-btn-add:hover {
            background-color: #059669;
        }

        .hitesh-retailer-btn-remove {
            background-color: #ef4444;
            color: white;
        }

        .hitesh-retailer-btn-remove:hover {
            background-color: #dc2626;
        }

        .hitesh-retailer-btn-primary {
            background-color: #D70808;
            color: white;
            padding: 14px 32px;
            font-size: 16px;
            border-radius: 8px;
        }

        .hitesh-retailer-btn-primary:hover {
            background-color: #b91c1c;
        }

        .hitesh-retailer-btn-primary:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        .field-error {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
        }

        .field-success {
            border-color: #10b981 !important;
            background-color: #f0fdf4 !important;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #D70808;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .success-message {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        .error-alert {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>

<body class="v-light dsn-ajax">
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

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
            <div class="hitesh-retailer-container">
                <div class="hitesh-retailer-form-wrapper">
                    <div class="hitesh-retailer-header">
                        <h1 class="hitesh-retailer-title">Retailer Registration Form</h1>
                        <p class="hitesh-retailer-subtitle">Complete your registration details</p>
                    </div>

                    <div class="success-message" id="successMessage">
                        Registration submitted successfully! We will contact you soon.
                    </div>

                    <div class="error-alert" id="errorAlert">
                        <span id="errorText"></span>
                    </div>

                    <form id="retailerForm">
                        <!-- Basic Information -->
                        <h2 class="hitesh-retailer-section-title">Basic Information</h2>

                        <div class="hitesh-retailer-form-grid">
                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Distributor Entity Name *</label>
                                <input type="text" id="distributorEntityName" name="distributorEntityName" class="hitesh-retailer-input" required>
                                <span class="error-message" id="distributorEntityName-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Constitution Entity *</label>
                                <select id="constitutionEntity" name="constitutionEntity" class="hitesh-retailer-select" required>
                                    <option value="">Select Constitution</option>
                                    <option value="proprietorship">Proprietorship</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="company">Company</option>
                                    <option value="llp">LLP</option>
                                </select>
                                <span class="error-message" id="constitutionEntity-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Address *</label>
                                <textarea id="address" name="address" class="hitesh-retailer-textarea" required></textarea>
                                <span class="error-message" id="address-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">City *</label>
                                <input type="text" id="city" name="city" class="hitesh-retailer-input" required>
                                <span class="error-message" id="city-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">State *</label>
                                <input type="text" id="state" name="state" class="hitesh-retailer-input" required>
                                <span class="error-message" id="state-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Pincode *</label>
                                <input type="text" id="pincode" name="pincode" class="hitesh-retailer-input" pattern="[0-9]{6}" required>
                                <span class="error-message" id="pincode-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Location</label>
                                <input type="text" id="location" name="location" class="hitesh-retailer-input">
                                <span class="error-message" id="location-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">GST Number *</label>
                                <input type="text" id="gstNo" name="gstNo" class="hitesh-retailer-input" required>
                                <span class="error-message" id="gstNo-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">PAN Number *</label>
                                <input type="text" id="panNo" name="panNo" class="hitesh-retailer-input" required>
                                <span class="error-message" id="panNo-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">FSSAI Number</label>
                                <input type="text" id="FSSAINo" name="FSSAINo" class="hitesh-retailer-input">
                                <span class="error-message" id="FSSAINo-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Phone Number *</label>
                                <input type="tel" id="phoneNo" name="phoneNo" class="hitesh-retailer-input" required>
                                <span class="error-message" id="phoneNo-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Alternate Phone Number</label>
                                <input type="tel" id="alternatePhoneNo" name="alternatePhoneNo" class="hitesh-retailer-input">
                                <span class="error-message" id="alternatePhoneNo-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Email *</label>
                                <input type="email" id="email" name="email" class="hitesh-retailer-input" required>
                                <span class="error-message" id="email-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Website</label>
                                <input type="url" id="website" name="website" class="hitesh-retailer-input">
                                <span class="error-message" id="website-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Starting Year *</label>
                                <input type="number" id="startingYear" name="startingYear" class="hitesh-retailer-input" min="1900" max="2024" required>
                                <span class="error-message" id="startingYear-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Password *</label>
                                <input type="password" id="Password" name="Password" class="hitesh-retailer-input" required>
                                <span class="error-message" id="Password-error"></span>
                            </div>
                        </div>

                        <!-- Owner Names -->
                        <h2 class="hitesh-retailer-section-title">Owner Information</h2>
                        <div class="hitesh-retailer-form-group">
                            <label class="hitesh-retailer-label">Owner Names *</label>
                            <div id="ownerNamesList" class="hitesh-retailer-dynamic-list">
                                <div class="hitesh-retailer-list-item">
                                    <input type="text" class="hitesh-retailer-list-input owner-name" placeholder="Owner Name" required>
                                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addOwnerName()">Add</button>
                                </div>
                            </div>
                            <span class="error-message" id="ownerNames-error"></span>
                        </div>

                        <!-- Business Details -->
                        <h2 class="hitesh-retailer-section-title">Business Details</h2>

                        <div class="hitesh-retailer-form-grid">
                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Number of Customers</label>
                                <input type="number" id="numberOfCustomers" name="numberOfCustomers" class="hitesh-retailer-input">
                                <span class="error-message" id="numberOfCustomers-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Godown Area (sq ft)</label>
                                <input type="number" id="godownArea" name="godownArea" class="hitesh-retailer-input">
                                <span class="error-message" id="godownArea-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Number of Retailer Outlets</label>
                                <input type="number" id="noOfRetailerOutlets" name="noOfRetailerOutlets" class="hitesh-retailer-input">
                                <span class="error-message" id="noOfRetailerOutlets-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Number of Employees</label>
                                <input type="number" id="noOfEmployees" name="noOfEmployees" class="hitesh-retailer-input">
                                <span class="error-message" id="noOfEmployees-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Monthly Turnover</label>
                                <input type="number" id="monthlyTurnOver" name="monthlyTurnOver" class="hitesh-retailer-input">
                                <span class="error-message" id="monthlyTurnOver-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Is ERP Used?</label>
                                <select id="isERPUsed" name="isERPUsed" class="hitesh-retailer-select">
                                    <option value="">Select Option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span class="error-message" id="isERPUsed-error"></span>
                            </div>

                            <div class="hitesh-retailer-form-group">
                                <label class="hitesh-retailer-label">Distributor Association Name</label>
                                <input type="text" id="distributorAssociationName" name="distributorAssociationName" class="hitesh-retailer-input">
                                <span class="error-message" id="distributorAssociationName-error"></span>
                            </div>
                        </div>

                        <!-- Customer Facilities -->
                        <div class="hitesh-retailer-form-group">
                            <label class="hitesh-retailer-label">Customer Facilities Provided *</label>
                            <div id="customerFacilitiesList" class="hitesh-retailer-dynamic-list">
                                <div class="hitesh-retailer-list-item">
                                    <input type="text" class="hitesh-retailer-list-input customer-facility" placeholder="Facility" required>
                                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addCustomerFacility()">Add</button>
                                </div>
                            </div>
                            <span class="error-message" id="customerFacilities-error"></span>
                        </div>

                        <!-- Business Operations -->
                        <div class="hitesh-retailer-form-group">
                            <label class="hitesh-retailer-label">Business Operations *</label>
                            <div id="businessOperationsList" class="hitesh-retailer-dynamic-list">
                                <div class="hitesh-retailer-list-item">
                                    <input type="text" class="hitesh-retailer-list-input business-operation" placeholder="Operation" required>
                                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addBusinessOperation()">Add</button>
                                </div>
                            </div>
                            <span class="error-message" id="businessOperations-error"></span>
                        </div>

                        <div style="text-align: center; margin-top: 32px;">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-primary" id="submitRetailerBtn" onclick="handleSubmit()">
                                Submit Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                // Validation rules
                const validationRules = {
                    distributorEntityName: {
                        required: true,
                        minLength: 2
                    },
                    constitutionEntity: {
                        required: true
                    },
                    address: {
                        required: true,
                        minLength: 10
                    },
                    city: {
                        required: true,
                        minLength: 2
                    },
                    state: {
                        required: true,
                        minLength: 2
                    },
                    pincode: {
                        required: true,
                        pattern: /^[0-9]{6}$/
                    },
                    gstNo: {
                        required: true,
                        minLength: 15
                    },
                    panNo: {
                        required: true,
                        pattern: /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/
                    },
                    phoneNo: {
                        required: true,
                        pattern: /^[0-9]{10}$/
                    },
                    email: {
                        required: true,
                        pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                    },
                    startingYear: {
                        required: true,
                        min: 1900,
                        max: 2024
                    },
                    Password: {
                        required: true,
                        minLength: 6
                    }
                };

                // Validate individual field
                function validateField(fieldName, value) {
                    const rules = validationRules[fieldName];
                    if (!rules) return {
                        isValid: true
                    };

                    if (rules.required && (!value || value.trim() === '')) {
                        return {
                            isValid: false,
                            message: 'This field is required'
                        };
                    }

                    if (value && rules.minLength && value.length < rules.minLength) {
                        return {
                            isValid: false,
                            message: `Minimum ${rules.minLength} characters required`
                        };
                    }

                    if (value && rules.pattern && !rules.pattern.test(value)) {
                        if (fieldName === 'pincode') return {
                            isValid: false,
                            message: 'Please enter a valid 6-digit pincode'
                        };
                        if (fieldName === 'panNo') return {
                            isValid: false,
                            message: 'Please enter a valid PAN number (e.g., ABCDE1234F)'
                        };
                        if (fieldName === 'phoneNo') return {
                            isValid: false,
                            message: 'Please enter a valid 10-digit phone number'
                        };
                        if (fieldName === 'email') return {
                            isValid: false,
                            message: 'Please enter a valid email address'
                        };
                        return {
                            isValid: false,
                            message: 'Invalid format'
                        };
                    }

                    if (value && rules.min && parseInt(value) < rules.min) {
                        return {
                            isValid: false,
                            message: `Minimum value is ${rules.min}`
                        };
                    }

                    if (value && rules.max && parseInt(value) > rules.max) {
                        return {
                            isValid: false,
                            message: `Maximum value is ${rules.max}`
                        };
                    }

                    return {
                        isValid: true
                    };
                }

                // Show error message
                function showError(fieldName, message) {
                    const field = document.getElementById(fieldName);
                    const errorSpan = document.getElementById(`${fieldName}-error`);

                    if (field) {
                        field.classList.add('field-error');
                        field.classList.remove('field-success');
                    }

                    if (errorSpan) {
                        errorSpan.textContent = message;
                        errorSpan.style.display = 'block';
                    }
                }

                // Clear error message
                function clearError(fieldName) {
                    const field = document.getElementById(fieldName);
                    const errorSpan = document.getElementById(`${fieldName}-error`);

                    if (field) {
                        field.classList.remove('field-error');
                        field.classList.add('field-success');
                    }

                    if (errorSpan) {
                        errorSpan.textContent = '';
                        errorSpan.style.display = 'none';
                    }
                }

                // Validate dynamic lists
                function validateDynamicList(containerSelector, fieldName, displayName) {
                    const container = document.querySelector(containerSelector);
                    const inputs = container.querySelectorAll('.hitesh-retailer-list-input');
                    const hasValues = Array.from(inputs).some(input => input.value.trim() !== '');

                    if (!hasValues) {
                        const errorSpan = document.getElementById(`${fieldName}-error`);
                        if (errorSpan) {
                            errorSpan.textContent = `At least one ${displayName} is required`;
                            errorSpan.style.display = 'block';
                        }
                        return false;
                    } else {
                        const errorSpan = document.getElementById(`${fieldName}-error`);
                        if (errorSpan) {
                            errorSpan.textContent = '';
                            errorSpan.style.display = 'none';
                        }
                        return true;
                    }
                }

                // Get values from dynamic lists
                function getDynamicListValues(containerSelector) {
                    const container = document.querySelector(containerSelector);
                    const inputs = container.querySelectorAll('.hitesh-retailer-list-input');
                    return Array.from(inputs)
                        .map(input => input.value.trim())
                        .filter(value => value !== '');
                }

                // Add owner name
                function addOwnerName() {
                    const container = document.getElementById('ownerNamesList');
                    const newItem = document.createElement('div');
                    newItem.className = 'hitesh-retailer-list-item';
                    newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input owner-name" placeholder="Owner Name">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addOwnerName()">Add</button>
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeItem(this)">Remove</button>
            `;
                    container.appendChild(newItem);
                }

                // Add customer facility
                function addCustomerFacility() {
                    const container = document.getElementById('customerFacilitiesList');
                    const newItem = document.createElement('div');
                    newItem.className = 'hitesh-retailer-list-item';
                    newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input customer-facility" placeholder="Facility">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addCustomerFacility()">Add</button>
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeItem(this)">Remove</button>
            `;
                    container.appendChild(newItem);
                }

                // Add business operation
                function addBusinessOperation() {
                    const container = document.getElementById('businessOperationsList');
                    const newItem = document.createElement('div');
                    newItem.className = 'hitesh-retailer-list-item';
                    newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input business-operation" placeholder="Operation">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addBusinessOperation()">Add</button>
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeItem(this)">Remove</button>
            `;
                    container.appendChild(newItem);
                }

                // Remove item
                function removeItem(button) {
                    const item = button.parentElement;
                    const container = item.parentElement;

                    // Don't remove if it's the only item
                    if (container.children.length > 1) {
                        item.remove();
                    }
                }

                // Show loading
                function showLoading() {
                    document.getElementById('loadingOverlay').style.display = 'flex';
                }

                // Hide loading
                function hideLoading() {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }

                // Show success message
                function showSuccess(message) {
                    const successDiv = document.getElementById('successMessage');
                    successDiv.textContent = message;
                    successDiv.style.display = 'block';

                    // Hide after 5 seconds
                    setTimeout(() => {
                        successDiv.style.display = 'none';
                    }, 5000);
                }

                // Show error message
                function showErrorAlert(message) {
                    const errorDiv = document.getElementById('errorAlert');
                    const errorText = document.getElementById('errorText');
                    errorText.textContent = message;
                    errorDiv.style.display = 'block';

                    // Hide after 5 seconds
                    setTimeout(() => {
                        errorDiv.style.display = 'none';
                    }, 5000);
                }

                // Handle form submission
                async function handleSubmit() {
                    console.log('🚀 Form submission started...');

                    const submitButton = document.getElementById('submitRetailerBtn');

                    // Show loading state
                    submitButton.disabled = true;
                    submitButton.textContent = 'Submitting...';
                    showLoading();

                    try {
                        // Validate all fields
                        let isFormValid = true;
                        const errors = [];

                        // Validate individual fields
                        Object.keys(validationRules).forEach(fieldName => {
                            const field = document.getElementById(fieldName);
                            if (field) {
                                const validation = validateField(fieldName, field.value);
                                if (!validation.isValid) {
                                    isFormValid = false;
                                    errors.push(`${fieldName}: ${validation.message}`);
                                    showError(fieldName, validation.message);
                                } else {
                                    clearError(fieldName);
                                }
                            }
                        });

                        // Validate dynamic lists
                        if (!validateDynamicList('#ownerNamesList', 'ownerNames', 'owner name')) {
                            isFormValid = false;
                            errors.push('At least one owner name is required');
                        }

                        if (!validateDynamicList('#customerFacilitiesList', 'customerFacilities', 'customer facility')) {
                            isFormValid = false;
                            errors.push('At least one customer facility is required');
                        }

                        if (!validateDynamicList('#businessOperationsList', 'businessOperations', 'business operation')) {
                            isFormValid = false;
                            errors.push('At least one business operation is required');
                        }

                        if (!isFormValid) {
                            console.error('❌ Form validation failed:', errors);
                            showErrorAlert('Please fix the following errors:\n' + errors.join('\n'));
                            return;
                        }

                        console.log('✅ Form validation passed');

                        // Create FormData
                        const formData = new FormData();

                        // All possible fields from your API
                        const fields = [
                            "distributorEntityName", "constitutionEntity", "address", "city", "state",
                            "pincode", "location", "gstNo", "panNo", "FSSAINo", "phoneNo",
                            "alternatePhoneNo", "email", "website", "startingYear",
                            "numberOfCustomers", "godownArea", "noOfEmployees", "noOfRetailerOutlets",
                            "monthlyTurnOver", "isERPUsed", "distributorAssociationName", "Password"
                        ];

                        console.log('📝 Processing form fields...');

                        // Process all form fields
                        fields.forEach(fieldName => {
                            const field = document.getElementById(fieldName);
                            if (field) {
                                let value = field.value || '';

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

                        // Handle dynamic lists
                        const ownerNames = getDynamicListValues('#ownerNamesList');
                        if (ownerNames.length > 0) {
                            formData.append('ownerNames', ownerNames.join(','));
                            console.log(`✅ Added ownerNames: ${ownerNames.join(',')}`);
                        }

                        const customerFacilities = getDynamicListValues('#customerFacilitiesList');
                        if (customerFacilities.length > 0) {
                            formData.append('customerFacilitiesProvided', customerFacilities.join(','));
                            console.log(`✅ Added customerFacilitiesProvided: ${customerFacilities.join(',')}`);
                        }

                        const businessOperations = getDynamicListValues('#businessOperationsList');
                        if (businessOperations.length > 0) {
                            formData.append('businessOperations', businessOperations.join(','));
                            console.log(`✅ Added businessOperations: ${businessOperations.join(',')}`);
                        }

                        // Set type and registerType to "Retailer"
                        formData.set('type', 'Retailer');
                        formData.set('registerType', 'Retailer');
                        console.log('✅ Set type and registerType to "Retailer"');

                        console.log('🌐 Sending request to API...');

                        // Send to API
                        const response = await fetch('https://api.sampoornmarketing.com/api/v1/create_distributor', {
                            method: 'POST',
                            body: formData,
                        });

                        console.log(`📡 Response status: ${response.status}`);

                        if (response.ok) {
                            const result = await response.json();
                            console.log('✅ Success response:', result);

                            showSuccess('Retailer registration submitted successfully! We will contact you soon.');

                            // Reset form
                            document.getElementById('retailerForm').reset();

                            // Reset dynamic lists to single items
                            resetDynamicLists();

                            // Clear all error messages
                            document.querySelectorAll('.error-message').forEach(error => {
                                error.textContent = '';
                                error.style.display = 'none';
                            });

                            // Reset field styles
                            document.querySelectorAll('.hitesh-retailer-input, .hitesh-retailer-select, .hitesh-retailer-textarea').forEach(field => {
                                field.classList.remove('field-error', 'field-success');
                            });

                        } else {
                            const errorData = await response.json().catch(() => ({}));
                            console.error('❌ Server error:', response.status, errorData);

                            showErrorAlert(`Submission failed: ${errorData.message || 'Server error occurred'}`);
                        }

                    } catch (error) {
                        console.error('❌ Network/Request error:', error);
                        showErrorAlert('Network error occurred. Please check your connection and try again.');
                    } finally {
                        // Reset button state
                        submitButton.disabled = false;
                        submitButton.textContent = 'Submit Registration';
                        hideLoading();
                        console.log('🏁 Form submission completed');
                    }
                }

                // Reset dynamic lists to initial state
                function resetDynamicLists() {
                    // Reset owner names
                    const ownerContainer = document.getElementById('ownerNamesList');
                    ownerContainer.innerHTML = `
                <div class="hitesh-retailer-list-item">
                    <input type="text" class="hitesh-retailer-list-input owner-name" placeholder="Owner Name" required>
                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addOwnerName()">Add</button>
                </div>
            `;

                    // Reset customer facilities
                    const facilityContainer = document.getElementById('customerFacilitiesList');
                    facilityContainer.innerHTML = `
                <div class="hitesh-retailer-list-item">
                    <input type="text" class="hitesh-retailer-list-input customer-facility" placeholder="Facility" required>
                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addCustomerFacility()">Add</button>
                </div>
            `;

                    // Reset business operations
                    const operationContainer = document.getElementById('businessOperationsList');
                    operationContainer.innerHTML = `
                <div class="hitesh-retailer-list-item">
                    <input type="text" class="hitesh-retailer-list-input business-operation" placeholder="Operation" required>
                    <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addBusinessOperation()">Add</button>
                </div>
            `;
                }

                // Real-time validation
                document.addEventListener('DOMContentLoaded', function() {
                    // Add real-time validation to all form fields
                    Object.keys(validationRules).forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field) {
                            field.addEventListener('blur', function() {
                                const validation = validateField(fieldName, this.value);
                                if (!validation.isValid) {
                                    showError(fieldName, validation.message);
                                } else {
                                    clearError(fieldName);
                                }
                            });

                            field.addEventListener('input', function() {
                                // Clear error on input if field was previously invalid
                                if (this.classList.contains('field-error')) {
                                    const validation = validateField(fieldName, this.value);
                                    if (validation.isValid) {
                                        clearError(fieldName);
                                    }
                                }
                            });
                        }
                    });

                    // Add validation to dynamic list inputs
                    document.addEventListener('input', function(e) {
                        if (e.target.classList.contains('hitesh-retailer-list-input')) {
                            // Clear errors when user starts typing in dynamic lists
                            if (e.target.classList.contains('owner-name')) {
                                const errorSpan = document.getElementById('ownerNames-error');
                                if (errorSpan) {
                                    errorSpan.textContent = '';
                                    errorSpan.style.display = 'none';
                                }
                            }
                            if (e.target.classList.contains('customer-facility')) {
                                const errorSpan = document.getElementById('customerFacilities-error');
                                if (errorSpan) {
                                    errorSpan.textContent = '';
                                    errorSpan.style.display = 'none';
                                }
                            }
                            if (e.target.classList.contains('business-operation')) {
                                const errorSpan = document.getElementById('businessOperations-error');
                                if (errorSpan) {
                                    errorSpan.textContent = '';
                                    errorSpan.style.display = 'none';
                                }
                            }
                        }
                    });
                });
            </script>
</body>

</html>