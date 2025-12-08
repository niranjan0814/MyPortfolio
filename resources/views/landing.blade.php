<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['footer_company_name'] ?? 'Detech Portfolio System' }} - Get Started</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .animated-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
        }

        .theme-card-hover {
            transition: all 0.3s ease;
        }

        .theme-card-hover:hover {
            transform: translateY(-8px);
        }

        .floating-shape {
            position: absolute;
            opacity: 0.05;
            animation: float 4s ease-in-out infinite;
        }

        .contact-input-focus:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
            border-color: #D97706;
        }

        .btn-primary {
            background: linear-gradient(135deg, #D97706 0%, #B45309 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(217, 119, 6, 0.3);
        }

        .btn-secondary {
            border: 2px solid #C4702A;
            color: #C4702A;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #C4702A;
            color: white;
            transform: translateY(-2px);
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(217, 119, 6, 0.1) 0%, rgba(180, 83, 9, 0.05) 100%);
            border: 1px solid rgba(217, 119, 6, 0.2);
        }
        .animated-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navigation -->

<!-- Navigation -->
<nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
    <div class="container mx-auto px-6 md:px-12 py-3 md:py-4 flex justify-between items-center">

        <!-- Left: Logo + Name -->
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 flex items-center justify-center -mt-1">
                <img src="{{ asset('images/detech.png') }}"
                     class="w-10 h-10 object-contain scale-150"
                     alt="Detech Icon">
            </div>

            <span class="hidden md:block text-lg md:text-xl ml-0.5 font-bold text-gray-900">
                {{ $data['footer_company_name'] ?? 'Detech Portfolio' }}
            </span>
        </div>

        <!-- Right: Conditional Buttons -->
        <div class="flex items-center gap-3">
            @auth
                <!-- Dashboard Button (shown when logged in) -->
                <a href="/admin"
                   class="hidden md:flex px-4 py-2 md:px-6 md:py-2.5 text-sm md:text-base bg-gradient-to-r from-orange-600 to-orange-700 text-white font-semibold rounded-lg hover:from-orange-700 hover:to-orange-800 transition-all duration-300 shadow-md hover:shadow-lg items-center gap-2">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <!-- User Profile Dropdown -->
                @php
                    $landingUser = auth()->user();
                    $landingNameSource = $landingUser->full_name ?: ($landingUser->name ?: $landingUser->email);
                    $landingInitial = strtoupper(substr($landingNameSource, 0, 1));
                    $landingHasProfileImage = $landingUser->profile_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($landingUser->profile_image);
                @endphp
                <div class="relative group">
                    <button class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition">
                        @if($landingHasProfileImage)
                            <img src="{{ asset('storage/' . $landingUser->profile_image) }}" 
                                 alt="{{ $landingUser->name ?? $landingUser->full_name ?? 'Profile' }}"
                                 class="w-9 h-9 rounded-full object-cover border-2 border-orange-500 shadow-sm">
                        @else
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                {{ $landingInitial }}
                            </div>
                        @endif
                        <div class="text-left hidden sm:block">
                            <p class="text-xs uppercase text-gray-500">Profile</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $landingUser->full_name ?? $landingUser->name ?? 'User' }}</p>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="py-2">
                        <a href="/admin" 
                           class="block md:hidden px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                            <i class="fas fa-home mr-2"></i> Dashboard
                        </a>
                        <a href="{{ route('portfolio.show', auth()->user()->slug) }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                                <i class="fas fa-user mr-2"></i> My Portfolio
                            </a>
                            
                            <hr class="my-2 border-gray-200">
                            <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <!-- Sign In Button (shown when not logged in) -->
                <a href="/admin/login"
                   class="px-4 py-2 md:px-6 text-gray-700 font-medium hover:text-gray-900 transition flex items-center gap-2">
                    <span class="hidden md:inline">Sign In</span>
                    <i class="fas fa-sign-in-alt md:hidden text-xl"></i>
                </a>
            @endauth
        </div>

    </div>
