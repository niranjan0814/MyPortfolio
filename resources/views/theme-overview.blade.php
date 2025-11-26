<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $theme->name }} - Theme Overview | Detech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Matching Landing Page Theme */
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
        .stat-card {
            background: linear-gradient(135deg, rgba(217, 119, 6, 0.1) 0%, rgba(180, 83, 9, 0.05) 100%);
            border: 1px solid rgba(217, 119, 6, 0.2);
        }
        .rating-star {
            transition: color 0.2s;
            cursor: pointer;
        }
        .rating-star:hover,
        .rating-star.active {
            color: #F59E0B;
        }
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-4px);
        }
        .animated-float {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse-ring {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }
    </style>
</head>
<body class="bg-gray-50">
<!-- Navigation - Matching Landing Page -->
<nav class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('landing.index') }}" class="flex items-center space-x-3">
            <div class="w-10 h-10 flex items-center justify-center">
                <img src="{{ asset('images/detech.png') }}" class="w-10 h-10 object-contain scale-150" alt="Detech">
            </div>
            <span class="text-xl font-bold text-gray-900">Detech Portfolio</span>
        </a>
        <div class="flex items-center gap-4">
            @auth
                <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                <a href="/admin" class="px-6 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition font-medium">
                    Dashboard
                </a>
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
    <div class="absolute w-96 h-96 rounded-full -top-48 -left-48 bg-white opacity-5"></div>
    <div class="absolute w-80 h-80 rounded-full bottom-10 -right-40 bg-white opacity-5"></div>
    <div class="container mx-auto relative z-10">
        <div class="max-w-5xl mx-auto">
            <div class="mb-6">
                <a href="{{ route('landing.index') }}#themes" class="inline-flex items-center gap-2 text-white/70 hover:text-white transition group">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    <span class="font-medium">Back to Themes</span>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-white space-y-6">
                    <div class="flex items-center gap-3">
                        <h1 class="text-4xl md:text-5xl font-bold">{{ $theme->name }}</h1>
                        @if($theme->is_premium)
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 px-4 py-1.5 rounded-full text-sm font-bold shadow-lg">
                                Premium
                            </span>
                        @else
                            <span class="bg-gradient-to-r from-green-400 to-emerald-500 text-green-900 px-4 py-1.5 rounded-full text-sm font-bold shadow-lg">
                                Free
                            </span>
                        @endif
                    </div>
                    <p class="text-white/90 text-lg leading-relaxed">{{ $theme->description }}</p>

                    <div class="flex items-center gap-6 text-sm">
                        <div class="flex items-center gap-2 stat-card px-4 py-2 rounded-lg">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-600' }}"></i>
                            @endfor
                            <span class="text-white font-semibold ml-1">{{ number_format($averageRating, 1) }}</span>
                        </div>
                        <div class="text-white/80">
                            <i class="fas fa-comments mr-2"></i>
                            {{ $commentsCount }} {{ Str::plural('review', $commentsCount) }}
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ route('themes.preview', $theme) }}" target="_blank"
                           class="btn-secondary px-8 py-3 rounded-lg font-semibold text-center inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur text-white border-white/30 hover:bg-white hover:text-gray-900">
                            <i class="fas fa-eye"></i>
                            Live Preview
                        </a>

                        @auth
                            @if($hasAccess)
                                @if(auth()->user()->active_theme === $theme->slug)
                                    <button disabled class="px-8 py-3 bg-white/20 text-white rounded-lg font-semibold cursor-not-allowed inline-flex items-center justify-center gap-2 opacity-70">
                                        <i class="fas fa-check-circle"></i>
                                        Currently Active
                                    </button>
                                @else
                                    <form action="{{ route('themes.activate', $theme) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full btn-primary text-white px-8 py-3 rounded-lg font-semibold inline-flex items-center justify-center gap-2 shadow-lg">
                                            <i class="fas fa-check"></i>
                                            Activate Theme
                                        </button>
                                    </form>
                                @endif
                            @elseif($theme->is_premium)
                                <button disabled class="px-8 py-3 bg-white/10 text-white/60 rounded-lg font-semibold cursor-not-allowed inline-flex items-center justify-center gap-2">
                                    <i class="fas fa-lock"></i>
                                    Premium Only
                                </button>
                            @endif
                        @else
                            <a href="/admin/login" class="btn-primary text-white px-8 py-3 rounded-lg font-semibold text-center inline-flex items-center justify-center gap-2">
                                <i class="fas fa-sign-in-alt"></i>
                                Login to Activate
                            </a>
                        @endauth
                    </div>
                </div>

                @if($theme->thumbnail_path)
                    <div class="hidden md:block animated-float">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 shadow-2xl">
                            <img src="{{ asset('storage/' . $theme->thumbnail_path) }}"
                                 alt="{{ $theme->name }}"
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
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-star text-white"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Key Features</h2>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($theme->features as $feature)
                                    <div class="feature-card p-4 bg-gradient-to-br from-orange-50 to-transparent rounded-xl border border-orange-100">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full flex items-center justify-center flex-shrink-0">
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
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-comments text-white"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">User Reviews</h2>
                        </div>

                        <!-- Comment Form + User Review Logic -->
                        @auth
                            @if(!$userHasReviewed)
                                <form action="{{ route('themes.comment.store', $theme) }}" method="POST" class="mb-8 p-6 bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl border border-orange-100">
                                    @csrf
                                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                        <i class="fas fa-pen text-orange-600"></i>
                                        Leave a Review
                                    </h3>
                                    <div class="mb-4">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rating (Optional)</label>
                                        <div class="flex gap-2" id="ratingStars">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star rating-star text-3xl text-gray-300" data-rating="{{ $i }}"></i>
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
                                    <button type="submit" class="btn-primary text-white px-6 py-3 rounded-lg font-semibold shadow-lg">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Submit Review
                                    </button>
                                </form>
                            @else
                                <!-- User already reviewed -->
                                <div class="mb-8 p-6 bg-blue-50 border-2 border-blue-200 rounded-xl">
                                    <div class="flex items-start gap-3 mb-4">
                                        <i class="fas fa-check-circle text-blue-600 text-xl mt-1"></i>
                                        <div>
                                            <p class="text-blue-900 font-semibold mb-2">You've already reviewed this theme</p>
                                            <p class="text-blue-700 text-sm mb-3">Thank you for your feedback!</p>
                                        </div>
                                    </div>
                                    @if($userComments && $userComments->count() > 0)
                                        <div class="space-y-3">
                                            @foreach($userComments as $userComment)
                                                <div class="bg-white p-4 rounded-lg border border-blue-200">
                                                    <div class="flex justify-between items-start mb-2">
                                                        <div>
                                                            @if($userComment->rating)
                                                                <div class="flex gap-1 mb-1">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star text-sm {{ $i <= $userComment->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                                    @endfor
                                                                </div>
                                                            @endif
                                                            <p class="text-sm text-gray-600">{{ $userComment->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        <form action="{{ route('themes.comment.delete', $theme) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="comment_id" value="{{ $userComment->id }}">
                                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold transition">
                                                                <i class="fas fa-trash mr-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <p class="text-gray-700">{{ $userComment->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @else
                            <div class="mb-8 p-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border-2 border-gray-200 text-center">
                                <i class="fas fa-lock text-gray-400 text-4xl mb-4"></i>
                                <p class="text-gray-600 mb-4 font-medium">Please login to leave a review</p>
                                <a href="/admin/login" class="inline-block btn-primary text-white px-8 py-3 rounded-lg font-semibold shadow-lg">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Sign In
                                </a>
                            </div>
                        @endauth

                        <!-- Approved Comments List -->
                        <div class="space-y-6">
                            @forelse($theme->approvedComments as $comment)
                                <div class="border-b border-gray-200 pb-6 last:border-0 hover:bg-gray-50 p-4 rounded-lg transition">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 shadow-lg">
                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2 flex-wrap gap-2">
                                                <div>
                                                    <p class="font-bold text-gray-900">{{ $comment->user->full_name ?? $comment->user->name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                                </div>
                                                @if($comment->rating)
                                                    <div class="flex gap-1">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="fas fa-star text-sm {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                        @endfor
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="text-gray-700 leading-relaxed">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <i class="fas fa-comments text-gray-300 text-5xl mb-4"></i>
                                    <p class="text-gray-500 font-medium">No reviews yet. Be the first to review this theme!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 stat-card">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-info-circle text-orange-600"></i>
                            Theme Details
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between items-center p-3 bg-white rounded-lg">
                                <span class="text-gray-600 font-medium">Version:</span>
                                <span class="font-bold text-gray-900">{{ $theme->version }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-white rounded-lg">
                                <span class="text-gray-600 font-medium">Author:</span>
                                <span class="font-bold text-gray-900">{{ $theme->author }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-white rounded-lg">
                                <span class="text-gray-600 font-medium">Type:</span>
                                <span class="font-bold {{ $theme->is_premium ? 'text-yellow-600' : 'text-green-600' }}">
                                    {{ $theme->is_premium ? 'Premium' : 'Free' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-white rounded-lg">
                                <span class="text-gray-600 font-medium">Status:</span>
                                <span class="font-bold {{ $theme->is_active ? 'text-green-600' : 'text-gray-500' }}">
                                    {{ $theme->is_active ? 'Active' : 'Coming Soon' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-500 to-amber-600 text-white rounded-2xl shadow-lg p-6 pulse-ring">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-question-circle text-xl"></i>
                            </div>
                            <h3 class="font-bold text-lg">Need Help?</h3>
                        </div>
                        <p class="text-white/90 text-sm mb-4 leading-relaxed">Have questions about this theme? Our support team is here to help!</p>
                        <a href="{{ route('landing.index') }}#contact" class="block text-center px-4 py-3 bg-white text-orange-600 rounded-lg font-bold text-sm hover:bg-orange-50 transition shadow-lg">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Messages -->
@if(session('success'))
    <div class="fixed top-4 right-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 max-w-md animate-slide-in" id="successMessage">
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
    <div class="fixed top-4 right-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 max-w-md animate-slide-in" id="errorMessage">
        <div class="flex items-start gap-3">
            <i class="fas fa-exclamation-circle text-2xl"></i>
            <div>
                <p class="font-bold">Error!</p>
                <p class="text-sm text-white/90">{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif

<!-- Activation Modal -->
<div id="activationModal" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all scale-95 opacity-0" id="modalContent">
        <div class="bg-gradient-to-r from-orange-500 to-amber-600 text-white p-6 rounded-t-2xl">
            <div class="flex items-center gap-3">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center pulse-ring">
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
                    <p class="text-gray-900 font-semibold mb-2">Are you sure you want to activate "{{ $theme->name }}"?</p>
                    <p class="text-gray-600 text-sm">This will change your portfolio's appearance immediately. You can switch back anytime.</p>
                </div>
            </div>
            @if($theme->thumbnail_path)
                <div class="mb-6 rounded-xl overflow-hidden border-2 border-orange-200">
                    <img src="{{ asset('storage/' . $theme->thumbnail_path) }}" alt="{{ $theme->name }}" class="w-full h-32 object-cover">
                </div>
            @endif
            <div class="flex gap-3">
                <button type="button" onclick="closeActivationModal()" class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition">
                    Cancel
                </button>
                <button type="button" onclick="confirmActivation()" class="flex-1 px-4 py-3 btn-primary text-white rounded-lg font-semibold shadow-lg">
                    <i class="fas fa-check mr-2"></i>
                    Activate
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Rating stars
    const stars = document.querySelectorAll('.rating-star');
    const ratingInput = document.getElementById('ratingInput');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            ratingInput.value = rating;
            updateStars(rating);
        });
        star.addEventListener('mouseenter', function() {
            updateStars(this.dataset.rating);
        });
    });
    document.getElementById('ratingStars')?.addEventListener('mouseleave', () => {
        updateStars(ratingInput.value || 0);
    });

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

    // Modal
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
        setTimeout(() => {
            modal.classList.add('hidden');
            activationForm = null;
        }, 200);
    }
    function confirmActivation() {
        if (activationForm) activationForm.submit();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const activateForm = document.querySelector('form[action*="activate"]');
        if (activateForm) {
            activateForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showActivationModal(this);
            });
        }
        document.getElementById('activationModal')?.addEventListener('click', e => {
            if (e.target === document.getElementById('activationModal')) closeActivationModal();
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeActivationModal();
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
</body>
</html>