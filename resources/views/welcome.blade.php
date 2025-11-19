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

    <x-dynamic-component :component="'components.' . $theme . '.hero'" 
        :heroContent="$heroContent" 
        :techStackSkills="$techStackSkills"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.about'" 
        :aboutContent="$aboutContent"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.projects'" 
        :projects="$projects"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.skills'" 
        :skills="$skills"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.experience'" 
        :experiences="$experiences"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.education'" 
        :educations="$educations"
        :user="$user"
    />
    
    <x-dynamic-component :component="'components.' . $theme . '.contact'" 
        :contactContent="$contactContent"
        :user="$user"
    />
@endsection