<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Profile Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <!-- Loading State -->
    <div id="loadingState" class="min-h-screen flex items-center justify-center">
        <div class="loading-spinner"></div>
    </div>

    <!-- Error State -->
    <div id="errorState" class="min-h-screen flex items-center justify-center hidden">
        <div class="text-center p-8">
            <div class="text-red-600 text-6xl mb-4">⚠️</div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Error Loading Profile</h2>
            <p id="errorMessage" class="text-gray-600 mb-4"></p>
            <div class="space-x-4">
                <button onclick="loadUserData()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Try Again
                </button>
                <button onclick="logout()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Logout
                </button>
            </div>
        </div>
    </div>
    <?php include('includes/topheader.php'); ?>
    <!-- Main Content -->
    <div id="mainContent" class="hidden mt-[140px]">
        <!-- Header -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-900">Profile Dashboard</h1>
                        <p id="welcomeMessage" class="text-sm text-gray-600"></p>
                    </div>
                    <button onclick="logout()" class="flex items-center space-x-2 px-3 py-1.5 md:px-4 md:py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden md:inline">Log Out</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8">
            <!-- User Info Banner -->
            <div id="userBanner" class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
                <div class="flex items-center space-x-4">
                    <div id="userAvatar" class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <span id="userInitial" class="text-red-600 font-semibold text-lg">U</span>
                    </div>
                    <div>
                        <h2 id="userName" class="text-lg font-semibold text-gray-900">Loading...</h2>
                        <p id="userEmail" class="text-gray-600">Loading...</p>
                        <div id="userRole" class="mt-1"></div>
                    </div>
                </div>
            </div>

            <!-- Quick Info Cards -->
            <div id="infoCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-6 md:mb-8">
                <!-- Info cards will be populated dynamically -->
            </div>

            <!-- Tabs -->
            <div class="bg-white rounded-xl shadow-sm p-4 md:p-6">
                <!-- Mobile Menu Button -->
                <div class="md:hidden mb-4">
                    <button onclick="toggleMobileMenu()" class="w-full flex items-center justify-between px-4 py-2 bg-gray-50 rounded-lg">
                        <span id="activeTabName" class="font-medium">Profile</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="md:hidden space-y-2 hidden mb-4">
                    <a href="components/UpdateProfile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full text-gray-600 hover:bg-gray-100" data-tab="profile">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Update Profile</span>
                    </a>
                    <a href="coponents/UpdateFiles.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full text-gray-600 hover:bg-gray-100" data-tab="update-files">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <span>Update Documents</span>
                    </a>
                    <a href="components/UploadFile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full text-gray-600 hover:bg-gray-100" data-tab="upload">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <span>Upload Files</span>
                    </a>
                    <a href="components/DownloadFile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full text-gray-600 hover:bg-gray-100" data-tab="download">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Download Files</span>
                    </a>
                    <a href="#" onclick="switchTab('profiles')" id="otherProfilesTabMobile" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full text-gray-600 hover:bg-gray-100 hidden" data-tab="profiles">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Others Profile</span>
                    </a>
                </div>

                <!-- Desktop Tabs -->
                <div class="hidden md:flex space-x-4 mb-6 overflow-x-auto">
                    <a href="components/UpdateProfile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100" data-tab="profile">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Update Profile</span>
                    </a>
                    <a href="components/UpdateFiles.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100" data-tab="update-files">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <span>Update Documents</span>
                    </a>
                    <a href="components/UploadFile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100" data-tab="upload">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <span>Upload Files</span>
                    </a>
                    <a href="components/DownloadFile.php" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100" data-tab="download">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Download Files</span>
                    </a>
                    <a href="#" onclick="switchTab('profiles')" id="otherProfilesTab" class="tab-button flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100 hidden" data-tab="profiles">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Others Profile</span>
                    </a>
                </div>

                <!-- Tab Content -->
                <div id="tabContent" class="mt-6">
                    <a href="components/UpdateProfile.php" class="block tab-content">
                        <h3 class="text-lg font-semibold mb-4">Update Profile</h3>
                    </a>
                    <a href="components/UpdateProfile.php" id="update-files-content" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Update Documents</h3>
                        <!-- <p class="text-gray-600">Document update form will be loaded here.</p> -->
                    </a>
                    <a href="components/UpdateProfile.php" id="upload-content" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Upload Files</h3>
                        <!-- <p class="text-gray-600">File upload form will be loaded here.</p> -->
                    </a>
                    <a href="components/UpdateProfile.php" id="download-content" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Download Files</h3>
                        <!-- <p class="text-gray-600">Download options will be loaded here.</p> -->
                    </a>
                    <!-- <div id="profiles-content" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Others Profile</h3>
                        <p class="text-gray-600">Other profiles will be loaded here.</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>

    <script>
        // Global variables
        let userData = null;
        let distributorData = null;
        let activeTab = 'profile';

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            loadUserData();
        });

        // Get user data from sessionStorage
        function getUserFromSessionStorage() {
            try {
                const userJson = sessionStorage.getItem('user');
                if (userJson) {
                    return JSON.parse(userJson);
                }
                return null;
            } catch (error) {
                console.error('Error parsing user data from sessionStorage:', error);
                return null;
            }
        }

        // Check if user is logged in
        function checkUserAuth() {
            const user = getUserFromSessionStorage();
            if (!user || !user._id) {
                // Redirect to login if no user data
                window.location.href = '/login.php'; // Adjust as needed
                return false;
            }
            return user;
        }

        // Fetch user data from API
        async function fetchUserData(userId) {
            try {
                const response = await fetch(`http://localhost:5001/api/v1/get_distributor_by_id/${userId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        // Add authentication headers if needed
                        // 'Authorization': 'Bearer ' + getAuthToken()
                    },
                    timeout: 30000
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                return data.data || data; // Adjust based on your API response structure
            } catch (error) {
                console.error('Error fetching user data:', error);
                throw error;
            }
        }
        // Fetch distributor data from API
        async function fetchDistributorData(userId) {
            try {
                const response = await fetch(`http://localhost:5001/api/v1/get_distributor_by_id/${userId}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    timeout: 30000
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                return data.data || data;
            } catch (error) {
                console.error('Error fetching distributor data:', error);
                return null; // Don't throw error for distributor data
            }
        }

        // Main function to load user data
        async function loadUserData() {
            try {
                // Show loading state
                showLoadingState();

                // Check if user is authenticated
                const sessionUser = checkUserAuth();
                if (!sessionUser) return;

                const userId = sessionUser._id;

                // Fetch fresh user data from API
                userData = await fetchUserData(userId);

                // Update sessionStorage with fresh data
                sessionStorage.setItem('user', JSON.stringify(userData));

                // Fetch distributor data
                distributorData = await fetchDistributorData(userId);

                // Render the UI
                renderUserInterface();

                // Hide loading state and show main content
                hideLoadingState();

            } catch (error) {
                console.error('Error loading user data:', error);
                showErrorState('Failed to load user data. Please try again.');
            }
        }

        // Render user interface
        function renderUserInterface() {
            // Update user banner
            updateUserBanner();

            // Update info cards
            updateInfoCards();

            // Update welcome message
            updateWelcomeMessage();

            // Show/hide tabs based on verification status
            updateTabVisibility();

            // Set active tab
            // switchTab(activeTab);
        }

        // Update user banner
        function updateUserBanner() {
            if (!userData) return;

            const userName = userData.distributorEntityName || 'N/A';
            const userEmail = userData.email || 'N/A';
            const userInitial = userName.charAt(0).toUpperCase();

            document.getElementById('userName').textContent = userName;
            document.getElementById('userEmail').textContent = userEmail;
            document.getElementById('userInitial').textContent = userInitial;

            // Update role info
            const roleElement = document.getElementById('userRole');
            if (distributorData && distributorData.type) {
                const isVerified = distributorData.isVerified;
                const verifiedIcon = isVerified ? '<span class="ml-1 text-green-600">✓</span>' : '';
                roleElement.innerHTML = `<span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">${distributorData.type}${verifiedIcon}</span>`;
            }
        }

        // Update welcome message
        function updateWelcomeMessage() {
            const welcomeElement = document.getElementById('welcomeMessage');
            if (userData && userData.name) {
                welcomeElement.textContent = `Welcome, ${userData.name}`;
            }
        }

        // Update info cards
        function updateInfoCards() {
            const infoCardsContainer = document.getElementById('infoCards');
            let cardsHTML = '';

            if (distributorData && distributorData.type === 'Association') {
                cardsHTML = `
                    ${createInfoCard('building', 'Entity Name', distributorData.distributorEntityName)}
                    ${createInfoCard('map-pin', 'Location', distributorData.city || userData.city)}
                    ${createInfoCard('mail', 'Email', userData.email)}
                    ${createInfoCard('phone', 'Phone No.', userData.phoneNo)}
                `;
            } else {
                cardsHTML = `
                    ${createInfoCard('building', 'Entity Name', distributorData?.distributorEntityName)}
                    ${createInfoCard('map-pin', 'Location', distributorData?.city || userData?.city)}
                    ${createInfoCard('users', 'Customers', distributorData?.numberOfCustomers)}
                    ${createInfoCard('rupee', 'Monthly Turnover', distributorData?.monthlyTurnOver)}
                `;
            }

            infoCardsContainer.innerHTML = cardsHTML;
        }

        // Create info card HTML
        function createInfoCard(icon, title, value) {
            const iconSvg = getIconSvg(icon);
            const displayValue = value || 'N/A';

            return `
                <div class='bg-white p-4 rounded-xl shadow-sm border border-gray-100'>
                    <div class='flex items-center space-x-3'>
                        <div class='p-2 bg-yellow-50 rounded-lg'>
                            ${iconSvg}
                        </div>
                        <div class='min-w-0 flex-1'>
                            <p class='text-sm text-gray-500 truncate'>${title}</p>
                            <p class='font-semibold text-gray-900 truncate'>${displayValue}</p>
                        </div>
                    </div>
                </div>
            `;
        }

        // Get SVG icons
        function getIconSvg(iconName) {
            const icons = {
                'building': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                'map-pin': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                'users': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path></svg>',
                'rupee': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>',
                'mail': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                'phone': '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>'
            };
            return icons[iconName] || '';
        }

        // Update tab visibility based on verification status
        function updateTabVisibility() {
            const isVerified = distributorData?.isVerified === true;
            const otherProfilesTab = document.getElementById('otherProfilesTab');
            const otherProfilesTabMobile = document.getElementById('otherProfilesTabMobile');

            if (isVerified) {
                otherProfilesTab.classList.remove('hidden');
                otherProfilesTabMobile.classList.remove('hidden');
            } else {
                otherProfilesTab.classList.add('hidden');
                otherProfilesTabMobile.classList.add('hidden');
            }
        }



       





        // Switch tabs
        // function switchTab(tabName) {
        //     activeTab = tabName;

        //     // Update tab buttons
        //     document.querySelectorAll('.tab-button').forEach(button => {
        //         const isActive = button.dataset.tab === tabName;
        //         button.className = button.className.replace(/bg-red-600|text-white|text-gray-600|hover:bg-gray-100/g, '');
        //         if (isActive) {
        //             button.className += ' bg-red-600 text-white';
        //         } else {
        //             button.className += ' text-gray-600 hover:bg-gray-100';
        //         }
        //     });

        //     // Update tab content
        //     document.querySelectorAll('.tab-content').forEach(content => {
        //         content.classList.add('hidden');
        //     });
        //     document.getElementById(`${tabName}-content`).classList.remove('hidden');

        //     // Update mobile tab name
        //     const tabNames = {
        //         'profile': 'Profile',
        //         'update-files': 'Update Documents',
        //         'upload': 'Upload Files',
        //         'download': 'Download Files',
        //         'profiles': 'Others Profile'
        //     };
        //     document.getElementById('activeTabName').textContent = tabNames[tabName] || 'Profile';

        //     // Hide mobile menu
        //     document.getElementById('mobileMenu').classList.add('hidden');
        // }

        // Toggle mobile menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Logout function
        function logout() {
            // Clear sessionStorage
            sessionStorage.clear();

            // Redirect to login page
            window.location.href = 'login.php'; // Adjust as needed
        }

        // Show loading state
        function showLoadingState() {
            document.getElementById('loadingState').classList.remove('hidden');
            document.getElementById('errorState').classList.add('hidden');
            document.getElementById('mainContent').classList.add('hidden');
        }

        // Hide loading state
        function hideLoadingState() {
            document.getElementById('loadingState').classList.add('hidden');
            document.getElementById('errorState').classList.add('hidden');
            document.getElementById('mainContent').classList.remove('hidden');
        }

        // Show error state
        function showErrorState(message) {
            document.getElementById('loadingState').classList.add('hidden');
            document.getElementById('errorState').classList.remove('hidden');
            document.getElementById('errorText').textContent = message;
        }
    </script>
    <?php include('includes/cursor.php') ?>
    <?php include('includes/footerlink.php') ?>
</body>