<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-gray-200 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    </div>
    
    <div class="relative z-10">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <!-- Brand & About -->
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                        Niranjan Sivarasa
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Full-Stack Developer specializing in MERN Stack. Passionate about creating elegant, 
                        scalable web applications that solve real-world problems. Currently pursuing B.Sc.(Hons) 
                        in Information Technology at SLIIT with a GPA of 3.79.
                    </p>
                    <div class="flex items-center gap-3 text-sm text-gray-400">
                        <i class="fas fa-map-marker-alt text-blue-400"></i>
                        <span>Jaffna, Sri Lanka</span>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-white flex items-center gap-2">
                        <i class="fas fa-link text-blue-400"></i>
                        Quick Links
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#about" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                About Me
                            </a>
                        </li>
                        <li>
                            <a href="#projects" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="#skills" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                Skills
                            </a>
                        </li>
                        <li>
                            <a href="#experience" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                Experience
                            </a>
                        </li>
                        <li>
                            <a href="#education" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                Education
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-white flex items-center gap-2">
                        <i class="fas fa-address-book text-purple-400"></i>
                        Get In Touch
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="tel:+94764231394" class="text-gray-300 hover:text-blue-400 transition-colors flex items-start gap-3 group">
                                <i class="fas fa-phone text-blue-400 mt-1"></i>
                                <span>+94 76 423 1394</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:niranjansivarajah35@gmail.com" class="text-gray-300 hover:text-blue-400 transition-colors flex items-start gap-3 group">
                                <i class="fas fa-envelope text-purple-400 mt-1"></i>
                                <span class="break-all">niranjansivarajah35@gmail.com</span>
                            </a>
                        </li>
                        <li class="flex items-start gap-3 text-gray-300">
                            <i class="fas fa-map-marker-alt text-red-400 mt-1"></i>
                            <span>No. 424/11, K.K.S. Road,<br>Jaffna, Sri Lanka</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Social Links Section -->
            <div class="mt-12 pt-8 border-t border-gray-700">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-center md:text-left">
                        <h4 class="text-lg font-semibold text-white mb-3">Connect With Me</h4>
                        <div class="flex justify-center md:justify-start gap-4">
                            <a href="https://github.com/niranjan0814" target="_blank" 
                               class="group relative w-12 h-12 flex items-center justify-center bg-gray-800 rounded-full hover:bg-gradient-to-r hover:from-gray-700 hover:to-gray-900 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fab fa-github text-xl text-gray-300 group-hover:text-white"></i>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                    GitHub
                                </span>
                            </a>
                            
                            <a href="https://linkedin.com/in/niranjan-sivarasa-56ba57366" target="_blank" 
                               class="group relative w-12 h-12 flex items-center justify-center bg-blue-600 rounded-full hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fab fa-linkedin-in text-xl text-white"></i>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                    LinkedIn
                                </span>
                            </a>
                            
                            <a href="mailto:niranjansivarajah35@gmail.com" 
                               class="group relative w-12 h-12 flex items-center justify-center bg-red-600 rounded-full hover:bg-gradient-to-r hover:from-red-500 hover:to-red-700 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fas fa-envelope text-xl text-white"></i>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                    Email
                                </span>
                            </a>
                            
                            <a href="tel:+94764231394" 
                               class="group relative w-12 h-12 flex items-center justify-center bg-green-600 rounded-full hover:bg-gradient-to-r hover:from-green-500 hover:to-green-700 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fas fa-phone text-xl text-white"></i>
                                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                    Phone
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Tech Stack Pills -->
                    <div class="text-center md:text-right">
                        <h4 class="text-sm font-semibold text-gray-400 mb-3">Built With</h4>
                        <div class="flex flex-wrap justify-center md:justify-end gap-2">
                            <span class="px-3 py-1 bg-gray-800 rounded-full text-xs text-gray-300 border border-gray-700">Laravel</span>
                            <span class="px-3 py-1 bg-gray-800 rounded-full text-xs text-gray-300 border border-gray-700">TailwindCSS</span>
                            <span class="px-3 py-1 bg-gray-800 rounded-full text-xs text-gray-300 border border-gray-700">PHP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700 bg-black/30">
            <div class="max-w-7xl mx-auto px-6 md:px-12 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
                    <p class="text-gray-400 text-center md:text-left">
                        © 2025 Niranjan Sivarasa. All Rights Reserved.
                    </p>
                    <p class="text-gray-400 text-center md:text-right flex items-center gap-2">
                        <span>Made with</span>
                        <i class="fas fa-heart text-red-500 animate-pulse"></i>
                        <span>and</span>
                        <i class="fas fa-coffee text-yellow-600"></i>
                        <span>in Sri Lanka</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>