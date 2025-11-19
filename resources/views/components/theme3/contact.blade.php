@props([])

@php
     $user = \App\Models\User::first();
@endphp

<section id="contact" class="section-full py-20 relative overflow-hidden" 
         style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));" 
         aria-labelledby="contact-heading">
    
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5 normal-theme-only">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto max-w-4xl fade-in px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 id="contact-heading" class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Get In Touch</h2>
            <div class="h-1 w-32 mx-auto rounded-full"
                 style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));"></div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-lg text-center font-medium animate-fade-in glass-card" 
                 style="background: var(--glass-bg, #d1fae5); color: #065f46; border: 1px solid var(--glass-border, #10b981);"
                 role="alert">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 px-4 py-3 rounded-lg animate-shake glass-card" 
                 style="background: var(--glass-bg, #fee2e2); color: #991b1b; border: 1px solid var(--glass-border, #ef4444);"
                 role="alert">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Contact Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @if($user->email)
                <div class="contact-card p-6 rounded-xl text-center group glass-card transition-all duration-300">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform glass-card"
                         style="background: var(--glass-bg, #dbeafe); border: 1px solid var(--glass-border, transparent);">
                        <svg class="w-6 h-6" style="color: var(--accent-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2" style="color: var(--text-primary);">Email Me</h3>
                    <p class="text-sm break-all" style="color: var(--text-secondary);">{{ $user->email }}</p>
                </div>
            @endif

            @if($user->phone)
                <div class="contact-card p-6 rounded-xl text-center group glass-card transition-all duration-300">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform glass-card"
                         style="background: var(--glass-bg, #d1fae5); border: 1px solid var(--glass-border, transparent);">
                        <svg class="w-6 h-6" style="color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2" style="color: var(--text-primary);">Call Me</h3>
                    <p class="text-sm" style="color: var(--text-secondary);">{{ $user->phone }}</p>
                </div>
            @endif

            @if($user->address)
                <div class="contact-card p-6 rounded-xl text-center group glass-card transition-all duration-300">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform glass-card"
                         style="background: var(--glass-bg, #e9d5ff); border: 1px solid var(--glass-border, transparent);">
                        <svg class="w-6 h-6" style="color: var(--accent-purple);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2" style="color: var(--text-primary);">Location</h3>
                    <p class="text-sm" style="color: var(--text-secondary);">{{ $user->address }}</p>
                </div>
            @endif
        </div>

        <!-- Social Links - GITHUB ICON FIX -->
        @if($user->linkedin_url|| $user->github_url)
            <div class="text-center mb-12">
                <h3 class="text-xl font-semibold mb-4" style="color: var(--text-primary);">Follow Me</h3>
                <div class="flex justify-center gap-4">
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" rel="noopener noreferrer" 
                           class="social-link-contact p-3 rounded-lg glass-button transition-all duration-300 transform group">
                            <svg class="w-5 h-5" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    @endif
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" rel="noopener noreferrer"
                           class="social-link-contact p-3 rounded-lg glass-button transition-all duration-300 transform group">
                            <svg class="w-5 h-5 github-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <!-- Open Popup Button -->
        <div class="text-center">
            <button id="openPopup"
                class="theme-btn py-4 px-10 rounded-xl font-bold text-lg transition-all duration-300 transform focus:outline-none focus:ring-4"
                aria-haspopup="dialog"
                aria-controls="contactPopup">
                Send Message
                <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Fixed Popup Modal - Moved outside main container -->
    <div id="contactPopup"
        class="fixed inset-0 hidden flex items-center justify-center z-[9999] p-4 transition-opacity duration-300"
        style="background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(8px);"
        role="dialog"
        aria-modal="true"
        aria-labelledby="popup-heading">
        
        <div class="rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 glass-card glass-noise"
             style="background: var(--card-bg); border: 1px solid var(--border-color);"
             @click.stop>
            
            <!-- Close Button -->
            <div class="flex justify-end p-4 sticky top-0 rounded-t-2xl z-10"
                 style="background: var(--card-bg); border-bottom: 1px solid var(--border-color);">
                <button id="closePopup" 
                        class="text-3xl font-light transition-colors duration-200 w-8 h-8 flex items-center justify-center rounded-full hover:bg-opacity-10 focus:outline-none focus:ring-2"
                        style="color: var(--text-muted); hover:background: var(--glass-bg);"
                        aria-label="Close contact form">
                    &times;
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
                
                <!-- Left: Contact Info -->
                <div class="p-6 rounded-xl glass-card"
                     style="background: var(--glass-bg, var(--bg-gradient-start)); border: 1px solid var(--border-color);">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="p-3 rounded-xl shadow-md glass-card"
                             style="background: var(--glass-bg, var(--accent-blue)); border: 1px solid var(--glass-border, transparent);">
                            <svg class="w-6 h-6" style="color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a2 2 0 01-2 2h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 id="popup-heading" class="text-2xl font-bold gradient-text">Let's Connect</h3>
                            <p class="mt-1" style="color: var(--text-secondary);">I'm always open to discussing new opportunities and ideas.</p>
                        </div>
                    </div>

                    <ul class="space-y-5">
                        @if($user->phone)
                            <li class="flex items-center justify-between group">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg glass-card"
                                         style="background: var(--glass-bg, #dbeafe); border: 1px solid var(--glass-border, transparent);">
                                        <svg class="w-4 h-4" style="color: var(--accent-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium" style="color: var(--text-primary);">Phone</p>
                                        <p class="text-sm" style="color: var(--text-secondary);">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </li>
                        @endif

                        @if($user->email)
                            <li class="flex items-center justify-between group">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-lg glass-card"
                                         style="background: var(--glass-bg, #d1fae5); border: 1px solid var(--glass-border, transparent);">
                                        <svg class="w-4 h-4" style="color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium" style="color: var(--text-primary);">Email</p>
                                        <p class="text-sm break-all" style="color: var(--text-secondary);">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Response Time Info -->
                    <div class="mt-8 p-4 rounded-lg glass-card"
                         style="background: var(--card-bg); border: 1px solid var(--border-color);">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg glass-card"
                                 style="background: var(--glass-bg, #dbeafe); border: 1px solid var(--glass-border, transparent);">
                                <svg class="w-4 h-4" style="color: var(--accent-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-sm" style="color: var(--text-primary);">Quick Response</p>
                                <p class="text-xs" style="color: var(--text-secondary);">Typically replies within 24 hours</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="p-6 rounded-xl glass-card"
                     style="background: var(--glass-bg, var(--bg-gradient-end)); border: 1px solid var(--border-color);">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="p-3 rounded-xl shadow-md glass-card"
                             style="background: var(--glass-bg, #10b981); border: 1px solid var(--glass-border, transparent);">
                            <svg class="w-6 h-6" style="color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold gradient-text">Send a Message</h3>
                            <p class="mt-1" style="color: var(--text-secondary);">Fill out the form below and I'll get back to you soon.</p>
                        </div>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5" id="contactForm">
                        @csrf
                        <div>
                            <label for="name" class="block font-medium mb-2" style="color: var(--text-primary);">Your Name *</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 rounded-lg outline-none transition-all duration-200 glass-card"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);"
                                placeholder="John Doe"
                                value="{{ old('name') }}"
                                aria-required="true">
                        </div>

                        <div>
                            <label for="email" class="block font-medium mb-2" style="color: var(--text-primary);">Your Email *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 rounded-lg outline-none transition-all duration-200 glass-card"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);"
                                placeholder="john@example.com"
                                value="{{ old('email') }}"
                                aria-required="true">
                        </div>

                        <div>
                            <label for="subject" class="block font-medium mb-2" style="color: var(--text-primary);">Subject</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full px-4 py-3 rounded-lg outline-none transition-all duration-200 glass-card"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);"
                                placeholder="Project Collaboration"
                                value="{{ old('subject') }}">
                        </div>

                        <div>
                            <label for="message" class="block font-medium mb-2" style="color: var(--text-primary);">Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 rounded-lg outline-none transition-all duration-200 resize-none glass-card"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);"
                                placeholder="Hi {{ $user->name ?? 'there' }}, I'd love to discuss..."
                                aria-required="true">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="theme-btn w-full py-3 rounded-lg font-bold text-lg transition-all duration-300 focus:outline-none focus:ring-4 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                            <span class="flex items-center justify-center gap-2">
                                <svg id="submitIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                                Send Message
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popup = document.getElementById('contactPopup');
            const openBtn = document.getElementById('openPopup');
            const closeBtn = document.getElementById('closePopup');
            const body = document.body;

            function openPopup() {
                popup.classList.remove('hidden');
                // Prevent background scrolling
                body.style.overflow = 'hidden';
                body.style.position = 'fixed';
                body.style.width = '100%';
                body.style.height = '100%';
                
                setTimeout(() => {
                    popup.style.opacity = '1';
                    popup.querySelector('.glass-card').style.transform = 'scale(1)';
                }, 10);
            }

            function closePopup() {
                popup.style.opacity = '0';
                popup.querySelector('.glass-card').style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    popup.classList.add('hidden');
                    // Restore background scrolling
                    body.style.overflow = '';
                    body.style.position = '';
                    body.style.width = '';
                    body.style.height = '';
                }, 300);
            }

            openBtn?.addEventListener('click', openPopup);
            closeBtn?.addEventListener('click', closePopup);

            popup?.addEventListener('click', (e) => {
                if (e.target === popup) closePopup();
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !popup?.classList.contains('hidden')) {
                    closePopup();
                }
            });
        });
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
        
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }

        /* Contact Cards - GlassUI.dev style hover */
        .contact-card {
            transition: all 0.3s ease;
        }
        
        [data-theme="normal"] .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
        
        [data-theme="monochrome"] .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 48px rgba(255, 255, 255, 0.1);
        }

        /* Social Links - GitHub icon visibility fix */
        .social-link-contact {
            transition: all 0.3s ease;
        }
        
        [data-theme="normal"] .social-link-contact:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 24px rgba(59, 130, 246, 0.2);
        }
        
        [data-theme="monochrome"] .social-link-contact:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 48px rgba(255, 255, 255, 0.15);
        }

        /* GitHub icon color fix */
        [data-theme="normal"] .github-icon {
            color: #1a202c !important;
        }
        
        [data-theme="monochrome"] .github-icon {
            color: #ffffff !important;
        }

        /* Hide normal theme blobs in monochrome mode */
        [data-theme="monochrome"] .normal-theme-only {
            display: none;
        }

        /* Popup specific styles */
        #contactPopup {
            z-index: 9999 !important;
        }

        #contactPopup .glass-card {
            z-index: 10000 !important;
        }
    </style>
</section>