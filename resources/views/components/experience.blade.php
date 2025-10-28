@props(['experiences'])
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
        
        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-4">
                    <i class="fas fa-briefcase text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">No Experience Added Yet</h3>
                <p class="text-gray-500">Work experience will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Roadmap Timeline -->
            <div class="relative">
                <!-- Central vertical line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-blue-400 via-purple-400 to-green-400"></div>
                
                @foreach($experiences as $index => $experience)
                    @php
                        $isEven = $index % 2 === 0;
                        $colors = [
                            ['from' => 'blue', 'to' => 'cyan'],
                            ['from' => 'green', 'to' => 'teal'],
                            ['from' => 'purple', 'to' => 'pink'],
                            ['from' => 'orange', 'to' => 'red'],
                        ];
                        $colorSet = $colors[$index % count($colors)];
                    @endphp
                    
                    <div class="relative mb-16 md:mb-24">
                        <div class="flex flex-col md:flex-row items-center">
                            @if($isEven)
                                <!-- Left side content (even indexes) -->
                                <div class="md:w-1/2 md:pr-12 mb-8 md:mb-0">
                                    <div class="bg-gradient-to-br from-{{ $colorSet['from'] }}-50 to-{{ $colorSet['to'] }}-50 p-8 rounded-2xl border-2 border-{{ $colorSet['from'] }}-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                        @if($index === 0)
                                            <div class="flex items-center gap-4 mb-4">
                                                <div class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse">
                                                    CURRENT
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($experience->duration)
                                            <div class="flex items-center gap-4 mb-4">
                                                <span class="text-gray-600 font-medium">{{ $experience->duration }}</span>
                                            </div>
                                        @endif
                                        
                                        <h3 class="text-3xl font-bold text-{{ $colorSet['from'] }}-600 mb-3 flex items-center gap-3">
                                            <i class="fas fa-briefcase"></i>
                                            {{ $experience->role }}
                                        </h3>
                                        <p class="text-xl text-gray-700 font-semibold mb-4">{{ $experience->company }}</p>
                                        
                                        @if($experience->details)
                                            <p class="text-gray-600 leading-relaxed">{{ $experience->details }}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Center node -->
                                <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-{{ $colorSet['from'] }}-400 to-{{ $colorSet['to'] }}-500 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                                    <i class="fas fa-{{ $index === 0 ? 'rocket' : 'code' }} text-white text-2xl"></i>
                                </div>
                                
                                <!-- Right side (empty for alignment) -->
                                <div class="md:w-1/2"></div>
                            @else
                                <!-- Left side (empty for alignment) -->
                                <div class="md:w-1/2"></div>
                                
                                <!-- Center node -->
                                <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 bg-gradient-to-br from-{{ $colorSet['from'] }}-400 to-{{ $colorSet['to'] }}-600 rounded-full items-center justify-center shadow-lg border-4 border-white z-10">
                                    <i class="fas fa-laptop-code text-white text-2xl"></i>
                                </div>
                                
                                <!-- Right side content (odd indexes) -->
                                <div class="md:w-1/2 md:pl-12">
                                    <div class="bg-gradient-to-br from-{{ $colorSet['from'] }}-50 to-{{ $colorSet['to'] }}-50 p-8 rounded-2xl border-2 border-{{ $colorSet['from'] }}-200 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                        @if($experience->duration)
                                            <div class="flex items-center gap-4 mb-4">
                                                <span class="text-gray-600 font-medium">{{ $experience->duration }}</span>
                                            </div>
                                        @endif
                                        
                                        <h3 class="text-3xl font-bold text-{{ $colorSet['from'] }}-600 mb-3 flex items-center gap-3">
                                            <i class="fas fa-code"></i>
                                            {{ $experience->role }}
                                        </h3>
                                        <p class="text-xl text-gray-700 font-semibold mb-4">{{ $experience->company }}</p>
                                        
                                        @if($experience->details)
                                            <p class="text-gray-600 leading-relaxed">{{ $experience->details }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                
                <!-- Starting point -->
                <div class="hidden md:flex absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full items-center justify-center shadow-lg border-4 border-white z-10 mt-16">
                    <i class="fas fa-flag-checkered text-white text-lg"></i>
                </div>
            </div>
        @endif
    </div>
</section>