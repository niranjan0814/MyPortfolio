@props(['aboutContent'])

<section id="about"
    class="section-full relative overflow-hidden pt-12 pb-16 theme2-about">
    
    <!-- Cyber Grid Background -->
    <div class="cyber-grid absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-field absolute inset-0 -z-10"></div>

    <div class="container mx-auto max-w-6xl fade-in relative z-10 px-4">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 mb-4 cyber-badge">
                <div class="w-2 h-2 rounded-full pulse-dot"></div>
                <span class="text-sm font-medium uppercase tracking-wider">Get to know me</span>
            </div>
            
            <h2 class="text-5xl md:text-6xl font-black mb-4 neon-text">
                About Me
            </h2>
            
            <div class="flex items-center justify-center gap-4">
                <div class="h-px w-20 cyber-line"></div>
                <div class="w-3 h-3 rotate-45 cyber-diamond"></div>
                <div class="h-px w-20 cyber-line"></div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            
            <!-- LEFT: Profile Info Card -->
            <div class="space-y-6">
                <!-- Name & Title Card -->
                <div class="cyber-card p-8 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 cyber-corner"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 rounded-xl cyber-icon-box flex items-center justify-center">
                                <svg class="w-8 h-8 about-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold about-primary-text">
                                    {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                                </h3>
                                <p class="text-sm about-muted-text uppercase tracking-wider">
                                    {{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }} • GPA {{ $aboutContent['profile_gpa_badge'] ?? '3.79' }}
                                </p>
                            </div>
                        </div>

                        <div class="cyber-divider mb-6"></div>

                        <p class="text-lg leading-relaxed about-secondary-text">
                            {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                        </p>
                    </div>
                </div>

                <!-- Quick Stats Grid -->
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
                            <div class="cyber-stat-card p-6 group hover:-translate-y-2 transition-all duration-300">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg cyber-icon-box flex items-center justify-center flex-shrink-0">
                                        @if($stat['icon'])
                                            <img src="{{ $stat['icon'] }}" alt="{{ $stat['label'] }}" class="w-6 h-6" />
                                        @else
                                            <svg class="w-6 h-6 about-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-3xl font-black mb-1 neon-text">{{ $stat['count'] }}</h4>
                                        <p class="text-sm font-medium about-secondary-text">{{ $stat['label'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- RIGHT: Skills & Actions -->
            <div class="space-y-6">
                
                <!-- Soft Skills Card -->
                @if (!empty($aboutContent['soft_skills']))
                    <div class="cyber-card p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-lg cyber-icon-box flex items-center justify-center">
                                <svg class="w-6 h-6 about-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold about-primary-text">Soft Skills</h4>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                <div class="skill-tag group">
                                    <div class="flex items-center gap-2">
                                        @if($iconUrl)
                                            <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="w-5 h-5" />
                                        @endif
                                        <span class="text-sm font-semibold">{{ $skill }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

               

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Contact Button -->
                    <a href="#contact" class="cyber-btn-primary group flex-1">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}
                        </span>
                        <div class="cyber-btn-glow"></div>
                    </a>

                    <!-- CV Download -->
                    @if($aboutContent['user']->hasCv())
                        <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" 
                           class="cyber-btn-secondary group flex-1" download>
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                Download CV
                            </span>
                        </a>

                        <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}" 
                           target="_blank" class="cyber-btn-outline group flex-1">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                View CV
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Data Stream Decoration -->
        <div class="data-stream-container mt-16">
            <div class="data-stream"></div>
        </div>
    </div>
</section>

<!-- Particle Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const particleField = document.querySelector('.particle-field');
    if (!particleField) return;

    const particleCount = 30;
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'cyber-particle';
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.animationDelay = `${Math.random() * 10}s`;
        particle.style.animationDuration = `${8 + Math.random() * 12}s`;
        particleField.appendChild(particle);
    }
});
</script>

<style>
/* ===================================
   THEME 2 ABOUT - DUAL THEME SUPPORT
   =================================== */

:root {
    /* Dark Theme (Default) */
    --about-bg-start: #0a0e27;
    --about-bg-end: #1a1f3a;
    --about-text-primary: #ffffff;
    --about-text-secondary: #cbd5e1;
    --about-text-muted: #94a3b8;
    --about-card-bg: rgba(26, 31, 58, 0.6);
    --about-card-border: rgba(0, 217, 255, 0.2);
    --about-neon-primary: #00d9ff;
    --about-neon-secondary: #b537ff;
    --about-neon-accent: #ff006e;
    --about-grid-color: rgba(0, 217, 255, 0.05);
    --about-particle-color: rgba(0, 217, 255, 0.3);
    --about-icon-bg: rgba(0, 217, 255, 0.15);
    --about-icon-color: #00d9ff;
    --about-divider: rgba(0, 217, 255, 0.3);
    --about-btn-primary-bg: #00d9ff;
    --about-btn-primary-text: #0a0e27;
    --about-btn-secondary-border: #00d9ff;
    --about-btn-secondary-text: #00d9ff;
    --about-skill-bg: rgba(0, 217, 255, 0.1);
    --about-skill-border: rgba(0, 217, 255, 0.3);
    --about-hexagon-bg: rgba(0, 217, 255, 0.1);
}

/* Light Theme Override */
[data-theme="light"] {
    --about-bg-start: #f8fafc;
    --about-bg-end: #e2e8f0;
    --about-text-primary: #1e293b;
    --about-text-secondary: #475569;
    --about-text-muted: #64748b;
    --about-card-bg: rgba(255, 255, 255, 0.8);
    --about-card-border: rgba(14, 165, 233, 0.3);
    --about-neon-primary: #0ea5e9;
    --about-neon-secondary: #8b5cf6;
    --about-neon-accent: #ec4899;
    --about-grid-color: rgba(14, 165, 233, 0.08);
    --about-particle-color: rgba(14, 165, 233, 0.4);
    --about-icon-bg: rgba(14, 165, 233, 0.15);
    --about-icon-color: #0ea5e9;
    --about-divider: rgba(14, 165, 233, 0.3);
    --about-btn-primary-bg: #0ea5e9;
    --about-btn-primary-text: #ffffff;
    --about-btn-secondary-border: #0ea5e9;
    --about-btn-secondary-text: #0ea5e9;
    --about-skill-bg: rgba(14, 165, 233, 0.12);
    --about-skill-border: rgba(14, 165, 233, 0.4);
    --about-hexagon-bg: rgba(14, 165, 233, 0.15);
}

.theme2-about {
    background: linear-gradient(135deg, var(--about-bg-start) 0%, var(--about-bg-end) 100%);
    position: relative;
}

/* Grid Background */
.cyber-grid {
    background-image: 
        linear-gradient(var(--about-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--about-grid-color) 1px, transparent 1px);
    background-size: 40px 40px;
}

/* Cyber Badge */
.cyber-badge {
    background: var(--about-icon-bg);
    border: 1px solid var(--about-card-border);
    padding: 8px 20px;
    border-radius: 9999px;
    backdrop-filter: blur(10px);
    color: var(--about-neon-primary);
}

.pulse-dot {
    background: var(--about-neon-primary);
    animation: pulse 2s ease-in-out infinite;
    box-shadow: 0 0 10px var(--about-neon-primary);
}

/* Text Styles */
.neon-text {
    background: linear-gradient(90deg, var(--about-neon-primary), var(--about-neon-secondary), var(--about-neon-accent));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: neonGlow 3s ease-in-out infinite;
}

.about-primary-text {
    color: var(--about-text-primary);
}

.about-secondary-text {
    color: var(--about-text-secondary);
}

.about-muted-text {
    color: var(--about-text-muted);
}

/* Dividers */
.cyber-line {
    background: linear-gradient(90deg, transparent, var(--about-neon-primary), transparent);
}

.cyber-diamond {
    border: 2px solid var(--about-neon-primary);
    box-shadow: 0 0 10px var(--about-neon-primary);
}

.cyber-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--about-divider), transparent);
}

