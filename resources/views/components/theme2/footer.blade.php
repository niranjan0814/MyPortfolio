@props(['user' => null])

<footer class="bg-black text-white border-t border-neutral-900">
    <div class="container mx-auto px-6 py-12">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            <!-- Brand -->
            <div>
                <h3 class="text-2xl font-bold mb-4">
                    {{ $user->name ?? 'Portfolio' }}<span class="text-lime-400">.</span>
                </h3>
                <p class="text-neutral-500 text-sm leading-relaxed">
                    Building digital experiences that make a difference.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-4">Navigate</h4>
                <ul class="space-y-2">
                    @foreach(['About', 'Projects', 'Skills', 'Experience', 'Contact'] as $link)
                        <li>
                            <a href="#{{ strtolower($link) }}" class="text-neutral-400 hover:text-lime-400 transition-colors text-sm font-mono">
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-4">Connect</h4>
                <ul class="space-y-2">
                    @if($user->email ?? false)
                        <li>
                            <a href="mailto:{{ $user->email }}" class="text-neutral-400 hover:text-lime-400 transition-colors text-sm font-mono">
                                {{ $user->email }}
                            </a>
                        </li>
                    @endif
                    @if($user->phone ?? false)
                        <li>
                            <a href="tel:{{ $user->phone }}" class="text-neutral-400 hover:text-lime-400 transition-colors text-sm font-mono">
                                {{ $user->phone }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-neutral-900 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-neutral-600 text-xs font-mono">
                © {{ date('Y') }} {{ $user->name ?? 'Portfolio' }}. All rights reserved.
            </p>
            
            <div class="flex gap-4">
                <a href="#" class="text-neutral-600 hover:text-lime-400 transition-colors text-xs font-mono">Privacy</a>
                <span class="text-neutral-800">|</span>
                <a href="#" class="text-neutral-600 hover:text-lime-400 transition-colors text-xs font-mono">Terms</a>
            </div>
        </div>
    </div>
</footer>
