{{-- resources/views/components/theme2/blog-show.blade.php --}}

@props(['user', 'post', 'headerContent', 'footerContent'])

<section class="py-24 bg-neutral-950 text-white min-h-screen">
    <div class="container mx-auto px-6">
        
        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 text-sm font-mono mb-12 text-neutral-400">
            <a href="{{ route('portfolio.show', $user->slug) }}" class="hover:text-lime-400 transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('portfolio.show', $user->slug) }}#blog" class="hover:text-lime-400 transition-colors">Blog</a>
            <span>/</span>
            <span class="text-white">{{ $post->title }}</span>
        </div>

        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="mb-12 space-y-6">
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 bg-neutral-900 border border-neutral-800 text-lime-400 font-mono text-xs uppercase tracking-widest">
                        {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Draft' }}
                    </span>
                </div>

                <h1 class="text-4xl md:text-6xl font-bold tracking-tighter">
                    {{ $post->title }}<span class="text-lime-400">.</span>
                </h1>
                
                <div class="w-full h-[1px] bg-neutral-800"></div>
            </div>

            <!-- Hero Image -->
            @if($post->hero_image_path)
                <div class="mb-12 relative border border-neutral-800 bg-neutral-900 overflow-hidden group">
                    <div class="absolute inset-0 bg-lime-400 translate-x-2 translate-y-2 -z-10 group-hover:translate-x-4 group-hover:translate-y-4 transition-transform"></div>
                    <img src="{{ asset('storage/' . $post->hero_image_path) }}" 
                         alt="{{ $post->title }}" 
                         class="w-full aspect-video object-cover">
                </div>
            @endif

            <!-- Content -->
            <div class="prose prose-invert prose-lg max-w-none prose-headings:font-bold prose-headings:tracking-tight prose-a:text-lime-400 prose-a:no-underline hover:prose-a:underline prose-img:rounded-none prose-img:border prose-img:border-neutral-800">
                {!! $post->content !!}
            </div>

            <!-- Comments Section -->
            <div class="mt-24 pt-12 border-t border-neutral-800">
                <div class="flex items-center gap-4 mb-12">
                    <div class="w-12 h-12 bg-neutral-900 border border-neutral-800 flex items-center justify-center">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold tracking-tighter">
                        Comments <span class="text-neutral-500">({{ $post->comments->count() }})</span>
                    </h2>
                </div>

                <!-- Comment Form -->
                @auth
                    <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="mb-16">
                        @csrf
                        <div class="mb-6">
                            <textarea name="comment" rows="4" required 
                                      class="w-full bg-neutral-900 border border-neutral-800 text-white p-4 focus:border-lime-400 focus:outline-none transition-colors font-mono text-sm"
                                      placeholder="Share your thoughts..."></textarea>
                        </div>
                        <button type="submit" 
                                class="px-8 py-3 bg-lime-400 text-black font-bold hover:bg-lime-500 transition-colors flex items-center gap-2">
                            Post Comment
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                @else
                    <div class="mb-16 p-8 bg-neutral-900 border border-neutral-800 text-center">
                        <p class="text-neutral-400 mb-6 font-mono">Please login to join the discussion.</p>
                        <a href="{{ route('filament.admin.auth.login') }}" 
                           class="inline-block px-8 py-3 border border-neutral-700 text-white font-bold hover:border-lime-400 hover:text-lime-400 transition-colors">
                            Login
                        </a>
                    </div>
                @endauth

                <!-- Comments List -->
                <div class="space-y-12">
                    @forelse($post->comments as $comment)
                        <div class="group">
                            <div class="flex gap-6">
                                <div class="w-12 h-12 bg-neutral-800 flex items-center justify-center text-lime-400 font-bold font-mono text-lg flex-shrink-0 border border-neutral-700">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-3">
                                        <div>
                                            <h4 class="font-bold text-white text-lg">
                                                {{ $comment->user->name }}
                                            </h4>
                                            <span class="text-xs font-mono text-neutral-500 uppercase tracking-wider">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        @if(auth()->id() === $comment->user_id)
                                            <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <button type="submit" class="text-neutral-600 hover:text-red-500 text-xs font-mono uppercase tracking-wider transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    
                                    <p class="text-neutral-300 leading-relaxed mb-4">
                                        {{ $comment->comment }}
                                    </p>

                                    <!-- Reply Button -->
                                    @auth
                                        <button onclick="toggleReplyForm('{{ $comment->id }}')" 
                                                class="text-sm font-mono text-lime-400 hover:text-lime-300 flex items-center gap-2 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                            </svg>
                                            Reply
                                        </button>
                                        
                                        <!-- Reply Form -->
                                        <form id="replyForm{{ $comment->id }}" 
                                              action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" 
                                              method="POST" 
                                              class="hidden mt-6 ml-6 pl-6 border-l border-neutral-800">
                                            @csrf
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <div class="mb-4">
                                                <textarea name="comment" rows="3" required 
                                                          class="w-full bg-neutral-900 border border-neutral-800 text-white p-3 focus:border-lime-400 focus:outline-none transition-colors font-mono text-sm"
                                                          placeholder="Write a reply..."></textarea>
                                            </div>
                                            <div class="flex gap-4">
                                                <button type="submit" 
                                                        class="px-6 py-2 bg-white text-black text-sm font-bold hover:bg-lime-400 transition-colors">
                                                    Reply
                                                </button>
                                                <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')"
                                                        class="px-6 py-2 border border-neutral-800 text-neutral-400 text-sm font-bold hover:text-white transition-colors">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    @endauth

                                    <!-- Nested Replies -->
                                    @if($comment->replies->count() > 0)
                                        <div class="mt-8 space-y-8 ml-6 pl-6 border-l border-neutral-800">
                                            @foreach($comment->replies as $reply)
                                                <div class="flex gap-4">
                                                    <div class="w-8 h-8 bg-neutral-900 flex items-center justify-center text-lime-400 font-bold font-mono text-sm flex-shrink-0 border border-neutral-800">
                                                        {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="flex items-center justify-between mb-2">
                                                            <div>
                                                                <h5 class="font-bold text-white text-sm">
                                                                    {{ $reply->user->name }}
                                                                </h5>
                                                                <span class="text-xs font-mono text-neutral-500 uppercase tracking-wider">
                                                                    {{ $reply->created_at->diffForHumans() }}
                                                                </span>
                                                            </div>
                                                            @if(auth()->id() === $reply->user_id)
                                                                <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                                    @csrf @method('DELETE')
                                                                    <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                                                    <button type="submit" class="text-neutral-600 hover:text-red-500 text-xs font-mono uppercase tracking-wider transition-colors">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        <p class="text-neutral-400 text-sm">
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
                        <div class="text-center py-12 border border-dashed border-neutral-800">
                            <p class="text-neutral-500 font-mono">No comments yet. Be the first to verify this post.</p>
                        </div>
                    @endforelse
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