/* Cards */
.cyber-card {
    background: var(--about-card-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 16px;
    backdrop-filter: blur(20px);
    position: relative;
    transition: all 0.3s ease;
}

.cyber-card:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 0 30px var(--about-particle-color);
}

.cyber-corner {
    background: linear-gradient(135deg, var(--about-neon-primary), transparent);
    opacity: 0.1;
    transition: opacity 0.3s ease;
}

.cyber-card:hover .cyber-corner {
    opacity: 0.2;
}

/* Icon Box */
.cyber-icon-box {
    background: var(--about-icon-bg);
    border: 2px solid var(--about-card-border);
    transition: all 0.3s ease;
}

.about-icon {
    color: var(--about-icon-color);
}

/* Stat Cards */
.cyber-stat-card {
    background: var(--about-card-bg);
    border: 2px solid var(--about-card-border);
    border-radius: 12px;
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
}

.cyber-stat-card:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 10px 30px var(--about-particle-color);
}

/* Skill Tags */
.skill-tag {
    background: var(--about-skill-bg);
    border: 1px solid var(--about-skill-border);
    padding: 10px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
    color: var(--about-text-secondary);
}

.skill-tag:hover {
    border-color: var(--about-neon-primary);
    box-shadow: 0 0 15px var(--about-particle-color);
    transform: translateY(-2px);
}

