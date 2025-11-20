@props(['aboutContent'])

<section id="about" class="section-full relative overflow-hidden pt-20 pb-24 theme2-about-premium">
    
    <!-- Animated Background Layers -->
    <div class="cyber-grid absolute inset-0 -z-20"></div>
    <div class="gradient-orbs absolute inset-0 -z-10"></div>
    <div class="particle-field absolute inset-0 -z-10"></div>
    
    <!-- Floating Elements -->
    <div class="floating-shapes absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-6xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-20 animate-slide-down">
            <!-- Premium Badge -->
            <div class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl premium-badge mb-8">
                <div class="w-2 h-2 rounded-full premium-pulse"></div>
                <span class="text-sm font-semibold tracking-wider">PROFESSIONAL PROFILE</span>
                <div class="w-2 h-2 rounded-full premium-pulse"></div>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-black mb-6 premium-title leading-tight">
                About <span class="premium-accent">Me</span>
            </h1>
            
            <p class="text-xl md:text-2xl max-w-3xl mx-auto premium-subtitle mb-8">
                Crafting digital experiences with precision and innovation
            </p>
            
            <!-- Animated Divider -->
            <div class="flex items-center justify-center gap-6 mb-4">
                <div class="h-px flex-1 max-w-32 premium-divider"></div>
                <div class="premium-diamond">
                    <div class="diamond-inner"></div>
                </div>
                <div class="h-px flex-1 max-w-32 premium-divider"></div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            
            <!-- LEFT: Profile & Stats -->
            <div class="space-y-8">
                <!-- Enhanced Profile Card -->
                <div class="premium-card group">
                    <div class="card-glow"></div>
                    <div class="card-shine"></div>
                    
                    <div class="relative z-10 p-8">
                        <!-- Profile Header -->
                        <div class="flex items-start gap-6 mb-8">
                            <div class="premium-avatar">
                                <div class="avatar-glow"></div>
                                <div class="avatar-shine"></div>
                                <svg class="w-10 h-10 premium-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 class="text-4xl font-black premium-text-primary mb-3">
                                    {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                                </h2>
                                <div class="flex flex-wrap gap-3">
                                    <span class="premium-tag">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                        {{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}
                                    </span>
                                    <span class="premium-tag">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        GPA {{ $aboutContent['profile_gpa_badge'] ?? '3.79' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Animated Divider -->
                        <div class="premium-divider-horizontal mb-8"></div>

                        <!-- Description -->
                        <div class="prose-premium">
                            <p class="text-lg leading-relaxed premium-text-secondary">
                                {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating cutting-edge solutions that bridge technology and user experience.' !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Stats Grid -->
                @php
                    $stats = [
                        'projects' => ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label'], 'icon' => $aboutContent['stats_icon_urls']['projects'] ?? null],
                        'technologies' => ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label'], 'icon' => $aboutContent['stats_icon_urls']['technologies'] ?? null],
                        'team' => ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label'], 'icon' => $aboutContent['stats_icon_urls']['team'] ?? null],
                        'problem' => ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label'], 'icon' => $aboutContent['stats_icon_urls']['problem'] ?? null],
                    ];
                @endphp

                <div class="premium-stats-grid">
                    @foreach($stats as $key => $stat)
                        @if($stat['count'] && $stat['label'])
                            <div class="premium-stat-card group" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="stat-glow"></div>
                                <div class="stat-content">
                                    <div class="stat-icon-wrapper">
                                        @if($stat['icon'])
                                            <img src="{{ $stat['icon'] }}" alt="{{ $stat['label'] }}" class="w-7 h-7" />
                                        @else
                                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="stat-number premium-accent-text">{{ $stat['count'] }}</div>
                                    <div class="stat-label">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- RIGHT: Skills & Actions -->
            <div class="space-y-8">
                
                <!-- Enhanced Skills Card -->
                @if (!empty($aboutContent['soft_skills']))
                    <div class="premium-card group">
                        <div class="card-glow"></div>
                        
                        <div class="relative z-10 p-8">
                            <div class="flex items-center gap-4 mb-8">
                                <div class="premium-icon-box">
                                    <svg class="w-7 h-7 premium-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black premium-text-primary mb-2">Core Competencies</h3>
                                    <p class="text-sm premium-text-muted">Professional skills & expertise</p>
                                </div>
                            </div>

                            <div class="premium-divider-horizontal mb-8"></div>

                            <div class="premium-skills-grid">
                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    <div class="premium-skill-chip group">
                                        <div class="skill-chip-glow"></div>
                                        <div class="skill-chip-content">
                                            @if($iconUrl)
                                                <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="w-5 h-5" />
                                            @else
                                                <div class="skill-dot"></div>
                                            @endif
                                            <span class="text-sm font-semibold">{{ $skill }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Enhanced CTA Section -->
                <div class="space-y-4">
                    <!-- Primary CTA -->
                    <a href="#contact" class="premium-btn-primary group w-full">
                        <span class="relative z-10 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $aboutContent['cta_button_text'] ?? "Start a Project Together" }}
                        </span>
                        <div class="btn-shine"></div>
                    </a>

                    <!-- CV Actions -->
                    @if($aboutContent['user']->hasCv())
                        <div class="premium-actions-grid">
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" 
                               class="premium-btn-secondary group" download>
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    Download CV
                                </span>
                            </a>

                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}" 
                               target="_blank" class="premium-btn-outline group">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Preview CV
                                </span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Animated Data Stream -->
        <div class="premium-data-stream mt-20">
            <div class="stream-line"></div>
            <div class="stream-pulse"></div>
        </div>
    </div>
</section>

<!-- Animation Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    const particleField = document.querySelector('.particle-field');
    if (particleField) {
        const particleCount = 25;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'premium-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 15}s`;
            particle.style.animationDuration = `${12 + Math.random() * 15}s`;
            particleField.appendChild(particle);
        }
    }

    // Create floating shapes
    const shapesContainer = document.querySelector('.floating-shapes');
    if (shapesContainer) {
        const shapes = ['triangle', 'circle', 'square', 'hexagon'];
        shapes.forEach((shape, index) => {
            const element = document.createElement('div');
            element.className = `floating-shape floating-${shape}`;
            element.style.left = `${20 + index * 20}%`;
            element.style.animationDelay = `${index * 2}s`;
            shapesContainer.appendChild(element);
        });
    }

    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observe animated elements
    document.querySelectorAll('.premium-stat-card, .premium-card').forEach(el => {
        observer.observe(el);
    });
});
</script>

<style>
/* ===================================
   PREMIUM ABOUT SECTION - ENHANCED
   =================================== */

:root {
    /* Light Theme Colors (Default) */
    --premium-bg-start: #f8fafc;
    --premium-bg-end: #e2e8f0;
    --premium-text-primary: #1e293b;
    --premium-text-secondary: #475569;
    --premium-text-muted: #64748b;
    --premium-accent: #0ea5e9;
    --premium-accent-secondary: #8b5cf6;
    --premium-accent-tertiary: #ec4899;
    --premium-card-bg: rgba(255, 255, 255, 0.8);
    --premium-card-border: rgba(14, 165, 233, 0.3);
    --premium-card-glow: rgba(14, 165, 233, 0.15);
    --premium-grid-color: rgba(14, 165, 233, 0.08);
    --premium-particle-color: rgba(14, 165, 233, 0.4);
    --premium-icon-bg: rgba(14, 165, 233, 0.15);
    --premium-divider: rgba(14, 165, 233, 0.3);
}

[data-theme="dark"] {
    /* Dark Theme Colors */
    --premium-bg-start: #0a0e17;
    --premium-bg-end: #1a1f2a;
    --premium-text-primary: #ffffff;
    --premium-text-secondary: #e2e8f0;
    --premium-text-muted: #94a3b8;
    --premium-accent: #00d9ff;
    --premium-accent-secondary: #b537ff;
    --premium-accent-tertiary: #ff006e;
    --premium-card-bg: rgba(30, 35, 50, 0.7);
    --premium-card-border: rgba(0, 217, 255, 0.15);
    --premium-card-glow: rgba(0, 217, 255, 0.1);
    --premium-grid-color: rgba(0, 217, 255, 0.03);
    --premium-particle-color: rgba(0, 217, 255, 0.4);
    --premium-icon-bg: rgba(0, 217, 255, 0.1);
    --premium-divider: rgba(0, 217, 255, 0.3);
}

.theme2-about-premium {
    background: linear-gradient(135deg, var(--premium-bg-start) 0%, var(--premium-bg-end) 100%);
    position: relative;
    overflow: hidden;
}

/* Enhanced Grid Background */
.cyber-grid {
    background-image: 
        linear-gradient(var(--premium-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--premium-grid-color) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: gridMove 25s linear infinite;
}

@keyframes gridMove {
    0% { background-position: 0 0; }
    100% { background-position: 50px 50px; }
}

/* Gradient Orbs */
.gradient-orbs {
    background: 
        radial-gradient(circle at 20% 30%, var(--premium-accent) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, var(--premium-accent-secondary) 0%, transparent 50%);
    opacity: 0.03;
    filter: blur(60px);
}

/* Premium Particles */
.premium-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--premium-particle-color);
    border-radius: 50%;
    animation: premiumFloat 15s ease-in-out infinite;
    box-shadow: 0 0 15px var(--premium-particle-color);
}

@keyframes premiumFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0;
    }
    10%, 90% { opacity: 1; }
    50% { 
        transform: translate(calc(100px * var(--tx, 1)), calc(-80px * var(--ty, 1))) scale(1.8);
    }
}

