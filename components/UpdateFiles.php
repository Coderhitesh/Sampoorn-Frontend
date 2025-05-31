<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Files</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.js"></script>
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
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <form id="updateFilesForm" class="bg-white shadow-lg rounded-lg p-8">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Document Upload</h3>
                    <p class="text-sm text-gray-500 mb-6">
                        Please upload all required documents in PDF or image format
                    </p>

                    <!-- Office and Godown Images -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Office and Godown Images (Up to 5)
                        </label>

                        <!-- Existing images container -->
                        <div id="officeImagesContainer" class="flex flex-wrap gap-3 mb-4"></div>

                        <!-- File Upload -->
                        <div class="mt-4 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <i class="fas fa-upload mx-auto h-12 w-12 text-gray-400 text-5xl mb-4"></i>
                                <label class="cursor-pointer text-red-600 hover:text-red-700">
                                    <span>Upload files</span>
                                    <input
                                        type="file"
                                        id="officeAndGodownImage"
                                        multiple
                                        accept="image/*"
                                        class="sr-only"
                                    />
                                </label>
                                <p class="text-xs text-gray-500 mt-2">PNG, JPG up to 1MB each</p>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic document fields based on role -->
                    <div id="documentFields"></div>
                </div>

                <div class="flex justify-between mt-8">
                    <button
                        type="submit"
                        id="submitBtn"
                        class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2"
                    >
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Toast container -->
    <div id="toastContainer"></div>

    <script>
        class UpdateFiles {
            constructor() {
                this.userId = null;
                this.role = null;
                this.isLoading = false;
                this.formData = {
                    files: {
                        officeAndGodownImage: [],
                        gstImage: null,
                        fssaiImage: null,
                        partner1Image: null,
                        partner2Image: null,
                        anyOtherDocImage: null,
                    }
                };

                this.init();
            }

            init() {
                this.getUserFromSession();
                this.bindEvents();
                if (this.userId) {
                    this.fetchDistributor();
                }
            }

            getUserFromSession() {
                const distributor = sessionStorage.getItem('user');
                if (distributor) {
                    const parsedDistributor = JSON.parse(distributor);
                    this.userId = parsedDistributor._id;
                }
            }

            async fetchDistributor() {
                if (!this.userId) return;
                
                try {
                    const response = await axios.get(`http://localhost:5001/api/v1/get_distributor_by_id/${this.userId}`);
                    const distributorData = response.data.data;
                    this.role = distributorData?.type;

                    this.formData.files = {
                        officeAndGodownImage: distributorData.officeAndGodownImage || [],
                        gstImage: distributorData.gstImage || null,
                        fssaiImage: distributorData.fssaiImage || null,
                        partner1Image: distributorData.partner1Image || null,
                        partner2Image: distributorData.partner2Image || null,
                        anyOtherDocImage: distributorData.anyOtherDocImage || null,
                    };

                    this.renderExistingFiles();
                    this.renderDocumentFields();
                } catch (error) {
                    console.log("Internal server error", error);
                    this.showToast("Error fetching distributor data", "error");
                }
            }

            bindEvents() {
                document.getElementById('updateFilesForm').addEventListener('submit', (e) => this.handleSubmit(e));
                document.getElementById('officeAndGodownImage').addEventListener('change', (e) => this.handleImageUpload(e, 'officeAndGodownImage'));
            }

            renderExistingFiles() {
                const container = document.getElementById('officeImagesContainer');
                container.innerHTML = '';

                this.formData.files.officeAndGodownImage.forEach((file, index) => {
                    const imageDiv = document.createElement('div');
                    imageDiv.className = 'relative w-24 h-24';
                    imageDiv.innerHTML = `
                        <img src="${file.url}" alt="Uploaded" class="w-full h-full object-cover rounded-md" />
                        <button
                            type="button"
                            onclick="updateFiles.removeFile('officeAndGodownImage', ${index})"
                            class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                        >
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    `;
                    container.appendChild(imageDiv);
                });
            }

            renderDocumentFields() {
                const container = document.getElementById('documentFields');
                container.innerHTML = '';

                let fields;
                if (this.role === 'Association') {
                    fields = [
                        { name: "gstImage", label: "Registration Certificate" },
                        { name: "partner1Image", label: "Photo of Executive Head (General Secretary)" },
                        { name: "partner2Image", label: "Photo of Leader of the organization (President / Chairman)" },
                        { name: "anyOtherDocImage", label: "Any Other Document" }
                    ];
                } else {
                    fields = [
                        { name: "gstImage", label: "GST Certificate" },
                        { name: "fssaiImage", label: "FSSAI License" },
                        { name: "partner1Image", label: "Partner 1 ID Proof" },
                        { name: "partner2Image", label: "Partner 2 ID Proof" },
                        { name: "anyOtherDocImage", label: "Any Other Document" }
                    ];
                }

                fields.forEach(field => {
                    const fieldDiv = document.createElement('div');
                    fieldDiv.className = 'mb-6';
                    fieldDiv.innerHTML = `
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            ${field.label}
                        </label>

                        <div id="${field.name}Container" class="mb-2"></div>

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="text-center">
                                <i class="fas fa-upload mx-auto h-12 w-12 text-gray-400 text-5xl mb-4"></i>
                                <label class="cursor-pointer text-red-600 hover:text-red-700">
                                    <span>Upload file</span>
                                    <input
                                        type="file"
                                        id="${field.name}"
                                        accept=".pdf,image/*"
                                        class="sr-only"
                                    />
                                </label>
                                <p class="text-xs text-gray-500 mt-2">Image up to 1MB</p>
                            </div>
                        </div>
                    `;
                    container.appendChild(fieldDiv);

                    // Bind event for this field
                    document.getElementById(field.name).addEventListener('change', (e) => this.handleImageUpload(e, field.name));

                    // Render existing file if any
                    this.renderExistingFile(field.name);
                });
            }

            renderExistingFile(fieldName) {
                const container = document.getElementById(`${fieldName}Container`);
                if (!container) return;

                container.innerHTML = '';

                if (this.formData.files[fieldName]) {
                    const imageDiv = document.createElement('div');
                    imageDiv.className = 'relative w-24 h-24';
                    imageDiv.innerHTML = `
                        <img src="${this.formData.files[fieldName].url}" alt="${fieldName}" class="w-full h-full object-cover rounded-md" />
                        <button
                            type="button"
                            onclick="updateFiles.removeFile('${fieldName}')"
                            class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                        >
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    `;
                    container.appendChild(imageDiv);
                }
            }

            async handleImageUpload(event, fileType) {
                const imageFile = event.target.files[0];
                if (!imageFile) return;

                console.log('originalFile instanceof Blob', imageFile instanceof Blob);
                console.log(`originalFile size ${imageFile.size / 1024 / 1024} MB`);

                const options = {
                    maxSizeMB: 1,
                    maxWidthOrHeight: 1920,
                    useWebWorker: true,
                };

                try {
                    const compressedFile = await imageCompression(imageFile, options);
                    console.log('compressedFile instanceof Blob', compressedFile instanceof Blob);
                    console.log(`compressedFile size ${compressedFile.size / 1024 / 1024} MB`);

                    if (fileType === "officeAndGodownImage") {
                        if (this.formData.files[fileType].length < 5) {
                            this.formData.files[fileType].push(compressedFile);
                            this.renderExistingFiles();
                        } else {
                            this.showToast("You can upload a maximum of 5 images for Office and Godown.", "error");
                        }
                    } else {
                        this.formData.files[fileType] = compressedFile;
                        this.renderExistingFile(fileType);
                    }

                    // Clear the input
                    event.target.value = '';

                } catch (error) {
                    console.log(error);
                    this.showToast("Error while compressing the image.", "error");
                }
            }

            removeFile(field, index) {
                if (field === "officeAndGodownImage") {
                    this.formData.files[field] = this.formData.files[field].filter((_, i) => i !== index);
                    this.renderExistingFiles();
                } else {
                    this.formData.files[field] = null;
                    this.renderExistingFile(field);
                }
            }

            async handleSubmit(e) {
                e.preventDefault();
                if (this.isLoading) return;

                this.setLoading(true);

                const formDataToSend = new FormData();

                // Append files
                Object.keys(this.formData.files).forEach(key => {
                    if (key === "officeAndGodownImage") {
                        this.formData.files[key].forEach(file => {
                            formDataToSend.append(key, file);
                        });
                    } else if (this.formData.files[key]) {
                        formDataToSend.append(key, this.formData.files[key]);
                    }
                });

                try {
                    const response = await axios.put(`http://localhost:5001/api/v1/update_profile/${this.userId}`, formDataToSend);
                    const data = response.data;

                    if (data.success) {
                        this.showToast(data.message || "Files updated successfully!", "success");
                    } else {
                        this.showToast(data.message || "Something went wrong!", "error");
                    }
                } catch (error) {
                    console.error("Error:", error);
                    this.showToast(error?.response?.data?.message || "Something went wrong!", "error");
                } finally {
                    this.setLoading(false);
                }
            }

            setLoading(loading) {
                this.isLoading = loading;
                const submitBtn = document.getElementById('submitBtn');
                const form = document.getElementById('updateFilesForm');
                
                if (loading) {
                    submitBtn.textContent = 'Submitting...';
                    submitBtn.disabled = true;
                    form.classList.add('loading');
                } else {
                    submitBtn.textContent = 'Submit';
                    submitBtn.disabled = false;
                    form.classList.remove('loading');
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
            window.updateFiles = new UpdateFiles();
        });
    </script>
</body>
</html>