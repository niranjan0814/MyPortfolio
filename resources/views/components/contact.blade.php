{{-- resources/views/components/contact.blade.php --}}
@props([])

@php
    $user = auth()->user();
@endphp

<section id="contact" class="section-full bg-white py-20" aria-labelledby="contact-heading">
    <div class="container mx-auto max-w-4xl fade-in px-4">
        <h2 id="contact-heading" class="text-4xl md:text-5xl font-bold mb-12 text-center text-gray-800">Get In Touch</h2>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-center font-medium animate-fade-in" role="alert">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg animate-shake" role="alert">
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
                <div class="bg-blue-50 p-6 rounded-xl border border-blue-200 text-center group hover:shadow-lg transition-all duration-300">
                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Email Me</h3>
                    <p class="text-gray-600 text-sm break-all">{{ $user->email }}</p>
                </div>
            @endif

            @if($user->phone)
                <div class="bg-green-50 p-6 rounded-xl border border-green-200 text-center group hover:shadow-lg transition-all duration-300">
                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Call Me</h3>
                    <p class="text-gray-600 text-sm">{{ $user->phone }}</p>
                </div>
            @endif

            @if($user->address)
                <div class="bg-purple-50 p-6 rounded-xl border border-purple-200 text-center group hover:shadow-lg transition-all duration-300">
                    <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Location</h3>
                    <p class="text-gray-600 text-sm">{{ $user->address }}</p>
                </div>
            @endif
        </div>

        <!-- Social Links -->
        @if($user->linkedin_url || $user->github_url)
            <div class="text-center mb-12">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Follow Me</h3>
                <div class="flex justify-center gap-4">
                    @if($user->linkedin_url)
                        <a href="{{ $user->linkedin_url }}" target="_blank" rel="noopener noreferrer" 
                           class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg group">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    @endif
                    @if($user->github_url)
                        <a href="{{ $user->github_url }}" target="_blank" rel="noopener noreferrer"
                           class="bg-gray-800 text-white p-3 rounded-lg hover:bg-gray-900 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg group">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
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
                class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-4 px-10 rounded-xl font-bold text-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-blue-300"
                aria-haspopup="dialog"
                aria-controls="contactPopup">
                Send Message
                <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </div>

        <!-- Popup Modal -->
        <div id="contactPopup"
            class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 p-4 transition-opacity duration-300"
            role="dialog"
            aria-modal="true"
            aria-labelledby="popup-heading">
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto border border-gray-200 transform transition-all duration-300 scale-95"
                 @click.stop>
                
                <!-- Close Button -->
                <div class="flex justify-end p-4 sticky top-0 bg-white border-b border-gray-200 rounded-t-2xl">
                    <button id="closePopup" 
                            class="text-gray-500 hover:text-gray-800 text-3xl font-light transition-colors duration-200 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                            aria-label="Close contact form">
                        &times;
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
                    
                    <!-- Left: Contact Info -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-blue-600 text-white p-3 rounded-xl shadow-md">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 id="popup-heading" class="text-2xl font-bold text-blue-700">Let's Connect</h3>
                                <p class="text-gray-600 mt-1">I'm always open to discussing new opportunities and ideas.</p>
                            </div>
                        </div>

                        <ul class="space-y-5 text-gray-700">
                            @if($user->phone)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-blue-100 p-2 rounded-lg">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium">Phone</p>
                                            <p class="text-sm text-gray-600">{{ $user->phone }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if($user->email)
                                <li class="flex items-center justify-between group">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-green-100 p-2 rounded-lg">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium">Email</p>
                                            <p class="text-sm text-gray-600 break-all">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <!-- Response Time Info -->
                        <div class="mt-8 p-4 bg-white rounded-lg border border-blue-200">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-100 p-2 rounded-lg">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-sm">Quick Response</p>
                                    <p class="text-xs text-gray-600">Typically replies within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Contact Form -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-green-600 text-white p-3 rounded-xl shadow-md">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-green-700">Send a Message</h3>
                                <p class="text-gray-600 mt-1">Fill out the form below and I'll get back to you soon.</p>
                            </div>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5" id="contactForm">
                            @csrf
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name *</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all duration-200"
                                    placeholder="John Doe"
                                    value="{{ old('name') }}"
                                    aria-required="true">
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Your Email *</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all duration-200"
                                    placeholder="john@example.com"
                                    value="{{ old('email') }}"
                                    aria-required="true">
                            </div>

                            <div>
                                <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all duration-200"
                                    placeholder="Project Collaboration"
                                    value="{{ old('subject') }}">
                            </div>

                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all duration-200 resize-none"
                                    placeholder="Hi {{ $user->name ?? 'there' }}, I'd love to discuss..."
                                    aria-required="true">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" id="submitBtn"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                <span class="flex items-center justify-center gap-2">
                                    <svg id="submitIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                    Send Message
                                </span>
                                <span id="submitSpinner" class="hidden">
                                    <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>
                    </div>
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
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitIcon = document.getElementById('submitIcon');
            const submitSpinner = document.getElementById('submitSpinner');

            // Modal functionality
            function openPopup() {
                popup.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    popup.style.opacity = '1';
                    popup.querySelector('.bg-white').style.transform = 'scale(1)';
                }, 10);
                popup.focus();
            }

            function closePopup() {
                popup.style.opacity = '0';
                popup.querySelector('.bg-white').style.transform = 'scale(0.95)';
                setTimeout(() => {
                    popup.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    openBtn.focus();
                }, 300);
            }

            openBtn.addEventListener('click', openPopup);
            closeBtn.addEventListener('click', closePopup);

            popup.addEventListener('click', (e) => {
                if (e.target === popup) closePopup();
            });

            // Enhanced keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
                    closePopup();
                }
                // Trap focus within modal when open
                if (e.key === 'Tab' && !popup.classList.contains('hidden')) {
                    const focusableElements = popup.querySelectorAll(
                        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                    );
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];

                    if (e.shiftKey) {
                        if (document.activeElement === firstElement) {
                            lastElement.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            firstElement.focus();
                            e.preventDefault();
                        }
                    }
                }
            });

            // Form submission handling
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    const form = e.target;
                    const formData = new FormData(form);
                    
                    // Basic client-side validation
                    const requiredFields = form.querySelectorAll('[required]');
                    let isValid = true;
                    
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            isValid = false;
                            field.classList.add('border-red-500');
                        } else {
                            field.classList.remove('border-red-500');
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        return;
                    }

                    // Show loading state
                    submitBtn.disabled = true;
                    submitIcon.classList.add('hidden');
                    submitSpinner.classList.remove('hidden');
                    submitBtn.querySelector('span:first-child').classList.add('hidden');
                });
            }

            // Auto-hide success message after 5 seconds
            const successMessage = document.querySelector('[role="alert"]');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    successMessage.style.transform = 'translateY(-10px)';
                    setTimeout(() => successMessage.remove(), 300);
                }, 5000);
            }
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
        
        .section-full {
            scroll-margin-top: 2rem;
        }
        
        /* Smooth scrolling for anchor links */
        html {
            scroll-behavior: smooth;
        }
    </style>
</section>