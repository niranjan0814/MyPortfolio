@props(['aboutContent'])

<section id="about" class="section-full relative overflow-hidden theme2-about-enhanced">
    
    <!-- Cyber Grid Background -->
    <div class="cyber-grid absolute inset-0 -z-10"></div>
    
    <!-- Floating Orbs -->
    <div class="orb-container absolute inset-0 -z-10 pointer-events-none"></div>
    
    <!-- Floating Particles -->
    <div class="particle-field absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6 py-20">
        
        <!-- Section Header -->
        <div class="text-center mb-20 animate-fade-in">
           
            
            <h2 class="text-5xl md:text-6xl lg:text-7xl font-black mb-6 neon-text leading-tight">
                About Me
            </h2>
            
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="h-px flex-1 max-w-32 cyber-divider-line"></div>
                <div class="w-3 h-3 rotate-45 cyber-diamond"></div>
                <div class="h-px flex-1 max-w-32 cyber-divider-line"></div>
            </div>
            
            
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-12 gap-8 mb-16">
            
            <!-- LEFT: Profile Card - 7 columns -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Main Profile Card -->
                <div class="cyber-card-enhanced group">
                    <div class="cyber-corner-glow"></div>
                    <div class="cyber-shine"></div>
                    
                    <div class="relative z-10">
                        <!-- Profile Header -->
                        <div class="flex items-start gap-6 mb-8">
                            <div class="cyber-avatar-box">
                                <div class="avatar-glow"></div>
                                <svg class="w-12 h-12 text-primary relative z-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-3xl md:text-4xl font-black text-primary mb-2">
                                    {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                                </h3>
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="credential-badge">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                        {{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}
                                    </span>
                                    <span class="credential-badge">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        GPA {{ $aboutContent['profile_gpa_badge'] ?? '3.79' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="cyber-divider-horizontal mb-6"></div>

                        <!-- Description -->
                        <div class="prose-custom">
                            <p class="text-lg leading-relaxed text-secondary">
                                {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating cutting-edge solutions.' !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                @php
                    $stats = [
                        'projects' => ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label'], 'icon' => $aboutContent['stats_icon_urls']['projects'] ?? null],
                        'technologies' => ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label'], 'icon' => $aboutContent['stats_icon_urls']['technologies'] ?? null],
                        'team' => ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label'], 'icon' => $aboutContent['stats_icon_urls']['team'] ?? null],
                        'problem' => ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label'], 'icon' => $aboutContent['stats_icon_urls']['problem'] ?? null],
                    ];
                @endphp

                <div class="grid grid-cols-2 gap-4">
                    @foreach($stats as $key => $stat)
                        @if($stat['count'] && $stat['label'])
                            <div class="stat-card-enhanced group" style="animation-delay: {{ $loop->index * 0.1 }}s">
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
                                    <div class="stat-number neon-text">{{ $stat['count'] }}</div>
                                    <div class="stat-label">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- RIGHT: Skills & Actions - 5 columns -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Soft Skills Card -->
                @if (!empty($aboutContent['soft_skills']))
                    <div class="cyber-card-enhanced group">
                        <div class="cyber-shine"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="skill-icon-box">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-black text-primary">Soft Skills</h4>
                            </div>

                            <div class="cyber-divider-horizontal mb-6"></div>

                            <div class="grid grid-cols-2 gap-3">
                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    <div class="skill-chip group">
                                        <div class="skill-chip-glow"></div>
                                        <div class="skill-chip-content">
                                            @if($iconUrl)
                                                <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="w-5 h-5" />
                                            @else
                                                <div class="w-2 h-2 rounded-full bg-neon"></div>
                                            @endif
                                            <span class="text-sm font-semibold">{{ $skill }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- CTA Buttons -->
                <div class="space-y-3">
                    <!-- Contact Button -->
                    <a href="#contact" class="cyber-btn-primary group w-full">
                        <span class="relative z-10 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}
                        </span>
                        <div class="cyber-btn-glow"></div>
                    </a>

                    <!-- CV Buttons -->
                    @if($aboutContent['user']->hasCv())
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" 
                               class="cyber-btn-secondary group" download>
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="hidden sm:inline">Download</span>
                                </span>
                            </a>

                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}" 
                               target="_blank" class="cyber-btn-secondary group">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="hidden sm:inline">View CV</span>
                                </span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

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
   ENHANCED THEME 2 ABOUT SECTION
   =================================== */

:root {
    /* Dark Theme (Default) */
    --about-bg-start: #0a0e27;
    --about-bg-mid: #1a1f3a;
    --about-bg-end: #0f1729;
    --about-text-primary: #ffffff;
    --about-text-secondary: #cbd5e1;
    --about-text-muted: #94a3b8;
    --about-neon-primary: #00d9ff;
    --about-neon-secondary: #b537ff;
    --about-neon-accent: #ff006e;
    --about-grid-color: rgba(0, 217, 255, 0.05);
    --about-orb-color: rgba(0, 217, 255, 0.15);
    --about-card-bg: rgba(26, 31, 58, 0.6);
    --about-card-border: rgba(0, 217, 255, 0.2);
    --about-icon-bg: rgba(0, 217, 255, 0.15);
    --about-btn-bg: #00d9ff;
    --about-btn-text: #0a0e27;
}

/* Light Theme Override */
[data-theme="light"] {
    --about-bg-start: #f8fafc;
    --about-bg-mid: #e2e8f0;
    --about-bg-end: #cbd5e1;
    --about-text-primary: #1e293b;
    --about-text-secondary: #475569;
    --about-text-muted: #64748b;
    --about-neon-primary: #0ea5e9;
    --about-neon-secondary: #8b5cf6;
    --about-neon-accent: #ec4899;
    --about-grid-color: rgba(14, 165, 233, 0.08);
    --about-orb-color: rgba(14, 165, 233, 0.12);
    --about-card-bg: rgba(255, 255, 255, 0.8);
    --about-card-border: rgba(14, 165, 233, 0.3);
    --about-icon-bg: rgba(14, 165, 233, 0.15);
    --about-btn-bg: #0ea5e9;
    --about-btn-text: #ffffff;
}

.theme2-about-enhanced {
    background: linear-gradient(135deg, var(--about-bg-start) 0%, var(--about-bg-mid) 50%, var(--about-bg-end) 100%);
    position: relative;
    min-height: 100vh;
}

/* Grid Background */
.cyber-grid {
    background-image:
        linear-gradient(var(--about-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--about-grid-color) 1px, transparent 1px);
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
    background: radial-gradient(circle, var(--about-orb-color) 0%, transparent 70%);
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
    background: var(--about-neon-primary);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--about-neon-primary);
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

/* Cyber Badge */
.cyber-badge {
    background: var(--about-icon-bg);
    border: 2px solid var(--about-card-border);
    padding: 0.75rem 1.5rem;
    border-radius: 9999px;
    backdrop-filter: blur(10px);
    color: var(--about-neon-primary);
}

.pulse-dot {
    background: var(--about-neon-primary);
    animation: pulse 2s ease-in-out infinite;
    box-shadow: 0 0 12px var(--about-neon-primary);
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.2); }
}

/* Neon Text */
.neon-text {
    background: linear-gradient(90deg, var(--about-neon-primary), var(--about-neon-secondary), var(--about-neon-accent));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: neonGlow 3s ease-in-out infinite;
}

@keyframes neonGlow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

/* Text Colors */
.text-primary { color: var(--about-text-primary); }
.text-secondary { color: var(--about-text-secondary); }
.text-muted { color: var(--about-text-muted); }

/* Dividers */
.cyber-divider-line {
    background: linear-gradient(90deg, transparent, var(--about-neon-primary), transparent);
    height: 2px;
}

.cyber-diamond {
    background: var(--about-neon-primary);
    box-shadow: 0 0 15px var(--about-neon-primary);
}

.cyber-divider-horizontal {
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--about-card-border), transparent);
    margin: 1.5rem 0;
}

/* Enhanced Cards */
.cyber-card-enhanced {
    position: relative;
    background: var(--about-card-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 24px;
    padding: 2rem;
    backdrop-filter: blur(20px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.cyber-card-enhanced:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 20px 60px var(--about-orb-color);
    transform: translateY(-4px);
}

.cyber-corner-glow {
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, var(--about-neon-primary), transparent);
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

/* Avatar Box */
.cyber-avatar-box {
    position: relative;
    width: 80px;
    height: 80px;
    background: var(--about-icon-bg);
    border: 3px solid var(--about-card-border);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.cyber-avatar-box:hover {
    border-color: var(--about-neon-primary);
    transform: scale(1.05);
}

.avatar-glow {
    position: absolute;
    inset: -10px;
    background: var(--about-neon-primary);
    border-radius: 20px;
    opacity: 0;
    filter: blur(15px);
    transition: opacity 0.3s ease;
}

.cyber-avatar-box:hover .avatar-glow {
    opacity: 0.3;
}

/* Credential Badges */
.credential-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--about-icon-bg);
    border: 1px solid var(--about-card-border);
    border-radius: 9999px;
    color: var(--about-neon-primary);
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.credential-badge:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 0 15px var(--about-orb-color);
}

/* Stat Cards */
.stat-card-enhanced {
    position: relative;
    background: var(--about-card-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 20px;
    padding: 1.5rem;
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
    overflow: hidden;
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.stat-card-enhanced:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 15px 40px var(--about-orb-color);
    transform: translateY(-6px);
}

.stat-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--about-neon-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card-enhanced:hover .stat-glow {
    opacity: 0.05;
}

.stat-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.stat-icon-wrapper {
    width: 56px;
    height: 56px;
    background: var(--about-icon-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--about-neon-primary);
    transition: all 0.3s ease;
}

.stat-card-enhanced:hover .stat-icon-wrapper {
    transform: scale(1.1) rotate(5deg);
    border-color: var(--about-neon-primary);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--about-text-secondary);
    font-size: 0.875rem;
    font-weight: 600;
}

/* Skill Icon Box */
.skill-icon-box {
    width: 56px;
    height: 56px;
    background: var(--about-icon-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--about-neon-primary);
    flex-shrink: 0;
}

/* Skill Chips */
.skill-chip {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.skill-chip-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--about-neon-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.skill-chip:hover .skill-chip-glow {
    opacity: 0.1;
}

.skill-chip-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    background: var(--about-icon-bg);
    border: 1px solid var(--about-card-border);
    border-radius: 10px;
    color: var(--about-text-secondary);
    font-weight: 600;
    transition: all 0.3s ease;
}

.skill-chip:hover .skill-chip-content {
    border-color: var(--about-neon-primary);
    color: var(--about-text-primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--about-orb-color);
}

/* Buttons */
.cyber-btn-primary {
    position: relative;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1rem;
    background: var(--about-btn-bg);
    color: var(--about-btn-text);
    border: none;
    border-radius: 12px;
    clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
    transition: all 0.3s ease;
    overflow: hidden;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.cyber-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px var(--about-orb-color);
}

.cyber-btn-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s;
}

.cyber-btn-primary:hover .cyber-btn-glow {
    transform: translateX(100%);
}

.cyber-btn-secondary {
    position: relative;
    padding: 1rem 1.5rem;
    font-weight: 700;
    font-size: 0.9375rem;
    background: transparent;
    border: 2px solid var(--about-card-border);
    color: var(--about-neon-primary);
    border-radius: 12px;
    clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.cyber-btn-secondary:hover {
    background: var(--about-icon-bg);
    border-color: var(--about-neon-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--about-orb-color);
}

/* Data Stream */
.data-stream-wrapper {
    position: relative;
    height: 3px;
    background: var(--about-card-bg);
    border-radius: 999px;
    overflow: hidden;
    margin-top: 4rem;
}

.data-stream-line {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, var(--about-neon-primary), transparent);
    animation: streamFlow 3s ease-in-out infinite;
}

.data-stream-pulse {
    position: absolute;
    width: 100px;
    height: 100%;
    background: var(--about-neon-primary);
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
    animation: fadeInUp 0.8s ease-out;
}

/* Prose Custom */
.prose-custom p {
    margin: 0;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .cyber-avatar-box {
        width: 64px;
        height: 64px;
    }
    
    .cyber-avatar-box svg {
        width: 2rem;
        height: 2rem;
    }
    
    h2.neon-text {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .theme2-about-enhanced {
        padding: 4rem 0;
    }
    
    h2.neon-text {
        font-size: 2.5rem;
    }
    
    .cyber-card-enhanced {
        padding: 1.5rem;
    }
    
    .cyber-avatar-box {
        width: 56px;
        height: 56px;
    }
    
    .cyber-avatar-box svg {
        width: 1.75rem;
        height: 1.75rem;
    }
    
    .credential-badge {
        font-size: 0.75rem;
        padding: 0.375rem 0.75rem;
    }
    
    .stat-card-enhanced {
        padding: 1.25rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .stat-icon-wrapper {
        width: 48px;
        height: 48px;
    }
    
    .cyber-btn-primary,
    .cyber-btn-secondary {
        padding: 0.875rem 1.5rem;
        font-size: 0.875rem;
    }
    
    .skill-chip-content {
        padding: 0.625rem 0.875rem;
        font-size: 0.875rem;
    }
}

@media (max-width: 640px) {
    .grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .credential-badge span:not(.sm\:inline) {
        display: none;
    }
}

/* Loading Animation */
@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

/* Smooth Transitions */
* {
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}

/* Focus States for Accessibility */
a:focus-visible,
button:focus-visible {
    outline: 2px solid var(--about-neon-primary);
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .cyber-grid,
    .orb-container,
    .particle-field,
    .data-stream-wrapper {
        display: none;
    }
    
    .cyber-card-enhanced {
        border: 1px solid #000;
        box-shadow: none;
    }
}

/* High Contrast Mode Support */
@media (prefers-contrast: high) {
    .cyber-card-enhanced {
        border-width: 3px;
    }
    
    .cyber-btn-primary,
    .cyber-btn-secondary {
        border-width: 3px;
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
    
    .cyber-grid,
    .floating-orb,
    .cyber-particle,
    .data-stream-line,
    .data-stream-pulse {
        animation: none !important;
    }
}

/* Dark Mode Image Adjustment */
[data-theme="dark"] img {
    filter: brightness(0.9);
}

/* Selection Color */
::selection {
    background: var(--about-neon-primary);
    color: var(--about-btn-text);
}

::-moz-selection {
    background: var(--about-neon-primary);
    color: var(--about-btn-text);
}

/* Scrollbar Styling */
.cyber-card-enhanced::-webkit-scrollbar {
    width: 8px;
}

.cyber-card-enhanced::-webkit-scrollbar-track {
    background: var(--about-card-bg);
    border-radius: 4px;
}

.cyber-card-enhanced::-webkit-scrollbar-thumb {
    background: var(--about-neon-primary);
    border-radius: 4px;
}

.cyber-card-enhanced::-webkit-scrollbar-thumb:hover {
    background: var(--about-neon-secondary);
}

/* Glow Effect on Hover for Icons */
.stat-icon-wrapper svg,
.skill-icon-box svg,
.cyber-avatar-box svg {
    filter: drop-shadow(0 0 2px currentColor);
    transition: filter 0.3s ease;
}

.stat-card-enhanced:hover .stat-icon-wrapper svg,
.cyber-card-enhanced:hover .skill-icon-box svg,
.cyber-avatar-box:hover svg {
    filter: drop-shadow(0 0 8px currentColor);
}

/* Gradient Text Enhancement */
.neon-text {
    position: relative;
}

.neon-text::after {
    content: attr(data-text);
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
    filter: blur(15px);
    opacity: 0.5;
}

/* Card Shadow Enhancement */
.cyber-card-enhanced::before {
    content: '';
    position: absolute;
    inset: -2px;
    background: linear-gradient(45deg, var(--about-neon-primary), var(--about-neon-secondary), var(--about-neon-accent));
    border-radius: 24px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}

.cyber-card-enhanced:hover::before {
    opacity: 0.1;
}

/* Stat Card Number Gradient */
.stat-number.neon-text {
    background-size: 200% auto;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% center; }
    50% { background-position: 100% center; }
}

/* Button Ripple Effect */
.cyber-btn-primary::after,
.cyber-btn-secondary::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.cyber-btn-primary:active::after {
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
    opacity: 1;
    animation: ripple 0.6s ease-out;
}

@keyframes ripple {
    0% { transform: scale(0); opacity: 1; }
    100% { transform: scale(2); opacity: 0; }
}

/* Enhance Border Animation */
.cyber-card-enhanced,
.stat-card-enhanced,
.skill-chip-content {
    background-clip: padding-box;
}

/* Text Glow on Hover */
.cyber-card-enhanced:hover .text-primary,
.stat-card-enhanced:hover .stat-label {
    text-shadow: 0 0 10px var(--about-orb-color);
}

/* Icon Rotation on Hover */
.stat-icon-wrapper {
    transform-origin: center;
}

.stat-card-enhanced:hover .stat-icon-wrapper {
    animation: iconBounce 0.6s ease;
}

@keyframes iconBounce {
    0%, 100% { transform: scale(1) rotate(0deg); }
    25% { transform: scale(1.1) rotate(-5deg); }
    75% { transform: scale(1.1) rotate(5deg); }
}

/* Enhance Credential Badge Animation */
.credential-badge {
    position: relative;
    overflow: hidden;
}

.credential-badge::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.credential-badge:hover::before {
    left: 100%;
}

/* 3D Transform Effects */
.cyber-card-enhanced {
    transform-style: preserve-3d;
    perspective: 1000px;
}

.cyber-card-enhanced:hover {
    transform: translateY(-4px) rotateX(2deg);
}

/* Loading State */
.loading-skeleton {
    background: linear-gradient(90deg, var(--about-card-bg) 25%, var(--about-icon-bg) 50%, var(--about-card-bg) 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}
</style>