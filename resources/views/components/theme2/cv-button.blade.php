@props(['user'])

@if($user->hasCv())
    <div class="fixed bottom-8 right-8 z-50 flex flex-col gap-3">
        
        <!-- Download CV Button -->
        <a href="{{ route('cv.public.download', $user->id) }}" 
           class="group relative bg-lime-400 text-black p-4 hover:bg-lime-300 transition-all duration-300 shadow-lg hover:shadow-xl"
           title="Download CV">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
            
            <!-- Tooltip -->
            <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-black text-white text-xs font-mono px-3 py-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                Download CV
            </span>
        </a>

        <!-- View CV Button -->
        <a href="{{ route('cv.public.view', $user->id) }}" 
           target="_blank"
           class="group relative bg-neutral-900 text-white border border-neutral-700 p-4 hover:border-lime-400 hover:bg-neutral-950 transition-all duration-300 shadow-lg"
           title="View CV">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
            </svg>
            
            <!-- Tooltip -->
            <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-black text-white text-xs font-mono px-3 py-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                View CV
            </span>
        </a>
    </div>
@endif
