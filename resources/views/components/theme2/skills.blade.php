@props(['skills'])

<section id="skills" class="section-full relative overflow-hidden theme2-skills-v2">
    
    <!-- Animated Background -->
    <div class="absolute inset-0 -z-10">
        <div class="skills-grid-bg"></div>
        <div class="skills-gradient-orbs"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6 skills-badge">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm font-semibold uppercase tracking-wider">Expertise</span>
            </div>
            
            <h2 class="text-5xl md:text-6xl font-black mb-6 skills-title">
                Technical Skills
            </h2>
            
            <p class="text-lg md:text-xl max-w-3xl mx-auto skills-description mb-8">
                Technologies and tools I use to build exceptional digital experiences
            </p>
            
            <div class="flex items-center justify-center gap-4">
                <div class="h-px flex-1 max-w-24 skills-divider"></div>
                <div class="w-2.5 h-2.5 rounded-full skills-dot"></div>
                <div class="h-px flex-1 max-w-24 skills-divider"></div>
            </div>
        </div>

        @if($skills->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl mb-6 skills-empty-icon">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-3 skills-empty-title">No Skills Added Yet</h3>
                <p class="text-lg skills-empty-text">Skills will appear here once added through the admin panel.</p>
            </div>
        @else
            @php
                $categories = [
                    'frontend' => [
                        'title' => 'Frontend Development',
                        'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                        'color' => 'blue'
                    ],
                    'backend' => [
                        'title' => 'Backend Development',
                        'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                        'color' => 'green'
                    ],
                    'database' => [
                        'title' => 'Database & Storage',
                        'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                        'color' => 'purple'
                    ],
                    'tools' => [
                        'title' => 'Tools & Technologies',
                        'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
                        'color' => 'orange'
                    ],
                ];
                
                $groupedSkills = $skills->groupBy('category');
            @endphp

            <!-- Categories -->
            <div class="space-y-20">
                @foreach($categories as $categoryKey => $categoryData)
                    @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                        <div class="category-section animate-slide-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                            
                            <!-- Category Header -->
                            <div class="flex items-center gap-4 mb-10">
                                <div class="category-icon-wrapper category-{{ $categoryData['color'] }}">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $categoryData['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="category-title">{{ $categoryData['title'] }}</h3>
                                    <p class="category-count">
                                        {{ $groupedSkills[$categoryKey]->count() }} 
                                        {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Skills Grid -->
                            <div class="skills-grid">
                                @foreach($groupedSkills[$categoryKey] as $index => $skill)
                                    <div class="skill-card" style="animation-delay: {{ $index * 0.05 }}s">
                                        <div class="skill-card-inner">
                                            
                                            <!-- Glow Effect -->
                                            <div class="skill-glow"></div>
                                            
                                            <!-- Icon -->
                                            <div class="skill-icon-container">
                                                @if($skill->url && filter_var($skill->url, FILTER_VALIDATE_URL))
                                                    <img src="{{ $skill->url }}" 
                                                         alt="{{ $skill->name }}" 
                                                         class="skill-icon-image"
                                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                @endif
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            <!-- Hover Border -->
                                            <div class="skill-border"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
/* ============================================
   THEME 2 SKILLS - DUAL THEME SUPPORT
   ============================================ */

/* Light Theme Variables */
[data-theme="light"] {
    --skills-bg: #f8fafc;
    --skills-text-primary: #0f172a;
    --skills-text-secondary: #475569;
    --skills-text-muted: #64748b;
    --skills-card-bg: #ffffff;
    --skills-card-border: #e2e8f0;
    --skills-card-hover-border: #3b82f6;
    --skills-accent: #3b82f6;
    --skills-accent-secondary: #8b5cf6;
    --skills-grid-color: rgba(59, 130, 246, 0.03);
    --skills-glow-color: rgba(59, 130, 246, 0.15);
    --skills-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    --skills-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    
    --skills-blue: #3b82f6;
    --skills-green: #10b981;
    --skills-purple: #8b5cf6;
    --skills-orange: #f59e0b;
}

/* Dark Theme Variables */
[data-theme="dark"] {
    --skills-bg: #0f172a;
    --skills-text-primary: #f1f5f9;
    --skills-text-secondary: #cbd5e1;
    --skills-text-muted: #94a3b8;
    --skills-card-bg: #1e293b;
    --skills-card-border: #334155;
    --skills-card-hover-border: #60a5fa;
    --skills-accent: #60a5fa;
    --skills-accent-secondary: #a78bfa;
    --skills-grid-color: rgba(96, 165, 250, 0.05);
    --skills-glow-color: rgba(96, 165, 250, 0.2);
    --skills-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
    --skills-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
    
    --skills-blue: #60a5fa;
    --skills-green: #34d399;
    --skills-purple: #a78bfa;
    --skills-orange: #fbbf24;
}

.theme2-skills-v2 {
    background: var(--skills-bg);
    padding: 6rem 0;
    position: relative;
}

/* Background */
.skills-grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
        radial-gradient(circle at 2px 2px, var(--skills-grid-color) 1px, transparent 0);
    background-size: 40px 40px;
}

.skills-gradient-orbs {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 15% 20%, var(--skills-accent) 0%, transparent 40%),
        radial-gradient(circle at 85% 80%, var(--skills-accent-secondary) 0%, transparent 40%);
    opacity: 0.05;
    filter: blur(80px);
}

/* Section Header */
.skills-badge {
    background: var(--skills-card-bg);
    border: 2px solid var(--skills-card-border);
    color: var(--skills-accent);
    backdrop-filter: blur(10px);
}

.skills-title {
    color: var(--skills-text-primary);
    line-height: 1.1;
}

.skills-description {
    color: var(--skills-text-secondary);
}

.skills-divider {
    background: linear-gradient(90deg, transparent, var(--skills-accent), transparent);
    height: 2px;
}

.skills-dot {
    background: var(--skills-accent);
    box-shadow: 0 0 10px var(--skills-accent);
}

/* Empty State */
.skills-empty-icon {
    background: var(--skills-card-bg);
    border: 2px solid var(--skills-card-border);
    color: var(--skills-text-muted);
}

.skills-empty-title {
    color: var(--skills-text-primary);
}

.skills-empty-text {
    color: var(--skills-text-muted);
}

/* Category Section */
.category-section {
    opacity: 0;
    animation: slideUp 0.6s ease-out forwards;
}

/* Category Header */
.category-icon-wrapper {
    width: 64px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
    border: 2px solid;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
}

.category-icon-wrapper::before {
    content: '';
    position: absolute;
    inset: 0;
    opacity: 0.1;
    transition: opacity 0.3s;
}

.category-icon-wrapper:hover::before {
    opacity: 0.2;
}

.category-blue {
    color: var(--skills-blue);
    border-color: var(--skills-blue);
    background: color-mix(in srgb, var(--skills-blue) 10%, transparent);
}

.category-blue::before {
    background: var(--skills-blue);
}

.category-green {
    color: var(--skills-green);
    border-color: var(--skills-green);
    background: color-mix(in srgb, var(--skills-green) 10%, transparent);
}

.category-green::before {
    background: var(--skills-green);
}

.category-purple {
    color: var(--skills-purple);
    border-color: var(--skills-purple);
    background: color-mix(in srgb, var(--skills-purple) 10%, transparent);
}

.category-purple::before {
    background: var(--skills-purple);
}

.category-orange {
    color: var(--skills-orange);
    border-color: var(--skills-orange);
    background: color-mix(in srgb, var(--skills-orange) 10%, transparent);
}

.category-orange::before {
    background: var(--skills-orange);
}

.category-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--skills-text-primary);
    line-height: 1.2;
}

