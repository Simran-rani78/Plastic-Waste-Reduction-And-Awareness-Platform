<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoPlastic - Reducing Plastic Waste Together</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        .hero-pattern {
            background-image: url('https://images.unsplash.com/photo-1618477461853-cf5b7c5c5c5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        .impact-counter {
            transition: all 0.3s ease;
        }
        .impact-counter:hover {
            transform: translateY(-5px);
        }
        .testimonial-card {
            transition: all 0.3s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .campaign-card {
            transition: all 0.3s ease;
        }
        .campaign-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .solution-card {
            transition: all 0.3s ease;
        }
        .solution-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0.0.05);
        }
        .newsletter-form input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.3);
        }
        .dark-mode {
            background-color: #1a202c;
            color: #f7fafc;
        }
        .dark-mode .bg-white {
            background-color: #2d3748;
            color: #f7fafc;
        }
        .dark-mode .text-gray-900 {
            color: #f7fafc;
        }
        .dark-mode .text-gray-700 {
            color: #e2e8f0;
        }
        .dark-mode .text-gray-500 {
            color: #a0aec0;
        }
        .dark-mode .border-gray-200 {
            border-color: #4a5568;
        }
        .dark-mode .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="">

    <!-- Hero Section -->
    <div class="relative hero-pattern">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Reducing Plastic Waste Together</h1>
            <p class="mt-6 text-xl text-white max-w-3xl">Join our community of environmental champions working to reduce plastic waste through awareness, education, and collective action.</p>
            <div class="mt-10 flex flex-col sm:flex-row sm:space-x-4">
                <a href="register.php" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                    Get Started
                </a>
                <a href="campaigns.php" class="mt-3 sm:mt-0 inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                    Join a Campaign
                </a>
            </div>
        </div>
    </div>

    <!-- Impact Stats Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Global Impact</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Together, we're making a difference in reducing plastic waste worldwide.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-green-50 overflow-hidden shadow rounded-lg impact-counter">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <span class="text-white text-2xl">♻</span>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Plastic Recycled</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900" id="plastic-counter">0</div>
                                        <div class="ml-2 text-sm text-gray-500">tons</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-50 overflow-hidden shadow rounded-lg impact-counter">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Community Members</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900" id="members-counter">0</div>
                                        <div class="ml-2 text-sm text-gray-500">people</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-yellow-50 overflow-hidden shadow rounded-lg impact-counter">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <i class="fas fa-handshake text-white text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Active Campaigns</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900" id="campaigns-counter">0</div>
                                        <div class="ml-2 text-sm text-gray-500">worldwide</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-purple-50 overflow-hidden shadow rounded-lg impact-counter">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <i class="fas fa-globe text-white text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Countries Involved</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900" id="countries-counter">0</div>
                                        <div class="ml-2 text-sm text-gray-500">countries</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Campaigns Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Featured Campaigns</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Join one of our active campaigns and make a difference in your community.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg campaign-card">
                    <div class="relative h-48">
                        <img src="https://images.unsplash.com/photo-1532601224476-15c79f2f7a51?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Beach Cleanup" class="w-full h-full object-cover">
                        <div class="absolute top-0 right-0 bg-green-500 text-white px-3 py-1 rounded-bl-lg">
                            Active
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Beach Cleanup Initiative</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Join our monthly beach cleanup events to help remove plastic waste from our coastlines.
                        </p>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Coastal areas worldwide
                                </div>
                            </div>
                            <div class="mt-2 flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Monthly events
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="campaigns.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Join Campaign
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg campaign-card">
                    <div class="relative h-48">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Plastic-Free Schools" class="w-full h-full object-cover">
                        <div class="absolute top-0 right-0 bg-green-500 text-white px-3 py-1 rounded-bl-lg">
                            Active
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">Plastic-Free Schools</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Help schools eliminate single-use plastics and educate students about sustainable alternatives.
                        </p>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Schools nationwide
                                </div>
                            </div>
                            <div class="mt-2 flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Ongoing
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="campaigns.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Join Campaign
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg campaign-card">
                    <div class="relative h-48">
                        <img src="https://plus.unsplash.com/premium_photo-1682309613906-3269a1578f25?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cmVjeWNsaW5nJTIwc3ltYm9sfGVufDB8fDB8fHww" alt="Recycling Challenge" class="w-full h-full object-cover">
                        <div class="absolute top-0 right-0 bg-green-500 text-white px-3 py-1 rounded-bl-lg">
                            Active
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">30-Day Recycling Challenge</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Challenge yourself to recycle properly for 30 days and track your impact with our app.
                        </p>
                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Global
                                </div>
                            </div>
                            <div class="mt-2 flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <div class="ml-2 text-sm text-gray-500">
                                    Monthly
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="campaigns.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Join Campaign
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 text-center">
                <a href="campaigns.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    View All Campaigns
                </a>
            </div>
        </div>
    </div>

    <!-- Solutions Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Sustainable Solutions</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Discover eco-friendly alternatives to reduce your plastic footprint.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-gray-50 overflow-hidden shadow rounded-lg solution-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white mx-auto">
                            <i class="fas fa-shopping-bag text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Reusable Shopping Bags</h3>
                        <p class="mt-2 text-sm text-gray-500 text-center">
                            Replace single-use plastic bags with durable, eco-friendly alternatives.
                        </p>
                        <div class="mt-5">
                            <a href="solutions.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 w-full justify-center">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 overflow-hidden shadow rounded-lg solution-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white mx-auto">
                            <i class="fas fa-utensils text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Bamboo Kitchenware</h3>
                        <p class="mt-2 text-sm text-gray-500 text-center">
                            Sustainable alternatives to plastic kitchen items that are biodegradable.
                        </p>
                        <div class="mt-5">
                            <a href="solutions.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 w-full justify-center">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 overflow-hidden shadow rounded-lg solution-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white mx-auto">
                            <i class="fas fa-wine-bottle text-xl"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 text-center">Water Filtration Systems</h3>
                        <p class="mt-2 text-sm text-gray-500 text-center">
                            Reduce bottled water consumption with home filtration solutions.
                        </p>
                        <div class="mt-5">
                            <a href="solutions.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 w-full justify-center">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 text-center">
                <a href="solutions.php" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    Explore All Solutions
                </a>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">What Our Community Says</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Hear from people who have joined our mission to reduce plastic waste.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg testimonial-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=0D9488&color=fff" alt="Sarah Johnson">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Sarah Johnson</h4>
                                <p class="text-sm text-gray-500">Environmental Educator</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-500">
                                "EcoPlastic has transformed how I teach about environmental issues. The resources and community support have been invaluable in my classroom."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg testimonial-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=Michael+Chen&background=0D9488&color=fff" alt="Michael Chen">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Michael Chen</h4>
                                <p class="text-sm text-gray-500">Community Organizer</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-500">
                                "The campaigns on EcoPlastic have helped me mobilize my community. We've successfully implemented recycling programs in our neighborhood."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg testimonial-card">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=Emma+Rodriguez&background=0D9488&color=fff" alt="Emma Rodriguez">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Emma Rodriguez</h4>
                                <p class="text-sm text-gray-500">Small Business Owner</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-500">
                                "As a small business owner, the sustainable solutions from EcoPlastic have helped me reduce costs while making a positive environmental impact."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Impact Chart Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Growing Impact</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    See how our community's efforts have grown over time.
                </p>
            </div>
            <div class="mt-10">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <canvas id="impactChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-green-700 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Stay Updated
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-green-100">
                        Subscribe to our newsletter for the latest campaigns, resources, and success stories.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0">
                    <form class="sm:flex newsletter-form">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-green-500 focus:border-green-500 sm:max-w-xs rounded-md" placeholder="Enter your email">
                        <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-700 focus:ring-white">
                                Subscribe
                            </button>
                        </div>
                    </form>
                    <p class="mt-3 text-sm text-green-100">
                        We care about your data. Read our <a href="#" class="text-white font-medium underline">Privacy Policy</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Ready to Make a Difference?
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">
                        Join thousands of people who are already reducing plastic waste in their communities. Create an account to track your impact, join campaigns, and connect with like-minded individuals.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="register.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                            Create Account
                        </a>
                        <a href="resources.php" class="mt-3 sm:mt-0 inline-flex items-center justify-center px-5 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="mt-10 lg:mt-0">
                    <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Community members working together">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">About EcoPlastic</h3>
                    <p class="text-gray-300">Dedicated to reducing plastic waste through awareness, education, and community action.</p>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="resources.php" class="text-gray-300 hover:text-white">Resources</a></li>
                        <li><a href="campaigns.php" class="text-gray-300 hover:text-white">Campaigns</a></li>
                        <li><a href="solutions.php" class="text-gray-300 hover:text-white">Solutions</a></li>
                        <li><a href="login.php" class="text-gray-300 hover:text-white">Sign In</a></li>
                        <li><a href="register.php" class="text-gray-300 hover:text-white">Register</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Guides</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Research</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Success Stories</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-300">Email: info@ecoplastic.com</li>
                        
                        <li class="text-gray-300">Address: Lovely professional university</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8">
                <p class="text-center text-gray-300">&copy; 2024 EcoPlastic. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Theme toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = themeToggle.querySelector('i');
        
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });

        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }

        // Animated counters
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    clearInterval(timer);
                    element.textContent = target.toLocaleString();
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Initialize counters immediately
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial values
            const plasticCounter = document.getElementById('plastic-counter');
            const membersCounter = document.getElementById('members-counter');
            const campaignsCounter = document.getElementById('campaigns-counter');
            const countriesCounter = document.getElementById('countries-counter');
            
            // Animate counters
            animateCounter(plasticCounter, 1250);
            animateCounter(membersCounter, 50000);
            animateCounter(campaignsCounter, 75);
            animateCounter(countriesCounter, 100);
        });

        // Impact Chart
        const impactCtx = document.getElementById('impactChart').getContext('2d');
        new Chart(impactCtx, {
            type: 'line',
            data: {
                labels: ['Jan 2023', 'Apr 2023', 'Jul 2023', 'Oct 2023', 'Jan 2024', 'Apr 2024'],
                datasets: [
                    {
                        label: 'Plastic Recycled (tons)',
                        data: [200, 450, 700, 950, 1250, 1600],
                        borderColor: '#059669',
                        backgroundColor: 'rgba(5, 150, 105, 0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Community Members',
                        data: [5000, 12000, 22000, 35000, 42000, 50000],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = this.querySelector('#email-address');
            const email = emailInput.value;
            
            // Show success message
            const successMessage = document.createElement('div');
            successMessage.className = 'mt-3 text-sm text-green-100';
            successMessage.textContent = 'Thank you for subscribing!';
            
            // Replace form with success message
            this.innerHTML = '';
            this.appendChild(successMessage);
            
            // Reset form after 3 seconds
            setTimeout(() => {
                this.innerHTML = `
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-green-500 focus:border-green-500 sm:max-w-xs rounded-md" placeholder="Enter your email">
                    <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-700 focus:ring-white">
                            Subscribe
                        </button>
                    </div>
                `;
            }, 3000);
        });
    </script>
</body>
</html> 