<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association Profile</title>
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
            <h1 class="page-title">Association Profile</h1>
            <p class="page-subtitle">Update your association information</p>
        </div>

        <div class="profile-form">
            <div class="form-section">
                <div class="section-header">
                    <h2 class="section-title">Association Information</h2>
                    <div class="section-divider"></div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Association Name *</label>
                        <input type="text" id="distributorEntityName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Starting Year</label>
                        <input type="date" id="startingYear" class="form-input">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Address *</label>
                        <textarea id="address" class="form-textarea" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">City/Town *</label>
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
                        <label class="form-label">Location (G+ Code)</label>
                        <input type="text" id="location" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" id="email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Website</label>
                        <input type="url" id="website" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" id="phoneNo" class="form-input" pattern="[0-9]{10}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Head of Organization</label>
                        <input type="text" id="nameOfHead" class="form-input" placeholder="President/Chairman">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Head's Mobile Number</label>
                        <input type="tel" id="numberOfHead" class="form-input" pattern="[0-9]{10}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Executive Head</label>
                        <input type="text" id="nameOfExecutiveHead" class="form-input" placeholder="General Secretary">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Executive Head's Mobile</label>
                        <input type="tel" id="numberOfExecutiveHead" class="form-input" pattern="[0-9]{10}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Total Members</label>
                        <input type="number" id="noOfMember" class="form-input" min="0">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Associated With</label>
                        <input type="text" id="distributorAssociationName" class="form-input" placeholder="Type 'NO' if not associated">
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Who Can Be Members</label>
                        <div class="dynamic-list" id="memberOfAssociationList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add member type...">
                                <button type="button" class="add-btn" onclick="addToList('memberOfAssociationList')">Add</button>
                            </div>
                            <div class="list-items"></div>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Business Types Concerned</label>
                        <div class="dynamic-list" id="typeOfBusinessAssociationList">
                            <div class="list-input-container">
                                <input type="text" class="list-input" placeholder="Add business type...">
                                <button type="button" class="add-btn" onclick="addToList('typeOfBusinessAssociationList')">Add</button>
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
      showToast(result.message || "Association profile updated successfully!", "success")

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

// Add any association-specific initialization
document.addEventListener("DOMContentLoaded", () => {
  console.log("Association form initialized")
})

    </script>
</body>
</html>
