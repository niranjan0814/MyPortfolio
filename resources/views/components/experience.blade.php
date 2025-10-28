<!-- resources/views/components/experience.blade.php -->
<section id="experience" class="section-full bg-white relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute top-0 left-0 w-full h-full opacity-5">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto max-w-6xl fade-in relative z-10">
        <div class="text-center mb-20">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                My Journey
            </h2>
            <p class="text-gray-600 text-lg">Professional experience & career milestones</p>
        </div>
        
        <!-- Roadmap Timeline -->
        <div class="relative">
            <!-- Central vertical line -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-400 via-purple-400 to-green-400"></div>
            
            <!-- Current Position - SE Intern at Detect -->
            <div class="relative mb-16 md:mb-24">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left side (desktop) -->
                    <div class="md:w-1/2 md:pr-12 mb-8 md:mb-0">
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl border-2 border-green-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse">
                                    CURRENT
                                </div>
                                <span class="text-gray-600 font-medium">Present</span>
                            </div>
                            <h3 class="text-3xl font-bold text-green-600 mb-3 flex items-center gap-3">
                                <i class="fas fa-briefcase"></i>
                                Software Engineering Intern
                            </h3>
                            <p class="text-xl text-gray-700 font-semibold mb-2">Detect Technologies</p>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">
                                    Full-Stack
                                </span>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">
                                    Real-time Systems
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Center node -->
                    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                        <i class="fas fa-rocket text-white text-2xl"></i>
                    </div>
                    
                    <!-- Right side (desktop) - empty for alignment -->
                    <div class="md:w-1/2"></div>
                </div>
            </div>
            
            <!-- Experience 1 - Arotac Food Ordering System -->
            <div class="relative mb-16 md:mb-24">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left side (desktop) - empty -->
                    <div class="md:w-1/2"></div>
                    
                    <!-- Center node -->
                    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                        <i class="fas fa-pizza-slice text-white text-2xl"></i>
                    </div>
                    
                    <!-- Right side content -->
                    <div class="md:w-1/2 md:pl-12">
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl border-2 border-blue-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="text-gray-600 font-medium">Feb 2025 - May 2025</span>
                            </div>
                            <h3 class="text-3xl font-bold text-blue-600 mb-3 flex items-center gap-3">
                                <i class="fas fa-code"></i>
                                Full-Stack Developer & Team Lead
                            </h3>
                            <p class="text-xl text-gray-700 font-semibold mb-4">Arotac Food Ordering System</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium border border-blue-300">MERN Stack</span>
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium border border-blue-300">Socket.IO</span>
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium border border-blue-300">Real-time</span>
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium border border-blue-300">Maps API</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Experience 2 - Employee Management System -->
            <div class="relative mb-16 md:mb-24">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left side content -->
                    <div class="md:w-1/2 md:pr-12 mb-8 md:mb-0">
                        <div class="bg-gradient-to-br from-green-50 to-teal-50 p-8 rounded-2xl border-2 border-green-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="text-gray-600 font-medium">July 2024 - Nov 2024</span>
                            </div>
                            <h3 class="text-3xl font-bold text-green-600 mb-3 flex items-center gap-3">
                                <i class="fas fa-laptop-code"></i>
                                Java Developer
                            </h3>
                            <p class="text-xl text-gray-700 font-semibold mb-4">Employee Management System</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">Java</span>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">OOP</span>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border border-green-300">JSP</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Center node -->
                    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-green-400 to-teal-500 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                        <i class="fas fa-users-cog text-white text-2xl"></i>
                    </div>
                    
                    <!-- Right side (desktop) - empty -->
                    <div class="md:w-1/2"></div>
                </div>
            </div>
            
            <!-- Experience 3 - Online Voting System -->
            <div class="relative">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left side (desktop) - empty -->
                    <div class="md:w-1/2"></div>
                    
                    <!-- Center node -->
                    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                        <i class="fas fa-vote-yea text-white text-2xl"></i>
                    </div>
                    
                    <!-- Right side content -->
                    <div class="md:w-1/2 md:pl-12">
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl border-2 border-purple-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="text-gray-600 font-medium">Feb 2024 - May 2024</span>
                            </div>
                            <h3 class="text-3xl font-bold text-purple-600 mb-3 flex items-center gap-3">
                                <i class="fas fa-desktop"></i>
                                Web Developer
                            </h3>
                            <p class="text-xl text-gray-700 font-semibold mb-4">Online Voting System</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium border border-purple-300">PHP</span>
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium border border-purple-300">MySQL</span>
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium border border-purple-300">JavaScript</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Starting point -->
            <div class="hidden md:flex absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full items-center justify-center shadow-lg border-4 border-white z-10 mt-16">
                <i class="fas fa-flag-checkered text-white text-lg"></i>
            </div>
        </div>
    </div>
</section>