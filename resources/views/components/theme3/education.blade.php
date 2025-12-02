@props(['educations'])

<style>
    /* ============================================
       THEME 3 EDUCATION - CARD FLIP WITH PROGRESS
       Impressive 3D Flip Cards with Animated Rings
       ============================================ */
    
    :root {
        --t3-edu-bg: #f8fafc;
        --t3-edu-surface: #ffffff;
        --t3-edu-text: #1a202c;
        --t3-edu-text-muted: #4a5568;
        --t3-edu-accent: #00cc7a;
        --t3-edu-accent-2: #0099cc;
        --t3-edu-border: rgba(0, 204, 122, 0.15);
        --t3-edu-shadow: 0 20px 60px rgba(0, 204, 122, 0.15);
        --t3-edu-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-edu-bg: #0a0a12;
        --t3-edu-surface: #151522;
        --t3-edu-text: #ffffff;
        --t3-edu-text-muted: #b4c6e0;
        --t3-edu-accent: #00ff9d;
        --t3-edu-accent-2: #00d4ff;
        --t3-edu-border: rgba(0, 255, 157, 0.15);
        --t3-edu-shadow: 0 20px 60px rgba(0, 255, 157, 0.3);
        --t3-edu-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    /* Section */
    .t3-edu-section {
        background: var(--t3-edu-bg);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    /* Animated Grid Background - REMOVED */
    .t3-edu-grid-bg {
        display: none;
    }

    /* Floating Orbs */
    .t3-edu-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-edu-gradient);
        filter: blur(100px);
        opacity: 0.08;
        pointer-events: none;
        animation: t3OrbFloat 20s ease-in-out infinite;
    }

    .t3-edu-orb-1 {
        width: 500px;
        height: 500px;
        top: -10%;
        left: -10%;
        animation-delay: 0s;
    }

    .t3-edu-orb-2 {
        width: 450px;
        height: 450px;
        bottom: -10%;
        right: -10%;
        animation-delay: 5s;
    }

    @keyframes t3OrbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(50px, -50px) scale(1.1); }
    }

    /* Container */
    .t3-edu-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Header */
    .t3-edu-header {
        text-align: center;
        margin-bottom: 5rem;
        position: relative;
    }

    .t3-edu-title {
        font-size: clamp(2.5rem, 5vw, 4.5rem);
        font-weight: 900;
        margin-bottom: 1.5rem;
        color: var(--t3-edu-text);
        letter-spacing: -0.03em;
        position: relative;
        display: inline-block;
    }

    .t3-edu-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--t3-edu-gradient);
        border-radius: 10px;
        animation: t3TitleUnderline 2s ease-in-out infinite;
    }

    @keyframes t3TitleUnderline {
        0%, 100% { transform: scaleX(0.5); opacity: 0.5; }
        50% { transform: scaleX(1); opacity: 1; }
    }

    .t3-edu-title-accent {
        background: var(--t3-edu-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-edu-subtitle {
        font-size: 1.25rem;
        color: var(--t3-edu-text-muted);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Cards Grid */
    .t3-edu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    /* Card Container with 3D Perspective */
    .t3-edu-card-container {
        perspective: 1000px;
        height: 380px;
    }

    /* Flip Card */
    .t3-edu-flip-card {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        transform-style: preserve-3d;
    }

    .t3-edu-card-container:hover .t3-edu-flip-card {
        transform: rotateY(180deg);
    }

    /* Card Sides */
    .t3-edu-card-front,
    .t3-edu-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 24px;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        background: var(--t3-edu-surface);
        border: 1px solid var(--t3-edu-border);
        box-shadow: var(--t3-edu-shadow);
    }

    .t3-edu-card-back {
        transform: rotateY(180deg);
        background: var(--t3-edu-gradient);
        color: white;
        justify-content: center;
    }

    /* Front Card Design */
    .t3-edu-progress-ring {
        width: 110px;
        height: 110px;
        margin: 0 auto 1.5rem;
        position: relative;
    }

    .t3-progress-circle {
        transform: rotate(-90deg);
    }

    .t3-progress-bg {
        fill: none;
        stroke: rgba(0, 204, 122, 0.1);
        stroke-width: 8;
    }

    [data-theme="dark"] .t3-progress-bg {
        stroke: rgba(0, 255, 157, 0.1);
    }

    .t3-progress-bar {
        fill: none;
        stroke: url(#t3-gradient);
        stroke-width: 8;
        stroke-linecap: round;
        stroke-dasharray: 295;
        stroke-dashoffset: 295;
        animation: t3ProgressFill 2s ease-out forwards;
    }

    @keyframes t3ProgressFill {
        to { stroke-dashoffset: 0; }
    }

    .t3-progress-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(0, 204, 122, 0.25);
    }

    [data-theme="dark"] .t3-progress-icon {
        background: var(--t3-edu-surface);
        box-shadow: 0 6px 20px rgba(0, 255, 157, 0.25);
    }

    .t3-progress-icon img {
        width: 40px;
        height: 40px;
        object-fit: contain;
        /* Show original icon colors - no filter */
    }

    .t3-progress-icon i {
        font-size: 1.5rem;
        background: linear-gradient(135deg, #ff6b6b, #ffa726, #f9ca24, #6c5ce7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-edu-degree {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t3-edu-text);
        text-align: center;
        line-height: 1.3;
        margin-bottom: 0.5rem;
    }

    .t3-edu-institution {
        font-size: 1rem;
        font-weight: 600;
        background: var(--t3-edu-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-align: center;
        margin-bottom: 1rem;
    }

    .t3-edu-year-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: rgba(0, 204, 122, 0.1);
        border: 1px solid var(--t3-edu-border);
        border-radius: 100px;
        color: var(--t3-edu-accent);
        font-size: 0.875rem;
        font-weight: 700;
        margin: 0 auto;
    }

    [data-theme="dark"] .t3-edu-year-badge {
        background: rgba(0, 255, 157, 0.1);
    }

    /* Back Card Design */
    .t3-edu-back-content {
        text-align: center;
    }

    .t3-edu-back-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        backdrop-filter: blur(10px);
    }

    .t3-edu-back-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: white;
    }

    .t3-edu-back-details {
        font-size: 1.0625rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 2rem;
    }

    .t3-edu-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 100px;
        color: white;
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        backdrop-filter: blur(10px);
    }

    /* Flip Hint */
    .t3-flip-hint {
        position: absolute;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.75rem;
        color: var(--t3-edu-text-muted);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        opacity: 0.7;
        animation: t3HintBounce 2s ease-in-out infinite;
    }

    @keyframes t3HintBounce {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50% { transform: translateX(-50%) translateY(-5px); }
    }

    /* Empty State */
    .t3-empty-state {
        text-align: center;
        padding: 6rem 2rem;
    }

    .t3-empty-icon {
        width: 120px;
        height: 120px;
        background: var(--t3-edu-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        color: white;
        font-size: 3rem;
        animation: t3EmptyPulse 2s ease-in-out infinite;
    }

    @keyframes t3EmptyPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .t3-empty-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--t3-edu-text);
        margin-bottom: 1rem;
    }

    .t3-empty-text {
        font-size: 1.125rem;
        color: var(--t3-edu-text-muted);
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .t3-edu-section {
            padding: 4rem 0;
        }

        .t3-edu-header {
            margin-bottom: 3rem;
        }

        .t3-edu-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .t3-edu-card-container {
            height: 420px;
        }

        .t3-edu-card-front,
        .t3-edu-card-back {
            padding: 2rem;
        }
    }

    @media (max-width: 480px) {
        .t3-edu-card-container {
            height: 400px;
        }

        .t3-edu-degree {
            font-size: 1.25rem;
        }

        .t3-edu-institution {
            font-size: 1rem;
        }

        .t3-edu-progress-ring {
            width: 120px;
            height: 120px;
        }
    }
