{{-- resources/views/components/theme1/blog-show.blade.php --}}

@props(['user', 'post', 'headerContent', 'footerContent'])

<div class="pt-24 pb-16 relative overflow-hidden"
     style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));">
    
    <!-- Background decoration (Normal theme only) -->
    <div class="absolute inset-0 opacity-5 normal-theme-only pointer-events-none">
        <div class="absolute top-20 left-10 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles absolute inset-0 pointer-events-none"></div>

    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 relative z-10">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="{{ route('portfolio.show', $user->slug) }}" 
               class="font-medium transition-colors hover:opacity-80"
               style="color: var(--accent-blue);">
                Home
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.show', $user->slug) }}#blog" 
               class="font-medium transition-colors hover:opacity-80"
               style="color: var(--accent-blue);">
                Blog
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium" style="color: var(--text-secondary);">{{ $post->title }}</span>
        </nav>
    </div>

    <main class="relative px-4 sm:px-6 lg:px-8 z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Hero Section -->
            <div class="mb-12 animate-fadeIn">
                <div class="relative group">
                    <!-- Glow effect -->
                    <div class="absolute inset-0 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"
                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));"></div>
                    
                    <div class="relative rounded-3xl shadow-2xl p-8 md:p-12 glass-card glass-noise"
                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                        
                        <div class="flex flex-col gap-6">
                            <div class="flex items-center gap-3 mb-2 flex-wrap">
                                <span class="px-3 py-1 rounded-full text-xs font-medium glass-card" 
                                      style="background: var(--glass-bg); color: var(--accent-blue); border: 1px solid var(--border-color);">
                                    {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Draft' }}
                                </span>
                            </div>

                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold gradient-text">
                                {{ $post->title }}
                            </h1>
                            
                            @if($post->hero_image_path)
                                <div class="rounded-2xl overflow-hidden shadow-lg mt-4">
                                    <img src="{{ asset('storage/' . $post->hero_image_path) }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-auto object-cover">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="animate-fadeIn" style="animation-delay: 200ms">
                <div class="rounded-3xl shadow-xl p-8 md:p-12 glass-card glass-noise"
                     style="background: var(--card-bg); border: 2px solid var(--border-color);">
                    
                    <div class="prose prose-lg max-w-none" style="color: var(--text-secondary);">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-12 animate-fadeIn" style="animation-delay: 400ms">
                <div class="rounded-3xl shadow-xl p-8 md:p-12 glass-card glass-noise"
                     style="background: var(--card-bg); border: 2px solid var(--border-color);">
                    
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-3 rounded-2xl shadow-lg glass-card"
                             style="background: var(--glass-bg); border: 1px solid var(--border-color);">
                            <i class="fas fa-comments text-2xl" style="color: var(--accent-blue);"></i>
                        </div>
                        <h2 class="text-2xl font-bold" style="color: var(--text-primary);">
                            Comments ({{ $post->comments->count() }})
                        </h2>
                    </div>

                    <!-- Comment Form -->
                    @auth
                        <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="mb-10">
                            @csrf
                            <div class="mb-4">
                                <textarea name="comment" rows="3" required 
                                          class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/20 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all text-sm outline-none"
                                          style="color: var(--text-primary); background: var(--glass-bg);"
                                          placeholder="Share your thoughts..."></textarea>
                            </div>
                            <button type="submit" 
                                    class="px-6 py-2.5 rounded-xl font-medium transition-all hover:-translate-y-1 shadow-lg"
                                    style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple)); color: white;">
                                Post Comment
                            </button>
                        </form>
                    @else
                        <div class="mb-10 p-6 rounded-xl text-center border border-dashed" style="border-color: var(--border-color);">
                            <p class="mb-4" style="color: var(--text-secondary);">Please login to leave a comment.</p>
                            <a href="{{ route('filament.admin.auth.login') }}" 
                               class="inline-block px-6 py-2.5 rounded-xl font-medium transition-all hover:-translate-y-1 shadow-lg"
                               style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                Login
                            </a>
                        </div>
                    @endauth

                    <!-- Comments List -->
                    <div class="space-y-8">
                        @forelse($post->comments as $comment)
                            <div class="group">
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-lg flex-shrink-0"
                                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <h4 class="font-bold text-sm" style="color: var(--text-primary);">
                                                    {{ $comment->user->name }}
                                                </h4>
                                                <span class="text-xs" style="color: var(--text-muted);">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                            @if(auth()->id() === $comment->user_id)
                                                <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <button type="submit" class="text-red-400 hover:text-red-500 text-xs transition-colors">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        
                                        <p class="text-sm leading-relaxed mb-3" style="color: var(--text-secondary);">
                                            {{ $comment->comment }}
                                        </p>

                                        <!-- Reply Button -->
                                        @auth
                                            <button onclick="toggleReplyForm('{{ $comment->id }}')" 
                                                    class="text-xs font-medium hover:underline flex items-center gap-1 transition-colors"
                                                    style="color: var(--accent-blue);">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                            
                                            <!-- Reply Form -->
                                            <form id="replyForm{{ $comment->id }}" 
                                                  action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" 
                                                  method="POST" 
                                                  class="hidden mt-4 ml-2 pl-4 border-l-2"
                                                  style="border-color: var(--border-color);">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <div class="mb-3">
                                                    <textarea name="comment" rows="2" required 
                                                              class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/20 focus:border-blue-400 focus:ring-1 focus:ring-blue-400/20 transition-all text-sm outline-none"
                                                              style="color: var(--text-primary); background: var(--glass-bg);"
                                                              placeholder="Write a reply..."></textarea>
                                                </div>
                                                <div class="flex gap-2">
                                                    <button type="submit" 
                                                            class="px-4 py-1.5 rounded-lg text-xs font-medium text-white transition-all hover:opacity-90"
                                                            style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                                        Reply
                                                    </button>
                                                    <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')"
                                                            class="px-4 py-1.5 rounded-lg text-xs font-medium transition-all hover:bg-white/10"
                                                            style="color: var(--text-secondary);">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        @endauth

                                        <!-- Nested Replies -->
                                        @if($comment->replies->count() > 0)
                                            <div class="mt-4 space-y-4 ml-2 pl-4 border-l-2" style="border-color: var(--border-color);">
                                                @foreach($comment->replies as $reply)
                                                    <div class="flex gap-3">
                                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md flex-shrink-0"
                                                             style="background: linear-gradient(135deg, var(--accent-purple), var(--accent-pink));">
                                                            {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="flex items-center justify-between mb-1">
                                                                <div>
                                                                    <h5 class="font-bold text-xs" style="color: var(--text-primary);">
                                                                        {{ $reply->user->name }}
                                                                    </h5>
                                                                    <span class="text-[10px]" style="color: var(--text-muted);">
                                                                        {{ $reply->created_at->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                                @if(auth()->id() === $reply->user_id)
                                                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                                        @csrf @method('DELETE')
                                                                        <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                                                        <button type="submit" class="text-red-400 hover:text-red-500 text-[10px] transition-colors">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                            <p class="text-sm" style="color: var(--text-secondary);">
                                                                {{ $reply->comment }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 opacity-60">
                                <p style="color: var(--text-secondary);">No comments yet. Be the first to share your thoughts!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <script>
                function toggleReplyForm(id) {
                    const form = document.getElementById('replyForm' + id);
                    form.classList.toggle('hidden');
                }
            </script>

        </div>
    </main>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    
    .animate-fadeIn { animation: fadeIn 0.8s ease-in; }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    
    .gradient-text {
        background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
    }
    
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }

    /* Prose customization for dark/light modes */
    .prose {
        color: var(--text-secondary);
    }
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        color: var(--text-primary);
    }
    .prose a {
        color: var(--accent-blue);
    }
    .prose strong {
        color: var(--text-primary);
    }
    .prose code {
        color: var(--accent-pink);
    }
    .prose blockquote {
        border-left-color: var(--accent-purple);
        color: var(--text-muted);
    }
</style>
