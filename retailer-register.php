<div class="hitesh-retailer-container">
        <div class="hitesh-retailer-form-wrapper">
            <div class="hitesh-retailer-header">
                <h1 class="hitesh-retailer-title">Retailer Registration Form</h1>
                <p class="hitesh-retailer-subtitle">Complete your registration details</p>
            </div>

            <form id="retailerForm">
                <!-- Basic Information -->
                <h2 class="hitesh-retailer-section-title">Basic Information</h2>
                
                <div class="hitesh-retailer-form-grid">
                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Distributor Entity Name *</label>
                        <input type="text" name="distributorEntityName" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Constitution Entity *</label>
                        <select name="constitutionEntity" class="hitesh-retailer-select" required>
                            <option value="">Select Constitution</option>
                            <option value="Proprietorship">Proprietorship</option>
                            <option value="Partnership">Partnership</option>
                            <option value="Private Limited">Private Limited</option>
                            <option value="Public Limited">Public Limited</option>
                            <option value="LLP">LLP</option>
                        </select>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Address *</label>
                        <textarea name="address" class="hitesh-retailer-textarea" required></textarea>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">City *</label>
                        <input type="text" name="city" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">State *</label>
                        <input type="text" name="state" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Pincode *</label>
                        <input type="text" name="pincode" class="hitesh-retailer-input" pattern="[0-9]{6}" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Location</label>
                        <input type="text" name="location" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">GST Number *</label>
                        <input type="text" name="gstNo" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">PAN Number *</label>
                        <input type="text" name="panNo" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">FSSAI Number</label>
                        <input type="text" name="FSSAINo" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Phone Number *</label>
                        <input type="tel" name="phoneNo" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Alternate Phone Number</label>
                        <input type="tel" name="alternatePhoneNo" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Email *</label>
                        <input type="email" name="email" class="hitesh-retailer-input" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Website</label>
                        <input type="url" name="website" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Starting Year *</label>
                        <input type="number" name="startingYear" class="hitesh-retailer-input" min="1900" max="2024" required>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Password *</label>
                        <input type="password" name="Password" class="hitesh-retailer-input" required>
                    </div>
                </div>

                <!-- Owner Names -->
                <h2 class="hitesh-retailer-section-title">Owner Information</h2>
                <div class="hitesh-retailer-form-group">
                    <label class="hitesh-retailer-label">Owner Names</label>
                    <div id="ownerNamesList" class="hitesh-retailer-dynamic-list">
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Owner Name">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addOwnerName()">Add</button>
                        </div>
                    </div>
                </div>

                <!-- Business Details -->
                <h2 class="hitesh-retailer-section-title">Business Details</h2>
                
                <div class="hitesh-retailer-form-grid">
                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Number of Customers</label>
                        <input type="number" name="numberOfCustomers" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Godown Area (sq ft)</label>
                        <input type="number" name="godownArea" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Number of Retailer Outlets</label>
                        <input type="number" name="noOfRetailerOutlets" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Number of Employees</label>
                        <input type="number" name="noOfEmployees" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Monthly Turnover</label>
                        <input type="number" name="monthlyTurnOver" class="hitesh-retailer-input">
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Is ERP Used?</label>
                        <select name="isERPUsed" class="hitesh-retailer-select">
                            <option value="">Select Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="hitesh-retailer-form-group">
                        <label class="hitesh-retailer-label">Distributor Association Name</label>
                        <input type="text" name="distributorAssociationName" class="hitesh-retailer-input">
                    </div>
                </div>

                <!-- Customer Facilities -->
                <div class="hitesh-retailer-form-group">
                    <label class="hitesh-retailer-label">Customer Facilities Provided</label>
                    <div id="customerFacilitiesList" class="hitesh-retailer-dynamic-list">
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Facility">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addCustomerFacility()">Add</button>
                        </div>
                    </div>
                </div>

                <!-- Business Operations -->
                <div class="hitesh-retailer-form-group">
                    <label class="hitesh-retailer-label">Business Operations</label>
                    <div id="businessOperationsList" class="hitesh-retailer-dynamic-list">
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Operation">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addBusinessOperation()">Add</button>
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 32px;">
                    <button type="submit" class="hitesh-retailer-btn hitesh-retailer-btn-primary" id="submitBtn">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>
    </div>