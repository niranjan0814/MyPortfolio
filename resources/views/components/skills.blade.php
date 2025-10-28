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
        </div>
        
        <div class="max-w-6xl mx-auto">
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
                <!-- Dynamic Skills Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    @foreach($skills as $skill)
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                            <div class="relative flex flex-col items-center justify-center p-8 bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <!-- Skill Icon - Try to match with devicon if name matches common tech -->
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
                                        'bootstrap' => 'bootstrap/bootstrap-original.svg',
                                        'express' => 'express/express-original.svg',
                                        'express.js' => 'express/express-original.svg',
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
                                    <img src="{{ $iconUrl }}" alt="{{ $skill->name }}" class="w-16 h-16 mb-3 group-hover:scale-110 transition-transform duration-300" />
                                @else
                                    <!-- Default icon if no match -->
                                    <div class="w-16 h-16 mb-3 flex items-center justify-center bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-code text-3xl text-white"></i>
                                    </div>
                                @endif
                                
                                <span class="font-semibold text-gray-700 text-center">{{ $skill->name }}</span>
                                
                                @if($skill->level)
                                    <span class="text-xs text-gray-500 mt-1">{{ $skill->level }}</span>
                                @endif
                            </div>
                        </div>
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