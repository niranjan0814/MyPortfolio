@props(['skills'])
<!-- resources/views/components/skills.blade.php -->
<section id="skills" class="section-full bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto fade-in relative z-10 px-4">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Technical Arsenal</h2>
            <p class="text-gray-600 text-lg">Technologies I work with to bring ideas to life</p>
            <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mt-4"></div>
        </div>
        
        <div class="max-w-7xl mx-auto">
            @if($skills->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-4">
                        <i class="fas fa-lightbulb text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Skills Added Yet</h3>
                    <p class="text-gray-500">Skills will appear here once added through the admin panel.</p>
                </div>
            @else
                @php
                    $categories = [
                        'frontend' => [
                            'title' => 'Frontend Development',
                            'icon' => 'fa-laptop-code',
                            'gradient' => 'from-blue-500 to-cyan-500',
                            'bg' => 'from-blue-50 to-cyan-50',
                        ],
                        'backend' => [
                            'title' => 'Backend Development',
                            'icon' => 'fa-server',
                            'gradient' => 'from-green-500 to-emerald-500',
                            'bg' => 'from-green-50 to-emerald-50',
                        ],
                        'database' => [
                            'title' => 'Database & Storage',
                            'icon' => 'fa-database',
                            'gradient' => 'from-orange-500 to-red-500',
                            'bg' => 'from-orange-50 to-red-50',
                        ],
                        'tools' => [
                            'title' => 'Tools & Technologies',
                            'icon' => 'fa-tools',
                            'gradient' => 'from-purple-500 to-pink-500',
                            'bg' => 'from-purple-50 to-pink-50',
                        ],
                    ];
                    
                    $groupedSkills = $skills->groupBy('category');
                @endphp

                <div class="space-y-16">
                    @foreach($categories as $categoryKey => $categoryData)
                        @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                            <div class="group">
                                <!-- Category Header -->
                                <div class="flex items-center gap-4 mb-8">
                                    <div class="w-16 h-16 bg-gradient-to-r {{ $categoryData['gradient'] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas {{ $categoryData['icon'] }} text-3xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold bg-gradient-to-r {{ $categoryData['gradient'] }} bg-clip-text text-transparent">
                                            {{ $categoryData['title'] }}
                                        </h3>
                                        <p class="text-gray-600">{{ $groupedSkills[$categoryKey]->count() }} {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}</p>
                                    </div>
                                </div>

                                <!-- Skills Grid -->
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                                    @foreach($groupedSkills[$categoryKey] as $skill)
                                        <div class="group/skill relative">
                                            <div class="absolute inset-0 bg-gradient-to-r {{ $categoryData['gradient'] }} rounded-2xl blur opacity-25 group-hover/skill:opacity-75 transition duration-300"></div>
                                            <div class="relative flex flex-col items-center justify-center p-8 bg-white rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                                @php
                                                    $skillLower = strtolower($skill->name);
                                                    $iconMap = [
                                                        'react' => 'react/react-original.svg',
                                                        'react native' => 'react/react-original.svg',
                                                        'node' => 'nodejs/nodejs-original.svg',
                                                        'nodejs' => 'nodejs/nodejs-original.svg',
                                                        'node.js' => 'nodejs/nodejs-original.svg',
                                                        'javascript' => 'javascript/javascript-original.svg',
                                                        'js' => 'javascript/javascript-original.svg',
                                                        'html' => 'html5/html5-original.svg',
                                                        'html5' => 'html5/html5-original.svg',
                                                        'css' => 'css3/css3-original.svg',
                                                        'css3' => 'css3/css3-original.svg',
                                                        'php' => 'php/php-original.svg',
                                                        'java' => 'java/java-original.svg',
                                                        'python' => 'python/python-original.svg',
                                                        'mongodb' => 'mongodb/mongodb-original.svg',
                                                        'mysql' => 'mysql/mysql-original.svg',
                                                        'postgresql' => 'postgresql/postgresql-original.svg',
                                                        'git' => 'git/git-original.svg',
                                                        'github' => 'github/github-original.svg',
                                                        'docker' => 'docker/docker-original.svg',
                                                        'laravel' => 'laravel/laravel-original.svg',
                                                        'vue' => 'vuejs/vuejs-original.svg',
                                                        'angular' => 'angularjs/angularjs-original.svg',
                                                        'typescript' => 'typescript/typescript-original.svg',
                                                        'tailwind' => 'tailwindcss/tailwindcss-original.svg',
                                                        'tailwindcss' => 'tailwindcss/tailwindcss-original.svg',
                                                        'bootstrap' => 'bootstrap/bootstrap-original.svg',
                                                        'express' => 'express/express-original.svg',
                                                        'express.js' => 'express/express-original.svg',
                                                        'redux' => 'redux/redux-original.svg',
                                                        'nextjs' => 'nextjs/nextjs-original.svg',
                                                        'next.js' => 'nextjs/nextjs-original.svg',
                                                        'sass' => 'sass/sass-original.svg',
                                                        'scss' => 'sass/sass-original.svg',
                                                        'webpack' => 'webpack/webpack-original.svg',
                                                        'vite' => 'vitejs/vitejs-original.svg',
                                                        'firebase' => 'firebase/firebase-plain.svg',
                                                        'aws' => 'amazonwebservices/amazonwebservices-original.svg',
                                                        'heroku' => 'heroku/heroku-original.svg',
                                                        'vercel' => 'vercel/vercel-original.svg',
                                                        'figma' => 'figma/figma-original.svg',
                                                        'postman' => 'postman/postman-original.svg',
                                                        'vscode' => 'vscode/vscode-original.svg',
                                                        'npm' => 'npm/npm-original-wordmark.svg',
                                                        'yarn' => 'yarn/yarn-original.svg',
                                                        'jest' => 'jest/jest-plain.svg',
                                                        'jquery' => 'jquery/jquery-original.svg',
                                                        'material-ui' => 'materialui/materialui-original.svg',
                                                        'redis' => 'redis/redis-original.svg',
                                                        'graphql' => 'graphql/graphql-plain.svg',
                                                        'wordpress' => 'wordpress/wordpress-original.svg',
                                                        'nginx' => 'nginx/nginx-original.svg',
                                                        'apache' => 'apache/apache-original.svg',
                                                        'linux' => 'linux/linux-original.svg',
                                                        'ubuntu' => 'ubuntu/ubuntu-plain.svg',
                                                        'slack' => 'slack/slack-original.svg',
                                                        'trello' => 'trello/trello-plain.svg',
                                                        'mapbox' => 'mapbox/mapbox-original.svg',
                                                        'scocketio' => 'socketio/socketio-original.svg',
                                                    ];
                                                    
                                                    $iconUrl = null;
                                                    foreach ($iconMap as $key => $path) {
                                                        if (str_contains($skillLower, $key)) {
                                                            $iconUrl = "https://cdn.jsdelivr.net/gh/devicons/devicon/icons/{$path}";
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                
                                                @if($iconUrl)
                                                    <img src="{{ $iconUrl }}" alt="{{ $skill->name }}" class="w-16 h-16 mb-3 group-hover/skill:scale-110 transition-transform duration-300" />
                                                @else
                                                    <!-- Default icon if no match -->
                                                    <div class="w-16 h-16 mb-3 flex items-center justify-center bg-gradient-to-br {{ $categoryData['gradient'] }} rounded-xl group-hover/skill:scale-110 transition-transform duration-300">
                                                        <i class="fas fa-code text-3xl text-white"></i>
                                                    </div>
                                                @endif
                                                
                                                <span class="font-semibold text-gray-700 text-center text-sm">{{ $skill->name }}</span>
                                                
                                                @if($skill->level)
                                                    <span class="text-xs text-gray-500 mt-1">{{ $skill->level }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>