{{-- resources/views/components/theme-light/hero.blade.php --}}
@props(['heroContent', 'user', 'techStackSkills'])

<style>
    /* ============================================
       PREMIUM HERO COMPONENT - LIGHT THEME
       Modern, Professional, Award-Winning Design
       ============================================ */
    
    /* Core Variables */
    :root {
        --hero-bg: #F8F9FA;
        --hero-text: #2C2E3E;
        --hero-accent: #E89B0C;
        --hero-accent-deep: #D97706;
        --hero-blue: #3D5CCC;
        --hero-coral: #E85555;
        --hero-gray: #6B7280;
        --hero-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
        --hero-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
    }

    /* Hero Container */
    .hero-premium-light {
        min-height: 100vh;
        background: var(--hero-bg);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 6rem 0;
    }

    /* Animated Background Orbs */
    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.15;
        animation: float 20s infinite ease-in-out;
        pointer-events: none;
    }

    .hero-orb-1 {
        width: 600px;
        height: 600px;
        background: var(--hero-gradient);
        top: -200px;
        right: -200px;
        animation-delay: 0s;
    }

    .hero-orb-2 {
        width: 500px;
        height: 500px;
        background: linear-gradient(135deg, #3D5CCC 0%, #4C6FFF 100%);
        bottom: -150px;
        left: -150px;
        animation-delay: 7s;
    }

    .hero-orb-3 {
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #E85555 0%, #FF6B6B 100%);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation-delay: 14s;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -30px) rotate(120deg); }
        66% { transform: translate(-20px, 20px) rotate(240deg); }
    }

    /* Content Container */
    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* Grid Layout */
    .hero-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    /* Left Content */
    .hero-left {
        animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Badge */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: white;
        border-radius: 50px;
        box-shadow: 0 4px 12px rgba(44, 46, 62, 0.08);
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--hero-text);
        animation: fadeInDown 1s ease-out 0.2s both;
    }

    .hero-badge-dot {
        width: 8px;
        height: 8px;
        background: var(--hero-accent);
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.9); }
    }

    /* Greeting Text */
    .hero-greeting {
        font-size: 1.25rem;
        color: var(--hero-gray);
        font-weight: 500;
        margin-bottom: 0.75rem;
        animation: fadeInDown 1s ease-out 0.3s both;
    }

    /* Name & Typing Animation Container */
    .hero-title-wrapper {
        margin-bottom: 1.5rem;
    }

    .hero-name {
        font-size: 4rem;
        font-weight: 800;
        background: var(--hero-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
        margin-bottom: 0.5rem;
        animation: fadeInUp 1s ease-out 0.4s both;
    }

    /* Typing Animation */
    .hero-typing-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        min-height: 3rem;
    }

    .hero-typing-label {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--hero-text);
    }

    .hero-typing-text {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--hero-accent);
        min-width: 300px;
        animation: fadeIn 1s ease-out 0.5s both;
    }

    .hero-cursor {
        display: inline-block;
        width: 3px;
        height: 1.8rem;
        background: var(--hero-accent);
        animation: blink 1s infinite;
        margin-left: 2px;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    /* Description */
    .hero-description {
        font-size: 1.125rem;
        color: var(--hero-gray);
        line-height: 1.8;
        margin-bottom: 2.5rem;
        animation: fadeInUp 1s ease-out 0.6s both;
    }

    /* CTA Buttons */
    .hero-cta-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 3rem;
        animation: fadeInUp 1s ease-out 0.7s both;
    }

    .hero-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .hero-btn-primary {
        background: var(--hero-gradient);
        color: white;
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.3);
    }

    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(233, 155, 12, 0.4);
    }

    .hero-btn-primary:active {
        transform: translateY(0);
    }

    .hero-btn-secondary {
        background: white;
        color: var(--hero-text);
        border: 2px solid var(--hero-gray);
        box-shadow: 0 4px 12px rgba(44, 46, 62, 0.08);
    }

    .hero-btn-secondary:hover {
        background: var(--hero-text);
        color: white;
        border-color: var(--hero-text);
        transform: translateY(-2px);
    }

    /* Social Links */
    .hero-social {
        display: flex;
        gap: 1rem;
        animation: fadeInUp 1s ease-out 0.8s both;
    }

    .hero-social-link {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(44, 46, 62, 0.08);
    }

    .hero-social-link:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(44, 46, 62, 0.15);
    }

    .hero-social-link svg {
        width: 24px;
        height: 24px;
        fill: var(--hero-gray);
        transition: fill 0.3s ease;
    }

    .hero-social-link:hover svg {
        fill: var(--hero-accent);
    }

    /* Right Content - Visual Card */
    .hero-right {
        position: relative;
        animation: slideInRight 1s ease-out 0.5s both;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Premium Card */
    .hero-card {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow: var(--hero-shadow);
        position: relative;
        overflow: hidden;
    }

    .hero-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: var(--hero-gradient);
    }

    /* Card Content */
    .hero-card-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .hero-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 4px solid var(--hero-accent);
        object-fit: cover;
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.2);
    }

    .hero-avatar-placeholder {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 4px solid var(--hero-accent);
        background: var(--hero-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        color: white;
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.2);
    }

    .hero-card-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--hero-text);
        margin-bottom: 0.25rem;
    }

    .hero-card-info p {
        font-size: 0.875rem;
        color: var(--hero-gray);
    }

    /* Tech Stack Preview */
    .hero-tech-stack {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid rgba(107, 114, 128, 0.1);
    }

    .hero-tech-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--hero-gray);
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .hero-tech-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .hero-tech-item {
        aspect-ratio: 1;
        background: rgba(233, 155, 12, 0.05);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .hero-tech-item:hover {
        background: rgba(233, 155, 12, 0.1);
        border-color: var(--hero-accent);
        transform: translateY(-4px);
    }

    .hero-tech-item img {
        width: 40px;
        height: 40px;
        object-fit: contain;
    }

    /* Floating Animation Keyframes */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .hero-right {
            order: -1;
        }

        .hero-name {
            font-size: 3rem;
        }

        .hero-typing-text,
        .hero-typing-label {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 640px) {
        .hero-premium-light {
            padding: 4rem 0;
        }

        .hero-name {
            font-size: 2.5rem;
        }

        .hero-typing-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .hero-typing-text {
            min-width: auto;
        }

        .hero-cta-group {
            flex-direction: column;
        }

        .hero-btn {
            width: 100%;
            justify-content: center;
        }

        .hero-tech-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
        }

        .hero-card {
            padding: 1.5rem;
        }
    }

    /* Print Styles */
    @media print {
        .hero-orb,
        .hero-btn,
        .hero-social {
            display: none;
        }
    }
