<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .resource-card {
            transition: all 0.3s ease;
        }
        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .download-btn {
            transition: all 0.2s ease;
        }
        .download-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Resources Header -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Educational Resources</span>
                    <span class="block text-green-600">For Plastic Reduction</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Discover comprehensive resources to help you understand and combat plastic pollution.
                </p>
            </div>
            
            <!-- Search Bar -->
            <div class="mt-10 max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" id="search-resources" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Search resources...">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Resources -->
    <div class="bg-green-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Featured Resources</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Our most popular and impactful educational materials</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48" src="https://images.unsplash.com/photo-1618477461853-cf5b7c5c5c5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Plastic Ocean">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-500 rounded-md p-2">
                                    <i class="fas fa-book text-white"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-gray-900">The Plastic Crisis: A Comprehensive Guide</h3>
                                    <p class="mt-1 text-sm text-gray-500">Updated: June 15, 2024</p>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">
                                A detailed exploration of the global plastic crisis, its environmental impact, and potential solutions.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                                <a href="#" class="inline-flex items-center text-green-600 hover:text-green-500">
                                    Read Guide
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="#" class="mt-3 sm:mt-0 inline-flex items-center text-green-600 hover:text-green-500 download-btn">
                                    <i class="fas fa-download mr-2"></i>
                                    Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="h-48 w-full object-cover md:w-48" src="https://images.unsplash.com/photo-1532601224476-15c79f2f7a51?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Recycling">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-500 rounded-md p-2">
                                    <i class="fas fa-video text-white"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-gray-900">Recycling 101: Video Series</h3>
                                    <p class="mt-1 text-sm text-gray-500">Updated: May 28, 2024</p>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">
                                A 5-part video series explaining proper recycling techniques and common mistakes to avoid.
                            </p>
                            <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                                <a href="#" class="inline-flex items-center text-green-600 hover:text-green-500">
                                    Watch Series
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="#" class="mt-3 sm:mt-0 inline-flex items-center text-green-600 hover:text-green-500 download-btn">
                                    <i class="fas fa-download mr-2"></i>
                                    Download Guide
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resource Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900">Resource Categories</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Browse our resources by category</p>
        </div>

        <!-- Filter Section -->
        <div class="mb-8 bg-white p-4 rounded-lg shadow">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <label for="resource-filter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                    <select id="resource-filter" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="all">All Categories</option>
                        <option value="recycling">Recycling</option>
                        <option value="education">Education</option>
                        <option value="research">Research</option>
                        <option value="community">Community</option>
                        <option value="products">Products</option>
                        <option value="centers">Recycling Centers</option>
                    </select>
                </div>
                <div>
                    <label for="resource-search" class="block text-sm font-medium text-gray-700 mb-1">Search Resources</label>
                    <div class="relative">
                        <input type="text" id="resource-search" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md" placeholder="Search...">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Recycling Guide -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-recycle text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Recycling Guide</h3>
                            <p class="mt-1 text-sm text-gray-500">Learn about proper recycling practices</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            View Guide
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-pdf mr-2"></i>
                        <span>PDF, 2.4 MB</span>
                    </div>
                </div>
            </div>

            <!-- Educational Videos -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-video text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Educational Videos</h3>
                            <p class="mt-1 text-sm text-gray-500">Watch informative videos about plastic pollution</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            Watch Videos
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-video mr-2"></i>
                        <span>MP4, 45 MB</span>
                    </div>
                </div>
            </div>

            <!-- Research Papers -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-file-alt text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Research Papers</h3>
                            <p class="mt-1 text-sm text-gray-500">Access scientific research on plastic pollution</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            Read Papers
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-pdf mr-2"></i>
                        <span>PDF, 3.8 MB</span>
                    </div>
                </div>
            </div>

            <!-- Community Initiatives -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Community Initiatives</h3>
                            <p class="mt-1 text-sm text-gray-500">Join local plastic reduction programs</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            Find Initiatives
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-pdf mr-2"></i>
                        <span>PDF, 1.2 MB</span>
                    </div>
                </div>
            </div>

            <!-- Eco-friendly Products -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-shopping-bag text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Eco-friendly Products</h3>
                            <p class="mt-1 text-sm text-gray-500">Discover sustainable alternatives</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            Browse Products
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-pdf mr-2"></i>
                        <span>PDF, 1.8 MB</span>
                    </div>
                </div>
            </div>

            <!-- Recycling Centers -->
            <div class="bg-white overflow-hidden shadow rounded-lg resource-card">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Recycling Centers</h3>
                            <p class="mt-1 text-sm text-gray-500">Find nearby recycling facilities</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#" class="text-green-600 hover:text-green-500 inline-flex items-center">
                            Locate Centers
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="mt-3 sm:mt-0 text-green-600 hover:text-green-500 inline-flex items-center download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <i class="fas fa-file-pdf mr-2"></i>
                        <span>PDF, 1.5 MB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Download Section -->
    <div class="bg-green-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Downloadable Resources</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Access our resources offline</p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-file-pdf text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Plastic Reduction Guide</h3>
                            <p class="mt-1 text-sm text-gray-500">PDF, 2.1 MB</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-file-pdf text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Recycling Checklist</h3>
                            <p class="mt-1 text-sm text-gray-500">PDF, 0.8 MB</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                            <i class="fas fa-file-pdf text-white text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Eco-friendly Shopping Guide</h3>
                            <p class="mt-1 text-sm text-gray-500">PDF, 1.5 MB</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="#" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 download-btn">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search and filter functionality
        const searchInput = document.getElementById('search-resources');
        const resourceFilter = document.getElementById('resource-filter');
        const resourceCards = document.querySelectorAll('.resource-card');
        
        function filterResources() {
            const searchTerm = searchInput.value.toLowerCase();
            const filterValue = resourceFilter.value;
            
            resourceCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const icon = card.querySelector('.flex-shrink-0 i').className;
                
                let category = '';
                if (icon.includes('fa-recycle')) category = 'recycling';
                else if (icon.includes('fa-video')) category = 'education';
                else if (icon.includes('fa-file-alt')) category = 'research';
                else if (icon.includes('fa-users')) category = 'community';
                else if (icon.includes('fa-shopping-bag')) category = 'products';
                else if (icon.includes('fa-map-marker-alt')) category = 'centers';
                
                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                const matchesFilter = filterValue === 'all' || category === filterValue;
                
                if (matchesSearch && matchesFilter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        searchInput.addEventListener('input', filterResources);
        resourceFilter.addEventListener('change', filterResources);
    </script>
</body>
</html> 