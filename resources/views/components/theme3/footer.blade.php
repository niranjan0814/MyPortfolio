@props([])

@php
    $user = \App\Models\User::first();
@endphp

<style>
    /* ============================================
       THEME 3 FOOTER - MODERN CLEAN DESIGN
       ============================================ */
    
    :root {
        --t3-footer-bg: #f8fafc;
        --t3-footer-surface: #ffffff;
        --t3-footer-text: #1a202c;
        --t3-footer-text-muted: #718096;
        --t3-footer-accent: #00cc7a;
        --t3-footer-accent-2: #0099cc;
        --t3-footer-border: rgba(0, 204, 122, 0.15);
        --t3-footer-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-footer-bg: #050508;
        --t3-footer-surface: #0a0a12;
        --t3-footer-text: #ffffff;
        --t3-footer-text-muted: #a0aec0;
        --t3-footer-accent: #00ff9d;
        --t3-footer-accent-2: #00d4ff;
        --t3-footer-border: rgba(0, 255, 157, 0.1);
        --t3-footer-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    .t3-footer {
        background: var(--t3-footer-bg);
        border-top: 1px solid var(--t3-footer-border);
        padding: 5rem 0 2rem;
        position: relative;
        overflow: hidden;
    }

    .t3-footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .t3-footer-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr 1fr 1fr;
        gap: 4rem;
        margin-bottom: 2rem;
    }

    /* Brand Column */
    .t3-footer-brand h3 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        background: var(--t3-footer-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
    }

    .t3-footer-desc {
        color: var(--t3-footer-text-muted);
        line-height: 1.7;
        margin-bottom: 2rem;
        max-width: 300px;
    }

    /* Links Column */
    .t3-footer-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--t3-footer-text);
        margin-bottom: 1.5rem;
    }

    .t3-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .t3-footer-link {
        margin-bottom: 0.75rem;
    }

    .t3-footer-link a {
        color: var(--t3-footer-text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t3-footer-link a:hover {
        color: var(--t3-footer-accent);
        transform: translateX(5px);
    }

    /* Social Icons */
    .t3-footer-social {
        display: flex;
        gap: 1rem;
    }

    .t3-social-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--t3-footer-surface);
        border: 1px solid var(--t3-footer-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t3-footer-text-muted);
        transition: all 0.3s ease;
    }

    .t3-social-icon:hover {
        background: var(--t3-footer-gradient);
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
    }

    /* Bottom Bar */
    .t3-footer-bottom {
        border-top: 1px solid var(--t3-footer-border);
        padding-top: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .t3-copyright {
        color: var(--t3-footer-text-muted);
        font-size: 0.9375rem;
    }

    .t3-made-with {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--t3-footer-text-muted);
        font-size: 0.9375rem;
    }

    .t3-heart {
        color: #ef4444;
        animation: heartbeat 1.5s infinite;
    }

    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .t3-footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
    }

    @media (max-width: 576px) {
        .t3-footer-grid {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }
        
        .t3-footer-bottom {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="t3-footer">
    <div class="t3-footer-container">
        <div class="t3-footer-grid">
            <!-- Brand -->
            <div class="t3-footer-brand">
                <h3>{{ $user->name }}</h3>
                <p class="t3-footer-desc">
                    {{ $user->description ?? 'Building digital experiences with passion and precision.' }}
                </p>

            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="t3-footer-title">Quick Links</h4>
                <ul class="t3-footer-links">
                    <li class="t3-footer-link"><a href="#about">About Me</a></li>
                    <li class="t3-footer-link"><a href="#projects">Projects</a></li>
                    <li class="t3-footer-link"><a href="#skills">Skills</a></li>
                    <li class="t3-footer-link"><a href="#experience">Experience</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="t3-footer-title">Resources</h4>
                <ul class="t3-footer-links">
                    <li class="t3-footer-link"><a href="#blog">Blog</a></li>
                    <li class="t3-footer-link"><a href="#education">Education</a></li>
                    <li class="t3-footer-link"><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="t3-footer-title">Contact</h4>
                <ul class="t3-footer-links">
                    @if($user->email)
                        <li class="t3-footer-link">
                            <a href="mailto:{{ $user->email }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--t3-footer-accent);"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                {{ $user->email }}
                            </a>
                        </li>
                    @endif
                    @if($user->phone)
                        <li class="t3-footer-link">
                            <a href="tel:{{ $user->phone }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--t3-footer-accent);"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                {{ $user->phone }}
                            </a>
                        </li>
                    @endif
                    @if($user->address)
                        <li class="t3-footer-link">
                            <a href="#">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--t3-footer-accent);"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                {{ $user->address }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="t3-footer-bottom">
            
            <div class="t3-made-with">
                Made with Detech<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" class="t3-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> by {{ $user->name }}
            </div>
            <div class="t3-footer-social">
                @if($user->github_url)
                    <a href="{{ $user->github_url }}" target="_blank" class="t3-social-icon" title="GitHub">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                @endif
                @if($user->linkedin_url)
                    <a href="{{ $user->linkedin_url }}" target="_blank" class="t3-social-icon" title="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                @endif
                @if($user->twitter_url)
                    <a href="{{ $user->twitter_url }}" target="_blank" class="t3-social-icon" title="Twitter">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>