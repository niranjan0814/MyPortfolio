{{-- resources/views/components/theme3/blog-show.blade.php --}}

@props(['user', 'post', 'headerContent', 'footerContent'])

<section id="blog-show" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-blog-show">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-4xl relative z-10 px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <div class="mb-12">
            <nav class="flex items-center gap-3 text-sm">
                <a href="{{ route('portfolio.show', $user->slug) }}" 
                   class="font-medium transition-colors hover:opacity-80 text-accent-primary">
                    Home
                </a>
                <svg class="w-4 h-4 text-text-muted" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('portfolio.show', $user->slug) }}#blog" 
                   class="font-medium transition-colors hover:opacity-80 text-accent-primary">
                    Blog
                </a>
                <svg class="w-4 h-4 text-text-muted" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium text-text-secondary">{{ $post->title }}</span>
            </nav>
        </div>

        <!-- Hero Section -->
        <div class="mb-12 animate-fadeIn">
            <div class="relative group">
                <!-- Glow effect -->
                <div class="absolute inset-0 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110 bg-gradient-accent"></div>
                
                <div class="relative rounded-3xl p-8 md:p-12 glass-card border-card">
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <span class="px-4 py-1.5 rounded-full text-sm font-semibold glass-card border-card text-accent-primary">
                                {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Draft' }}
                            </span>
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-text-primary">
                            {{ $post->title }}
                        </h1>

                        @if($post->hero_image_path)
                            <div class="rounded-2xl overflow-hidden shadow-2xl mt-4 border-card">
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
            <div class="rounded-3xl p-8 md:p-12 glass-card border-card">
                <div class="prose prose-lg max-w-none text-text-secondary">
                    {!! $post->content !!}
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-12 animate-slide-up" style="animation-delay: 400ms">
                <div class="p-8 md:p-12 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md shadow-2xl">
                    
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-3 rounded-2xl bg-gradient-to-br from-accent-primary to-accent-secondary shadow-lg">
                            <i class="fas fa-comments text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-text-primary">
                            Comments ({{ $post->comments->count() }})
                        </h2>
                    </div>

                    <!-- Comment Form -->
                    @auth
                        <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="mb-10">
                            @csrf
                            <div class="mb-4">
                                <textarea name="comment" rows="3" required 
                                          class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:border-accent-primary focus:ring-2 focus:ring-accent-primary/20 transition-all text-sm outline-none text-text-primary placeholder-text-muted"
                                          placeholder="Share your thoughts..."></textarea>
                            </div>
                            <button type="submit" 
                                    class="px-6 py-2.5 rounded-xl font-medium transition-all hover:-translate-y-1 shadow-lg bg-gradient-to-r from-accent-primary to-accent-secondary text-white">
                                Post Comment
                            </button>
                        </form>
                    @else
                        <div class="mb-10 p-6 rounded-xl text-center border border-dashed border-white/20">
                            <p class="mb-4 text-text-secondary">Please login to leave a comment.</p>
                            <a href="{{ route('filament.admin.auth.login') }}" 
                               class="inline-block px-6 py-2.5 rounded-xl font-medium transition-all hover:-translate-y-1 shadow-lg bg-white/10 text-text-primary border border-white/10 hover:bg-white/20">
                                Login
                            </a>
                        </div>
                    @endauth

                    <!-- Comments List -->
                    <div class="space-y-8">
                        @forelse($post->comments as $comment)
                            <div class="group">
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold shadow-lg flex-shrink-0 bg-gradient-to-br from-accent-primary to-accent-secondary">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <h4 class="font-bold text-sm text-text-primary">
                                                    {{ $comment->user->name }}
                                                </h4>
                                                <span class="text-xs text-text-muted">
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
                                        
                                        <p class="text-sm leading-relaxed mb-3 text-text-secondary">
                                            {{ $comment->comment }}
                                        </p>

                                        <!-- Reply Button -->
                                        @auth
                                            <button onclick="toggleReplyForm('{{ $comment->id }}')" 
                                                    class="text-xs font-medium hover:underline flex items-center gap-1 transition-colors text-accent-primary">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>
                                            
                                            <!-- Reply Form -->
                                            <form id="replyForm{{ $comment->id }}" 
                                                  action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" 
                                                  method="POST" 
                                                  class="hidden mt-4 ml-2 pl-4 border-l-2 border-white/10">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <div class="mb-3">
                                                    <textarea name="comment" rows="2" required 
                                                              class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 focus:border-accent-primary focus:ring-1 focus:ring-accent-primary/20 transition-all text-sm outline-none text-text-primary placeholder-text-muted"
                                                              placeholder="Write a reply..."></textarea>
                                                </div>
                                                <div class="flex gap-2">
                                                    <button type="submit" 
                                                            class="px-4 py-1.5 rounded-lg text-xs font-medium text-white transition-all hover:opacity-90 bg-gradient-to-r from-accent-primary to-accent-secondary">
                                                        Reply
                                                    </button>
                                                    <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')"
                                                            class="px-4 py-1.5 rounded-lg text-xs font-medium transition-all hover:bg-white/10 text-text-secondary">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        @endauth

                                        <!-- Nested Replies -->
                                        @if($comment->replies->count() > 0)
                                            <div class="mt-4 space-y-4 ml-2 pl-4 border-l-2 border-white/10">
                                                @foreach($comment->replies as $reply)
                                                    <div class="flex gap-3">
                                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-md flex-shrink-0 bg-gradient-to-br from-accent-secondary to-purple-500">
                                                            {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="flex items-center justify-between mb-1">
                                                                <div>
                                                                    <h5 class="font-bold text-xs text-text-primary">
                                                                        {{ $reply->user->name }}
                                                                    </h5>
                                                                    <span class="text-[10px] text-text-muted">
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
                                                            <p class="text-sm text-text-secondary">
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
                                <p class="text-text-secondary">No comments yet. Be the first to share your thoughts!</p>
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

    </div>
</section>

<style>
/* Reuse Theme 3 Styles */
[data-theme="light"] {
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --text-primary: #1a202c;
    --text-secondary: #4a5568;
    --text-muted: #718096;
    --accent-primary: #00cc7a;
    --accent-secondary: #0099cc;
    --accent-glow: rgba(0, 204, 122, 0.2);
    --border-light: rgba(0, 204, 122, 0.3);
    --card-bg: rgba(255, 255, 255, 0.8);
    --card-border: rgba(0, 0, 0, 0.1);
    --glass-bg: rgba(255, 255, 255, 0.9);
}

[data-theme="dark"] {
    --bg-primary: #0a0a12;
    --bg-secondary: #151522;
    --text-primary: #ffffff;
    --text-secondary: #b4c6e0;
    --text-muted: #8fa3c7;
    --accent-primary: #00ff9d;
    --accent-secondary: #00d4ff;
    --accent-glow: rgba(0, 255, 157, 0.3);
    --border-light: rgba(0, 255, 157, 0.2);
    --card-bg: rgba(255, 255, 255, 0.05);
    --card-border: rgba(255, 255, 255, 0.1);
    --glass-bg: rgba(255, 255, 255, 0.1);
}

.theme3-blog-show {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
    transition: all 0.3s ease;
}

.particle-container .floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 25s ease-in-out infinite;
    transition: all 0.3s ease;
}

@keyframes particleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
    25% { transform: translate(100px, -80px) scale(1.3); opacity: 0.7; }
    50% { transform: translate(-60px, 120px) scale(0.8); opacity: 0.4; }
    75% { transform: translate(120px, 60px) scale(1.1); opacity: 0.6; }
}

.text-accent-primary { color: var(--accent-primary); }
.text-text-primary { color: var(--text-primary); }
.text-text-secondary { color: var(--text-secondary); }
.text-text-muted { color: var(--text-muted); }

.bg-gradient-accent {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
}

.border-card {
    border: 2px solid var(--border-light);
    background: var(--card-bg);
}

.glass-card {
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.8s ease-out;
}

/* Prose Customization */
.prose {
    color: var(--text-secondary);
}
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: var(--text-primary);
    font-weight: 800;
}
.prose a {
    color: var(--accent-primary);
    text-decoration: none;
}
.prose a:hover {
    text-decoration: underline;
}
.prose strong {
    color: var(--text-primary);
}
.prose code {
    color: var(--accent-secondary);
    background: var(--card-bg);
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
}
.prose blockquote {
    border-left-color: var(--accent-primary);
    color: var(--text-muted);
    background: var(--card-bg);
    padding: 1rem;
    border-radius: 0.5rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 6;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particleContainer.appendChild(particle);
        }
    }
});
</script>