/* Floating Shapes */
.floating-shape {
    position: absolute;
    opacity: 0.1;
    animation: shapeFloat 20s ease-in-out infinite;
}

.floating-triangle {
    width: 40px;
    height: 40px;
    background: var(--premium-accent);
    clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
}

.floating-circle {
    width: 30px;
    height: 30px;
    background: var(--premium-accent-secondary);
    border-radius: 50%;
}

.floating-square {
    width: 35px;
    height: 35px;
    background: var(--premium-accent-tertiary);
    transform: rotate(45deg);
}

.floating-hexagon {
    width: 40px;
    height: 40px;
    background: var(--premium-accent);
    clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
}

@keyframes shapeFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-30px) rotate(120deg); }
    66% { transform: translateY(15px) rotate(240deg); }
}

/* Premium Badge */
.premium-badge {
    background: var(--premium-card-bg);
    border: 1px solid var(--premium-card-border);
    backdrop-filter: blur(20px);
    color: var(--premium-accent);
}

.premium-pulse {
    background: var(--premium-accent);
    animation: premiumPulse 2s ease-in-out infinite;
    box-shadow: 0 0 10px var(--premium-accent);
}

@keyframes premiumPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.2); }
}

/* Typography */
.premium-title {
    background: linear-gradient(135deg, var(--premium-text-primary) 30%, var(--premium-accent) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    position: relative;
}

.premium-accent {
    background: linear-gradient(135deg, var(--premium-accent), var(--premium-accent-secondary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.premium-subtitle {
    color: var(--premium-text-secondary);
    font-weight: 300;
    letter-spacing: 0.5px;
}

.premium-text-primary { color: var(--premium-text-primary); }
.premium-text-secondary { color: var(--premium-text-secondary); }
.premium-text-muted { color: var(--premium-text-muted); }
.premium-accent-text { color: var(--premium-accent); }

/* Premium Divider */
.premium-divider {
    background: linear-gradient(90deg, transparent, var(--premium-accent), transparent);
    height: 1px;
    position: relative;
}

.premium-diamond {
    width: 12px;
    height: 12px;
    background: var(--premium-accent);
    transform: rotate(45deg);
    position: relative;
    box-shadow: 0 0 20px var(--premium-accent);
}

.diamond-inner {
    position: absolute;
    top: 2px;
    left: 2px;
    right: 2px;
    bottom: 2px;
    background: var(--premium-bg-start);
    transform: rotate(45deg);
}

.premium-divider-horizontal {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--premium-divider), transparent);
    position: relative;
}

.premium-divider-horizontal::before {
    content: '';
    position: absolute;
    top: -1px;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--premium-accent), transparent);
    opacity: 0.3;
}

