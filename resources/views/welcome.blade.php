<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MUHAMMAD IRFAN AKBAR | Senior Graphic Designer & Full-Stack Web Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        
        /* Grid Backgrounds */
        .bg-grid-dark { background-image: linear-gradient(to right, #1f1f1f 1px, transparent 1px), linear-gradient(to bottom, #1f1f1f 1px, transparent 1px); background-size: 40px 40px; }
        .bg-grid-light { background-image: linear-gradient(to right, #e5e5e5 1px, transparent 1px), linear-gradient(to bottom, #e5e5e5 1px, transparent 1px); background-size: 40px 40px; }
        
        .lang-id { display: none; }
        html[lang="id"] .lang-en { display: none; }
        html[lang="id"] .lang-id { display: inline; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        html.dark ::-webkit-scrollbar-track { background: #0a0a0a; }
        html.dark ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        html.dark ::-webkit-scrollbar-thumb:hover { background: #444; }
        html:not(.dark) ::-webkit-scrollbar-track { background: #f0f0f0; }
        html:not(.dark) ::-webkit-scrollbar-thumb { background: #ccc; border-radius: 4px; }
        html:not(.dark) ::-webkit-scrollbar-thumb:hover { background: #999; }
    </style>
</head>
<body class="min-h-screen relative dark:bg-[#080808] bg-zinc-50 dark:text-white text-zinc-900 transition-colors duration-300">
    <!-- Grid overlay fader -->
    <div class="absolute inset-0 dark:bg-grid-dark bg-grid-light z-0"></div>
    <div class="absolute inset-0 dark:bg-[#080808]/90 bg-zinc-50/90 z-0"></div> 
    
    <div class="relative z-10 w-full max-w-[1800px] px-5 md:px-8 xl:px-12 mx-auto py-8">
        
        <!-- Navbar -->
        <nav class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-12">
            <!-- Left: Brand & Mobile Actions -->
            <div class="flex items-center justify-between w-full lg:w-auto">
                <!-- Brand -->
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 dark:bg-white bg-black hidden sm:block"></div>
                    <span class="font-bold dark:text-white text-black tracking-widest text-[12px] sm:text-sm md:text-base lg:text-lg uppercase">{{ $data['hero_name'] ?? 'MUHAMMAD IRFAN AKBAR' }}</span>
                    <span class="dark:text-zinc-600 text-zinc-400 font-mono text-[10px] tracking-widest ml-2 hidden xl:inline-block">/ ARCH.01 // SYSTEM</span>
                </div>
                
                <!-- Mobile Actions (Theme & Hamburger) -->
                <div class="flex items-center gap-2 lg:hidden">
                    <button onclick="toggleTheme()" class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 dark:text-zinc-400 text-zinc-500 dark:hover:text-white hover:text-black w-8 h-8 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>
                    </button>
                    <button onclick="toggleMobileMenu()" class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 dark:text-zinc-400 text-zinc-500 dark:hover:text-white hover:text-black w-8 h-8 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                </div>
            </div>
            
            <!-- Center: Navigation Links (Desktop) -->
            <div class="hidden lg:flex dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-full px-2 py-1.5 gap-1 text-sm shadow-sm">
                <a href="#about" class="dark:text-white text-black font-medium dark:bg-[#2a2a2a] bg-zinc-100 px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">About</span><span class="lang-id">Tentang</span>
                </a>
                <a href="#skills" class="dark:text-zinc-400 text-zinc-500 hover:text-black dark:hover:text-white dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 transition-colors px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">Skills</span><span class="lang-id">Keahlian</span>
                </a>
                <a href="#experience" class="dark:text-zinc-400 text-zinc-500 hover:text-black dark:hover:text-white dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 transition-colors px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">Experience</span><span class="lang-id">Pengalaman</span>
                </a>
                <a href="#portfolio" class="dark:text-zinc-400 text-zinc-500 hover:text-black dark:hover:text-white dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 transition-colors px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">Portfolio</span><span class="lang-id">Portofolio</span>
                </a>
                <a href="#services" class="dark:text-zinc-400 text-zinc-500 hover:text-black dark:hover:text-white dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 transition-colors px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">Services</span><span class="lang-id">Layanan</span>
                </a>
                <a href="#contact" class="dark:text-zinc-400 text-zinc-500 hover:text-black dark:hover:text-white dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 transition-colors px-4 xl:px-5 py-2 rounded-full whitespace-nowrap">
                    <span class="lang-en">Contact</span><span class="lang-id">Kontak</span>
                </a>
            </div>
            
            <!-- Right: Actions (Desktop) -->
            <div class="hidden lg:flex items-center gap-3">
                <!-- Lang Toggle -->
                <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-full p-1 flex text-xs font-mono cursor-pointer shadow-sm" onclick="toggleLang()">
                    <span id="lang-en-btn" class="dark:bg-white bg-black dark:text-black text-white px-3 py-1.5 rounded-full font-bold transition-colors">EN</span>
                    <span id="lang-id-btn" class="dark:text-zinc-400 text-zinc-500 px-3 py-1.5 rounded-full transition-colors">ID</span>
                </div>
                
                <!-- Theme Toggle -->
                <button onclick="toggleTheme()" id="theme-btn" class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 dark:text-zinc-400 text-zinc-500 dark:hover:text-white hover:text-black w-9 h-9 rounded-full flex items-center justify-center transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>
                </button>
                
                <!-- CMS Button -->
                <a href="/dashboard" class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 dark:hover:bg-[#1a1a1a] hover:bg-zinc-50 dark:text-zinc-300 text-zinc-600 px-4 py-2 rounded-full text-xs font-mono flex items-center gap-2 transition-colors shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-zinc-400"></span> CMS
                </a>
            </div>
        </nav>

        <!-- Status Bar -->
        @php $isAvailable = ($data['hero_availability_status'] ?? '1') == '1'; @endphp
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
            <div class="font-mono text-[10px] text-zinc-500 flex items-center gap-2 tracking-widest uppercase">
                <span class="w-2 h-2 rounded-full {{ $isAvailable ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></span>
                <span class="dark:text-white text-black font-bold">STATUS: {{ $isAvailable ? 'ONLINE' : 'BUSY' }}</span> // {{ $isAvailable ? 'ARCH.VERIFIED' : 'STANDBY MODE' }}
            </div>
            <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase hidden sm:block">
                COORDINATES [33.8844° N, 73.0479° E]
            </div>
        </div>

        <!-- Main Hero Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            
            <!-- Left Column: Content -->
            <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-2xl p-6 md:p-10 relative flex flex-col justify-between overflow-hidden group shadow-sm transition-colors duration-300">
                <!-- Hover Glow -->
                <div class="absolute -top-40 -right-40 w-80 h-80 dark:bg-white/5 bg-black/5 rounded-full blur-[100px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                
                <!-- Top Right Arch Canvas -->
                <span class="absolute top-6 right-8 font-mono text-[10px] text-zinc-400 dark:text-zinc-600 tracking-widest hidden md:block">
                    ARCH.CANVAS / v2.4
                </span>
                
                <!-- Availability Pill -->
                <div>
                    @php $isAvailable = ($data['hero_availability_status'] ?? '1') == '1'; @endphp
                    <div class="inline-flex items-center gap-2 dark:bg-[#1a1a1a] bg-zinc-50 border dark:border-[#333] border-zinc-200 px-3 py-1.5 rounded-full mb-8 font-mono text-[10px] dark:text-zinc-300 text-zinc-600 uppercase tracking-widest transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full {{ $isAvailable ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></span> 
                        <span class="lang-en">{{ $isAvailable ? 'AVAILABLE FOR FREELANCE & FULL-TIME' : 'CURRENTLY UNAVAILABLE FOR HIRE' }}</span>
                        <span class="lang-id">{{ $isAvailable ? 'TERSEDIA UNTUK LEPAS & PENUH WAKTU' : 'SAAT INI TIDAK MENERIMA PROYEK BARU' }}</span>
                    </div>
                    
                    <!-- Title -->
                    @php
                        $name = $data['hero_name'] ?? 'MUHAMMAD IRFAN AKBAR';
                        $nameParts = explode(' ', $name, 2);
                        $formattedName = count($nameParts) > 1 ? $nameParts[0] . '<br>' . $nameParts[1] : $name;
                    @endphp
                    <h1 class="text-[12vw] sm:text-[8vw] md:text-[6vw] lg:text-[4.5rem] xl:text-[5.5rem] font-bold tracking-tight leading-[1.05] dark:text-white text-black mb-6 uppercase break-words hyphens-auto">
                        {!! $formattedName !!}
                    </h1>
                    
                    <!-- Subtitle -->
                    <h2 class="text-lg md:text-2xl font-medium dark:text-zinc-300 text-zinc-700 mb-6 break-words">
                        {{ $data['hero_role'] ?? 'Senior Graphic Designer & Full-Stack Web Developer' }}
                    </h2>
                    
                    <!-- Bio -->
                    <p class="dark:text-zinc-400 text-zinc-500 leading-relaxed max-w-lg mb-10 text-sm md:text-base break-words">
                        <span class="lang-en">{{ $data['hero_bio_en'] ?? 'Crafting impactful digital experiences, thoughtful visual identities, and clean modern web interfaces through ruthless geometric discipline and architectural minimalism.' }}</span>
                        <span class="lang-id">{{ $data['hero_bio_id'] ?? 'Menciptakan pengalaman digital yang berdampak, identitas visual yang cermat, dan antarmuka web modern yang bersih melalui disiplin geometris yang kuat dan minimalisme arsitektural.' }}</span>
                    </p>
                    
                    <!-- Buttons -->
                    <div class="flex flex-wrap items-center gap-4 mb-6 relative z-10">
                        <a href="#portfolio" class="dark:bg-white bg-black dark:text-black text-white hover:opacity-90 font-semibold px-6 py-3.5 rounded-lg flex items-center gap-2 transition-opacity">
                            <span class="lang-en">Explore Projects &darr;</span>
                            <span class="lang-id">Jelajahi Proyek &darr;</span>
                        </a>
                        <a href="#" class="dark:bg-[#1a1a1a] bg-zinc-50 border dark:border-[#333] border-zinc-200 dark:text-white text-black dark:hover:bg-[#222] hover:bg-zinc-100 font-medium px-6 py-3.5 rounded-lg flex items-center gap-2 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                            <span class="lang-en">Download CV</span>
                            <span class="lang-id">Unduh CV</span>
                        </a>
                    </div>
                    
                    <!-- CMS Link text -->
                    <div class="font-mono text-[10px] text-zinc-500 mb-12 flex items-center gap-2 tracking-widest cursor-pointer dark:hover:text-zinc-300 hover:text-zinc-700 transition-colors relative z-10 w-max" onclick="window.location.href='/dashboard'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h18v18H3z"/><path d="M9 3v18"/><path d="M15 3v18"/><path d="M3 9h18"/><path d="M3 15h18"/></svg>
                        OPEN CMS CONTROL PANEL
                    </div>
                </div>
                
                <!-- Stats Grid -->
                <div class="dark:bg-[#0a0a0a] bg-zinc-50/50 rounded-xl p-6 grid grid-cols-3 gap-4 border dark:border-[#1a1a1a] border-zinc-100 mt-auto">
                    @forelse($data['stats'] ?? [] as $stat)
                    <div>
                        <div class="text-3xl md:text-5xl font-bold dark:text-white text-black mb-1 tracking-tight">{{ $stat['value'] }}</div>
                        <div class="font-mono text-[9px] md:text-[10px] text-zinc-500 tracking-wider uppercase">
                            <span class="lang-en">{{ $stat['label_en'] }}</span>
                            <span class="lang-id">{{ $stat['label_id'] ?? $stat['label_en'] }}</span>
                        </div>
                    </div>
                    @empty
                    <!-- Fallback if empty -->
                    <div>
                        <div class="text-3xl md:text-5xl font-bold dark:text-white text-black mb-1 tracking-tight">5+</div>
                        <div class="font-mono text-[9px] md:text-[10px] text-zinc-500 tracking-wider uppercase">YEARS EXPERIENCE</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-5xl font-bold dark:text-white text-black mb-1 tracking-tight">54+</div>
                        <div class="font-mono text-[9px] md:text-[10px] text-zinc-500 tracking-wider uppercase">PROJECTS FINISHED</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-5xl font-bold dark:text-white text-black mb-1 tracking-tight">24+</div>
                        <div class="font-mono text-[9px] md:text-[10px] text-zinc-500 tracking-wider uppercase">HAPPY CLIENTS</div>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Right Column: Image -->
            <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-2xl p-4 flex flex-col group shadow-sm transition-colors duration-300">
                <div class="relative w-full h-[450px] sm:h-[600px] lg:h-full min-h-[450px] sm:min-h-[600px] rounded-xl overflow-hidden dark:bg-[#1a1a1a] bg-zinc-100">
                    
                    <!-- Background Grid inside image -->
                    <div class="absolute inset-0 dark:bg-grid-dark bg-grid-light opacity-30 z-0 mix-blend-overlay"></div>
                    
                    <!-- Top Left Label -->
                    <div class="absolute top-5 left-5 font-mono text-[10px] text-zinc-300 dark:text-zinc-500 z-20 tracking-widest drop-shadow-md">
                        FIG.01 // CREATIVE PORTRAIT
                    </div>
                    
                    <!-- The Portrait Image -->
                    <img src="{{ $data['hero_image'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" alt="Portrait" class="absolute inset-0 w-full h-full object-cover z-10 transition-transform duration-700 group-hover:scale-105" style="filter: grayscale(100%) contrast(120%) brightness(0.8); object-position: center {{ $data['hero_image_align'] ?? '50' }}%;">
                    
                    <!-- Vignette overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent z-10"></div>
                    
                    <!-- Logo Circle -->
                    <div class="absolute bottom-5 right-5 bg-white text-black w-10 h-10 rounded-full flex items-center justify-center font-bold text-[11px] z-20 shadow-xl tracking-tighter">
                        {{ explode(' ', $data['hero_name'] ?? 'M I A')[0][0] ?? 'M' }}{{ explode(' ', $data['hero_name'] ?? 'M I A')[1][0] ?? 'I' }}{{ explode(' ', $data['hero_name'] ?? 'M I A')[2][0] ?? 'A' }}
                    </div>
                </div>
                
                <!-- Below Image Metadata -->
                <div class="flex justify-between items-center mt-4 px-2 font-mono text-[10px] text-zinc-500 uppercase tracking-widest">
                    <div>FOCUS: BRANDING & FULL-STACK APPS</div>
                    <div class="dark:text-white text-black font-medium">Q3/Q4 AVAILABILITY</div>
                </div>
            </div>
            
        </div>
        
        <!-- Skills Matrix Section -->
        <div class="mt-32 mb-20" id="skills">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-6">
                <div>
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">
                        <span class="lang-en">CAPABILITIES & TAXONOMY</span>
                        <span class="lang-id">KAPABILITAS & TAKSONOMI</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-black tracking-tight uppercase">
                        <span class="lang-en">SKILLS MATRIX & PILLARS</span>
                        <span class="lang-id">MATRIKS KEAHLIAN & PILAR</span>
                    </h2>
                </div>
                <div class="max-w-md dark:text-zinc-300 text-zinc-700 text-sm leading-relaxed border-l-2 dark:border-zinc-800 border-zinc-200 pl-4 font-medium">
                    <span class="lang-en">Structured into four operational paradigms combining high-level conceptual design with rigorous frontend implementation.</span>
                    <span class="lang-id">Terstruktur ke dalam empat paradigma operasional yang menggabungkan desain konseptual tingkat tinggi dengan implementasi frontend yang ketat.</span>
                </div>
            </div>
            
            <!-- Skills Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                
                @foreach($data['skills'] ?? [] as $index => $skill)
                <!-- Pillar {{ sprintf('%02d', $index + 1) }} -->
                <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-6 md:p-8 flex flex-col group shadow-sm transition-all duration-300 hover:-translate-y-1 dark:hover:border-[#444] hover:border-zinc-400">
                    <div class="flex justify-between items-start mb-10">
                        <div class="font-mono text-[10px] text-zinc-500 tracking-widest">PIL.{{ sprintf('%02d', $index + 1) }}</div>
                        <div class="dark:text-white text-black opacity-80">
                            {!! $skill['icon'] ?? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>' !!}
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold dark:text-white text-black mb-4">
                        <span class="lang-en">{{ $skill['title_en'] }}</span>
                        <span class="lang-id">{{ $skill['title_id'] ?? $skill['title_en'] }}</span>
                    </h3>
                    @if(!empty($skill['description_en']))
                    <p class="text-sm dark:text-zinc-400 text-zinc-500 leading-relaxed mb-6">
                        <span class="lang-en">{{ $skill['description_en'] }}</span>
                        <span class="lang-id">{{ $skill['description_id'] ?? $skill['description_en'] }}</span>
                    </p>
                    @endif
                    <ul class="space-y-3 mb-12">
                        @foreach(explode(',', $skill['items_en']) as $item)
                        <li class="flex items-start gap-3 text-sm dark:text-zinc-300 text-zinc-700 font-medium lang-en"><div class="w-1.5 h-1.5 dark:bg-zinc-400 bg-zinc-600 mt-1.5 flex-shrink-0"></div>{{ trim($item) }}</li>
                        @endforeach
                        @foreach(explode(',', $skill['items_id'] ?? $skill['items_en']) as $item)
                        <li class="flex items-start gap-3 text-sm dark:text-zinc-300 text-zinc-700 font-medium lang-id"><div class="w-1.5 h-1.5 dark:bg-zinc-400 bg-zinc-600 mt-1.5 flex-shrink-0"></div>{{ trim($item) }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-auto font-mono text-[9px] text-zinc-600 tracking-widest uppercase">SPECS: COGNITIVE / SYNC</div>
                </div>
                @endforeach

            </div>
        </div>
        
        <!-- Core Tooling Suite Section -->
        <div class="mb-24 dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-4 md:p-5 flex flex-col xl:flex-row items-center xl:justify-between gap-6 shadow-sm transition-colors duration-300">
            <div class="flex items-center gap-3 font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase shrink-0 w-full xl:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                CORE TOOLING SUITE //
            </div>
            <div class="flex flex-wrap items-center xl:justify-end gap-3 w-full xl:w-auto">
                @php
                    $coreTools = explode(',', $data['core_tools'] ?? 'Figma Pro, Adobe Creative Cloud (Ps, Ai, Pr), VS Code Engine, CapCut Pro, Git & CLI');
                @endphp
                @foreach($coreTools as $tool)
                <span class="dark:bg-[#1e1e1e] bg-zinc-100 dark:text-zinc-300 text-zinc-700 font-mono text-[10px] px-3.5 py-2 rounded-full flex items-center gap-2 border dark:border-[#2a2a2a] border-zinc-200 transition-colors">
                    <div class="w-1 h-1 dark:bg-white bg-black rounded-full"></div>{{ trim($tool) }}
                </span>
                @endforeach
            </div>
        </div>

        <!-- Featured Portfolio Section -->
        <div class="mb-20" id="portfolio">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-6">
                <div>
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">CURATED WORKS // Q1 2026</div>
                    <h2 class="text-4xl md:text-5xl font-bold dark:text-white text-black tracking-tight uppercase">FEATURED PORTFOLIO</h2>
                </div>
                <div class="flex flex-wrap gap-2 md:gap-4 font-mono text-[10px] tracking-widest font-bold" id="portfolio-filters">
                    @php
                        $projectsCount = count($data['projects'] ?? []);
                        $categories = [];
                        foreach($data['projects'] ?? [] as $p) {
                            $cat = strtoupper($p['category'] ?? 'WEB PLATFORM');
                            if(!isset($categories[$cat])) $categories[$cat] = 0;
                            $categories[$cat]++;
                        }
                    @endphp
                    <button class="filter-btn active dark:bg-white bg-black dark:text-black text-white px-4 py-2 uppercase transition-colors" data-filter="all">ALL [{{ sprintf('%02d', $projectsCount) }}]</button>
                    @foreach($categories as $cat => $count)
                    <button class="filter-btn dark:text-zinc-500 text-zinc-400 dark:hover:text-white hover:text-black px-2 py-2 uppercase transition-colors" data-filter="{{ strtolower($cat) }}">{{ $cat }} [{{ sprintf('%02d', $count) }}]</button>
                    @endforeach
                </div>
            </div>
            
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="portfolio-grid">
                
                @foreach($data['projects'] ?? [] as $index => $project)
                <!-- Project {{ $index + 1 }} -->
                <div class="portfolio-card dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 flex flex-col group shadow-sm transition-all duration-300" data-category="{{ strtolower($project['category'] ?? 'web platform') }}">
                    <div class="relative h-64 md:h-[340px] w-full overflow-hidden dark:bg-[#0a0a0a] bg-zinc-200 border-b dark:border-[#222] border-zinc-200">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title_en'] }}" class="w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700">
                        <div class="absolute top-4 left-4 font-mono text-[10px] text-white tracking-wider z-10 drop-shadow-md">
                            <div class="uppercase">{{ $project['top_label'] ?? 'ID: PRJ-' . sprintf('%02d', $index + 1) . ' // WEB' }}</div>
                        </div>
                    </div>
                    <div class="p-5 md:p-8 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase">{{ $project['category'] ?? 'WEB PLATFORM' }}</div>
                            <div class="font-bold text-sm dark:text-zinc-300 text-zinc-700">{{ $project['year'] ?? '2024' }}</div>
                        </div>
                        <h3 class="text-3xl font-bold dark:text-white text-black mb-4">
                            <span class="lang-en">{{ $project['title_en'] }}</span>
                            <span class="lang-id">{{ $project['title_id'] ?? $project['title_en'] }}</span>
                        </h3>
                        <p class="dark:text-zinc-400 text-zinc-600 text-sm mb-8 leading-relaxed">
                            <span class="lang-en">{{ $project['description_en'] }}</span>
                            <span class="lang-id">{{ $project['description_id'] ?? $project['description_en'] }}</span>
                        </p>
                        <div class="mt-auto flex justify-between items-end">
                            <div class="flex gap-2 flex-wrap max-w-[60%]">
                                @if(!empty($project['tags']))
                                    @foreach(explode(',', $project['tags']) as $tag)
                                    <span class="dark:bg-[#1a1a1a] bg-zinc-100 dark:text-zinc-300 text-zinc-700 font-mono text-[10px] px-3 py-1.5 rounded-full">{{ trim($tag) }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex gap-2">
                                <button type="button" onclick="openPortfolioModal({{ htmlspecialchars(json_encode([
                                    'title_en' => $project['title_en'],
                                    'title_id' => $project['title_id'] ?? $project['title_en'],
                                    'category' => $project['category'] ?? 'WEB PLATFORM',
                                    'year' => $project['year'] ?? '2024',
                                    'image' => $project['image'],
                                    'description_en' => $project['description_en'],
                                    'description_id' => $project['description_id'] ?? $project['description_en'],
                                    'tags' => $project['tags'] ?? '',
                                    'link' => $project['link'] ?? '#'
                                ])) }})" class="dark:bg-white bg-black dark:text-black text-white text-xs font-bold px-4 py-2.5 flex items-center gap-2 dark:hover:bg-zinc-200 hover:bg-zinc-800 transition-colors">
                                    CASE STUDY &rarr;
                                </button>
                                @if(!empty($project['action_icon']))
                                <a href="{{ $project['link'] }}" target="_blank" class="dark:bg-[#1a1a1a] bg-zinc-100 dark:text-zinc-300 text-zinc-700 dark:hover:text-white hover:text-black px-3 py-2.5 flex items-center justify-center transition-colors">
                                    {!! $project['action_icon'] !!}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        
    </div> <!-- End of main max-w container -->

    <!-- Unified Background Wrapper for Experience & Services (Edge-to-Edge) -->
    <div class="w-full py-24 md:py-32 mt-20 mb-10 dark:bg-[#0a0a0a] bg-zinc-100 border-y dark:border-[#222]/60 border-zinc-200/60 shadow-2xl relative z-10">
        <div class="max-w-[1800px] mx-auto px-6 md:px-12 w-full">
            
            <!-- Experience & Credentials Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-32" id="experience">
            
            <!-- Left Column: Professional Experience -->
            <div class="flex flex-col gap-4">
                <div class="mb-6">
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">CHRONOLOGY // TRACK RECORD</div>
                    <h2 class="text-3xl md:text-4xl font-bold dark:text-white text-black tracking-tight uppercase">PROFESSIONAL EXPERIENCE</h2>
                </div>
                
                @foreach($data['experiences'] ?? [] as $experience)
                <!-- Experience Card -->
                <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-5 md:p-8 flex flex-col shadow-sm transition-all duration-300 dark:hover:border-[#444] hover:border-zinc-400 group">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2 gap-2">
                        <h3 class="text-xl font-bold dark:text-white text-black">
                            <span class="lang-en">{{ $experience['role_en'] }}</span>
                            <span class="lang-id">{{ $experience['role_id'] ?? $experience['role_en'] }}</span>
                        </h3>
                        <div class="font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase sm:mt-1.5 dark:bg-[#1a1a1a] bg-zinc-100 px-3 py-1.5 rounded-sm shrink-0 font-bold border dark:border-[#2a2a2a] border-zinc-200">{{ $experience['duration'] }}</div>
                    </div>
                    <div class="font-mono text-xs dark:text-zinc-400 text-zinc-600 mb-5">{{ $experience['company'] }}</div>
                    <p class="dark:text-zinc-400 text-zinc-600 text-sm leading-relaxed">
                        <span class="lang-en">{{ $experience['description_en'] }}</span>
                        <span class="lang-id">{{ $experience['description_id'] ?? $experience['description_en'] }}</span>
                    </p>
                </div>
                @endforeach
            </div>

            <!-- Right Column: Official Accreditation -->
            <div class="flex flex-col gap-4">
                <div class="mb-6">
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">VERIFIED CREDENTIALS</div>
                    <h2 class="text-3xl md:text-4xl font-bold dark:text-white text-black tracking-tight uppercase">OFFICIAL ACCREDITATION</h2>
                </div>
                
                @foreach($data['services'] ?? [] as $service)
                <!-- Accreditation Card -->
                <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-5 md:p-8 flex flex-col shadow-sm transition-all duration-300 dark:hover:border-[#444] hover:border-zinc-400 group">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2 font-mono text-[10px] dark:text-white text-black font-bold tracking-widest uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            {{ $service['tag'] ?? 'CERTIFIED' }}
                        </div>
                        <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase">{{ $service['year'] }}</div>
                    </div>
                    <h3 class="text-2xl font-bold dark:text-white text-black mb-4">
                        <span class="lang-en">{{ $service['title_en'] }}</span>
                        <span class="lang-id">{{ $service['title_id'] ?? $service['title_en'] }}</span>
                    </h3>
                    <p class="dark:text-zinc-400 text-zinc-600 text-sm leading-relaxed mb-10">
                        <span class="lang-en">{{ $service['description_en'] }}</span>
                        <span class="lang-id">{{ $service['description_id'] ?? $service['description_en'] }}</span>
                    </p>
                    <div class="flex justify-between items-center mt-auto font-mono text-[9px] text-zinc-500 tracking-widest uppercase">
                        <div>AUTHORITY: {{ $service['authority'] }}</div>
                        <div class="dark:text-white text-black font-bold">STATUS: {{ $service['status'] }}</div>
                    </div>
                </div>
                @endforeach

                <!-- Credential Repository Link -->
                <div class="flex justify-between items-center px-4 py-2 mt-2 mb-2">
                    <div class="flex items-center gap-2 font-mono text-[10px] dark:text-white text-black font-bold tracking-widest uppercase">
                        <div class="w-1.5 h-1.5 dark:bg-white bg-black rounded-full"></div>
                        CREDENTIAL REPOSITORY
                    </div>
                    <a href="#" class="font-mono text-[10px] dark:text-white text-black font-bold tracking-widest uppercase hover:underline flex items-center gap-1">
                        VIEW REPO &rarr;
                    </a>
                </div>

                <!-- Continuous Evolution Mini Card -->
                <div class="dark:bg-[#1a1a1a] bg-zinc-100 border dark:border-[#2a2a2a] border-zinc-300 rounded-xl p-5 md:p-6 flex items-start gap-5 shadow-sm transition-all duration-300">
                    <div class="dark:text-white text-black mt-1 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="3"></rect><rect x="14" y="7" width="3" height="3"></rect><rect x="7" y="14" width="3" height="3"></rect><rect x="14" y="14" width="3" height="3"></rect></svg>
                    </div>
                    <div>
                        <h4 class="text-base font-bold dark:text-white text-black mb-1.5">{{ $data['evolution_title_en'] ?? 'Continuous Evolution' }}</h4>
                        <p class="dark:text-zinc-400 text-zinc-600 text-sm leading-relaxed">
                            {{ $data['evolution_desc_en'] ?? 'Regularly updating modern stacks across React, Next.js, Headless CMS, and architectural UI design systems.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Services & Contact Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12" id="services">
            
            <!-- Left Column: Services Catalog -->
            <div class="flex flex-col h-full">
                <div class="mb-8">
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">CAPABILITY OFFERINGS</div>
                    <h2 class="text-3xl md:text-4xl font-bold dark:text-white text-black tracking-tight uppercase mb-3">SERVICES CATALOG</h2>
                    <p class="dark:text-zinc-400 text-zinc-600 text-sm leading-relaxed">
                        Delivering high-end execution with Swiss precision and rapid delivery cycles.
                    </p>
                </div>
                
                <div class="flex flex-col space-y-3 mb-8">
                    @foreach($data['catalogs'] ?? [] as $index => $catalog)
                    <!-- Service {{ $index + 1 }} -->
                    <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-5 md:p-6 flex flex-col group cursor-pointer hover:dark:border-[#444] hover:border-zinc-400 transition-colors shadow-sm">
                        <div class="flex justify-between items-start">
                            <div class="flex gap-4 items-start">
                                <div class="font-mono text-[10px] dark:text-zinc-500 text-zinc-400 mt-1.5 shrink-0">{{ sprintf('%02d', $index + 1) }}</div>
                                <div>
                                    <h3 class="text-lg font-bold dark:text-white text-black mb-1">
                                        <span class="lang-en">{{ $catalog['title_en'] }}</span>
                                        <span class="lang-id">{{ $catalog['title_id'] ?? $catalog['title_en'] }}</span>
                                    </h3>
                                    <p class="dark:text-zinc-400 text-zinc-600 text-sm leading-relaxed">
                                        <span class="lang-en">{{ $catalog['description_en'] }}</span>
                                        <span class="lang-id">{{ $catalog['description_id'] ?? $catalog['description_en'] }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="dark:text-zinc-500 text-zinc-400 group-hover:dark:text-white group-hover:text-black transition-colors shrink-0 ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-auto flex justify-between items-center font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase">
                    <div class="flex items-center gap-2"><div class="w-1.5 h-1.5 dark:bg-zinc-500 bg-zinc-400 rounded-full"></div>CMS SYNC: ACTIVE</div>
                    <div>LATENCY: 12MS</div>
                </div>
            </div>

            <!-- Right Column: Collaboration / Contact Form -->
            <div class="flex flex-col h-full" id="contact">
                <div class="dark:bg-[#121212] bg-white border dark:border-[#222] border-zinc-200 rounded-xl p-6 md:p-8 flex flex-col shadow-sm w-full relative">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-2">TRANSMISSION // INQUIRY</div>
                            <h2 class="text-3xl font-bold dark:text-white text-black tracking-tight uppercase">START A COLLABORATION</h2>
                        </div>
                        <div class="dark:text-white text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                    </div>
                    
                    <form class="flex flex-col gap-6" id="contact-form">
                        <div id="contact-status" class="hidden px-4 py-3 rounded-md text-sm font-bold"></div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="flex flex-col gap-2">
                                <label class="font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase">FULL NAME *</label>
                                <input type="text" id="contact-name" placeholder="e.g. John Doe" class="dark:bg-[#0a0a0a] bg-zinc-50 dark:text-white text-black border dark:border-[#222] border-zinc-200 px-4 py-3 rounded-md text-sm focus:outline-none focus:border-zinc-500 transition-colors placeholder:text-zinc-600" required>
                            </div>
                            <!-- Email -->
                            <div class="flex flex-col gap-2">
                                <label class="font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase">EMAIL ADDRESS *</label>
                                <input type="email" id="contact-email" placeholder="e.g. name@domain.com" class="dark:bg-[#0a0a0a] bg-zinc-50 dark:text-white text-black border dark:border-[#222] border-zinc-200 px-4 py-3 rounded-md text-sm focus:outline-none focus:border-zinc-500 transition-colors placeholder:text-zinc-600" required>
                            </div>
                        </div>
                        
                        <!-- Category -->
                        <div class="flex flex-col gap-2">
                            <label class="font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase">PROJECT SCOPE / CATEGORY</label>
                            <select id="contact-category" class="dark:bg-[#0a0a0a] bg-zinc-50 dark:text-white text-black border dark:border-[#222] border-zinc-200 px-4 py-3 rounded-md text-sm focus:outline-none focus:border-zinc-500 transition-colors">
                                <option>Full Web Development (Design & Code)</option>
                                <option>UI/UX Design Only</option>
                                <option>Branding & Identity</option>
                                <option>Other / Custom Consultation</option>
                            </select>
                        </div>
                        
                        <!-- Message -->
                        <div class="flex flex-col gap-2">
                            <label class="font-mono text-[10px] dark:text-zinc-400 text-zinc-500 tracking-widest uppercase">MESSAGE & REQUIREMENTS *</label>
                            <textarea id="contact-message" placeholder="Briefly describe your objectives, timeframe, and deliverables..." rows="4" class="dark:bg-[#0a0a0a] bg-zinc-50 dark:text-white text-black border dark:border-[#222] border-zinc-200 px-4 py-3 rounded-md text-sm focus:outline-none focus:border-zinc-500 transition-colors placeholder:text-zinc-600 resize-y" required></textarea>
                        </div>
                        
                        <!-- Submit Area -->
                        <div class="flex flex-col sm:flex-row justify-between items-center mt-2 gap-4">
                            <div class="font-mono text-[9px] dark:text-zinc-500 text-zinc-400 tracking-widest uppercase text-center sm:text-left">
                                RECORDS PROTECTED UNDER STRICT ENCRYPTION
                            </div>
                            <button type="button" onclick="submitInquiry()" id="btn-submit-inquiry" class="dark:bg-white bg-black dark:text-black text-white font-bold text-sm px-6 py-3 rounded-sm flex items-center gap-2 dark:hover:bg-zinc-200 hover:bg-zinc-800 transition-colors w-full sm:w-auto justify-center">
                                Send Message <span class="text-lg leading-none">&#9655;</span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="mt-auto pt-6 flex flex-col sm:flex-row sm:justify-between items-center gap-2 font-mono text-[9px] dark:text-zinc-500 text-zinc-400 tracking-widest uppercase px-2 text-center">
                    <div>CONTENT MANAGED DYNAMICALLY VIA CONTROL PANEL</div>
                    <div>NODE: ID_JKT_01</div>
                </div>
            </div>
        </div>
        
        </div> <!-- End of inner max-w container -->
    </div> <!-- End of full-width unified wrapper -->
    
    <!-- Re-open main max-w container for Footer -->
    <div class="max-w-[1800px] mx-auto px-6 md:px-12 pb-20 relative z-10 w-full">
        
        <!-- Footer -->
        <div class="mt-20 pt-8 flex flex-col gap-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div>
                    <div class="text-xl font-bold dark:text-white text-black mb-2 flex items-center gap-2">
                        <span class="text-[10px]">■</span> MUHAMMAD IRFAN AKBAR
                    </div>
                    <p class="dark:text-zinc-400 text-zinc-600 text-sm max-w-md leading-relaxed">
                        Senior Graphic Designer & Full-Stack Web Developer. Constructing exact, architectural, and brutalist digital products.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-4 md:gap-6 font-mono text-[10px] tracking-widest uppercase">
                    <div class="dark:text-zinc-400 text-zinc-500">LAT: 33.6844&deg; N</div>
                    <div class="dark:text-zinc-400 text-zinc-500">LON: 73.0479&deg; E</div>
                    <div class="dark:text-white text-black font-bold">AVAILABLE FOR Q3/Q4</div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 font-mono text-[9px] dark:text-zinc-500 text-zinc-400 tracking-widest uppercase">
                <div>&copy; {{ date('Y') }} MUHAMMAD IRFAN AKBAR. ALL RIGHTS RESERVED.</div>
                <div>PRECISION GRID 12-COL V 2.4.0</div>
            </div>
        </div>
        
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobile-sidebar" class="fixed inset-0 z-50 transform translate-x-full transition-transform duration-300 lg:hidden" style="visibility: hidden;">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleMobileMenu()"></div>
        <!-- Sidebar Content -->
        <div class="absolute top-0 right-0 w-64 h-full dark:bg-[#0a0a0a] bg-white border-l dark:border-[#222] border-zinc-200 shadow-2xl flex flex-col p-6">
            <div class="flex justify-between items-center mb-10">
                <div class="font-bold tracking-widest uppercase text-sm dark:text-white text-black">MENU</div>
                <button onclick="toggleMobileMenu()" class="dark:bg-[#1a1a1a] bg-zinc-100 border dark:border-[#333] border-zinc-200 dark:text-white text-black w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="flex flex-col gap-4 text-base font-medium">
                <a href="#about" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors border-b dark:border-[#222] border-zinc-100 pb-3"><span class="lang-en">About</span><span class="lang-id">Tentang</span></a>
                <a href="#skills" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors border-b dark:border-[#222] border-zinc-100 pb-3"><span class="lang-en">Skills</span><span class="lang-id">Keahlian</span></a>
                <a href="#experience" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors border-b dark:border-[#222] border-zinc-100 pb-3"><span class="lang-en">Experience</span><span class="lang-id">Pengalaman</span></a>
                <a href="#portfolio" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors border-b dark:border-[#222] border-zinc-100 pb-3"><span class="lang-en">Portfolio</span><span class="lang-id">Portofolio</span></a>
                <a href="#services" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors border-b dark:border-[#222] border-zinc-100 pb-3"><span class="lang-en">Services</span><span class="lang-id">Layanan</span></a>
                <a href="#contact" onclick="toggleMobileMenu()" class="dark:text-zinc-300 text-zinc-700 hover:text-black dark:hover:text-white transition-colors pb-3"><span class="lang-en">Contact</span><span class="lang-id">Kontak</span></a>
            </div>
            <div class="mt-auto flex flex-col gap-4">
                <!-- Mobile Language Toggle in Sidebar -->
                <div class="dark:bg-[#1a1a1a] bg-zinc-100 border dark:border-[#333] border-zinc-200 rounded-full p-1 flex justify-between text-xs font-mono cursor-pointer" onclick="toggleLang()">
                    <span id="lang-en-sidebar-btn" class="dark:bg-white bg-black dark:text-black text-white px-6 py-2.5 rounded-full font-bold transition-colors w-1/2 text-center">EN</span>
                    <span id="lang-id-sidebar-btn" class="dark:text-zinc-400 text-zinc-500 px-6 py-2.5 rounded-full transition-colors w-1/2 text-center">ID</span>
                </div>
                
                <a href="/dashboard" class="dark:bg-white bg-black dark:text-black text-white px-4 py-3 rounded-full text-center font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-zinc-400"></span> CMS PANEL
                </a>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal -->
    <div id="portfolio-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300 bg-black/80 backdrop-blur-sm p-4 md:p-8">
        <div class="dark:bg-[#121212] bg-white w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-xl border dark:border-[#333] border-zinc-300 flex flex-col relative shadow-2xl transform scale-95 transition-transform duration-300" id="portfolio-modal-content">
            <button onclick="closePortfolioModal()" class="absolute top-4 right-4 z-10 dark:bg-black/50 bg-white/50 backdrop-blur-md p-2 rounded-full dark:text-white text-black hover:bg-zinc-200 dark:hover:bg-zinc-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="w-full h-64 md:h-96 relative border-b dark:border-[#333] border-zinc-200">
                <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
            </div>
            <div class="p-8 md:p-12 flex flex-col md:flex-row gap-12">
                <div class="flex-grow">
                    <div class="font-mono text-[10px] text-zinc-500 tracking-widest uppercase mb-4" id="modal-category">CATEGORY</div>
                    <h2 class="text-3xl md:text-5xl font-bold dark:text-white text-black tracking-tight uppercase mb-6" id="modal-title">PROJECT TITLE</h2>
                    <p class="dark:text-zinc-400 text-zinc-600 text-base md:text-lg leading-relaxed mb-8" id="modal-desc">
                        Project description...
                    </p>
                    <div class="flex gap-2 flex-wrap mb-8" id="modal-tags">
                        <!-- Tags will be populated here -->
                    </div>
                </div>
                <div class="md:w-64 shrink-0 flex flex-col gap-6">
                    <div>
                        <div class="font-mono text-[10px] dark:text-zinc-500 text-zinc-400 tracking-widest uppercase mb-2">YEAR</div>
                        <div class="font-bold dark:text-white text-black" id="modal-year">2024</div>
                    </div>
                    <div>
                        <div class="font-mono text-[10px] dark:text-zinc-500 text-zinc-400 tracking-widest uppercase mb-2">ROLE / EXPERTISE</div>
                        <div class="font-bold dark:text-white text-black">End-to-End Product Design & Engineering</div>
                    </div>
                    <div class="mt-4 pt-6 border-t dark:border-[#333] border-zinc-200">
                        <a href="#" id="modal-link" target="_blank" class="w-full dark:bg-white bg-black dark:text-black text-white font-bold text-sm px-6 py-4 rounded-sm flex items-center justify-between dark:hover:bg-zinc-200 hover:bg-zinc-800 transition-colors">
                            Visit Live Site <span>&#9655;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts for Interaction -->
    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('mobile-sidebar');
            if (sidebar.classList.contains('translate-x-full')) {
                sidebar.style.visibility = 'visible';
                sidebar.classList.remove('translate-x-full');
            } else {
                sidebar.classList.add('translate-x-full');
                setTimeout(() => { sidebar.style.visibility = 'hidden'; }, 300);
            }
        }

        function toggleLang() {
            const html = document.documentElement;
            const currentLang = html.getAttribute('lang');
            const enBtn = document.getElementById('lang-en-btn');
            const idBtn = document.getElementById('lang-id-btn');
            const enSidebarBtn = document.getElementById('lang-en-sidebar-btn');
            const idSidebarBtn = document.getElementById('lang-id-sidebar-btn');
            const isDark = html.classList.contains('dark');
            
            const activeClass = isDark ? "dark:bg-white bg-black dark:text-black text-white px-3 py-1.5 rounded-full font-bold transition-colors" : "bg-black text-white px-3 py-1.5 rounded-full font-bold transition-colors";
            const inactiveClass = isDark ? "dark:text-zinc-400 text-zinc-500 px-3 py-1.5 rounded-full transition-colors" : "text-zinc-500 px-3 py-1.5 rounded-full transition-colors";
            
            const activeSidebarClass = isDark ? "dark:bg-white bg-black dark:text-black text-white px-6 py-2.5 rounded-full font-bold transition-colors w-1/2 text-center" : "bg-black text-white px-6 py-2.5 rounded-full font-bold transition-colors w-1/2 text-center";
            const inactiveSidebarClass = isDark ? "dark:text-zinc-400 text-zinc-500 px-6 py-2.5 rounded-full transition-colors w-1/2 text-center" : "text-zinc-500 px-6 py-2.5 rounded-full transition-colors w-1/2 text-center";
            
            if (currentLang === 'id') {
                html.setAttribute('lang', 'en');
                if (enBtn) enBtn.className = activeClass;
                if (idBtn) idBtn.className = inactiveClass;
                if (enSidebarBtn) enSidebarBtn.className = activeSidebarClass;
                if (idSidebarBtn) idSidebarBtn.className = inactiveSidebarClass;
            } else {
                html.setAttribute('lang', 'id');
                if (idBtn) idBtn.className = activeClass;
                if (enBtn) enBtn.className = inactiveClass;
                if (idSidebarBtn) idSidebarBtn.className = activeSidebarClass;
                if (enSidebarBtn) enSidebarBtn.className = inactiveSidebarClass;
            }
        }
        
        function toggleTheme() {
            const html = document.documentElement;
            const themeBtn = document.getElementById('theme-btn');
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                themeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>'; // Moon icon
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>'; // Sun icon
                localStorage.setItem('theme', 'dark');
            }
            // Trigger lang refresh to update button colors based on theme
            const currentLang = html.getAttribute('lang') || 'en';
            html.setAttribute('lang', currentLang === 'en' ? 'id' : 'en');
            toggleLang();
        }

        // Contact Form Submission
        function submitInquiry() {
            const name = document.getElementById('contact-name').value;
            const email = document.getElementById('contact-email').value;
            const category = document.getElementById('contact-category').value;
            const message = document.getElementById('contact-message').value;
            const statusEl = document.getElementById('contact-status');
            const btn = document.getElementById('btn-submit-inquiry');

            if(!name || !email || !message) {
                statusEl.className = "px-4 py-3 rounded-md text-sm font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 block";
                statusEl.innerText = "Please fill in all required fields.";
                return;
            }

            btn.disabled = true;
            btn.innerHTML = "Sending... <span class='text-lg leading-none'>&#8987;</span>";

            fetch('/inquiry', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ name, email, category, message })
            }).then(r => r.json()).then(res => {
                btn.disabled = false;
                btn.innerHTML = "Send Message <span class='text-lg leading-none'>&#9655;</span>";
                
                if(res.success) {
                    statusEl.className = "px-4 py-3 rounded-md text-sm font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 block";
                    statusEl.innerText = "Message transmitted successfully! I will reach out shortly.";
                    document.getElementById('contact-form').reset();
                } else {
                    statusEl.className = "px-4 py-3 rounded-md text-sm font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 block";
                    statusEl.innerText = "An error occurred. Please try again.";
                }
            }).catch(e => {
                btn.disabled = false;
                btn.innerHTML = "Send Message <span class='text-lg leading-none'>&#9655;</span>";
                statusEl.className = "px-4 py-3 rounded-md text-sm font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 block";
                statusEl.innerText = "Connection error. Please try again.";
            });
        }

        // Portfolio Filtering
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active state on buttons
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.className = "filter-btn dark:text-zinc-500 text-zinc-400 dark:hover:text-white hover:text-black px-2 py-2 uppercase transition-colors";
                });
                this.className = "filter-btn active dark:bg-white bg-black dark:text-black text-white px-4 py-2 uppercase transition-colors";

                const filter = this.getAttribute('data-filter');
                const projects = document.querySelectorAll('.portfolio-card');
                
                projects.forEach(card => {
                    if(filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'flex';
                        setTimeout(() => { card.style.opacity = '1'; }, 10);
                    } else {
                        card.style.opacity = '0';
                        setTimeout(() => { card.style.display = 'none'; }, 300);
                    }
                });
            });
        });

        // Portfolio Modal Logic
        const currentLanguage = () => document.documentElement.getAttribute('lang') || 'en';

        function openPortfolioModal(project) {
            const modal = document.getElementById('portfolio-modal');
            const content = document.getElementById('portfolio-modal-content');
            
            document.getElementById('modal-image').src = project.image;
            document.getElementById('modal-title').innerText = currentLanguage() === 'en' ? project.title_en : project.title_id;
            document.getElementById('modal-desc').innerText = currentLanguage() === 'en' ? project.description_en : project.description_id;
            document.getElementById('modal-category').innerText = project.category;
            document.getElementById('modal-year').innerText = project.year;
            document.getElementById('modal-link').href = project.link;
            if(project.link === '#') {
                document.getElementById('modal-link').style.display = 'none';
            } else {
                document.getElementById('modal-link').style.display = 'flex';
            }

            const tagsContainer = document.getElementById('modal-tags');
            tagsContainer.innerHTML = '';
            if(project.tags) {
                project.tags.split(',').forEach(tag => {
                    const span = document.createElement('span');
                    span.className = 'dark:bg-[#1a1a1a] bg-zinc-100 dark:text-zinc-300 text-zinc-700 font-mono text-[10px] px-3 py-1.5 rounded-full';
                    span.innerText = tag.trim();
                    tagsContainer.appendChild(span);
                });
            }

            modal.classList.remove('hidden');
            // Trigger reflow
            void modal.offsetWidth;
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
            document.body.style.overflow = 'hidden';
        }

        function closePortfolioModal() {
            const modal = document.getElementById('portfolio-modal');
            const content = document.getElementById('portfolio-modal-content');
            
            modal.classList.add('opacity-0');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Close modal on outside click
        document.getElementById('portfolio-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePortfolioModal();
            }
        });

        // Init theme from localStorage
        window.onload = function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
                document.getElementById('theme-btn').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>';
            }
        }
    </script>
</body>
</html>
