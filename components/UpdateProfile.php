<?php
// Initialize form data with default values or from database/session
$formData = [
    'distributorEntityName' => '',
    'constitutionEntity' => '',
    'address' => '',
    'city' => '',
    'state' => '',
    'pincode' => '',
    'location' => '',
    'gstNo' => '',
    'panNo' => '',
    'FSSAINo' => '',
    'phoneNo' => '',
    'alternatePhoneNo' => '',
    'email' => '',
    'associatedCompany' => '',
    'coverageAreaDescription' => '',
    'startingYear' => '',
    'numberOfCustomers' => '',
    'godownArea' => '',
    'noOfEmployees' => '',
    'noOfVehicles' => '',
    'typeOfVehicles' => '',
    'monthlyTurnOver' => '',
    'isERPUsed' => '',
    'distributorAssociationName' => '',
    'coverageArea' => [],
    'channelsOfOperation' => [],
    'typesOfOperation' => [],
    'businessOperations' => []
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    foreach ($formData as $key => $value) {
        if (isset($_POST[$key])) {
            if (is_array($value)) {
                // Handle multi-select fields
                $formData[$key] = $_POST[$key];
            } else {
                $formData[$key] = trim($_POST[$key]);
            }
        }
    }
    
    // Here you would typically save the data to database
    // Example: saveUserProfile($formData);
    
    $successMessage = "Profile updated successfully!";
}

// Options for multi-select fields
$options = [
    'coverageArea' => [
        ['value' => 'urban', 'label' => 'Urban'],
        ['value' => 'rural', 'label' => 'Rural'],
        ['value' => 'suburban', 'label' => 'Suburban'],
        ['value' => 'metropolitan', 'label' => 'Metropolitan']
    ],
    'channelsOfOperation' => [
        ['value' => 'retail', 'label' => 'Retail'],
        ['value' => 'wholesale', 'label' => 'Wholesale'],
        ['value' => 'online', 'label' => 'Online'],
        ['value' => 'b2b', 'label' => 'B2B']
    ],
    'typesOfOperation' => [
        ['value' => 'distribution', 'label' => 'Distribution'],
        ['value' => 'warehousing', 'label' => 'Warehousing'],
        ['value' => 'logistics', 'label' => 'Logistics'],
        ['value' => 'sales', 'label' => 'Sales']
    ],
    'businessOperations' => [
        ['value' => 'food_beverage', 'label' => 'Food & Beverage'],
        ['value' => 'fmcg', 'label' => 'FMCG'],
        ['value' => 'pharmaceutical', 'label' => 'Pharmaceutical'],
        ['value' => 'electronics', 'label' => 'Electronics']
    ]
];

