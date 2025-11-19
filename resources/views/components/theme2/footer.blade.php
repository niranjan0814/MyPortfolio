@props([])

@php
     $user = \App\Models\User::first();
@endphp

<footer class="relative overflow-hidden" style="background: linear-gradient(135deg, var(--bg-secondary), var(--bg-primary));">
    {{-- Animated background --}}
    <div class="absolute inset-0 opacity-10 normal-theme-only">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="relative z-10">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                {{-- Brand & About --}}
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold mb-4 gradient-text">
                        {{ $user->full_name ?? 'Your Name' }}
                    </h2>
                    <p class="mb-6 leading-relaxed" style="color: var(--text-secondary);">
                        {{ $user->description ?? 'Your default description' }}
                    </p>

                    @if($user->location)
                    <div class="flex items-center gap-3 text-sm" style="color: var(--text-muted);">
                        <svg class="w-4 h-4" style="color: var(--accent-blue);" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $user->location }}</span>
                    </div>
                    @endif
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-2" style="color: var(--text-primary);">
                        <svg class="w-5 h-5" style="color: var(--accent-blue);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        Quick Links
                    </h3>
                    <ul class="space-y-3">
                        @foreach(['About Me|#about','Projects|#projects','Skills|#skills','Contact|#contact'] as $link)
                            @php [$text, $url] = explode('|', $link) @endphp
                            <li>
                                <a href="{{ $url }}" class="transition-colors flex items-center gap-2 group hover:opacity-80"
                                   style="color: var(--text-secondary);">
                                    <svg class="w-3 h-3 text-xs group-hover:translate-x-1 transition-transform"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                    {{ $text }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contact Info + Connect With Me (Same Column) --}}
                <div class="space-y-8">
                    {{-- Get In Touch --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2" style="color: var(--text-primary);">
                            <svg class="w-5 h-5" style="color: var(--accent-purple);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            Get In Touch
                        </h3>
                        <ul class="space-y-4">

                            @if($user->phone)
                            <li>
                                <a href="tel:{{ $user->phone }}" class="transition-colors flex items-start gap-3 group hover:opacity-80"
                                   style="color: var(--text-secondary);">
                                    <svg class="w-4 h-4 mt-1" style="color: var(--accent-blue);" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                    <span>{{ $user->phone }}</span>
                                </a>
                            </li>
                            @endif

                            @if($user->email)
                            <li>
                                <a href="mailto:{{ $user->email }}" class="transition-colors flex items-start gap-3 group hover:opacity-80"
                                   style="color: var(--text-secondary);">
                                    <svg class="w-4 h-4 mt-1" style="color: var(--accent-purple);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="break-all">{{ $user->email }}</span>
                                </a>
                            </li>
                            @endif

                            @if($user->address)
                            <li class="flex items-start gap-3" style="color: var(--text-secondary);">
                                <svg class="w-4 h-4 mt-1" style="color: #ef4444;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $user->address }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>

                    {{-- Connect With Me (Now under Get In Touch) --}}
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold mb-3" style="color: var(--text-primary);">Connect With Me</h4>
                        <div class="flex flex-wrap gap-4">

                            @if($user->github_url)
                            <a href="{{ $user->github_url }}" target="_blank"
                               class="group relative w-12 h-12 flex items-center justify-center rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg glass-button"
                               style="background: var(--glass-bg, #1f2937); border: 1px solid var(--glass-border, var(--border-color));">
                                <svg class="w-5 h-5 group-hover:text-white" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none text-xs glass-card"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    GitHub
                                </span>
                            </a>
                            @endif

                            @if($user->linkedin_url)
                            <a href="{{ $user->linkedin_url }}" target="_blank"
                               class="group relative w-12 h-12 flex items-center justify-center rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg glass-button"
                               style="background: var(--glass-bg, #3b82f6); border: 1px solid var(--glass-border, var(--border-color));">
                                <svg class="w-5 h-5" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none text-xs glass-card"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    LinkedIn
                                </span>
                            </a>
                            @endif

                            @if($user->email)
                            <a href="mailto:{{ $user->email }}"
                               class="group relative w-12 h-12 flex items-center justify-center rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg glass-button"
                               style="background: var(--glass-bg, #ef4444); border: 1px solid var(--glass-border, var(--border-color));">
                                <svg class="w-5 h-5" style="color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none text-xs glass-card"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    Email
                                </span>
                            </a>
                            @endif

                            @if($user->phone)
                            <a href="tel:{{ $user->phone }}"
                               class="group relative w-12 h-12 flex items-center justify-center rounded-full transition-all duration-300 hover:scale-110 hover:shadow-lg glass-button"
                               style="background: var(--glass-bg, #10b981); border: 1px solid var(--glass-border, var(--border-color));">
                                <svg class="w-5 h-5" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none text-xs glass-card"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    Phone
                                </span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

        {{-- Bottom Bar --}}
        <div style="border-top: 1px solid var(--border-color); background: var(--bg-secondary);">
            <div class="max-w-7xl mx-auto px-6 md:px-12 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
                    <p class="text-center md:text-left" style="color: var(--text-muted);">
                        © {{ date('Y') }} {{ $user->full_name ?? 'Your Name' }}. All Rights Reserved.
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }

    /* Hide normal theme blobs in monochrome mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
</style>