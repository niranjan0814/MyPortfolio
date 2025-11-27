@php
    /** @var \App\Models\User $user */
    /** @var \App\Models\Blog $post */
@endphp

@extends('layouts.app')

@section('content')
    <article class="min-h-screen bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 py-10">
            <a href="{{ route('portfolio.blog.index', $user) }}"
                class="inline-flex items-center text-sm text-gray-500 hover:text-gray-800 mb-6">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to blog
            </a>

            <header class="mb-6">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                    {{ $post->title }}
                </h1>

                @if ($post->published_at)
                    <p class="mt-2 text-sm text-gray-500">
                        Published on {{ $post->published_at->format('F j, Y') }}
                    </p>
                @endif
            </header>

            @if ($post->hero_image_path)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}"
                        class="w-full h-72 md:h-80 object-cover">
                </div>
            @endif

            <div class="prose prose-orange max-w-none">
                {!! $post->content !!}
            </div>
        </div>
    </article>
@endsection