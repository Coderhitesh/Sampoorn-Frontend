<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download File</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .loading-spinner {
            border: 2px solid #f3f4f6;
            border-top: 2px solid #DE0000;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="space-y-4 p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Available Downloads</h3>
            
            <!-- Loading state -->
            <div id="loadingState" class="flex items-center justify-center p-8">
                <div class="loading-spinner"></div>
                <span class="ml-2 text-gray-600">Loading files...</span>
            </div>
            
            <!-- Content container -->
            <div id="contentContainer" class="grid grid-cols-1 gap-4 hidden">
                <!-- File download item will be inserted here -->
            </div>
            
            <!-- No file message -->
            <div id="noFileMessage" class="hidden">
                <p class="text-gray-500">No file available for download.</p>
            </div>
        </div>
    </div>

    <script>
        class DownloadFile {
            constructor() {
                this.userId = null;
                this.fileUrl = null;
                
                this.init();
            }

            init() {
                this.getUserFromSession();
                if (this.userId) {
                    this.handleFetchProviderData();
                } else {
                    this.showNoFile();
                }
            }

            getUserFromSession() {
                if (typeof window !== "undefined") {
                    const distributor = sessionStorage.getItem('user');
                    if (distributor) {
                        const parsedDistributor = JSON.parse(distributor);
                        this.userId = parsedDistributor._id;
                    }
                }
            }

            async handleFetchProviderData() {
                try {
                    const response = await axios.get(`http://localhost:5001/api/v1/get_distributor_by_id/${this.userId}`);
                    const data = response.data;
                    
                    if (data?.data?.fileUploadedByAdmin?.url) {
                        this.fileUrl = data.data.fileUploadedByAdmin.url;
                        this.renderDownloadFile();
                    } else {
                        this.showNoFile();
                    }
                } catch (error) {
                    console.error("Internal server error", error);
                    this.showNoFile();
                } finally {
                    this.hideLoading();
                }
            }

            renderDownloadFile() {
                const contentContainer = document.getElementById('contentContainer');
                
                // Extract filename from URL or use default
                const filename = this.getFilenameFromUrl(this.fileUrl) || 'Download File';
                
                contentContainer.innerHTML = `
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg fade-in">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-download text-[#DE0000] text-lg"></i>
                            <span class="font-medium">${filename}</span>
                        </div>
                        <a
                            href="${this.fileUrl}"
                            download
                            target="_blank"
                            rel="noopener noreferrer"
                            class="px-4 py-2 bg-[#DE0000] text-white rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center space-x-2"
                        >
                            <i class="fas fa-download text-sm"></i>
                            <span>Download</span>
                        </a>
                    </div>
                `;
                
                contentContainer.classList.remove('hidden');
            }

            showNoFile() {
                const noFileMessage = document.getElementById('noFileMessage');
                noFileMessage.classList.remove('hidden');
                noFileMessage.classList.add('fade-in');
            }

            hideLoading() {
                const loadingState = document.getElementById('loadingState');
                loadingState.classList.add('hidden');
            }

            getFilenameFromUrl(url) {
                try {
                    // Extract filename from URL
                    const urlParts = url.split('/');
                    const filename = urlParts[urlParts.length - 1];
                    
                    // Remove query parameters if any
                    const cleanFilename = filename.split('?')[0];
                    
                    // Decode URL encoding
                    return decodeURIComponent(cleanFilename);
                } catch (error) {
                    return 'Download File';
                }
            }
        }

        // Initialize the app when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            window.downloadFile = new DownloadFile();
        });
    </script>
</body>
</html>