@props(['educations'])

<section id="education" class="py-24 bg-neutral-900 text-white border-t border-neutral-800">
    <div class="container mx-auto px-6">
        
        <!-- Section Header -->
        <div class="mb-20">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                Education<span class="text-lime-400">.</span>
            </h2>
            <div class="w-full h-[1px] bg-neutral-800"></div>
        </div>

        @if($educations->isEmpty())
            <div class="p-12 border border-dashed border-neutral-800 text-center">
                <p class="text-neutral-500 font-mono">No education data available.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($educations->sortByDesc('year') as $education)
                    <div class="group relative bg-neutral-950 border border-neutral-800 p-8 hover:border-lime-400 transition-all duration-300">
                        
                        <!-- Year Badge -->
                        <div class="absolute top-0 right-0 bg-lime-400 text-black px-4 py-1 text-xs font-bold font-mono">
                            {{ $education->year ?: 'Present' }}
                        </div>

                        <!-- Icon -->
                        @if($education->icon_url)
                            <div class="w-16 h-16 mb-6 mt-4 flex items-center justify-center border border-neutral-800 bg-neutral-900 group-hover:border-lime-400 transition-colors">
                                <img src="{{ $education->icon_url }}" alt="Education Icon" class="w-10 h-10 object-contain opacity-70 group-hover:opacity-100 transition-opacity">
                            </div>
                        @endif

                        <!-- Content -->
                        <h3 class="text-2xl font-bold mb-3 text-white group-hover:text-lime-400 transition-colors">
                            {{ $education->degree }}
                        </h3>
                        
                        <p class="text-neutral-400 font-mono text-sm mb-4">
                            {{ $education->institution }}
                        </p>

                        @if($education->details)
                            <p class="text-neutral-500 text-sm leading-relaxed border-t border-neutral-800 pt-4 mt-4">
                                {{ $education->details }}
                            </p>
                        @endif

                        <!-- Decorative Corner -->
                        <div class="absolute bottom-0 left-0 w-8 h-8 border-l-2 border-b-2 border-neutral-800 group-hover:border-lime-400 transition-colors"></div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
