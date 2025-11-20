<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detech Portfolio System - Get Started</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-primary-600 to-primary-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-gray-900">Detech Portfolio</span>
            </div>
            <a href="/admin/login" class="text-primary-600 hover:text-primary-700 font-medium">
                Sign In
            </a>
        </div>
    </header>

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- Main Content -->
        <div class="w-full max-w-4xl">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Create Your Professional Portfolio
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Build a stunning portfolio website to showcase your work, skills, and achievements.
                </p>
            </div>

            <!-- Main Card -->
            <form id="themeForm" action="{{ route('landing.select-theme') }}" method="POST"
                class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                @csrf

                <!-- Step Indicator -->
                <div class="flex items-center justify-center mb-10">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div
                                class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center font-medium text-sm">
                                1</div>
                            <span class="ml-2 text-gray-900 font-medium">Choose Theme</span>
                        </div>
                        <div class="w-12 h-1 bg-gray-300"></div>
                        <div class="flex items-center">
                            <div
                                class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-medium text-sm">
                                2</div>
                            <span class="ml-2 text-gray-500 font-medium">Sign Up</span>
                        </div>
                    </div>
                </div>

                <!-- Theme Selection -->
                <div class="mb-10">
                    <h2 class="text-2xl font-semibold text-gray-900 text-center mb-6">
                        Select Your Portfolio Theme
                    </h2>

                    <div class="grid md:grid-cols-3 gap-6">

                        <!-- Theme 1 -->
                        <div class="theme-card cursor-pointer rounded-lg overflow-hidden shadow-sm border border-gray-200 bg-white transition-all duration-200 hover:shadow-md"
                            data-theme="theme1">
                            <div class="h-40 bg-gradient-to-br from-primary-500 to-primary-700 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white/90 rounded p-3">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-r from-primary-500 to-primary-600 rounded-full">
                                            </div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-300 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 text-base mb-2">Modern Professional</h3>
                                <p class="text-gray-600 text-sm mb-4">Clean, modern design with professional layout</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-primary-600 font-medium text-xs">Current Design</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 2 -->
                        <div class="theme-card cursor-pointer rounded-lg overflow-hidden shadow-sm border border-gray-200 bg-white transition-all duration-200 hover:shadow-md"
                            data-theme="theme2">
                            <div class="h-40 bg-gradient-to-br from-success-500 to-success-700 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white rounded p-3">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-r from-success-500 to-success-600 rounded-lg">
                                            </div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-300 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 text-base mb-2">Corporate Clean</h3>
                                <p class="text-gray-600 text-sm mb-4">Professional business layout</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-success-600 font-medium text-xs">Coming Soon</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 3 -->
                        <div class="theme-card cursor-pointer rounded-lg overflow-hidden shadow-sm border border-gray-200 bg-white transition-all duration-200 hover:shadow-md"
                            data-theme="theme3">
                            <div class="h-40 bg-gradient-to-br from-warning-500 to-warning-700 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-gray-900 rounded p-3">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-r from-warning-500 to-warning-600 rounded">
                                            </div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-700 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-600 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 text-base mb-2">Greenish coolest Theme</h3>
                                <p class="text-gray-600 text-sm mb-4">Aesthetic UIs</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-warning-600 font-medium text-xs">Coming Soon</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="theme" id="selectedTheme" value="theme1" required>
                </div>

                <!-- Buttons -->
                <div class="space-y-6">
                    <button type="submit"
                        class="w-full text-white py-3 px-8 rounded-lg font-medium shadow-sm transition-all duration-200"
                        style="background-color: #D47A00;" onmouseover="this.style.backgroundColor='#b86a00'"
                        onmouseout="this.style.backgroundColor='#D47A00'">
                        Sign in
                    </button>


                    <div class="text-center">
                        <p class="text-gray-600 mb-3">Already have an account?</p>
                        <a href="/admin/login"
                            class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-medium transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Sign In to Your Portfolio
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-gray-500 text-sm">
            <p>© 2025 Detech Company. All rights reserved.</p>
        </div>
    </div>

    <script>
        const themeCards = document.querySelectorAll('.theme-card');
        const selectedThemeInput = document.getElementById('selectedTheme');

        themeCards.forEach(card => {
            card.addEventListener('click', function () {
                const theme = this.dataset.theme;

                themeCards.forEach(c => {
                    c.classList.remove('ring-2', 'ring-primary-500');
                    c.querySelector('.theme-radio').classList.remove('bg-primary-600', 'border-primary-600');
                });

                this.classList.add('ring-2', 'ring-primary-500');
                this.querySelector('.theme-radio').classList.add('bg-primary-600', 'border-primary-600');

                selectedThemeInput.value = theme;
            });
        });

        // Auto-select first theme
        themeCards[0].click();
    </script>
</body>

</html>