<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f9fafb;
            color: #111827;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 24px;
            margin-bottom: 24px;
        }

        .form-title {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 16px;
        }

        .grid {
            display: grid;
            gap: 16px;
        }

        .grid-cols-1 {
            grid-template-columns: 1fr;
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .col-span-2 {
            grid-column: span 2;
        }

        @media (max-width: 768px) {
            .grid-cols-2 {
                grid-template-columns: 1fr;
            }

            .col-span-2 {
                grid-column: span 1;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 4px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Add/Remove List Styles */
        .add-remove-list {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 8px;
            min-height: 40px;
        }

        .add-remove-input-container {
            display: flex;
            gap: 8px;
            margin-bottom: 8px;
        }

        .add-remove-input {
            flex: 1;
            padding: 6px 8px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 14px;
        }

        .add-btn {
            padding: 6px 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .add-btn:hover {
            background: #2563eb;
        }

        .add-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }

        .items-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .list-item {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #f3f4f6;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            border: 1px solid #e5e7eb;
        }

        .remove-btn {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 3px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        .remove-btn:hover {
            background: #dc2626;
        }

        .submit-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 24px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-left: auto;
        }

        .submit-btn:hover:not(:disabled) {
            background: #b91c1c;
        }

        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .loading-spinner {
            display: none;
            justify-content: center;
            align-items: center;
            min-height: 200px;
        }

        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid #3b82f6;
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

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 16px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            z-index: 9999;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            background: #10b981;
        }

        .toast.error {
            background: #ef4444;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner"></div>
        </div>

        <form id="updateProfileForm" class="hidden">
            <div class="form-container">
                <h3 class="form-title">Business Information</h3>

                <!-- Distributor Fields -->
                <div id="distributorFields" class="hidden">
                    <div class="grid grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Distributor Entity Name</label>
                            <input type="text" name="distributorEntityName" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Constitution of the entity</label>
                            <select name="constitutionEntity" class="form-select">
                                <option value="">Select Constitution</option>
                                <option value="proprietorship">Proprietorship</option>
                                <option value="partnership">Partnership</option>
                                <option value="company">Company</option>
                                <option value="llp">LLP</option>
                            </select>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-textarea"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">GST No.</label>
                            <input type="text" name="gstNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">PAN No.</label>
                            <input type="text" name="panNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">FSSAI No.</label>
                            <input type="text" name="FSSAINo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phoneNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alternate Phone No.</label>
                            <input type="tel" name="alternatePhoneNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Associated Company</label>
                            <input type="text" name="associatedCompany" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Coverage Area Description</label>
                            <input type="text" name="coverageAreaDescription" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Starting Year</label>
                            <input type="text" name="startingYear" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Number Of Customers</label>
                            <input type="number" name="numberOfCustomers" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Godown Area (sq.ft.)</label>
                            <input type="number" name="godownArea" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Number of employees</label>
                            <input type="number" name="noOfEmployees" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">No Of Vehicles</label>
                            <input type="number" name="noOfVehicles" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Type of vehicles owned (Tata Ace, Mahindra Bolero etc.)</label>
                            <input type="text" name="typeOfVehicles" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monthly Average Turnover</label>
                            <input type="text" name="monthlyTurnOver" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">ERP (Billing Software) in use</label>
                            <input type="text" name="isERPUsed" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Distributor Association(s) Name you are enrolled with (if any). Type NO if not associated with any association</label>
                            <input type="text" name="distributorAssociationName" class="form-input">
                        </div>

                        <!-- Add/Remove List fields -->
                        <div class="form-group col-span-2">
                            <label class="form-label">Coverage Area</label>
                            <div class="add-remove-list" data-name="coverageArea">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add coverage area...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Channels of Operation</label>
                            <div class="add-remove-list" data-name="channelsOfOperation">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add channel of operation...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Types of Operation</label>
                            <div class="add-remove-list" data-name="typesOfOperation">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add type of operation...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Business Operations</label>
                            <div class="add-remove-list" data-name="businessOperations">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add business operation...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Retailer Fields -->
                <div id="retailerFields" class="hidden">
                    <div class="grid grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Retailer Entity Name</label>
                            <input type="text" name="distributorEntityName" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Constitution of the entity</label>
                            <select name="constitutionEntity" class="form-select">
                                <option value="">Select Constitution</option>
                                <option value="proprietorship">Proprietorship</option>
                                <option value="partnership">Partnership</option>
                                <option value="company">Company</option>
                                <option value="llp">LLP</option>
                            </select>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-textarea"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">City / Town</label>
                            <input type="text" name="city" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Location (G+ Code)</label>
                            <input type="text" name="location" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">GST No.</label>
                            <input type="text" name="gstNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">PAN No.</label>
                            <input type="text" name="panNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">FSSAI No.</label>
                            <input type="text" name="FSSAINo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Owner Name</label>
                            <input type="text" name="ownerName" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phoneNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alternate Phone No.</label>
                            <input type="tel" name="alternatePhoneNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="text" name="website" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Starting Year</label>
                            <input type="date" name="startingYear" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Number Of Customers</label>
                            <input type="number" name="numberOfCustomers" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Godown Area (sq.ft.)</label>
                            <input type="number" name="godownArea" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Number of retail outlets (if a retail chain)</label>
                            <input type="number" name="noOfRetailerOutlets" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Number of employees</label>
                            <input type="number" name="noOfEmployees" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monthly Average Turnover</label>
                            <input type="text" name="monthlyTurnOver" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">ERP (Billing Software) in use</label>
                            <input type="text" name="isERPUsed" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Distributor Association(s) Name you are enrolled with (if any). Type NO if not associated with any association</label>
                            <input type="text" name="distributorAssociationName" class="form-input">
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Customer facilities provided</label>
                            <div class="add-remove-list" data-name="customerFacilitiesProvided">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add customer facility...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Types of Operation</label>
                            <div class="add-remove-list" data-name="businessOperations">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add type of operation...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Association Fields -->
                <div id="associationFields" class="hidden">
                    <div class="grid grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Association Name</label>
                            <input type="text" name="distributorEntityName" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Starting Year</label>
                            <input type="date" name="startingYear" class="form-input">
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-textarea"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">City / Town</label>
                            <input type="text" name="city" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Location (G+ Code)</label>
                            <input type="text" name="location" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="text" name="website" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phoneNo" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Name of Head of the organization (President / Chairman)</label>
                            <input type="text" name="nameOfHead" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mobile Number of the Head (preferably Whatsapp)</label>
                            <input type="tel" name="numberOfHead" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Name of Executive Head of the organization (General Secretary)</label>
                            <input type="text" name="nameOfExecutiveHead" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mobile Number of the Executive Head (preferably Whatsapp)</label>
                            <input type="tel" name="numberOfExecutiveHead" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Total numeric strength of the organization (number of members)</label>
                            <input type="number" name="noOfMember" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Distributor Association(s) Name you are enrolled with (if any). Type NO if not associated with any association</label>
                            <input type="text" name="distributorAssociationName" class="form-input">
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">Who can be member of the association?</label>
                            <div class="add-remove-list" data-name="memberOfAssociation">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add member type...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>

                        <div class="form-group col-span-2">
                            <label class="form-label">What type of businesses the association is concerned with?</label>
                            <div class="add-remove-list" data-name="typeOfBusinessAssociation">
                                <div class="add-remove-input-container">
                                    <input type="text" class="add-remove-input" placeholder="Add business type...">
                                    <button type="button" class="add-btn">Add</button>
                                </div>
                                <div class="items-list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="submit-btn" id="submitBtn">
                    <span>✏️</span>
                    <span id="submitText">Update Profile</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        // Global variables
        let userId = null;
        let role = null;
        let loading = false;
        let formData = {};

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => toast.classList.add('show'), 100);
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }

        // Add/Remove List component
        class AddRemoveList {
            constructor(element) {
                this.element = element;
                this.name = element.dataset.name;
                this.input = element.querySelector('.add-remove-input');
                this.addBtn = element.querySelector('.add-btn');
                this.itemsList = element.querySelector('.items-list');
                this.items = [];

                this.init();
            }

            init() {
                this.bindEvents();
            }

            bindEvents() {
                this.addBtn.addEventListener('click', () => this.addItem());
                this.input.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        this.addItem();
                    }
                });
            }

            addItem() {
                const value = this.input.value.trim();
                if (value && !this.items.includes(value)) {
                    this.items.push(value);
                    this.input.value = '';
                    this.renderItems();
                }
            }

            removeItem(value) {
                this.items = this.items.filter(item => item !== value);
                this.renderItems();
            }

            renderItems() {
                this.itemsList.innerHTML = '';
                this.items.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'list-item';
                    itemElement.innerHTML = `
                        <span>${item}</span>
                        <button type="button" class="remove-btn" data-value="${item}">×</button>
                    `;

                    itemElement.querySelector('.remove-btn').addEventListener('click', () => {
                        this.removeItem(item);
                    });

                    this.itemsList.appendChild(itemElement);
                });
            }

            setValue(items) {
                this.items = Array.isArray(items) ? [...items] : [];
                this.renderItems();
            }

            getValue() {
                return [...this.items];
            }
        }

        // Initialize add/remove list components
        function initAddRemoveLists() {
            const addRemoveLists = document.querySelectorAll('.add-remove-list');
            addRemoveLists.forEach(element => {
                element.addRemoveInstance = new AddRemoveList(element);
            });
        }

        // Get user ID from session storage
        function getUserId() {
            try {
                const user = sessionStorage.getItem('user');
                if (user) {
                    const parsedUser = JSON.parse(user);
                    return parsedUser._id;
                }
            } catch (error) {
                console.error('Error parsing user data:', error);
            }
            return null;
        }

        // Show/hide loading spinner
        function setLoading(isLoading) {
            loading = isLoading;
            const spinner = document.getElementById('loadingSpinner');
            const form = document.getElementById('updateProfileForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            if (isLoading) {
                spinner.classList.remove('hidden');
                form.classList.add('hidden');
                submitBtn.disabled = true;
                submitText.textContent = 'Updating...';
            } else {
                spinner.classList.add('hidden');
                form.classList.remove('hidden');
                submitBtn.disabled = false;
                submitText.textContent = 'Update Profile';
            }
        }

        // Show role-specific fields
        function showRoleFields(userRole) {
            const distributorFields = document.getElementById('distributorFields');
            const retailerFields = document.getElementById('retailerFields');
            const associationFields = document.getElementById('associationFields');

            // Hide all fields first
            distributorFields.classList.add('hidden');
            retailerFields.classList.add('hidden');
            associationFields.classList.add('hidden');

            // Show relevant fields
            switch (userRole) {
                case 'Distributor':
                    distributorFields.classList.remove('hidden');
                    break;
                case 'Retailer':
                    retailerFields.classList.remove('hidden');
                    break;
                case 'Association':
                    associationFields.classList.remove('hidden');
                    break;
            }
        }

        function populateForm(data) {
            console.log("data",data)
            const form = document.getElementById('updateProfileForm');

            Object.keys(data).forEach(key => {
                let input = form.querySelector(`[name="${key}"]`);

                if (!input) return;

                if (key === 'startingYear' && typeof data[key] === 'string' && data[key].includes('T')) {
                    input.value = data[key].split('T')[0];
                } else if (typeof data[key] === 'string' || typeof data[key] === 'number') {
                    document.getElementsByName(key).forEach(input => {
                        input.value = data[key];
                    })
                } else if (Array.isArray(data[key]) && ['ownerName', 'typeOfVehicles', 'coverageAreaDescription'].includes(key)) {
                    input.value = data[key].join(', ');
                }
            });

            // Populate add/remove list fields
            const addRemoveFields = [
                'coverageArea',
                'channelsOfOperation',
                'typesOfOperation',
                'businessOperations',
                'customerFacilitiesProvided',
                'memberOfAssociation',
                'typeOfBusinessAssociation'
            ];

            addRemoveFields.forEach(fieldName => {
                const addRemoveElement = document.querySelector(`[data-name="${fieldName}"]`);
                if (fieldName === 'businessOperations') {
                    console.log('Setting businessOperations:', data[fieldName]);
                }
                if (
                    addRemoveElement &&
                    addRemoveElement.addRemoveInstance &&
                    Array.isArray(data[fieldName]) &&
                    data[fieldName].length > 0
                ) {
                    addRemoveElement.addRemoveInstance.setValue(data[fieldName]);
                }
            });
        }

        // Fetch distributor data
        async function fetchDistributorData() {
            if (!userId) return;

            setLoading(true);

            try {
                const response = await fetch(`http://localhost:5001/api/v1/get_distributor_by_id/${userId}`);
                const result = await response.json();

                if (response.ok) {
                    const distributorData = result.data;
                    role = distributorData?.type;

                    showRoleFields(role);
                    populateForm(distributorData);
                } else {
                    throw new Error(result.message || 'Failed to fetch data');
                }
            } catch (error) {
                console.error('Error fetching distributor data:', error);
                showToast('Failed to fetch distributor data', 'error');
            } finally {
                setLoading(false);
            }
        }

        // Validate form
        function validateForm() {
            const form = document.getElementById('updateProfileForm');
            const phoneInput = form.querySelector('[name="phoneNo"]');
            const emailInput = form.querySelector('[name="email"]');

            // Validate phone number
            if (phoneInput.value && !/^\d{10}$/.test(phoneInput.value)) {
                showToast('Please enter a valid 10-digit phone number', 'error');
                return false;
            }

            // Validate email
            if (emailInput.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                showToast('Please enter a valid email address', 'error');
                return false;
            }

            return true;
        }

        // Collect form data
        function collectFormData() {
            const form = document.getElementById('updateProfileForm');
            const formData = new FormData(form);
            const data = {};

            
            // Collect regular form fields
            for (let [key, value] of formData.entries()) {
                console.log(`[FormData] ${key}:`, value);
                if (['ownerName', 'typeOfVehicles', 'coverageAreaDescription'].includes(key)) {
                    data[key] = value.split(',').map(item => item.trim()).filter(item => item);
                } else {
                    data[key] = value;
                }
            }

            // Collect add/remove list data
            const addRemoveLists = document.querySelectorAll('.add-remove-list');
            addRemoveLists.forEach(element => {
                const fieldName = element.dataset.name;
                const instance = element.addRemoveInstance;
                if (instance) {
                    data[fieldName] = instance.getValue();
                }
            });

            console.log("Final collected data:", data);


            return data;
        }

        // Submit form
        async function submitForm(e) {
            e.preventDefault();

            if (!validateForm()) return;

            const submitData = collectFormData();
            console.log("submitData",submitData)

            setLoading(true);

            try {
                const response = await fetch(`http://localhost:5001/api/v1/update_profile/${userId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(submitData)
                });

                const result = await response.json();

                if (response.ok) {
                    showToast(result.message || 'Profile updated successfully', 'success');
                } else {
                    throw new Error(result.message || 'Failed to update profile');
                }
            } catch (error) {
                console.error('Update failed:', error);
                showToast(error.message || 'Failed to update profile', 'error');
            } finally {
                setLoading(false);
            }
        }

        // Initialize the application
        function init() {
            userId = getUserId();

            if (!userId) {
                showToast('User not found. Please login again.', 'error');
                return;
            }

            initAddRemoveLists();
            fetchDistributorData();

            // Bind form submit event
            const form = document.getElementById('updateProfileForm');
            form.addEventListener('submit', submitForm);
        }

        // Start the application when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>

</html>