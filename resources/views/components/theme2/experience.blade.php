@props(['experiences'])

<section id="experience" class="py-24 bg-neutral-950 text-white border-t border-neutral-900">
    <div class="container mx-auto px-6">
        
        <!-- Section Header -->
        <div class="mb-20 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                    Experience<span class="text-lime-400">.</span>
                </h2>
                <p class="text-neutral-500 font-mono uppercase tracking-widest">My professional journey</p>
            </div>
            
            <!-- Decorative line -->
            <div class="hidden md:block flex-1 h-[1px] bg-neutral-800 mx-12 mb-4"></div>
        </div>

        @if($experiences->isEmpty())
            <div class="p-12 border border-dashed border-neutral-800 text-center">
                <p class="text-neutral-500 font-mono">No experience data available.</p>
            </div>
        @else
            <div class="space-y-0">
                @foreach($experiences as $index => $experience)
                    <div class="group relative border-l border-neutral-800 pl-8 md:pl-12 py-12 last:pb-0 hover:border-lime-400 transition-colors duration-500">
                        
                        <!-- Timeline Dot -->
                        <div class="absolute left-[-5px] top-16 w-2.5 h-2.5 bg-neutral-800 rounded-full group-hover:bg-lime-400 group-hover:scale-150 transition-all duration-300"></div>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                            
                            <!-- Date & Company -->
                            <div class="md:col-span-4 lg:col-span-3">
                                <span class="inline-block px-3 py-1 bg-neutral-900 text-lime-400 text-xs font-mono font-bold uppercase tracking-widest mb-3 border border-neutral-800 group-hover:border-lime-400/50 transition-colors">
                                    {{ $experience->duration ?? 'Ongoing' }}
                                </span>
                                <h3 class="text-2xl font-bold text-white mb-1">{{ $experience->company }}</h3>
                                <p class="text-neutral-500 text-sm font-mono">{{ $experience->location ?? 'Remote' }}</p>
                            </div>

                            <!-- Role & Details -->
                            <div class="md:col-span-8 lg:col-span-9">
                                <h4 class="text-3xl font-bold text-neutral-200 mb-6 group-hover:text-lime-400 transition-colors">
                                    {{ $experience->role }}
                                </h4>
                                <div class="text-neutral-400 leading-relaxed max-w-3xl">
                                    {{ $experience->details }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
