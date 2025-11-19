@extends('layouts.app')

@section('content')
    @php
        // Get theme from user settings or default to theme1
        $theme = $user->active_theme ?? 'theme1';
        
        // Allow preview mode
        if (request('preview') && request('theme')) {
            $theme = request('theme');
        }
    @endphp

    {{-- Hero Section --}}
    <x-dynamic-component 
        :component="$theme . '.hero'" 
        :heroContent="$heroContent" 
        :techStackSkills="$techStackSkills"
        :user="$user"
    />
    
    {{-- About Section --}}
    <x-dynamic-component 
        :component="$theme . '.about'" 
        :aboutContent="$aboutContent"
        :user="$user"
    />
    
    {{-- Projects Section --}}
    <x-dynamic-component 
        :component="$theme . '.projects'" 
        :projects="$projects"
        :user="$user"
    />
    
    {{-- Skills Section --}}
    <x-dynamic-component 
        :component="$theme . '.skills'" 
        :skills="$skills"
        :user="$user"
    />
    
    {{-- Experience Section --}}
    <x-dynamic-component 
        :component="$theme . '.experience'" 
        :experiences="$experiences"
        :user="$user"
    />
    
    {{-- Education Section --}}
    <x-dynamic-component 
        :component="$theme . '.education'" 
        :educations="$educations"
        :user="$user"
    />
    
    {{-- Contact Section --}}
    <x-dynamic-component 
        :component="$theme . '.contact'" 
        :contactContent="$contactContent"
        :user="$user"
    />
@endsection