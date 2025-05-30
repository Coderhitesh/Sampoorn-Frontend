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