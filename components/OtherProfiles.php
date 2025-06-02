<?php
session_start();

// Get user role from session
$role = isset($_SESSION['user']) ? json_decode($_SESSION['user'], true)['type'] ?? null : null;

// Pagination settings
$itemsPerPage = 9;
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// Filter settings
$filters = [
    'city' => $_GET['city'] ?? '',
    'state' => $_GET['state'] ?? '',
    'address' => $_GET['address'] ?? ''
];

// Mock data - Replace with your API call
function fetchProfiles($role) {
    // This would be your API call to https://api.sampoornmarketing.com/api/v1/get_distributor
    // For demo purposes, using mock data
    $mockData = [
        [
            '_id' => '1',
            'type' => 'Distributor',
            'distributorEntityName' => 'ABC Distribution Co.',
            'location' => 'Mumbai, Maharashtra',
            'coverageArea' => ['Mumbai', 'Pune', 'Nashik'],
            'monthlyTurnOver' => '₹50 Lakhs',
            'city' => 'Mumbai',
            'state' => 'Maharashtra',
            'address' => '123 Business District, Mumbai',
            'officeAndGodownImage' => [['url' => 'https://via.placeholder.com/400x300']]
        ],
        [
            '_id' => '2',
            'type' => 'Retailer',
            'distributorEntityName' => 'XYZ Retail Store',
            'location' => 'Delhi, Delhi',
            'noOfRetailerOutlets' => '5',
            'monthlyTurnOver' => '₹25 Lakhs',
            'city' => 'Delhi',
            'state' => 'Delhi',
            'address' => '456 Market Street, Delhi',
            'officeAndGodownImage' => [['url' => 'https://via.placeholder.com/400x300']]
        ],
        [
            '_id' => '3',
            'type' => 'Association',
            'distributorEntityName' => 'Food Processors Association',
            'nameOfHead' => 'John Doe',
            'noOfMember' => '150',
            'location' => 'Bangalore, Karnataka',
            'city' => 'Bangalore',
            'state' => 'Karnataka',
            'address' => '789 Association Building, Bangalore',
            'officeAndGodownImage' => [['url' => 'https://via.placeholder.com/400x300']]
        ]
        // Add more mock data as needed
    ];
    
    // Filter out current user's role
    return array_filter($mockData, function($item) use ($role) {
        return $item['type'] !== $role;
    });
}

// Get profile icon class
function getProfileIcon($type) {
    switch ($type) {
        case 'Distributor':
            return 'fas fa-building text-blue-600';
        case 'Retailer':
            return 'fas fa-store text-green-600';
        case 'Association':
            return 'fas fa-users text-purple-600';
        default:
            return 'fas fa-user';
    }
}

// Get main fields for each profile type
function getMainFields($profile) {
    switch ($profile['type']) {
        case 'Distributor':
            return [
                ['label' => 'Entity Name', 'value' => $profile['distributorEntityName']],
                ['label' => 'Location', 'value' => $profile['location']],
                ['label' => 'Coverage Area', 'value' => implode(', ', $profile['coverageArea'] ?? [])],
                ['label' => 'Monthly Turnover', 'value' => $profile['monthlyTurnOver']]
            ];
        case 'Retailer':
            return [
                ['label' => 'Entity Name', 'value' => $profile['distributorEntityName']],
                ['label' => 'Location', 'value' => $profile['location']],
                ['label' => 'Outlets', 'value' => $profile['noOfRetailerOutlets']],
                ['label' => 'Monthly Turnover', 'value' => $profile['monthlyTurnOver']]
            ];
        case 'Association':
            return [
                ['label' => 'Entity Name', 'value' => $profile['distributorEntityName']],
                ['label' => 'Head', 'value' => $profile['nameOfHead']],
                ['label' => 'Members', 'value' => $profile['noOfMember']],
                ['label' => 'Location', 'value' => $profile['location']]
            ];
        default:
            return [];
    }
}

// Fetch all profiles
$allProfiles = $role ? fetchProfiles($role) : [];

// Apply filters
$filteredProfiles = $allProfiles;

if (!empty($filters['city'])) {
    $filteredProfiles = array_filter($filteredProfiles, function($item) use ($filters) {
        return $item['city'] === $filters['city'];
    });
}

if (!empty($filters['state'])) {
    $filteredProfiles = array_filter($filteredProfiles, function($item) use ($filters) {
        return $item['state'] === $filters['state'];
    });
}

if (!empty($filters['address'])) {
    $filteredProfiles = array_filter($filteredProfiles, function($item) use ($filters) {
        return stripos($item['address'], $filters['address']) !== false;
    });
}

