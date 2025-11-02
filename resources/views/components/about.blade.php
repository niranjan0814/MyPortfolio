@props(['aboutContent'])
<!-- resources/views/components/about.blade.php -->
<section id="about"
    class="section-full bg-gradient-to-br from-white via-blue-50 to-purple-50 relative overflow-hidden pt-12 pb-16">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 about-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 about-blob about-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 about-blob about-delay-4000"></div>
    </div>

    <div class="container mx-auto max-w-6xl about-fade-in relative z-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                About Me
            </h2>
            <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
            <!-- Left Side - Profile Image -->
            <div class="flex-shrink-0">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-700 scale-105 about-pulse"></div>

                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-full about-spin-slow p-1">
                            <div class="w-full h-full bg-white rounded-full"></div>
                        </div>

                        <div class="relative w-64 h-64 md:w-72 md:h-72 rounded-full overflow-hidden shadow-2xl border-[10px] border-white group hover:scale-105 transition-transform duration-500 mx-auto">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-400 via-pink-400 to-red-500"></div>
                            <img src="{{ $aboutContent['user']->profile_image ?? '/images/profile.png' }}"
                                alt="{{ $aboutContent['profile_name'] ?? 'Profile' }}"
                                class="absolute inset-0 w-full h-full object-cover object-center mix-blend-normal" />

                            <div class="absolute -top-4 right-0 bg-blue-600 text-white text-sm font-semibold px-4 py-1 rounded-full shadow-md rotate-12">
                                {{ $aboutContent['profile_gpa_badge'] ?? 'GPA 3.79' }}
                            </div>
                        </div>

                        <div class="absolute -top-2 -right-2 md:-top-4 md:-right-4 bg-gradient-to-r from-green-500 to-blue-600 text-white px-4 py-2 md:px-6 md:py-3 rounded-full shadow-lg transform rotate-12 hover:rotate-0 transition-transform duration-300">
                            <span class="font-bold text-sm md:text-lg">{{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - About Content -->
            <div class="flex-1 max-w-2xl">
                <div class="space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center shadow-lg">
                                <img src="{{ $aboutContent['stats_icon_urls']['user'] ?? 'https://img.icons8.com/?size=100&id=dOldVYrPJBSo&format=png&color=000000' }}"
                                    alt="User" class="w-6 h-6" />
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                            </h3>
                        </div>

                        <p class="text-base md:text-lg text-gray-700 leading-relaxed">
                            {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                        </p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 gap-4 pt-6">
                        @php
                            $stats = [
                                'projects' => ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label'], 'text' => 'text-blue-600'],
                                'technologies' => ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label'], 'text' => 'text-purple-600'],
                                'team' => ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label'], 'text' => 'text-pink-600'],
                                'problem' => ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label'], 'text' => 'text-green-600'],
                            ];
                        @endphp

                        @foreach($stats as $key => $stat)
                            @if($stat['count'] && $stat['label'])
                                <div class="bg-white/80 backdrop-blur-sm p-4 md:p-6 rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-lg group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r {{ $stat['text'] === 'text-blue-600' ? 'from-blue-400 to-blue-600' : ($stat['text'] === 'text-purple-600' ? 'from-purple-400 to-purple-600' : ($stat['text'] === 'text-pink-600' ? 'from-pink-400 to-pink-600' : 'from-green-400 to-green-600')) }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <img src="{{ $aboutContent['stats_icon_urls'][$key] ?? 'https://img.icons8.com/?size=100&id=000000&format=png&color=000000' }}"
                                                alt="{{ $stat['label'] }} Icon" class="w-6 h-6" />
                                        </div>
                                    </div>
                                    <h4 class="text-xl md:text-2xl font-bold {{ $stat['text'] }} mb-1">{{ $stat['count'] }}</h4>
                                    <p class="text-gray-600 font-medium text-sm md:text-base">{{ $stat['label'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Soft Skills -->
                    @if (!empty($aboutContent['soft_skills']))
                        <div class="pt-6">
                            <h4 class="text-xl md:text-2xl font-bold text-gray-800 mb-4">Soft Skills</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                @php
                                    $skillColors = [
                                        'Communication' => 'from-blue-400 to-blue-600',
                                        'Teamwork' => 'from-purple-400 to-purple-600',
                                        'Problem Solving' => 'from-pink-400 to-pink-600',
                                        'Leadership' => 'from-green-400 to-green-600',
                                    ];
                                @endphp

                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    @php
                                        $gradient = $skillColors[$skill] ?? 'from-gray-400 to-gray-600';
                                        $textColor = str_replace(['from-blue', 'from-purple', 'from-pink', 'from-green', 'from-gray'], ['text-blue', 'text-purple', 'text-pink', 'text-green', 'text-gray'], $gradient);
                                        $textColor = explode(' ', $textColor)[0];
                                    @endphp

                                    <div class="bg-white/80 backdrop-blur-sm p-4 md:p-5 rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-lg group">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r {{ $gradient }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                                <img src="{{ $iconUrl }}" alt="{{ $skill }} Icon" class="w-6 h-6" />
                                            </div>
                                        </div>
                                        <h5 class="text-lg md:text-xl font-bold {{ $textColor }} mb-1">{{ $skill }}</h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- CTA Buttons with CV Download - UPDATED COLORS -->
                    <div class="pt-6 flex flex-col sm:flex-row flex-wrap gap-4 items-center sm:items-start">
                        
                        <!-- Contact Button -->
                        <a href="#contact"
                            class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            <span class="relative z-10 drop-shadow-lg">
                                {{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}
                            </span>
                            <img src="{{ $aboutContent['stats_icon_urls']['cta'] ?? 'https://img.icons8.com/?size=100&id=62vgtZLAw1gl&format=png&color=FFFFFF' }}"
                                class="relative z-10 w-5 h-5 group-hover:translate-x-2 transition-transform filter brightness-0 invert drop-shadow-lg" 
                                alt="CTA Icon" />
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>

                        <!-- Download CV Button - UPDATED TO MATCH THEME -->
                        @if($aboutContent['user']->hasCv())
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden"
                                download>
                                <svg class="relative z-10 w-5 h-5 group-hover:translate-y-1 transition-transform drop-shadow-lg" 
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                <span class="relative z-10 drop-shadow-lg">Download CV</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>

                            <!-- View CV Button - UPDATED TO MATCH THEME -->
                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                target="_blank"
                                class="group relative inline-flex items-center gap-3 bg-white text-gray-800 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-300 hover:border-purple-500 hover:bg-purple-50">
                                <svg class="w-5 h-5 text-purple-600 group-hover:scale-110 transition-transform" 
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-800">View CV</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification - UPDATED COLORS -->
    <div id="cv-toast" class="fixed top-24 right-8 z-[9999] hidden pointer-events-none">
        <div class="bg-white rounded-xl shadow-2xl border-2 border-purple-500 p-4 flex items-center gap-3 about-slideIn pointer-events-auto min-w-[320px]">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-bold text-gray-800">CV Download Started</p>
                <p class="text-sm text-gray-600">Your file will download shortly</p>
            </div>
            <button onclick="this.parentElement.parentElement.classList.add('hidden')" 
                    class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<style>
    /* About-specific styles with unique class names to avoid conflicts */
    @keyframes about-blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    @keyframes about-spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes about-slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .about-blob { animation: about-blob 7s infinite; }
    .about-delay-2000 { animation-delay: 2s; }
    .about-delay-4000 { animation-delay: 4s; }
    .about-spin-slow { animation: about-spin-slow 8s linear infinite; }
    .about-slideIn { animation: about-slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
    
    /* About-specific fade-in to avoid conflict with global fade-in */
    .about-fade-in { 
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease;
    }
    
    .about-fade-in.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* About-specific pulse animation */
    .about-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.2; }
        50% { opacity: 0.4; }
    }

    #cv-toast { z-index: 99999 !important; }
</style>

<script>
    // About-specific initialization
    document.addEventListener('DOMContentLoaded', function() {
        // About section reveal
        const aboutReveal = document.querySelector('.about-fade-in');
        if (aboutReveal) {
            const windowHeight = window.innerHeight;
            const elementTop = aboutReveal.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                aboutReveal.classList.add('active');
            }

            window.addEventListener('scroll', () => {
                const elementTop = aboutReveal.getBoundingClientRect().top;
                if (elementTop < windowHeight - elementVisible) {
                    aboutReveal.classList.add('active');
                }
            });
        }

        // Toast trigger for CV download
        const downloadBtn = document.querySelector('a[download][href*="cv"]');
        const toast = document.getElementById('cv-toast');
        
        if (downloadBtn && toast) {
            downloadBtn.addEventListener('click', function(e) {
                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 4000);
            });
        }
    });
</script>