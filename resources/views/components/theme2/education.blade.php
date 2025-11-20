@props(['educations'])

<section id="education" class="section-full relative overflow-hidden theme2-education-v2">
    
    <!-- Cyber Grid Background -->
    <div class="absolute inset-0 -z-10">
        <div class="edu-grid-bg"></div>
        <div class="edu-gradient-orbs"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6 edu-badge">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
                <span class="text-sm font-semibold uppercase tracking-wider">Academic Background</span>
            </div>
            
            <h2 class="text-5xl md:text-6xl font-black mb-6 edu-title">
                Education & Qualifications
            </h2>
            
            <p class="text-lg md:text-xl max-w-3xl mx-auto edu-description mb-8">
                My academic journey and achievements in pursuit of excellence
            </p>
            
            <div class="flex items-center justify-center gap-4">
                <div class="h-px flex-1 max-w-24 edu-divider"></div>
                <div class="w-2.5 h-2.5 rounded-full edu-dot"></div>
                <div class="h-px flex-1 max-w-24 edu-divider"></div>
            </div>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl mb-6 edu-empty-icon">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                    </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-3 edu-empty-title">No Education Added Yet</h3>
                <p class="text-lg edu-empty-text">Educational background will appear here once added.</p>
            </div>
        @else
            <!-- Education Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($educations->sortByDesc('year') as $index => $education)
                    @php
                        $iconUrl = $education->icon_url ?: 'https://img.icons8.com/?size=100&id=XJ2wmYGmoVoN&format=png&color=000000';
                    @endphp
                    
                    <div class="edu-card" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="edu-card-inner">
                            <div class="edu-shine"></div>
                            <div class="edu-glow"></div>
                            
                            <!-- Year Badge -->
                            <div class="edu-year-badge">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $education->year ?: 'Present' }}</span>
                            </div>
                            
                            <!-- Icon -->
                            <div class="edu-icon-wrapper">
                                <div class="edu-icon-bg"></div>
                                <img src="{{ $iconUrl }}" alt="Education Icon" class="edu-icon" />
                            </div>
                            
                            <!-- Content -->
                            <h3 class="edu-degree">{{ $education->degree }}</h3>
                            <p class="edu-institution">{{ $education->institution }}</p>
                            
                            @if($education->details)
                                <p class="edu-details">{{ $education->details }}</p>
                            @endif
                            
                            <!-- Bottom Accent -->
                            <div class="edu-accent-line"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
/* Theme 2 Education - Dual Theme Support */

[data-theme="light"] {
    --edu-bg: #f8fafc;
    --edu-text-primary: #0f172a;
    --edu-text-secondary: #475569;
    --edu-text-muted: #64748b;
    --edu-card-bg: #ffffff;
    --edu-card-border: #e2e8f0;
    --edu-accent: #8b5cf6;
    --edu-accent-secondary: #ec4899;
    --edu-grid-color: rgba(139, 92, 246, 0.03);
    --edu-glow-color: rgba(139, 92, 246, 0.15);
    --edu-year-bg: #f3e8ff;
    --edu-year-text: #6b21a8;
    --edu-icon-bg: rgba(139, 92, 246, 0.1);
}

[data-theme="dark"] {
    --edu-bg: #0f172a;
    --edu-text-primary: #f1f5f9;
    --edu-text-secondary: #cbd5e1;
    --edu-text-muted: #94a3b8;
    --edu-card-bg: #1e293b;
    --edu-card-border: #334155;
    --edu-accent: #a78bfa;
    --edu-accent-secondary: #f472b6;
    --edu-grid-color: rgba(167, 139, 250, 0.05);
    --edu-glow-color: rgba(167, 139, 250, 0.2);
    --edu-year-bg: #4c1d95;
    --edu-year-text: #e9d5ff;
    --edu-icon-bg: rgba(167, 139, 250, 0.15);
}

.theme2-education-v2 {
    background: var(--edu-bg);
    padding: 6rem 0;
}

