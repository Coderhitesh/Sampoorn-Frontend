<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile - Dynamic Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .multi-select {
            height: auto !important;
            min-height: 42px;
        }

        .multi-select option:checked {
            background-color: #3b82f6;
            color: white;
        }

        .selected-tag {
            display: inline-block;
            background-color: #e5e7eb;
            padding: 4px 8px;
            margin: 2px;
            border-radius: 4px;
            font-size: 12px;
            border: 1px solid #d1d5db;
        }

        .selected-tag button {
            margin-left: 6px;
            color: #6b7280;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
        }

        .selected-tag button:hover {
            color: #ef4444;
        }

        .loader {
            border: 4px solid #f3f4f6;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hidden {
            display: none !important;
        }

        .field-container {
            margin-bottom: 1.5rem;
        }

        .multi-select-container {
            position: relative;
        }

        .selected-items {
            min-height: 20px;
            padding: 4px 0;
        }

        .form-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            border: 1px solid #e5e7eb;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #3b82f6;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 50px;
            height: 3px;
            background: #1d4ed8;
        }

        .input-field {
            transition: all 0.2s ease;
        }

        .input-field:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        }

        .submit-button {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
        }

        .submit-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .submit-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .user-type-badge {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .error-message {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .success-message {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #16a34a;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .field-error {
            border-color: #dc2626 !important;
            background-color: #fef2f2;
        }

        .field-error-text {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .retry-button {
            background-color: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            margin-top: 1rem;
        }

        .retry-button:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <main class="main-root">
        <div class="max-w-6xl mx-auto p-6">
            <!-- Loading Indicator -->
            <div id="loadingIndicator" class="text-center py-12">
                <div class="loader"></div>
                <p class="mt-6 text-gray-600 text-lg">Loading profile data...</p>
            </div>

            <!-- Error State -->
            <div id="errorState" class="hidden text-center py-12">
                <div class="text-red-500 text-6xl mb-4">⚠️</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Unable to Load Profile</h2>
                <p id="errorMessage" class="text-gray-600 mb-6"></p>
                <button onclick="initializeApp()" class="retry-button">Try Again</button>
            </div>

            <!-- Success/Error Messages -->
            <div id="messageContainer" class="hidden mb-6"></div>

            <!-- Profile Form -->
            <div id="profileForm" class="hidden">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Update Profile</h1>
                    <p class="text-gray-600 text-lg mb-6">Update your profile information based on your account type</p>
                    
                    <!-- User Type Display -->
                    <div class="inline-flex items-center user-type-badge">
                        <span class="mr-2">Account Type:</span>
                        <span id="userTypeText" class="font-bold"></span>
                    </div>
                </div>

                <!-- Main Form -->
                <form id="updateProfileForm" class="space-y-6" novalidate>
                    <div id="formFieldsContainer">
                        <!-- Basic Information Section -->
                        <div class="form-section" id="basicInfoSection">
                            <h3 class="section-title">📋 Basic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="basicInfoGrid">
                                <!-- Basic fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="form-section" id="contactInfoSection">
                            <h3 class="section-title">📞 Contact Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="contactInfoGrid">
                                <!-- Contact fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Business Information Section -->
                        <div class="form-section" id="businessInfoSection">
                            <h3 class="section-title">💼 Business Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="businessInfoGrid">
                                <!-- Business fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Leadership Information Section (Association only) -->
                        <div class="form-section hidden" id="leadershipInfoSection">
                            <h3 class="section-title">👥 Leadership Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="leadershipInfoGrid">
                                <!-- Leadership fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Membership Information Section (Association only) -->
                        <div class="form-section hidden" id="membershipInfoSection">
                            <h3 class="section-title">🏛️ Membership Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="membershipInfoGrid">
                                <!-- Membership fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="form-section" id="additionalInfoSection">
                            <h3 class="section-title">📊 Additional Information</h3>
                            <div class="grid grid-cols-1 gap-6" id="additionalInfoGrid">
                                <!-- Array/Multi-select fields will be dynamically inserted here -->
                            </div>
                        </div>

                        <!-- Submit Section -->
                        <div class="form-section text-center" id="submitSection">
                            <button type="submit" id="submitButton" class="submit-button text-white py-4 px-12 rounded-full font-bold text-lg shadow-lg">
                                <span id="submitText">Update Profile</span>
                                <span id="submitLoader" class="hidden">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Updating...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Configuration
        const API_CONFIG = {
            baseUrl: 'http://localhost:5001/api/v1',
            timeout: 30000, // 30 seconds
            retryAttempts: 3,
            retryDelay: 1000 // 1 second
        };

        // Global variables
        let currentUser = null;
        let userData = null;
        let formValidation = {};

        // Complete field definitions for each user type
        const fieldsByType = {
            Retailer: {
                basic: [
                    "distributorEntityName", "constitutionEntity", "address", "city", "state", 
                    "pincode", "location", "gstNo", "panNo", "FSSAINo"
                ],
                contact: [
                    "phoneNo", "alternatePhoneNo", "email", "website"
                ],
                business: [
                    "startingYear", "numberOfCustomers", "godownArea", "noOfRetailerOutlets", 
                    "noOfEmployees", "monthlyTurnOver", "isERPUsed", "distributorAssociationName"
                ],
                arrays: [
                    "ownerName", "customerFacilitiesProvided", "businessOperations"
                ],
                // security: ["Password"]
            },
            
            Distributor: {
                basic: [
                    "distributorEntityName", "constitutionEntity", "address", "city", "state", 
                    "pincode", "location", "gstNo", "panNo", "FSSAINo"
                ],
                contact: [
                    "phoneNo", "alternatePhoneNo", "email"
                ],
                business: [
                    "associatedCompany", "startingYear", "numberOfCustomers", "godownArea", 
                    "noOfEmployees", "noOfVehicles", "monthlyTurnOver", "isERPUsed", 
                    "distributorAssociationName"
                ],
                arrays: [
                    "ownerName", "coverageArea", "coverageAreaDescription", "typeOfVehicles",
                    "channelsOfOperation", "typesOfOperation", "businessOperations"
                ],
                // security: ["Password"]
            },
            
            Association: {
                basic: [
                    "distributorEntityName", "address", "city", "state", "pincode", "location"
                ],
                contact: [
                    "email", "website", "phoneNo"
                ],
                leadership: [
                    "nameOfHead", "numberOfHead", "nameOfExecutiveHead", "numberOfExecutiveHead"
                ],
                membership: [
                    "noOfMember", "distributorAssociationName"
                ],
                arrays: [
                    "associationRegisteredAs", "memberOfAssociation", "typeOfBusinessAssociation"
                ],
                // security: ["Password"]
            }
        };

        // Enhanced field labels mapping
        const fieldLabels = {
            distributorEntityName: "Entity Name *",
            constitutionEntity: "Constitution of Entity *",
            address: "Complete Address *",
            city: "City *",
            state: "State *",
            pincode: "Pincode *",
            location: "Location/Area",
            gstNo: "GST Number",
            panNo: "PAN Number",
            FSSAINo: "FSSAI Number",
            ownerName: "Owner/Partner Names",
            phoneNo: "Primary Phone Number *",
            alternatePhoneNo: "Alternate Phone Number",
            email: "Email Address *",
            website: "Website URL",
            startingYear: "Business Starting Year",
            numberOfCustomers: "Number of Customers",
            godownArea: "Godown Area (sq.ft.)",
            noOfRetailerOutlets: "Number of Retailer Outlets",
            noOfEmployees: "Number of Employees",
            monthlyTurnOver: "Monthly Average Turnover",
            customerFacilitiesProvided: "Customer Facilities Provided",
            businessOperations: "Business Operations/Categories",
            isERPUsed: "ERP/Billing Software Used",
            distributorAssociationName: "Distributor Association Name",
            associatedCompany: "Associated Company/Brand",
            coverageArea: "Coverage Area Type",
            coverageAreaDescription: "Coverage Area Description",
            noOfVehicles: "Number of Vehicles",
            typeOfVehicles: "Type of Vehicles Owned",
            channelsOfOperation: "Channels of Operation",
            typesOfOperation: "Types of Operation",
            associationRegisteredAs: "Association Registered As",
            nameOfHead: "Name of Head/President",
            numberOfHead: "Number of Heads/Presidents",
            nameOfExecutiveHead: "Name of Executive Head",
            numberOfExecutiveHead: "Number of Executive Heads",
            memberOfAssociation: "Member of Other Associations",
            noOfMember: "Total Number of Members",
            typeOfBusinessAssociation: "Type of Business Association",
            // Password: "Password *"
        };

        // Comprehensive options for all fields
        const fieldOptions = {
            constitutionEntity: [
                { value: '', label: 'Select Constitution Type' },
                { value: 'proprietorship', label: 'Proprietorship' },
                { value: 'partnership', label: 'Partnership' },
                { value: 'company', label: 'Company' },
                { value: 'llp', label: 'LLP' }
            ],
            ownerName: [
                { value: 'primary_owner', label: 'Primary Owner' },
                { value: 'secondary_owner', label: 'Secondary Owner' },
                { value: 'partner_1', label: 'Partner 1' },
                { value: 'partner_2', label: 'Partner 2' },
                { value: 'director_1', label: 'Director 1' },
                { value: 'director_2', label: 'Director 2' }
            ],
            customerFacilitiesProvided: [
                { value: 'credit_facility', label: 'Credit Facility' },
                { value: 'home_delivery', label: 'Home Delivery' },
                { value: 'easy_returns', label: 'Easy Returns/Exchange' },
                { value: 'warranty_support', label: 'Warranty Support' },
                { value: 'installation_service', label: 'Installation Service' },
                { value: 'technical_support', label: 'Technical Support' },
                { value: 'bulk_discount', label: 'Bulk Purchase Discount' },
                { value: 'loyalty_program', label: 'Loyalty Program' }
            ],
            businessOperations: [
                { value: 'food_beverage', label: 'Food & Beverage' },
                { value: 'fmcg', label: 'FMCG Products' },
                { value: 'pharmaceutical', label: 'Pharmaceutical' },
                { value: 'electronics', label: 'Electronics & Appliances' },
                { value: 'textiles', label: 'Textiles & Garments' },
                { value: 'automotive', label: 'Automotive Parts' },
                { value: 'hardware', label: 'Hardware & Tools' },
                { value: 'cosmetics', label: 'Cosmetics & Personal Care' },
                { value: 'stationery', label: 'Stationery & Office Supplies' },
                { value: 'sports', label: 'Sports & Fitness' }
            ],
            coverageArea: [
                { value: 'urban', label: 'Urban Areas' },
                { value: 'rural', label: 'Rural Areas' },
                { value: 'suburban', label: 'Suburban Areas' },
                { value: 'metropolitan', label: 'Metropolitan Cities' },
                { value: 'tier_1', label: 'Tier 1 Cities' },
                { value: 'tier_2', label: 'Tier 2 Cities' },
                { value: 'tier_3', label: 'Tier 3 Cities' }
            ],
            coverageAreaDescription: [
                { value: 'local_area', label: 'Local Area (Within City)' },
                { value: 'district_level', label: 'District Level' },
                { value: 'state_level', label: 'State Level' },
                { value: 'multi_state', label: 'Multi-State' },
                { value: 'national_level', label: 'National Level' },
                { value: 'regional', label: 'Regional (Specific Region)' }
            ],
            typeOfVehicles: [
                { value: 'tata_ace', label: 'Tata Ace' },
                { value: 'mahindra_bolero', label: 'Mahindra Bolero' },
                { value: 'tempo_traveller', label: 'Tempo Traveller' },
                { value: 'mini_truck', label: 'Mini Truck' },
                { value: 'medium_truck', label: 'Medium Truck' },
                { value: 'heavy_truck', label: 'Heavy Truck' },
                { value: 'van', label: 'Delivery Van' },
                { value: 'pickup', label: 'Pickup Truck' },
                { value: 'two_wheeler', label: 'Two Wheeler' },
                { value: 'three_wheeler', label: 'Three Wheeler' }
            ],
            channelsOfOperation: [
                { value: 'retail', label: 'Retail Sales' },
                { value: 'wholesale', label: 'Wholesale Distribution' },
                { value: 'online', label: 'Online Sales' },
                { value: 'b2b', label: 'B2B Sales' },
                { value: 'institutional', label: 'Institutional Sales' },
                { value: 'export', label: 'Export Sales' },
                { value: 'franchise', label: 'Franchise Model' },
                { value: 'direct_sales', label: 'Direct Sales' }
            ],
            typesOfOperation: [
                { value: 'distribution', label: 'Product Distribution' },
                { value: 'warehousing', label: 'Warehousing Services' },
                { value: 'logistics', label: 'Logistics & Transportation' },
                { value: 'sales', label: 'Sales & Marketing' },
                { value: 'manufacturing', label: 'Manufacturing' },
                { value: 'import_export', label: 'Import/Export' },
                { value: 'retail_chain', label: 'Retail Chain Management' },
                { value: 'franchise', label: 'Franchise Operations' }
            ],
            associationRegisteredAs: [
                { value: 'trust', label: 'Trust' },
                { value: 'society', label: 'Registered Society' },
                { value: 'company', label: 'Section 8 Company' },
                { value: 'ngo', label: 'NGO' },
                { value: 'cooperative', label: 'Cooperative Society' },
                { value: 'federation', label: 'Federation' }
            ],
            memberOfAssociation: [
                { value: 'chamber_commerce', label: 'Chamber of Commerce' },
                { value: 'trade_association', label: 'Trade Association' },
                { value: 'industry_body', label: 'Industry Body' },
                { value: 'distributor_association', label: 'Distributor Association' },
                { value: 'retailer_association', label: 'Retailer Association' },
                { value: 'none', label: 'Not a Member of Any Association' }
            ],
            typeOfBusinessAssociation: [
                { value: 'trade_association', label: 'Trade Association' },
                { value: 'industry_association', label: 'Industry Association' },
                { value: 'chamber_commerce', label: 'Chamber of Commerce' },
                { value: 'cooperative_society', label: 'Cooperative Society' },
                { value: 'professional_body', label: 'Professional Body' },
                { value: 'welfare_association', label: 'Welfare Association' }
            ]
        };

        // Validation rules
        const validationRules = {
            email: {
                pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                message: 'Please enter a valid email address'
            },
            phoneNo: {
                pattern: /^[6-9]\d{9}$/,
                message: 'Please enter a valid 10-digit phone number'
            },
            alternatePhoneNo: {
                pattern: /^[6-9]\d{9}$/,
                message: 'Please enter a valid 10-digit phone number'
            },
            pincode: {
                pattern: /^\d{6}$/,
                message: 'Please enter a valid 6-digit pincode'
            },
            gstNo: {
                pattern: /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
                message: 'Please enter a valid GST number'
            },
            panNo: {
                pattern: /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/,
                message: 'Please enter a valid PAN number'
            },
            website: {
                pattern: /^https?:\/\/.+/,
                message: 'Please enter a valid website URL starting with http:// or https://'
            },
            Password: {
                pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
                message: 'Password must be at least 8 characters with uppercase, lowercase, number and special character'
            }
        };

        // API utility functions
        class APIClient {
            static async makeRequest(url, options = {}) {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), API_CONFIG.timeout);

                try {
                    const response = await fetch(url, {
                        ...options,
                        signal: controller.signal,
                        headers: {
                            'Content-Type': 'application/json',
                            ...options.headers
                        }
                    });

                    clearTimeout(timeoutId);

                    if (!response.ok) {
                        const errorData = await response.json().catch(() => ({}));
                        throw new APIError(
                            errorData.message || `HTTP ${response.status}: ${response.statusText}`,
                            response.status,
                            errorData
                        );
                    }

                    return await response.json();
                } catch (error) {
                    clearTimeout(timeoutId);
                    
                    if (error.name === 'AbortError') {
                        throw new APIError('Request timeout. Please check your connection and try again.', 408);
                    }
                    
                    if (error instanceof APIError) {
                        throw error;
                    }
                    
                    throw new APIError('Network error. Please check your connection and try again.', 0, error);
                }
            }

            static async retryRequest(requestFn, attempts = API_CONFIG.retryAttempts) {
                for (let i = 0; i < attempts; i++) {
                    try {
                        return await requestFn();
                    } catch (error) {
                        if (i === attempts - 1 || error.status === 404 || error.status === 401) {
                            throw error;
                        }
                        
                        await new Promise(resolve => setTimeout(resolve, API_CONFIG.retryDelay * (i + 1)));
                    }
                }
            }

            static async getUserById(userId) {
                return this.retryRequest(() => 
                    this.makeRequest(`${API_CONFIG.baseUrl}/get_distributor_by_id/${userId}`)
                );
            }

            static async updateProfile(userId, data) {
                return this.retryRequest(() => 
                    this.makeRequest(`${API_CONFIG.baseUrl}/update_profile/${userId}`, {
                        method: 'PUT',
                        body: JSON.stringify(data)
                    })
                );
            }
        }

        class APIError extends Error {
            constructor(message, status, details = null) {
                super(message);
                this.name = 'APIError';
                this.status = status;
                this.details = details;
            }
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            initializeApp();
        });

        async function initializeApp() {
            try {
                // Reset UI state
                showLoading();
                hideError();
                hideMessage();

                // Check authentication and get user data
                currentUser = checkUserAuth();
                if (!currentUser) {
                    throw new Error('User authentication required. Please log in again.');
                }

                // Display user type
                document.getElementById('userTypeText').textContent = currentUser.type;

                // Load user data from API
                await loadUserData();

                // Render form fields based on user type
                renderFieldsForUserType(currentUser.type);

                // Initialize multi-select functionality
                initializeMultiSelect();

                // Initialize form validation
                initializeFormValidation();

                // Initialize form submission
                initializeFormSubmission();

                // Show form
                showForm();

            } catch (error) {
                console.error('Error initializing app:', error);
                showError(error.message);
            }
        }

        function checkUserAuth() {
            try {
                // Try to get user from URL parameters first
                const urlParams = new URLSearchParams(window.location.search);
                const userId = urlParams.get('userId') || urlParams.get('id');
                
                if (userId) {
                    return {
                        _id: userId,
                        type: urlParams.get('type') || 'Distributor'
                    };
                }

                // Try to get from sessionStorage
                const userJson = sessionStorage.getItem('user');
                if (userJson) {
                    const user = JSON.parse(userJson);
                    if (user && user._id) {
                        return user;
                    }
                }
                
                // Try to get from localStorage
                const localUserJson = localStorage.getItem('user');
                if (localUserJson) {
                    const user = JSON.parse(localUserJson);
                    if (user && user._id) {
                        return user;
                    }
                }

                throw new Error('No user authentication found');
                
            } catch (error) {
                console.error('Error parsing user data:', error);
                throw new Error('Invalid user authentication data');
            }
        }

        async function loadUserData() {
            try {
                const response = await APIClient.getUserById(currentUser._id);
                
                if (response.success && response.data) {
                    userData = response.data;
                    
                    // Update current user with type from API if available
                    if (userData.type) {
                        currentUser.type = userData.type;
                        document.getElementById('userTypeText').textContent = currentUser.type;
                    }
                    
                    // Populate form with user data
                    setTimeout(() => populateForm(userData), 100);
                } else {
                    throw new APIError('Invalid response format from server', 500);
                }

            } catch (error) {
                console.error('Error fetching user data:', error);
                
                if (error.status === 404) {
                    throw new Error('User profile not found. Please contact support.');
                } else if (error.status === 401) {
                    throw new Error('Authentication failed. Please log in again.');
                } else {
                    throw new Error(`Failed to load profile data: ${error.message}`);
                }
            }
        }

        function renderFieldsForUserType(userType) {
            if (!userType || !fieldsByType[userType]) {
                throw new Error(`Invalid user type: ${userType}`);
            }

            const typeFields = fieldsByType[userType];

            // Clear all sections first
            clearAllSections();

            // Show/hide sections based on user type
            toggleSections(userType);

            // Render fields in appropriate sections
            Object.keys(typeFields).forEach(category => {
                if (typeFields[category].length > 0) {
                    renderFieldsInSection(category, typeFields[category]);
                }
            });
        }

        function clearAllSections() {
            const sections = ['basicInfoGrid', 'contactInfoGrid', 'businessInfoGrid', 
                            'leadershipInfoGrid', 'membershipInfoGrid', 'additionalInfoGrid', 'securityGrid'];
            
            sections.forEach(sectionId => {
                const section = document.getElementById(sectionId);
                if (section) {
                    section.innerHTML = '';
                }
            });
        }

        function toggleSections(userType) {
            // Hide all optional sections first
            document.getElementById('leadershipInfoSection').classList.add('hidden');
            document.getElementById('membershipInfoSection').classList.add('hidden');

            // Show sections based on user type
            if (userType === 'Association') {
                document.getElementById('leadershipInfoSection').classList.remove('hidden');
                document.getElementById('membershipInfoSection').classList.remove('hidden');
            }
        }

        function renderFieldsInSection(category, fields) {
            const sectionMap = {
                'basic': 'basicInfoGrid',
                'contact': 'contactInfoGrid',
                'business': 'businessInfoGrid',
                'leadership': 'leadershipInfoGrid',
                'membership': 'membershipInfoGrid',
                'arrays': 'additionalInfoGrid',
                'security': 'securityGrid'
            };

            const sectionId = sectionMap[category];
            const section = document.getElementById(sectionId);
            
            if (!section) return;

            fields.forEach(field => {
                const fieldElement = createFieldElement(field, category);
                section.appendChild(fieldElement);
            });
        }

        function createFieldElement(field, category) {
            const container = document.createElement('div');
            container.className = 'field-container';

            // For array fields, span full width
            if (category === 'arrays') {
                container.className += ' md:col-span-2';
            }

            // Create label
            const label = document.createElement('label');
            label.className = 'block text-sm font-semibold text-gray-700 mb-2';
            label.setAttribute('for', field);
            label.textContent = fieldLabels[field] || formatFieldName(field);

            // Create input element
            let inputElement;

            if (category === 'arrays') {
                inputElement = createMultiSelectField(field);
            } else if (field === 'address') {
                inputElement = createTextareaField(field);
            } else if (field === 'constitutionEntity') {
                inputElement = createSelectField(field);
            } else {
                inputElement = createInputField(field);
            }

            // Create error message container
            const errorContainer = document.createElement('div');
            errorContainer.className = 'field-error-text hidden';
            errorContainer.id = `${field}-error`;

            container.appendChild(label);
            container.appendChild(inputElement);
            container.appendChild(errorContainer);

            return container;
        }

        function createInputField(field) {
            const input = document.createElement('input');
            input.type = getInputType(field);
            input.id = field;
            input.name = field;
            input.className = 'input-field mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500';
            
            // Add placeholder
            input.placeholder = getPlaceholder(field);
            
            // Add required attribute for mandatory fields
            if (fieldLabels[field] && fieldLabels[field].includes('*')) {
                input.required = true;
            }

            // Add validation attributes
            if (validationRules[field]) {
                input.pattern = validationRules[field].pattern.source;
            }

            return input;
        }

        function createTextareaField(field) {
            const textarea = document.createElement('textarea');
            textarea.id = field;
            textarea.name = field;
            textarea.rows = 4;
            textarea.className = 'input-field mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500';
            textarea.placeholder = 'Enter complete address with landmark';
            
            if (fieldLabels[field] && fieldLabels[field].includes('*')) {
                textarea.required = true;
            }

            return textarea;
        }

        function createSelectField(field) {
            const select = document.createElement('select');
            select.id = field;
            select.name = field;
            select.className = 'input-field mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500';

            const options = fieldOptions[field] || [];
            options.forEach(opt => {
                const option = document.createElement('option');
                option.value = opt.value;
                option.textContent = opt.label;
                select.appendChild(option);
            });

            if (fieldLabels[field] && fieldLabels[field].includes('*')) {
                select.required = true;
            }

            return select;
        }

        function createMultiSelectField(field) {
            const container = document.createElement('div');
            container.className = 'multi-select-container';

            const select = document.createElement('select');
            select.name = `${field}[]`;
            select.multiple = true;
            select.id = field;
            select.className = 'multi-select mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500';
            select.dataset.name = field;

            const options = fieldOptions[field] || [];
            options.forEach(opt => {
                const option = document.createElement('option');
                option.value = opt.value;
                option.textContent = opt.label;
                select.appendChild(option);
            });

            const selectedItems = document.createElement('div');
            selectedItems.className = 'selected-items mt-3';

            const helpText = document.createElement('p');
            helpText.className = 'text-sm text-gray-500 mt-1';
            helpText.textContent = 'Hold Ctrl/Cmd to select multiple options';

            container.appendChild(select);
            container.appendChild(selectedItems);
            container.appendChild(helpText);

            return container;
        }

        function getInputType(field) {
            if (field.includes('email') || field.includes('Email')) return 'email';
            if (field.includes('phone') || field.includes('Phone')) return 'tel';
            if (field.includes('website') || field.includes('Website')) return 'url';
            if (field.includes('number') || field.includes('No') || field.includes('Area') || field.includes('Year')) return 'number';
            if (field === 'Password') return 'password';
            return 'text';
        }

        function getPlaceholder(field) {
            const placeholders = {
                distributorEntityName: 'Enter your business/entity name',
                email: 'Enter email address',
                phoneNo: 'Enter 10-digit phone number',
                alternatePhoneNo: 'Enter alternate phone number',
                website: 'https://www.example.com',
                city: 'Enter city name',
                state: 'Enter state name',
                pincode: 'Enter 6-digit pincode',
                gstNo: 'Enter GST number (e.g., 22AAAAA0000A1Z5)',
                panNo: 'Enter PAN number (e.g., ABCDE1234F)',
                FSSAINo: 'Enter FSSAI number',
                startingYear: 'YYYY',
                numberOfCustomers: 'Enter number',
                godownArea: 'Area in sq.ft.',
                noOfEmployees: 'Enter number',
                monthlyTurnOver: 'Enter amount',
                Password: 'Enter secure password'
            };
            
            return placeholders[field] || `Enter ${formatFieldName(field).toLowerCase()}`;
        }

        function formatFieldName(field) {
            return field
                .replace(/([A-Z])/g, ' $1')
                .replace(/^./, str => str.toUpperCase())
                .trim();
        }

        function populateForm(data) {
            if (!data) return;

            Object.keys(data).forEach(field => {
                const element = document.getElementById(field);
                if (element && data[field] !== undefined && data[field] !== null) {
                    if (element.multiple && Array.isArray(data[field])) {
                        // Handle multi-select fields
                        Array.from(element.options).forEach(option => {
                            option.selected = data[field].includes(option.value);
                        });
                        element.dispatchEvent(new Event('change'));
                    } else {
                        element.value = data[field] || '';
                    }
                }
            });
        }

        function initializeMultiSelect() {
            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('multi-select')) {
                    updateSelectedItems(e.target);
                }
            });

            // Initialize existing multi-selects
            setTimeout(() => {
                const multiSelects = document.querySelectorAll('.multi-select');
                multiSelects.forEach(updateSelectedItems);
            }, 200);
        }

        function updateSelectedItems(select) {
            const container = select.closest('.multi-select-container');
            const selectedItemsDiv = container.querySelector('.selected-items');
            const selectedOptions = Array.from(select.selectedOptions);

            selectedItemsDiv.innerHTML = '';

            selectedOptions.forEach(option => {
                const tag = document.createElement('span');
                tag.className = 'selected-tag';
                tag.innerHTML = `${option.text} <button type="button" data-field="${select.dataset.name}" data-value="${option.value}">&times;</button>`;

                const removeButton = tag.querySelector('button');
                removeButton.addEventListener('click', function() {
                    removeSelection(this.dataset.field, this.dataset.value);
                });

                selectedItemsDiv.appendChild(tag);
            });
        }

        function removeSelection(fieldName, value) {
            const select = document.querySelector(`select[data-name="${fieldName}"]`);
            if (!select) return;

            const option = select.querySelector(`option[value="${value}"]`);
            if (option) {
                option.selected = false;
                select.dispatchEvent(new Event('change'));
            }
        }

        function initializeFormValidation() {
            const form = document.getElementById('updateProfileForm');
            if (!form) return;

            // Add real-time validation
            form.addEventListener('input', function(e) {
                validateField(e.target);
            });

            form.addEventListener('blur', function(e) {
                validateField(e.target);
            }, true);
        }

        function validateField(field) {
            if (!field.name || !field.value.trim()) {
                clearFieldError(field.name);
                return true;
            }

            const rule = validationRules[field.name];
            if (!rule) return true;

            const isValid = rule.pattern.test(field.value.trim());
            
            if (isValid) {
                clearFieldError(field.name);
                return true;
            } else {
                showFieldError(field.name, rule.message);
                return false;
            }
        }

        function showFieldError(fieldName, message) {
            const field = document.getElementById(fieldName);
            const errorContainer = document.getElementById(`${fieldName}-error`);
            
            if (field && errorContainer) {
                field.classList.add('field-error');
                errorContainer.textContent = message;
                errorContainer.classList.remove('hidden');
                formValidation[fieldName] = false;
            }
        }

        function clearFieldError(fieldName) {
            const field = document.getElementById(fieldName);
            const errorContainer = document.getElementById(`${fieldName}-error`);
            
            if (field && errorContainer) {
                field.classList.remove('field-error');
                errorContainer.classList.add('hidden');
                delete formValidation[fieldName];
            }
        }

        function validateForm() {
            const form = document.getElementById('updateProfileForm');
            const formData = new FormData(form);
            let isValid = true;
            const errors = [];

            // Validate required fields
            const requiredFields = [];
            form.querySelectorAll('[required]').forEach(field => {
                requiredFields.push(field.name);
            });

            requiredFields.forEach(fieldName => {
                const value = formData.get(fieldName);
                if (!value || !value.toString().trim()) {
                    showFieldError(fieldName, 'This field is required');
                    errors.push(`${fieldLabels[fieldName] || fieldName} is required`);
                    isValid = false;
                }
            });

            // Validate field patterns
            Object.keys(validationRules).forEach(fieldName => {
                const field = document.getElementById(fieldName);
                if (field && field.value.trim()) {
                    if (!validateField(field)) {
                        isValid = false;
                        errors.push(`Invalid ${fieldLabels[fieldName] || fieldName}`);
                    }
                }
            });

            // Check for existing validation errors
            if (Object.keys(formValidation).some(key => formValidation[key] === false)) {
                isValid = false;
            }

            return { isValid, errors };
        }

        function initializeFormSubmission() {
            const form = document.getElementById('updateProfileForm');
            if (form) {
                form.addEventListener('submit', handleFormSubmission);
            }
        }

        async function handleFormSubmission(event) {
            event.preventDefault();

            const submitButton = document.getElementById('submitButton');
            const submitText = document.getElementById('submitText');
            const submitLoader = document.getElementById('submitLoader');

            try {
                // Validate form
                const validation = validateForm();
                if (!validation.isValid) {
                    showMessage('Please fix the following errors:\n• ' + validation.errors.join('\n• '), 'error');
                    return;
                }

                // Show loading state
                submitButton.disabled = true;
                submitText.classList.add('hidden');
                submitLoader.classList.remove('hidden');

                // Collect form data
                const formData = new FormData(event.target);
                const updateData = {};

                // Process form data
                for (let [key, value] of formData.entries()) {
                    if (key.endsWith('[]')) {
                        const fieldName = key.slice(0, -2);
                        if (!updateData[fieldName]) {
                            updateData[fieldName] = [];
                        }
                        updateData[fieldName].push(value);
                    } else {
                        updateData[key] = value.trim();
                    }
                }

                // Add metadata
                updateData.type = currentUser.type;
                updateData.lastUpdated = new Date().toISOString();

                console.log('Submitting form data:', updateData);

                // Submit to API
                const response = await APIClient.updateProfile(currentUser._id, updateData);

                if (response.success) {
                    // Update session storage
                    const updatedUser = { ...currentUser, ...updateData };
                    sessionStorage.setItem('user', JSON.stringify(updatedUser));
                    localStorage.setItem('user', JSON.stringify(updatedUser));

                    showMessage('Profile updated successfully! 🎉', 'success');
                    
                    // Scroll to top to show message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    throw new APIError(response.message || 'Update failed', 400);
                }

            } catch (error) {
                console.error('Error updating profile:', error);
                
                let errorMessage = 'Error updating profile. Please try again.';
                
                if (error instanceof APIError) {
                    if (error.status === 400) {
                        errorMessage = `Validation error: ${error.message}`;
                    } else if (error.status === 401) {
                        errorMessage = 'Authentication failed. Please log in again.';
                    } else if (error.status === 403) {
                        errorMessage = 'You do not have permission to update this profile.';
                    } else if (error.status === 404) {
                        errorMessage = 'Profile not found. Please contact support.';
                    } else if (error.status >= 500) {
                        errorMessage = 'Server error. Please try again later.';
                    } else {
                        errorMessage = error.message;
                    }
                }
                
                showMessage(errorMessage + ' ❌', 'error');
            } finally {
                // Reset button state
                submitButton.disabled = false;
                submitText.classList.remove('hidden');
                submitLoader.classList.add('hidden');
            }
        }

        // UI Helper Functions
        function showLoading() {
            document.getElementById('loadingIndicator').classList.remove('hidden');
            document.getElementById('profileForm').classList.add('hidden');
            document.getElementById('errorState').classList.add('hidden');
        }

        function showForm() {
            document.getElementById('loadingIndicator').classList.add('hidden');
            document.getElementById('profileForm').classList.remove('hidden');
            document.getElementById('errorState').classList.add('hidden');
        }

        function showError(message) {
            document.getElementById('loadingIndicator').classList.add('hidden');
            document.getElementById('profileForm').classList.add('hidden');
            document.getElementById('errorState').classList.remove('hidden');
            document.getElementById('errorMessage').textContent = message;
        }

        function hideError() {
            document.getElementById('errorState').classList.add('hidden');
        }

        function showMessage(message, type) {
            const container = document.getElementById('messageContainer');
            const className = type === 'success' ?
                'success-message' : 'error-message';

            container.innerHTML = `
                <div class="${className}">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">${message}</span>
                        <button onclick="hideMessage()" class="text-xl font-bold ml-4">&times;</button>
                    </div>
                </div>
            `;
            container.classList.remove('hidden');

            // Auto-hide success messages
            if (type === 'success') {
                setTimeout(() => {
                    hideMessage();
                }, 8000);
            }
        }

        function hideMessage() {
            document.getElementById('messageContainer').classList.add('hidden');
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + S to save form
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                const form = document.getElementById('updateProfileForm');
                if (form && !form.classList.contains('hidden')) {
                    form.dispatchEvent(new Event('submit'));
                }
            }
            
            // Escape to close messages
            if (e.key === 'Escape') {
                hideMessage();
            }
        });

        // Handle page visibility changes
        document.addEventListener('visibilitychange', function() {
            if (document.visibilityState === 'visible') {
                // Optionally refresh data when page becomes visible
                console.log('Page became visible');
            }
        });

        // Handle online/offline status
        window.addEventListener('online', function() {
            console.log('Connection restored');
            hideMessage();
        });

        window.addEventListener('offline', function() {
            showMessage('You are currently offline. Changes will be saved when connection is restored.', 'error');
        });
    </script>
</body>
</html>
