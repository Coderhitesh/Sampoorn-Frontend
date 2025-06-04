<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Profile Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            text-align: center;
            color: white;
            max-width: 500px;
            padding: 2rem;
        }

        .header {
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .loading-spinner {
            text-align: center;
            color: white;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: 1.1rem;
            margin-top: 1rem;
        }

        /* Toast Container */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1001;
        }

        .toast {
            background: #333;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            background: #28a745;
        }

        .toast.error {
            background: #dc3545;
        }

        .toast.warning {
            background: #ffc107;
            color: #333;
        }

        .detecting-message {
            font-size: 1.1rem;
            margin-top: 2rem;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .detecting-message.show {
            opacity: 1;
        }

        .countdown {
            font-size: 3rem;
            font-weight: bold;
            margin: 2rem 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <!-- Toast Container -->
    <div style="display:none" id="toastContainer" class="toast-container"></div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner">
            <div class="spinner"></div>
            <p class="loading-text">Detecting your role...</p>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h1 class="page-title">Business Profile Management</h1>
            <p class="page-subtitle">Auto-detecting your business type...</p>
        </div>

        <div class="countdown" id="countdown">3</div>
        
        <div class="detecting-message" id="detectingMessage">
            🔍 Analyzing your profile...
        </div>
    </div>

    <script src="utils.js"></script>
    <script>

        async function autoDetectRole() {
            const userId = getUserId();
            if (!userId) {
                showToast('Please login first', 'error');
                return;
            }

            showLoading(true, 'Detecting your role...');
            
            try {
                const response = await fetch(`https://api.sampoornmarketing.com/api/v1/get_distributor_by_id/${userId}`);
                const result = await response.json();
                
                if (response.ok && result.data) {
                    const userRole = result.data.type;
                    if (userRole) {
                        showToast(`Redirecting to ${userRole} form...`, 'success');
                        setTimeout(() => {
                            window.location.href = `${userRole.toLowerCase()}.php`;
                        }, 1000);
                    } else {
                        showToast('Role not found. Please contact support.', 'warning');
                    }
                } else {
                    throw new Error(result.message || 'Failed to detect role');
                }
            } catch (error) {
                console.error('Error detecting role:', error);
                showToast('Failed to detect role. Please try again.', 'error');
            } finally {
                showLoading(false);
            }
        }

        // Initialize countdown and auto-detect
        document.addEventListener('DOMContentLoaded', function() {
            const countdownElement = document.getElementById('countdown');
            const detectingMessage = document.getElementById('detectingMessage');
            let countdown = 3;

            // Show detecting message after 1 second
            setTimeout(() => {
                detectingMessage.classList.add('show');
            }, 1000);

            // Countdown timer
            const countdownInterval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.style.display = 'none';
                    // Start auto-detect after 2 seconds (3-second countdown + 1 second delay)
                    autoDetectRole();
                }
            }, 1000);
        });
    </script>
</body>
</html>