@props([])

@php
    $user = \App\Models\User::first();
@endphp

<section id="contact" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-contact">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="container mx-auto max-w-6xl relative z-10 px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">Get In</span>
                <span class="section-title-secondary">Touch</span>
            </h2>
            <div class="section-divider"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6" style="color: var(--text-secondary);">
                Let's discuss your next project and bring your ideas to life
            </p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="success-message mb-8" role="alert">
                <div class="message-content success">
                    <i class="fas fa-check-circle message-icon"></i>
                    <span class="message-text">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="error-message mb-8" role="alert">
                <div class="message-content error">
                    <i class="fas fa-exclamation-circle message-icon"></i>
                    <div class="message-list">
                        @foreach($errors->all() as $error)
                            <span class="error-item">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Contact Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            @if($user->email)
                <div class="contact-info-card">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-envelope contact-icon"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3 class="contact-info-title">Email Me</h3>
                        <p class="contact-info-value">{{ $user->email }}</p>
                    </div>
                </div>
            @endif

            @if($user->phone)
                <div class="contact-info-card">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-phone contact-icon"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3 class="contact-info-title">Call Me</h3>
                        <p class="contact-info-value">{{ $user->phone }}</p>
                    </div>
                </div>
            @endif

            @if($user->address)
                <div class="contact-info-card">
                    <div class="contact-icon-wrapper">
                        <i class="fas fa-map-marker-alt contact-icon"></i>
                    </div>
                    <div class="contact-info-content">
                        <h3 class="contact-info-title">Location</h3>
                        <p class="contact-info-value">{{ $user->address }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Social Links -->
        @if($user->linkedin_url || $user->github_url)
            <div class="social-section text-center mb-16">
                <h3 class="social-section-title">Follow My Work</h3>
                <div class="social-links-grid">
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-linkedin social-icon"></i>
                            <span class="social-tooltip">LinkedIn</span>
                        </a>
                    @endif
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-github social-icon"></i>
                            <span class="social-tooltip">GitHub</span>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <!-- Contact Form Trigger -->
        <div class="text-center">
            <button id="openContactForm" class="contact-cta-btn">
                <span class="btn-text">Send Message</span>
                <i class="fas fa-arrow-right btn-icon"></i>
            </button>
        </div>
    </div>

    <!-- Contact Form Modal -->
    <div id="contactModal" class="contact-modal" role="dialog" aria-modal="true">
        <div class="modal-overlay" id="modalOverlay"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Let's Start a Conversation</h3>
                <button id="closeContactForm" class="modal-close-btn" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="modal-content">
                <div class="contact-details-section">
                    <div class="section-header">
                        <div class="header-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div>
                            <h4 class="section-title">Get In Touch</h4>
                            <p class="section-description">I'm always excited to hear about new opportunities</p>
                        </div>
                    </div>

                    <div class="contact-details-list">
                        @if($user->phone)
                            <div class="contact-detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="detail-content">
                                    <span class="detail-label">Phone</span>
                                    <span class="detail-value">{{ $user->phone }}</span>
                                </div>
                            </div>
                        @endif

                        @if($user->email)
                            <div class="contact-detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="detail-content">
                                    <span class="detail-label">Email</span>
                                    <span class="detail-value">{{ $user->email }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="response-info">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <span class="info-title">Quick Response</span>
                            <span class="info-description">Typically reply within 24 hours</span>
                        </div>
                    </div>
                </div>

                <div class="contact-form-section">
                    <div class="section-header">
                        <div class="header-icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div>
                            <h4 class="section-title">Send Message</h4>
                            <p class="section-description">Fill out the form and I'll get back to you soon</p>
                        </div>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name" class="form-label">Your Name *</label>
                                <input type="text" id="name" name="name" required class="form-input" placeholder="John Doe" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Your Email *</label>
                                <input type="email" id="email" name="email" required class="form-input" placeholder="john@example.com" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-input" placeholder="Project Collaboration" value="{{ old('subject') }}">
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message *</label>
                            <textarea id="message" name="message" rows="5" required class="form-textarea" placeholder="Your message here...">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="form-submit-btn">
                            <i class="fas fa-paper-plane submit-icon"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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

[data-theme="light"] {
    --bg-primary: #ffffff;
    --bg-secondary: #f5f7fa;
    --text-primary: #1a202c;
    --text-secondary: #2d3748;
    --text-muted: #4a5568;
    --accent-primary: #00cc7a;
    --accent-secondary: #0099cc;
    --accent-glow: rgba(0, 204, 122, 0.25);
    --border-light: rgba(0, 204, 122, 0.4);
    --card-bg: rgba(0, 204, 122, 0.08);
}

.theme3-contact {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
    position: relative;
    overflow: hidden;
}

.background-pattern {
    background-image: radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
}

.floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 25s ease-in-out infinite;
}

@keyframes particleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
    25% { transform: translate(100px, -80px) scale(1.3); opacity: 0.7; }
    50% { transform: translate(-60px, 120px) scale(0.8); opacity: 0.4; }
    75% { transform: translate(120px, 60px) scale(1.1); opacity: 0.6; }
}

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
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 2px;
    margin: 0 auto;
}

