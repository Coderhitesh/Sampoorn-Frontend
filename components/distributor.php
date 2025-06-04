<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributor Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Toast Container -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner">
            <div class="spinner"></div>
            <p class="loading-text">Loading...</p>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <button class="back-btn" onclick="goBack()">← Back</button>
            <h1 class="page-title">Distributor Profile</h1>
            <p class="page-subtitle">Update your distributor business information</p>
        </div>

        <div class="profile-form">
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">Business Information</h2>
                    <div class="section-divider"></div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Distributor Entity Name *</label>
                        <input type="text" id="distributorEntityName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Constitution of Entity *</label>
                        <select id="constitutionEntity" class="form-select" required>
                            <option value="">Select Constitution</option>
                            <option value="proprietorship">Proprietorship</option>
                            <option value="partnership">Partnership</option>
                            <option value="company">Company</option>
                            <option value="llp">LLP</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Address *</label>
                        <textarea id="address" class="form-textarea" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">City *</label>
                        <input type="text" id="city" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">State *</label>
                        <input type="text" id="state" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pincode *</label>
                        <input type="text" id="pincode" class="form-input" pattern="[0-9]{6}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <input type="text" id="location" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">GST Number</label>
                        <input type="text" id="gstNo" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">PAN Number</label>
                        <input type="text" id="panNo" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">FSSAI Number</label>
                        <input type="text" id="FSSAINo" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" id="phoneNo" class="form-input" pattern="[0-9]{10}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Alternate Phone Number</label>
                        <input type="tel" id="alternatePhoneNo" class="form-input" pattern="[0-9]{10}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" id="email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Associated Company</label>
                        <input type="text" id="associatedCompany" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Coverage Area Description</label>
                        <input type="text" id="coverageAreaDescription" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Starting Year</label>
                        <input type="number" id="startingYear" class="form-input" min="1900" max="2024">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Customers</label>
                        <input type="number" id="numberOfCustomers" class="form-input" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Godown Area (sq.ft.)</label>
                        <input type="number" id="godownArea" class="form-input" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Employees</label>
                        <input type="number" id="noOfEmployees" class="form-input" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Number of Vehicles</label>
                        <input type="number" id="noOfVehicles" class="form-input" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Type of Vehicles</label>
                        <input type="text" id="typeOfVehicles" class="form-input" placeholder="e.g., Tata Ace, Mahindra Bolero">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Monthly Average Turnover</label>
                        <input type="text" id="monthlyTurnOver" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">ERP/Billing Software</label>
                        <input type="text" id="isERPUsed" class="form-input">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Distributor Association Name</label>
                        <input type="text" id="distributorAssociationName" class="form-input" placeholder="Type 'NO' if not associated">
                    </div>

                    <!-- Dynamic Lists -->
                    <div class="form-group full-width">
                        <label class="form-label">Coverage Areas</label>
                        <div class="dynamic-list" id="coverageAreaList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add coverage area...">
                                <button type="button" class="add-btn" onclick="addToList('coverageAreaList')">Add</button>
                            </div>
                            <div class="list-items"></div>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Channels of Operation</label>
                        <div class="dynamic-list" id="channelsOfOperationList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add channel...">
                                <button type="button" class="add-btn" onclick="addToList('channelsOfOperationList')">Add</button>
                            </div>
                            <div class="list-items"></div>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Types of Operation</label>
                        <div class="dynamic-list" id="typesOfOperationList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add operation type...">
                                <button type="button" class="add-btn" onclick="addToList('typesOfOperationList')">Add</button>
                            </div>
                            <div class="list-items"></div>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Business Operations</label>
                        <div class="dynamic-list" id="businessOperationsList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add business operation...">
                                <button type="button" class="add-btn" onclick="addToList('businessOperationsList')">Add</button>
                            </div>
                            <div class="list-items"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="submit-btn" id="updateBtn" onclick="updateProfile()">
                    <span class="btn-icon">💾</span>
                    <span class="btn-text">Update Profile</span>
                    <div class="btn-spinner hidden"></div>
                </button>
            </div>
        </div>
    </div>

    <script src="utils.js"></script>
    <script>
        window.updateProfile =async function() {
  if (!validateForm()) {
    showToast("Please fix the errors in the form", "error")
    return
  }

  const userId = getUserId()
  if (!userId) {
    showToast("User ID not found. Please login again.", "error")
    return
  }

  const formData = collectFormData()

  if (Object.keys(formData).length === 0) {
    showToast("No data to update", "warning")
    return
  }

  setButtonLoading("updateBtn", true)
  showLoading(true, "Updating your profile...")

  try {
    const response = await fetch(`https://api.sampoornmarketing.com/api/v1/update_profile/${userId}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    })

    const result = await response.json()

    if (response.ok) {
      showToast(result.message || "Distributor profile updated successfully!", "success")

      // Reload profile after successful update
      setTimeout(() => {
        loadUserProfile()
      }, 1000)
    } else {
      throw new Error(result.message || "Failed to update profile")
    }
  } catch (error) {
    console.error("Update failed:", error)
    showToast(`Update failed: ${error.message}`, "error")
  } finally {
    setButtonLoading("updateBtn", false)
    showLoading(false)
  }
}

// Add any distributor-specific initialization
document.addEventListener("DOMContentLoaded", () => {
  console.log("Distributor form initialized")
})

    </script>
</body>
</html>
