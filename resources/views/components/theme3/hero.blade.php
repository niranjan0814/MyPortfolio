@props(['heroContent', 'techStackSkills'])

<section id="hero" class="section-full relative overflow-hidden min-h-screen w-full theme3-hero">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Main Layout Container -->
    <div class="relative z-10 min-h-screen flex flex-col lg:flex-row items-center justify-center">
        
        <!-- LEFT SIDE - Content -->
        <div class="w-full lg:w-1/2 px-8 md:px-16 lg:px-24 py-24 lg:py-0 flex items-center justify-end">
            <div class="max-w-md lg:max-w-lg xl:max-w-2xl content-area">
                
                <!-- Main Heading with Perfect Spacing -->
                <div class="mb-12 space-y-4">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black leading-tight tracking-tight">
                        <span class="block digital-text name-primary">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[0] }}
                        </span>
                        <span class="block matrix-gradient name-secondary">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[1] ?? 'Developer' }}
                        </span>
                    </h1>
                </div>

                <!-- Dynamic Role Text with Refined Typography -->
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
                    <div class="mb-16 min-h-[48px] flex items-center">
                        <div class="role-display">
                            <span id="typed-text-theme3" class="role-text"></span>
                            <span class="typing-cursor">|</span>
                        </div>
                    </div>
                @else
                    <div class="mb-16 min-h-[48px] flex items-center">
                        <div class="role-display">
                            <span class="role-text">Full Stack Developer</span>
                            <span class="typing-cursor">|</span>
                        </div>
                    </div>
                @endif

                <!-- CTA Buttons with Professional Spacing -->
                @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
                    <div class="flex flex-col sm:flex-row gap-4 mb-20">
                        @if ($heroContent['btn_contact_enabled'] ?? false)
                            <a href="#contact" class="cta-btn primary-btn group">
                                <span class="btn-glow-effect"></span>
                                <span class="btn-content">
                                    <span class="btn-text">{{ $heroContent['btn_contact_text'] ?? 'Hire Me' }}</span>
                                    <span class="btn-arrow">→</span>
                                </span>
                            </a>
                        @endif

                        @if ($heroContent['btn_projects_enabled'] ?? false)
                            <a href="#projects" class="cta-btn secondary-btn group">
                                <span class="btn-content">
                                    <span class="btn-text">{{ $heroContent['btn_projects_text'] ?? 'My Work' }}</span>
                                    <span class="btn-arrow">↗</span>
                                </span>
                            </a>
                        @endif
                    </div>
                @endif

                <!-- Social Links with Elegant Spacing -->
                @if (!empty($heroContent['social_links'] ?? []))
                    <div class="social-section">
                        <div class="social-label-container">
                            <span class="social-label">Connect with me</span>
                            <div class="label-underline"></div>
                        </div>
                        <div class="social-icons-grid">
                            @foreach ($heroContent['social_links'] as $social)
                                @if (!empty($social['url'] ?? ''))
                                    <a href="{{ $social['url'] }}" target="_blank" 
                                       class="social-icon-link group" 
                                       title="{{ $social['name'] ?? 'Social' }}">
                                        <div class="social-icon-wrapper">
                                            @if (!empty($social['icon'] ?? ''))
                                                <img src="{{ $social['icon'] }}" 
                                                     alt="{{ $social['name'] ?? 'Social' }}"
                                                     class="social-icon-img" />
                                            @else
                                                <div class="social-icon-fallback">
                                                    <i class="fas fa-share-alt"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="social-platform-name">{{ $social['name'] ?? 'Social' }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- RIGHT SIDE - Visual Element -->
        <div class="w-full lg:w-1/2 px-8 lg:px-16 py-16 lg:py-0 flex items-center justify-start">
            <div class="visual-area">
                
                <!-- Profile Image Container -->
                <div class="profile-container">
                    <div class="profile-frame">
                        <div class="frame-glow"></div>
                        <div class="frame-border"></div>
                        <img src="{{ $heroContent['user']->profile_image ?? '/images/profile.png' }}" 
                             alt="{{ $heroContent['user_name'] ?? 'Profile' }}"
                             class="profile-image"
                             id="profile-image" />
                    </div>
                </div>

                <!-- Tech Stack with Polling -->
                
            </div>
        </div>
    </div>
</section>

<!-- Typing Animation Script -->
@if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
<script>
document.addEventListener('DOMContentLoaded', function () {
    const texts = @json(array_map(function ($text) {
        return is_array($text) && isset($text['text']) ? $text['text'] : $text;
    }, array_values($heroContent['typing_texts'])));
    
    const typedElement = document.getElementById('typed-text-theme3');
    if (!typedElement || !Array.isArray(texts) || texts.length === 0) return;

    let textIndex = 0, charIndex = 0, isDeleting = false;

    function type() {
        const currentText = String(texts[textIndex]);
        if (isDeleting) {
            typedElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typedElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }

        let speed = isDeleting ? 40 : 80;
        if (!isDeleting && charIndex === currentText.length) {
            speed = 2000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            speed = 500;
        }
        setTimeout(type, speed);
    }

    setTimeout(type, 1000);
});
</script>
@endif

<!-- Polling Script for Tech Stack -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const techStackContainer = document.getElementById('tech-stack-container');
    
    async function updateTechStack() {
        try {
            const response = await fetch('/api/tech-stack');
            const data = await response.json();
            
            if (techStackContainer && data.techStack) {
                techStackContainer.innerHTML = '';
                
                data.techStack.forEach((skill, index) => {
                    const techItem = document.createElement('div');
                    techItem.className = 'tech-item';
                    techItem.style.setProperty('--item-index', index);
                    
                    if (skill.url) {
                        techItem.innerHTML = `
                            <img src="${skill.url}" alt="${skill.name}" class="tech-icon">
                            <div class="tech-tooltip">${skill.name}</div>
                        `;
                    } else {
                        techItem.innerHTML = `
                            <div class="tech-icon tech-icon-fallback">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="tech-tooltip">${skill.name}</div>
                        `;
                    }
                    
                    techStackContainer.appendChild(techItem);
                });
            }
            
        } catch (error) {
            console.error('Error updating tech stack:', error);
        }
    }
    
    if (techStackContainer) {
        updateTechStack();
        setInterval(updateTechStack, 1000);
    }

    // Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 8;
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

<style>
/* ===================================
   THEME 3 HERO - PROFESSIONAL SPACING
   =================================== */

:root {
    /* Professional Color Scheme */
    --bg-primary: #0a0a12;
    --bg-secondary: #151522;
    --text-primary: #ffffff;
    --text-secondary: #b4c6e0;
    --text-muted: #8fa3c7;
    --accent-primary: #00ff9d;
    --accent-secondary: #00d4ff;
    --accent-glow: rgba(0, 255, 157, 0.3);
    --border-light: rgba(0, 255, 157, 0.2);
}

[data-theme="light"] {
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --text-primary: #1a202c;
    --text-secondary: #4a5568;
    --text-muted: #718096;
    --accent-primary: #00cc7a;
    --accent-secondary: #0099cc;
    --accent-glow: rgba(0, 204, 122, 0.2);
    --border-light: rgba(0, 204, 122, 0.3);
}

.theme3-hero {
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
.floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 20s ease-in-out infinite;
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    25% { 
        transform: translate(80px, -60px) scale(1.3);
        opacity: 0.7;
    }
    50% { 
        transform: translate(-40px, 80px) scale(0.8);
        opacity: 0.4;
    }
    75% { 
        transform: translate(100px, 40px) scale(1.1);
        opacity: 0.6;
    }
}

/* Content Area - Perfect Spacing */
.content-area {
    animation: contentSlideIn 1s ease-out;
}

@keyframes contentSlideIn {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Name Typography with Professional Spacing */
.name-primary {
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
    line-height: 0.95;
    margin-bottom: 0.5rem;
}

.name-secondary {
    background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 800;
    letter-spacing: -0.01em;
    line-height: 0.95;
}

/* Role Display */
.role-display {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1.25rem 1.5rem;
    background: rgba(0, 255, 157, 0.05);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    backdrop-filter: blur(10px);
}

.role-text {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-secondary);
    line-height: 1.4;
    min-height: 1.5em;
}

.typing-cursor {
    color: var(--accent-primary);
    font-weight: 700;
    animation: blink 1s step-end infinite;
}

@keyframes blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0; }
}

