@extends('layouts.app')

@section('title', 'Keahlian')

@section('content')
    <div class="pt-24">
        <!-- Skills Header -->
        <section class="py-20 bg-gradient-to-br from-primary to-blue-600">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <span class="inline-block px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium mb-4 backdrop-blur-md">
                        Kemampuan Saya
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">Keahlian & Teknologi</h1>
                    <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                        Berbagai teknologi, bahasa pemrograman, dan tools yang saya kuasai untuk menciptakan solusi digital yang berkualitas tinggi dan inovatif.
                    </p>
                </div>
            </div>
        </section>

        <!-- Skills Overview -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <div class="text-center" data-aos="fade-up">
                        <div class="w-20 h-20 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-code text-primary text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark dark:text-white mb-2">{{ $frontendSkills->count() }}+</h3>
                        <p class="text-gray-600 dark:text-gray-300">Frontend Technologies</p>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-20 h-20 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-server text-primary text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark dark:text-white mb-2">{{ collect($frontendSkills)->merge(collect($designSkills ?? []))->filter(function($skill) { return $skill->category === 'backend'; })->count() }}+</h3>
                        <p class="text-gray-600 dark:text-gray-300">Backend Technologies</p>
                    </div>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-20 h-20 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-paint-brush text-primary text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark dark:text-white mb-2">{{ $designSkills->count() }}+</h3>
                        <p class="text-gray-600 dark:text-gray-300">Design Tools</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Frontend Skills -->
        @if($frontendSkills->count() > 0)
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-code text-primary text-2xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Frontend Development</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Menciptakan antarmuka pengguna yang interaktif, responsif, dan user-friendly dengan teknologi modern.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    @foreach($frontendSkills as $index => $skill)
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    @if($skill->icon)
                                        <i class="{{ $skill->icon }} text-primary text-2xl"></i>
                                    @else
                                        <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-code text-primary"></i>
                                        </div>
                                    @endif
                                    <h3 class="text-lg font-semibold text-dark dark:text-white">{{ $skill->name }}</h3>
                                </div>
                                <span class="text-primary font-bold text-lg">{{ $skill->percentage }}%</span>
                            </div>
                            
                            <div class="mb-4">
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-primary to-blue-500 h-full rounded-full transition-all duration-1000 ease-out relative skill-bar" data-percentage="{{ $skill->percentage }}">
                                        <div class="absolute inset-0 bg-white opacity-20 animate-pulse"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 text-sm">
                                @switch($skill->name)
                                    @case('HTML/CSS')
                                        Semantic HTML5 & advanced CSS3 dengan Flexbox, Grid, dan responsive design.
                                        @break
                                    @case('JavaScript')
                                        ES6+, DOM manipulation, async/await, dan modern JavaScript frameworks.
                                        @break
                                    @case('Vue.js')
                                        Composition API, Vuex state management, dan Vue ecosystem.
                                        @break
                                    @case('React')
                                        Hooks, Context API, Redux, dan React ecosystem tools.
                                        @break
                                    @case('TailwindCSS')
                                        Utility-first CSS framework untuk rapid UI development.
                                        @break
                                    @default
                                        Teknologi frontend modern untuk pengembangan web yang efisien.
                                @endswitch
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Backend Skills -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-server text-primary text-2xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Backend Development</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Membangun server, database, dan logika aplikasi yang kuat, scalable, dan secure.
                    </p>
                </div>
                
                <!-- Backend Technologies Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    @php
                        $backendTechs = [
                            ['name' => 'PHP/Laravel', 'percentage' => 90, 'icon' => 'fab fa-laravel', 'description' => 'Framework PHP untuk rapid development dengan Eloquent ORM, Artisan CLI, dan ecosystem yang lengkap.'],
                            ['name' => 'MySQL/PostgreSQL', 'percentage' => 85, 'icon' => 'fas fa-database', 'description' => 'Relational database management dengan query optimization dan database design.'],
                            ['name' => 'RESTful API', 'percentage' => 88, 'icon' => 'fas fa-exchange-alt', 'description' => 'Design dan development API dengan JSON response, authentication, dan documentation.'],
                            ['name' => 'Node.js', 'percentage' => 75, 'icon' => 'fab fa-node-js', 'description' => 'JavaScript runtime untuk server-side development dengan Express.js dan NPM ecosystem.'],
                            ['name' => 'Git/GitHub', 'percentage' => 85, 'icon' => 'fab fa-git-alt', 'description' => 'Version control system dengan branching strategy dan collaborative development.'],
                            ['name' => 'Docker', 'percentage' => 70, 'icon' => 'fab fa-docker', 'description' => 'Containerization untuk consistent development dan deployment environments.']
                        ];
                    @endphp
                    
                    @foreach($backendTechs as $index => $tech)
                        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-primary bg-opacity-10 group-hover:bg-primary group-hover:bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 transition-all duration-300">
                                    <i class="{{ $tech['icon'] }} text-primary text-2xl group-hover:scale-110 transition-transform duration-300"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-dark dark:text-white mb-2">{{ $tech['name'] }}</h3>
                                <div class="text-primary font-bold text-xl mb-4">{{ $tech['percentage'] }}%</div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-primary to-blue-500 h-2 rounded-full transition-all duration-1000 ease-out backend-skill-bar" data-percentage="{{ $tech['percentage'] }}"></div>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">{{ $tech['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Design Skills -->
        @if($designSkills->count() > 0)
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-paint-brush text-primary text-2xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">UI/UX Design</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Merancang pengalaman pengguna yang intuitif, menarik, dan conversion-focused dengan tools modern.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    @foreach($designSkills as $index => $skill)
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    @if($skill->icon)
                                        <i class="{{ $skill->icon }} text-primary text-3xl"></i>
                                    @else
                                        <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-paint-brush text-primary text-xl"></i>
                                        </div>
                                    @endif
                                    <h3 class="text-xl font-semibold text-dark dark:text-white">{{ $skill->name }}</h3>
                                </div>
                                <span class="text-primary font-bold text-2xl">{{ $skill->percentage }}%</span>
                            </div>
                            
                            <div class="mb-6">
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4 overflow-hidden">
                                    <div class="bg-gradient-to-r from-primary to-blue-500 h-full rounded-full transition-all duration-1000 ease-out design-skill-bar relative" data-percentage="{{ $skill->percentage }}">
                                        <div class="absolute inset-0 bg-white opacity-20 animate-pulse"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                @switch($skill->name)
                                    @case('Figma')
                                        Collaborative design tool untuk wireframing, prototyping, dan design systems.
                                        @break
                                    @case('Adobe XD')
                                        UX/UI design dan prototyping dengan advanced animations dan interactions.
                                        @break
                                    @case('Photoshop')
                                        Photo editing, digital art, dan UI element creation.
                                        @break
                                    @default
                                        Design tool untuk menciptakan visual yang menarik dan user-friendly.
                                @endswitch
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Tools & Technologies -->
        <section class="py-20 bg-white dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-dark dark:text-white mb-6">Tools & Technologies</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Berbagai tools dan teknologi pendukung yang saya gunakan dalam workflow development.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @php
                        $tools = [
                            ['name' => 'VS Code', 'icon' => 'fas fa-code'],
                            ['name' => 'Postman', 'icon' => 'fas fa-paper-plane'],
                            ['name' => 'Webpack', 'icon' => 'fas fa-box'],
                            ['name' => 'NPM', 'icon' => 'fab fa-npm'],
                            ['name' => 'Composer', 'icon' => 'fas fa-music'],
                            ['name' => 'Sass/SCSS', 'icon' => 'fab fa-sass'],
                            ['name' => 'Linux', 'icon' => 'fab fa-linux'],
                            ['name' => 'AWS', 'icon' => 'fab fa-aws'],
                            ['name' => 'Firebase', 'icon' => 'fas fa-fire'],
                            ['name' => 'Jira', 'icon' => 'fab fa-jira'],
                            ['name' => 'Slack', 'icon' => 'fab fa-slack'],
                            ['name' => 'Trello', 'icon' => 'fab fa-trello']
                        ];
                    @endphp
                    
                    @foreach($tools as $index => $tool)
                        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl text-center hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 group" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                            <div class="w-12 h-12 mx-auto mb-3 flex items-center justify-center">
                                <i class="{{ $tool['icon'] }} text-2xl text-primary group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h3 class="font-medium text-dark dark:text-white group-hover:text-white text-sm">{{ $tool['name'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Learning & Certifications -->
        <section class="py-20 bg-primary">
            <div class="container mx-auto px-6">
                <div class="text-center text-white" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Continuous Learning</h2>
                    <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto">
                        Saya berkomitmen untuk terus belajar dan mengikuti perkembangan teknologi terbaru.
                    </p>
                    
                    <div class="grid md:grid-cols-3 gap-8 mb-12">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-graduation-cap text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Self-Taught</h3>
                            <p class="text-blue-100">Learning from online resources and documentation</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-certificate text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Certifications</h3>
                            <p class="text-blue-100">Industry-recognized certifications and courses</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-project-diagram text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Practice</h3>
                            <p class="text-blue-100">Hands-on experience through real projects</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('projects') }}" class="bg-white text-primary px-8 py-4 rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Portfolio
                        </a>
                        <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-primary transition-all duration-300 transform hover:scale-105 font-medium inline-flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i>
                            Diskusi Proyek
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        // Animate skill bars on scroll
        function animateSkillBars() {
            const skillBars = document.querySelectorAll('.skill-bar, .backend-skill-bar, .design-skill-bar');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const percentage = bar.dataset.percentage;
                        bar.style.width = percentage + '%';
                    }
                });
            }, { threshold: 0.5 });
            
            skillBars.forEach(bar => {
                bar.style.width = '0%';
                observer.observe(bar);
            });
        }
        
        // Initialize animations when page loads
        document.addEventListener('DOMContentLoaded', animateSkillBars);
    </script>
    @endpush
@endsection
