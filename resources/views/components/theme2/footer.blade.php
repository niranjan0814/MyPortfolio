@props(['user' => null])

<style>
    /* Reuse Theme 2 Variables */
    :root {
        --t2-bg: #F8F9FA;
        --t2-text-main: #2C2E3E;
        --t2-text-sub: #6B7280;
        --t2-accent: #E89B0C;
        --t2-accent-hover: #D97706;
        --t2-surface: #FFFFFF;
        --t2-border: rgba(44, 46, 62, 0.08);
        --t2-card-bg: #FFFFFF;
        --t2-glass-border: rgba(44, 46, 62, 0.05);
        --t2-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
        --t2-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
    }

    [data-theme="dark"] {
        --t2-bg: #2C2E3E;
        --t2-text-main: #FFFFFF;
        --t2-text-sub: #E5E7EB;
        --t2-accent: #F5A623;
        --t2-accent-hover: #E09612;
        --t2-surface: rgba(255, 255, 255, 0.05);
        --t2-border: rgba(255, 255, 255, 0.1);
        --t2-card-bg: rgba(255, 255, 255, 0.03);
        --t2-glass-border: rgba(255, 255, 255, 0.1);
        --t2-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        --t2-gradient: linear-gradient(135deg, #F5A623 0%, #D97706 100%);
    }

    .t2-footer {
        background: #1a1c2e;
        border-top: none;
        color: #FFFFFF;
        padding: 4rem 0 2rem;
        margin: 0;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        display: block;
        width: 100%;
    }

    [data-theme="dark"] .t2-footer {
        background: #0f1015;
    }

    .t2-footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    @media (min-width: 768px) {
        .t2-footer-grid {
            grid-template-columns: 1.5fr 1fr 1fr;
        }
    }

    .t2-footer-brand h3 {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: #FFFFFF;
    }

    .t2-footer-brand span {
        color: var(--t2-accent);
    }

    .t2-footer-desc {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
        font-size: 0.95rem;
        max-width: 300px;
    }

    .t2-footer-heading {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 1.5rem;
    }

    .t2-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .t2-footer-link {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .t2-footer-link:hover {
        color: var(--t2-accent);
    }

    .t2-footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
        text-align: center;
    }

    @media (min-width: 768px) {
        .t2-footer-bottom {
            flex-direction: row;
            justify-content: space-between;
            text-align: left;
        }
    }

    .t2-copyright {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
    }

    .t2-legal-links {
        display: flex;
        gap: 1.5rem;
    }

    /* Mobile Collapsible Sections */
    .t2-footer-section {
        padding-bottom: 1rem;
    }

    .t2-footer-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        padding: 1rem 0;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
    }

    .t2-footer-toggle-icon {
        transition: transform 0.3s ease;
        color: var(--t2-accent);
        font-size: 1.25rem;
        font-weight: bold;
        transform: rotate(90deg);
    }

    .t2-footer-toggle-icon.active {
        transform: rotate(270deg);
    }

    .t2-footer-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .t2-footer-content.active {
        max-height: 500px;
        padding-bottom: 1rem;
    }

    @media (min-width: 768px) {
        .t2-footer-section {
            border-bottom: none;
            padding-bottom: 0;
        }

        .t2-footer-toggle {
            cursor: default;
            padding: 0;
        }

        .t2-footer-toggle-icon {
            display: none;
        }

        .t2-footer-content {
            max-height: none;
            overflow: visible;
        }
    }

    /* Mobile Spacing Reduction */
    @media (max-width: 767px) {
        .t2-footer {
            padding: 2rem 0 1.5rem;
        }

        .t2-footer-grid {
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .t2-footer-section {
            padding-bottom: 0;
        }

        .t2-footer-toggle {
            padding: 0.75rem 0;
        }

        .t2-footer-content.active {
            padding-bottom: 0.5rem;
        }

        .t2-footer-links {
            gap: 0.5rem;
        }

        .t2-footer-bottom {
            padding-top: 1.5rem;
        }

        .t2-container {
            padding: 0 1rem;
        }
    }
</style>

<footer class="t2-footer">
    <div class="t2-container">
        <div class="t2-footer-grid">
            <!-- Brand -->
            <div class="t2-footer-brand">
                <h3>{{ $user->name ?? 'Portfolio' }}<span>.</span></h3>
                
            </div>

            <!-- Navigate -->
            <div class="t2-footer-section">
                <button class="t2-footer-toggle" onclick="toggleFooterSection('navigate')">
                    <h4 class="t2-footer-heading" style="margin-bottom: 0;">Navigate</h4>
                    <span class="t2-footer-toggle-icon" id="navigate-icon">›</span>
                </button>
                <div class="t2-footer-content" id="navigate-content">
                    <ul class="t2-footer-links">
                        <li><a href="#about" class="t2-footer-link">About</a></li>
                        <li><a href="#projects" class="t2-footer-link">Projects</a></li>
                        <li><a href="#skills" class="t2-footer-link">Skills</a></li>
                        <li><a href="#experience" class="t2-footer-link">Experience</a></li>
                        <li><a href="#contact" class="t2-footer-link">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Connect -->
            <div class="t2-footer-section">
                <button class="t2-footer-toggle" onclick="toggleFooterSection('connect')">
                    <h4 class="t2-footer-heading" style="margin-bottom: 0;">Connect</h4>
                    <span class="t2-footer-toggle-icon" id="connect-icon">›</span>
                </button>
                <div class="t2-footer-content" id="connect-content">
                    <ul class="t2-footer-links">
                        @if($user->email ?? false)
                            <li><a href="mailto:{{ $user->email }}" class="t2-footer-link">{{ $user->email }}</a></li>
                        @endif
                        @if($user->phone ?? false)
                            <li><a href="tel:{{ $user->phone }}" class="t2-footer-link">{{ $user->phone }}</a></li>
                        @endif
                        @if($user->linkedin_url ?? false)
                            <li><a href="{{ $user->linkedin_url }}" target="_blank" class="t2-footer-link">LinkedIn</a></li>
                        @endif
                        @if($user->github_url ?? false)
                            <li><a href="{{ $user->github_url }}" target="_blank" class="t2-footer-link">GitHub</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="t2-footer-bottom">
            <div class="t2-copyright">
                © {{ date('Y') }}  All rights reserved made with 💛 Detech by {{ $user->name }}.
            </div>
            
        </div>
    </div>
</footer>
<script>
function toggleFooterSection(section) {
    const content = document.getElementById(section + '-content');
    const icon = document.getElementById(section + '-icon');
    
    content.classList.toggle('active');
    icon.classList.toggle('active');
}

// Auto-expand on desktop
function checkFooterExpansion() {
    if (window.innerWidth >= 768) {
        document.querySelectorAll('.t2-footer-content').forEach(content => {
            content.classList.add('active');
        });
    } else {
        document.querySelectorAll('.t2-footer-content').forEach(content => {
            content.classList.remove('active');
        });
        document.querySelectorAll('.t2-footer-toggle-icon').forEach(icon => {
            icon.classList.remove('active');
        });
    }
}

// Run on load and resize
window.addEventListener('load', checkFooterExpansion);
window.addEventListener('resize', checkFooterExpansion);
</script>
