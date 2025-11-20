@props(['educations'])

<section id="education" class="section-full relative overflow-hidden theme2-education-blue">
    
    <!-- Cyber Grid Background -->
    <div class="cyber-grid absolute inset-0 -z-10"></div>
    
    <!-- Floating Orbs -->
    <div class="orb-container absolute inset-0 -z-10 pointer-events-none"></div>
    
    <!-- Floating Particles -->
    <div class="particle-field absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6 py-20">
        
        <!-- Section Header -->
        <div class="text-center mb-20 animate-fade-in">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full edu-badge mb-8">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm font-medium">Qualifications</span>
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 neon-text leading-tight">
                Education & Background
            </h2>
            
            <!-- Description -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-10 edu-description">
                My academic journey and professional qualifications that shape my technical expertise.
            </p>
            
            <div class="flex items-center justify-center gap-4 max-w-xs mx-auto">
                <div class="h-px flex-1 max-w-24 cyber-divider-line"></div>
                <div class="w-2.5 h-2.5 rotate-45 cyber-diamond"></div>
                <div class="h-px flex-1 max-w-24 cyber-divider-line"></div>
            </div>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl mb-8 edu-empty-icon">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                    </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-4 edu-empty-title">No Education Added Yet</h3>
                <p class="text-lg max-w-md mx-auto edu-empty-text">Educational background will appear here once added.</p>
            </div>
        @else
            <!-- Education Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($educations->sortByDesc('year') as $index => $education)
                    @php
                        // Default icons based on degree type
                        $defaultIcons = [
                            'bachelor' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                            'master' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222',
                            'phd' => 'M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z',
                            'diploma' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                            'certificate' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'
                        ];
                        
                        // Determine which default icon to use based on degree name
                        $degreeLower = strtolower($education->degree);
                        $iconPath = $defaultIcons['bachelor']; // Default fallback
                        
                        if (str_contains($degreeLower, 'master') || str_contains($degreeLower, 'm.') || str_contains($degreeLower, 'msc') || str_contains($degreeLower, 'mba')) {
                            $iconPath = $defaultIcons['master'];
                        } elseif (str_contains($degreeLower, 'phd') || str_contains($degreeLower, 'doctor')) {
                            $iconPath = $defaultIcons['phd'];
                        } elseif (str_contains($degreeLower, 'diploma')) {
                            $iconPath = $defaultIcons['diploma'];
                        } elseif (str_contains($degreeLower, 'certificate') || str_contains($degreeLower, 'certification')) {
                            $iconPath = $defaultIcons['certificate'];
                        }
                        
                        $hasCustomIcon = $education->icon_url && filter_var($education->icon_url, FILTER_VALIDATE_URL);
                    @endphp
                    
                    <div class="edu-card" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="cyber-card-enhanced group">
                            <div class="cyber-corner-glow"></div>
                            <div class="cyber-shine"></div>
                            
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
                                @if($hasCustomIcon)
                                    <img src="{{ $education->icon_url }}" 
                                         alt="Education Icon" 
                                         class="edu-icon"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @endif
                                
                                <!-- Default Icon Fallback -->
                                <div class="edu-icon-fallback" style="{{ $hasCustomIcon ? 'display: none;' : 'display: flex;' }}">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $iconPath }}"/>
                                    </svg>
                                </div>
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

        <!-- Decorative Data Stream -->
        <div class="data-stream-wrapper">
            <div class="data-stream-line"></div>
            <div class="data-stream-pulse"></div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create floating orbs
    const orbContainer = document.querySelector('.orb-container');
    if (orbContainer) {
        const orbCount = 5;
        for (let i = 0; i < orbCount; i++) {
            const orb = document.createElement('div');
            orb.className = 'floating-orb';
            orb.style.left = `${Math.random() * 100}%`;
            orb.style.top = `${Math.random() * 100}%`;
            orb.style.animationDelay = `${Math.random() * 5}s`;
            orb.style.animationDuration = `${15 + Math.random() * 10}s`;
            orbContainer.appendChild(orb);
        }
    }
    
    // Create floating particles
    const particleField = document.querySelector('.particle-field');
    if (particleField) {
        const particleCount = 20;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'cyber-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particle.style.animationDuration = `${8 + Math.random() * 12}s`;
            particleField.appendChild(particle);
        }
    }
});
</script>

<style>
/* ===================================
   BLUE THEME EDUCATION SECTION
   =================================== */

:root {
    /* Dark Theme (Default) */
    --edu-bg-start: #0a0e27;
    --edu-bg-mid: #1a1f3a;
    --edu-bg-end: #0f1729;
    --edu-text-primary: #ffffff;
    --edu-text-secondary: #cbd5e1;
    --edu-text-muted: #94a3b8;
    --edu-neon-primary: #00d9ff;
    --edu-neon-secondary: #b537ff;
    --edu-neon-accent: #ff006e;
    --edu-grid-color: rgba(0, 217, 255, 0.05);
    --edu-orb-color: rgba(0, 217, 255, 0.15);
    --edu-card-bg: rgba(26, 31, 58, 0.6);
    --edu-card-border: rgba(0, 217, 255, 0.2);
    --edu-icon-bg: rgba(0, 217, 255, 0.15);
    --edu-year-bg: rgba(0, 217, 255, 0.1);
    --edu-year-text: #00d9ff;
}

