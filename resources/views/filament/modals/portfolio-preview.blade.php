<div class="bg-gray-100 rounded-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-white border-b px-4 py-2 flex items-center justify-between">
        <span class="text-sm font-semibold text-gray-700">Portfolio Preview</span>

        <a href="{{ url('/portfolio/' . auth()->user()->slug) }}" 
           target="_blank" 
           class="text-sm text-blue-600 hover:text-blue-800">
            Open in New Tab
        </a>
    </div>

    <!-- Preview Iframe -->
    <iframe 
        src="{{ url('/portfolio/' . auth()->user()->slug) }}?preview=true"
        class="w-full border-0"
        style="height: 70vh;"
        sandbox="allow-same-origin allow-scripts allow-forms allow-popups"
    ></iframe>

</div>
