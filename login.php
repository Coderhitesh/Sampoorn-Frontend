<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/headerlink.php') ?>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Axios for HTTP requests -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>
    <style>
        .hitesh-log-min-h-screen {
            min-height: 100vh;
        }
        .hitesh-log-bg-gradient-to-br {
            background: linear-gradient(to bottom right, #dbeafe, #ffffff, #faf5ff);
        }
        .hitesh-log-flex {
            display: flex;
        }
        .hitesh-log-items-center {
            align-items: center;
        }
        .hitesh-log-justify-center {
            justify-content: center;
        }
        .hitesh-log-p-4 {
            padding: 1rem;
        }
        .hitesh-log-w-full {
            width: 100%;
        }
        .hitesh-log-max-w-md {
            max-width: 28rem;
        }
        .hitesh-log-bg-white {
            background-color: white;
        }
        .hitesh-log-rounded-2xl {
            border-radius: 1rem;
        }
        .hitesh-log-shadow-xl {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .hitesh-log-p-8 {
            padding: 2rem;
        }
        .hitesh-log-space-y-8 > * + * {
            margin-top: 2rem;
        }
        .hitesh-log-space-y-6 > * + * {
            margin-top: 1.5rem;
        }
        .hitesh-log-space-y-2 > * + * {
            margin-top: 0.5rem;
        }
        .hitesh-log-text-center {
            text-align: center;
        }
        .hitesh-log-inline-flex {
            display: inline-flex;
        }
        .hitesh-log-w-16 {
            width: 4rem;
        }
        .hitesh-log-h-16 {
            height: 4rem;
        }
        .hitesh-log-rounded-full {
            border-radius: 9999px;
        }
        .hitesh-log-bg-pink-light {
            background-color: #ffe3e5;
        }
        .hitesh-log-mb-4 {
            margin-bottom: 1rem;
        }
        .hitesh-log-w-8 {
            width: 2rem;
        }
        .hitesh-log-h-8 {
            height: 2rem;
        }
        .hitesh-log-text-red {
            color: #E2000A;
        }
        .hitesh-log-text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        .hitesh-log-font-bold {
            font-weight: 700;
        }
        .hitesh-log-text-gray-900 {
            color: #111827;
        }
        .hitesh-log-text-gray-500 {
            color: #6b7280;
        }
        .hitesh-log-mt-2 {
            margin-top: 0.5rem;
        }
        .hitesh-log-text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
        .hitesh-log-font-medium {
            font-weight: 500;
        }
        .hitesh-log-text-gray-700 {
            color: #374151;
        }
        .hitesh-log-block {
            display: block;
        }
        .hitesh-log-relative {
            position: relative;
        }
        .hitesh-log-absolute {
            position: absolute;
        }
        .hitesh-log-inset-y-0 {
            top: 0;
            bottom: 0;
        }
        .hitesh-log-left-0 {
            left: 0;
        }
        .hitesh-log-right-0 {
            right: 0;
        }
        .hitesh-log-pl-3 {
            padding-left: 0.75rem;
        }
        .hitesh-log-pr-3 {
            padding-right: 0.75rem;
        }
        .hitesh-log-pr-12 {
            padding-right: 3rem;
        }
        .hitesh-log-pl-10 {
            padding-left: 2.5rem;
        }
        .hitesh-log-py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .hitesh-log-px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .hitesh-log-h-5 {
            height: 1.25rem;
        }
        .hitesh-log-w-5 {
            width: 1.25rem;
        }
        .hitesh-log-text-gray-400 {
            color: #9ca3af;
        }
        .hitesh-log-pointer-events-none {
            pointer-events: none;
        }
        .hitesh-log-border-2 {
            border-width: 2px;
        }
        .hitesh-log-border-gray-200 {
            border-color: #e5e7eb;
        }
        .hitesh-log-rounded-xl {
            border-radius: 0.75rem;
        }
        .hitesh-log-focus-ring:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            box-shadow: 0 0 0 2px #E2000A;
            border-color: #E2000A;
        }
        .hitesh-log-transition {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
        .hitesh-log-text-gray-600 {
            color: #4b5563;
        }
        .hitesh-log-h-4 {
            height: 1rem;
        }
        .hitesh-log-w-4 {
            width: 1rem;
        }
        .hitesh-log-ml-2 {
            margin-left: 0.5rem;
        }
        .hitesh-log-bg-red {
            background-color: #E2000A;
        }
        .hitesh-log-text-white {
            color: white;
        }
        .hitesh-log-hover-bg-red:hover {
            background-color: #b30811;
        }
        .hitesh-log-focus-outline:focus {
            outline: none;
        }
        .hitesh-log-transform {
            transform: translateZ(0);
        }
        .hitesh-log-hover-scale:hover {
            transform: scale(1.02);
        }
        .hitesh-log-cursor-pointer {
            cursor: pointer;
        }
        .hitesh-log-hover-text-gray:hover {
            color: #4b5563;
        }
        
        /* Toast notification styles */
        .hitesh-log-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 1000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        .hitesh-log-toast.show {
            transform: translateX(0);
        }
        .hitesh-log-toast.success {
            background-color: #10b981;
        }
        .hitesh-log-toast.error {
            background-color: #ef4444;
        }
    </style>
</head>

<body class="v-light dsn-ajax">
    <main id="main_root" class="main-root">
        <?php include('includes/topheader.php') ?>
        <div id="dsn-scrollbar">
            <div id="page_wrapper" class="wrapper hitesh-contact">
                
                <!-- Login Form Container -->
                <div class="hitesh-log-min-h-screen hitesh-log-bg-gradient-to-br hitesh-log-flex hitesh-log-items-center hitesh-log-justify-center hitesh-log-p-4">
                    <div class="hitesh-log-w-full hitesh-log-max-w-md">
                        <div class="hitesh-log-bg-white hitesh-log-rounded-2xl hitesh-log-shadow-xl hitesh-log-p-8 hitesh-log-space-y-8">
                            <!-- Header -->
                            <div class="hitesh-log-text-center">
                                <div class="hitesh-log-inline-flex hitesh-log-items-center hitesh-log-justify-center hitesh-log-w-16 hitesh-log-h-16 hitesh-log-rounded-full hitesh-log-bg-pink-light hitesh-log-mb-4">
                                    <i data-lucide="log-in" class="hitesh-log-w-8 hitesh-log-h-8 hitesh-log-text-red"></i>
                                </div>
                                <h1 class="hitesh-log-text-2xl hitesh-log-font-bold hitesh-log-text-gray-900">Welcome Back</h1>
                                <p class="hitesh-log-text-gray-500 hitesh-log-mt-2">Please sign in to continue</p>
                            </div>

                            <!-- Form -->
                            <form id="loginForm" class="hitesh-log-space-y-6">
                                <!-- Phone Input -->
                                <div class="hitesh-log-space-y-2">
                                    <label for="phoneNo" class="hitesh-log-text-sm hitesh-log-font-medium hitesh-log-text-gray-700 hitesh-log-block">
                                        Phone Number
                                    </label>
                                    <div class="hitesh-log-relative">
                                        <div class="hitesh-log-absolute hitesh-log-inset-y-0 hitesh-log-left-0 hitesh-log-pl-3 hitesh-log-flex hitesh-log-items-center hitesh-log-pointer-events-none">
                                            <i data-lucide="phone" class="hitesh-log-h-5 hitesh-log-w-5 hitesh-log-text-gray-400"></i>
                                        </div>
                                        <input
                                            type="tel"
                                            id="phoneNo"
                                            name="phoneNo"
                                            class="hitesh-log-block hitesh-log-w-full hitesh-log-pl-10 hitesh-log-pr-3 hitesh-log-py-3 hitesh-log-border-2 hitesh-log-border-gray-200 hitesh-log-rounded-xl hitesh-log-focus-ring placeholder:text-gray-400 hitesh-log-text-gray-900 hitesh-log-transition"
                                            placeholder="Enter your phone number"
                                            required
                                        />
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="hitesh-log-space-y-2">
                                    <label for="Password" class="hitesh-log-text-sm hitesh-log-font-medium hitesh-log-text-gray-700 hitesh-log-block">
                                        Password
                                    </label>
                                    <div class="hitesh-log-relative">
                                        <div class="hitesh-log-absolute hitesh-log-inset-y-0 hitesh-log-left-0 hitesh-log-pl-3 hitesh-log-flex hitesh-log-items-center hitesh-log-pointer-events-none">
                                            <i data-lucide="lock" class="hitesh-log-h-5 hitesh-log-w-5 hitesh-log-text-gray-400"></i>
                                        </div>
                                        <input
                                            type="password"
                                            id="Password"
                                            name="Password"
                                            class="hitesh-log-block hitesh-log-w-full hitesh-log-pl-10 hitesh-log-pr-12 hitesh-log-py-3 hitesh-log-border-2 hitesh-log-border-gray-200 hitesh-log-rounded-xl hitesh-log-focus-ring placeholder:text-gray-400 hitesh-log-text-gray-900 hitesh-log-transition"
                                            placeholder="Enter your password"
                                            required
                                        />
                                        <button
                                            type="button"
                                            id="togglePassword"
                                            class="hitesh-log-absolute hitesh-log-inset-y-0 hitesh-log-right-0 hitesh-log-pr-3 hitesh-log-flex hitesh-log-items-center hitesh-log-cursor-pointer"
                                        >
                                            <i data-lucide="eye" class="hitesh-log-h-5 hitesh-log-w-5 hitesh-log-text-gray-400 hitesh-log-hover-text-gray" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="hitesh-log-flex hitesh-log-items-center hitesh-log-justify-between">
                                    <!-- <div class="hitesh-log-flex hitesh-log-items-center">
                                        <input
                                            type="checkbox"
                                            id="remember"
                                            class="hitesh-log-h-4 hitesh-log-w-4 hitesh-log-text-red hitesh-log-rounded hitesh-log-border-gray-300"
                                        />
                                        <label for="remember" class="hitesh-log-ml-2 hitesh-log-text-sm hitesh-log-text-gray-600">
                                            Remember me
                                        </label>
                                    </div> -->
                                    <a href="forget.php" class="hitesh-log-text-sm hitesh-log-text-red hitesh-log-font-medium">
                                        Forgot password?
                                    </a>
                                </div>

                                <!-- Submit Button -->
                                <button
                                    type="submit"
                                    class="hitesh-log-w-full hitesh-log-bg-red hitesh-log-text-white hitesh-log-py-3 hitesh-log-px-4 hitesh-log-rounded-xl hitesh-log-font-medium hitesh-log-hover-bg-red hitesh-log-focus-outline hitesh-log-transform hitesh-log-transition hitesh-log-hover-scale"
                                >
                                    Sign in
                                </button>

                                <!-- Sign Up Link -->
                                <p class="hitesh-log-text-center hitesh-log-text-sm hitesh-log-text-gray-600">
                                    Don't have an account?
                                    <a href="register.php" class="hitesh-log-font-medium hitesh-log-text-red">
                                        Sign up
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <?php include('includes/footer.php') ?>
        </div>
    </main>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Form state
        let showPassword = false;
        const formData = {
            phoneNo: '',
            Password: ''
        };

        // Get form elements
        const loginForm = document.getElementById('loginForm');
        const phoneInput = document.getElementById('phoneNo');
        const passwordInput = document.getElementById('Password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        // Toast notification function
        function showToast(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.querySelector('.hitesh-log-toast');
            if (existingToast) {
                existingToast.remove();
            }

            const toast = document.createElement('div');
            toast.className = `hitesh-log-toast ${type}`;
            toast.textContent = message;
            document.body.appendChild(toast);

            // Show toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);

            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }

        // Handle password visibility toggle
        togglePasswordBtn.addEventListener('click', function() {
            showPassword = !showPassword;
            
            if (showPassword) {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('data-lucide', 'eye');
            }
            
            // Re-initialize icons to update the changed icon
            lucide.createIcons();
        });

        // Handle input changes
        phoneInput.addEventListener('input', function(e) {
            formData.phoneNo = e.target.value;
        });

        passwordInput.addEventListener('input', function(e) {
            formData.Password = e.target.value;
        });

        // Handle form submission
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                // Update formData with current values
                formData.phoneNo = phoneInput.value;
                formData.Password = passwordInput.value;

                const response = await axios.post('http://localhost:5001/api/v1/login', formData);
                const { token, user } = response.data;

                // Store in sessionStorage
                sessionStorage.setItem('token', token);
                sessionStorage.setItem('user', JSON.stringify(user));

                showToast(response.data.message || 'Login Successfully', 'success');
                
                // Redirect to profile page
                setTimeout(() => {
                    window.location.href = 'profile.php';
                }, 1500);

            } catch (error) {
                console.log("Internal server error", error);
                const errorMessage = error?.response?.data?.message || 'Something went wrong';
                showToast(errorMessage, 'error');
            }
        });
    </script>

</body>
<?php include('includes/cursor.php') ?>
<?php include('includes/footerlink.php') ?>

</html>