/* Premium Card */
.premium-card {
    position: relative;
    background: var(--premium-card-bg);
    border: 1px solid var(--premium-card-border);
    border-radius: 24px;
    backdrop-filter: blur(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.premium-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--premium-accent) 0%, transparent 50%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.premium-card:hover::before {
    opacity: 0.05;
}

.premium-card:hover {
    transform: translateY(-8px);
    border-color: var(--premium-accent);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.1),
        0 0 80px var(--premium-card-glow);
}

.card-glow {
    position: absolute;
    inset: -2px;
    background: linear-gradient(45deg, var(--premium-accent), var(--premium-accent-secondary), var(--premium-accent-tertiary));
    border-radius: 24px;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -1;
}

.premium-card:hover .card-glow {
    opacity: 0.1;
}

.card-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.8s ease;
}

.premium-card:hover .card-shine {
    left: 100%;
}

/* Premium Avatar */
.premium-avatar {
    position: relative;
    width: 80px;
    height: 80px;
    background: var(--premium-icon-bg);
    border: 2px solid var(--premium-card-border);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s ease;
}

.premium-avatar:hover {
    border-color: var(--premium-accent);
    transform: scale(1.05) rotate(5deg);
}

.avatar-glow {
    position: absolute;
    inset: -5px;
    background: var(--premium-accent);
    border-radius: 20px;
    opacity: 0;
    filter: blur(10px);
    transition: opacity 0.4s ease;
}

