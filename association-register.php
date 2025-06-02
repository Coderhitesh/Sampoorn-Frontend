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
            max-width: 1200px;
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
            <div class="hitesh-association-container">
                <div class="hitesh-association-wrapper">
                    <form id="associationForm" class="hitesh-association-form">
                        <!-- Step 1: Association Form -->
                        <div id="step1" class="hitesh-association-step-container">
                            <h2 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 24px;">Association Information</h2>

                            <div class="hitesh-association-grid">
                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="distributorEntityName">Distributor Entity Name *</label>
                                    <input type="text" id="distributorEntityName" name="distributorEntityName" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="distributorAssociationName">Distributor Association Name *</label>
                                    <input type="text" id="distributorAssociationName" name="distributorAssociationName" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="email">Email *</label>
                                    <input type="email" id="email" name="email" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="phoneNo">Phone Number *</label>
                                    <input type="tel" id="phoneNo" name="phoneNo" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="website">Website</label>
                                    <input type="url" id="website" name="website" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="city">City *</label>
                                    <input type="text" id="city" name="city" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="state">State *</label>
                                    <input type="text" id="state" name="state" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="pincode">Pincode *</label>
                                    <input type="text" id="pincode" name="pincode" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="location">Location</label>
                                    <input type="text" id="location" name="location" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="nameOfHead">Name of Head of the organization (President / Chairman) *</label>
                                    <input type="text" id="nameOfHead" name="nameOfHead" class="hitesh-association-input" required>
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="numberOfHead">Mobile Number of the Head (preferably Whatsapp)</label>
                                    <input type="text" id="numberOfHead" name="numberOfHead" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="nameOfExecutiveHead">Name of Executive Head of the organization (General Secretary)</label>
                                    <input type="text" id="nameOfExecutiveHead" name="nameOfExecutiveHead" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="numberOfExecutiveHead">Mobile Number of the Executive Head (preferably Whatsapp)</label>
                                    <input type="text" id="numberOfExecutiveHead" name="numberOfExecutiveHead" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="noOfMember">Total numeric strength of the organization (number of members)</label>
                                    <input type="number" id="noOfMember" name="noOfMember" class="hitesh-association-input">
                                </div>

                                <div class="hitesh-association-form-group">
                                    <label class="hitesh-association-label" for="Password">Password *</label>
                                    <input type="password" id="Password" name="Password" class="hitesh-association-input" required>
                                </div>
                            </div>

                            <div class="hitesh-association-form-group">
                                <label class="hitesh-association-label" for="address">Address *</label>
                                <textarea id="address" name="address" class="hitesh-association-textarea" required></textarea>
                            </div>

                            <div class="hitesh-association-form-group">
                                <label class="hitesh-association-label">Association Registered As</label>
                                <div class="hitesh-association-checkbox-group">
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="registered_company" name="associationRegisteredAs" value="Company" class="hitesh-association-checkbox">
                                        <label for="registered_company" class="hitesh-association-checkbox-label">Company</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="registered_partnership" name="associationRegisteredAs" value="Partnership" class="hitesh-association-checkbox">
                                        <label for="registered_partnership" class="hitesh-association-checkbox-label">Partnership</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="registered_trust" name="associationRegisteredAs" value="Trust" class="hitesh-association-checkbox">
                                        <label for="registered_trust" class="hitesh-association-checkbox-label">Trust</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="registered_society" name="associationRegisteredAs" value="Society" class="hitesh-association-checkbox">
                                        <label for="registered_society" class="hitesh-association-checkbox-label">Society</label>
                                    </div>
                                </div>
                            </div>

                            <div class="hitesh-association-form-group">
                                <label class="hitesh-association-label">Member of Association</label>
                                <div class="hitesh-association-checkbox-group">
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="member_distributor" name="memberOfAssociation" value="Distributor" class="hitesh-association-checkbox">
                                        <label for="member_distributor" class="hitesh-association-checkbox-label">Distributor</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="member_retailer" name="memberOfAssociation" value="Retailer" class="hitesh-association-checkbox">
                                        <label for="member_retailer" class="hitesh-association-checkbox-label">Retailer</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="member_wholesaler" name="memberOfAssociation" value="Wholesaler" class="hitesh-association-checkbox">
                                        <label for="member_wholesaler" class="hitesh-association-checkbox-label">Wholesaler</label>
                                    </div>
                                </div>
                            </div>

                            <div class="hitesh-association-form-group">
                                <label class="hitesh-association-label">Type of Business Association</label>
                                <div class="hitesh-association-checkbox-group">
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="business_regional" name="typeOfBusinessAssociation" value="Regional" class="hitesh-association-checkbox">
                                        <label for="business_regional" class="hitesh-association-checkbox-label">Regional</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="business_national" name="typeOfBusinessAssociation" value="National" class="hitesh-association-checkbox">
                                        <label for="business_national" class="hitesh-association-checkbox-label">National</label>
                                    </div>
                                    <div class="hitesh-association-checkbox-item">
                                        <input type="checkbox" id="business_state" name="typeOfBusinessAssociation" value="State" class="hitesh-association-checkbox">
                                        <label for="business_state" class="hitesh-association-checkbox-label">State</label>
                                    </div>
                                </div>
                            </div>

                            <div class="hitesh-association-button-group">
                                <div></div>
                                <button type="button" onclick="(e)=>{handleSubmit(e)}" id="nextButton" class="hitesh-association-button hitesh-association-button-primary">Next Step</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <?php include('includes/footer.php') ?>
        </div>
    </main>
    <script>
        // Association Form Validation and Submission Logic
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('associationForm');
            const submitButton = document.getElementById('nextButton');

            // Change button text to Submit
            if (submitButton) {
                submitButton.textContent = 'Submit Form';
                submitButton.type = 'submit';
            }

            // Form validation rules
            const validationRules = {
                distributorEntityName: {
                    required: true,
                    minLength: 2,
                    message: 'Distributor Entity Name is required (minimum 2 characters)'
                },
                distributorAssociationName: {
                    required: true,
                    minLength: 2,
                    message: 'Distributor Association Name is required (minimum 2 characters)'
                },
                email: {
                    required: true,
                    pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                    message: 'Please enter a valid email address'
                },
                phoneNo: {
                    required: true,
                    pattern: /^[6-9]\d{9}$/,
                    message: 'Please enter a valid 10-digit Indian phone number'
                },
                city: {
                    required: true,
                    minLength: 2,
                    message: 'City is required (minimum 2 characters)'
                },
                state: {
                    required: true,
                    minLength: 2,
                    message: 'State is required (minimum 2 characters)'
                },
                pincode: {
                    required: true,
                    pattern: /^[1-9][0-9]{5}$/,
                    message: 'Please enter a valid 6-digit pincode'
                },
                nameOfHead: {
                    required: true,
                    minLength: 2,
                    message: 'Name of Head is required (minimum 2 characters)'
                },
                address: {
                    required: true,
                    minLength: 10,
                    message: 'Address is required (minimum 10 characters)'
                },
                Password: {
                    required: true,
                    minLength: 6,
                    message: 'Password is required (minimum 6 characters)'
                },
                website: {
                    required: false,
                    pattern: /^https?:\/\/.+/,
                    message: 'Please enter a valid website URL (starting with http:// or https://)'
                }
            };

            // Validation function for individual fields
            function validateField(fieldName, value) {
                const rule = validationRules[fieldName];
                if (!rule) return {
                    isValid: true
                };

                // Check required fields
                if (rule.required && (!value || value.trim() === '')) {
                    return {
                        isValid: false,
                        message: rule.message
                    };
                }

                // Skip other validations if field is empty and not required
                if (!rule.required && (!value || value.trim() === '')) {
                    return {
                        isValid: true
                    };
                }

                // Check minimum length
                if (rule.minLength && value.trim().length < rule.minLength) {
                    return {
                        isValid: false,
                        message: rule.message
                    };
                }

                // Check pattern
                if (rule.pattern && !rule.pattern.test(value.trim())) {
                    return {
                        isValid: false,
                        message: rule.message
                    };
                }

                return {
                    isValid: true
                };
            }

            // Show error message
            function showError(fieldId, message) {
                const field = document.getElementById(fieldId);
                if (!field) return;

                // Remove existing error
                const existingError = field.parentNode.querySelector('.error-message');
                if (existingError) {
                    existingError.remove();
                }

                // Add error styling
                field.style.borderColor = '#ef4444';
                field.style.backgroundColor = '#fef2f2';

                // Create error message element
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.style.cssText = 'color: #ef4444; font-size: 12px; margin-top: 4px; font-weight: 500;';
                errorDiv.textContent = message;

                // Insert error message
                field.parentNode.appendChild(errorDiv);
            }

            // Clear error message
            function clearError(fieldId) {
                const field = document.getElementById(fieldId);
                if (!field) return;

                // Remove error styling
                field.style.borderColor = '#d1d5db';
                field.style.backgroundColor = '#ffffff';

                // Remove error message
                const existingError = field.parentNode.querySelector('.error-message');
                if (existingError) {
                    existingError.remove();
                }
            }

            // Validate checkbox groups
            function validateCheckboxGroups() {
                const checkboxGroups = [{
                        name: 'associationRegisteredAs',
                        message: 'Please select at least one registration type'
                    },
                    {
                        name: 'memberOfAssociation',
                        message: 'Please select at least one member type'
                    },
                    {
                        name: 'typeOfBusinessAssociation',
                        message: 'Please select at least one business type'
                    }
                ];

                let allValid = true;

                checkboxGroups.forEach(group => {
                    const checkboxes = document.querySelectorAll(`input[name="${group.name}"]:checked`);
                    const groupContainer = document.querySelector(`input[name="${group.name}"]`).closest('.hitesh-association-form-group');

                    // Remove existing error
                    const existingError = groupContainer.querySelector('.checkbox-error-message');
                    if (existingError) {
                        existingError.remove();
                    }

                    if (checkboxes.length === 0) {
                        allValid = false;

                        // Add error message
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'checkbox-error-message';
                        errorDiv.style.cssText = 'color: #ef4444; font-size: 12px; margin-top: 4px; font-weight: 500;';
                        errorDiv.textContent = group.message;
                        groupContainer.appendChild(errorDiv);
                    }
                });

                return allValid;
            }

            // Real-time validation on input
            Object.keys(validationRules).forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field) {
                    field.addEventListener('blur', function() {
                        const validation = validateField(fieldName, this.value);
                        if (validation.isValid) {
                            clearError(fieldName);
                        } else {
                            showError(fieldName, validation.message);
                        }
                    });

                    field.addEventListener('input', function() {
                        // Clear error on input
                        const existingError = this.parentNode.querySelector('.error-message');
                        if (existingError) {
                            clearError(fieldName);
                        }
                    });
                }
            });

            // Collect checkbox values
            function getCheckboxValues(name) {
                const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
                return Array.from(checkboxes).map(cb => cb.value);
            }

            // Form submission handler
            async function handleSubmit(event) {
                event.preventDefault();

                console.log('🚀 Form submission started...');

                // Show loading state
                submitButton.disabled = true;
                submitButton.textContent = 'Submitting...';

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

                    // Validate checkbox groups
                    if (!validateCheckboxGroups()) {
                        isFormValid = false;
                        errors.push('Please complete all required checkbox selections');
                    }

                    if (!isFormValid) {
                        console.error('❌ Form validation failed:', errors);
                        alert('Please fix the following errors:\n' + errors.join('\n'));
                        return;
                    }

                    console.log('✅ Form validation passed');

                    // Create FormData
                    const formData = new FormData();

                    // All possible fields from your API
                    const fields = [
                        "distributorEntityName", "constitutionEntity", "address", "city", "state",
                        "pincode", "location", "gstNo", "panNo", "FSSAINo", "phoneNo",
                        "alternatePhoneNo", "email", "associatedCompany", "startingYear",
                        "numberOfCustomers", "godownArea", "noOfEmployees", "noOfVehicles",
                        "monthlyTurnOver", "website", "noOfRetailerOutlets", "customerFacilitiesProvided",
                        "associationRegisteredAs", "nameOfHead", "numberOfHead", "nameOfExecutiveHead",
                        "numberOfExecutiveHead", "memberOfAssociation", "noOfAssociation", "isERPUsed",
                        "distributorAssociationName", "typeOfBusinessAssociation", "noOfMember",
                        "type", "Password", "registerType"
                    ];

                    console.log('📝 Processing form fields...');

                    // Process all form fields
                    fields.forEach(fieldName => {
                        const field = document.getElementById(fieldName);
                        if (field) {
                            let value = '';

                            // Handle checkbox separately
                            if (field.type === 'checkbox') {
                                value = field.checked ? field.value : '';
                            } else {
                                value = field.value || '';
                            }

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

                    // Handle checkbox groups separately
                    const checkboxGroups = ['associationRegisteredAs', 'memberOfAssociation', 'typeOfBusinessAssociation'];

                    checkboxGroups.forEach(groupName => {
                        const selectedValues = getCheckboxValues(groupName);
                        if (selectedValues.length > 0) {
                            // Send as comma-separated string
                            formData.append(groupName, selectedValues.join(','));
                            console.log(`✅ Added ${groupName}: ${selectedValues.join(',')}`);
                        }
                    });

                    // Set type and registerType to "Association"
                    formData.set('type', 'Association');
                    formData.set('alternatePhoneNo', '9079036042');
                    formData.set('registerType', 'Association');
                    console.log('✅ Set type and registerType to "Association"');

                    console.log('🌐 Sending request to API...');

                    // Send to API
                    const response = await fetch('https://api.sampoornmarketing.com/api/v1/create_distributor', {
                        method: 'POST',
                        body: formData,
                        // Don't set Content-Type header - let browser set it with boundary for FormData
                    });

                    console.log(`📡 Response status: ${response.status}`);

                    if (response.ok) {
                        const result = await response.json();
                        console.log('✅ Success response:', result);

                        alert('Association registration submitted successfully!');

                        // Reset form
                        form.reset();

                        // Clear all error messages
                        document.querySelectorAll('.error-message, .checkbox-error-message').forEach(error => {
                            error.remove();
                        });

                        // Reset field styles
                        document.querySelectorAll('.hitesh-association-input, .hitesh-association-textarea').forEach(field => {
                            field.style.borderColor = '#d1d5db';
                            field.style.backgroundColor = '#ffffff';
                        });

                    } else {
                        const errorData = await response.json().catch(() => ({}));
                        console.error('❌ Server error:', response.status, errorData);

                        alert(`Submission failed: ${errorData.message || 'Server error occurred'}`);
                    }

                } catch (error) {
                    console.error('❌ Network/Request error:', error);
                    alert('Network error occurred. Please check your connection and try again.');
                } finally {
                    // Reset button state
                    submitButton.disabled = false;
                    submitButton.textContent = 'Submit Form';
                    console.log('🏁 Form submission completed');
                }
            }
            // Attach submit handler
            if (form) {
                form.addEventListener('submit', handleSubmit);
            }


            console.log('🎯 Association form script initialized successfully');
        });
    </script>