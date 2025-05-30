<?php
// Start session and handle form data
// session_start();

// Get role from session or form data
$role = isset($_SESSION['role']) ? $_SESSION['role'] : (isset($_POST['role']) ? $_POST['role'] : 'regular');
$isLoading = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_form'])) {
    $isLoading = true;

    // Create upload directory if it doesn't exist
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFiles = [];
    $errors = [];

    // Handle multiple office and godown images
    if (isset($_FILES['officeAndGodownImage'])) {
        $officeImages = [];
        $fileCount = count($_FILES['officeAndGodownImage']['name']);

        for ($i = 0; $i < min($fileCount, 5); $i++) {
            if ($_FILES['officeAndGodownImage']['error'][$i] === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $i . '_' . $_FILES['officeAndGodownImage']['name'][$i];
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['officeAndGodownImage']['tmp_name'][$i], $filePath)) {
                    $officeImages[] = ['url' => $filePath, 'name' => $fileName];
                }
            }
        }
        $uploadedFiles['officeAndGodownImage'] = $officeImages;
    }

    // Handle single file uploads
    $singleFileFields = [];

    if ($role === 'Association') {
        $singleFileFields = [
            'gstImage' => 'Registration Certificate',
            'partner1Image' => 'Photo of Executive Head',
            'partner2Image' => 'Photo of Leader',
            'anyOtherDocImage' => 'Any Other Document'
        ];
    } else {
        $singleFileFields = [
            'gstImage' => 'GST Certificate',
            'fssaiImage' => 'FSSAI License',
            'partner1Image' => 'Partner 1 ID Proof',
            'partner2Image' => 'Partner 2 ID Proof',
            'anyOtherDocImage' => 'Any Other Document'
        ];
    }

    foreach ($singleFileFields as $fieldName => $label) {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $fileName = time() . '_' . $_FILES[$fieldName]['name'];
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], $filePath)) {
                $uploadedFiles[$fieldName] = ['url' => $filePath, 'name' => $fileName];
            }
        }
    }

    // Store uploaded files in session for display
    $_SESSION['uploadedFiles'] = $uploadedFiles;

    // Redirect to prevent resubmission
    header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
    exit;
}

// Get uploaded files from session
$formData = isset($_SESSION['uploadedFiles']) ? $_SESSION['uploadedFiles'] : [];

// Handle file removal
if (isset($_GET['remove']) && isset($_GET['field'])) {
    $field = $_GET['field'];
    $index = isset($_GET['index']) ? (int)$_GET['index'] : null;

    if (isset($formData[$field])) {
        if ($index !== null && isset($formData[$field][$index])) {
            // Remove file from filesystem
            if (file_exists($formData[$field][$index]['url'])) {
                unlink($formData[$field][$index]['url']);
            }
            // Remove from array
            array_splice($formData[$field], $index, 1);
        } else {
            // Single file removal
            if (file_exists($formData[$field]['url'])) {
                unlink($formData[$field]['url']);
            }
            unset($formData[$field]);
        }
        $_SESSION['uploadedFiles'] = $formData;
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>


<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css" rel="stylesheet">


<?php if (isset($_GET['success'])): ?>
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        Documents uploaded successfully!
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-8">
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Document Upload</h3>
            <p class="text-sm text-gray-500 mb-6">
                Please upload all required documents in PDF or image format
            </p>

            <!-- Role Selection -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                    <option value="regular" <?php echo $role === 'regular' ? 'selected' : ''; ?>>Regular</option>
                    <option value="Association" <?php echo $role === 'Association' ? 'selected' : ''; ?>>Association</option>
                </select>
            </div>

            <!-- Office and Godown Images -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Office and Godown Images (Up to 5)
                </label>

                <!-- Show existing images -->
                <?php if (isset($formData['officeAndGodownImage']) && !empty($formData['officeAndGodownImage'])): ?>
                    <div class="flex flex-wrap gap-3 mb-4">
                        <?php foreach ($formData['officeAndGodownImage'] as $index => $file): ?>
                            <div class="relative w-24 h-24">
                                <img src="<?php echo htmlspecialchars($file['url']); ?>" alt="Uploaded" class="w-full h-full object-cover rounded-md">
                                <a href="?remove=1&field=officeAndGodownImage&index=<?php echo $index; ?>"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to remove this image?')">
                                    <span class="block w-4 h-4 text-xs">×</span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- File Upload -->
                <div class="mt-4 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v6" />
                        </svg>
                        <label class="cursor-pointer text-red-600 hover:text-red-700">
                            <span>Upload files</span>
                            <input type="file" name="officeAndGodownImage[]" multiple accept="image/*" class="sr-only">
                        </label>
                        <p class="text-xs text-gray-500">PNG, JPG up to 1MB each</p>
                    </div>
                </div>
            </div>

            <?php if ($role === 'Association'): ?>
                <!-- Association Fields -->
                <?php
                $fields = [
                    'gstImage' => 'Registration Certificate',
                    'partner1Image' => 'Photo of Executive Head (General Secretary)',
                    'partner2Image' => 'Photo of Leader of the organization (President / Chairman)',
                    'anyOtherDocImage' => 'Any Other Document'
                ];
                ?>
            <?php else: ?>
                <!-- Regular Fields -->
                <?php
                $fields = [
                    'gstImage' => 'GST Certificate',
                    'fssaiImage' => 'FSSAI License',
                    'partner1Image' => 'Partner 1 ID Proof',
                    'partner2Image' => 'Partner 2 ID Proof',
                    'anyOtherDocImage' => 'Any Other Document'
                ];
                ?>
            <?php endif; ?>

            <?php foreach ($fields as $fieldName => $label): ?>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <?php echo htmlspecialchars($label); ?>
                    </label>

                    <!-- Show existing image -->
                    <?php if (isset($formData[$fieldName])): ?>
                        <div class="relative w-24 h-24 mb-2">
                            <img src="<?php echo htmlspecialchars($formData[$fieldName]['url']); ?>"
                                alt="<?php echo htmlspecialchars($label); ?>"
                                class="w-full h-full object-cover rounded-md">
                            <a href="?remove=1&field=<?php echo $fieldName; ?>"
                                class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                                onclick="return confirm('Are you sure you want to remove this file?')">
                                <span class="block w-4 h-4 text-xs">×</span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Upload File -->
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v6" />
                            </svg>
                            <label class="cursor-pointer text-red-600 hover:text-red-700">
                                <span>Upload file</span>
                                <input type="file" name="<?php echo $fieldName; ?>" accept=".pdf,image/*" class="sr-only">
                            </label>
                            <p class="text-xs text-gray-500">Image up to 1MB</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="flex justify-between mt-8">
            <button type="submit" name="submit_form"
                class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                <?php echo $isLoading ? 'disabled' : ''; ?>>
                <?php echo $isLoading ? "Submitting..." : "Submit"; ?>
            </button>
        </div>
    </div>
</form>

<script>
    // Auto-submit role change
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?role=' + this.value;
    });
</script>