.premium-avatar:hover .avatar-glow {
    opacity: 0.3;
}

.avatar-shine {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.premium-avatar:hover .avatar-shine {
    opacity: 1;
}

/* Premium Tags */
.premium-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--premium-icon-bg);
    border: 1px solid var(--premium-card-border);
    border-radius: 12px;
    color: var(--premium-accent);
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.premium-tag:hover {
    border-color: var(--premium-accent);
    box-shadow: 0 0 20px var(--premium-card-glow);
    transform: translateY(-2px);
}

/* Premium Stats Grid */
.premium-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.premium-stat-card {
    position: relative;
    background: var(--premium-card-bg);
    border: 1px solid var(--premium-card-border);
    border-radius: 20px;
    padding: 2rem;
    backdrop-filter: blur(20px);
    transition: all 0.4s ease;
    opacity: 0;
    animation: slideUpFade 0.6s ease-out forwards;
    animation-play-state: paused;
}

.premium-stat-card:hover {
    transform: translateY(-6px);
    border-color: var(--premium-accent);
    box-shadow: 0 15px 40px var(--premium-card-glow);
}

.stat-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--premium-accent), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 20px;
}

.premium-stat-card:hover .stat-glow {
    opacity: 0.05;
}

.stat-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.stat-icon-wrapper {
    width: 64px;
    height: 64px;
    background: var(--premium-icon-bg);
    border: 2px solid var(--premium-card-border);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--premium-accent);
    transition: all 0.4s ease;
}

.premium-stat-card:hover .stat-icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    border-color: var(--premium-accent);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--premium-text-secondary);
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Premium Icon Box */
.premium-icon-box {
    width: 64px;
    height: 64px;
    background: var(--premium-icon-bg);
    border: 2px solid var(--premium-card-border);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--premium-accent);
    transition: all 0.3s ease;
}

