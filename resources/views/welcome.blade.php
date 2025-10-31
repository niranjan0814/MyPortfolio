@extends('layouts.app')

@section('content')
    <x-hero 
        :heroContent="$heroContent" 
        :techStackSkills="$techStackSkills" 
    />
    <x-about :aboutContent="$aboutContent" />
    <x-projects :projects="$projects" />
    <x-skills :skills="$skills" />
    <x-experience :experiences="$experiences" />
    <x-education :educations="$educations" />
    <x-contact :contactContent="$contactContent" />
@endsection