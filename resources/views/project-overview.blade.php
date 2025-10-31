<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevoMart - Project Overview</title>
    <meta name="description" content="A second hand good selling and swapping system with realtime chat">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --accent: #8b5cf6;
            --light: #f8fafc;
            --dark: #1a202c;
            --gray: #6b7280;
            --border: #e5e7eb;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--dark);
            line-height: 1.5;
            min-height: 100vh;
        }

        /* Layout */
        .layout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .main-layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-top: 5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 1024px) {
            .main-layout {
                grid-template-columns: 2fr 1fr;
            }
        }

        /* Header */
        .compact-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            padding: 0.75rem 0;
            background: white;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Cards */
        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-icon.secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
        }

        .card-icon.accent {
            background: linear-gradient(135deg, var(--accent) 0%, #7c3aed 100%);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        /* Project Header */
        .project-header {
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .project-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .project-description {
            font-size: 1.125rem;
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .button-group {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        /* Features */
        .feature-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .feature-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .feature-item {
            padding: 1.25rem;
            background: var(--light);
            border: 1px solid var(--border);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .feature-item:hover {
            border-color: var(--primary);
        }

        .feature-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-description {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* Tech Stack */
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 1rem;
        }

        .tech-item {
            padding: 1rem;
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .tech-item:hover {
            border-color: var(--primary);
            transform: translateY(-1px);
        }

        .tech-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light);
            border-radius: 8px;
        }

        .tech-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--dark);
        }

        /* Overview Section */
        .overview-section {
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .overview-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .overview-content {
            color: var(--gray);
            line-height: 1.6;
        }

        .overview-content p {
            margin-bottom: 1rem;
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            cursor: pointer;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: 40;
        }

        .back-to-top.visible {
            opacity: 1;
            pointer-events: auto;
        }

        .back-to-top:hover {
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: white;
            border-top: 1px solid var(--border);
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            text-align: center;
            color: var(--gray);
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Header -->
    <header class="compact-header">
        <div class="layout-container">
            <div class="flex items-center justify-between">
                <a href="/#projects" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <i class="fas fa-arrow-left text-sm"></i>
                    <span class="font-medium text-sm">Back to Projects</span>
                </a>
                <h1 class="text-lg font-semibold text-gray-800">RevoMart</h1>
            </div>
        </div>
    </header>

    <main class="layout-container">
        <!-- Project Header -->
        <div class="project-header">
            <h1 class="project-title">RevoMart</h1>
            <p class="project-description">A second hand good selling and swapping system with realtime chat</p>
            
            <div class="button-group">
                <a href="#" class="btn btn-primary">
                    <i class="fab fa-github"></i> 
                    <span>View Code</span>
                </a>
                
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-external-link-alt"></i> 
                    <span>Live Demo</span>
                </a>
            </div>
        </div>

        <!-- Main Content Layout -->
        <div class="main-layout">
            <!-- Left Column - Cards -->
            <div class="space-y-6">
                <!-- Key Features Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon secondary">
                            <i class="fas fa-star text-white text-sm"></i>
                        </div>
                        <h2 class="card-title">Key Features</h2>
                    </div>
                    <div class="card-body">
                        <div class="feature-grid">
                            <div class="feature-item">
                                <h3 class="feature-title">
                                    <i class="fas fa-comments text-green-500"></i>
                                    Realtime Chat
                                </h3>
                                <p class="feature-description">
                                    The messaging system with realtime chatting capabilities for seamless communication between buyers and sellers.
                                </p>
                            </div>
                            <div class="feature-item">
                                <h3 class="feature-title">
                                    <i class="fas fa-exchange-alt text-blue-500"></i>
                                    Item Swapping
                                </h3>
                                <p class="feature-description">
                                    Users can swap items directly without monetary transactions, making it easy to exchange goods.
                                </p>
                            </div>
                            <div class="feature-item">
                                <h3 class="feature-title">
                                    <i class="fas fa-search text-purple-500"></i>
                                    Smart Search
                                </h3>
                                <p class="feature-description">
                                    Advanced filtering and search functionality to help users find exactly what they're looking for.
                                </p>
                            </div>
                            <div class="feature-item">
                                <h3 class="feature-title">
                                    <i class="fas fa-shield-alt text-amber-500"></i>
                                    Secure Transactions
                                </h3>
                                <p class="feature-description">
                                    Built-in safety features and verification systems to ensure secure buying, selling, and swapping.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technology Stack Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                            <i class="fas fa-code text-white text-sm"></i>
                        </div>
                        <h2 class="card-title">Technology Stack</h2>
                    </div>
                    <div class="card-body">
                        <div class="tech-grid">
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fab fa-react text-blue-500"></i>
                                </div>
                                <div class="tech-name">React</div>
                            </div>
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fab fa-node-js text-green-500"></i>
                                </div>
                                <div class="tech-name">Node.js</div>
                            </div>
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fas fa-database text-amber-500"></i>
                                </div>
                                <div class="tech-name">MongoDB</div>
                            </div>
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fab fa-socketio text-gray-700"></i>
                                </div>
                                <div class="tech-name">Socket.io</div>
                            </div>
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fab fa-aws text-orange-500"></i>
                                </div>
                                <div class="tech-name">AWS</div>
                            </div>
                            <div class="tech-item">
                                <div class="tech-icon">
                                    <i class="fab fa-docker text-blue-400"></i>
                                </div>
                                <div class="tech-name">Docker</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Gallery Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon accent">
                            <i class="fas fa-images text-white text-sm"></i>
                        </div>
                        <h2 class="card-title">Project Gallery</h2>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                            <div style="aspect-ratio: 4/3; background: #e5e7eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                                <i class="fas fa-image text-3xl"></i>
                            </div>
                            <div style="aspect-ratio: 4/3; background: #e5e7eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                                <i class="fas fa-image text-3xl"></i>
                            </div>
                            <div style="aspect-ratio: 4/3; background: #e5e7eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                                <i class="fas fa-image text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Overview -->
            <div class="overview-section">
                <h2 class="overview-title">
                    <i class="fas fa-book-open text-blue-500"></i>
                    Overview
                </h2>
                <div class="overview-content">
                    <p>RevoMart is a comprehensive platform for buying, selling, and swapping second-hand goods with integrated real-time chat functionality.</p>
                    
                    <p>The system was designed to create a seamless experience for users looking to trade items in their local communities or beyond. With a focus on user experience and security, RevoMart makes it easy to connect buyers and sellers while ensuring safe transactions.</p>
                    
                    <p>Key aspects of the platform include:</p>
                    
                    <ul style="padding-left: 1.5rem; margin-bottom: 1rem;">
                        <li>User-friendly interface for listing items</li>
                        <li>Advanced search and filtering options</li>
                        <li>Secure messaging system with real-time capabilities</li>
                        <li>Rating and review system for trust building</li>
                        <li>Mobile-responsive design for on-the-go access</li>
                    </ul>
                    
                    <p>The platform supports various transaction types including direct purchases, auctions, and item swaps, providing flexibility for different user needs and preferences.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 RevoMart. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script>
        // Back to top button functionality
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>