</style>

<section id="education" class="t3-edu-section">
    <!-- Animated Grid Background -->
    <div class="t3-edu-grid-bg"></div>

    <!-- Floating Orbs -->
    <div class="t3-edu-orb t3-edu-orb-1"></div>
    <div class="t3-edu-orb t3-edu-orb-2"></div>

    <!-- SVG Gradient Definition -->
    <svg width="0" height="0" style="position: absolute;">
        <defs>
            <linearGradient id="t3-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#00cc7a;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#0099cc;stop-opacity:1" />
            </linearGradient>
        </defs>
    </svg>

    <div class="t3-edu-container">
        <!-- Header -->
        <div class="t3-edu-header">
            <h2 class="t3-edu-title">
                Education <span class="t3-edu-title-accent">Journey</span>
            </h2>
            <p class="t3-edu-subtitle">
                Academic excellence and continuous learning - Hover to explore details
            </p>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="t3-empty-state">
                <div class="t3-empty-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="t3-empty-title">No Education Added Yet</h3>
                <p class="t3-empty-text">
                    Educational background will appear here once added through the admin panel.
                </p>
            </div>
        @else
            <!-- Education Grid -->
            <div class="t3-edu-grid">
                @foreach($educations->sortByDesc('year') as $index => $education)
                    <div class="t3-edu-card-container">
                        <div class="t3-edu-flip-card">
                            <!-- Front Side -->
                            <div class="t3-edu-card-front">
                                <!-- Progress Ring -->
                                <div class="t3-edu-progress-ring">
                                    <svg class="t3-progress-circle" width="110" height="110">
                                        <circle class="t3-progress-bg" cx="55" cy="55" r="47"/>
                                        <circle class="t3-progress-bar" cx="55" cy="55" r="47"/>
                                    </svg>
                                    <div class="t3-progress-icon">
                                        @if($education->icon_url)
                                            <img src="{{ $education->icon_url }}" alt="{{ $education->institution }}">
                                        @else
                                            <i class="fas fa-university"></i>
                                        @endif
                                    </div>
                                </div>

                                <!-- Content -->
                                <h3 class="t3-edu-degree">{{ $education->degree }}</h3>
                                <p class="t3-edu-institution">{{ $education->institution }}</p>

                                <!-- Year Badge -->
                                <div class="t3-edu-year-badge">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $education->year ?: 'Present' }}
                                </div>

                                <!-- Flip Hint -->
                                <div class="t3-flip-hint">
                                    <i class="fas fa-sync-alt"></i>
                                    Hover to see details
                                </div>
                            </div>

                            <!-- Back Side -->
                            <div class="t3-edu-card-back">
                                <div class="t3-edu-back-content">
                                    <div class="t3-edu-back-icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <h3 class="t3-edu-back-title">{{ $education->degree }}</h3>
                                    
                                    @if($education->details)
                                        <p class="t3-edu-back-details">{{ $education->details }}</p>
                                    @else
                                        <p class="t3-edu-back-details">
                                            Completed at {{ $education->institution }} in {{ $education->year ?: 'Present' }}
                                        </p>
                                    @endif

                                    @php
                                        // Parse the year field to determine if completed
                                        $isCompleted = false;
                                        $currentYear = (int)date('Y');
                                        $currentMonth = (int)date('n');
                                        
                                        if ($education->year) {
                                            $yearStr = trim($education->year);
                                            
                                            // Check for "Present" or "Current" - always ongoing
                                            if (stripos($yearStr, 'present') !== false || stripos($yearStr, 'current') !== false) {
                                                $isCompleted = false;
                                            }
                                            // Check if year contains a range with month (e.g., "May 2019 - February 2022")
                                            elseif (preg_match('/(\w+)\s+(\d{4})\s*-\s*(\w+)\s+(\d{4})/', $yearStr, $matches)) {
                                                $endMonth = $matches[3];
                                                $endYear = (int)$matches[4];
                                                
                                                // Convert month name to number
                                                $endMonthNum = (int)date('n', strtotime($endMonth . ' 1'));
                                                
                                                // Check if end date is in the past
                                                if ($endYear < $currentYear) {
                                                    $isCompleted = true;
                                                } elseif ($endYear == $currentYear && $endMonthNum < $currentMonth) {
                                                    $isCompleted = true;
                                                }
                                            }
                                            // Check if year contains a simple range (e.g., "2020-2024" or "2020 - 2024")
                                            elseif (preg_match('/(\d{4})\s*-\s*(\d{4})/', $yearStr, $matches)) {
                                                $endYear = (int)$matches[2];
                                                $isCompleted = $endYear < $currentYear;
                                            }
                                            // Check if it's a single year with month (e.g., "December 2018")
                                            elseif (preg_match('/(\w+)\s+(\d{4})/', $yearStr, $matches)) {
                                                $month = $matches[1];
                                                $year = (int)$matches[2];
                                                $monthNum = (int)date('n', strtotime($month . ' 1'));
                                                
                                                if ($year < $currentYear) {
                                                    $isCompleted = true;
                                                } elseif ($year == $currentYear && $monthNum < $currentMonth) {
                                                    $isCompleted = true;
                                                }
                                            }
                                            // Check if year is just a single year (e.g., "2024")
                                            elseif (preg_match('/^(\d{4})$/', $yearStr, $matches)) {
                                                $year = (int)$matches[1];
                                                $isCompleted = $year < $currentYear;
                                            }
                                        }
                                    @endphp

                                    @if($isCompleted)
                                        <div class="t3-edu-status-badge">
                                            <i class="fas fa-check-circle"></i>
                                            Completed
                                        </div>
                                    @else
                                        <div class="t3-edu-status-badge">
                                            <i class="fas fa-spinner"></i>
                                            Currently Pursuing
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on scroll
        const cards = document.querySelectorAll('.t3-edu-card-container');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1)';
                    }, index * 200);
                }
            });
        }, { threshold: 0.1 });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px) scale(0.9)';
            card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            observer.observe(card);
        });
    });
</script>
