@props(['experiences'])

<section id="experience" class="section-full relative overflow-hidden theme2-experience-v2">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 -z-10">
        <div class="exp-grid-bg"></div>
        <div class="exp-gradient-mesh"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            <h2 class="text-5xl md:text-6xl font-black mb-6 exp-title">
                Professional Journey
            </h2>
            <p class="text-xl max-w-3xl mx-auto exp-description">
                A timeline of my career progression and key accomplishments
            </p>
            
            <div class="flex items-center justify-center gap-4 mt-8">
                <div class="h-px flex-1 max-w-24 exp-divider"></div>
                <div class="w-2.5 h-2.5 rounded-full exp-dot"></div>
                <div class="h-px flex-1 max-w-24 exp-divider"></div>
            </div>
        </div>

        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl mb-6 exp-empty-icon">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-3 exp-empty-title">No Experience Added Yet</h3>
                <p class="text-lg exp-empty-text">Work experience will appear here once added.</p>
            </div>
        @else
            <!-- Horizontal Timeline -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-0 right-0 top-8 h-1 exp-timeline-line lg:left-8 lg:right-8"></div>
                
                <div class="flex overflow-x-auto pb-8 snap-x snap-mandatory lg:overflow-visible lg:pb-0 lg:snap-none scrollbar-hide">
                    <div class="flex gap-8 lg:gap-0 lg:justify-between w-full">
                        @foreach($experiences as $index => $experience)
                            <div class="flex-shrink-0 w-80 snap-center exp-item" style="animation-delay: {{ $index * 0.1 }}s">
                                <div class="flex flex-col items-center">
                                    <!-- Timeline Dot -->
                                    <div class="relative z-10 w-6 h-6 rounded-full exp-timeline-dot mb-4">
                                        <div class="w-3 h-3 m-auto rounded-full exp-timeline-dot-inner"></div>
                                    </div>
                                    
                                    <!-- Experience Card -->
                                    <div class="exp-card w-full">
                                        <div class="exp-card-inner">
                                            <div class="exp-shine"></div>
                                            
                                            @if($index === 0)
                                                <div class="mb-4">
                                                    <span class="exp-current-badge">CURRENT</span>
                                                </div>
                                            @endif
                                            
                                            <!-- Company Logo Placeholder -->
                                            <div class="w-16 h-16 rounded-xl exp-company-logo mb-4 flex items-center justify-center">
                                                <span class="text-xl font-bold exp-company-logo-text">{{ substr($experience->company, 0, 1) }}</span>
                                            </div>
                                            
                                            @if($experience->duration)
                                                <div class="flex items-center gap-2 mb-4">
                                                    <svg class="w-4 h-4 exp-icon" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="exp-duration">{{ $experience->duration }}</span>
                                                </div>
                                            @endif
                                            
                                            <h3 class="exp-role mb-2">{{ $experience->role }}</h3>
                                            <p class="exp-company mb-4">{{ $experience->company }}</p>
                                            
                                            @if($experience->details)
                                                <p class="exp-details">{{ $experience->details }}</p>
                                            @endif
                                            
                                            <!-- Skills Tags -->
                                            <div class="mt-4 flex flex-wrap gap-2">
                                                @if($experience->skills)
                                                    @foreach(explode(',', $experience->skills) as $skill)
                                                        <span class="exp-skill-tag">{{ trim($skill) }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
/* Theme 2 Experience - Matching Hero Theme Colors */

[data-theme="light"] {
    /* Hero Light Theme Colors */
    --exp-bg-start: #f8fafc;
    --exp-bg-mid: #e2e8f0;
    --exp-bg-end: #cbd5e1;
    --exp-text-primary: #1e293b;
    --exp-text-secondary: #475569;
    --exp-text-muted: #64748b;
    --neon-primary: #0ea5e9;
    --neon-secondary: #8b5cf6;
    --neon-accent: #ec4899;
    --grid-color: rgba(14, 165, 233, 0.08);
    --orb-color: rgba(14, 165, 233, 0.12);
    --badge-bg: rgba(14, 165, 233, 0.15);
    --badge-border: rgba(14, 165, 233, 0.4);
    --btn-primary-bg: #0ea5e9;
    --btn-primary-text: #ffffff;
    --btn-secondary-border: #0ea5e9;
    --hexagon-bg: rgba(14, 165, 233, 0.15);
    --hexagon-hover-bg: #0ea5e9;
    --hexagon-hover-text: #ffffff;
}

[data-theme="dark"] {
    /* Hero Dark Theme Colors */
    --exp-bg-start: #0a0e27;
    --exp-bg-mid: #1a1f3a;
    --exp-bg-end: #0f1729;
    --exp-text-primary: #ffffff;
    --exp-text-secondary: #cbd5e1;
    --exp-text-muted: #94a3b8;
    --neon-primary: #00d9ff;
    --neon-secondary: #b537ff;
    --neon-accent: #ff006e;
    --grid-color: rgba(0, 217, 255, 0.05);
    --orb-color: rgba(0, 217, 255, 0.15);
    --badge-bg: rgba(0, 217, 255, 0.1);
    --badge-border: rgba(0, 217, 255, 0.3);
    --btn-primary-bg: #00d9ff;
    --btn-primary-text: #0a0e27;
    --btn-secondary-border: #00d9ff;
    --hexagon-bg: rgba(0, 217, 255, 0.1);
    --hexagon-hover-bg: #00d9ff;
    --hexagon-hover-text: #0a0e27;
}

.theme2-experience-v2 {
    background: linear-gradient(135deg, var(--exp-bg-start) 0%, var(--exp-bg-mid) 50%, var(--exp-bg-end) 100%);
    padding: 6rem 0;
}

.exp-grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(var(--grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: gridMove 20s linear infinite;
}

@keyframes gridMove {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 50px 50px;
    }
}

.exp-gradient-mesh {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 20% 30%, var(--neon-primary) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, var(--neon-secondary) 0%, transparent 50%);
    opacity: 0.03;
    filter: blur(60px);
}

