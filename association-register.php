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
                            <label class="hitesh-association-label" for="nameOfHead">Name of Head *</label>
                            <input type="text" id="nameOfHead" name="nameOfHead" class="hitesh-association-input" required>
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="numberOfHead">Number of Head</label>
                            <input type="text" id="numberOfHead" name="numberOfHead" class="hitesh-association-input">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="nameOfExecutiveHead">Name of Executive Head</label>
                            <input type="text" id="nameOfExecutiveHead" name="nameOfExecutiveHead" class="hitesh-association-input">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="numberOfExecutiveHead">Number of Executive Head</label>
                            <input type="text" id="numberOfExecutiveHead" name="numberOfExecutiveHead" class="hitesh-association-input">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="noOfMember">Number of Members</label>
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
                        <button type="button" id="nextButton" class="hitesh-association-button hitesh-association-button-primary">Next Step</button>
                    </div>
                </div>

                <!-- Step 2: Document Upload -->
                <div id="step2" class="hitesh-association-step-container hitesh-association-hidden">
                    <h2 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 24px;">Document Upload</h2>
                    
                    <div class="hitesh-association-grid">
                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="registrationCertificate">Registration Certificate</label>
                            <input type="file" id="registrationCertificate" name="registrationCertificate" class="hitesh-association-input" accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="panCard">PAN Card</label>
                            <input type="file" id="panCard" name="panCard" class="hitesh-association-input" accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="gstCertificate">GST Certificate</label>
                            <input type="file" id="gstCertificate" name="gstCertificate" class="hitesh-association-input" accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <div class="hitesh-association-form-group">
                            <label class="hitesh-association-label" for="bankStatement">Bank Statement</label>
                            <input type="file" id="bankStatement" name="bankStatement" class="hitesh-association-input" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>

                    <div class="hitesh-association-button-group">
                        <button type="button" id="prevButton" class="hitesh-association-button hitesh-association-button-secondary">Previous</button>
                        <button type="submit" id="submitButton" class="hitesh-association-button hitesh-association-button-primary">
                            <span id="submitText">Submit Association</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>