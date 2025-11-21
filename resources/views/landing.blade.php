@php
    // TEMPORARY DEBUG - Remove after testing
    if (request()->get('debug') == '1') {
        dd([
            'preview_user_id' => $data['preview_user_id'] ?? 'NOT SET',
            'preview_name' => $data['preview_name'] ?? 'NOT SET',
            'preview_title' => $data['preview_title'] ?? 'NOT SET',
            'preview_bio' => $data['preview_bio'] ?? 'NOT SET',
            'preview_has_image' => $data['preview_has_image'] ?? 'NOT SET',
        ]);
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['footer_company_name'] ?? 'Detech Portfolio System' }} - Get Started</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .animated-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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
    <nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 hero-gradient rounded-lg flex items-center justify-center">
                    <i class="fas fa-code text-white text-lg"></i>
                </div>
                <span class="text-xl font-bold text-gray-900">{{ $data['footer_company_name'] ?? 'Detech Portfolio' }}</span>
            </div>
            <a href="/admin/login" class="px-6 py-2 text-gray-700 font-medium hover:text-gray-900 transition">
                Sign In
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 min-h-screen hero-gradient relative overflow-hidden flex items-center">
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
                    
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                        {{ $data['hero_title'] ?? 'Showcase Your Extraordinary' }}
                        <span class="block text-orange-100">{{ $data['hero_title_line2'] ?? 'Work' }}</span>
                    </h1>
                    
                    <p class="text-lg text-white/90 max-w-lg">
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
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="stat-card p-4 rounded-lg">
                            <p class="text-3xl font-bold text-orange-100">{{ $data['stat_1_value'] ?? '500+' }}</p>
                            <p class="text-sm text-white/80">{{ $data['stat_1_label'] ?? 'Portfolios Created' }}</p>
                        </div>
                        <div class="stat-card p-4 rounded-lg">
                            <p class="text-3xl font-bold text-orange-100">{{ $data['stat_2_value'] ?? '50K+' }}</p>
                            <p class="text-sm text-white/80">{{ $data['stat_2_label'] ?? 'Active Users' }}</p>
                        </div>
                        <div class="stat-card p-4 rounded-lg">
                            <p class="text-3xl font-bold text-orange-100">{{ $data['stat_3_value'] ?? '99.9%' }}</p>
                            <p class="text-sm text-white/80">{{ $data['stat_3_label'] ?? 'Uptime' }}</p>
                        </div>
                    </div>
                </div>
                
               <!-- RIGHT VISUAL - Dynamic Portfolio Preview -->
