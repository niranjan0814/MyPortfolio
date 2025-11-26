@props(['user', 'contactContent' => null, 'portfolioOwnerId' => null])

<section id="contact" class="py-24 bg-neutral-950 text-white border-t border-neutral-900 relative overflow-hidden">
    
    <!-- Background grid -->
    <div class="absolute inset-0 opacity-5" 
         style="background-image: linear-gradient(#404040 1px, transparent 1px), linear-gradient(to right, #404040 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <div class="container mx-auto px-6 relative z-10">
        
        <!-- Section Header -->
        <div class="mb-20 text-center">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                Get In Touch<span class="text-lime-400">.</span>
            </h2>
            <p class="text-neutral-500 font-mono uppercase tracking-widest">Let's work together</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            
            <!-- Left: Contact Info -->
            <div class="space-y-8">
                
                <div class="space-y-6">
                    <h3 class="text-3xl font-bold mb-8">Let's create something amazing together.</h3>
                    
                    <p class="text-neutral-400 leading-relaxed">
                        {{ $contactContent['message'] ?? "I'm always interested in hearing about new projects and opportunities. Whether you have a question or just want to say hi, feel free to reach out!" }}
                    </p>
                </div>

                <!-- Contact Details -->
                <div class="space-y-6 pt-8">
                    
                    @if($user->email ?? false)
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 border border-neutral-800 bg-neutral-900 flex items-center justify-center group-hover:border-lime-400 transition-colors">
                                <svg class="w-6 h-6 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-1">Email</h4>
                                <a href="mailto:{{ $user->email }}" class="text-white hover:text-lime-400 transition-colors font-mono">
                                    {{ $user->email }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($user->phone ?? false)
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 border border-neutral-800 bg-neutral-900 flex items-center justify-center group-hover:border-lime-400 transition-colors">
                                <svg class="w-6 h-6 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-1">Phone</h4>
                                <a href="tel:{{ $user->phone }}" class="text-white hover:text-lime-400 transition-colors font-mono">
                                    {{ $user->phone }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($user->location ?? false)
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 border border-neutral-800 bg-neutral-900 flex items-center justify-center group-hover:border-lime-400 transition-colors">
                                <svg class="w-6 h-6 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-1">Location</h4>
                                <p class="text-white font-mono">{{ $user->location }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Social Links -->
                @if($user->linkedin_url || $user->github_url)
                    <div class="pt-8 border-t border-neutral-800">
                        <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-6">Connect</h4>
                        <div class="flex gap-4">
                            @if($user->linkedin_url)
                                <a href="{{ $user->linkedin_url }}" 
                                   target="_blank" 
                                   class="w-12 h-12 border border-neutral-800 bg-neutral-900 flex items-center justify-center hover:border-lime-400 hover:bg-neutral-950 transition-colors group">
                                    <svg class="w-6 h-6 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                            @endif
                            
                            @if($user->github_url)
                                <a href="{{ $user->github_url }}" 
                                   target="_blank" 
                                   class="w-12 h-12 border border-neutral-800 bg-neutral-900 flex items-center justify-center hover:border-lime-400 hover:bg-neutral-950 transition-colors group">
                                    <svg class="w-6 h-6 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right: Contact Form -->
            <div class="bg-neutral-900 border border-neutral-800 p-8">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="portfolio_user_id" value="{{ $user->id }}">
                    
                    <div>
                        <label for="name" class="block text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Name</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required 
                               value="{{ old('name') }}"
                               class="w-full bg-neutral-950 border border-neutral-800 px-4 py-3 text-white focus:border-lime-400 focus:outline-none transition-colors">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required 
                               value="{{ old('email') }}"
                               class="w-full bg-neutral-950 border border-neutral-800 px-4 py-3 text-white focus:border-lime-400 focus:outline-none transition-colors">
                    </div>

                    <div>
                        <label for="subject" class="block text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Subject</label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="{{ old('subject') }}"
                               class="w-full bg-neutral-950 border border-neutral-800 px-4 py-3 text-white focus:border-lime-400 focus:outline-none transition-colors">
                    </div>

                    <div>
                        <label for="message" class="block text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Message</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="6" 
                                  required 
                                  class="w-full bg-neutral-950 border border-neutral-800 px-4 py-3 text-white focus:border-lime-400 focus:outline-none transition-colors resize-none">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" 
                            class="w-full bg-white text-black font-bold py-4 hover:bg-lime-400 transition-colors uppercase tracking-widest text-sm">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
