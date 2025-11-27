@php
    /** @var \App\Models\User $user */
    /** @var \Illuminate\Pagination\LengthAwarePaginator $posts */
@endphp

@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 py-10">
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                    {{ $user->full_name ?? $user->name }}'s Blog
                </h1>
                <p class="mt-2 text-gray-600">
                    Insights, stories, and case studies from recent work.
                </p>
            </div>

            @if ($posts->isEmpty())
                <div class="bg-white rounded-xl shadow-sm border border-dashed border-gray-300 p-8 text-center">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">No posts yet</h2>
                    <p class="text-gray-500">
                        This premium blog section will display posts once they are published from the admin panel.
                    </p>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($posts as $post)
                        <a href="{{ route('portfolio.blog.show', [$user, $post]) }}"
                            class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-150 flex flex-col">
                            @if ($post->hero_image_path)
                                <div class="h-40 w-full overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                                </div>
                            @endif

                            <div class="p-5 flex-1 flex flex-col">
                                <h2 class="text-lg font-semibold text-gray-900 group-hover:text-orange-600">
                                    {{ $post->title }}
                                </h2>

                                @if ($post->published_at)
                                    <p class="mt-1 text-xs text-gray-500">
                                        {{ $post->published_at->format('M j, Y') }}
                                    </p>
                                @endif

                                @if ($post->excerpt)
                                    <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                                <div class="mt-4 flex items-center text-sm font-medium text-orange-600">
                                    Read more
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection