@props(['aboutContent'])
<!-- resources/views/components/about.blade.php -->
<section id="about" class="section-full bg-gradient-to-br from-white via-blue-50 to-purple-50 relative overflow-hidden pt-12 pb-16">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    <div class="container mx-auto max-w-6xl fade-in relative z-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                {{ $aboutContent['about_heading'] ?? 'About Me' }}
            </h2>
            <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
            <!-- Left Side - Profile Image -->
            <div class="flex-shrink-0">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-700 scale-105 animate-pulse"></div>

                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-full animate-spin-slow p-1">
                            <div class="w-full h-full bg-white rounded-full"></div>
                        </div>

                        <div class="relative w-64 h-64 md:w-72 md:h-72 rounded-full overflow-hidden shadow-2xl border-[10px] border-white group hover:scale-105 transition-transform duration-500 mx-auto">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-400 via-pink-400 to-red-500"></div>
                            <img src="{{ $aboutContent['profile_image'] ?? '/images/profile.png' }}" 
                                 alt="{{ $aboutContent['profile_name'] ?? 'Niranjan Sivarasa' }}"
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
                                <img src="https://img.icons8.com/?size=100&id=dOldVYrPJBSo&format=png&color=000000" alt="User" class="w-6 h-6" />
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
                            $categories = [
                                [
                                    'icon' => 'https://img.icons8.com/?size=100&id=M7COJD1KT27d&format=png&color=000000',
                                    'gradient' => 'from-blue-400 to-blue-600',
                                    'count' => $aboutContent['stat_projects_count'] ?? '5+',
                                    'label' => $aboutContent['stat_projects_label'] ?? 'Projects Completed',
                                    'text' => 'text-blue-600'
                                ],
                                [
                                    'icon' => 'https://img.icons8.com/?size=100&id=lSXsn9erua8J&format=png&color=000000',
                                    'gradient' => 'from-purple-400 to-purple-600',
                                    'count' => $aboutContent['stat_technologies_count'] ?? '10+',
                                    'label' => $aboutContent['stat_technologies_label'] ?? 'Technologies',
                                    'text' => 'text-purple-600'
                                ],
                                [
                                    'icon' => 'https://img.icons8.com/?size=100&id=3d61gRYnju4B&format=png&color=000000',
                                    'gradient' => 'from-pink-400 to-pink-600',
                                    'count' => $aboutContent['stat_team_count'] ?? 'Team',
                                    'label' => $aboutContent['stat_team_label'] ?? 'Leadership Skills',
                                    'text' => 'text-pink-600'
                                ],
                                [
                                    'icon' => 'https://img.icons8.com/?size=100&id=43227&format=png&color=000000',
                                    'gradient' => 'from-green-400 to-green-600',
                                    'count' => $aboutContent['stat_problem_count'] ?? 'Problem',
                                    'label' => $aboutContent['stat_problem_label'] ?? 'Solving Expert',
                                    'text' => 'text-green-600'
                                ],
                            ];
                        @endphp

                        @foreach($categories as $cat)
                            <div class="bg-white/80 backdrop-blur-sm p-4 md:p-6 rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-lg group">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-r {{ $cat['gradient'] }} rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <img src="{{ $cat['icon'] }}" alt="Icon" class="w-6 h-6" />
                                    </div>
                                </div>
                                <h4 class="text-xl md:text-2xl font-bold {{ $cat['text'] }} mb-1">{{ $cat['count'] }}</h4>
                                <p class="text-gray-600 font-medium text-sm md:text-base">{{ $cat['label'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-6">
                        <a href="#contact" class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group">
                            <span>{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                            <img src="https://img.icons8.com/?size=100&id=62vgtZLAw1gl&format=png&color=000000" class="w-5 h-5 group-hover:translate-x-2 transition-transform" />
                        </a>
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
@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.animate-blob { animation: blob 7s infinite; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }
.animate-spin-slow { animation: spin-slow 8s linear infinite; }
</style>
