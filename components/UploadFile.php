<?php
// Handle form submission
$loading = false;
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_pdf'])) {
    $loading = true;
    
    // Create upload directory if it doesn't exist
    $uploadDir = 'uploads/pdfs/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Handle file upload
    if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['pdfFile'];
        
        // Validate file type
        $allowedTypes = ['application/pdf'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            $message = 'Please upload a valid PDF file only.';
            $messageType = 'error';
        } else {
            // Generate unique filename
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file['name']);
            $filePath = $uploadDir . $fileName;
            
            // Move uploaded file
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $message = 'PDF file uploaded successfully!';
                $messageType = 'success';
                
                // Here you can add database insertion or other processing
                // Example: saveToDatabase($fileName, $filePath);
                
            } else {
                $message = 'Failed to upload file. Please try again.';
                $messageType = 'error';
            }
        }
    } else {
        $message = 'Please select a PDF file to upload.';
        $messageType = 'error';
    }
    
    $loading = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    
    <div class="text-center py-12">
        <div class="max-w-xl mx-auto">
            
            <!-- Success/Error Messages -->
            <?php if (!empty($message)): ?>
                <div class="mb-6 p-4 rounded-lg <?php echo $messageType === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700'; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data" id="uploadForm">
                
                <!-- Upload Icon -->
                <label for="fileInput" class="cursor-pointer">
                    <svg class="w-12 h-12 text-[#DE0000] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v6" />
                    </svg>
                </label>
                
                <h3 class="text-lg font-semibold mb-2">Upload PDF File</h3>
                <p class="text-gray-500 mb-4">
                    Select and upload a PDF file for distribution
                </p>
                
                <!-- File Input -->
                <input
                    type="file"
                    id="fileInput"
                    name="pdfFile"
                    accept="application/pdf"
                    class="mb-4 block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:text-sm file:font-semibold
                           file:bg-[#DE0000] file:text-white
                           hover:file:bg-red-700 file:cursor-pointer"
                    required
                />
                
                <!-- Selected File Display -->
                <div id="selectedFile" class="mb-4 text-sm text-gray-600" style="display: none;">
                    <span class="font-medium">Selected: </span>
                    <span id="fileName"></span>
                </div>
                
                <!-- Upload Button -->
                <button
                    type="submit"
                    name="upload_pdf"
                    id="uploadBtn"
                    class="px-6 py-2 bg-[#DE0000] text-white rounded-lg hover:bg-red-700 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    <?php echo $loading ? 'disabled' : ''; ?>
                >
                    <?php echo $loading ? 'Uploading...' : 'Upload File'; ?>
                </button>
                
            </form>
        </div>
    </div>

    <script>
        // Show selected file name
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const fileInput = e.target;
            const selectedFileDiv = document.getElementById('selectedFile');
            const fileNameSpan = document.getElementById('fileName');
            
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                fileNameSpan.textContent = file.name;
                selectedFileDiv.style.display = 'block';
                
                // Validate file type on client side
                if (file.type !== 'application/pdf') {
                    alert('Please select a PDF file only.');
                    fileInput.value = '';
                    selectedFileDiv.style.display = 'none';
                }
            } else {
                selectedFileDiv.style.display = 'none';
            }
        });
        
        // Show loading state on form submit
        document.getElementById('uploadForm').addEventListener('submit', function() {
            const uploadBtn = document.getElementById('uploadBtn');
            uploadBtn.disabled = true;
            uploadBtn.textContent = 'Uploading...';
        });
        
        // Auto-hide success message after 5 seconds
        <?php if ($messageType === 'success'): ?>
            setTimeout(function() {
                const messageDiv = document.querySelector('.bg-green-100');
                if (messageDiv) {
                    messageDiv.style.transition = 'opacity 0.5s';
                    messageDiv.style.opacity = '0';
                    setTimeout(() => messageDiv.remove(), 500);
                }
            }, 5000);
        <?php endif; ?>
    </script>
</body>
</html>