@props(['user'])

@if($user && $user->hasCv())
    <!-- CV Download/View Section -->
    <div class="flex flex-wrap gap-4 justify-center items-center">
        
        <!-- Download CV Button - Better Contrast -->
        <a href="{{ route('cv.public.download', $user->id) }}" 
           class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-emerald-600 via-green-600 to-teal-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border-2 border-emerald-700"
           download>
            <svg class="w-6 h-6 relative z-10 group-hover:translate-y-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
            <span class="relative z-10 drop-shadow-lg">Download CV</span>
            <div class="absolute inset-0 bg-gradient-to-r from-teal-700 via-emerald-700 to-green-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- View CV Button - High Contrast -->
        <a href="{{ route('cv.public.view', $user->id) }}" 
           target="_blank"
           class="group inline-flex items-center gap-3 bg-white text-gray-800 px-8 py-4 rounded-full font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-300 hover:border-emerald-500 hover:bg-emerald-50">
            <svg class="w-6 h-6 text-emerald-600 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-800">View CV</span>
        </a>
    </div>
@endif