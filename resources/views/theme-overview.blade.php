<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $theme->name }} - Theme Overview | Detech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
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
            border: 2px solid #D97706;
            color: #D97706;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #D97706;
            color: white;
            transform: translateY(-2px);
        }

        /* Premium Upgrade Modal Styles */
        .modal-backdrop {
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: slideUp 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .feature-check {
            animation: popIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .feature-check:nth-child(1) {
            animation-delay: 0.1s;
        }

        .feature-check:nth-child(2) {
            animation-delay: 0.2s;
        }

        .feature-check:nth-child(3) {
            animation-delay: 0.3s;
        }

        .feature-check:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .shimmer {
            background: linear-gradient(90deg, #F59E0B 0%, #FBBF24 50%, #F59E0B 100%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        @keyframes shimmer {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- ✅ LANDING PAGE NAVIGATION -->
    <nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Left: Logo + Name -->
            <a href="{{ route('landing.index') }}" class="flex items-center space-x-3">
                <div class="w-10 h-10 flex items-center justify-center -mt-1">
                    <img src="{{ asset('images/detech.png') }}" class="w-10 h-10 object-contain scale-150"
                        alt="Detech Icon">
                </div>
                <span class="text-xl ml-0.5 font-bold text-gray-900">Detech Portfolio</span>
            </a>

            <!-- Right: Conditional Buttons -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="/admin"
                        class="px-6 py-2.5 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-semibold rounded-lg hover:from-orange-700 hover:to-orange-800 transition-all duration-300 shadow-md hover:shadow-lg flex items-center gap-2">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>

                    @php
                        $overviewUser = auth()->user();
                        $overviewNameSource = $overviewUser->full_name ?: ($overviewUser->name ?: $overviewUser->email);
                        $overviewInitial = strtoupper(substr($overviewNameSource, 0, 1));
                        $overviewHasProfileImage = $overviewUser->profile_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($overviewUser->profile_image);
                    @endphp
                    <div class="relative group">
                        <button
                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition">
                            @if($overviewHasProfileImage)
                                <img src="{{ asset('storage/' . $overviewUser->profile_image) }}"
                                    alt="{{ $overviewUser->name ?? $overviewUser->full_name ?? 'Profile' }}"
                                    class="w-9 h-9 rounded-full object-cover border-2 border-orange-500 shadow-sm">
                            @else
                                <div
                                    class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                    {{ $overviewInitial }}
                                </div>
                            @endif
                            <div class="text-left hidden sm:block">
                                <p class="text-xs uppercase text-gray-500">Profile</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $overviewUser->full_name ?? $overviewUser->name ?? 'User' }}</p>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="{{ route('portfolio.show', auth()->user()->slug) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                                    <i class="fas fa-user mr-2"></i> My Portfolio
                                </a>
                                <a href="/admin"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600 transition">
                                    <i class="fas fa-cog mr-2"></i> Settings
                                </a>
                                <hr class="my-2 border-gray-200">
                                <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="/admin/login" class="px-6 py-2 text-gray-700 font-medium hover:text-gray-900 transition">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 px-4 hero-gradient relative overflow-hidden">
        <div class="container mx-auto relative z-10">
            <div class="max-w-5xl mx-auto">
                <div class="mb-6">
                    <a href="{{ route('landing.index') }}#themes"
                        class="inline-flex items-center gap-2 text-white/70 hover:text-white transition group">
                        <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                        <span class="font-medium">Back to Themes</span>
                    </a>
                </div>
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="text-white space-y-6">
                        <div class="flex items-center gap-3">
                            <h1 class="text-4xl md:text-5xl font-bold">{{ $theme->name }}</h1>
                            @if($theme->is_premium)
                                <span
                                    class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 px-4 py-1.5 rounded-full text-sm font-bold shadow-lg">
                                    Premium
                                </span>
                            @else
                                <span
                                    class="bg-gradient-to-r from-green-400 to-emerald-500 text-green-900 px-4 py-1.5 rounded-full text-sm font-bold shadow-lg">
                                    Free
                                </span>
                            @endif
                        </div>
                        <p class="text-white/90 text-lg leading-relaxed">{{ $theme->description }}</p>
                        <div class="flex items-center gap-6 text-sm">
                            <div class="flex items-center gap-2 px-4 py-2 rounded-lg"
                                style="background: rgba(217, 119, 6, 0.1);">
                                @for($i = 1; $i <= 5; $i++)
                                    <i
                                        class="fas fa-star {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-600' }}"></i>
                                @endfor
                                <span
                                    class="text-white font-semibold ml-1">{{ number_format($averageRating, 1) }}</span>
                            </div>
                            <div class="text-white/80">
                                <i class="fas fa-comments mr-2"></i>
                                {{ $commentsCount }} {{ Str::plural('review', $commentsCount) }}
                            </div>
                        </div>

                        <!-- UPDATED CTA BUTTONS -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">
                            <!-- Live Preview -->
                            <a href="{{ route('themes.preview', $theme) }}" target="_blank"
                                class="btn-secondary px-8 py-3 rounded-lg font-semibold text-center inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur text-white border-white/30 hover:bg-white hover:text-gray-900">
                                <i class="fas fa-eye"></i> Live Preview
                            </a>

                            @auth
                                @if($hasAccess)
                                    @if(auth()->user()->active_theme === $theme->slug)
                                        <button disabled
                                            class="px-8 py-3 bg-white/20 text-white rounded-lg font-semibold cursor-not-allowed inline-flex items-center justify-center gap-2 opacity-70">
                                            <i class="fas fa-check-circle"></i> Currently Active
                                        </button>
                                    @else
                                        <form action="{{ route('themes.activate', $theme) }}" method="POST" class="activation-form">
                                            @csrf
                                            <button type="submit"
                                                class="w-full btn-primary text-white px-8 py-3 rounded-lg font-semibold inline-flex items-center justify-center gap-2 shadow-lg">
                                                <i class="fas fa-check"></i> Activate Theme
                                            </button>
                                        </form>
                                    @endif
                                @elseif($theme->is_premium)
                                    <button onclick="showUpgradeModal()"
                                        class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg font-semibold inline-flex items-center justify-center gap-2 shadow-lg hover:from-yellow-600 hover:to-yellow-700 transition-all transform hover:scale-105">
                                        <i class="fas fa-crown mr-2"></i> Upgrade to Premium
                                    </button>
                                @endif
                            @else
                                <a href="/admin/login"
                                    class="btn-primary text-white px-8 py-3 rounded-lg font-semibold text-center inline-flex items-center justify-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i> Login to Activate
                                </a>
                            @endauth
                        </div>
                    </div>

                    @if($theme->thumbnail_path)
                        <div class="hidden md:block">
                            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 shadow-2xl"
                                style="animation: float 3s ease-in-out infinite;">
                                <img src="{{ asset('storage/' . $theme->thumbnail_path) }}" alt="{{ $theme->name }}"
                                    class="w-full rounded-lg shadow-lg">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-8">
                        @if($theme->features && count($theme->features) > 0)
                            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-star text-white"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">Key Features</h2>
                                </div>
                                <div class="grid md:grid-cols-2 gap-4">
                                    @foreach($theme->features as $feature)
                                        <div
                                            class="p-4 bg-gradient-to-br from-orange-50 to-transparent rounded-xl border border-orange-100">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i class="fas fa-check text-white text-xs"></i>
                                                </div>
                                                <span class="text-gray-700 font-medium">{{ $feature }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- User Reviews Section -->
                        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-comments text-white"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">User Reviews</h2>
                            </div>

                            @auth
                                <form action="{{ route('themes.comment.store', $theme) }}" method="POST"
                                    class="mb-8 p-6 bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl border border-orange-100">
                                    @csrf
                                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                        <i class="fas fa-pen text-orange-600"></i> Leave a Review
                                    </h3>
                                    <div class="mb-4">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rating
                                            (Optional)</label>
                                        <div class="flex gap-2" id="ratingStars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star rating-star text-3xl text-gray-300 cursor-pointer transition"
                                                    data-rating="{{ $i }}"></i>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="rating" id="ratingInput" value="">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Your Review</label>
                                        <textarea name="comment" rows="4" required
                                            class="w-full px-4 py-3 bg-white border-2 border-orange-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                                            placeholder="Share your experience with this theme..."></textarea>
                                        @error('comment')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="btn-primary text-white px-6 py-3 rounded-lg font-semibold shadow-lg">
                                        <i class="fas fa-paper-plane mr-2"></i> Submit Review
                                    </button>
                                </form>

                                @if($userComments && $userComments->where('parent_id', null)->count() > 0)
                                    <div class="mb-8 p-6 bg-blue-50 border-2 border-blue-200 rounded-xl">
                                        <div class="flex items-start gap-3 mb-4">
                                            <i class="fas fa-history text-blue-600 text-xl mt-1"></i>
                                            <p class="text-blue-900 font-semibold mb-2">Your Previous Reviews</p>
                                        </div>
                                        <div class="space-y-3">
                                            @foreach($userComments->where('parent_id', null) as $userComment)
                                                <div class="bg-white p-4 rounded-lg border border-blue-200">
                                                    <div class="flex justify-between items-start mb-2">
                                                        <div>
                                                            @if($userComment->rating)
                                                                <div class="flex gap-1 mb-1">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <i
                                                                            class="fas fa-star text-sm {{ $i <= $userComment->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                                    @endfor
                                                                </div>
                                                            @endif
                                                            <p class="text-sm text-gray-600">
                                                                {{ $userComment->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        <form action="{{ route('themes.comment.delete', $theme) }}" method="POST"
                                                            class="inline">
                                                            @csrf @method('DELETE')
                                                            <input type="hidden" name="comment_id" value="{{ $userComment->id }}">
                                                            <button type="submit"
                                                                class="text-red-600 hover:text-red-800 text-sm font-semibold transition">
                                                                <i class="fas fa-trash mr-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <p class="text-gray-700">{{ $userComment->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div
                                    class="mb-8 p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border-2 border-gray-200 text-center">
                                    <i class="fas fa-lock text-gray-400 text-4xl mb-4"></i>
                                    <p class="text-gray-600 mb-4 font-medium">Please login to leave a review</p>
                                    <a href="/admin/login"
                                        class="inline-block btn-primary text-white px-8 py-3 rounded-lg font-semibold shadow-lg">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                                    </a>
                                </div>
                            @endauth

                            <!-- Approved Comments -->
                            <div class="space-y-6">
                                @forelse($theme->approvedComments as $comment)
                                    <div class="border-b border-gray-200 pb-6 last:border-0">
                                        <div class="hover:bg-gray-50 p-4 rounded-lg transition">
                                            <div class="flex items-start gap-4">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 shadow-lg">
                                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-2 flex-wrap gap-2">
                                                        <div>
                                                            <p class="font-bold text-gray-900">
                                                                {{ $comment->user->full_name ?? $comment->user->name }}</p>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $comment->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        @if($comment->rating)
                                                            <div class="flex gap-1">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    <i
                                                                        class="fas fa-star text-sm {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                                @endfor
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <p class="text-gray-700 leading-relaxed mb-3">{{ $comment->comment }}
                                                    </p>
                                                    <div class="flex items-center gap-4">
                                                        @auth
                                                            <button onclick="toggleReplyForm({{ $comment->id }})"
                                                                class="text-orange-600 hover:text-orange-700 text-sm font-semibold flex items-center gap-1">
                                                                <i class="fas fa-reply"></i> Reply
                                                            </button>
                                                        @endauth
                                                        @if($comment->replies->count() > 0)
                                                            <span class="text-gray-500 text-sm">
                                                                <i class="fas fa-comment-dots mr-1"></i>
                                                                {{ $comment->replies->count() }}
                                                                {{ Str::plural('reply', $comment->replies->count()) }}
                                                            </span>
                                                        @endif
                                                    </div>

                                                    @auth
                                                        <form id="replyForm{{ $comment->id }}"
                                                            action="{{ route('themes.comment.store', $theme) }}" method="POST"
                                                            class="hidden mt-3">
                                                            @csrf
                                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                            <textarea name="comment" rows="3" required
                                                                class="w-full px-4 py-3 bg-white border-2 border-orange-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition text-sm"
                                                                placeholder="Write your reply..."></textarea>
                                                            <div class="flex gap-2 mt-2">
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm font-semibold hover:bg-orange-600 transition">
                                                                    <i class="fas fa-paper-plane mr-1"></i> Send Reply
                                                                </button>
                                                                <button type="button"
                                                                    onclick="toggleReplyForm({{ $comment->id }})"
                                                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>

                                        @if($comment->replies->count() > 0)
                                            <div class="mt-4 space-y-4 pl-16">
                                                @foreach($comment->replies as $reply)
                                                    <div
                                                        class="flex items-start gap-3 p-3 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                                                        <div
                                                            class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                                            {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="flex items-center justify-between mb-1">
                                                                <div>
                                                                    <p class="font-semibold text-gray-900 text-sm">
                                                                        {{ $reply->user->full_name ?? $reply->user->name }}</p>
                                                                    <p class="text-xs text-gray-500">
                                                                        {{ $reply->created_at->diffForHumans() }}</p>
                                                                </div>
                                                                @if(Auth::check() && Auth::id() === $reply->user_id)
                                                                    <form action="{{ route('themes.comment.delete', $theme) }}"
                                                                        method="POST" class="inline">
                                                                        @csrf @method('DELETE')
                                                                        <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                                                        <button type="submit"
                                                                            class="text-red-500 hover:text-red-700 text-xs font-semibold transition">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <p class="text-gray-700 text-sm">{{ $reply->comment }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <div class="text-center py-12">
                                        <i class="fas fa-comments text-gray-300 text-5xl mb-4"></i>
                                        <p class="text-gray-500 font-medium">No reviews yet. Be the first to review this
                                            theme!</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <i class="fas fa-info-circle text-orange-600"></i> Theme Details
                            </h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600 font-medium">Version:</span>
                                    <span class="font-bold text-gray-900">{{ $theme->version }}</span>
                                </div>
                                <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600 font-medium">Author:</span>
                                    <span class="font-bold text-gray-900">{{ $theme->author }}</span>
                                </div>
                                <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600 font-medium">Type:</span>
                                    <span
                                        class="font-bold {{ $theme->is_premium ? 'text-yellow-600' : 'text-green-600' }}">
                                        {{ $theme->is_premium ? 'Premium' : 'Free' }}
                                    </span>
                                </div>
                                <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600 font-medium">Status:</span>
                                    <span
                                        class="font-bold {{ $theme->is_active ? 'text-green-600' : 'text-gray-500' }}">
                                        {{ $theme->is_active ? 'Active' : 'Coming Soon' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-br from-orange-500 to-amber-600 text-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-question-circle text-xl"></i>
                                </div>
                                <h3 class="font-bold text-lg">Need Help?</h3>
                            </div>
                            <p class="text-white/90 text-sm mb-4">Have questions about this theme? Our support team is
                                here to help!</p>
                            <a href="{{ route('landing.index') }}#contact"
                                class="block text-center px-4 py-3 bg-white text-orange-600 rounded-lg font-bold text-sm hover:bg-orange-50 transition shadow-lg">
                                <i class="fas fa-envelope mr-2"></i> Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Upgrade Modal -->
    <div id="upgradeModal"
    class="fixed inset-0 bg-black/60 modal-backdrop flex items-center justify-center z-50 hidden px-4 overflow-y-auto">
        <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] modal-content overflow-y-auto">
            <div
                class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-500 p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-16 -translate-y-16">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full translate-x-20 translate-y-20">
                    </div>
                </div>
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-xl mb-4">
                        <i class="fas fa-crown text-4xl text-yellow-500"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2 shimmer">Unlock Premium Access</h2>
                    <p class="text-yellow-100 text-lg">Get access to exclusive premium themes</p>
                </div>
            </div>
            <div class="p-8">
                <div
                    class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-2xl p-6 mb-6 border-2 border-yellow-200">
                    <div class="flex items-center gap-4">
                        @if($theme->thumbnail_path)
                            <img src="{{ asset('storage/' . $theme->thumbnail_path) }}" alt="{{ $theme->name }}"
                                class="w-24 h-24 rounded-xl object-cover shadow-lg">
                        @endif
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $theme->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $theme->description }}</p>
                        </div>
                        <span
                            class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Premium
                        </span>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-gift text-orange-500"></i>
                        Premium Membership Benefits
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 feature-check">
                            <div
                                class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Access All Premium Themes</p>
                                <p class="text-sm text-gray-600">Unlock exclusive, professionally designed themes</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 feature-check">
                            <div
                                class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Advanced Customization</p>
                                <p class="text-sm text-gray-600">Full control over colors, layouts, and sections</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 feature-check">
                            <div
                                class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Priority Support</p>
                                <p class="text-sm text-gray-600">Get help faster with dedicated premium support</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 feature-check">
                            <div
                                class="w-6 h-6 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Early Access to New Features</p>
                                <p class="text-sm text-gray-600">Be the first to try new themes and updates</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('landing.index') }}#contact"
                        class="flex-1 px-6 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-bold text-center shadow-lg hover:from-orange-600 hover:to-orange-700 transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                        <i class="fas fa-envelope"></i> Contact Us to Upgrade
                    </a>
                    <button onclick="closeUpgradeModal()"
                        class="flex-1 px-6 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-bold transition-all">
                        Maybe Later
                    </button>
                </div>
                <p class="text-center text-sm text-gray-500 mt-6">
                    <i class="fas fa-info-circle mr-1"></i>
                    Contact our team to learn about premium pricing and plans
                </p>
            </div>
        </div>
    </div>

    <!-- Activation Modal -->
    <div id="activationModal"
        class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all scale-95 opacity-0"
            id="modalContent">
            <div class="bg-gradient-to-r from-orange-500 to-amber-600 text-white p-6 rounded-t-2xl">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-paint-brush text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Activate Theme</h3>
                        <p class="text-sm text-white/90">{{ $theme->name }}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-900 font-semibold mb-2">Are you sure you want to activate
                            "{{ $theme->name }}"?</p>
                        <p class="text-gray-600 text-sm">This will change your portfolio's appearance immediately. You
                            can switch back anytime.</p>
                    </div>
                </div>
                @if($theme->thumbnail_path)
                    <div class="mb-6 rounded-xl overflow-hidden border-2 border-orange-200">
                        <img src="{{ asset('storage/' . $theme->thumbnail_path) }}" alt="{{ $theme->name }}"
                            class="w-full h-32 object-cover">
                    </div>
                @endif
                <div class="flex gap-3">
                    <button type="button" onclick="closeActivationModal()"
                        class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition">Cancel</button>
                    <button type="button" onclick="confirmActivation()"
                        class="flex-1 px-4 py-3 btn-primary text-white rounded-lg font-semibold shadow-lg">
                        <i class="fas fa-check mr-2"></i> Activate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-4 right-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 max-w-md animate-slide-in"
            id="successMessage">
            <div class="flex items-start gap-3">
                <i class="fas fa-check-circle text-2xl"></i>
                <div>
                    <p class="font-bold">Success!</p>
                    <p class="text-sm text-white/90">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="fixed top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 max-w-md animate-slide-in"
            id="errorMessage">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-circle text-2xl"></i>
                <div>
                    <p class="font-bold">Error!</p>
                    <p class="text-sm text-white/90">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Premium Modal
        function showUpgradeModal() {
            const modal = document.getElementById('upgradeModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeUpgradeModal() {
            const modal = document.getElementById('upgradeModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        document.getElementById('upgradeModal')?.addEventListener('click', e => {
            if (e.target === document.getElementById('upgradeModal')) closeUpgradeModal();
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeUpgradeModal();
        });

        // Toggle Reply Form
        function toggleReplyForm(commentId) {
            const form = document.getElementById(`replyForm${commentId}`);
            if (form.classList.contains('hidden')) {
                document.querySelectorAll('[id^="replyForm"]').forEach(f => f.classList.add('hidden'));
                form.classList.remove('hidden');
                form.querySelector('textarea').focus();
            } else {
                form.classList.add('hidden');
            }
        }

        // Rating Stars
        const stars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('ratingInput');
        if (stars.length > 0) {
            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const rating = this.dataset.rating;
                    ratingInput.value = rating;
                    updateStars(rating);
                });
                star.addEventListener('mouseenter', function () {
                    updateStars(this.dataset.rating);
                });
            });
            const ratingContainer = document.getElementById('ratingStars');
            if (ratingContainer) {
                ratingContainer.addEventListener('mouseleave', () => {
                    updateStars(ratingInput.value || 0);
                });
            }
        }
        function updateStars(rating) {
            stars.forEach(s => {
                if (s.dataset.rating <= rating) {
                    s.classList.add('active');
                    s.style.color = '#F59E0B';
                } else {
                    s.classList.remove('active');
                    s.style.color = '#D1D5DB';
                }
            });
        }

        // Activation Modal
        let activationForm = null;
        function showActivationModal(form) {
            activationForm = form;
            const modal = document.getElementById('activationModal');
            const content = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }
        function closeActivationModal() {
            const modal = document.getElementById('activationModal');
            const content = document.getElementById('modalContent');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => { modal.classList.add('hidden'); activationForm = null; }, 200);
        }
        function confirmActivation() {
            if (activationForm) activationForm.submit();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const activateForm = document.querySelector('form.activation-form');
            if (activateForm) {
                activateForm.addEventListener('submit', e => {
                    e.preventDefault();
                    showActivationModal(activateForm);
                });
            }

            // Close modals on backdrop click
            document.getElementById('activationModal')?.addEventListener('click', e => {
                if (e.target === document.getElementById('activationModal')) closeActivationModal();
            });

            // Auto-hide flash messages
            setTimeout(() => {
                ['successMessage', 'errorMessage'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.style.transition = 'opacity 0.5s, transform 0.5s';
                        el.style.opacity = '0';
                        el.style.transform = 'translateX(100%)';
                        setTimeout(() => el.remove(), 500);
                    }
                });
            }, 5000);
        });
    </script>

    <!-- ✅ LANDING PAGE FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-12 px-4 mt-16">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/detech.png') }}" class="w-10 h-10 object-contain scale-150 mb-1"
                            alt="Detech Icon">
                        <span class="text-xl font-bold text-white">Detech</span>
                    </div>
                    <p class="text-sm">Build stunning portfolios effortlessly.</p>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="https://www.detech.live#services" target="_blank"
                                class="hover:text-white transition">Platform Engineering</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank"
                                class="hover:text-white transition">AI & Cloud Engineering</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank"
                                class="hover:text-white transition">Web & Mobile Development</a></li>
                        <li><a href="https://www.detech.live#services" target="_blank"
                                class="hover:text-white transition">AR & VR Experiences</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Our Work</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="https://www.detech.live#work" target="_blank"
                                class="hover:text-white transition">VolunTrack Nexus</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank"
                                class="hover:text-white transition">Authentz</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank"
                                class="hover:text-white transition">Kunam Dry Fish</a></li>
                        <li><a href="https://www.detech.live#work" target="_blank"
                                class="hover:text-white transition">100 Bucks</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Get in Touch</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="mailto:kingshipmena@gmail.com"
                                class="hover:text-white transition">kingshipmena@gmail.com</a></li>
                        <li><a href="https://www.detech.live#pricing" target="_blank"
                                class="hover:text-white transition">Plans & Pricing</a></li>
                        <li><a href="https://www.detech.live#contact" target="_blank"
                                class="hover:text-white transition">Schedule a Meeting</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm">© 2025 Detech Company. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="https://www.linkedin.com/company/detech" target="_blank"
                        class="hover:text-white transition"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com" target="_blank" class="hover:text-white transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="mailto:kingshipmena@gmail.com" class="hover:text-white transition"><i
                            class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>