.category-count {
    color: var(--skills-text-muted);
    font-weight: 500;
}

/* Skills Grid */
.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 1.5rem;
}

/* Skill Card */
.skill-card {
    opacity: 0;
    animation: fadeInScale 0.5s ease-out forwards;
}

.skill-card-inner {
    position: relative;
    height: 100%;
    background: var(--skills-card-bg);
    border: 2px solid var(--skills-card-border);
    border-radius: 20px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.skill-card:hover .skill-card-inner {
    transform: translateY(-8px);
    border-color: var(--skills-card-hover-border);
    box-shadow: var(--skills-shadow-hover);
}

/* Glow Effect */
.skill-glow {
    position: absolute;
    inset: -50%;
    background: conic-gradient(
        from 0deg at 50% 50%,
        transparent 0deg,
        var(--skills-glow-color) 90deg,
        transparent 180deg
    );
    opacity: 0;
    transition: opacity 0.4s, transform 0.4s;
    animation: rotate 4s linear infinite;
    animation-play-state: paused;
}

.skill-card:hover .skill-glow {
    opacity: 1;
    animation-play-state: running;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Icon Container */
.skill-icon-container {
    width: 64px;
    height: 64px;
    position: relative;
    z-index: 1;
}

.skill-icon-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s;
}

.skill-card:hover .skill-icon-image {
    transform: scale(1.15) rotate(5deg);
}

.skill-icon-fallback {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--skills-accent), var(--skills-accent-secondary));
    color: white;
}

/* Content */
.skill-content {
    text-align: center;
    z-index: 1;
}

.skill-name {
    font-size: 1rem;
    font-weight: 700;
    color: var(--skills-text-primary);
    margin-bottom: 0.25rem;
}

.skill-level {
    font-size: 0.75rem;
    color: var(--skills-text-muted);
    font-weight: 500;
}

/* Hover Border */
.skill-border {
    position: absolute;
    inset: -2px;
    border-radius: 20px;
    padding: 2px;
    background: linear-gradient(45deg, var(--skills-accent), var(--skills-accent-secondary));
    -webkit-mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.3s;
}

.skill-card:hover .skill-border {
    opacity: 1;
}

/* Animations */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

/* Responsive */
@media (max-width: 768px) {
    .theme2-skills-v2 {
        padding: 4rem 0;
    }
    
    .skills-title {
        font-size: 2.5rem;
    }
    
    .category-title {
        font-size: 1.5rem;
    }
    
    .skills-grid {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 1rem;
    }
    
    .skill-card-inner {
        padding: 1.25rem;
    }
    
    .skill-icon-container {
        width: 56px;
        height: 56px;
    }
}
</style>