/* Light Theme Override */
[data-theme="light"] {
    --edu-bg-start: #f8fafc;
    --edu-bg-mid: #e2e8f0;
    --edu-bg-end: #cbd5e1;
    --edu-text-primary: #1e293b;
    --edu-text-secondary: #475569;
    --edu-text-muted: #64748b;
    --edu-neon-primary: #0ea5e9;
    --edu-neon-secondary: #8b5cf6;
    --edu-neon-accent: #ec4899;
    --edu-grid-color: rgba(14, 165, 233, 0.08);
    --edu-orb-color: rgba(14, 165, 233, 0.12);
    --edu-card-bg: rgba(255, 255, 255, 0.8);
    --edu-card-border: rgba(14, 165, 233, 0.3);
    --edu-icon-bg: rgba(14, 165, 233, 0.15);
    --edu-year-bg: rgba(14, 165, 233, 0.1);
    --edu-year-text: #0ea5e9;
}

.theme2-education-blue {
    background: linear-gradient(135deg, var(--edu-bg-start) 0%, var(--edu-bg-mid) 50%, var(--edu-bg-end) 100%);
    position: relative;
    min-height: 100vh;
}

/* Grid Background */
.cyber-grid {
    background-image:
        linear-gradient(var(--edu-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--edu-grid-color) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: gridMove 20s linear infinite;
}

@keyframes gridMove {
    0% { background-position: 0 0; }
    100% { background-position: 50px 50px; }
}

/* Floating Orbs */
.floating-orb {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--edu-orb-color) 0%, transparent 70%);
    filter: blur(40px);
    animation: floatOrb 20s ease-in-out infinite;
    pointer-events: none;
}

@keyframes floatOrb {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(100px, -100px) scale(1.2); }
    50% { transform: translate(-50px, 100px) scale(0.8); }
    75% { transform: translate(150px, 50px) scale(1.1); }
}

/* Particles */
.cyber-particle {
    position: absolute;
    width: 3px;
    height: 3px;
    background: var(--edu-neon-primary);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--edu-neon-primary);
    animation: particleFloat 15s ease-in-out infinite;
}

@keyframes particleFloat {
    0%, 100% {
        transform: translate(0, 0) scale(1);
        opacity: 0;
    }
    10%, 90% { opacity: 1; }
    50% { transform: translate(100px, -80px) scale(1.5); }
}

/* Section Header */
.edu-badge {
    background: var(--edu-icon-bg);
    border: 2px solid var(--edu-card-border);
    color: var(--edu-neon-primary);
    backdrop-filter: blur(10px);
}

.neon-text {
    background: linear-gradient(90deg, var(--edu-neon-primary), var(--edu-neon-secondary), var(--edu-neon-accent));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: neonGlow 3s ease-in-out infinite;
}

@keyframes neonGlow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

.edu-description {
    color: var(--edu-text-secondary);
    line-height: 1.6;
}

.cyber-divider-line {
    background: linear-gradient(90deg, transparent, var(--edu-neon-primary), transparent);
    height: 2px;
}

.cyber-diamond {
    background: var(--edu-neon-primary);
    box-shadow: 0 0 15px var(--edu-neon-primary);
}

/* Empty State */
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
    line-height: 1.6;
}

/* Education Card */
.edu-card {
    opacity: 0;
    animation: fadeInScale 0.6s ease-out forwards;
}

.cyber-card-enhanced {
    position: relative;
    background: var(--edu-card-bg);
    border: 2px solid var(--edu-card-border);
    border-radius: 24px;
    padding: 2.5rem 2rem;
    backdrop-filter: blur(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.cyber-card-enhanced:hover {
    border-color: var(--edu-neon-primary);
    box-shadow: 0 20px 60px var(--edu-orb-color);
    transform: translateY(-8px);
}

.cyber-corner-glow {
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, var(--edu-neon-primary), transparent);
    opacity: 0.1;
    transition: opacity 0.3s ease;
    clip-path: polygon(100% 0, 0 0, 100% 100%);
}

.cyber-card-enhanced:hover .cyber-corner-glow {
    opacity: 0.2;
}

.cyber-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.cyber-card-enhanced:hover .cyber-shine {
    left: 100%;
}

/* Year Badge */
.edu-year-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1.25rem;
    background: var(--edu-year-bg);
    color: var(--edu-year-text);
    border-radius: 9999px;
    font-weight: 700;
    font-size: 0.875rem;
    margin-bottom: 2rem;
    z-index: 1;
    transition: all 0.3s ease;
    border: 1px solid var(--edu-card-border);
}

.cyber-card-enhanced:hover .edu-year-badge {
    transform: scale(1.05);
    border-color: var(--edu-neon-primary);
    box-shadow: 0 0 20px var(--edu-orb-color);
}

