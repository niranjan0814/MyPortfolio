@extends('layouts.app')

@section('content')
    @php
        // Get theme from passed variable or user settings
        $activeTheme = $theme ?? $user->active_theme ?? 'theme1';
        
        // Allow preview mode
        if (request('preview') && request('theme')) {
            $activeTheme = request('theme');
        }
    @endphp

    {{-- Load theme-specific blog show component --}}
    <x-dynamic-component 
        :component="$activeTheme . '.blog-show'" 
        :user="$user"
        :post="$post"
        :headerContent="$headerContent ?? []"
        :footerContent="$footerContent ?? []"
    />
@endsection