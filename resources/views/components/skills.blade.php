<!-- resources/views/components/skills.blade.php -->
<section id="skills" class="section-full bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto fade-in relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Technical Arsenal</h2>
            <p class="text-gray-600 text-lg">Technologies I work with to bring ideas to life</p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            
            <!-- Frontend -->
            <div class="mb-16 transform hover:scale-[1.02] transition-transform">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px bg-gradient-to-r from-transparent via-blue-500 to-transparent flex-1"></div>
                    <h3 class="text-3xl font-bold text-blue-600 px-6 flex items-center gap-3">
                        <i class="fas fa-palette"></i>
                        Frontend Development
                    </h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-blue-500 to-transparent flex-1"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <!-- React -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:rotate-180 transition-transform duration-500" viewBox="0 0 128 128">
                                <g fill="#61DAFB"><circle cx="64" cy="64" r="11.4"/><path d="M107.3 45.2c-2.2-.8-4.5-1.6-6.9-2.3.6-2.4 1.1-4.8 1.5-7.1 2.1-13.2-.2-22.5-6.6-26.1-1.9-1.1-4-1.6-6.4-1.6-7 0-15.9 5.2-24.9 13.9-9-8.7-17.9-13.9-24.9-13.9-2.4 0-4.5.5-6.4 1.6-6.4 3.7-8.7 13-6.6 26.1.4 2.3.9 4.7 1.5 7.1-2.4.7-4.7 1.4-6.9 2.3C8.2 50 1.4 56.6 1.4 64s6.9 14 19.3 18.8c2.2.8 4.5 1.6 6.9 2.3-.6 2.4-1.1 4.8-1.5 7.1-2.1 13.2.2 22.5 6.6 26.1 1.9 1.1 4 1.6 6.4 1.6 7.1 0 16-5.2 24.9-13.9 9 8.7 17.9 13.9 24.9 13.9 2.4 0 4.5-.5 6.4-1.6 6.4-3.7 8.7-13 6.6-26.1-.4-2.3-.9-4.7-1.5-7.1 2.4-.7 4.7-1.4 6.9-2.3 12.5-4.8 19.3-11.4 19.3-18.8s-6.8-14-19.3-18.8zM92.5 14.7c4.1 2.4 5.5 9.8 3.8 20.3-.3 2.1-.8 4.3-1.4 6.6-5.2-1.2-10.7-2-16.5-2.5-3.4-4.8-6.9-9.1-10.4-13 7.4-7.3 14.9-12.3 21-12.3 1.3 0 2.5.3 3.5.9zM81.3 74c-1.8 3.2-3.9 6.4-6.1 9.6-3.7.3-7.4.4-11.2.4-3.9 0-7.6-.1-11.2-.4-2.2-3.2-4.2-6.4-6-9.6-1.9-3.3-3.7-6.7-5.3-10 1.6-3.3 3.4-6.7 5.3-10 1.8-3.2 3.9-6.4 6.1-9.6 3.7-.3 7.4-.4 11.2-.4 3.9 0 7.6.1 11.2.4 2.2 3.2 4.2 6.4 6 9.6 1.9 3.3 3.7 6.7 5.3 10-1.7 3.3-3.4 6.6-5.3 10zm8.3-3.3c1.5 3.5 2.7 6.9 3.8 10.3-3.4.8-7 1.4-10.8 1.9 1.2-1.9 2.5-3.9 3.6-6 1.2-2.1 2.3-4.2 3.4-6.2zM64 97.8c-2.4-2.6-4.7-5.4-6.9-8.3 2.3.1 4.6.2 6.9.2 2.3 0 4.6-.1 6.9-.2-2.2 2.9-4.5 5.7-6.9 8.3zm-18.6-15c-3.8-.5-7.4-1.1-10.8-1.9 1.1-3.3 2.3-6.8 3.8-10.3 1.1 2 2.2 4.1 3.4 6.1 1.2 2.2 2.4 4.1 3.6 6.1zm-7-25.5c-1.5-3.5-2.7-6.9-3.8-10.3 3.4-.8 7-1.4 10.8-1.9-1.2 1.9-2.5 3.9-3.6 6-1.2 2.1-2.3 4.2-3.4 6.2zM64 30.2c2.4 2.6 4.7 5.4 6.9 8.3-2.3-.1-4.6-.2-6.9-.2-2.3 0-4.6.1-6.9.2 2.2-2.9 4.5-5.7 6.9-8.3zm22.2 21l-3.6-6c3.8.5 7.4 1.1 10.8 1.9-1.1 3.3-2.3 6.8-3.8 10.3-1.1-2.1-2.2-4.2-3.4-6.2zM31.7 35c-1.7-10.5-.3-17.9 3.8-20.3 1-.6 2.2-.9 3.5-.9 6 0 13.5 4.9 21 12.3-3.5 3.8-7 8.2-10.4 13-5.8.5-11.3 1.4-16.5 2.5-.6-2.3-1-4.5-1.4-6.6zM7 64c0-4.7 5.7-9.7 15.7-13.4 2-.8 4.2-1.5 6.4-2.1 1.6 5 3.6 10.3 6 15.6-2.4 5.3-4.5 10.5-6 15.5C15.3 75.6 7 69.6 7 64zm28.5 49.3c-4.1-2.4-5.5-9.8-3.8-20.3.3-2.1.8-4.3 1.4-6.6 5.2 1.2 10.7 2 16.5 2.5 3.4 4.8 6.9 9.1 10.4 13-7.4 7.3-14.9 12.3-21 12.3-1.3 0-2.5-.3-3.5-.9zM96.3 93c1.7 10.5.3 17.9-3.8 20.3-1 .6-2.2.9-3.5.9-6 0-13.5-4.9-21-12.3 3.5-3.8 7-8.2 10.4-13 5.8-.5 11.3-1.4 16.5-2.5.6 2.3 1 4.5 1.4 6.6zm9-15.6c-2 .8-4.2 1.5-6.4 2.1-1.6-5-3.6-10.3-6-15.6 2.4-5.3 4.5-10.5 6-15.5 13.8 4 22.1 10 22.1 15.6 0 4.7-5.8 9.7-15.7 13.4z"/></g>
                            </svg>
                            <span class="font-semibold text-gray-700">React</span>
                        </div>
                    </div>
                    
                    <!-- React Native -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <g fill="#61DAFB"><circle cx="64" cy="64" r="11.4"/><path d="M107.3 45.2c-2.2-.8-4.5-1.6-6.9-2.3.6-2.4 1.1-4.8 1.5-7.1 2.1-13.2-.2-22.5-6.6-26.1-1.9-1.1-4-1.6-6.4-1.6-7 0-15.9 5.2-24.9 13.9-9-8.7-17.9-13.9-24.9-13.9-2.4 0-4.5.5-6.4 1.6-6.4 3.7-8.7 13-6.6 26.1.4 2.3.9 4.7 1.5 7.1-2.4.7-4.7 1.4-6.9 2.3C8.2 50 1.4 56.6 1.4 64s6.9 14 19.3 18.8c2.2.8 4.5 1.6 6.9 2.3-.6 2.4-1.1 4.8-1.5 7.1-2.1 13.2.2 22.5 6.6 26.1 1.9 1.1 4 1.6 6.4 1.6 7.1 0 16-5.2 24.9-13.9 9 8.7 17.9 13.9 24.9 13.9 2.4 0 4.5-.5 6.4-1.6 6.4-3.7 8.7-13 6.6-26.1-.4-2.3-.9-4.7-1.5-7.1 2.4-.7 4.7-1.4 6.9-2.3 12.5-4.8 19.3-11.4 19.3-18.8s-6.8-14-19.3-18.8zM92.5 14.7c4.1 2.4 5.5 9.8 3.8 20.3-.3 2.1-.8 4.3-1.4 6.6-5.2-1.2-10.7-2-16.5-2.5-3.4-4.8-6.9-9.1-10.4-13 7.4-7.3 14.9-12.3 21-12.3 1.3 0 2.5.3 3.5.9z"/></g>
                            </svg>
                            <span class="font-semibold text-gray-700 text-sm">React Native</span>
                        </div>
                    </div>
                    
                    <!-- HTML5 -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-400 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-orange-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#E44D26" d="M19.037 113.876L9.032 1.661h109.936l-10.016 112.198-45.019 12.48z"/><path fill="#F16529" d="M64 116.8l36.378-10.086 8.559-95.878H64z"/><path fill="#EBEBEB" d="M64 52.455H45.788L44.53 38.361H64V24.599H29.489l.33 3.692 3.382 37.927H64zm0 35.743l-.061.017-15.327-4.14-.979-10.975H33.816l1.928 21.609 28.193 7.826.063-.017z"/><path fill="#FFF" d="M63.952 52.455v13.763h16.947l-1.597 17.849-15.35 4.143v14.319l28.215-7.82.207-2.325 3.234-36.233.335-3.696h-3.708zm0-27.856v13.762h33.244l.276-3.092.628-6.978.329-3.692z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">HTML5</span>
                        </div>
                    </div>
                    
                    <!-- CSS3 -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#1572B6" d="M18.814 114.123L8.76 1.352h110.48l-10.064 112.754-45.243 12.543-45.119-12.526z"/><path fill="#33A9DC" d="M64.001 117.062l36.559-10.136 8.601-96.354h-45.16v106.49z"/><path fill="#fff" d="M64.001 51.429h18.302l1.264-14.163H64.001V23.435h34.682l-.332 3.711-3.4 38.114h-30.95V51.429z"/><path fill="#EBEBEB" d="M64.083 87.349l-.061.018-15.403-4.159-.985-11.031H33.752l1.937 21.717 28.331 7.863.063-.018v-14.39z"/><path fill="#fff" d="M81.127 64.675l-1.666 18.522-15.426 4.164v14.39l28.354-7.858.208-2.337 2.406-26.881H81.127z"/><path fill="#EBEBEB" d="M64.048 23.435v13.831H30.64l-.277-3.108-.63-7.012-.331-3.711h34.646zm-.047 27.996v13.831H48.792l-.277-3.108-.631-7.012-.33-3.711h16.447z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">CSS3</span>
                        </div>
                    </div>
                    
                    <!-- JavaScript -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-yellow-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#F0DB4F" d="M1.408 1.408h125.184v125.185H1.408z"/><path fill="#323330" d="M116.347 96.736c-.917-5.711-4.641-10.508-15.672-14.981-3.832-1.761-8.104-3.022-9.377-5.926-.452-1.69-.512-2.642-.226-3.665.821-3.32 4.784-4.355 7.925-3.403 2.023.678 3.938 2.237 5.093 4.724 5.402-3.498 5.391-3.475 9.163-5.879-1.381-2.141-2.118-3.129-3.022-4.045-3.249-3.629-7.676-5.498-14.756-5.355l-3.688.477c-3.534.893-6.902 2.748-8.877 5.235-5.926 6.724-4.236 18.492 2.975 23.335 7.104 5.332 17.54 6.545 18.873 11.531 1.297 6.104-4.486 8.08-10.234 7.378-4.236-.881-6.592-3.034-9.139-6.949-4.688 2.713-4.688 2.713-9.508 5.485 1.143 2.499 2.344 3.63 4.26 5.795 9.068 9.198 31.76 8.746 35.83-5.176.165-.478 1.261-3.666.38-8.581zM69.462 58.943H57.753l-.048 30.272c0 6.438.333 12.34-.714 14.149-1.713 3.558-6.152 3.117-8.175 2.427-2.059-1.012-3.106-2.451-4.319-4.485-.333-.584-.583-1.036-.667-1.071l-9.52 5.83c1.583 3.249 3.915 6.069 6.902 7.901 4.462 2.678 10.459 3.499 16.731 2.059 4.082-1.189 7.604-3.652 9.448-7.401 2.666-4.915 2.094-10.864 2.07-17.444.06-10.735.001-21.468.001-32.237z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Backend -->
            <div class="mb-16 transform hover:scale-[1.02] transition-transform">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px bg-gradient-to-r from-transparent via-green-500 to-transparent flex-1"></div>
                    <h3 class="text-3xl font-bold text-green-600 px-6 flex items-center gap-3">
                        <i class="fas fa-server"></i>
                        Backend Development
                    </h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-green-500 to-transparent flex-1"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <!-- Node.js -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-green-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#83CD29" d="M112.771 30.334L68.674 4.729c-2.781-1.584-6.402-1.584-9.205 0L14.901 30.334C12.031 31.985 10 35.088 10 38.407v51.142c0 3.319 2.084 6.423 4.954 8.083l11.775 6.688c5.628 2.772 7.617 2.772 10.178 2.772 8.333 0 13.093-5.039 13.093-13.828v-50.49c0-.713-.371-1.774-1.071-1.774h-5.623C42.594 41 41 42.061 41 42.773v50.49c0 3.896-3.524 7.773-10.11 4.48L18.723 90.73c-.424-.23-.723-.693-.723-1.181V38.407c0-.482.555-.966.982-1.213l44.424-25.561c.415-.235 1.025-.235 1.439 0l43.882 25.555c.42.253.272.722.272 1.219v51.142c0 .488.183.963-.232 1.198l-44.086 25.576c-.378.227-.847.227-1.261 0l-11.307-6.749c-.341-.198-.746-.269-1.073-.086-3.146 1.783-3.726 2.02-6.677 3.043-.726.253-1.797.692.41 1.929l14.798 8.754a9.294 9.294 0 004.647 1.246c1.642 0 3.25-.426 4.667-1.246l43.885-25.582c2.87-1.672 4.23-4.764 4.23-8.083V38.407c0-3.319-1.36-6.414-4.229-8.073zM77.91 81.445c-11.726 0-14.309-3.235-15.17-9.066-.1-.628-.633-1.379-1.272-1.379h-5.731c-.709 0-1.279.86-1.279 1.566 0 7.466 4.059 16.512 23.453 16.512 14.039 0 22.088-5.455 22.088-15.109 0-9.572-6.467-12.084-20.082-13.886-13.762-1.819-15.16-2.738-15.16-5.962 0-2.658 1.184-6.203 11.374-6.203 9.105 0 12.461 1.954 13.842 8.091.118.577.645.991 1.24.991h5.754c.354 0 .692-.143.94-.396.24-.272.38-.615.334-.979-.891-10.568-7.912-15.493-22.112-15.493-12.631 0-20.166 5.334-20.166 14.275 0 9.698 7.497 12.378 19.622 13.577 14.505 1.422 15.633 3.542 15.633 6.395 0 4.955-3.978 7.066-13.309 7.066z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Node.js</span>
                        </div>
                    </div>
                    
                    <!-- Express.js -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-600 to-gray-800 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-gray-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path d="M126.67 98.44c-4.56 1.16-7.38.05-9.91-3.75-5.68-8.51-11.95-16.63-18-24.9-.78-1.07-1.59-2.12-2.6-3.45C89 76 81.85 85.2 75.14 94.77c-2.4 3.42-4.92 4.91-9.4 3.7l26.92-36.13L67.6 29.71c4.31-.84 7.29-.41 9.93 3.45 5.83 8.52 12.26 16.63 18.67 25.21 6.45-8.55 12.8-16.67 18.8-25.11 2.41-3.42 5-4.72 9.33-3.46-3.28 4.35-6.49 8.63-9.72 12.88-4.36 5.73-8.64 11.53-13.16 17.14-1.61 2-1.35 3.3.09 5.19C109.9 76 118.16 87.1 126.67 98.44zM1.33 61.74c.72-3.61 1.2-7.29 2.2-10.83 6-21.43 30.6-30.34 47.5-17.06C60.93 41.64 63.39 52.62 62.9 65H7.1c-.84 22.21 15.15 35.62 35.53 28.78 7.15-2.4 11.36-8 13.47-15 1.07-3.51 2.84-4.06 6.14-3.06-1.69 8.76-5.52 16.08-13.52 20.66-12 6.86-29.13 4.64-38.14-4.89C5.26 85.89 3 78.92 2 71.39c-.15-1.2-.46-2.38-.7-3.57q.03-3.04.03-6.08zm5.87-1.49h50.43c-.33-16.06-10.33-27.47-24-27.57-15-.12-25.78 11.02-26.43 27.57z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Express.js</span>
                        </div>
                    </div>
                    
                    <!-- Java -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-orange-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-red-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#0074BD" d="M47.617 98.12s-4.767 2.774 3.397 3.71c9.892 1.13 14.947.968 25.845-1.092 0 0 2.871 1.795 6.873 3.351-24.439 10.47-55.308-.607-36.115-5.969zm-2.988-13.665s-5.348 3.959 2.823 4.805c10.567 1.091 18.91 1.18 33.354-1.6 0 0 1.993 2.025 5.132 3.131-29.542 8.64-62.446.68-41.309-6.336z"/><path fill="#EA2D2E" d="M69.802 61.271c6.025 6.935-1.58 13.17-1.58 13.17s15.289-7.891 8.269-17.777c-6.559-9.215-11.587-13.792 15.635-29.58 0 .001-42.731 10.67-22.324 34.187z"/><path fill="#0074BD" d="M102.123 108.229s3.529 2.91-3.888 5.159c-14.102 4.272-58.706 5.56-71.094.171-4.451-1.938 3.899-4.625 6.526-5.192 2.739-.593 4.303-.485 4.303-.485-4.953-3.487-32.013 6.85-13.743 9.815 49.821 8.076 90.817-3.637 77.896-9.468zM49.912 70.294s-22.686 5.389-8.033 7.348c6.188.828 18.518.638 30.011-.326 9.39-.789 18.813-2.474 18.813-2.474s-3.308 1.419-5.704 3.053c-23.042 6.061-67.544 3.238-54.731-2.958 10.832-5.239 19.644-4.643 19.644-4.643zm40.697 22.747c23.421-12.167 12.591-23.86 5.032-22.285-1.848.385-2.677.72-2.677.72s.688-1.079 2-1.543c14.953-5.255 26.451 15.503-4.823 23.725 0-.002.359-.327.468-.617z"/><path fill="#EA2D2E" d="M76.491 1.587S89.459 14.563 64.188 34.51c-20.266 16.006-4.621 25.13-.007 35.559-11.831-10.673-20.509-20.07-14.688-28.815C58.041 28.42 81.722 22.195 76.491 1.587z"/><path fill="#0074BD" d="M52.214 126.021c22.476 1.437 57-.8 57.817-11.436 0 0-1.571 4.032-18.577 7.231-19.186 3.612-42.854 3.191-56.887.874 0 .001 2.875 2.381 17.647 3.331z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Java</span>
                        </div>
                    </div>
                    
                    <!-- PHP -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-indigo-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-purple-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#6181B6" d="M64 33.039C30.26 33.039 2.906 46.901 2.906 64S30.26 94.961 64 94.961 125.094 81.099 125.094 64 97.74 33.039 64 33.039zM48.103 70.032c-1.458 1.364-3.077 1.927-4.86 2.507-1.783.581-4.052.461-6.811.461h-6.253l-1.733 10h-7.301l6.515-34H41.7c4.224 0 7.305 1.215 9.242 3.432 1.937 2.217 2.519 5.364 1.747 9.337-.319 1.637-.856 3.159-1.614 4.515a15.118 15.118 0 01-2.972 3.748zM69.414 73l2.881-14.42c.328-1.688.208-2.942-.357-3.555-.565-.614-1.667-.73-3.308-.73h-5.404l-3.105 18.705h-7.304l5.191-34h7.304l-1.733 10h6.811c3.308 0 5.783.734 7.427 2.202 1.644 1.468 2.266 3.729 1.867 6.783l-2.881 14.42h-7.389zm28.793-11.012c.319-1.566.531-2.905.531-3.932 0-2.088-.62-3.633-1.862-4.664-1.241-1.031-3.054-1.546-5.437-1.546-1.074 0-2.084.151-3.029.429a7.945 7.945 0 00-2.507 1.173l-2.026 9.948h6.253c2.301 0 3.969-.517 5.004-1.552 1.034-1.035 1.789-2.479 2.073-4.121l.156-.735h-.156zm7.758-1.067c-.553 2.834-1.486 5.401-2.798 7.701-1.312 2.301-2.981 4.214-5.007 5.738-2.026 1.524-4.34 2.629-6.941 3.315-2.601.687-5.443 1.03-8.525 1.03h-9.447l-2.026 11.667h-7.304l6.515-34h16.557c2.602 0 4.94.328 7.016.982a10.605 10.605 0 014.761 3.315c1.241 1.543 1.852 3.588 1.835 6.105a24.06 24.06 0 01-.416 3.757l-.22 1.39z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">PHP</span>
                        </div>
                    </div>
                    
                    <!-- REST API -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <i class="fas fa-plug text-6xl text-blue-600 mb-3 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="font-semibold text-gray-700">REST API</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Database -->
            <div class="mb-16 transform hover:scale-[1.02] transition-transform">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px bg-gradient-to-r from-transparent via-purple-500 to-transparent flex-1"></div>
                    <h3 class="text-3xl font-bold text-purple-600 px-6 flex items-center gap-3">
                        <i class="fas fa-database"></i>
                        Database Management
                    </h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-purple-500 to-transparent flex-1"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 max-w-2xl mx-auto">
                    <!-- MongoDB -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-green-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#439934" d="M88.038 42.812c1.605 4.643 2.761 9.383 3.141 14.296.472 6.095.256 12.147-1.029 18.142-.035.165-.109.32-.164.48-.403.001-.814-.049-1.208.012-3.329.523-6.655 1.065-9.981 1.604-3.438.557-6.881 1.092-10.313 1.687-1.216.21-2.721-.041-3.212 1.641-.014.046-.154.054-.235.08l.166-10.051c-.057-8.084-.113-16.168-.169-24.252l1.602-.275c2.62-.429 5.24-.864 7.862-1.281 3.129-.497 6.261-.98 9.392-1.465 1.381-.215 2.764-.412 4.148-.618z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#45A538" d="M61.729 110.054c-1.69-1.453-3.439-2.842-5.059-4.37-8.717-8.222-15.093-17.899-18.233-29.566-.865-3.211-1.442-6.474-1.627-9.792-.13-2.322-.318-4.665-.154-6.975.437-6.144 1.325-12.229 3.127-18.147l.099-.138c.175.233.427.439.516.702 1.759 5.18 3.505 10.364 5.242 15.551 5.458 16.3 10.909 32.604 16.376 48.9.107.318.384.579.583.866l-.87 2.969z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#46A037" d="M88.038 42.812c-1.384.206-2.768.403-4.149.616-3.131.485-6.263.968-9.392 1.465-2.622.417-5.242.852-7.862 1.281l-1.602.275-.012-1.045c-.053-4.721-.105-9.442-.159-14.163-.023-1.962-.065-3.924-.07-5.886-.007-2.602.046-5.202.045-7.804-.004-8.089-.006-16.179-.01-24.268 0-.063-.152-.129-.23-.19.633-.118 1.407-.442 1.865-.171 2.248 1.331 4.673 2.457 6.724 4.143 14.832 12.191 22.875 28.588 24.043 48.556.06 1.046.147 2.091.22 3.137z"/></svg>
                            <span class="font-semibold text-gray-700">MongoDB</span>
                        </div>
                    </div>
                    
                    <!-- MySQL -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#00618A" d="M2.001 90.458h4.108V74.235l6.36 14.143c.75 1.712 1.777 2.317 3.792 2.317s3.003-.605 3.753-2.317l6.36-14.143v16.223h4.108V74.262c0-1.58-.632-2.345-1.936-2.739-3.121-.974-5.215-.131-6.163 1.976l-6.241 13.958-6.043-13.959c-.909-2.106-3.042-2.949-6.163-1.976C2.632 71.917 2 72.681 2 74.261v16.197zm32.537-32.07l-6.163-1.976v-.658l6.163 1.974v.66zm0 0v32.07h4.108v-32.07l-6.163-1.976 6.163 1.976zm0 0l-6.163-1.976v.658l6.163 1.976v-.658zm0 0v32.07h4.108v-32.07l-6.163-1.976 6.163 1.976z"/><path fill="#E48E00" d="M56.645 90.458h4.108V72.469c0-1.58.632-2.345 1.936-2.739 3.121-.974 5.215-.131 6.163 1.976l6.241 13.958 6.043-13.958c.909-2.107 3.042-2.95 6.163-1.976 1.304.394 1.936 1.159 1.936 2.739v17.99h4.108V72.469c0-3.106-1.581-4.558-4.686-5.14-3.938-0.761-6.892.131-8.62 3.424l-5.913 13.303-5.913-13.303c-1.728-3.293-4.682-4.185-8.62-3.424-3.105.582-4.686 2.034-4.686 5.14v17.989z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">MySQL</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools & Platforms -->
            <div class="transform hover:scale-[1.02] transition-transform">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px bg-gradient-to-r from-transparent via-orange-500 to-transparent flex-1"></div>
                    <h3 class="text-3xl font-bold text-orange-600 px-6 flex items-center gap-3">
                        <i class="fas fa-tools"></i>
                        Tools & Platforms
                    </h3>
                    <div class="h-px bg-gradient-to-r from-transparent via-orange-500 to-transparent flex-1"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <!-- Git -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-orange-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#F34F29" d="M124.737 58.378L69.621 3.264c-3.172-3.174-8.32-3.174-11.497 0L46.68 14.71l14.518 14.518c3.375-1.139 7.243-.375 9.932 2.314 2.703 2.706 3.461 6.607 2.294 9.993l13.992 13.993c3.385-1.167 7.292-.413 9.994 2.295 3.78 3.777 3.78 9.9 0 13.679a9.673 9.673 0 01-13.683 0 9.677 9.677 0 01-2.105-10.521L68.574 47.933l-.002 34.341a9.708 9.708 0 012.559 1.828c3.778 3.777 3.778 9.898 0 13.683-3.779 3.777-9.904 3.777-13.679 0-3.778-3.784-3.778-9.905 0-13.683a9.65 9.65 0 013.167-2.11V47.333a9.581 9.581 0 01-3.167-2.111c-2.862-2.86-3.551-7.06-2.083-10.576L41.056 20.333 3.264 58.123a8.133 8.133 0 000 11.5l55.117 55.114c3.174 3.174 8.32 3.174 11.499 0l54.858-54.858a8.135 8.135 0 00-.001-11.501z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Git</span>
                        </div>
                    </div>
                    
                    <!-- GitHub -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-600 to-gray-900 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-gray-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <g fill="#181616"><path fill-rule="evenodd" clip-rule="evenodd" d="M64 5.103c-33.347 0-60.388 27.035-60.388 60.388 0 26.682 17.303 49.317 41.297 57.303 3.017.56 4.125-1.31 4.125-2.905 0-1.44-.056-6.197-.082-11.243-16.8 3.653-20.345-7.125-20.345-7.125-2.747-6.98-6.705-8.836-6.705-8.836-5.48-3.748.413-3.67.413-3.67 6.063.425 9.257 6.223 9.257 6.223 5.386 9.23 14.127 6.562 17.573 5.02.542-3.903 2.107-6.568 3.834-8.076-13.413-1.525-27.514-6.704-27.514-29.843 0-6.593 2.36-11.98 6.223-16.21-.628-1.52-2.695-7.662.584-15.98 0 0 5.07-1.623 16.61 6.19C53.7 35 58.867 34.327 64 34.304c5.13.023 10.3.694 15.127 2.033 11.526-7.813 16.59-6.19 16.59-6.19 3.287 8.317 1.22 14.46.593 15.98 3.872 4.23 6.215 9.617 6.215 16.21 0 23.194-14.127 28.3-27.574 29.796 2.167 1.874 4.097 5.55 4.097 11.183 0 8.08-.07 14.583-.07 16.572 0 1.607 1.088 3.49 4.148 2.897 23.98-7.994 41.263-30.622 41.263-57.294C124.388 32.14 97.35 5.104 64 5.104z"/><path d="M26.484 91.806c-.133.3-.605.39-1.035.185-.44-.196-.685-.605-.543-.906.13-.31.603-.395 1.04-.188.44.197.69.61.537.91zm2.446 2.729c-.287.267-.85.143-1.232-.28-.396-.42-.47-.983-.177-1.254.298-.266.844-.14 1.24.28.394.426.472.984.17 1.255zM31.312 98.012c-.37.258-.976.017-1.35-.52-.37-.538-.37-1.183.01-1.44.373-.258.97-.025 1.35.507.368.545.368 1.19-.01 1.452zm3.261 3.361c-.33.365-1.036.267-1.552-.23-.527-.487-.674-1.18-.343-1.544.336-.366 1.045-.264 1.564.23.527.486.686 1.18.333 1.543zm4.5 1.951c-.147.473-.825.688-1.51.486-.683-.207-1.13-.76-.99-1.238.14-.477.823-.7 1.512-.485.683.206 1.13.756.988 1.237zm4.943.361c.017.498-.563.91-1.28.92-.723.017-1.308-.387-1.315-.877 0-.503.568-.91 1.29-.924.717-.013 1.306.387 1.306.88zm4.598-.782c.086.485-.413.984-1.126 1.117-.7.13-1.35-.172-1.44-.653-.086-.498.422-.997 1.122-1.126.714-.123 1.354.17 1.444.663zm0 0"/></g>
                            </svg>
                            <span class="font-semibold text-gray-700">GitHub</span>
                        </div>
                    </div>
                    
                    <!-- Postman -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-orange-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-orange-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <svg class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 128 128">
                                <path fill="#FF6C37" d="M126.67 98.44c-4.56 1.16-7.38.05-9.91-3.75-5.68-8.51-11.95-16.63-18-24.9-.78-1.07-1.59-2.12-2.6-3.45C89 76 81.85 85.2 75.14 94.77c-2.4 3.42-4.92 4.91-9.4 3.7l26.92-36.13L67.6 29.71c4.31-.84 7.29-.41 9.93 3.45 5.83 8.52 12.26 16.63 18.67 25.21 6.45-8.55 12.8-16.67 18.8-25.11 2.41-3.42 5-4.72 9.33-3.46-3.28 4.35-6.49 8.63-9.72 12.88-4.36 5.73-8.64 11.53-13.16 17.14-1.61 2-1.35 3.3.09 5.19C109.9 76 118.16 87.1 126.67 98.44zM1.33 61.74c.72-3.61 1.2-7.29 2.2-10.83 6-21.43 30.6-30.34 47.5-17.06C60.93 41.64 63.39 52.62 62.9 65H7.1c-.84 22.21 15.15 35.62 35.53 28.78 7.15-2.4 11.36-8 13.47-15 1.07-3.51 2.84-4.06 6.14-3.06-1.69 8.76-5.52 16.08-13.52 20.66-12 6.86-29.13 4.64-38.14-4.89C5.26 85.89 3 78.92 2 71.39c-.15-1.2-.46-2.38-.7-3.57q.03-3.04.03-6.08zm5.87-1.49h50.43c-.33-16.06-10.33-27.47-24-27.57-15-.12-25.78 11.02-26.43 27.57z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Postman</span>
                        </div>
                    </div>
                    
                    <!-- Google Maps -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-yellow-400 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-red-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <i class="fas fa-map-marked-alt text-6xl text-red-500 mb-3 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="font-semibold text-gray-700 text-sm">Google Maps</span>
                        </div>
                    </div>
                    
                    <!-- Socket.IO -->
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-700 to-black rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-gray-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <i class="fas fa-bolt text-6xl text-gray-800 mb-3 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="font-semibold text-gray-700">Socket.IO</span>
                        </div>
                    </div>
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

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>