.exp-title {
    color: var(--exp-text-primary);
    line-height: 1.1;
    background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary), var(--neon-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: neonGlow 3s ease-in-out infinite;
}

@keyframes neonGlow {
    0%, 100% {
        filter: brightness(1);
    }
    50% {
        filter: brightness(1.3);
    }
}

.exp-description {
    color: var(--exp-text-secondary);
}

.exp-divider {
    background: linear-gradient(90deg, transparent, var(--neon-primary), transparent);
    height: 2px;
}

.exp-dot {
    background: var(--neon-primary);
    box-shadow: 0 0 10px var(--neon-primary);
}

.exp-empty-icon {
    background: var(--badge-bg);
    border: 2px solid var(--badge-border);
    color: var(--exp-text-muted);
}

.exp-empty-title {
    color: var(--exp-text-primary);
}

.exp-empty-text {
    color: var(--exp-text-muted);
}

.exp-timeline-line {
    background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
    box-shadow: 0 0 10px var(--neon-primary);
}

.exp-timeline-dot {
    background: var(--exp-bg-start);
    border: 3px solid var(--neon-primary);
    box-shadow: 0 0 0 6px var(--exp-bg-start), 0 0 10px var(--neon-primary);
    z-index: 10;
}

.exp-timeline-dot-inner {
    background: var(--neon-primary);
    box-shadow: 0 0 10px var(--neon-primary);
}

.exp-item {
    opacity: 0;
    animation: fadeInUp 0.6s ease-out forwards;
}

.exp-card {
    height: 100%;
}

.exp-card-inner {
    position: relative;
    background: var(--badge-bg);
    border: 2px solid var(--badge-border);
    border-radius: 16px;
    padding: 2rem;
    transition: all 0.4s ease;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(10px);
}

.exp-card:hover .exp-card-inner {
    transform: translateY(-8px);
    border-color: var(--neon-primary);
    box-shadow: 
        0 10px 30px rgba(0, 0, 0, 0.3),
        0 0 20px var(--orb-color);
}

.exp-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.exp-card:hover .exp-shine {
    left: 100%;
}

.exp-current-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
    color: var(--btn-primary-text);
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 9999px;
    letter-spacing: 0.5px;
    align-self: flex-start;
    text-transform: uppercase;
    clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
}

.exp-company-logo {
    background: var(--hexagon-bg);
    color: var(--neon-primary);
    border: 1px solid var(--badge-border);
    border-radius: 9999px;
}

.exp-company-logo-text {
    color: var(--neon-primary);
}

.exp-icon {
    color: var(--neon-primary);
}

.exp-duration {
    color: var(--exp-text-muted);
    font-weight: 600;
    font-size: 0.875rem;
}

.exp-role {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--exp-text-primary);
    line-height: 1.2;
    text-shadow: 0 0 10px var(--orb-color);
}

.exp-company {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--neon-primary);
}

.exp-details {
    color: var(--exp-text-secondary);
    line-height: 1.7;
    flex-grow: 1;
}

.exp-skill-tag {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--hexagon-bg);
    color: var(--neon-primary);
    font-size: 0.75rem;
    border-radius: 6px;
    font-weight: 500;
    border: 1px solid var(--badge-border);
    transition: all 0.3s ease;
}

.exp-skill-tag:hover {
    background: var(--neon-primary);
    color: var(--btn-primary-text);
    transform: translateY(-2px);
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@media (max-width: 1024px) {
    .exp-card-inner {
        padding: 1.5rem;
    }
    
    .exp-role {
        font-size: 1.25rem;
    }
    
    .exp-company {
        font-size: 1rem;
    }
}

@media (max-width: 768px) {
    .theme2-experience-v2 {
        padding: 4rem 0;
    }
    
    .exp-title {
        font-size: 3rem;
    }
}
</style>