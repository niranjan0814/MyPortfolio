@props(['educations'])
<!-- resources/views/components/education.blade.php -->
<section id="education" class="section-full relative overflow-hidden py-20"
         style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));">
    
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob normal-theme-only"
         style="background: #c4b5fd;"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000 normal-theme-only"
         style="background: #93c5fd;"></div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto max-w-7xl fade-in relative z-10 px-4">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight gradient-text" style="line-height: 1.2;">
                Education Journey
            </h2>
            <p class="text-lg" style="color: var(--text-secondary);">Academic excellence and continuous learning</p>
            <div class="h-1 w-32 mx-auto rounded-full mt-4"
                 style="background: linear-gradient(90deg, var(--accent-purple), var(--accent-blue));"></div>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-4 glass-card"
                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                    <svg class="w-12 h-12" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-primary);">No Education Added Yet</h3>
                <p style="color: var(--text-muted);">Educational background will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Unique Horizontal Timeline Layout -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute top-32 left-0 right-0 h-1 rounded-full"
                     style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink)); opacity: 0.3;"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative">
                    @foreach($educations->sortByDesc('year') as $index => $education)
                        @php
                            $iconUrl = $education->icon_url ?: 'https://img.icons8.com/?size=100&id=XJ2wmYGmoVoN&format=png&color=000000';
                            $colors = [
                                ['bg' => '#dbeafe', 'accent' => '#3b82f6', 'shadow' => 'rgba(59, 130, 246, 0.2)'],
                                ['bg' => '#d1fae5', 'accent' => '#10b981', 'shadow' => 'rgba(16, 185, 129, 0.2)'],
                                ['bg' => '#e9d5ff', 'accent' => '#8b5cf6', 'shadow' => 'rgba(139, 92, 246, 0.2)'],
                                ['bg' => '#fed7aa', 'accent' => '#f59e0b', 'shadow' => 'rgba(245, 158, 11, 0.2)'],
                            ];
                            $colorSet = $colors[$index % count($colors)];
                        @endphp

                        <div class="education-card group relative">
                            <!-- Year Badge - Top -->
                            <div class="flex justify-center mb-4">
                                <div class="year-badge inline-flex items-center gap-2 px-4 py-2 rounded-full font-bold shadow-lg glass-card"
                                     style="background: var(--glass-bg, {{ $colorSet['bg'] }}); 
                                            color: {{ $colorSet['accent'] }}; 
                                            border: 2px solid var(--glass-border, {{ $colorSet['accent'] }});">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $education->year ?: 'Present' }}</span>
                                </div>
                            </div>

                            <!-- Timeline Node -->
                            <div class="hidden md:flex absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full shadow-lg z-20"
                                 style="background: {{ $colorSet['accent'] }}; border: 3px solid var(--card-bg);"></div>

                            <!-- Card Content -->
                            <div class="relative overflow-hidden rounded-2xl shadow-lg transition-all duration-300 glass-card"
                                 style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                                     style="background: var(--glass-bg); backdrop-filter: var(--glass-blur);"></div>

                                <div class="p-6 relative z-10">
                                    <!-- Icon -->
                                    <div class="flex justify-center mb-4">
                                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 glass-card"
                                             style="background: var(--glass-bg, {{ $colorSet['bg'] }}); border: 1px solid var(--glass-border, transparent);">
                                            <img src="{{ $iconUrl }}" alt="Education Icon" class="w-12 h-12 object-contain" />
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <h3 class="text-2xl font-bold mb-3 text-center gradient-text line-clamp-2" style="min-height: 3.5rem;">
                                        {{ $education->degree }}
                                    </h3>
                                    
                                    <p class="font-semibold mb-4 text-center" style="color: var(--text-secondary);">
                                        {{ $education->institution }}
                                    </p>

                                    @if($education->details)
                                        <div class="mt-4 p-4 rounded-xl glass-card"
                                             style="background: var(--glass-bg, var(--bg-gradient-start)); border: 1px solid var(--border-color);">
                                            <p class="text-sm leading-relaxed text-center" style="color: var(--text-secondary);">
                                                {{ $education->details }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Bottom Accent Line -->
                                <div class="h-1 w-full" style="background: linear-gradient(90deg, {{ $colorSet['accent'] }}, transparent);"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
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

/* Education Card Hover - GlassUI.dev style */
.education-card {
    transition: all 0.3s ease;
}

[data-theme="normal"] .education-card:hover {
    transform: translateY(-8px);
}

[data-theme="normal"] .education-card:hover .glass-card {
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

[data-theme="monochrome"] .education-card:hover {
    transform: translateY(-8px);
}

[data-theme="monochrome"] .education-card:hover .glass-card {
    box-shadow: 0 20px 60px rgba(255, 255, 255, 0.15);
}

/* Year Badge Animation */
.year-badge {
    transition: all 0.3s ease;
}

.education-card:hover .year-badge {
    transform: scale(1.1);
}

/* Hide normal theme blobs in monochrome mode */
[data-theme="monochrome"] .normal-theme-only {
    display: none;
}
</style>