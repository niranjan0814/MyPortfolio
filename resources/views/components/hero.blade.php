<!-- resources/views/components/hero.blade.php -->
<section id="hero" class="section-full bg-gradient-to-br from-blue-50 via-white to-purple-50 pt-24 relative overflow-hidden min-h-screen flex items-center">
    <!-- Animated background elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Grid background -->
    <div class="absolute inset-0 grid-bg opacity-30"></div>
    
    <div class="container mx-auto text-center fade-in relative z-10">
        <!-- Greeting badge -->
        <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg border border-gray-200 mb-8 hover:scale-105 transition-transform">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <span class="text-gray-700 font-medium">Available for opportunities</span>
        </div>
        
        <!-- Main heading with animated gradient -->
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6 text-gray-800">
            Hi, I'm 
            <span class="inline-block bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient">
                Niranjan Sivarasa
            </span>
        </h1>
        
        <!-- Typing effect subtitle -->
        <div class="mb-8 h-16">
            <p class="text-xl md:text-3xl text-gray-600 font-medium">
                <span id="typed-text"></span>
                <span class="animate-pulse">|</span>
            </p>
        </div>
        
        <!-- Description -->
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-12 leading-relaxed">
            Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <a href="#contact"
                class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <span class="relative z-10">Get In Touch</span>
                <i class="fas fa-paper-plane relative z-10 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
            
            <a href="#projects"
                class="group inline-flex items-center gap-3 bg-white text-gray-700 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300">
                <span>View My Work</span>
                <i class="fas fa-arrow-down group-hover:translate-y-1 transition-transform"></i>
            </a>
        </div>
        
        <!-- Social Links -->
        <div class="flex justify-center gap-6 mb-12">
            <a href="https://github.com/niranjan0814" target="_blank"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-gray-300">
                <i class="fab fa-github text-2xl text-gray-700 group-hover:scale-110 transition-transform"></i>
                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    GitHub
                </span>
            </a>
            
            <a href="https://linkedin.com/in/niranjan-sivarasa-56ba57366" target="_blank"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-blue-300">
                <i class="fab fa-linkedin text-2xl text-blue-600 group-hover:scale-110 transition-transform"></i>
                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    LinkedIn
                </span>
            </a>
            
            <a href="mailto:niranjansivarajah35@gmail.com"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-red-300">
                <i class="fas fa-envelope text-2xl text-red-600 group-hover:scale-110 transition-transform"></i>
                <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    Email
                </span>
            </a>
        </div>
        
        <!-- Tech Stack Preview -->
        <div class="inline-flex items-center gap-4 bg-white/80 backdrop-blur-sm px-8 py-4 rounded-2xl shadow-lg border border-gray-200">
            <span class="text-gray-600 font-medium">Tech Stack:</span>
            <div class="flex items-center gap-4">
                <i class="fab fa-react text-3xl text-blue-500 hover:scale-125 transition-transform" title="React"></i>
                <i class="fab fa-node-js text-3xl text-green-600 hover:scale-125 transition-transform" title="Node.js"></i>
                <i class="fas fa-leaf text-3xl text-green-500 hover:scale-125 transition-transform" title="MongoDB"></i>
                <i class="fab fa-js text-3xl text-yellow-500 hover:scale-125 transition-transform" title="JavaScript"></i>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#about" class="flex flex-col items-center gap-2 text-gray-400 hover:text-blue-600 transition-colors">
                <span class="text-sm font-medium">Scroll to explore</span>
                <i class="fas fa-chevron-down text-xl"></i>
            </a>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
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

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}
</style>

<script>
    // Typing effect
    const texts = [
        "Full-Stack Developer",
        "MERN Stack Enthusiast",
        "Software Engineering Student",
        "Problem Solver",
        "Team Leader"
    ];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typedTextElement = document.getElementById('typed-text');
    
    function type() {
        const currentText = texts[textIndex];
        
        if (isDeleting) {
            typedTextElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typedTextElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }
        
        if (!isDeleting && charIndex === currentText.length) {
            isDeleting = true;
            setTimeout(type, 2000);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            setTimeout(type, 500);
        } else {
            setTimeout(type, isDeleting ? 50 : 100);
        }
    }
    
    // Start typing effect when page loads
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(type, 1000);
    });
</script>