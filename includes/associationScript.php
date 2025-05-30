 <!-- associated script  -->



 <script>
  // Application state
  let currentStep = 1;
  let isLoading = false;
  let formDataAssociation = {
    distributorEntityName: "",
    associationRegisteredAs: [],
    address: "",
    city: "",
    state: "",
    pincode: "",
    location: "",
    email: "",
    website: "",
    phoneNo: "",
    nameOfHead: "",
    numberOfHead: "",
    nameOfExecutiveHead: "",
    numberOfExecutiveHead: "",
    memberOfAssociation: [],
    noOfMember: "",
    typeOfBusinessAssociation: [],
    distributorAssociationName: "",
    type: "Association",
    Password: "",
  };

  // Toast notification function
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `hitesh-association-toast hitesh-association-toast-${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => document.body.removeChild(toast), 300);
    }, 3000);
  }

  // Step navigation functions
  function showStep(step) {
    document.getElementById('step1').classList.toggle('hitesh-association-hidden', step !== 1);
    document.getElementById('step2').classList.toggle('hitesh-association-hidden', step !== 2);
    currentStep = step;
  }

  // Form data collection functions
  function getCheckboxValues(name) {
    const checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`);
    return Array.from(checkboxes).map(cb => cb.value);
  }

  function collectFormData() {
    const form = document.getElementById('associationForm');
    const data = new FormData();

    // Collect text inputs
    const textInputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="url"], input[type="password"], input[type="number"], textarea');
    textInputs.forEach(input => {
      if (input.value.trim()) {
        data.append(input.name, input.value.trim());
      }
    });

    // Collect checkbox arrays
    const checkboxGroups = ['associationRegisteredAs', 'memberOfAssociation', 'typeOfBusinessAssociation'];
    checkboxGroups.forEach(group => {
      const values = getCheckboxValues(group);
      values.forEach(value => data.append(group, value));
    });

    // Collect files
    const fileInputs = form.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
      if (input.files[0]) {
        data.append(input.name, input.files[0]);
      }
    });

    // Add type
    data.append('type', 'Association');

    return data;
  }

  // Form validation
  function validateStep1() {
    const requiredFields = ['distributorEntityName', 'distributorAssociationName', 'email', 'phoneNo', 'city', 'state', 'pincode', 'address', 'nameOfHead', 'Password'];

    for (const field of requiredFields) {
      const input = document.getElementById(field);
      if (!input.value.trim()) {
        showToast(`Please fill in the ${field.replace(/([A-Z])/g, ' $1').toLowerCase()}`, 'error');
        input.focus();
        return false;
      }
    }

    // Validate email
    const email = document.getElementById('email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      showToast('Please enter a valid email address', 'error');
      document.getElementById('email').focus();
      return false;
    }

    return true;
  }

  // Form submission
  async function handleSubmit(e) {
    e.preventDefault();

    if (isLoading) return;

    isLoading = true;
    const submitButton = document.getElementById('submitButton');
    const submitText = document.getElementById('submitText');

    submitButton.disabled = true;
    submitText.innerHTML = '<span class="hitesh-association-loading"></span>Submitting...';

    try {
      const formDataToSend = collectFormData();

      // Note: Replace with your actual API endpoint
      const response = await fetch('http://localhost:5001/api/v1/create_distributor', {
        method: 'POST',
        body: formDataToSend
      });

      const data = await response.json();

      if (data.success) {
        showToast('Association created successfully!', 'success');
        // Reset form
        document.getElementById('associationForm').reset();
        showStep(1);
      } else {
        showToast(data.message || 'Something went wrong!', 'error');
      }
    } catch (error) {
      console.error('Error:', error);
      showToast(error.message || 'Something went wrong!', 'error');
    } finally {
      isLoading = false;
      submitButton.disabled = false;
      submitText.textContent = 'Submit Association';
    }
  }

  // Event listeners
  document.addEventListener('DOMContentLoaded', function() {
    // Next button
    document.getElementById('nextButton').addEventListener('click', function() {
      if (validateStep1()) {
        showStep(2);
      }
    });

    // Previous button
    document.getElementById('prevButton').addEventListener('click', function() {
      showStep(1);
    });

    // Form submission
    document.getElementById('associationForm').addEventListener('submit', handleSubmit);

    // Initialize
    showStep(1);
  });
</script>
