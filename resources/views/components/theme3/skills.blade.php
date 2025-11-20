@props(['skills'])

<section id="skills" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-skills">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">Technical</span>
                <span class="section-title-secondary">Arsenal</span>
            </h2>
            <div class="section-divider"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6" style="color: var(--text-secondary);">
                Technologies I work with to bring ideas to life
            </p>
        </div>

        @if($skills->isEmpty())
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3 class="empty-title">No Skills Added Yet</h3>
                <p class="empty-description">Skills will appear here once added through the admin panel.</p>
            </div>
        @else
            @php
                $categories = [
                    'frontend' => [
                        'title' => 'Frontend Development',
                        'icon' => 'https://img.icons8.com/?size=100&id=wRWcFHf3CbWQ&format=png&color=000000',
                        'is_image' => true,
                    ],
                    'backend' => [
                        'title' => 'Backend Development',
                        'icon' => 'https://img.icons8.com/?size=100&id=eD9kxQH6h53e&format=png&color=000000', 
                        'is_image' => true,
                    ],
                    'database' => [
                        'title' => 'Database & Storage',
                        'icon' => 'https://logo.svgcdn.com/devicon-plain/sqldeveloper-plain.png',
                        'is_image' => true,
                    ],
                    'tools' => [
                        'title' => 'Tools & Technologies',
                        'icon' => 'https://img.icons8.com/?size=100&id=46959&format=png&color=000000',
                        'is_image' => true,
                    ],
                ];
                
                $groupedSkills = $skills->groupBy('category');
            @endphp

            <!-- Categories Grid -->
            <div class="space-y-16">
                @foreach($categories as $categoryKey => $categoryData)
                    @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                        <div class="group">
                            <!-- Category Header -->
                            <div class="flex items-center gap-6 mb-12">
                                <div class="w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg transition-transform duration-300 glass-card"
                                     style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); border: 1px solid var(--border-light);">
                                    @if($categoryData['is_image'])
                                        <img src="{{ $categoryData['icon'] }}" alt="{{ $categoryData['title'] }}" 
                                             class="w-12 h-12 object-contain filter drop-shadow-md group-hover:scale-110 transition-transform duration-300" />
                                    @else
                                        <i class="{{ $categoryData['icon'] }} text-3xl" style="color: var(--text-primary);"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold gradient-text">
                                        {{ $categoryData['title'] }}
                                    </h3>
                                    <p style="color: var(--text-secondary);">
                                        {{ $groupedSkills[$categoryKey]->count() }} 
                                        {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Skills Grid -->
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                                @foreach($groupedSkills[$categoryKey] as $skill)
                                    <div class="group/skill relative">
                                        <!-- Background Glow -->
                                        <div class="absolute inset-0 rounded-2xl blur opacity-25 group-hover/skill:opacity-75 transition duration-300"
                                             style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));"></div>
                                        
                                        <!-- Skill Card -->
                                        <div class="relative flex flex-col items-center justify-center p-8 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-300 glass-card"
                                             style="background: var(--card-bg); border: 2px solid var(--border-light);">

                                            @php
                                                $iconUrl = $skill->url;
                                                $hasValidUrl = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                            @endphp

                                            @if($hasValidUrl)
                                                <img 
                                                    src="{{ $iconUrl }}" 
                                                    alt="{{ $skill->name }}" 
                                                    class="w-16 h-16 mb-4 group-hover/skill:scale-110 transition-transform duration-300"
                                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                />
                                            @endif

                                            <!-- Fallback Icon -->
                                            <div class="{{ $hasValidUrl ? 'hidden' : '' }} w-16 h-16 mb-4 flex items-center justify-center rounded-xl group-hover/skill:scale-110 transition-transform duration-300 glass-card"
                                                 style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary)); border: 1px solid transparent;">
                                                <i class="fas fa-code text-3xl" style="color: var(--text-primary);"></i>
                                            </div>

                                            <!-- Skill Name -->
                                            <span class="font-semibold text-center text-sm mb-2" style="color: var(--text-primary);">
                                                {{ $skill->name }}
                                            </span>
                                            
                                            <!-- Skill Level -->
                                            @if($skill->level)
                                                <span class="text-xs mt-1" style="color: var(--text-muted);">
                                                    {{ $skill->level }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Skills Summary -->
            <div class="skills-summary mt-20">
                <div class="summary-grid">
                    <div class="summary-card">
                        <div class="summary-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="summary-content">
                            <h4 class="summary-value">{{ $skills->count() }}+</h4>
                            <p class="summary-label">Technologies</p>
                        </div>
                    </div>
                    
                    <div class="summary-card">
                        <div class="summary-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="summary-content">
                            <h4 class="summary-value">{{ count($categories) }}</h4>
                            <p class="summary-label">Expertise Areas</p>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        @endif
    </div>
</section>

<style>
/* ===================================
   THEME 3 SKILLS - MATCHING YOUR THEME
   =================================== */

:root {
    --bg-primary: #0a0a12;
    --bg-secondary: #151522;
    --text-primary: #ffffff;
    --text-secondary: #b4c6e0;
    --text-muted: #8fa3c7;
    --accent-primary: #00ff9d;
    --accent-secondary: #00d4ff;
    --accent-glow: rgba(0, 255, 157, 0.3);
    --border-light: rgba(0, 255, 157, 0.2);
    --card-bg: rgba(255, 255, 255, 0.05);
}

.theme3-skills {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
    position: relative;
    overflow: hidden;
}

/* Background Pattern */
.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
}

