@props(['heroContent', 'techStackSkills'])

<style>
    :root {
        --accent-olive: #9CA777;
        --accent-olive-light: #B5C18E;
        --accent-olive-dark: #7A8A5C;
    }
    
    /* Light Theme */
    [data-theme="light"] {
        --bg-primary: #FFFFFF;
        --bg-secondary: #F8F9FA;
        --text-primary: #1A1A1A;
        --text-secondary: #6B6B6B;
        --border-color: #E5E7EB;
        --card-bg: #FFFFFF;
        --shadow: rgba(0, 0, 0, 0.1);
    }
    
    /* Dark Theme */
    [data-theme="dark"] {
        --bg-primary: #0F1419;
        --bg-secondary: #1A1F2E;
        --text-primary: #FFFFFF;
        --text-secondary: #9CA3AF;
        --border-color: #2D3748;
        --card-bg: #1A1F2E;
        --shadow: rgba(0, 0, 0, 0.3);
    }
    
    .hero-modern {
        background: var(--bg-primary);
        min-height: 100vh;
        position: relative;
        transition: background 0.3s ease;
    }
    
    .theme-toggle {
        position: fixed;
        top: 30px;
        right: 30px;
        z-index: 1000;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--card-bg);
        border: 2px solid var(--border-color);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px var(--shadow);
    }
    
    .theme-toggle:hover {
        transform: rotate(180deg);
        border-color: var(--accent-olive);
    }
    
    .theme-toggle svg {
        width: 24px;
        height: 24px;
        fill: var(--text-primary);
    }
    
    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 80px 40px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
        min-height: 100vh;
    }
    
    .hero-text {
        animation: fadeInLeft 0.8s ease-out;
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 30px;
    }
    
    .status-dot {
        width: 10px;
        height: 10px;
        background: var(--accent-olive);
        border-radius: 50%;
        animation: pulse-dot 2s ease-in-out infinite;
    }
    
    @keyframes pulse-dot {
        0%, 100% {
            opacity: 1;
            box-shadow: 0 0 0 0 rgba(156, 167, 119, 0.7);
        }
        50% {
            opacity: 0.8;
            box-shadow: 0 0 0 10px rgba(156, 167, 119, 0);
        }
    }
    
    .hero-greeting {
        font-size: 24px;
        font-weight: 500;
        color: var(--text-secondary);
        margin-bottom: 10px;
    }
    
    .hero-name {
        font-size: clamp(3rem, 7vw, 5.5rem);
        font-weight: 800;
        color: var(--text-primary);
        line-height: 1.1;
        margin-bottom: 20px;
    }
    
    .name-accent {
        color: var(--accent-olive);
        position: relative;
    }
    
    .name-accent::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-olive), transparent);
    }
    
    .hero-roles {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        font-weight: 600;
        color: var(--text-secondary);
        min-height: 60px;
        margin-bottom: 30px;
    }
    
    .typing-cursor {
        display: inline-block;
        width: 3px;
        height: 1.2em;
        background: var(--accent-olive);
        margin-left: 5px;
        animation: blink 1s step-end infinite;
    }
    
    @keyframes blink {
        50% { opacity: 0; }
    }
    
    .hero-description {
        font-size: 18px;
        line-height: 1.8;
        color: var(--text-secondary);
        margin-bottom: 40px;
        max-width: 600px;
    }
    
    .hero-cta {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 16px 40px;
        font-size: 16px;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border: none;
    }
    
    .btn-primary {
        background: var(--accent-olive);
        color: white;
        box-shadow: 0 4px 15px rgba(156, 167, 119, 0.3);
    }
    
    .btn-primary:hover {
        background: var(--accent-olive-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(156, 167, 119, 0.4);
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--text-primary);
        border: 2px solid var(--border-color);
    }
    
    .btn-secondary:hover {
        background: var(--bg-secondary);
        border-color: var(--accent-olive);
        transform: translateY(-3px);
    }
    
    .hero-visual {
        position: relative;
        animation: fadeInRight 0.8s ease-out;
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .visual-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 60px;
        box-shadow: 0 20px 60px var(--shadow);
        position: relative;
        overflow: hidden;
    }
    
    .visual-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-olive), var(--accent-olive-light));
    }
    
    .profile-placeholder {
        width: 100%;
        aspect-ratio: 1;
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--card-bg) 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
        border: 2px solid var(--border-color);
    }
    
    .profile-placeholder svg {
        width: 120px;
        height: 120px;
        opacity: 0.3;
        fill: var(--text-secondary);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .stat-box {
        background: var(--bg-secondary);
        padding: 25px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .stat-box:hover {
        transform: translateY(-5px);
        border-color: var(--accent-olive);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--accent-olive);
        margin-bottom: 8px;
    }
    
    .stat-label {
        font-size: 13px;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }
    
    .floating-element {
        position: absolute;
        width: 60px;
        height: 60px;
        background: var(--accent-olive);
        border-radius: 12px;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-element:nth-child(1) {
        top: 10%;
        right: 10%;
        animation-delay: 0s;
    }
    
    .floating-element:nth-child(2) {
        bottom: 15%;
        left: 5%;
        animation-delay: 2s;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }
    
    @media (max-width: 1024px) {
        .hero-container {
            grid-template-columns: 1fr;
            gap: 60px;
            padding: 60px 30px;
        }
        
        .hero-name {
            font-size: clamp(2.5rem, 8vw, 4rem);
        }
        
        .visual-card {
            padding: 40px;
        }
        
        .theme-toggle {
            top: 20px;
            right: 20px;
        }
    }
    
    @media (max-width: 640px) {
        .hero-cta {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="hero-modern" data-theme="light">
    <!-- Theme Toggle -->
    <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
        <svg id="sunIcon" viewBox="0 0 24 24">
            <path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z"/>
        </svg>
        <svg id="moonIcon" style="display: none;" viewBox="0 0 24 24">
            <path d="M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z"/>
        </svg>
    </button>
    
    <!-- Floating Elements -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    
    <div class="hero-container">
        <!-- Left: Text Content -->
        <div class="hero-text">
            <div class="status-badge">
                <span class="status-dot"></span>
                Available for Freelance
            </div>
            
            <div class="hero-greeting">Hello, I'm</div>
            
            <h1 class="hero-name">
                <span class="name-accent">{{ $heroContent['user_name'] ?? 'Clyde' }}</span>
            </h1>
            
            <!-- Typing Animation -->
            @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']))
                <div class="hero-roles">
                    <span id="typingText"></span><span class="typing-cursor"></span>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const texts = @json(array_map(fn($t) => is_array($t) ? $t['text'] : $t, $heroContent['typing_texts']));
                        const el = document.getElementById('typingText');
                        if (!el || !texts.length) return;
                        
                        let textIndex = 0;
                        let charIndex = 0;
                        let isDeleting = false;
                        
                        function typeEffect() {
                            const currentText = texts[textIndex];
                            
                            if (isDeleting) {
                                el.textContent = currentText.substring(0, charIndex - 1);
                                charIndex--;
                                
                                if (charIndex === 0) {
                                    isDeleting = false;
                                    textIndex = (textIndex + 1) % texts.length;
                                    setTimeout(typeEffect, 500);
                                    return;
                                }
                            } else {
                                el.textContent = currentText.substring(0, charIndex + 1);
                                charIndex++;
                                
                                if (charIndex === currentText.length) {
                                    isDeleting = true;
                                    setTimeout(typeEffect, 2000);
                                    return;
                                }
                            }
                            
                            setTimeout(typeEffect, isDeleting ? 50 : 100);
                        }
                        
                        typeEffect();
                    });
                </script>
            @endif
            
            <p class="hero-description">
                Creative developer passionate about building exceptional digital experiences. 
                Specialized in modern web technologies and user-centric design solutions.
            </p>
            
            <div class="hero-cta">
                @if ($heroContent['btn_contact_enabled'] ?? false)
                    <a href="#contact" class="btn btn-primary">
                        {{ $heroContent['btn_contact_text'] ?? 'Hire Me' }}
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z"/>
                        </svg>
                    </a>
                @endif
                
                @if ($heroContent['btn_projects_enabled'] ?? false)
                    <a href="#projects" class="btn btn-secondary">
                        {{ $heroContent['btn_projects_text'] ?? 'View Projects' }}
                    </a>
                @endif
            </div>
        </div>
        
        <!-- Right: Visual Card -->
        <div class="hero-visual">
            <div class="visual-card">
                <div class="profile-placeholder">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C8.13401 14 1 15.9346 1 19.8V22H23V19.8C23 15.9346 15.866 14 12 14Z"/>
                    </svg>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-number">750+</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">568+</div>
                        <div class="stat-label">Clients</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">12+</div>
                        <div class="stat-label">Years Exp</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const heroSection = document.querySelector('.hero-modern');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        
        themeToggle.addEventListener('click', () => {
            const currentTheme = heroSection.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            heroSection.setAttribute('data-theme', newTheme);
            
            if (newTheme === 'dark') {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            } else {
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            }
        });
    </script>
</div>