/* Hexagon Strengths */
.hexagon-strength {
    background: var(--about-hexagon-bg);
    clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
    padding: 20px 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    min-height: 100px;
}

.hexagon-strength:hover {
    background: var(--about-neon-primary);
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 0 20px var(--about-neon-primary);
}

.hexagon-strength:hover .about-icon,
.hexagon-strength:hover .about-secondary-text {
    color: var(--about-btn-primary-text);
}

/* Buttons */
.cyber-btn-primary {
    position: relative;
    padding: 14px 32px;
    font-weight: 700;
    background: var(--about-btn-primary-bg);
    color: var(--about-btn-primary-text);
    border-radius: 8px;
    clip-path: polygon(8% 0%, 100% 0%, 92% 100%, 0% 100%);
    transition: all 0.3s ease;
    overflow: hidden;
}

.cyber-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px var(--about-particle-color);
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
    padding: 14px 32px;
    font-weight: 700;
    background: transparent;
    border: 2px solid var(--about-btn-secondary-border);
    color: var(--about-btn-secondary-text);
    border-radius: 8px;
    clip-path: polygon(8% 0%, 100% 0%, 92% 100%, 0% 100%);
    transition: all 0.3s ease;
}

.cyber-btn-secondary:hover {
    background: var(--about-icon-bg);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--about-particle-color);
}

.cyber-btn-outline {
    padding: 14px 32px;
    font-weight: 700;
    background: var(--about-card-bg);
    border: 2px solid var(--about-card-border);
    color: var(--about-text-secondary);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.cyber-btn-outline:hover {
    border-color: var(--about-neon-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--about-particle-color);
}

/* Particles */
.particle-field {
    pointer-events: none;
}

.cyber-particle {
    position: absolute;
    width: 3px;
    height: 3px;
    background: var(--about-particle-color);
    border-radius: 50%;
    animation: particleFloat 10s ease-in-out infinite;
    box-shadow: 0 0 10px var(--about-particle-color);
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0;
    }
    10%, 90% {
        opacity: 1;
    }
    50% { 
        transform: translate(var(--tx, 100px), var(--ty, -100px)) scale(1.5);
    }
}

/* Data Stream */
.data-stream-container {
    height: 2px;
    background: var(--about-card-bg);
    border-radius: 999px;
    overflow: hidden;
}

.data-stream {
    height: 100%;
    width: 30%;
    background: linear-gradient(90deg, transparent, var(--about-neon-primary), transparent);
    animation: streamFlow 3s ease-in-out infinite;
}

@keyframes streamFlow {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(400%); }
}

@keyframes neonGlow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

/* Responsive */
@media (max-width: 768px) {
    .neon-text {
        font-size: 2.5rem;
    }
}
</style>