<!-- resources/views/components/about.blade.php -->
<section id="about" class="section-full bg-gradient-to-br from-white via-blue-50 to-purple-50 relative overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>
    
    <div class="container mx-auto max-w-6xl fade-in relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                About Me
            </h2>
            <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Profile Image -->
            <div class="flex justify-center lg:justify-end">
                <div class="relative group">
                    <!-- Decorative rings -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-700 scale-105 animate-pulse"></div>
                    
                    <!-- Main image container -->
                    <div class="relative">
                        <!-- Rotating border -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-full animate-spin-slow p-1">
                            <div class="w-full h-full bg-white rounded-full"></div>
                        </div>
                        
                        <!-- Profile image -->
                        <div class="relative w-72 h-72 md:w-80 md:h-80 rounded-full overflow-hidden border-8 border-white shadow-2xl group-hover:scale-105 transition-transform duration-500">
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 flex items-center justify-center">
                                <!-- Placeholder - Replace with your actual image -->
                                <div class="text-center">
                                    <i class="fas fa-user-circle text-9xl text-blue-400 opacity-50"></i>
                                    <p class="text-gray-500 mt-4 text-sm">Add your photo here</p>
                                </div>
                                <!-- To use your photo, replace the div above with: -->
                                 <img src="/Users/nirusivarasa/Documents/portfolio/public/images/profile.PNG" alt="Niranjan Sivarasa" class="w-full h-full object-cover"> 
                            </div>
                        </div>
                        
                        <!-- Floating badges -->
                        <div class="absolute -top-4 -right-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-full shadow-lg transform rotate-12 hover:rotate-0 transition-transform duration-300">
                            <span class="font-bold text-lg">GPA 3.79</span>
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full shadow-lg transform -rotate-12 hover:rotate-0 transition-transform duration-300">
                            <span class="font-bold text-lg">MERN Stack</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - About Content -->
            <div class="space-y-6">
                <!-- Introduction -->
                <div class="space-y-4">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-user-graduate text-white text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800">Hi, I'm Niranjan!</h3>
                    </div>
                    
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Driven and innovative undergraduate at <span class="font-semibold text-blue-600">SLIIT</span> specializing in 
                        <span class="font-semibold text-purple-600">Software Engineering</span>, with a strong academic record and hands-on 
                        experience in full-stack development.
                    </p>
                    
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Passionate about building <span class="font-semibold text-blue-600">scalable web applications</span> and delivering 
                        impactful user experiences. Currently maintaining a GPA of <span class="font-semibold text-purple-600">3.79</span> and 
                        actively working on real-world projects using the <span class="font-semibold text-pink-600">MERN stack</span>.
                    </p>
                </div>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-4 pt-6">
                    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border-2 border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-lg group">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-code text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-blue-600 mb-1">5+</h4>
                        <p class="text-gray-600 font-medium">Projects Completed</p>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border-2 border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-lg group">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-layer-group text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-purple-600 mb-1">10+</h4>
                        <p class="text-gray-600 font-medium">Technologies</p>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border-2 border-pink-100 hover:border-pink-300 transition-all duration-300 hover:shadow-lg group">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-pink-600 mb-1">Team</h4>
                        <p class="text-gray-600 font-medium">Leadership Skills</p>
                    </div>
                    
                    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl border-2 border-green-100 hover:border-green-300 transition-all duration-300 hover:shadow-lg group">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-lightbulb text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-green-600 mb-1">Problem</h4>
                        <p class="text-gray-600 font-medium">Solving Expert</p>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <div class="pt-6">
                    <a href="#contact" class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group">
                        <span>Let's Work Together</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.animate-spin-slow {
    animation: spin-slow 8s linear infinite;
}
</style>