.contact-info-card {
    background: var(--card-bg);
    border: 1.5px solid var(--border-light);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.contact-info-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px rgba(0, 255, 157, 0.2);
}

.contact-icon-wrapper {
    width: 70px;
    height: 70px;
    background: rgba(0, 255, 157, 0.15);
    border: 2px solid var(--accent-primary);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    transition: all 0.3s ease;
}

.contact-icon {
    font-size: 1.75rem;
    color: var(--accent-primary);
}

.contact-info-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.contact-info-value {
    font-size: 0.95rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.social-section {
    padding: 2rem 0;
}

.social-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 2rem;
}

.social-links-grid {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
}

.social-link {
    position: relative;
    width: 60px;
    height: 60px;
    background: var(--card-bg);
    border: 2px solid var(--border-light);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: rgba(0, 255, 157, 0.15);
    border-color: var(--accent-primary);
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0, 255, 157, 0.25);
}

.social-icon {
    font-size: 1.5rem;
}

.social-tooltip {
    position: absolute;
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--bg-primary);
    color: var(--text-primary);
    padding: 0.6rem 0.9rem;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    border: 1px solid var(--border-light);
    z-index: 10;
}

.social-link:hover .social-tooltip {
    opacity: 1;
}

.contact-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1.25rem 2.75rem;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border: none;
    border-radius: 14px;
    color: var(--bg-primary);
    font-weight: 700;
    font-size: 1.125rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(0, 255, 157, 0.3);
}

.contact-cta-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 40px rgba(0, 255, 157, 0.4);
}

.btn-icon {
    transition: transform 0.3s ease;
}

.contact-cta-btn:hover .btn-icon {
    transform: translateX(5px);
}

.contact-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.contact-modal.active {
    display: flex;
    animation: modalFadeIn 0.3s ease-out;
}

.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(8px);
}

.modal-container {
    position: relative;
    background: var(--bg-primary);
    border: 1.5px solid var(--border-light);
    border-radius: 24px;
    max-width: 950px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    animation: modalSlideIn 0.3s ease-out;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

[data-theme="light"] .modal-container {
    background: #ffffff;
    border: 2px solid var(--accent-primary);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2rem;
    border-bottom: 1.5px solid var(--border-light);
    background: var(--bg-primary);
    position: sticky;
    top: 0;
    z-index: 10;
}

.modal-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0;
}

.modal-close-btn {
    width: 44px;
    height: 44px;
    background: rgba(0, 255, 157, 0.12);
    border: 1.5px solid var(--border-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.25rem;
}

.modal-close-btn:hover {
    background: rgba(0, 255, 157, 0.2);
    border-color: var(--accent-primary);
}

.modal-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
}