/* CTA Buttons with Professional Spacing */
.cta-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1.25rem 2.5rem;
    font-weight: 600;
    font-size: 1.125rem;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    min-width: 160px;
}

.primary-btn {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--bg-primary);
    box-shadow: 0 4px 20px rgba(0, 255, 157, 0.3);
}

.primary-btn:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 8px 40px rgba(0, 255, 157, 0.4),
        0 0 0 1px rgba(0, 255, 157, 0.2);
}

.secondary-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
}

.secondary-btn:hover {
    background: rgba(0, 255, 157, 0.1);
    border-color: var(--accent-primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 255, 157, 0.2);
}

.btn-glow-effect {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.primary-btn:hover .btn-glow-effect {
    transform: translateX(100%);
}

.btn-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
    z-index: 2;
}

.btn-text {
    font-weight: 600;
    letter-spacing: 0.02em;
}

.btn-arrow {
    font-size: 1.25em;
    transition: transform 0.3s ease;
}

.cta-btn:hover .btn-arrow {
    transform: translateX(3px);
}

/* Social Section with Elegant Spacing */
.social-section {
    margin-top: 3rem;
}

.social-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.social-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    white-space: nowrap;
}

.label-underline {
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, var(--border-light), transparent);
}

.social-icons-grid {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.social-icon-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1.25rem;
    background: rgba(0, 255, 157, 0.05);
    border: 1px solid var(--border-light);
    border-radius: 10px;
    text-decoration: none;
    color: var(--text-secondary);
    transition: all 0.3s ease;
    min-width: 140px;
}

