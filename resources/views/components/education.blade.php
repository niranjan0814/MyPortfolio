@props(['educations'])
<!-- resources/views/components/education.blade.php -->
<section id="education" class="section-full relative overflow-hidden py-20"
         style="background: linear-gradient(135deg, var(--bg-primary), var(--bg-gradient-start), var(--bg-gradient-end));">
    
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob normal-theme-only"
         style="background: #c4b5fd;"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000 normal-theme-only"
         style="background: #93c5fd;"></div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto max-w-6xl fade-in relative z-10 px-4">
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
            <div class="space-y-12">
                @foreach($educations as $index => $education)
                    @php
                        $iconUrl = $education->icon_url ?: 'https://img.icons8.com/?size=100&id=XJ2wmYGmoVoN&format=png&color=000000';
                        $colors = [
                            ['gradient' => 'from-blue-500 to-purple-600'],
                            ['gradient' => 'from-green-500 to-teal-600'],
                            ['gradient' => 'from-purple-500 to-pink-600'],
                            ['gradient' => 'from-orange-500 to-red-600'],
                        ];
                        $colorSet = $colors[$index % count($colors)];
                    @endphp

                    <div class="group relative">
                        <div class="absolute inset-0 rounded-3xl blur-xl opacity-25 group-hover:opacity-40 transition duration-300"
                             style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));"></div>
                        <div class="relative p-8 md:p-12 rounded-3xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 glass-card"
                             style="background: var(--card-bg); border: 2px solid var(--border-color);">
                            <div class="flex flex-col md:flex-row gap-8">
                                <!-- Icon Section -->
                                <div class="flex-shrink-0">
                                    <div class="w-24 h-24 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300 glass-card"
                                         style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                        <img src="{{ $iconUrl }}" alt="Education Icon" class="w-12 h-12 md:w-14 md:h-14 object-contain" />
                                    </div>
                                </div>

                                <!-- Content Section -->
                                <div class="flex-1">
                                    <div class="mb-4">
                                        <h3 class="text-3xl font-bold mb-2 gradient-text">{{ $education->degree }}</h3>
                                        <p class="font-medium mb-1" style="color: var(--text-secondary);">{{ $education->institution }}</p>

                                        @if($education->year)
                                            <div class="flex items-center gap-2" style="color: var(--text-muted);">
                                                <!-- Calendar Icon -->
                                                <svg class="w-5 h-5" style="color: var(--accent-blue);" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-medium">{{ $education->year }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    @if($education->details)
                                        <div class="p-4 rounded-xl mt-4 glass-card"
                                             style="background: var(--glass-bg, var(--bg-gradient-start)); border: 1px solid var(--border-color);">
                                            <p class="leading-relaxed" style="color: var(--text-secondary);">{{ $education->details }}</p>
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

/* Hide normal theme blobs in monochrome mode */
[data-theme="monochrome"] .normal-theme-only {
    display: none;
}
</style>