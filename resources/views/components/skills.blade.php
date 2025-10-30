@props(['skills'])

<!-- resources/views/components/skills.blade.php -->
<section id="skills" class="section-full bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto fade-in relative z-10 px-4">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Technical Arsenal</h2>
            <p class="text-gray-600 text-lg">Technologies I work with to bring ideas to life</p>
            <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mt-4"></div>
        </div>
        
        <div class="max-w-7xl mx-auto">
            @if($skills->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-4">
                        <i class="fa-solid fa-lightbulb text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Skills Added Yet</h3>
                    <p class="text-gray-500">Skills will appear here once added through the admin panel.</p>
                </div>
            @else
                @php
                    $categories = [
    'frontend' => [
        'title' => 'Frontend Development',
        'icon' => 'https://img.icons8.com/?size=100&id=wRWcFHf3CbWQ&format=png&color=000000', // Image logo
        'is_image' => true,
        'gradient' => 'from-blue-500 to-cyan-500',
        'bg' => 'from-blue-50 to-cyan-50',
    ],
    'backend' => [
        'title' => 'Backend Development',
        'icon' => 'https://img.icons8.com/?size=100&id=eD9kxQH6h53e&format=png&color=000000', // Font Awesome icon
        'is_image' => true,
        'gradient' => 'from-green-500 to-emerald-500',
        'bg' => 'from-green-50 to-emerald-50',
    ],
    'database' => [
        'title' => 'Database & Storage',
        'icon' => 'https://logo.svgcdn.com/devicon-plain/sqldeveloper-plain.png',
        'is_image' => true,
        'gradient' => 'from-orange-500 to-red-500',
        'bg' => 'from-orange-50 to-red-50',
    ],
    'tools' => [
        'title' => 'Tools & Technologies',
        'icon' => 'https://img.icons8.com/?size=100&id=46959&format=png&color=000000',
        'is_image' => true,
        'gradient' => 'from-purple-500 to-pink-500',
        'bg' => 'from-purple-50 to-pink-50',
    ],
];


                    $groupedSkills = $skills->groupBy('category');
                @endphp

                <div class="space-y-16">
                    @foreach($categories as $categoryKey => $categoryData)
                        @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                            <div class="group">
                                <!-- Category Header -->
                                <div class="flex items-center gap-4 mb-8">
                                    <div class="w-16 h-16 bg-gradient-to-r {{ $categoryData['gradient'] }} rounded-2xl flex items-center justify-center shadow-lg transition-transform duration-300 icon-container">
                                        @if($categoryData['is_image'])
    <img src="{{ $categoryData['icon'] }}" alt="{{ $categoryData['title'] }}" 
         class="w-10 h-10 object-contain filter drop-shadow-md group-hover:scale-110 transition-transform duration-300" />
@else
    <i class="{{ $categoryData['icon'] }} text-3xl text-white icon-glow"></i>
@endif

                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold bg-gradient-to-r {{ $categoryData['gradient'] }} bg-clip-text text-transparent">
                                            {{ $categoryData['title'] }}
                                        </h3>
                                        <p class="text-gray-600">
                                            {{ $groupedSkills[$categoryKey]->count() }} 
                                            {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Skills Grid -->
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                                    @foreach($groupedSkills[$categoryKey] as $skill)
                                        <div class="group/skill relative">
                                            <div class="absolute inset-0 bg-gradient-to-r {{ $categoryData['gradient'] }} rounded-2xl blur opacity-25 group-hover/skill:opacity-75 transition duration-300"></div>
                                            <div class="relative flex flex-col items-center justify-center p-8 bg-white rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-xl hover:-translate-y-2">

                                                @php
                                                    $iconUrl = $skill->url;
                                                    $hasValidUrl = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                                @endphp

                                                @if($hasValidUrl)
                                                    <img 
                                                        src="{{ $iconUrl }}" 
                                                        alt="{{ $skill->name }}" 
                                                        class="w-16 h-16 mb-3 group-hover/skill:scale-110 transition-transform duration-300"
                                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                    />
                                                @endif

                                                <!-- Fallback Icon -->
                                                <div class="{{ $hasValidUrl ? 'hidden' : '' }} w-16 h-16 mb-3 flex items-center justify-center bg-gradient-to-br {{ $categoryData['gradient'] }} rounded-xl group-hover/skill:scale-110 transition-transform duration-300">
                                                    <i class="fa-solid fa-code text-3xl text-white"></i>
                                                </div>

                                                <span class="font-semibold text-gray-700 text-center text-sm">{{ $skill->name }}</span>
                                                
                                                @if($skill->level)
                                                    <span class="text-xs text-gray-500 mt-1">{{ $skill->level }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<!-- ✨ Animations and Icon Glow -->
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

/* 🌟 Luxury Glow Effect */
.icon-glow {
    transition: all 0.4s ease;
    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
}
.icon-container:hover .icon-glow {
    transform: scale(1.1);
    filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.8));
}
</style>