.social-icon-link:hover {
    background: rgba(0, 255, 157, 0.1);
    color: var(--accent-primary);
    border-color: var(--accent-primary);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 255, 157, 0.15);
}

.social-icon-wrapper {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-icon-img {
    width: 100%;
    height: 100%;
    filter: brightness(0) invert(1);
}

[data-theme="light"] .social-icon-img {
    filter: brightness(0) saturate(100%) invert(30%) sepia(90%) saturate(2000%) hue-rotate(140deg);
}

.social-platform-name {
    font-size: 0.875rem;
    font-weight: 500;
    letter-spacing: 0.02em;
}

/* Visual Area */
.visual-area {
    animation: visualSlideIn 1.2s ease-out;
}

@keyframes visualSlideIn {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Profile Container */
.profile-container {
    position: relative;
    margin-bottom: 3rem;
}

.profile-frame {
    position: relative;
    width: 320px;
    height: 320px;
    border-radius: 24px;
    overflow: hidden;
}

.frame-glow {
    position: absolute;
    inset: -2px;
    background: conic-gradient(from 0deg, var(--accent-primary), var(--accent-secondary), var(--accent-primary));
    border-radius: 26px;
    filter: blur(12px);
    opacity: 0.4;
    z-index: 1;
}

.frame-border {
    position: absolute;
    inset: 0;
    background: conic-gradient(from 0deg, var(--accent-primary), var(--accent-secondary), var(--accent-primary));
    border-radius: 24px;
    padding: 3px;
    -webkit-mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
    mask: 
        linear-gradient(#fff 0 0) content-box, 
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    z-index: 2;
}

.profile-image {
    position: relative;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 21px;
    z-index: 3;
    transition: transform 0.5s ease;
}

.profile-frame:hover .profile-image {
    transform: scale(1.03);
}

/* Tech Stack Section */
.tech-stack-section {
    text-align: center;
}

.tech-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
}

.tech-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.25rem;
    max-width: 280px;
    margin: 0 auto;
}

.tech-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    opacity: 0;
    animation: techItemAppear 0.6s ease forwards;
    animation-delay: calc(var(--item-index) * 0.1s);
}

@keyframes techItemAppear {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    from {
        opacity: 0;
        transform: translateY(20px);
    }
}

.tech-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(0, 255, 157, 0.08);
    border: 1.5px solid var(--border-light);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.tech-item:hover .tech-icon {
    transform: scale(1.15);
    border-color: var(--accent-primary);
    box-shadow: 0 8px 25px rgba(0, 255, 157, 0.25);
    background: rgba(0, 255, 157, 0.12);
}

.tech-icon-fallback {
    color: var(--accent-primary);
    font-size: 1.25rem;
}

.tech-tooltip {
    position: absolute;
    bottom: -40px;
    background: var(--bg-secondary);
    color: var(--text-primary);
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
    white-space: nowrap;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
    pointer-events: none;
    border: 1px solid var(--border-light);
    backdrop-filter: blur(10px);
    z-index: 10;
}

.tech-item:hover .tech-tooltip {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive Design with Perfect Breakpoints */
@media (max-width: 1280px) {
    .profile-frame {
        width: 280px;
        height: 280px;
    }
    
    .tech-grid {
        max-width: 260px;
        gap: 1rem;
    }
}

@media (max-width: 1024px) {
    .content-area {
        text-align: center;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .social-label-container {
        justify-content: center;
    }
    
    .social-icons-grid {
        justify-content: center;
    }
    
    .profile-frame {
        width: 240px;
        height: 240px;
    }
}

@media (max-width: 768px) {
    .name-primary,
    .name-secondary {
        font-size: 3rem;
    }
    
    .role-text {
        font-size: 1.25rem;
    }
    
    .cta-btn {
        padding: 1rem 2rem;
        font-size: 1rem;
    }
    
    .profile-frame {
        width: 200px;
        height: 200px;
    }
    
    .tech-grid {
        grid-template-columns: repeat(3, 1fr);
        max-width: 200px;
    }
}

@media (max-width: 480px) {
    .name-primary,
    .name-secondary {
        font-size: 2.5rem;
    }
    
    .social-icon-link {
        min-width: 120px;
        padding: 0.75rem 1rem;
    }
    
    .tech-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>