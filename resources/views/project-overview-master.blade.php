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

    {{-- Load theme-specific project overview component --}}
    <x-dynamic-component 
        :component="$activeTheme . '.project-overview'" 
        :user="$user"
        :project="$project"
        :overview="$overview"
        :techStackSkills="$techStackSkills"
        :headerContent="$headerContent ?? []"
        :footerContent="$footerContent ?? []"
    />
@endsection