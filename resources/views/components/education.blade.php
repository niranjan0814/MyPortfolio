@props(['educations'])
<!-- resources/views/components/education.blade.php -->
<section id="education" class="section-full bg-gradient-to-br from-white via-purple-50 to-blue-50 relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto max-w-6xl fade-in relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Education Journey
            </h2>
            <p class="text-gray-600 text-lg">Academic excellence and continuous learning</p>
            <div class="h-1 w-32 bg-gradient-to-r from-purple-500 to-blue-500 mx-auto rounded-full mt-4"></div>
        </div>
        
        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-4">
                    <img src="https://img.icons8.com/?size=100&id=82753&format=png&color=888888" alt="Graduation Cap" class="w-12 h-12" />
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">No Education Added Yet</h3>
                <p class="text-gray-500">Educational background will appear here once added through the admin panel.</p>
            </div>
        @else
            <div class="space-y-12">
                @foreach($educations as $index => $education)
                    @php
                        // 🎓 Icon and color sets for variety
                        $colors = [
                            [
                                'from' => 'blue',
                                'to' => 'purple',
                                'icon' => 'https://img.icons8.com/?size=100&id=XJ2wmYGmoVoN&format=png&color=000000', // University
                            ],
                            [
                                'from' => 'green',
                                'to' => 'teal',
                                'icon' => 'https://img.icons8.com/?size=100&id=RWH5eUW9Vr7f&format=png&color=000000', // Graduation Cap
                            ],
                            [
                                'from' => 'purple',
                                'to' => 'pink',
                                'icon' => 'https://img.icons8.com/?size=100&id=RWH5eUW9Vr7f&format=png&color=000000', // Medal
                            ],
                            [
                                'from' => 'orange',
                                'to' => 'red',
                                'icon' => 'https://img.icons8.com/?size=100&id=11972&format=png&color=FFFFFF', // Award
                            ],
                        ];
                        $colorSet = $colors[$index % count($colors)];
                    @endphp
                    
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-{{ $colorSet['from'] }}-400 to-{{ $colorSet['to'] }}-500 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-300"></div>
                        <div class="relative bg-white p-8 rounded-3xl shadow-lg border-2 border-{{ $colorSet['from'] }}-100 hover:border-{{ $colorSet['from'] }}-300 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                            <div class="flex flex-col md:flex-row gap-8">
                                <!-- Icon Section -->
                                <div class="flex-shrink-0">
                                    <div class="w-24 h-24 bg-gradient-to-br from-{{ $colorSet['from'] }}-500 to-{{ $colorSet['to'] }}-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <img src="{{ $colorSet['icon'] }}" alt="Education Icon" class="w-12 h-12 md:w-14 md:h-14 object-contain" />
                                    </div>
                                </div>
                                
                                <!-- Content Section -->
                                <div class="flex-1">
                                    <div class="mb-4">
                                        <h3 class="text-3xl font-bold text-{{ $colorSet['from'] }}-600 mb-2">{{ $education->degree }}</h3>
                                        <p class="text-gray-600 font-medium mb-1">{{ $education->institution }}</p>
                                        
                                        @if($education->year)
                                            <div class="flex items-center gap-2 text-gray-500">
                                                <img src="https://img.icons8.com/?size=100&id=63309&format=png&color=6B7280" alt="Calendar" class="w-4 h-4" />
                                                <span>{{ $education->year }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    @if($education->details)
                                        <div class="bg-{{ $colorSet['from'] }}-50 p-4 rounded-xl border border-{{ $colorSet['from'] }}-200 mt-4">
                                            <p class="text-gray-700 leading-relaxed">{{ $education->details }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
