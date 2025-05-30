 <script src="assets/js/jquery-3.7.1.min.js"></script>
 <script src="assets/js/plugins.min.js"></script>
 <script src="assets/js/plugins/dsn-grid.min.js"></script>
 <script src="assets/js/custom.js"></script>

 <!-- <script>
  window.onload = function () {
    const currentPath = window.location.pathname;

    if (sessionStorage.getItem('refreshedPage') !== currentPath) {
      sessionStorage.setItem('refreshedPage', currentPath);

      setTimeout(() => {
        location.href = location.href; // safer than reload()
      }, 2000);
    }
  };
</script> -->


 <script>
   let currentStep = 1;
   let isLoading = false;

   // Enhanced logging function
   // function //logInfo(message, data = null) {
   //     console.log(`[DISTRIBUTOR FORM] ${message}`, data || '');
   // }

   // function logError(message, error = null) {
   //     console.error(`[DISTRIBUTOR FORM ERROR] ${message}`, error || '');
   // }

   // function logWarning(message, data = null) {
   //     console.warn(`[DISTRIBUTOR FORM WARNING] ${message}`, data || '');
   // }

   // Enhanced error handling wrapper
   function safeExecute(func, funcName) {
     try {
       //logInfo(`Executing ${funcName}`);
       return func();
     } catch (error) {
       logError(`Error in ${funcName}`, error);
       showToast(`An error occurred in ${funcName}. Please try again.`, 'error');
       return false;
     }
   }

   // Step navigation functions with enhanced logging
   function nextStep() {
     return safeExecute(() => {
       //logInfo('Attempting to move to next step', { currentStep });

       if (validateStep1()) {
         currentStep = 2;
         //logInfo('Validation successful, moving to step 2');
         updateStepDisplay();
         showToast('Step 1 completed successfully!', 'success');
         return true;
       } else {
         logWarning('Step 1 validation failed');
         return false;
       }
     }, 'nextStep');
   }

   function prevStep() {
     return safeExecute(() => {
       //logInfo('Moving to previous step', { currentStep });
       currentStep = 1;
       updateStepDisplay();
       showToast('Returned to Step 1', 'info');
       return true;
     }, 'prevStep');
   }

   function updateStepDisplay() {
     return safeExecute(() => {
       //logInfo('Updating step display', { currentStep });

       const elements = {
         step1: document.getElementById('step1'),
         step2: document.getElementById('step2'),
         step1Circle: document.getElementById('step1Circle'),
         step2Circle: document.getElementById('step2Circle'),
         stepLine: document.getElementById('stepLine'),
         step1Label: document.getElementById('step1Label'),
         step2Label: document.getElementById('step2Label')
       };

       // Check if all required elements exist
       const missingElements = Object.entries(elements)
         .filter(([key, element]) => !element)
         .map(([key]) => key);

       if (missingElements.length > 0) {
         logError('Missing DOM elements for step display', missingElements);
         alert('Error: Some form elements are missing. Please refresh the page.');
         return false;
       }

       if (currentStep === 1) {
         //logInfo('Displaying step 1');
         elements.step1.classList.remove('hidden');
         elements.step2.classList.add('hidden');

         elements.step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
         elements.step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-inactive';
         elements.stepLine.style.backgroundColor = '#d1d5db';

         elements.step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
         elements.step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
       } else {
         //logInfo('Displaying step 2');
         elements.step1.classList.add('hidden');
         elements.step2.classList.remove('hidden');

         elements.step1Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
         elements.step2Circle.className = 'hitesh-distributor-step-circle hitesh-distributor-step-active';
         elements.stepLine.style.backgroundColor = '#CF2732';

         elements.step1Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-inactive';
         elements.step2Label.className = 'hitesh-distributor-step-label hitesh-distributor-step-label-active';
       }

       //logInfo('Step display updated successfully');
       return true;
     }, 'updateStepDisplay');
   }

   // Enhanced validation function for step 1
   function validateStep1() {
     return safeExecute(() => {
       //logInfo('Starting Step 1 validation');

       const requiredFields = [
         'distributorEntityName',
         'constitutionEntity',
         'address',
         'city',

         'state',
         'pincode',
         'phoneNo',
         'email',
         'Password'
       ];

       let isValid = true;
       let firstErrorField = null;
       let errorCount = 0;
       let validationErrors = [];

       // Clear previous errors
       try {
         document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
         document.querySelectorAll('.error-field').forEach(el => el.classList.remove('error-field'));
         //logInfo('Previous errors cleared');
       } catch (error) {
         logError('Error clearing previous validation errors', error);
       }

       requiredFields.forEach(fieldName => {
         try {
           const field = document.getElementById(fieldName);
           const errorElement = document.getElementById(fieldName + '-error');

           if (!field) {
             logError(`Field not found: ${fieldName}`);
             validationErrors.push(`Field ${fieldName} not found in DOM`);
             return;
           }

           //logInfo(`Validating field: ${fieldName}`, { value: field.value?.substring(0, 20) + '...' });

           if (!field.value.trim()) {
             field.classList.add('error-field');
             if (errorElement) {
               errorElement.textContent = 'This field is required';
               errorElement.style.color = '#ef4444';
               errorElement.style.fontSize = '0.875rem';
             } else {
               logWarning(`Error element not found for field: ${fieldName}`);
             }
             isValid = false;
             errorCount++;
             validationErrors.push(`${fieldName} is required`);
             if (!firstErrorField) {
               firstErrorField = field;
             }
           } else {
             field.classList.remove('error-field');
             field.classList.add('success-field');

             // Additional validation with enhanced error handling
             if (fieldName === 'email' && !isValidEmail(field.value)) {
               field.classList.add('error-field');
               field.classList.remove('success-field');
               if (errorElement) errorElement.textContent = 'Please enter a valid email';
               isValid = false;
               errorCount++;
               validationErrors.push('Invalid email format');
               logWarning('Invalid email format', {
                 email: field.value
               });
             }

             // if (fieldName === 'phoneNo' && !isValidPhone(field.value)) {
             //     field.classList.add('error-field');
             //     field.classList.remove('success-field');
             //     if (errorElement) errorElement.textContent = 'Please enter a valid 10-digit phone number';
             //     isValid = false;
             //     errorCount++;
             //     validationErrors.push('Invalid phone number format');
             //     logWarning('Invalid phone format', { phone: field.value });
             // }

             // if (fieldName === 'pincode' && !isValidPincode(field.value)) {
             //     field.classList.add('error-field');
             //     field.classList.remove('success-field');
             //     if (errorElement) errorElement.textContent = 'Please enter a valid 6-digit pincode';
             //     isValid = false;
             //     errorCount++;
             //     validationErrors.push('Invalid pincode format');
             //     logWarning('Invalid pincode format', { pincode: field.value });
             // }

             if (fieldName === 'Password' && field.value.length < 6) {
               field.classList.add('error-field');
               field.classList.remove('success-field');
               if (errorElement) errorElement.textContent = 'Password must be at least 6 characters';
               isValid = false;
               errorCount++;
               validationErrors.push('Password too short');
               logWarning('Password too short', {
                 length: field.value.length
               });
             }
           }
         } catch (error) {
           logError(`Error validating field ${fieldName}`, error);
           validationErrors.push(`Validation error for ${fieldName}`);
           isValid = false;
         }
       });

       if (!isValid) {
         logError(`Validation failed with ${errorCount} errors`, validationErrors);
         showToast(`Please fix ${errorCount} error${errorCount > 1 ? 's' : ''} and try again`, 'error');

         if (firstErrorField) {
           try {
             firstErrorField.focus();
             firstErrorField.scrollIntoView({
               behavior: 'smooth',
               block: 'center'
             });
             //logInfo('Focused on first error field');
           } catch (error) {
             logError('Error focusing on first error field', error);
           }
         }

         // Show detailed error in console for debugging
         console.table(validationErrors);
       } else {
         //logInfo('All validations passed successfully');
       }

       return isValid;
     }, 'validateStep1');
   }

   // Enhanced validation helper functions
   function isValidEmail(email) {
     try {
       const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
       const result = emailRegex.test(email);
       //logInfo('Email validation', { email: email.substring(0, 20) + '...', isValid: result });
       return result;
     } catch (error) {
       logError('Error in email validation', error);
       return false;
     }
   }

   function isValidPhone(phone) {
     try {
       const phoneRegex = /^[0-9]{10}$/;
       const result = phoneRegex.test(phone);
       //logInfo('Phone validation', { phone: phone.substring(0, 5) + '...', isValid: result });
       return result;
     } catch (error) {
       logError('Error in phone validation', error);
       return false;
     }
   }

   function isValidPincode(pincode) {
     try {
       const pincodeRegex = /^[0-9]{6}$/;
       const result = pincodeRegex.test(pincode);
       //logInfo('Pincode validation', { pincode, isValid: result });
       return result;
     } catch (error) {
       logError('Error in pincode validation', error);
       return false;
     }
   }

   // Enhanced image preview functions
   function previewImages(input, previewId) {
     return safeExecute(() => {
       //logInfo('Starting image preview', { inputId: input.id, previewId, fileCount: input.files?.length });

       const previewContainer = document.getElementById(previewId);
       if (!previewContainer) {
         logError(`Preview container not found: ${previewId}`);
         alert('Error: Preview container not found. Please refresh the page.');
         return false;
       }

       previewContainer.innerHTML = '';

       if (input.files && input.files.length > 0) {
         if (input.files.length > 10) {
           logWarning('Too many files selected', {
             count: input.files.length
           });
           alert('Warning: You have selected more than 10 files. Only the first 10 will be processed.');
         }

         Array.from(input.files).slice(0, 10).forEach((file, index) => {
           if (!file.type.startsWith('image/')) {
             logWarning('Non-image file selected', {
               fileName: file.name,
               type: file.type
             });
             showToast(`File "${file.name}" is not an image and will be skipped`, 'warning');
             return;
           }

           if (file.size > 5 * 1024 * 1024) { // 5MB limit
             logWarning('File too large', {
               fileName: file.name,
               size: file.size
             });
             showToast(`File "${file.name}" is too large (max 5MB)`, 'warning');
             return;
           }

           const reader = new FileReader();
           reader.onload = function(e) {
             try {
               const previewItem = document.createElement('div');
               previewItem.className = 'preview-item';
               previewItem.innerHTML = `
                                    <img src="${e.target.result}" class="image-preview" alt="Preview ${index + 1}">
                                    <button type="button" class="remove-preview" onclick="removePreview(this, '${input.id}', ${index})">×</button>
                                `;
               previewContainer.appendChild(previewItem);
               //logInfo(`Image preview created for file ${index + 1}`, { fileName: file.name });
             } catch (error) {
               logError(`Error creating preview for file ${index + 1}`, error);
             }
           };

           reader.onerror = function(error) {
             logError(`Error reading file: ${file.name}`, error);
             showToast(`Error reading file: ${file.name}`, 'error');
           };

           reader.readAsDataURL(file);
         });
       } else {
         //logInfo('No files selected for preview');
       }

       return true;
     }, 'previewImages');
   }

   function previewSingleImage(input, previewId) {
     return safeExecute(() => {
       //logInfo('Starting single image preview', { inputId: input.id, previewId });

       const previewContainer = document.getElementById(previewId);
       if (!previewContainer) {
         logError(`Preview container not found: ${previewId}`);
         alert('Error: Preview container not found. Please refresh the page.');
         return false;
       }

       previewContainer.innerHTML = '';

       if (input.files && input.files[0]) {
         const file = input.files[0];

         if (!file.type.startsWith('image/')) {
           logError('Selected file is not an image', {
             fileName: file.name,
             type: file.type
           });
           alert('Please select a valid image file.');
           input.value = '';
           return false;
         }

         if (file.size > 5 * 1024 * 1024) { // 5MB limit
           logError('File too large', {
             fileName: file.name,
             size: file.size
           });
           alert('File is too large. Please select an image smaller than 5MB.');
           input.value = '';
           return false;
         }

         const reader = new FileReader();
         reader.onload = function(e) {
           try {
             const previewItem = document.createElement('div');
             previewItem.className = 'preview-item';
             previewItem.innerHTML = `
                                <img src="${e.target.result}" class="image-preview" alt="Preview">
                                <button type="button" class="remove-preview" onclick="removeSinglePreview(this, '${input.id}')">×</button>
                            `;
             previewContainer.appendChild(previewItem);
             //logInfo('Single image preview created successfully', { fileName: file.name });
           } catch (error) {
             logError('Error creating single image preview', error);
           }
         };

         reader.onerror = function(error) {
           logError(`Error reading file: ${file.name}`, error);
           alert(`Error reading file: ${file.name}`);
         };

         reader.readAsDataURL(file);
       } else {
         //logInfo('No file selected for single image preview');
       }

       return true;
     }, 'previewSingleImage');
   }

   function removePreview(button, inputId, index) {
     return safeExecute(() => {
       //logInfo('Removing image preview', { inputId, index });

       const input = document.getElementById(inputId);
       if (!input) {
         logError(`Input element not found: ${inputId}`);
         return false;
       }

       const dt = new DataTransfer();
       const files = Array.from(input.files);

       files.forEach((file, i) => {
         if (i !== index) {
           dt.items.add(file);
         }
       });

       input.files = dt.files;
       button.parentElement.remove();

       //logInfo('Image preview removed successfully', { remainingFiles: input.files.length });
       showToast('Image removed', 'info');
       return true;
     }, 'removePreview');
   }

   function removeSinglePreview(button, inputId) {
     return safeExecute(() => {
       //logInfo('Removing single image preview', { inputId });

       const input = document.getElementById(inputId);
       if (!input) {
         logError(`Input element not found: ${inputId}`);
         return false;
       }

       input.value = '';
       button.parentElement.remove();

       //logInfo('Single image preview removed successfully');
       showToast('Image removed', 'info');
       return true;
     }, 'removeSinglePreview');
   }

   // Enhanced dynamic field addition functions
   function addField(containerId, fieldName, placeholder, isTextarea = false) {
     return safeExecute(() => {
       //logInfo('Adding dynamic field', { containerId, fieldName, placeholder, isTextarea });

       const container = document.getElementById(containerId);
       if (!container) {
         logError(`Container not found: ${containerId}`);
         alert(`Error: Container ${containerId} not found. Please refresh the page.`);
         return false;
       }

       const div = document.createElement('div');
       div.className = 'hitesh-distributor-array-input';

       const inputElement = isTextarea ? 'textarea' : 'input';
       const inputType = isTextarea ? '' : 'type="text"';

       div.innerHTML = `
                    <${inputElement} ${inputType} name="${fieldName}[]" class="hitesh-distributor-${isTextarea ? 'textarea' : 'input'}" placeholder="${placeholder}" style="display: inline-block; width: calc(100% - 70px); margin-right: 10px;"></${inputElement}>
                    <button type="button" class="hitesh-distributor-remove-btn" onclick="removeField(this)">Remove</button>
                `;
       container.appendChild(div);

       // Focus on the new field
       const newInput = div.querySelector(inputElement);
       if (newInput) {
         newInput.focus();
       }

       //logInfo('Dynamic field added successfully');
       showToast(`${placeholder} field added`, 'success');
       return true;
     }, 'addField');
   }

   function addOwnerName() {
     return addField('ownerNames', 'ownerName', 'Owner Name');
   }

   function addCoverageArea() {
     return addField('coverageAreas', 'coverageArea', 'Coverage Area');
   }

   function addCoverageAreaDescription() {
     return addField('coverageAreaDescriptions', 'coverageAreaDescription', 'Description', true);
   }

   function addVehicleType() {
     return addField('typeOfVehicles', 'typeOfVehicles', 'Vehicle Type');
   }

   function addChannel() {
     return addField('channelsOfOperation', 'channelsOfOperation', 'Channel');
   }

   function addOperationType() {
     return addField('typesOfOperation', 'typesOfOperation', 'Operation Type');
   }

   function addBusinessOperation() {
     return addField('businessOperations', 'businessOperations', 'Business Operation');
   }

   function removeField(button) {
     return safeExecute(() => {
       //logInfo('Removing dynamic field');

       if (!button || !button.parentElement) {
         logError('Invalid button or parent element for field removal');
         return false;
       }

       const fieldValue = button.parentElement.querySelector('input, textarea')?.value;
       button.parentElement.remove();

       //logInfo('Dynamic field removed successfully', { fieldValue: fieldValue?.substring(0, 20) });
       showToast('Field removed', 'info');
       return true;
     }, 'removeField');
   }

   // Enhanced toast notification function
   function showToast(message, type = 'success') {
     return safeExecute(() => {
       //logInfo('Showing toast notification', { message, type });

       // Remove existing toasts
       try {
         document.querySelectorAll('.toast').forEach(toast => toast.remove());
       } catch (error) {
         logError('Error removing existing toasts', error);
       }

       const toast = document.createElement('div');
       toast.className = `toast toast-${type}`;
       toast.textContent = message;

       // Add some basic styling if not already defined
       if (!document.querySelector('style[data-toast-styles]')) {
         const style = document.createElement('style');
         style.setAttribute('data-toast-styles', 'true');
         style.textContent = `
                        .toast {
                            position: fixed; top: 20px; right: 20px; z-index: 10000;
                            padding: 12px 20px; border-radius: 4px; color: white;
                            font-family: Arial, sans-serif; font-size: 14px;
                            transition: opacity 0.3s ease;
                        }
                        .toast-success { background-color: #10b981; }
                        .toast-error { background-color: #ef4444; }
                        .toast-warning { background-color: #f59e0b; }
                        .toast-info { background-color: #3b82f6; }
                    `;
         document.head.appendChild(style);
       }

       document.body.appendChild(toast);

       // Auto remove after 5 seconds
       setTimeout(() => {
         if (toast.parentNode) {
           toast.style.opacity = '0';
           setTimeout(() => {
             if (toast.parentNode) {
               toast.remove();
               //logInfo('Toast notification removed');
             }
           }, 300);
         }
       }, 5000);

       return true;
     }, 'showToast');
   }

   // Form submission with enhanced error handling
   async function submitForm() {
     //logInfo('Starting form submission');

     if (isLoading) {
       logWarning('Form submission already in progress');
       showToast('Form submission in progress, please wait...', 'warning');
       return false;
     }

     try {
       isLoading = true;
       showToast('Submitting form...', 'info');

       // Collect all form data
       const formData = new FormData();

       // Step 1 data
       const step1Fields = [
         "distributorEntityName", "constitutionEntity", "address", "city", "state", "pincode", "location", "gstNo", "panNo", "FSSAINo", "phoneNo", "alternatePhoneNo", "email", "associatedCompany", "startingYear", "numberOfCustomers", "godownArea", "noOfEmployees", "noOfVehicles", "monthlyTurnOver", "website", "noOfRetailerOutlets", "customerFacilitiesProvided", "associationRegisteredAs", "nameOfHead", "numberOfHead", "nameOfExecutiveHead", "numberOfExecutiveHead", "memberOfAssociation", "noOfAssociation", "isERPUsed", "distributorAssociationName", "typeOfBusinessAssociation", "noOfMember", "type", "Password"

       ];
       step1Fields.forEach(fieldName => {
         const field = document.getElementById(fieldName);
         if (field) {
           const value = field.value;
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


       // Step 2 dynamic arrays
       const arrayFields = [{
           container: 'ownerNames',
           name: 'ownerName'
         },
         {
           container: 'coverageAreas',
           name: 'coverageArea'
         },
         {
           container: 'coverageAreaDescriptions',
           name: 'coverageAreaDescription'
         },
         {
           container: 'typeOfVehicles',
           name: 'typeOfVehicles'
         },
         {
           container: 'channelsOfOperation',
           name: 'channelsOfOperation'
         },
         {
           container: 'typesOfOperation',
           name: 'typesOfOperation'
         },
         {
           container: 'businessOperations',
           name: 'businessOperations'
         }
       ];

       arrayFields.forEach(({container, name}) => {
    const containerEl = document.getElementById(container);
    if (containerEl) {
        const inputs = containerEl.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            if (input.value.trim()) {
                // Append each value directly instead of JSON.stringify
                formData.append(`${name}[]`, input.value.trim());
            }
        });
        console.log(`Added ${name} values to form data`);
    }
});

       // File uploads
       const fileFields = [
         'officeAndGodownImage', 'gstImage', 'fssaiImage', 'partner1Image',
         'partner2Image', 'anyOtherDocImage'
       ];

       fileFields.forEach(fieldName => {
         const fileInput = document.getElementById(fieldName);
         if (fileInput && fileInput.files) {
           if (fileInput.multiple) {
             // Multiple files
             Array.from(fileInput.files).forEach((file, index) => {
               formData.append(`${fieldName}[${index}]`, file);
             });
             //logInfo(`Added ${fileInput.files.length} files for ${fieldName}`);
           } else {
             // Single file
             if (fileInput.files[0]) {
               formData.append(fieldName, fileInput.files[0]);
               //logInfo(`Added single file for ${fieldName}`);
             }
           }
         }
       });

       // Log total form data size
       let totalSize = 0;
       for (let pair of formData.entries()) {
         if (pair[1] instanceof File) {
           totalSize += pair[1].size;
         }
       }
       //logInfo(`Total form data size: ${(totalSize / 1024 / 1024).toFixed(2)} MB`);

       // Submit to API
       //logInfo('Sending POST request to API');
       const response = await fetch('http://localhost:5001/api/v1/create_distributor', {
         method: 'POST',
         body: formData,
         headers: {
           // Don't set Content-Type header - let browser set it with boundary for FormData
         }
       });

       logInfo('API response received', {
         status: response.status,
         statusText: response.statusText,
         ok: response.ok
       });

       if (!response.ok) {
         const errorText = await response.text();
         logError('API returned error response', {
           status: response.status,
           statusText: response.statusText,
           error: errorText
         });
         throw new Error(`Server error: ${response.status} - ${response.statusText}`);
       }

       const result = await response.json();
       //logInfo('Form submission successful', result);

       showToast('Distributor created successfully!', 'success');

       // Optional: Reset form or redirect
       // if (confirm('Distributor created successfully! Would you like to create another distributor?')) {
       //     // Reset form
       //     document.querySelectorAll('input, textarea, select').forEach(input => {
       //         if (input.type !== 'button' && input.type !== 'submit') {
       //             input.value = '';
       //             input.classList.remove('error-field', 'success-field');
       //         }
       //     });
       //     document.querySelectorAll('.preview-item').forEach(item => item.remove());
       //     currentStep = 1;
       //     updateStepDisplay();
       //     //logInfo('Form reset for new entry');
       // } else {
       //     // Could redirect to dashboard or show success page
       //     //logInfo('User chose not to create another distributor');
       // }

       return result;

     } catch (error) {
       logError('Form submission failed', error);

       if (error.name === 'TypeError' && error.message.includes('fetch')) {
         showToast('Network error: Please check your internet connection and server status', 'error');
         alert('Network Error: Unable to connect to the server. Please check:\n\n1. Your internet connection\n2. Server is running on localhost:5001\n3. CORS is properly configured on the server');
       } else if (error.message.includes('Server error')) {
         showToast('Server error: Please try again later', 'error');
         alert(`Server Error: ${error.message}\n\nPlease check the server logs for more details.`);
       } else {
         showToast('Submission failed: Please try again', 'error');
         alert(`Submission Error: ${error.message}\n\nPlease check the console for more details.`);
       }

       return false;
     } finally {
       isLoading = false;
       //logInfo('Form submission process completed');
     }
   }

   // Initialize the form when DOM is loaded
   document.addEventListener('DOMContentLoaded', function() {
     //logInfo('DOM loaded, initializing form');

     try {
       updateStepDisplay();
       //logInfo('Form initialized successfully');
       showToast('Form loaded successfully', 'success');
     } catch (error) {
       logError('Error initializing form', error);
       alert('Error initializing form. Please refresh the page.');
     }
   });

   // Global error handler
   window.addEventListener('error', function(event) {
     logError('Global error caught', {
       message: event.message,
       filename: event.filename,
       lineno: event.lineno,
       colno: event.colno,
       error: event.error
     });
     showToast('An unexpected error occurred. Please check the console for details.', 'error');
   });

   // Unhandled promise rejection handler
   window.addEventListener('unhandledrejection', function(event) {
     logError('Unhandled promise rejection', event.reason);
     showToast('An unexpected error occurred. Please try again.', 'error');
   });

   //logInfo('Distributor form script loaded successfully');
 </script>










<!-- retailer form  -->


 <script>
        // Form data management
        let formData = {
            distributorEntityName: "",
            constitutionEntity: "",
            address: "",
            city: "",
            state: "",
            pincode: "",
            location: "",
            gstNo: "",
            panNo: "",
            FSSAINo: "",
            ownerName: [""],
            phoneNo: "",
            alternatePhoneNo: "",
            email: "",
            website: "",
            startingYear: "",
            numberOfCustomers: "",
            godownArea: "",
            noOfRetailerOutlets: "",
            noOfEmployees: "",
            monthlyTurnOver: "",
            customerFacilitiesProvided: [""],
            businessOperations: [""],
            isERPUsed: "",
            distributorAssociationName: "",
            type: "Retailer",
            Password: ""
        };

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `hitesh-retailer-toast hitesh-retailer-toast-${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Dynamic list functions
        function addOwnerName() {
            const container = document.getElementById('ownerNamesList');
            const newItem = document.createElement('div');
            newItem.className = 'hitesh-retailer-list-item';
            newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input" placeholder="Owner Name">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeListItem(this)">Remove</button>
            `;
            container.appendChild(newItem);
        }

        function addCustomerFacility() {
            const container = document.getElementById('customerFacilitiesList');
            const newItem = document.createElement('div');
            newItem.className = 'hitesh-retailer-list-item';
            newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input" placeholder="Facility">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeListItem(this)">Remove</button>
            `;
            container.appendChild(newItem);
        }

        function addBusinessOperation() {
            const container = document.getElementById('businessOperationsList');
            const newItem = document.createElement('div');
            newItem.className = 'hitesh-retailer-list-item';
            newItem.innerHTML = `
                <input type="text" class="hitesh-retailer-list-input" placeholder="Operation">
                <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-remove" onclick="removeListItem(this)">Remove</button>
            `;
            container.appendChild(newItem);
        }

        function removeListItem(button) {
            button.parentElement.remove();
        }

        // Form submission
        document.getElementById('retailerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('hitesh-retailer-loading');
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;

            // Collect form data
            const formDataToSend = new FormData();
            
            // Collect basic form fields
            const inputs = this.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                if (input.name && input.value) {
                    formDataToSend.append(input.name, input.value);
                }
            });

            // Collect owner names
            const ownerInputs = document.querySelectorAll('#ownerNamesList input');
            ownerInputs.forEach(input => {
                if (input.value.trim()) {
                    formDataToSend.append('ownerName', input.value.trim());
                }
            });

            // Collect customer facilities
            const facilityInputs = document.querySelectorAll('#customerFacilitiesList input');
            facilityInputs.forEach(input => {
                if (input.value.trim()) {
                    formDataToSend.append('customerFacilitiesProvided', input.value.trim());
                }
            });

            // Collect business operations
            const operationInputs = document.querySelectorAll('#businessOperationsList input');
            operationInputs.forEach(input => {
                if (input.value.trim()) {
                    formDataToSend.append('businessOperations', input.value.trim());
                }
            });

            // Add type
            formDataToSend.append('type', 'Retailer');

            try {
                const response = await axios.post('http://localhost:5001/api/v1/create_distributor', formDataToSend);
                const data = response.data;

                if (data.success) {
                    showToast('Retailer created successfully!', 'success');
                    // Reset form
                    this.reset();
                    // Reset dynamic lists
                    document.getElementById('ownerNamesList').innerHTML = `
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Owner Name">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addOwnerName()">Add</button>
                        </div>
                    `;
                    document.getElementById('customerFacilitiesList').innerHTML = `
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Facility">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addCustomerFacility()">Add</button>
                        </div>
                    `;
                    document.getElementById('businessOperationsList').innerHTML = `
                        <div class="hitesh-retailer-list-item">
                            <input type="text" class="hitesh-retailer-list-input" placeholder="Operation">
                            <button type="button" class="hitesh-retailer-btn hitesh-retailer-btn-small hitesh-retailer-btn-add" onclick="addBusinessOperation()">Add</button>
                        </div>
                    `;
                } else {
                    showToast(data.message || "Something went wrong!", 'error');
                }
            } catch (error) {
                console.error("Error:", error);
                const errorMessage = error?.response?.data?.message || "Something went wrong!";
                showToast(errorMessage, 'error');
            } finally {
                submitBtn.classList.remove('hitesh-retailer-loading');
                submitBtn.textContent = 'Submit Registration';
                submitBtn.disabled = false;
            }
        });
    </script>














<!-- associated script  -->



<script>
        // Application state
        let currentStep = 1;
        let isLoading = false;
        let formData = {
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