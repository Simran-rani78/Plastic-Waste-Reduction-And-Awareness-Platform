<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="index.html" class="text-2xl font-bold text-green-600">EcoPlastic</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="index.php" class="text-gray-700 hover:text-green-600">Home</a>
                    <a href="resources.php" class="text-gray-700 hover:text-green-600">Resources</a>
                    <a href="campaigns.php" class="text-gray-700 hover:text-green-600">Campaigns</a>
                    <a href="solutions.php" class="text-gray-700 hover:text-green-600">Solutions</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Forgot Password Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Reset your password
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Enter your email address and we'll send you a link to reset your password.
                </p>
            </div>

            <form class="mt-8 space-y-6" action="#" method="POST" id="forgot-password-form">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required 
                            class="mt-1 appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" 
                            placeholder="Enter your email">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        Send Reset Link
                    </button>
                </div>

                <div class="text-center">
                    <a href="login.php" class="font-medium text-green-600 hover:text-green-500">
                        Back to login
                    </a>
                </div>
            </form>

            <!-- Success Message (Hidden by default) -->
            <div id="success-message" class="hidden mt-4 p-4 bg-green-50 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            Reset link sent! Please check your email.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Error Message (Hidden by default) -->
            <div id="error-message" class="hidden mt-4 p-4 bg-red-50 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">
                            Email not found. Please try again or create a new account.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form submission handling
        document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitButton.disabled = true;
            
            // Simulate API call (replace with actual API call)
            setTimeout(() => {
                // Hide loading state
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
                
                // Show success message (in a real app, this would depend on the API response)
                document.getElementById('success-message').classList.remove('hidden');
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    document.getElementById('success-message').classList.add('hidden');
                    // Redirect to login page
                    window.location.href = '/login.php';
                }, 5000);
            }, 2000);
        });
    </script>
</body>
</html> 