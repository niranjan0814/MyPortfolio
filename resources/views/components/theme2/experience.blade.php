@props(['experiences'])

<section id="experience" class="section-full relative overflow-hidden theme2-experience-v2">
    
    <!-- Cyber Grid Background -->
    <div class="absolute inset-0 -z-10">
        <div class="exp-grid-bg"></div>
        <div class="exp-gradient-mesh"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            
            
            <h2 class="text-5xl md:text-6xl font-black mb-6 exp-title">
                Professional Experience
            </h2>
            
            
            
            <div class="flex items-center justify-center gap-4">
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
            <!-- Timeline -->
            <div class="relative">
                <!-- Center Line -->
                <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-0.5 exp-timeline-line"></div>
                
                @foreach($experiences as $index => $experience)
                    @php
                        $isEven = $index % 2 === 0;
                    @endphp
                    
                    <div class="relative mb-16 lg:mb-24 exp-item" style="animation-delay: {{ $index * 0.1 }}s">
                        
                        <!-- Timeline Dot -->
                        <div class="hidden lg:flex absolute left-1/2 top-8 -translate-x-1/2 w-6 h-6 rounded-full exp-timeline-dot">
                            <div class="w-3 h-3 m-auto rounded-full exp-timeline-dot-inner"></div>
                        </div>
                        
                        <div class="grid lg:grid-cols-2 gap-8 items-start">
                            @if($isEven)
                                <!-- Left Side (Content) -->
                                <div class="lg:text-right lg:pr-16">
                                    <div class="exp-card">
                                        <div class="exp-card-inner">
                                            <div class="exp-shine"></div>
                                            
                                            @if($index === 0)
                                                <div class="mb-4">
                                                    <span class="exp-current-badge">CURRENT ROLE</span>
                                                </div>
                                            @endif
                                            
                                            @if($experience->duration)
                                                <div class="flex items-center gap-2 mb-4 {{ $isEven ? 'lg:justify-end' : '' }}">
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
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Right Side (Empty) -->
                                <div class="hidden lg:block"></div>
                            @else
                                <!-- Left Side (Empty) -->
                                <div class="hidden lg:block"></div>
                                
                                <!-- Right Side (Content) -->
                                <div class="lg:pl-16">
                                    <div class="exp-card">
                                        <div class="exp-card-inner">
                                            <div class="exp-shine"></div>
                                            
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
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
/* Theme 2 Experience - Dual Theme Support */

[data-theme="light"] {
    --exp-bg: #f8fafc;
    --exp-text-primary: #0f172a;
    --exp-text-secondary: #475569;
    --exp-text-muted: #64748b;
    --exp-card-bg: #ffffff;
    --exp-card-border: #e2e8f0;
    --exp-accent: #3b82f6;
    --exp-accent-secondary: #8b5cf6;
    --exp-grid-color: rgba(59, 130, 246, 0.03);
    --exp-timeline-color: #e2e8f0;
    --exp-timeline-dot: #3b82f6;
    --exp-current-bg: #dbeafe;
    --exp-current-text: #1e40af;
}

[data-theme="dark"] {
    --exp-bg: #0f172a;
    --exp-text-primary: #f1f5f9;
    --exp-text-secondary: #cbd5e1;
    --exp-text-muted: #94a3b8;
    --exp-card-bg: #1e293b;
    --exp-card-border: #334155;
    --exp-accent: #60a5fa;
    --exp-accent-secondary: #a78bfa;
    --exp-grid-color: rgba(96, 165, 250, 0.05);
    --exp-timeline-color: #334155;
    --exp-timeline-dot: #60a5fa;
    --exp-current-bg: #1e3a8a;
    --exp-current-text: #93c5fd;
}

.theme2-experience-v2 {
    background: var(--exp-bg);
    padding: 6rem 0;
}

.exp-grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(var(--exp-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--exp-grid-color) 1px, transparent 1px);
    background-size: 60px 60px;
}

.exp-gradient-mesh {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 20% 30%, var(--exp-accent) 0%, transparent 50%);
    opacity: 0.03;
    filter: blur(60px);
}

.exp-badge {
    background: var(--exp-card-bg);
    border: 2px solid var(--exp-card-border);
    color: var(--exp-accent);
}

.exp-title {
    color: var(--exp-text-primary);
    line-height: 1.1;
}

.exp-description {
    color: var(--exp-text-secondary);
}

.exp-divider {
    background: linear-gradient(90deg, transparent, var(--exp-accent), transparent);
    height: 2px;
}

.exp-dot {
    background: var(--exp-accent);
    box-shadow: 0 0 10px var(--exp-accent);
}

.exp-empty-icon {
    background: var(--exp-card-bg);
    border: 2px solid var(--exp-card-border);
    color: var(--exp-text-muted);
}

.exp-empty-title {
    color: var(--exp-text-primary);
}

.exp-empty-text {
    color: var(--exp-text-muted);
}

.exp-timeline-line {
    background: linear-gradient(180deg, var(--exp-accent), var(--exp-accent-secondary));
    box-shadow: 0 0 10px var(--exp-accent);
}

.exp-timeline-dot {
    background: var(--exp-card-bg);
    border: 3px solid var(--exp-timeline-dot);
    box-shadow: 0 0 0 6px var(--exp-card-bg);
    z-index: 10;
}

.exp-timeline-dot-inner {
    background: var(--exp-timeline-dot);
    box-shadow: 0 0 10px var(--exp-timeline-dot);
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
    background: var(--exp-card-bg);
    border: 2px solid var(--exp-card-border);
    border-radius: 20px;
    padding: 2rem;
    transition: all 0.4s ease;
    overflow: hidden;
}

.exp-card:hover .exp-card-inner {
    transform: translateY(-8px);
    border-color: var(--exp-accent);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
    background: var(--exp-current-bg);
    color: var(--exp-current-text);
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 9999px;
    letter-spacing: 0.5px;
}

.exp-icon {
    color: var(--exp-accent);
}

.exp-duration {
    color: var(--exp-text-muted);
    font-weight: 600;
    font-size: 0.875rem;
}

.exp-role {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--exp-text-primary);
    line-height: 1.2;
}

.exp-company {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--exp-accent);
}

.exp-details {
    color: var(--exp-text-secondary);
    line-height: 1.7;
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
        font-size: 1.5rem;
    }
}
</style>