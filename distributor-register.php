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