</style>

<section class="hero-premium-light">
    <!-- Animated Background Orbs -->
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>

    <div class="hero-content">
        <div class="hero-grid">
            <!-- Left Content -->
            <div class="hero-left">
               

                <div class="hero-greeting">
                    {{ $heroContent['greeting'] ?? "Hi, I'm" }}
                </div>

                <div class="hero-title-wrapper">
                    <h1 class="hero-name">
                        {{ $heroContent['user_name'] ?? $user->full_name ?? $user->name }}
                    </h1>

                    <div class="hero-typing-container">
                        <span class="hero-typing-label">I'm a</span>
                        <span class="hero-typing-text" id="typingText">
                            <span id="typingContent"></span>
                            <span class="hero-cursor"></span>
                        </span>
                    </div>
                </div>

               

                @if(($heroContent['btn_contact_enabled'] ?? true) || ($heroContent['btn_projects_enabled'] ?? true))
                <div class="hero-cta-group">
                    @if($heroContent['btn_contact_enabled'] ?? true)
                    <a href="#contact" class="hero-btn hero-btn-primary">
                        {{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    @endif

                    @if($heroContent['btn_projects_enabled'] ?? true)
                    <a href="#projects" class="hero-btn hero-btn-secondary">
                        {{ $heroContent['btn_projects_text'] ?? 'View My Work' }}
                    </a>
                    @endif
                </div>
                @endif

                <!-- Social Links -->
                @if(!empty($heroContent['social_links']))
                <div class="hero-social">
                    @foreach($heroContent['social_links'] as $link)
                    <a href="{{ $link['url'] }}" target="_blank" class="hero-social-link" title="{{ $link['name'] }}">
                        @if(!empty($link['icon']))
                        <img src="{{ $link['icon'] }}" alt="{{ $link['name'] }}" style="width: 24px; height: 24px;">
                        @else
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                        @endif
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Right Content - Premium Card -->
            <div class="hero-right">
                <div class="hero-card">
                    <div class="hero-card-header">
                        @if($user->profile_image)
                        <img src="{{ $user->profile_image }}" alt="{{ $user->full_name ?? $user->name }}" class="hero-avatar">
                        @else
                        <div class="hero-avatar-placeholder">
                            {{ strtoupper(substr($user->full_name ?? $user->name, 0, 1)) }}
                        </div>
                        @endif

                        <div class="hero-card-info">
                            <h3>{{ $user->full_name ?? $user->name }}</h3>
                            <p>{{ $user->description ?? 'Software Engineer' }}</p>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Premium Typing Animation
    document.addEventListener('DOMContentLoaded', function() {
        const typingTexts = @json($heroContent['typing_texts'] ?? [['text' => 'Developer'], ['text' => 'Creator']]);
        const typingElement = document.getElementById('typingContent');
        
        if (!typingElement || typingTexts.length === 0) return;

        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let isPaused = false;

        function type() {
            const currentText = typingTexts[textIndex].text || typingTexts[textIndex];
            
            if (!isDeleting && charIndex < currentText.length) {
                typingElement.textContent += currentText.charAt(charIndex);
                charIndex++;
                setTimeout(type, 100);
            } else if (isDeleting && charIndex > 0) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                setTimeout(type, 50);
            } else if (!isDeleting && charIndex === currentText.length) {
                isPaused = true;
                setTimeout(() => {
                    isPaused = false;
                    isDeleting = true;
                    type();
                }, 2000);
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % typingTexts.length;
                setTimeout(type, 500);
            }
        }

        type();
    });
</script>