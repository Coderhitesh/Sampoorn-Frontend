// Utility functions shared across all pages

// Get user ID from session storage
function getUserId() {
  try {
    const user = sessionStorage.getItem("user")
    if (user) {
      const parsedUser = JSON.parse(user)
      return parsedUser._id
    }
  } catch (error) {
    console.error("Error parsing user data:", error)
  }
  return null
}

// Show/hide loading overlay
function showLoading(show = true, message = "Loading...") {
  const overlay = document.getElementById("loadingOverlay")
  const loadingText = overlay.querySelector(".loading-text")

  if (show) {
    loadingText.textContent = message
    overlay.style.display = "flex"
    document.body.style.overflow = "hidden"
  } else {
    overlay.style.display = "none"
    document.body.style.overflow = "auto"
  }
}

// Show toast notification
function showToast(message, type = "success") {
  const container = document.getElementById("toastContainer")
  const toast = document.createElement("div")
  toast.className = `toast ${type}`
  toast.textContent = message

  container.appendChild(toast)

  setTimeout(() => toast.classList.add("show"), 100)

  setTimeout(() => {
    toast.classList.remove("show")
    setTimeout(() => {
      if (container.contains(toast)) {
        container.removeChild(toast)
      }
    }, 400)
  }, 5000)
}

// Go back to main page
function goBack() {
  window.location.href = "../profile.php"
}

// Set button loading state
function setButtonLoading(buttonId, loading = false) {
  const btn = document.getElementById(buttonId)
  const btnText = btn.querySelector(".btn-text")
  const btnIcon = btn.querySelector(".btn-icon")
  const btnSpinner = btn.querySelector(".btn-spinner")

  if (loading) {
    btn.disabled = true
    btnText.textContent = "Updating..."
    btnIcon.style.display = "none"
    btnSpinner.classList.remove("hidden")
  } else {
    btn.disabled = false
    btnText.textContent = "Update Profile"
    btnIcon.style.display = "inline"
    btnSpinner.classList.add("hidden")
  }
}

// Dynamic list management
const dynamicLists = {}

function addToList(listId) {
  const listContainer = document.getElementById(listId)
  const input = listContainer.querySelector(".list-input")
  const itemsContainer = listContainer.querySelector(".list-items")

  const value = input.value.trim()
  if (!value) return

  if (!dynamicLists[listId]) {
    dynamicLists[listId] = []
  }

  if (dynamicLists[listId].includes(value)) {
    showToast("Item already exists", "warning")
    return
  }

  dynamicLists[listId].push(value)
  input.value = ""
  renderListItems(listId)
}

function removeFromList(listId, value) {
  if (dynamicLists[listId]) {
    dynamicLists[listId] = dynamicLists[listId].filter((item) => item !== value)
    renderListItems(listId)
  }
}

function renderListItems(listId) {
  const listContainer = document.getElementById(listId)
  const itemsContainer = listContainer.querySelector(".list-items")

  itemsContainer.innerHTML = ""

  if (dynamicLists[listId]) {
    dynamicLists[listId].forEach((item) => {
      const itemElement = document.createElement("div")
      itemElement.className = "list-item"
      itemElement.innerHTML = `
        <span>${item}</span>
        <button type="button" class="remove-btn" onclick="removeFromList('${listId}', '${item}')" title="Remove item">×</button>
      `
      itemsContainer.appendChild(itemElement)
    })
  }
}

function setListItems(listId, items) {
  dynamicLists[listId] = Array.isArray(items) ? [...items] : []
  renderListItems(listId)
}

function getListItems(listId) {
  return dynamicLists[listId] || []
}

