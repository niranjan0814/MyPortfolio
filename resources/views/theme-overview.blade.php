<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $theme->name }} - Theme Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .rating-star { transition: color 0.2s; }
        .rating-star:hover { color: #F59E0B; }
        .rating-star.active { color: #F59E0B; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('landing.index') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/detech.png') }}" class="w-10 h-10" alt="Detech">
                <span class="text-xl font-bold">Detech</span>
            </a>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                    <a href="/admin" class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800">
                        Dashboard
                    </a>
                @else
                    <a href="/admin/login" class="px-4 py-2 text-gray-700 hover:text-gray-900">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Theme Header -->
    <section class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('landing.index') }}#themes" class="text-white/70 hover:text-white">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Themes
                    </a>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <h1 class="text-4xl font-bold">{{ $theme->name }}</h1>
                            @if($theme->is_premium)
                                <span class="bg-yellow-500 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold">
                                    💎 Premium
                                </span>
                            @else
                                <span class="bg-green-500 text-green-900 px-3 py-1 rounded-full text-sm font-semibold">
                                    ✓ Free
                                </span>
                            @endif
                        </div>

                        <p class="text-white/80 text-lg mb-4">{{ $theme->description }}</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-4 text-sm">
                            <div class="flex items-center gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-600' }}"></i>
                                @endfor
                                <span class="text-white/80">{{ number_format($averageRating, 1) }}</span>
                            </div>
                            <span class="text-white/60">|</span>
                            <span class="text-white/80">{{ $commentsCount }} {{ Str::plural('review', $commentsCount) }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <!-- Preview Button -->
                        <a href="{{ route('themes.preview', $theme) }}" 
                           target="_blank"
                           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-center transition">
                            <i class="fas fa-eye mr-2"></i> Live Preview
                        </a>

                        <!-- Activate Button -->
                        @if($hasAccess)
                            <form action="{{ route('portfolio.show', auth()->user()->slug) }}" method="GET">
                                <button type="submit" class="w-full px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                                    <i class="fas fa-check mr-2"></i> Activate Theme
                                </button>
                            </form>
                        @elseif($theme->is_premium)
                            <button disabled class="px-6 py-3 bg-gray-600 text-white rounded-lg font-semibold cursor-not-allowed opacity-60">
                                <i class="fas fa-lock mr-2"></i> Premium Only
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Theme Content -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-8">
                        <!-- Preview Image -->
                        @if($theme->thumbnail_path)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $theme->thumbnail_path) }}" 
                                     alt="{{ $theme->name }}"
                                     class="w-full">
                            </div>
                        @endif

                        <!-- Features -->
                        @if($theme->features)
                            <div class="bg-white rounded-xl shadow-lg p-8">
                                <h2 class="text-2xl font-bold mb-6">Key Features</h2>
                                <div class="grid md:grid-cols-2 gap-4">
                                    @foreach($theme->features as $feature)
                                        <div class="flex items-center gap-3">
                                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                <i class="fas fa-check text-green-600 text-xs"></i>
                                            </div>
                                            <span class="text-gray-700">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Comments Section -->
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold mb-6">User Reviews</h2>

                            <!-- Comment Form -->
                            @auth
                                @if(!$userComment)
                                    <form action="{{ route('themes.comment.store', $theme) }}" method="POST" class="mb-8 p-6 bg-gray-50 rounded-lg">
                                        @csrf
                                        <h3 class="font-semibold mb-4">Leave a Review</h3>
                                        
                                        <!-- Rating -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                            <div class="flex gap-2" id="ratingStars">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star rating-star text-2xl text-gray-300 cursor-pointer" data-rating="{{ $i }}"></i>
                                                @endfor
                                            </div>
                                            <input type="hidden" name="rating" id="ratingInput" value="">
                                        </div>

                                        <!-- Comment -->
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                                            <textarea name="comment" rows="4" required
                                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                      placeholder="Share your experience with this theme..."></textarea>
                                        </div>

                                        <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                                            Submit Review
                                        </button>
                                    </form>
                                @else
                                    <div class="mb-8 p-6 bg-blue-50 border border-blue-200 rounded-lg">
                                        <p class="text-blue-800 mb-3">You've already reviewed this theme.</p>
                                        <form action="{{ route('themes.comment.delete', $theme) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Delete My Review
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <div class="mb-8 p-6 bg-gray-50 rounded-lg text-center">
                                    <p class="text-gray-600 mb-4">Please login to leave a review</p>
                                    <a href="/admin/login" class="inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                                        Sign In
                                    </a>
                                </div>
                            @endauth

                            <!-- Comments List -->
                            <div class="space-y-6">
                                @forelse($theme->approvedComments as $comment)
                                    <div class="border-b border-gray-200 pb-6 last:border-0">
                                        <div class="flex items-start gap-4">
                                            <!-- Avatar -->
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                                {{ substr($comment->user->name, 0, 1) }}
                                            </div>

                                            <div class="flex-1">
                                                <div class="flex items-center justify-between mb-2">
                                                    <div>
                                                        <p class="font-semibold text-gray-900">{{ $comment->user->full_name ?? $comment->user->name }}</p>
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

                                                <p class="text-gray-700">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 text-center py-8">No reviews yet. Be the first to review this theme!</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Theme Info -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="font-bold mb-4">Theme Details</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Version:</span>
                                    <span class="font-medium">{{ $theme->version }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Author:</span>
                                    <span class="font-medium">{{ $theme->author }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Type:</span>
                                    <span class="font-medium">{{ $theme->is_premium ? 'Premium' : 'Free' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium {{ $theme->is_active ? 'text-green-600' : 'text-gray-500' }}">
                                        {{ $theme->is_active ? 'Active' : 'Coming Soon' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Need Help -->
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-200">
                            <h3 class="font-bold mb-2">Need Help?</h3>
                            <p class="text-sm text-gray-600 mb-4">Have questions about this theme?</p>
                            <a href="{{ route('landing.index') }}#contact" class="block text-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm transition">
                                Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="successMessage">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="errorMessage">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Rating stars functionality
        const stars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('ratingInput');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.dataset.rating;
                ratingInput.value = rating;

                stars.forEach(s => {
                    if (s.dataset.rating <= rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseenter', function() {
                const rating = this.dataset.rating;
                stars.forEach(s => {
                    if (s.dataset.rating <= rating) {
                        s.style.color = '#F59E0B';
                    }
                });
            });
        });

        document.getElementById('ratingStars')?.addEventListener('mouseleave', function() {
            const currentRating = ratingInput.value;
            stars.forEach(s => {
                if (s.dataset.rating <= currentRating) {
                    s.style.color = '#F59E0B';
                } else {
                    s.style.color = '#D1D5DB';
                }
            });
        });

        // Auto-hide messages
        setTimeout(() => {
            document.getElementById('successMessage')?.remove();
            document.getElementById('errorMessage')?.remove();
        }, 5000);
    </script>
</body>
</html>