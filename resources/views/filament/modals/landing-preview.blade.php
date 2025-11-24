<div class="bg-gray-100 rounded-lg overflow-hidden">

    <!-- Modal Header -->
    <div class="bg-white border-b px-4 py-2 flex items-center justify-between">
        <span class="text-sm font-semibold text-gray-700">Preview Mode</span>

        <a href="{{ route('landing.index') }}" 
           target="_blank" 
           class="text-sm text-blue-600 hover:text-blue-800">
            Open in New Tab
        </a>
    </div>

    <!-- Live Landing Page Preview -->
    <iframe 
        src="{{ route('landing.index') }}?preview=1"
        class="w-full border-0"
        style="height: 70vh;"
        sandbox="allow-same-origin allow-scripts allow-forms"
    ></iframe>

</div>
