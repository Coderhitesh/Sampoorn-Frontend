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










 <!-- retailer form  -->


 <script  defer>
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
   document.addEventListener('DOMContentLoaded', function() {
     const form = document.getElementById('retailerForm');
     if (form) {
       form.addEventListener('submit', async function(e) {
         e.preventDefault();
         console.log("i am hit");

         const submitBtn = document.getElementById('submit-retailerBtn');
         submitBtn.classList.add('hitesh-retailer-loading');
         submitBtn.textContent = 'Submitting...';
         submitBtn.disabled = true;

         const formDataToSend = new FormData();

         const inputs = this.querySelectorAll('input, select, textarea');
         inputs.forEach(input => {
           if (input.name && input.value) {
             formDataToSend.append(input.name, input.value);
           }
         });

         const ownerInputs = document.querySelectorAll('#ownerNamesList input');
         ownerInputs.forEach(input => {
           if (input.value.trim()) {
             formDataToSend.append('ownerName', input.value.trim());
           }
         });

         const facilityInputs = document.querySelectorAll('#customerFacilitiesList input');
         facilityInputs.forEach(input => {
           if (input.value.trim()) {
             formDataToSend.append('customerFacilitiesProvided', input.value.trim());
           }
         });

         const operationInputs = document.querySelectorAll('#businessOperationsList input');
         operationInputs.forEach(input => {
           if (input.value.trim()) {
             formDataToSend.append('businessOperations', input.value.trim());
           }
         });

         formDataToSend.append('type', 'Retailer');

         try {
           const response = await axios.post('http://localhost:5001/api/v1/create_distributor', formDataToSend);
           const data = response.data;

           if (data.success) {
             showToast('Retailer created successfully!', 'success');
             this.reset();
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
     } else {
       console.error("Form element with id 'retailerForm' not found in DOM");
     }
   });
 </script>