<div class="hidden md:block relative">
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

            <!-- Project Thumbnails -->
            <div class="grid grid-cols-2 gap-3">
                <div class="h-24 bg-gradient-to-br from-orange-500/20 to-orange-600/10 rounded-lg backdrop-blur border border-white/10"></div>
                <div class="h-24 bg-gradient-to-br from-amber-500/20 to-amber-600/10 rounded-lg backdrop-blur border border-white/10"></div>
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
    <section class="py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $data['features_title'] ?? 'Why Choose Detech?' }}</h2>
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
    <section id="themes" class="py-20 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $data['themes_title'] ?? 'Choose Your Theme' }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $data['themes_subtitle'] ?? 'Select from beautifully designed themes to get started' }}</p>
            </div>

            <form id="themeForm" action="{{ route('landing.select-theme') }}" method="POST" class="max-w-6xl mx-auto">
                @csrf

                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <!-- Theme 1 -->
                    <div class="theme-card cursor-pointer theme-card-hover" data-theme="theme1">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-gray-200 hover:border-orange-500 transition">
                            <!-- Preview -->
                            <div class="h-48 hero-gradient relative overflow-hidden">
                                <div class="absolute top-4 left-4 right-4">
                                    <div class="bg-white/95 backdrop-blur rounded-lg p-4 shadow-lg">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 hero-gradient rounded-full"></div>
                                            <div class="flex-1">
                                                <div class="h-2.5 bg-gray-300 rounded w-24 mb-1.5"></div>
                                                <div class="h-2 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute bottom-4 left-4 right-4 flex gap-2">
                                    <div class="h-2 flex-1 bg-white/30 rounded"></div>
                                    <div class="h-2 flex-1 bg-white/20 rounded"></div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Modern Professional</h3>
                                <p class="text-gray-600 text-sm mb-4">Clean, contemporary design with smooth animations and professional typography.</p>
                                
                                <!-- Features -->
                                <div class="space-y-2 mb-6 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Glassmorphism effects</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Dark mode support</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Mobile responsive</span>
                                    </div>
                                </div>
                                
                                <!-- Badge -->
                                <div class="flex items-center justify-between">
                                    <span class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">✓ Active</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio cursor-pointer hover:border-orange-500 transition"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Theme 2 -->
                    <div class="theme-card cursor-pointer theme-card-hover opacity-60 pointer-events-none" data-theme="theme2">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-gray-200">
                            <!-- Preview -->
                            <div class="h-48 bg-gradient-to-br from-emerald-500 to-emerald-700 relative overflow-hidden">
                                <div class="absolute top-4 left-4 right-4">
                                    <div class="bg-white rounded-lg p-4 shadow-lg">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded"></div>
                                            <div class="flex-1">
                                                <div class="h-2.5 bg-gray-300 rounded w-24 mb-1.5"></div>
                                                <div class="h-2 bg-gray-200 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Corporate Clean</h3>
                                <p class="text-gray-600 text-sm mb-4">Professional business layout with minimalist design principles.</p>
                                
                                <!-- Features -->
                                <div class="space-y-2 mb-6 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Minimal design</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Typography focused</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>SEO optimized</span>
                                    </div>
                                </div>
                                
                                <!-- Badge -->
                                <div class="flex items-center justify-between">
                                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Coming Soon</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio cursor-pointer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Theme 3 -->
                    <div class="theme-card cursor-pointer theme-card-hover opacity-60 pointer-events-none" data-theme="theme3">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg border-2 border-gray-200">
                            <!-- Preview -->
                            <div class="h-48 bg-gradient-to-br from-amber-500 to-orange-700 relative overflow-hidden">
                                <div class="absolute top-4 left-4 right-4">
                                    <div class="bg-gray-900 rounded-lg p-4 shadow-lg">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full"></div>
                                            <div class="flex-1">
                                                <div class="h-2.5 bg-gray-700 rounded w-24 mb-1.5"></div>
                                                <div class="h-2 bg-gray-600 rounded w-16"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Creative Bold</h3>
                                <p class="text-gray-600 text-sm mb-4">Vibrant and artistic design for creative professionals.</p>
                                
                                <!-- Features -->
                                <div class="space-y-2 mb-6 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Bold colors</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Dynamic animations</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check text-orange-500"></i>
                                        <span>Portfolio focused</span>
                                    </div>
                                </div>
                                
                                <!-- Badge -->
                                <div class="flex items-center justify-between">
                                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Coming Soon</span>
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 theme-radio cursor-pointer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="theme" id="selectedTheme" value="theme1" required>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="submit" class="btn-primary text-white px-12 py-4 rounded-lg font-bold text-lg shadow-lg">
                        Get Started With Theme
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <a href="#contact" class="btn-secondary px-12 py-4 rounded-lg font-bold text-center">
                        Have Questions?
                    </a>
                </div>
            </form>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-gray-900">{{ $data['contact_title'] ?? 'Get in Touch' }}</h2>
                    <p class="text-lg text-gray-600">{{ $data['contact_subtitle'] ?? "Have questions about Detech? We're here to help! Send us a message and we'll respond as soon as possible." }}</p>
                    
                    <!-- Contact Info -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">{{ $data['contact_email'] ?? 'support@detech.com' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Phone</h4>
                                <p class="text-gray-600">{{ $data['contact_phone'] ?? '+1 (555) 123-4567' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
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
    <footer class="bg-gray-900 text-gray-400 py-12 px-4">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 hero-gradient rounded-lg flex items-center justify-center">
                            <i class="fas fa-code text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-white">{{ $data['footer_company_name'] ?? 'Detech' }}</span>
                    </div>
                    <p class="text-sm">{{ $data['footer_tagline'] ?? 'Build stunning portfolios effortlessly.' }}</p>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Features</a></li>
                        <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Security</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">About</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Privacy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms</a></li>
                        <li><a href="#" class="hover:text-white transition">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm">{{ $data['footer_copyright'] ?? '© 2025 Detech Company. All rights reserved.' }}</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-github"></i></a>
                    <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
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