/* Icon Wrapper */
.edu-icon-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    margin-bottom: 2rem;
    z-index: 1;
}

.edu-icon-bg {
    position: absolute;
    inset: 0;
    background: var(--edu-icon-bg);
    border-radius: 24px;
    transition: all 0.4s ease;
}

.cyber-card-enhanced:hover .edu-icon-bg {
    transform: rotate(5deg) scale(1.1);
    background: color-mix(in srgb, var(--edu-icon-bg) 80%, transparent);
}

.edu-icon {
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: all 0.4s ease;
    z-index: 1;
}

.cyber-card-enhanced:hover .edu-icon {
    transform: scale(1.15) rotate(-5deg);
}

/* Default Icon Fallback */
.edu-icon-fallback {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 24px;
    background: linear-gradient(135deg, var(--edu-neon-primary), var(--edu-neon-secondary));
    color: white;
    transition: all 0.4s ease;
    z-index: 1;
}

.cyber-card-enhanced:hover .edu-icon-fallback {
    transform: scale(1.15) rotate(-5deg);
    box-shadow: 0 10px 30px var(--edu-orb-color);
}

/* Content */
.edu-degree {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--edu-text-primary);
    line-height: 1.3;
    margin-bottom: 0.75rem;
    z-index: 1;
    letter-spacing: -0.025em;
}

.edu-institution {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--edu-neon-primary);
    margin-bottom: 1.25rem;
    z-index: 1;
    line-height: 1.4;
}

.edu-details {
    color: var(--edu-text-secondary);
    line-height: 1.6;
    font-size: 0.9375rem;
    z-index: 1;
    margin-bottom: 0.5rem;
}

/* Bottom Accent Line */
.edu-accent-line {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--edu-neon-primary), var(--edu-neon-secondary));
    opacity: 0;
    transition: opacity 0.3s;
}

.cyber-card-enhanced:hover .edu-accent-line {
    opacity: 1;
}

/* Data Stream */
.data-stream-wrapper {
    position: relative;
    height: 3px;
    background: var(--edu-card-bg);
    border-radius: 999px;
    overflow: hidden;
    margin-top: 4rem;
}

.data-stream-line {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, var(--edu-neon-primary), transparent);
    animation: streamFlow 3s ease-in-out infinite;
}

.data-stream-pulse {
    position: absolute;
    width: 100px;
    height: 100%;
    background: var(--edu-neon-primary);
    filter: blur(10px);
    animation: pulseFlow 2s ease-in-out infinite;
    opacity: 0.5;
}

@keyframes streamFlow {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(400%); }
}

@keyframes pulseFlow {
    0%, 100% { transform: translateX(0) scaleX(1); }
    50% { transform: translateX(200%) scaleX(1.5); }
}

/* Animations */
@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .cyber-card-enhanced {
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 768px) {
    .theme2-education-blue {
        padding: 4rem 0;
    }
    
    .neon-text {
        font-size: 2.5rem;
    }
    
    .cyber-card-enhanced {
        padding: 1.75rem 1.25rem;
    }
    
    .edu-icon-wrapper {
        width: 80px;
        height: 80px;
        margin-bottom: 1.5rem;
    }
    
    .edu-degree {
        font-size: 1.25rem;
    }
    
    .edu-institution {
        font-size: 1rem;
    }
    
    .edu-year-badge {
        margin-bottom: 1.5rem;
        padding: 0.5rem 1rem;
    }
}

@media (max-width: 640px) {
    .grid.md\:grid-cols-2.lg\:grid-cols-3 {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .cyber-card-enhanced {
        padding: 1.5rem 1rem;
    }
    
    .edu-icon-wrapper {
        width: 70px;
        height: 70px;
    }
}

/* Enhanced Card Effects */
.cyber-card-enhanced::before {
    content: '';
    position: absolute;
    inset: -2px;
    background: linear-gradient(45deg, var(--edu-neon-primary), var(--edu-neon-secondary), var(--edu-neon-accent));
    border-radius: 24px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}

.cyber-card-enhanced:hover::before {
    opacity: 0.1;
}

/* Icon Glow Effects */
.edu-icon-wrapper svg {
    filter: drop-shadow(0 0 2px currentColor);
    transition: filter 0.3s ease;
}

.cyber-card-enhanced:hover .edu-icon-wrapper svg {
    filter: drop-shadow(0 0 8px currentColor);
}

/* Text Glow on Hover */
.cyber-card-enhanced:hover .edu-degree {
    text-shadow: 0 0 10px var(--edu-orb-color);
}

/* Loading Animation */
@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

/* Reduced Motion Support */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .cyber-grid,
    .floating-orb,
    .cyber-particle,
    .data-stream-line,
    .data-stream-pulse {
        animation: none !important;
    }
}

/* Selection Color */
::selection {
    background: var(--edu-neon-primary);
    color: var(--edu-bg-start);
}

::-moz-selection {
    background: var(--edu-neon-primary);
    color: var(--edu-bg-start);
}
</style>