.contact-details-section,
.contact-form-section {
    padding: 2.5rem;
}

.contact-details-section {
    background: rgba(0, 255, 157, 0.05);
    border-right: 1.5px solid var(--border-light);
}

.section-header {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 2.5rem;
}

.header-icon {
    width: 52px;
    height: 52px;
    background: rgba(0, 255, 157, 0.15);
    border: 2px solid var(--accent-primary);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    font-size: 1.5rem;
    flex-shrink: 0;
}

.section-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 0.35rem 0;
}

.section-description {
    font-size: 0.95rem;
    color: var(--text-secondary);
    margin: 0;
}

.contact-details-list {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    margin-bottom: 2.5rem;
}

.contact-detail-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(0, 255, 157, 0.08);
    border: 1.5px solid var(--border-light);
    border-radius: 12px;
}

.detail-icon {
    width: 44px;
    height: 44px;
    background: rgba(0, 255, 157, 0.15);
    border: 1.5px solid var(--accent-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    font-size: 1rem;
    flex-shrink: 0;
}

.detail-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-muted);
    margin-bottom: 0.2rem;
    text-transform: uppercase;
}

.detail-value {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--text-primary);
}

.response-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1.5px solid var(--accent-primary);
    border-radius: 12px;
}

.info-icon {
    width: 44px;
    height: 44px;
    background: rgba(0, 255, 157, 0.15);
    border: 1.5px solid var(--accent-primary);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    font-size: 1rem;
    flex-shrink: 0;
}

.info-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.2rem;
}

.info-description {
    font-size: 0.85rem;
    color: var(--text-secondary);
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1.75rem;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.65rem;
}

.form-input,
.form-textarea {
    padding: 0.95rem 1.15rem;
    background: rgba(255, 255, 255, 0.08);
    border: 1.5px solid var(--border-light);
    border-radius: 12px;
    color: var(--text-primary);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    resize: none;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--accent-primary);
    background: rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 0 3px rgba(0, 255, 157, 0.15);
}

.form-textarea {
    min-height: 140px;
}

.form-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.85rem;
    padding: 1.1rem 2.25rem;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border: none;
    border-radius: 12px;
    color: var(--bg-primary);
    font-weight: 700;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(0, 255, 157, 0.3);
}

.form-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 255, 157, 0.4);
}

.submit-icon {
    transition: transform 0.3s ease;
    font-size: 1rem;
}

.form-submit-btn:hover .submit-icon {
    transform: translateX(4px);
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modalSlideIn {
    from { opacity: 0; transform: scale(0.92) translateY(-30px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}

@media (max-width: 1024px) {
    .modal-content {
        grid-template-columns: 1fr;
    }
    .contact-details-section {
        border-right: none;
        border-bottom: 1.5px solid var(--border-light);
    }
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    .modal-content {
        display: block;
    }
    .contact-icon-wrapper {
        width: 60px;
        height: 60px;
    }
}

@media (max-width: 480px) {
    .contact-cta-btn {
        width: 100%;
        justify-content: center;
    }
    .form-submit-btn {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        for (let i = 0; i < 8; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particleContainer.appendChild(particle);
        }
    }

    const contactModal = document.getElementById('contactModal');
    const openBtn = document.getElementById('openContactForm');
    const closeBtn = document.getElementById('closeContactForm');
    const modalOverlay = document.getElementById('modalOverlay');

    function openModal() {
        contactModal.style.display = 'flex';
        setTimeout(() => contactModal.classList.add('active'), 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        contactModal.classList.remove('active');
        setTimeout(() => contactModal.style.display = 'none', 300);
        document.body.style.overflow = '';
    }

    openBtn?.addEventListener('click', openModal);
    closeBtn?.addEventListener('click', closeModal);
    modalOverlay?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && contactModal.classList.contains('active')) {
            closeModal();
        }
    });
});
</script>