/* Floating Particles */
.particle-container .floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 25s ease-in-out infinite;
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    25% { 
        transform: translate(100px, -80px) scale(1.3);
        opacity: 0.7;
    }
    50% { 
        transform: translate(-60px, 120px) scale(0.8);
        opacity: 0.4;
    }
    75% { 
        transform: translate(120px, 60px) scale(1.1);
        opacity: 0.6;
    }
}

/* Section Header */
.section-title-primary {
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
}

.section-title-secondary {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 900;
    letter-spacing: -0.02em;
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 2px;
    margin: 0 auto;
}

.gradient-text {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 6rem 2rem;
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: var(--card-bg);
    border: 2px solid var(--border-light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: var(--text-muted);
    font-size: 2rem;
}

.empty-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.empty-description {
    color: var(--text-secondary);
    max-width: 400px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Glass Card Effect */
.glass-card {
    backdrop-filter: blur(10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Category Header */
.category-header {
    margin-bottom: 3rem;
}

/* Skills Grid */
.grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}

.grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.grid-cols-5 {
    grid-template-columns: repeat(5, minmax(0, 1fr));
}

/* Skill Card Hover Effects */
.group\/skill .glass-card {
    transition: all 0.3s ease;
}

.group\/skill:hover .glass-card {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 255, 157, 0.15);
}

/* Skill Icons - ORIGINAL COLORS PRESERVED */
.group\/skill img {
    filter: none !important;
    transition: transform 0.3s ease;
}

.group\/skill:hover img {
    transform: scale(1.1);
    filter: none !important; /* Keep original colors */
}

/* Fallback Icon */
.group\/skill .fa-code {
    color: var(--text-primary);
}

/* Skills Summary */
.skills-summary {
    margin-top: 4rem;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    max-width: 800px;
    margin: 0 auto;
}

.summary-card {
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.summary-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent-primary);
    box-shadow: 0 15px 40px rgba(0, 255, 157, 0.15);
}

.summary-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    margin: 0 auto 1.5rem;
}

.summary-value {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--accent-primary);
    margin-bottom: 0.5rem;
}

.summary-label {
    font-size: 1rem;
    color: var(--text-secondary);
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .grid-cols-5 {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .grid-cols-5 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    
    .grid-cols-3 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    
    .category-header .flex {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .w-20 {
        width: 4rem;
    }
    
    .h-20 {
        height: 4rem;
    }
    
    .summary-grid {
        grid-template-columns: 1fr;
        max-width: 400px;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .grid-cols-5,
    .grid-cols-3,
    .grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    
    .gap-6 {
        gap: 1rem;
    }
    
    .p-8 {
        padding: 1.5rem;
    }
    
    .w-16 {
        width: 3rem;
    }
    
    .h-16 {
        height: 3rem;
    }
    
    .text-3xl {
        font-size: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 6;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particleContainer.appendChild(particle);
        }
    }
});
</script>