function renderMultiSelect($name, $options, $selectedValues = []) {
    $html = "<div class='multi-select-container'>";
    $html .= "<select name='{$name}[]' multiple class='multi-select mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500' data-name='{$name}'>";
    
    foreach ($options as $option) {
        $selected = in_array($option['value'], $selectedValues) ? 'selected' : '';
        $html .= "<option value='{$option['value']}' {$selected}>{$option['label']}</option>";
    }
    
    $html .= "</select>";
    $html .= "<div class='selected-items mt-2'></div>";
    $html .= "</div>";
    
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .multi-select {
            height: auto !important;
            min-height: 42px;
        }
        .multi-select option:checked {
            background-color: #3b82f6;
            color: white;
        }
        .selected-tag {
            display: inline-block;
            background-color: #e5e7eb;
            padding: 2px 8px;
            margin: 2px;
            border-radius: 4px;
            font-size: 12px;
        }
        .selected-tag button {
            margin-left: 4px;
            color: #6b7280;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="max-w-4xl p-6">
        <?php if (isset($successMessage)): ?>
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                <?= htmlspecialchars($successMessage) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <!-- Basic Information -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">
                        Distributor Entity Name
                    </label>
                    <input
                        type="text"
                        name="distributorEntityName"
                        value="<?= htmlspecialchars($formData['distributorEntityName']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">
                        Constitution of the entity
                    </label>
                    <select
                        name="constitutionEntity"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="">Select Type</option>
                        <option value="Proprietor" <?= $formData['constitutionEntity'] === 'Proprietor' ? 'selected' : '' ?>>Proprietor</option>
                        <option value="Partnership / LLP" <?= $formData['constitutionEntity'] === 'Partnership / LLP' ? 'selected' : '' ?>>Partnership / LLP</option>
                        <option value="Private Limited" <?= $formData['constitutionEntity'] === 'Private Limited' ? 'selected' : '' ?>>Private Limited</option>
                        <option value="Limited" <?= $formData['constitutionEntity'] === 'Limited' ? 'selected' : '' ?>>Limited</option>
                    </select>
                </div>

                <!-- Address Fields -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea
                        name="address"
                        rows="3"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    ><?= htmlspecialchars($formData['address']) ?></textarea>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <input
                        type="text"
                        name="city"
                        value="<?= htmlspecialchars($formData['city']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">State</label>
                    <input
                        type="text"
                        name="state"
                        value="<?= htmlspecialchars($formData['state']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Pincode</label>
                    <input
                        type="text"
                        name="pincode"
                        value="<?= htmlspecialchars($formData['pincode']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <input
                        type="text"
                        name="location"
                        value="<?= htmlspecialchars($formData['location']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">GST No.</label>
                    <input
                        type="text"
                        name="gstNo"
                        value="<?= htmlspecialchars($formData['gstNo']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">PAN No.</label>
                    <input
                        type="text"
                        name="panNo"
                        value="<?= htmlspecialchars($formData['panNo']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">FSSAI No.</label>
                    <input
                        type="text"
                        name="FSSAINo"
                        value="<?= htmlspecialchars($formData['FSSAINo']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <!-- Contact Information -->
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="tel"
                        name="phoneNo"
                        value="<?= htmlspecialchars($formData['phoneNo']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Alternate Phone No.</label>
                    <input
                        type="tel"
                        name="alternatePhoneNo"
                        value="<?= htmlspecialchars($formData['alternatePhoneNo']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="<?= htmlspecialchars($formData['email']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Associated Company</label>
                    <input
                        type="text"
                        name="associatedCompany"
                        value="<?= htmlspecialchars($formData['associatedCompany']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Coverage Area Description</label>
                    <input
                        type="text"
                        name="coverageAreaDescription"
                        value="<?= htmlspecialchars($formData['coverageAreaDescription']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Starting Year</label>
                    <input
                        type="text"
                        name="startingYear"
                        value="<?= htmlspecialchars($formData['startingYear']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Number Of Customers</label>
                    <input
                        type="number"
                        name="numberOfCustomers"
                        value="<?= htmlspecialchars($formData['numberOfCustomers']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Godown Area (sq.ft.)</label>
                    <input
                        type="number"
                        name="godownArea"
                        value="<?= htmlspecialchars($formData['godownArea']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Number of employees</label>
                    <input
                        type="number"
                        name="noOfEmployees"
                        value="<?= htmlspecialchars($formData['noOfEmployees']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">No Of Vehicles</label>
                    <input
                        type="number"
                        name="noOfVehicles"
                        value="<?= htmlspecialchars($formData['noOfVehicles']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Type of vehicles owned (Tata Ace, Mahindra Bolero etc.)</label>
                    <input
                        type="text"
                        name="typeOfVehicles"
                        value="<?= htmlspecialchars($formData['typeOfVehicles']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Monthly Average Turnover</label>
                    <input
                        type="text"
                        name="monthlyTurnOver"
                        value="<?= htmlspecialchars($formData['monthlyTurnOver']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">ERP (Billing Software) in use</label>
                    <input
                        type="text"
                        name="isERPUsed"
                        value="<?= htmlspecialchars($formData['isERPUsed']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Distributor Association(s) Name you are enrolled with (if any). Type NO if not associated with any association</label>
                    <input
                        type="text"
                        name="distributorAssociationName"
                        value="<?= htmlspecialchars($formData['distributorAssociationName']) ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <!-- Multi-Select Fields -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Coverage Area</label>
                    <?= renderMultiSelect('coverageArea', $options['coverageArea'], $formData['coverageArea']) ?>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Channels of Operation</label>
                    <?= renderMultiSelect('channelsOfOperation', $options['channelsOfOperation'], $formData['channelsOfOperation']) ?>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Types of Operation</label>
                    <?= renderMultiSelect('typesOfOperation', $options['typesOfOperation'], $formData['typesOfOperation']) ?>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Business Operations</label>
                    <?= renderMultiSelect('businessOperations', $options['businessOperations'], $formData['businessOperations']) ?>
                </div>

                <!-- Submit Button -->
                <div class="col-span-2">
                    <button
                        type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
                    >
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Enhanced multi-select functionality
        document.addEventListener('DOMContentLoaded', function() {
            const multiSelects = document.querySelectorAll('.multi-select');
            
            multiSelects.forEach(function(select) {
                const container = select.closest('.multi-select-container');
                const selectedItemsDiv = container.querySelector('.selected-items');
                
                function updateSelectedItems() {
                    const selectedOptions = Array.from(select.selectedOptions);
                    selectedItemsDiv.innerHTML = '';
                    
                    selectedOptions.forEach(function(option) {
                        const tag = document.createElement('span');
                        tag.className = 'selected-tag';
                        tag.innerHTML = option.text + ' <button type="button" onclick="removeSelection(\'' + select.dataset.name + '\', \'' + option.value + '\')">&times;</button>';
                        selectedItemsDiv.appendChild(tag);
                    });
                }
                
                select.addEventListener('change', updateSelectedItems);
                updateSelectedItems(); // Initialize
            });
        });
        
        function removeSelection(selectName, value) {
            const select = document.querySelector('select[data-name="' + selectName + '"]');
            const option = select.querySelector('option[value="' + value + '"]');
            if (option) {
                option.selected = false;
                select.dispatchEvent(new Event('change'));
            }
        }
    </script>
</body>
</html>