</nav>


    <!-- Hero Section -->
    <section class="pt-24 pb-12 md:pt-24 lg:pt-32 md:pb-20 px-6 md:px-12 min-h-screen hero-gradient relative overflow-hidden flex items-center">
        <!-- Floating Background Shapes -->
        <div class="floating-shape w-96 h-96 rounded-full -top-48 -left-48 bg-white"></div>
        <div class="floating-shape w-80 h-80 rounded-full bottom-10 -right-40 bg-white" style="animation-delay: 2s;"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white space-y-6">
                    <div class="inline-block bg-white/15 backdrop-blur px-4 py-2 rounded-full">
                        <p class="text-sm font-medium">✨ Build Your Online Presence</p>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        {{ $data['hero_title'] ?? 'Showcase Your Extraordinary' }}
                        <span class="block text-orange-100">{{ $data['hero_title_line2'] ?? 'Work' }}</span>
                    </h1>
                    
                    <p class="text-base md:text-lg text-white/90 max-w-lg">
                        {{ $data['hero_subtitle'] ?? 'Create a stunning, professional portfolio in minutes. Impress clients, employers, and collaborators with a portfolio that truly represents your skills and achievements.' }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#themes" class="btn-primary text-white px-8 py-3 rounded-lg font-semibold text-center">
                            {{ $data['hero_cta_primary'] ?? 'Get Started' }}
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#contact" class="btn-secondary px-8 py-3 rounded-lg font-semibold text-center">
                            {{ $data['hero_cta_secondary'] ?? 'Learn More' }}
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-2 md:gap-4 lg:gap-6 pt-8">
                        <div class="stat-card p-2 md:p-3 lg:p-4 rounded-lg text-center md:text-left">
                            <p class="text-lg md:text-xl lg:text-3xl font-bold text-orange-100 whitespace-nowrap">{{ $data['stat_1_value'] ?? '500+' }}</p>
                            <p class="text-xs md:text-xs lg:text-sm text-white/80">{{ $data['stat_1_label'] ?? 'Portfolios Created' }}</p>
                        </div>
                        <div class="stat-card p-2 md:p-3 lg:p-4 rounded-lg text-center md:text-left">
                            <p class="text-lg md:text-xl lg:text-3xl font-bold text-orange-100 whitespace-nowrap">{{ $data['stat_2_value'] ?? '50K+' }}</p>
                            <p class="text-xs md:text-xs lg:text-sm text-white/80">{{ $data['stat_2_label'] ?? 'Active Users' }}</p>
                        </div>
                        <div class="stat-card p-2 md:p-3 lg:p-4 rounded-lg text-center md:text-left">
                            <p class="text-lg md:text-xl lg:text-3xl font-bold text-orange-100 whitespace-nowrap">{{ $data['stat_3_value'] ?? '99.9%' }}</p>
                            <p class="text-xs md:text-xs lg:text-sm text-white/80">{{ $data['stat_3_label'] ?? 'Uptime' }}</p>
                        </div>
                    </div>
                </div>
                
               <!-- RIGHT VISUAL - Dynamic Portfolio Preview -->
<div class="block mt-12 md:mt-0 relative">
    <div class="animated-float">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 shadow-2xl">
            <!-- Profile Header -->
            <div class="flex items-center gap-4 mb-6">
                <!-- ✅ UPDATED: Show real profile image or initial -->
                @if(isset($data['preview_has_image']) && $data['preview_has_image'])
                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-orange-400 shadow-lg">
                        <img src="{{ $data['preview_image_url'] }}" 
                             alt="{{ $data['preview_name'] ?? 'User' }}" 
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        {{ $data['preview_initial'] ?? substr($data['preview_name'] ?? 'JD', 0, 1) }}
                    </div>
                @endif
                
                <div class="flex-1">
                    <h3 class="text-white font-bold text-lg">{{ $data['preview_name'] ?? 'John Doe' }}</h3>
                    <p class="text-white/70 text-sm">{{ $data['preview_title'] ?? 'Senior Product Designer' }}</p>
                </div>
            </div>

            <!-- Bio -->
            <p class="text-white/80 text-sm mb-6">
                {{ $data['preview_bio'] ?? 'Crafting beautiful digital experiences for over 5 years' }}
            </p>

            <!-- Stats Grid -->
            <div class="grid grid-cols-3 gap-3 mb-6">
                <div class="bg-white/10 rounded-lg p-3 text-center backdrop-blur">
                    <p class="text-orange-200 font-bold text-xl">{{ $data['preview_projects_count'] ?? '24' }}</p>
                    <p class="text-white/60 text-xs">Projects</p>
                </div>
                <div class="bg-white/10 rounded-lg p-3 text-center backdrop-blur">
                    <p class="text-orange-200 font-bold text-xl">{{ $data['preview_clients_count'] ?? '50+' }}</p>
                    <p class="text-white/60 text-xs">Clients</p>
                </div>
                <div class="bg-white/10 rounded-lg p-3 text-center backdrop-blur">
                    <p class="text-orange-200 font-bold text-xl">{{ $data['preview_awards_count'] ?? '12' }}</p>
                    <p class="text-white/60 text-xs">Awards</p>
                </div>
            </div>

            

            <!-- View Portfolio Button -->
            <div class="mt-6">
                @if(isset($data['preview_user_slug']))
                    <a href="{{ route('portfolio.show', $data['preview_user_slug']) }}" 
                       target="_blank"
                       class="block bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg py-2 text-center text-white text-sm font-semibold hover:shadow-lg transition">
                        View Full Portfolio
                    </a>
                @else
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg py-2 text-center text-white text-sm font-semibold">
                        View Full Portfolio
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 md:py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $data['features_title'] ?? 'Why Choose Detech?' }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $data['features_subtitle'] ?? 'Everything you need to build and manage your professional portfolio' }}</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 bg-gradient-to-br from-orange-50 to-transparent rounded-xl border border-orange-100">
                    <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-rocket text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $data['feature_1_title'] ?? 'Lightning Fast' }}</h3>
                    <p class="text-gray-600">{{ $data['feature_1_description'] ?? 'Optimized performance and instant loading times to keep your visitors engaged.' }}</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="p-8 bg-gradient-to-br from-amber-50 to-transparent rounded-xl border border-amber-100">
                    <div class="w-12 h-12 bg-amber-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-palette text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $data['feature_2_title'] ?? 'Fully Customizable' }}</h3>
                    <p class="text-gray-600">{{ $data['feature_2_description'] ?? 'Multiple themes and layouts to match your personal style and brand identity.' }}</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="p-8 bg-gradient-to-br from-yellow-50 to-transparent rounded-xl border border-yellow-100">
                    <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $data['feature_3_title'] ?? 'Secure & Reliable' }}</h3>
                    <p class="text-gray-600">{{ $data['feature_3_description'] ?? 'Enterprise-grade security and 99.9% uptime guarantee for peace of mind.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Themes Section -->
   <section id="themes" class="py-12 md:py-20 px-4 bg-gradient-to-b from-gray-50 to-white">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $data['themes_title'] ?? 'Choose Your Theme' }}</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $data['themes_subtitle'] ?? 'Select from beautifully designed themes to get started' }}</p>
        </div>

        <form id="themeForm" action="{{ route('landing.select-theme') }}" method="POST" class="max-w-6xl mx-auto">
            @csrf

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                @foreach($availableThemes as $theme)
                                    <div class="theme-card cursor-pointer theme-card-hover {{ !$theme->is_active ? 'opacity-60 pointer-events-none' : '' }}"
                                         data-theme="{{ $theme->slug }}">

                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-gray-200 hover:border-orange-500 transition flex flex-col h-full">

                                            <!-- Preview - Clickable to Theme Overview -->
                                            <a href="{{ $theme->is_active ? route('themes.overview', $theme) : '#' }}"
                                               class="{{ !$theme->is_active ? 'pointer-events-none' : '' }} block aspect-video relative overflow-hidden"
                                               style="background: linear-gradient(135deg, {{ $theme->colors['primary'] ?? '#3B82F6' }}, {{ $theme->colors['secondary'] ?? '#8B5CF6' }})">

                                                @if($theme->thumbnail_path)
                                                    <img src="{{ asset('storage/' . $theme->thumbnail_path) }}"
                                                         alt="{{ $theme->name }}"
                                                         class="w-full h-full object-cover object-top">
                                                @else
                                                    <div class="absolute top-4 left-4 right-4">
                                                        <div class="bg-white/95 backdrop-blur rounded-lg p-4 shadow-lg">
                                                            <div class="flex items-center space-x-3">
                                                                <div class="w-10 h-10 rounded-full"
                                                                     style="background: {{ $theme->colors['accent'] ?? '#F59E0B' }}"></div>
                                                                <div class="flex-1">
                                                                    <div class="h-2.5 bg-gray-300 rounded w-24 mb-1.5"></div>
                                                                    <div class="h-2 bg-gray-200 rounded w-16"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- "View Details" overlay on hover -->
                                                <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-40 transition flex items-center justify-center">
                                                    <span class="text-white font-semibold opacity-0 hover:opacity-100 transition">
                                                        <i class="fas fa-eye mr-2"></i> View Details
                                                    </span>
                                                </div>
                                            </a>

                                            <!-- Card Content -->
                                            <div class="p-6 flex flex-col flex-grow">
                                                <!-- ✅ ADD THIS NEW SECTION AT THE TOP -->
                                                <div class="flex items-start justify-between mb-2">
                                                    <a href="{{ $theme->is_active ? route('themes.overview', $theme) : '#' }}"
                                                        class="hover:text-orange-600 transition flex-1">
                                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $theme->name }}</h3>
                                                 </a>

                        <!-- ✅ ACTIVE THEME INDICATOR -->
                        @auth
                            @if(auth()->user()->active_theme === $theme->slug)
                                <div class="flex items-center gap-2">
                                    <span class="bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 animate-pulse">
                                        <i class="fas fa-check-circle"></i>
                                        Active
                                    </span>
                                </div>
                            @endif
                        @endauth
                    </div>
                                                <p class="text-gray-600 text-sm mb-4">{{ $theme->description }}</p>

                                                @if($theme->features)
                                                    <div class="space-y-2 mb-6 text-sm text-gray-600">
                                                        @foreach(array_slice($theme->features, 0, 3) as $feature)
                                                            <div class="flex items-center gap-2">
                                                                <i class="fas fa-check text-orange-500"></i>
                                                                <span>{{ $feature }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                <!-- Bottom section: Badge + Radio (selection) -->
                                                <div class="mt-auto flex justify-between items-center">
                                                    @if($theme->is_premium)
                                                        <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Premium</span>
                                                    @else
                                                        <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">✓ Free</span>
                                                    @endif

                                                    @if($theme->is_active)
                                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio cursor-pointer hover:border-orange-500 transition"></div>
                                                    @else
                                                        <span class="text-xs text-gray-500">Coming Soon</span>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                @endforeach
            </div>

            <!-- Hidden input to store selected theme -->
            <input type="hidden" name="theme" id="selectedTheme" value="{{ $availableThemes->where('is_active', true)->first()->slug ?? '' }}" required>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button type="submit" class="btn-primary text-white px-12 py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition">
                    Get Started With Theme
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
                <a href="#contact" class="btn-secondary px-12 py-4 rounded-lg font-bold text-center border-2 border-gray-300 hover:border-orange-500 transition">
                    Have Questions?
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Optional: Keep your existing JS for theme selection if you have it -->
<script>
    document.querySelectorAll('.theme-card').forEach(card => {
        card.addEventListener('click', function () {
            if (!this.classList.contains('pointer-events-none')) {
                document.querySelectorAll('.theme-card').forEach(c => c.classList.remove('ring-4', 'ring-orange-500', 'border-orange-500'));
                this.classList.add('ring-4', 'ring-orange-500');
                document.querySelectorAll('.theme-radio').forEach(r => r.classList.remove('bg-orange-500', 'border-orange-500'));
                this.querySelector('.theme-radio')?.classList.add('bg-orange-500', 'border-orange-500');
                document.getElementById('selectedTheme').value = this.dataset.theme;
            }
        });
    });

    // Set initial selected theme visually
    document.querySelectorAll('.theme-card').forEach(card => {
        if (card.dataset.theme === document.getElementById('selectedTheme').value) {
            card.click();
        }
    });
</script>

    <!-- Contact Section -->
    <section id="contact" class="py-12 md:py-20 px-6 md:px-12 bg-white">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $data['contact_title'] ?? 'Get in Touch' }}</h2>
                    <p class="text-lg text-gray-600">{{ $data['contact_subtitle'] ?? "Have questions about Detech? We're here to help! Send us a message and we'll respond as soon as possible." }}</p>
                    
                    <!-- Contact Info -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-3 flex-shrink-0">
                                <i class="fas fa-envelope text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">{{ $data['contact_email'] ?? 'support@detech.com' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-3 flex-shrink-0">
                                <i class="fas fa-phone text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Phone</h4>
                                <p class="text-gray-600">{{ $data['contact_phone'] ?? '+1 (555) 123-4567' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-3 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Location</h4>
                                <p class="text-gray-600">{{ $data['contact_address'] ?? '123 Tech Street, Silicon Valley, CA' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Form -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 border border-gray-200">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="portfolio_user_id" value="{{ $admin->id }}">
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Full Name</label>
                            <input type="text" name="name" required class="contact-input-focus w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500" placeholder="Your name">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Email Address</label>
                            <input type="email" name="email" required class="contact-input-focus w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500" placeholder="your@email.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Subject</label>
                            <input type="text" name="subject" class="contact-input-focus w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500" placeholder="What's this about?">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Message</label>
                            <textarea name="message" rows="4" required class="contact-input-focus w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 resize-none" placeholder="Tell us more..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn-primary text-white w-full px-6 py-3 rounded-lg font-bold">
                            Send Message
                            <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 md:py-12 px-6 md:px-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-8">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                            <img src="{{ asset('images/detech.png') }}"
                            class="w-10 h-10 object-contain scale-150 mb-1 "
                            alt="Detech Icon">
                        <span class="text-xl font-bold text-white">{{ $data['footer_company_name'] ?? 'Detech' }}</span>
                    </div>
                    <p class="text-sm max-w-sm">{{ $data['footer_tagline'] ?? 'Revolutionize your business with platform-focused engineering.' }}</p>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4 flex justify-between items-center cursor-pointer md:cursor-default" onclick="toggleFooter(this)">
                        Services
                        <i class="fas fa-chevron-down md:hidden transition-transform duration-300"></i>
                    </h4>
                    <ul class="space-y-2 text-sm hidden md:block">
                        <li><a href="https://www.detech.live#services" target="_blank" class="hover:text-white transition">Platform Engineering</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank" class="hover:text-white transition">AI & Cloud Engineering</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank" class="hover:text-white transition">Web & Mobile Development</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank" class="hover:text-white transition">AR & VR Experiences</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4 flex justify-between items-center cursor-pointer md:cursor-default" onclick="toggleFooter(this)">
                        Our Work
                        <i class="fas fa-chevron-down md:hidden transition-transform duration-300"></i>
                    </h4>
                    <ul class="space-y-2 text-sm hidden md:block">
                        <li><a href="https://www.detech.live#work" target="_blank" class="hover:text-white transition">VolunTrack Nexus</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank" class="hover:text-white transition">Authentz</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank" class="hover:text-white transition">Kunam Dry Fish</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank" class="hover:text-white transition">100 Bucks</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4 flex justify-between items-center cursor-pointer md:cursor-default" onclick="toggleFooter(this)">
                        Get in Touch
                        <i class="fas fa-chevron-down md:hidden transition-transform duration-300"></i>
                    </h4>
                    <ul class="space-y-2 text-sm hidden md:block">
                        <li><a href="mailto:kingshipmena@gmail.com" class="hover:text-white transition">kingshipmena@gmail.com</a></li>
                        <li><a href="https://www.detech.live#pricing" target="_blank" class="hover:text-white transition">Plans & Pricing</a></li>
                        <li><a href="https://www.detech.live#contact" target="_blank" class="hover:text-white transition">Schedule a Meeting</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm">{{ $data['footer_copyright'] ?? '© 2025 Detech Company. All rights reserved.' }}</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="https://www.linkedin.com/company/detech" target="_blank" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com" target="_blank" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:kingshipmena@gmail.com" class="hover:text-white transition"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const themeCards = document.querySelectorAll('.theme-card');
        const selectedThemeInput = document.getElementById('selectedTheme');

        themeCards.forEach(card => {
            if (!card.classList.contains('opacity-60')) {
                card.addEventListener('click', function () {
                    const theme = this.dataset.theme;

                    themeCards.forEach(c => {
                        if (!c.classList.contains('opacity-60')) {
                            c.querySelector('.theme-radio').classList.remove('bg-orange-500', 'border-orange-500');
                            c.querySelector('.theme-radio').classList.add('border-gray-300');
                        }
                    });

                    this.querySelector('.theme-radio').classList.remove('border-gray-300');
                    this.querySelector('.theme-radio').classList.add('bg-orange-500', 'border-orange-500');

                    selectedThemeInput.value = theme;
                });
            }
        });

        // Auto-select first available theme
        const firstAvailableTheme = Array.from(themeCards).find(card => !card.classList.contains('opacity-60'));
        if (firstAvailableTheme) {
            firstAvailableTheme.click();
        }

        // Footer Accordion
        function toggleFooter(header) {
            if (window.innerWidth >= 768) return; // Only work on mobile
            
            const ul = header.nextElementSibling;
            const icon = header.querySelector('i');
            
            // Toggle visibility
            ul.classList.toggle('hidden');
            
            // Rotate icon
            if (ul.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)';
            } else {
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>