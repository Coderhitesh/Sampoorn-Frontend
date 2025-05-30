<?php
// Get available files from uploads directory
$uploadDir = 'uploads/pdfs/';
$availableFiles = [];

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
            $filePath = $uploadDir . $file;
            $availableFiles[] = [
                'name' => $file,
                'path' => $filePath,
                'size' => filesize($filePath),
                'date' => date('Y-m-d H:i:s', filemtime($filePath)),
                'display_name' => str_replace(['_', time()], [' ', ''], pathinfo($file, PATHINFO_FILENAME))
            ];
        }
    }

    // Sort by date (newest first)
    usort($availableFiles, function ($a, $b) {
        return filemtime($b['path']) - filemtime($a['path']);
    });
}

// Handle single file display (like your original React code)
$fileUrl = !empty($availableFiles) ? $availableFiles[0]['path'] : null;

// Function to format file size
function formatFileSize($bytes)
{
    if ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}
?>


<script src="https://cdn.tailwindcss.com"></script>

<div class="space-y-4 p-6 bg-white rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">Available Downloads</h3>

    <div class="grid grid-cols-1 gap-4">
        <?php if ($fileUrl): ?>
            <!-- Single File Display (matching your original React code) -->
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-[#DE0000]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div>
                        <span class="font-medium">Download File</span>
                        <p class="text-sm text-gray-500">
                            <?php echo formatFileSize($availableFiles[0]['size']); ?> •
                            Uploaded <?php echo date('M j, Y', filemtime($availableFiles[0]['path'])); ?>
                        </p>
                    </div>
                </div>
                <a
                    href="<?php echo htmlspecialchars($fileUrl); ?>"
                    download="<?php echo htmlspecialchars($availableFiles[0]['name']); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-4 py-2 bg-[#DE0000] text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                    Download
                </a>
            </div>

            <!-- Optional: Show all available files -->
            <?php if (count($availableFiles) > 1): ?>
                <div class="mt-6">
                    <h4 class="text-md font-medium mb-3 text-gray-700">All Available Files</h4>
                    <?php foreach ($availableFiles as $file): ?>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg mb-2">
                            <div class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <div>
                                    <span class="text-sm font-medium"><?php echo htmlspecialchars($file['display_name']); ?></span>
                                    <p class="text-xs text-gray-500">
                                        <?php echo formatFileSize($file['size']); ?> •
                                        <?php echo date('M j, Y g:i A', filemtime($file['path'])); ?>
                                    </p>
                                </div>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($file['path']); ?>"
                                download="<?php echo htmlspecialchars($file['name']); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="px-3 py-1 bg-[#DE0000] text-white text-sm rounded hover:bg-red-700 transition-colors duration-200">
                                Download
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p class="text-gray-500">No file available for download.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Alternative: Dynamic File Loading with AJAX -->
<script>
    // Optional: Add file refresh functionality
    function refreshFiles() {
        location.reload();
    }

    // Auto-refresh every 30 seconds to show new uploads
    // setInterval(refreshFiles, 30000);

    // Track download clicks
    document.querySelectorAll('a[download]').forEach(link => {
        link.addEventListener('click', function() {
            console.log('File downloaded:', this.getAttribute('download'));
            // You can add analytics tracking here
        });
    });
</script>