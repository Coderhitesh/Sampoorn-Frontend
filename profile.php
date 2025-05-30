<?php
session_start();
$_SESSION['user'] = json_encode([
    '_id' => 1,
    'name' => 'Hitesh',
    'email' => 'RwOw8@example.com',
    'phoneNo' => '1234567890',
    'alternatePhoneNo' => '9876543210',
    'city' => 'New York',
]);

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit();
}

// Get user data from session
$user = json_decode($_SESSION['user'], true);
$userId = $user['_id'] ?? null;

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /');
    exit();
}

// Get active tab from URL parameter
$activeTab = $_GET['tab'] ?? 'profile';

// Function to fetch distributor data
function fetchDistributorData($userId)
{
    $url = "https://www.api.upfda.in/api/v1/get_distributor_by_id/" . $userId;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        $data = json_decode($response, true);
        return $data['data'] ?? [];
    }

    return [];
}

// Fetch distributor data
$distributorDetail = [];
$role = null;
$isVerified = null;
$loading = true;

if ($userId) {
    $distributorDetail = fetchDistributorData($userId);
    $role = $distributorDetail['type'] ?? null;
    $isVerified = $distributorDetail['isVerified'] ?? null;
    $loading = false;
}

// Function to render info cards
function renderInfoCard($icon, $title, $value)
{
    $iconSvg = getIconSvg($icon);
    return "
    <div class='bg-white p-4 rounded-xl shadow-sm border border-gray-100'>
        <div class='flex items-center space-x-3'>
            <div class='p-2 bg-yellow-50 rounded-lg'>
                {$iconSvg}
            </div>
            <div class='min-w-0 flex-1'>
                <p class='text-sm text-gray-500 truncate'>{$title}</p>
                <p class='font-semibold text-gray-900 truncate'>" . htmlspecialchars($value ?? 'N/A') . "</p>
            </div>
        </div>
    </div>";
}

// Function to get SVG icons (simplified versions)
function getIconSvg($iconName)
{
    $icons = [
        'building' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
        'map-pin' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
        'users' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path></svg>',
        'rupee' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>',
        'mail' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
        'phone' => '<svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>'
    ];

    return $icons[$iconName] ?? '';
}

// Function to render tab button
function renderTabButton($icon, $label, $tabName, $currentTab)
{
    $isActive = $currentTab === $tabName;
    $activeClass = $isActive ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-gray-100';
    $iconSvg = getIconSvg($icon);

    return "
    <a href='?tab={$tabName}' class='flex items-center space-x-2 px-4 py-2 rounded-lg transition-all duration-200 w-full md:w-auto {$activeClass}'>
        {$iconSvg}
        <span class='whitespace-nowrap'>{$label}</span>
    </a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <?php if ($loading): ?>
        <div class="min-h-screen flex items-center justify-center">
            <div class="loading-spinner"></div>
        </div>
    <?php else: ?>
        <!-- Header -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-bold text-gray-900">Profile Dashboard</h1>
                    <form method="POST" class="inline">
                        <button type="submit" name="logout" class="flex items-center space-x-2 px-3 py-1.5 md:px-4 md:py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="hidden md:inline">Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-8">
            <!-- Quick Info Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-6 md:mb-8">
                <?php if ($role === 'Association'): ?>
                    <?= renderInfoCard('building', 'Entity Name', $distributorDetail['distributorEntityName'] ?? '') ?>
                    <?= renderInfoCard('map-pin', 'Location', $distributorDetail['city'] ?? '') ?>
                    <?= renderInfoCard('mail', 'Email', $distributorDetail['email'] ?? '') ?>
                    <?= renderInfoCard('phone', 'Phone No.', $distributorDetail['phoneNo'] ?? '') ?>
                <?php else: ?>
                    <?= renderInfoCard('building', 'Entity Name', $distributorDetail['distributorEntityName'] ?? '') ?>
                    <?= renderInfoCard('map-pin', 'Location', $distributorDetail['city'] ?? '') ?>
                    <?= renderInfoCard('users', 'Customers', $distributorDetail['numberOfCustomers'] ?? '') ?>
                    <?= renderInfoCard('rupee', 'Monthly Turnover', $distributorDetail['monthlyTurnOver'] ?? '') ?>
                <?php endif; ?>
            </div>

            <!-- Tabs -->
            <div class="bg-white rounded-xl shadow-sm p-4 md:p-6">
                <!-- Mobile Menu Button -->
                <div class="md:hidden mb-4">
                    <button onclick="toggleMobileMenu()" class="w-full flex items-center justify-between px-4 py-2 bg-gray-50 rounded-lg">
                        <span class="font-medium"><?= ucfirst($activeTab) ?></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="md:hidden space-y-2 hidden mb-4">
                    <?= renderTabButton('user', 'Update Profile', 'profile', $activeTab) ?>
                    <?= renderTabButton('upload', 'Update Documents', 'update-files', $activeTab) ?>
                    <?= renderTabButton('upload', 'Upload Files', 'upload', $activeTab) ?>
                    <?= renderTabButton('download', 'Download Files', 'download', $activeTab) ?>
                    <?php if ($isVerified === true): ?>
                        <?= renderTabButton('user', 'Others Profile', 'profiles', $activeTab) ?>
                    <?php endif; ?>
                </div>

                <!-- Desktop Tabs -->
                <div class="hidden md:flex space-x-4 mb-6 overflow-x-auto">
                    <?= renderTabButton('user', 'Update Profile', 'profile', $activeTab) ?>
                    <?= renderTabButton('upload', 'Update Documents', 'update-files', $activeTab) ?>
                    <?= renderTabButton('upload', 'Upload Files', 'upload', $activeTab) ?>
                    <?= renderTabButton('download', 'Download Files', 'download', $activeTab) ?>
                    <?php if ($isVerified === true): ?>
                        <?= renderTabButton('user', 'Others Profile', 'profiles', $activeTab) ?>
                    <?php endif; ?>
                </div>

                <!-- Tab Content -->
                <div class="mt-6">
                    <?php
                    switch ($activeTab) {
                        case 'profile':
                            include 'components/UpdateProfile.php';
                            break;
                        case 'update-files':
                            include 'components/UpdateFiles.php';
                            break;
                        case 'upload':
                            include 'components/UploadFile.php';
                            break;
                        case 'download':
                            include 'components/DownloadFile.php';
                            break;
                        case 'profiles':
                            if ($isVerified === true) {
                                include 'components/OtherProfiles.php';
                            }
                            break;
                        default:
                            include 'components/UpdateProfile.php';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('button');

            if (!menu.contains(event.target) && button?.onclick !== toggleMobileMenu) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>