// Get unique cities and states for filters
$cities = array_unique(array_column($allProfiles, 'city'));
$states = array_unique(array_column($allProfiles, 'state'));
sort($cities);
sort($states);

// Pagination
$totalProfiles = count($filteredProfiles);
$totalPages = ceil($totalProfiles / $itemsPerPage);
$startIndex = ($currentPage - 1) * $itemsPerPage;
$currentProfiles = array_slice($filteredProfiles, $startIndex, $itemsPerPage);

// Build query string for pagination
function buildQueryString($filters, $excludeKeys = []) {
    $params = array_filter($filters);
    foreach ($excludeKeys as $key) {
        unset($params[$key]);
    }
    return http_build_query($params);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-100">

    <div class="min-h-screen bg-gray-100 p-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Other Profiles</h1>

            <!-- Filter Section -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <form method="GET" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <select name="city" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                            <option value="">All Cities</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo htmlspecialchars($city); ?>" <?php echo $filters['city'] === $city ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($city); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <select name="state" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                            <option value="">All States</option>
                            <?php foreach ($states as $state): ?>
                                <option value="<?php echo htmlspecialchars($state); ?>" <?php echo $filters['state'] === $state ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($state); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Address</label>
                        <div class="flex">
                            <input 
                                type="text" 
                                name="address" 
                                value="<?php echo htmlspecialchars($filters['address']); ?>"
                                placeholder="Search by address..."
                                class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            />
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Hidden fields to maintain other filters -->
                    <?php if (!empty($filters['city'])): ?>
                        <input type="hidden" name="city" value="<?php echo htmlspecialchars($filters['city']); ?>">
                    <?php endif; ?>
                    <?php if (!empty($filters['state'])): ?>
                        <input type="hidden" name="state" value="<?php echo htmlspecialchars($filters['state']); ?>">
                    <?php endif; ?>
                </form>
            </div>

            <!-- Profiles Grid -->
            <?php if (!empty($currentProfiles)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($currentProfiles as $profile): ?>
                        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <i class="<?php echo getProfileIcon($profile['type']); ?> text-2xl"></i>
                                    <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($profile['type']); ?></h3>
                                </div>
                                <a href="profile.php?id=<?php echo htmlspecialchars($profile['_id']); ?>" 
                                   class="flex items-center space-x-2 text-[#D6000A] hover:text-[#c72830] transition-colors">
                                    <span>View Details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <?php foreach (getMainFields($profile) as $field): ?>
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($field['label']); ?></p>
                                        <p class="font-medium text-gray-800"><?php echo htmlspecialchars($field['value'] ?: 'N/A'); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <?php if (!empty($profile['officeAndGodownImage'][0]['url'])): ?>
                                <div class="mt-4">
                                    <img src="<?php echo htmlspecialchars($profile['officeAndGodownImage'][0]['url']); ?>" 
                                         alt="Office" 
                                         class="w-full h-48 object-cover rounded-lg">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="flex justify-center space-x-2 mt-8">
                        <?php if ($currentPage > 1): ?>
                            <a href="?<?php echo buildQueryString($filters); ?>&page=<?php echo $currentPage - 1; ?>" 
                               class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
                                Previous
                            </a>
                        <?php else: ?>
                            <span class="px-4 py-2 rounded-md bg-gray-300 text-gray-500 cursor-not-allowed">Previous</span>
                        <?php endif; ?>

                        <span class="px-4 py-2 text-gray-700">
                            Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?>
                        </span>

                        <?php if ($currentPage < $totalPages): ?>
                            <a href="?<?php echo buildQueryString($filters); ?>&page=<?php echo $currentPage + 1; ?>" 
                               class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
                                Next
                            </a>
                        <?php else: ?>
                            <span class="px-4 py-2 rounded-md bg-gray-300 text-gray-500 cursor-not-allowed">Next</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <!-- No profiles found -->
                <div class="text-center py-12">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-xl">No profiles found matching your filters.</p>
                    <?php if (array_filter($filters)): ?>
                        <a href="?" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Clear Filters
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (!$role): ?>
                <!-- No user role -->
                <div class="text-center py-12">
                    <i class="fas fa-user-slash text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-xl">Please log in to view profiles.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Auto-submit form on filter change (already handled with onchange)
        // Add loading states for better UX
        document.querySelectorAll('select, input[type="text"]').forEach(element => {
            element.addEventListener('change', function() {
                if (this.closest('form')) {
                    // Show loading indicator
                    const button = this.closest('form').querySelector('button[type="submit"]');
                    if (button) {
                        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    }
                }
            });
        });
    </script>

</body>
</html>