.edu-grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(circle at 2px 2px, var(--edu-grid-color) 1px, transparent 0);
    background-size: 40px 40px;
}

.edu-gradient-orbs {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 80% 20%, var(--edu-accent) 0%, transparent 40%),
        radial-gradient(circle at 20% 80%, var(--edu-accent-secondary) 0%, transparent 40%);
    opacity: 0.05;
    filter: blur(80px);
}

.edu-badge {
    background: var(--edu-card-bg);
    border: 2px solid var(--edu-card-border);
    color: var(--edu-accent);
}

.edu-title {
    color: var(--edu-text-primary);
    line-height: 1.1;
}

.edu-description {
    color: var(--edu-text-secondary);
}

.edu-divider {
    background: linear-gradient(90deg, transparent, var(--edu-accent), transparent);
    height: 2px;
}

.edu-dot {
    background: var(--edu-accent);
    box-shadow: 0 0 10px var(--edu-accent);
}

.edu-empty-icon {
    background: var(--edu-card-bg);
    border: 2px solid var(--edu-card-border);
    color: var(--edu-text-muted);
}

.edu-empty-title {
    color: var(--edu-text-primary);
}

.edu-empty-text {
    color: var(--edu-text-muted);
}

.edu-card {
    opacity: 0;
    animation: fadeInScale 0.6s ease-out forwards;
}

.edu-card-inner {
    position: relative;
    height: 100%;
    background: var(--edu-card-bg);
    border: 2px solid var(--edu-card-border);
    border-radius: 24px;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: all 0.4s ease;
    overflow: hidden;
}

.edu-card:hover .edu-card-inner {
    transform: translateY(-8px);
    border-color: var(--edu-accent);
    box-shadow: 0 20px 40px var(--edu-glow-color);
}

.edu-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.edu-card:hover .edu-shine {
    left: 100%;
}

.edu-glow {
    position: absolute;
    inset: -50%;
    background: conic-gradient(
        from 0deg at 50% 50%,
        transparent 0deg,
        var(--edu-glow-color) 90deg,
        transparent 180deg
    );
    opacity: 0;
    transition: opacity 0.4s;
    animation: rotate 4s linear infinite;
    animation-play-state: paused;
}

.edu-card:hover .edu-glow {
    opacity: 1;
    animation-play-state: running;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.edu-year-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--edu-year-bg);
    color: var(--edu-year-text);
    border-radius: 9999px;
    font-weight: 700;
    font-size: 0.875rem;
    margin-bottom: 1.5rem;
    z-index: 1;
}

.edu-icon-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    margin-bottom: 1.5rem;
    z-index: 1;
}

.edu-icon-bg {
    position: absolute;
    inset: 0;
    background: var(--edu-icon-bg);
    border-radius: 24px;
    transition: transform 0.3s ease;
}

.edu-card:hover .edu-icon-bg {
    transform: rotate(5deg) scale(1.1);
}

.edu-icon {
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    z-index: 1;
}

.edu-card:hover .edu-icon {
    transform: scale(1.15) rotate(-5deg);
}

.edu-degree {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--edu-text-primary);
    line-height: 1.3;
    margin-bottom: 0.75rem;
    z-index: 1;
}

.edu-institution {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--edu-accent);
    margin-bottom: 1rem;
    z-index: 1;
}

.edu-details {
    color: var(--edu-text-secondary);
    line-height: 1.6;
    font-size: 0.9375rem;
    z-index: 1;
}

.edu-accent-line {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--edu-accent), var(--edu-accent-secondary));
    opacity: 0;
    transition: opacity 0.3s;
}

.edu-card:hover .edu-accent-line {
    opacity: 1;
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@media (max-width: 768px) {
    .theme2-education-v2 {
        padding: 4rem 0;
    }
    
    .edu-title {
        font-size: 2.5rem;
    }
    
    .edu-card-inner {
        padding: 1.5rem;
    }
    
    .edu-icon-wrapper {
        width: 80px;
        height: 80px;
    }
}
</style>