// Form validation
function validateForm() {
  const requiredFields = document.querySelectorAll("[required]")
  let isValid = true
  let firstInvalidField = null

  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      field.style.borderColor = "#ef4444"
      isValid = false
      if (!firstInvalidField) {
        firstInvalidField = field
      }
    } else {
      field.style.borderColor = "#10b981"
    }
  })

  // Validate phone numbers
  const phoneFields = document.querySelectorAll('input[type="tel"]')
  phoneFields.forEach((field) => {
    if (field.value && !/^\d{10}$/.test(field.value)) {
      field.style.borderColor = "#ef4444"
      isValid = false
      if (!firstInvalidField) {
        firstInvalidField = field
      }
      showToast("Please enter valid 10-digit phone numbers", "error")
    }
  })

  // Validate email
  const emailFields = document.querySelectorAll('input[type="email"]')
  emailFields.forEach((field) => {
    if (field.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
      field.style.borderColor = "#ef4444"
      isValid = false
      if (!firstInvalidField) {
        firstInvalidField = field
      }
      showToast("Please enter valid email addresses", "error")
    }
  })

  // Validate pincode
  const pincodeFields = document.querySelectorAll('input[id="pincode"]')
  pincodeFields.forEach((field) => {
    if (field.value && !/^\d{6}$/.test(field.value)) {
      field.style.borderColor = "#ef4444"
      isValid = false
      if (!firstInvalidField) {
        firstInvalidField = field
      }
      showToast("Please enter valid 6-digit pincode", "error")
    }
  })

  if (!isValid && firstInvalidField) {
    firstInvalidField.scrollIntoView({ behavior: "smooth", block: "center" })
    firstInvalidField.focus()
  }

  return isValid
}

// Collect form data
function collectFormData() {
  const data = {}

  // Get all form inputs
  const inputs = document.querySelectorAll("input, select, textarea")
  inputs.forEach((input) => {
    if (input.value.trim()) {
      data[input.id] = input.value.trim()
    }
  })

  // Get dynamic list data
  Object.keys(dynamicLists).forEach((listId) => {
    const fieldName = listId.replace("List", "")
    if (dynamicLists[listId] && dynamicLists[listId].length > 0) {
      data[fieldName] = dynamicLists[listId]
    }
  })

  return data
}

// Populate form with data
function populateForm(data) {
  Object.keys(data).forEach((key) => {
    const element = document.getElementById(key)
    if (element && data[key] !== null && data[key] !== undefined) {
      if (key === "startingYear" && typeof data[key] === "string" && data[key].includes("T")) {
        element.value = data[key].split("T")[0]
      } else if (typeof data[key] === "string" || typeof data[key] === "number") {
        element.value = data[key]
      }
    }
  })

  // Populate dynamic lists
  const listMappings = {
    coverageArea: "coverageAreaList",
    channelsOfOperation: "channelsOfOperationList",
    typesOfOperation: "typesOfOperationList",
    businessOperations: "businessOperationsList",
    customerFacilitiesProvided: "customerFacilitiesProvidedList",
    memberOfAssociation: "memberOfAssociationList",
    typeOfBusinessAssociation: "typeOfBusinessAssociationList",
  }

  Object.keys(listMappings).forEach((fieldName) => {
    const listId = listMappings[fieldName]
    if (Array.isArray(data[fieldName]) && data[fieldName].length > 0) {
      setListItems(listId, data[fieldName])
    }
  })
}

// Load user profile
async function loadUserProfile() {
  const userId = getUserId()
  if (!userId) {
    showToast("User ID not found. Please login again.", "error")
    return
  }

  showLoading(true, "Loading your profile...")

  try {
    const response = await fetch(`https://api.sampoornmarketing.com/api/v1/get_distributor_by_id/${userId}`)

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`)
    }

    const result = await response.json()

    if (result.success !== false && result.data) {
      populateForm(result.data)
      showToast("Profile loaded successfully", "success")
    } else {
      throw new Error(result.message || "Failed to load profile")
    }
  } catch (error) {
    console.error("Error loading profile:", error)
    showToast(`Failed to load profile: ${error.message}`, "error")
  } finally {
    showLoading(false)
  }
}

// Initialize page
function initializePage() {
  // Load user profile when page loads
  loadUserProfile()

  // Add enter key listeners to list inputs
  const listInputs = document.querySelectorAll(".list-input")
  listInputs.forEach((input) => {
    input.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        e.preventDefault()
        const listContainer = input.closest(".dynamic-list")
        const listId = listContainer.id
        addToList(listId)
      }
    })
  })
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", initializePage)
