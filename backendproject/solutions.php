<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions - EcoPlastic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .solution-card {
            transition: all 0.3s ease;
        }
        .solution-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .learn-more-btn {
            transition: all 0.2s ease;
        }
        .learn-more-btn:hover {
            transform: scale(1.05);
        }
        .impact-bar {
            transition: width 1.5s ease-in-out;
        }
        .solution-details {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }
        .solution-details.active {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block">Innovative Solutions</span>
                    <span class="block text-green-600">For a Sustainable Future</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Discover cutting-edge solutions to reduce plastic waste and promote sustainability.
                </p>
            </div>
        </div>
    </div>

   
    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-white">Solution Impact Calculator</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-green-100">See how your choices make a difference</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="solution-type" class="block text-sm font-medium text-gray-700">Select Solution</label>
                        <select id="solution-type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                            <option value="reusable-bags">Reusable Shopping Bags</option>
                            <option value="bamboo-kitchenware">Bamboo Kitchenware</option>
                            <option value="water-filter">Water Filtration System</option>
                            <option value="eco-packaging">Eco-Friendly Packaging</option>
                            <option value="waste-management">Waste Management Program</option>
                        </select>
                    </div>
                    <div>
                        <label for="timeframe" class="block text-sm font-medium text-gray-700">Timeframe (months)</label>
                        <input type="range" id="timeframe" min="1" max="12" value="6" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                        <div class="flex justify-between text-xs text-gray-500">
                            <span>1 month</span>
                            <span id="timeframe-value">6 months</span>
                            <span>12 months</span>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Environmental Impact</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">Plastic Waste Reduced</span>
                                <span class="text-sm font-medium text-green-600" id="plastic-reduced">0 kg</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full impact-bar" id="plastic-bar" style="width: 0%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">Carbon Emissions Saved</span>
                                <span class="text-sm font-medium text-green-600" id="carbon-saved">0 kg</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full impact-bar" id="carbon-bar" style="width: 0%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">Money Saved</span>
                                <span class="text-sm font-medium text-green-600" id="money-saved">$0</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full impact-bar" id="money-bar" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <button id="calculate-impact" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Calculate Impact
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Solutions Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Filter Section -->
        <div class="mb-8 bg-white p-4 rounded-lg shadow">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <label for="solution-filter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                    <select id="solution-filter" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="all">All Categories</option>
                        <option value="household">Household Solutions</option>
                        <option value="business">Business Solutions</option>
                        <option value="community">Community Solutions</option>
                    </select>
                </div>
                <div>
                    <label for="solution-search" class="block text-sm font-medium text-gray-700 mb-1">Search Solutions</label>
                    <div class="relative">
                        <input type="text" id="solution-search" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md" placeholder="Search...">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Household Solutions -->
        <div class="mb-16" id="household-solutions">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Household Solutions</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Solution 1 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-shopping-bag text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Reusable Shopping Bags</h3>
                                <p class="mt-1 text-sm text-gray-500">Replace single-use plastic bags with durable alternatives</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Durable and long-lasting</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Machine washable</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Multiple size options</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="reusable-bags">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Products <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Reusable shopping bags can replace hundreds of single-use plastic bags over their lifetime. Made from sustainable materials like organic cotton, hemp, or recycled materials, they significantly reduce plastic waste and carbon emissions.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Saves approximately 500 single-use bags per year</li>
                                    <li>• Reduces carbon emissions by 2.5 kg per year</li>
                                    <li>• Saves $50-100 annually on bag purchases</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-utensils text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Bamboo Kitchenware</h3>
                                <p class="mt-1 text-sm text-gray-500">Sustainable alternatives to plastic kitchen items</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Biodegradable</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Antimicrobial properties</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Stylish design</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="bamboo-kitchenware">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Products <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Bamboo kitchenware offers a sustainable alternative to plastic utensils, cutting boards, and storage containers. Bamboo is a fast-growing grass that requires minimal resources to cultivate and naturally decomposes when disposed of.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Replaces 20+ plastic kitchen items</li>
                                    <li>• Reduces carbon emissions by 1.8 kg per year</li>
                                    <li>• Biodegradable within 2-3 years</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-wine-bottle text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Water Filtration Systems</h3>
                                <p class="mt-1 text-sm text-gray-500">Reduce bottled water consumption</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Cost-effective</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Better water quality</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Reduces plastic waste</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="water-filter">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Products <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Water filtration systems eliminate the need for bottled water, significantly reducing plastic waste. Modern filtration systems can remove contaminants while providing clean, great-tasting water directly from your tap.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Eliminates 730+ plastic bottles per year</li>
                                    <li>• Reduces carbon emissions by 5.2 kg per year</li>
                                    <li>• Saves $500+ annually on bottled water</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Solutions -->
        <div class="mb-16" id="business-solutions">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Business Solutions</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Solution 1 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-box text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Eco-Friendly Packaging</h3>
                                <p class="mt-1 text-sm text-gray-500">Sustainable packaging solutions for businesses</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Biodegradable materials</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Customizable options</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Cost-effective</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="eco-packaging">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Suppliers <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Eco-friendly packaging uses sustainable materials like recycled paper, cardboard, plant-based plastics, or biodegradable materials. These alternatives reduce environmental impact while maintaining product protection and branding opportunities.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Reduces plastic packaging by 80-100%</li>
                                    <li>• Decreases carbon footprint by 15-25%</li>
                                    <li>• Enhances brand reputation and customer loyalty</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-recycle text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Waste Management</h3>
                                <p class="mt-1 text-sm text-gray-500">Comprehensive recycling programs</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Regular collection</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Proper sorting</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Data tracking</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="waste-management">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Get Started <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Effective waste management programs help businesses reduce landfill waste, increase recycling rates, and track environmental impact. These programs often include employee education, proper sorting infrastructure, and regular collection services.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Diverts 60-80% of waste from landfills</li>
                                    <li>• Reduces carbon emissions by 10-15%</li>
                                    <li>• Creates potential revenue from recycled materials</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-leaf text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Green Procurement</h3>
                                <p class="mt-1 text-sm text-gray-500">Sustainable supply chain solutions</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Eco-friendly suppliers</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Local sourcing</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Reduced carbon footprint</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="green-procurement">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Partners <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Green procurement involves selecting suppliers and products with minimal environmental impact. This approach considers the entire lifecycle of products, from raw materials to disposal, ensuring sustainable business practices.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Reduces supply chain carbon emissions by 20-30%</li>
                                    <li>• Decreases packaging waste by 40-50%</li>
                                    <li>• Supports sustainable business practices throughout the supply chain</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Community Solutions -->
        <div id="community-solutions">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Community Solutions</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Solution 1 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Community Cleanup</h3>
                                <p class="mt-1 text-sm text-gray-500">Organize local cleanup events</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Regular events</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Community engagement</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Educational component</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="community-cleanup">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Join Event <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Community cleanup events bring people together to remove litter and plastic waste from local environments. These events raise awareness about plastic pollution while improving community spaces and protecting wildlife.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Removes hundreds of pounds of plastic waste</li>
                                    <li>• Educates 50-100 participants per event</li>
                                    <li>• Creates lasting community environmental awareness</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-seedling text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Community Gardens</h3>
                                <p class="mt-1 text-sm text-gray-500">Promote sustainable living</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Local food production</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Community bonding</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Educational programs</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="community-gardens">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Gardens <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Community gardens provide spaces for growing local food, reducing packaging waste from store-bought produce, and educating community members about sustainable agriculture practices.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Reduces food packaging waste by 30-40%</li>
                                    <li>• Decreases carbon emissions from food transport</li>
                                    <li>• Creates green spaces that improve local biodiversity</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="bg-white overflow-hidden shadow rounded-lg solution-card">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-exchange-alt text-white text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Swap Events</h3>
                                <p class="mt-1 text-sm text-gray-500">Community item exchange programs</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Reduce waste</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Community building</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Cost-effective</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <button class="text-green-600 hover:text-green-500 text-sm font-medium learn-more-btn" data-solution="swap-events">
                                Learn More
                            </button>
                            <a href="#" class="text-green-600 hover:text-green-500 text-sm font-medium">
                                Find Events <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="solution-details mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Swap events allow community members to exchange items they no longer need, reducing waste and the need for new products. These events promote reuse, reduce consumption, and build community connections.
                            </p>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-900">Environmental Impact:</h4>
                                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                                    <li>• Diverts 100-200 items from landfills per event</li>
                                    <li>• Reduces demand for new products and packaging</li>
                                    <li>• Creates awareness about sustainable consumption</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Solution filter functionality
        const solutionFilter = document.getElementById('solution-filter');
        const solutionSearch = document.getElementById('solution-search');
        const solutionSections = document.querySelectorAll('[id$="-solutions"]');
        
        function filterSolutions() {
            const filterValue = solutionFilter.value;
            const searchTerm = solutionSearch.value.toLowerCase();
            
            solutionSections.forEach(section => {
                const sectionId = section.id;
                const category = sectionId.replace('-solutions', '');
                
                const matchesFilter = filterValue === 'all' || category === filterValue;
                
                if (matchesFilter) {
                    section.style.display = 'block';
                    
                    // Filter cards within visible sections
                    const cards = section.querySelectorAll('.solution-card');
                    cards.forEach(card => {
                        const title = card.querySelector('h3').textContent.toLowerCase();
                        const description = card.querySelector('p').textContent.toLowerCase();
                        
                        const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                        
                        if (matchesSearch) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                } else {
                    section.style.display = 'none';
                }
            });
        }
        
        solutionFilter.addEventListener('change', filterSolutions);
        solutionSearch.addEventListener('input', filterSolutions);
        
        // Learn More button functionality
        const learnMoreButtons = document.querySelectorAll('.learn-more-btn');
        
        learnMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const details = this.closest('.solution-card').querySelector('.solution-details');
                details.classList.toggle('active');
                
                if (details.classList.contains('active')) {
                    this.textContent = 'Show Less';
                } else {
                    this.textContent = 'Learn More';
                }
            });
        });
        
        // Impact Calculator functionality
        const solutionType = document.getElementById('solution-type');
        const timeframe = document.getElementById('timeframe');
        const timeframeValue = document.getElementById('timeframe-value');
        const calculateButton = document.getElementById('calculate-impact');
        
        timeframe.addEventListener('input', function() {
            timeframeValue.textContent = `${this.value} months`;
        });
        
        calculateButton.addEventListener('click', function() {
            const selectedSolution = solutionType.value;
            const months = parseInt(timeframe.value);
            
            let plasticReduced = 0;
            let carbonSaved = 0;
            let moneySaved = 0;
            
            // Calculate impact based on solution type and timeframe
            switch(selectedSolution) {
                case 'reusable-bags':
                    plasticReduced = 5 * months;      // 5 kg per month
                    carbonSaved = 0.5 * months;       // 0.5 kg per month
                    moneySaved = 8 * months;          // $8 per month
                    break;
                case 'bamboo-kitchenware':
                    plasticReduced = 3 * months;      // 3 kg per month
                    carbonSaved = 0.3 * months;       // 0.3 kg per month
                    moneySaved = 5 * months;          // $5 per month
                    break;
                case 'water-filter':
                    plasticReduced = 10 * months;     // 10 kg per month
                    carbonSaved = 1 * months;         // 1 kg per month
                    moneySaved = 15 * months;         // $15 per month
                    break;
                case 'eco-packaging':
                    plasticReduced = 20 * months;
                    carbonSaved = 2 * months;
                    moneySaved = 25 * months;
                    break;
                case 'waste-management':
                    plasticReduced = 15 * months;
                    carbonSaved = 1.5 * months;
                    moneySaved = 20 * months;
                    break;
            }
            
            // Update display
            document.getElementById('plastic-reduced').textContent = `${plasticReduced} kg`;
            document.getElementById('carbon-saved').textContent = `${carbonSaved} kg`;
            document.getElementById('money-saved').textContent = `$${moneySaved}`;
            
            // Animate bars
            document.getElementById('plastic-bar').style.width = `${Math.min(plasticReduced * 5, 100)}%`;
            document.getElementById('carbon-bar').style.width = `${Math.min(carbonSaved * 10, 100)}%`;
            document.getElementById('money-bar').style.width = `${Math.min(moneySaved * 2, 100)}%`;
        });
    </script>
</body>
</html> 