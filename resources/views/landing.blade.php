<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detech Portfolio System - Get Started</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 min-h-screen">
    
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative min-h-screen flex flex-col items-center justify-center p-4">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl mb-6 shadow-xl">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>

            <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
                Detech Portfolio
            </h1>
            <p class="text-xl md:text-2xl text-blue-200 font-light mb-2">
                Professional Portfolio Management System
            </p>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Create, customize, and showcase your professional portfolio with our powerful platform.
            </p>
        </div>

        <!-- Main Card -->
        <div class="w-full max-w-6xl">
            <form id="themeForm" action="{{ route('landing.select-theme') }}" method="POST" class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 md:p-12 shadow-2xl border border-white/20">
                @csrf
                
                <!-- Step Indicator -->
                <div class="flex items-center justify-center mb-12">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">1</div>
                            <span class="ml-2 text-white font-semibold">Choose Theme</span>
                        </div>
                        <div class="w-16 h-1 bg-gray-600"></div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-600 text-white flex items-center justify-center font-bold">2</div>
                            <span class="ml-2 text-gray-400 font-semibold">Sign Up</span>
                        </div>
                    </div>
                </div>

                <!-- Theme Selection -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-white text-center mb-8">
                        Select Your Portfolio Theme
                    </h2>

                    <div class="grid md:grid-cols-3 gap-6">
                        
                        <!-- Theme 1 -->
                        <div class="theme-card cursor-pointer rounded-2xl overflow-hidden shadow-lg bg-white transition-all duration-300 hover:transform hover:-translate-y-2" data-theme="theme1">
                            <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white/90 backdrop-blur-sm rounded-lg p-3">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-300 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 text-lg mb-2">🎨 Glass Modern</h3>
                                <p class="text-gray-600 text-sm mb-4">Sleek glass-morphism design</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 font-semibold text-sm">Current Design</span>
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 2 -->
                        <div class="theme-card cursor-pointer rounded-2xl overflow-hidden shadow-lg bg-white transition-all duration-300 hover:transform hover:-translate-y-2" data-theme="theme2">
                            <div class="h-48 bg-gradient-to-br from-green-500 to-teal-600 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white rounded-lg p-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg"></div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-300 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 text-lg mb-2">📐 Corporate Clean</h3>
                                <p class="text-gray-600 text-sm mb-4">Professional business layout</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-semibold text-sm">Coming Soon</span>
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Theme 3 -->
                        <div class="theme-card cursor-pointer rounded-2xl overflow-hidden shadow-lg bg-white transition-all duration-300 hover:transform hover:-translate-y-2" data-theme="theme3">
                            <div class="h-48 bg-gradient-to-br from-orange-500 to-pink-600 relative">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-gray-900 rounded-lg p-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-pink-500 rounded"></div>
                                            <div class="flex-1">
                                                <div class="h-2 bg-gray-700 rounded w-20 mb-1"></div>
                                                <div class="h-1 bg-gray-600 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 text-lg mb-2">🚀 Dark Creative</h3>
                                <p class="text-gray-600 text-sm mb-4">Bold dark aesthetic</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-orange-600 font-semibold text-sm">Coming Soon</span>
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 theme-radio"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="theme" id="selectedTheme" value="theme1" required>
                </div>

                <!-- Buttons -->
                <div class="space-y-6">
                    <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-4 px-8 rounded-xl font-bold text-lg transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        Continue to Sign Up →
                    </button>

                    <div class="text-center">
                        <p class="text-gray-300 mb-3">Already have an account?</p>
                        <a href="/admin/login" 
                           class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 font-semibold transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Sign In to Your Portfolio
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center text-gray-400 text-sm">
            <p>© 2025 Detech Company. All rights reserved.</p>
        </div>
    </div>

    <script>
        const themeCards = document.querySelectorAll('.theme-card');
        const selectedThemeInput = document.getElementById('selectedTheme');

        themeCards.forEach(card => {
            card.addEventListener('click', function() {
                const theme = this.dataset.theme;
                
                themeCards.forEach(c => {
                    c.classList.remove('ring-4', 'ring-blue-500');
                    c.querySelector('.theme-radio').classList.remove('bg-blue-600', 'border-blue-600');
                });
                
                this.classList.add('ring-4', 'ring-blue-500');
                this.querySelector('.theme-radio').classList.add('bg-blue-600', 'border-blue-600');
                
                selectedThemeInput.value = theme;
            });
        });

        // Auto-select first theme
        themeCards[0].click();
    </script>
</body>
</html>