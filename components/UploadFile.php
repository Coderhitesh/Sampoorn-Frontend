<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF File</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 24px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 1000;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease;
        }
        .toast.show {
            opacity: 1;
            transform: translateX(0);
        }
        .toast.success {
            background-color: #10b981;
        }
        .toast.error {
            background-color: #ef4444;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-name {
            margin-top: 8px;
            font-size: 14px;
            color: #6b7280;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="text-center py-12 w-full max-w-xl mx-auto bg-white rounded-lg shadow-md p-8">
        <div class="file-input-wrapper">
            <div class="cursor-pointer">
                <i class="fas fa-upload text-[#DE0000] text-5xl mb-4"></i>
            </div>
            <input 
                type="file" 
                id="fileInput" 
                accept="application/pdf"
                class="cursor-pointer"
            />
        </div>
        <h3 class="text-lg font-semibold mb-2">Upload PDF File</h3>
        <p class="text-gray-500 mb-4">
            Select and upload a PDF file for distribution
        </p>
        <div class="file-name" id="fileName">No file selected</div>
        <button
            id="uploadButton"
            class="mt-6 px-6 py-2 bg-[#DE0000] text-white rounded-lg hover:bg-red-700 transition-colors duration-200"
        >
            Upload File
        </button>
    </div>

    <!-- Toast container -->
    <div id="toastContainer"></div>

    <script>
        class UploadFile {
            constructor() {
                this.fileUploadedByDistributor = null;
                this.userId = null;
                this.loading = false;
                
                this.init();
            }

            init() {
                this.getUserFromSession();
                this.bindEvents();
            }

            getUserFromSession() {
                if (typeof window !== "undefined") {
                    const distributor = sessionStorage.getItem('user');
                    if (distributor) {
                        const ParseDistributor = JSON.parse(distributor);
                        this.userId = ParseDistributor._id;
                    }
                }
            }

            bindEvents() {
                document.getElementById('fileInput').addEventListener('change', (e) => this.handleFileChange(e));
                document.getElementById('uploadButton').addEventListener('click', (e) => this.handleSubmit(e));
            }

            handleFileChange(e) {
                const file = e.target.files[0];
                if (file) {
                    this.fileUploadedByDistributor = file;
                    document.getElementById('fileName').textContent = file.name;
                } else {
                    this.fileUploadedByDistributor = null;
                    document.getElementById('fileName').textContent = 'No file selected';
                }
            }

            async handleSubmit(e) {
                e.preventDefault();
                
                if (this.loading) return;
                
                if (!this.fileUploadedByDistributor || !this.userId) {
                    console.log("No file selected or user not found");
                    this.showToast("No file selected or user not found", "error");
                    return;
                }

                this.setLoading(true);

                const formData = new FormData();
                formData.append('fileUploadedByDistributor', this.fileUploadedByDistributor);

                try {
                    const res = await axios.put(
                        `http://localhost:5001/api/v1/update_file_By_provider/${this.userId}`,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            },
                        }
                    );
                    this.showToast('PDF Uploaded Successfully', 'success');
                    console.log(res.data);
                    
                    // Reset file input
                    document.getElementById('fileInput').value = '';
                    document.getElementById('fileName').textContent = 'No file selected';
                    this.fileUploadedByDistributor = null;
                    
                } catch (error) {
                    console.log("Internal server error", error);
                    this.showToast(error?.response?.data?.message || 'Something went wrong', 'error');
                } finally {
                    this.setLoading(false);
                }
            }

            setLoading(isLoading) {
                this.loading = isLoading;
                const button = document.getElementById('uploadButton');
                
                if (isLoading) {
                    button.textContent = 'Uploading...';
                    button.disabled = true;
                    button.classList.add('opacity-70', 'cursor-not-allowed');
                } else {
                    button.textContent = 'Upload File';
                    button.disabled = false;
                    button.classList.remove('opacity-70', 'cursor-not-allowed');
                }
            }

            showToast(message, type = 'success') {
                const toastContainer = document.getElementById('toastContainer');
                const toast = document.createElement('div');
                toast.className = `toast ${type}`;
                toast.textContent = message;
                
                toastContainer.appendChild(toast);
                
                // Trigger animation
                setTimeout(() => toast.classList.add('show'), 100);
                
                // Remove toast after 3 seconds
                setTimeout(() => {
                    toast.classList.remove('show');
                    setTimeout(() => toastContainer.removeChild(toast), 300);
                }, 3000);
            }
        }

        // Initialize the app when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            window.uploadFile = new UploadFile();
        });
    </script>
</body>
</html>