.premium-icon-box:hover {
    border-color: var(--premium-accent);
    transform: scale(1.05);
}

.premium-icon {
    color: var(--premium-accent);
}

/* Premium Skills Grid */
.premium-skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
}

.premium-skill-chip {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.skill-chip-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--premium-accent), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.premium-skill-chip:hover .skill-chip-glow {
    opacity: 0.1;
}

.skill-chip-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    background: var(--premium-icon-bg);
    border: 1px solid var(--premium-card-border);
    border-radius: 12px;
    color: var(--premium-text-secondary);
    font-weight: 600;
    transition: all 0.3s ease;
}

.premium-skill-chip:hover .skill-chip-content {
    border-color: var(--premium-accent);
    color: var(--premium-text-primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px var(--premium-card-glow);
}

.skill-dot {
    width: 8px;
    height: 8px;
    background: var(--premium-accent);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--premium-accent);
}

/* Premium Buttons */
.premium-btn-primary {
    position: relative;
    padding: 1.25rem 2rem;
    font-weight: 700;
    font-size: 1rem;
    background: linear-gradient(135deg, var(--premium-accent), var(--premium-accent-secondary));
    color: white;
    border: none;
    border-radius: 16px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    width: 100%;
}

.premium-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.2),
        0 0 60px var(--premium-card-glow);
}

.btn-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.premium-btn-primary:hover .btn-shine {
    left: 100%;
}

.premium-actions-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.premium-btn-secondary {
    position: relative;
    padding: 1rem 1.5rem;
    font-weight: 700;
    font-size: 0.9375rem;
    background: var(--premium-card-bg);
    border: 2px solid var(--premium-card-border);
    color: var(--premium-accent);
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.premium-btn-secondary:hover {
    background: var(--premium-icon-bg);
    border-color: var(--premium-accent);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--premium-card-glow);
}

.premium-btn-outline {
    padding: 1rem 1.5rem;
    font-weight: 700;
    font-size: 0.9375rem;
    background: transparent;
    border: 2px solid var(--premium-card-border);
    color: var(--premium-text-secondary);
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.premium-btn-outline:hover {
    border-color: var(--premium-accent);
    color: var(--premium-text-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--premium-card-glow);
}

/* Premium Data Stream */
.premium-data-stream {
    position: relative;
    height: 2px;
    background: var(--premium-card-bg);
    border-radius: 999px;
    overflow: hidden;
}

.stream-line {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, var(--premium-accent), transparent);
    animation: streamFlow 3s ease-in-out infinite;
}

.stream-pulse {
    position: absolute;
    width: 100px;
    height: 100%;
    background: var(--premium-accent);
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
@keyframes slideUpFade {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-down {
    animation: slideDown 0.8s ease-out;
}

/* Prose Premium */
.prose-premium p {
    margin: 0;
    line-height: 1.7;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .premium-stats-grid {
        grid-template-columns: 1fr;
    }
    
    .premium-skills-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .theme2-about-premium {
        padding: 4rem 0;
    }
    
    .premium-title {
        font-size: 3rem;
    }
    
    .premium-card {
        padding: 1.5rem;
    }
    
    .premium-avatar {
        width: 64px;
        height: 64px;
    }
    
    .premium-actions-grid {
        grid-template-columns: 1fr;
    }
    
    .premium-btn-primary,
    .premium-btn-secondary,
    .premium-btn-outline {
        padding: 1rem 1.25rem;
        font-size: 0.9rem;
    }
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
}

/* Selection Styles */
::selection {
    background: var(--premium-accent);
    color: white;
}

::-moz-selection {
    background: var(--premium-accent);
    color: white;
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Focus States */
a:focus-visible,
button:focus-visible {
    outline: 2px solid var(--premium-accent);
    outline-offset: 2px;
}
</style>