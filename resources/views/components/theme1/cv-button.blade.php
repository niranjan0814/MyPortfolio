<!-- CTA Buttons with CV Download - Matching app.blade.php Theme -->
                    <div class="pt-6 flex flex-col sm:flex-row flex-wrap gap-4 items-center sm:items-start">
                        
                        <!-- Contact Button - Matches existing gradient style -->
                        <a href="#contact"
                            class="btn-glass group relative inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg overflow-hidden">
                            <span class="relative z-10 drop-shadow-lg">
                                {{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}
                            </span>
                            <img src="{{ $aboutContent['stats_icon_urls']['cta'] ?? 'https://img.icons8.com/?size=100&id=62vgtZLAw1gl&format=png&color=FFFFFF' }}"
                                class="relative z-10 w-5 h-5 group-hover:translate-x-2 transition-transform filter brightness-0 invert drop-shadow-lg" 
                                alt="CTA Icon" />
                            <!-- Animated gradient overlay on hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>

                        <!-- Download CV Button - Green gradient matching app theme -->
                        @if($aboutContent['user']->hasCv())
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                class="btn-glass group relative inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg overflow-hidden"
                                download>
                                <!-- Download Icon -->
                                <svg class="relative z-10 w-5 h-5 group-hover:translate-y-1 transition-transform drop-shadow-lg" 
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                <span class="relative z-10 drop-shadow-lg">Download CV</span>
                                <!-- Animated gradient overlay on hover -->
                                <div class="absolute inset-0 bg-gradient-to-r from-teal-700 via-emerald-700 to-green-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>

                            <!-- View CV Button - White style matching app theme -->
                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                target="_blank"
                                class="btn-glass group relative inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg"
                                style="background: var(--card-bg); color: var(--text-primary); border: 2px solid var(--border-color);">
                                <!-- Eye Icon -->
                                <svg class="w-5 h-5 text-emerald-600 group-hover:scale-110 transition-transform" 
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-800">View CV</span>
                            </a>
                        @endif
                    </div>

                    <!-- Toast Notification for CV Download -->
                    <div id="cv-toast" class="fixed top-24 right-8 z-[9999] hidden pointer-events-none">
                        <div class="bg-white rounded-xl shadow-2xl border-2 border-emerald-500 p-4 flex items-center gap-3 animate-slideIn pointer-events-auto min-w-[320px]">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-800">CV Download Started</p>
                                <p class="text-sm text-gray-600">Your file will download shortly</p>
                            </div>
                            <button onclick="this.parentElement.parentElement.classList.add('hidden')" 
                                    class="text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Toast Animation Styles -->
                    <style>
                        @keyframes slideIn {
                            from {
                                transform: translateX(400px);
                                opacity: 0;
                            }
                            to {
                                transform: translateX(0);
                                opacity: 1;
                            }
                        }
                        
                        .animate-slideIn {
                            animation: slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                        }

                        /* Ensure toast appears above everything */
                        #cv-toast {
                            z-index: 99999 !important;
                        }

                        /* CV Button Internal Styles */
                        /* Glass Button */
                        .btn-glass {
                            background: rgba(255, 255, 255, 0.05);
                            backdrop-filter: blur(20px) saturate(180%);
                            -webkit-backdrop-filter: blur(20px) saturate(180%);
                            padding: 0.75rem 2rem;
                            border-radius: 9999px;
                            font-weight: 600;
                            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                            position: relative;
                            overflow: hidden;
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            border: 1px solid var(--border-color);
                            color: var(--text-primary);
                        }

                        [data-theme="light"] .btn-glass {
                            background: rgba(255, 255, 255, 0.6);
                            color: var(--text-primary);
                        }

                        .btn-glass:hover {
                            background: var(--accent-primary);
                            border-color: var(--accent-primary);
                            color: white;
                            box-shadow: 0 0 15px var(--btn-glow);
                            transform: translateY(-2px);
                        }
                    </style>

                    <!-- Toast Trigger Script -->
                    <script>
                        // Wait for DOM to be fully loaded
                        if (document.readyState === 'loading') {
                            document.addEventListener('DOMContentLoaded', initCVToast);
                        } else {
                            initCVToast();
                        }

                        function initCVToast() {
                            const downloadBtn = document.querySelector('a[download][href*="cv"]');
                            const toast = document.getElementById('cv-toast');
                            
                            if (downloadBtn && toast) {
                                downloadBtn.addEventListener('click', function(e) {
                                    // Show toast
                                    toast.classList.remove('hidden');
                                    
                                    // Auto-hide after 4 seconds
                                    setTimeout(() => {
                                        toast.classList.add('hidden');
                                    }, 4000);
                                });
                            }
                        }
                    </script>