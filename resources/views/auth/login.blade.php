<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSTEM LOGIN // PORTFOLIO CMS</title>
    @vite('resources/css/app.css')
    
    <!-- Include identical fonts as landing page -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .bg-grid-dark {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-[#080808] text-white min-h-screen flex flex-col items-center justify-center relative overflow-hidden selection:bg-white selection:text-black">
    
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-grid-dark z-0"></div>
    <div class="absolute inset-0 bg-[#080808]/90 z-0"></div> 
    
    <div class="relative z-10 w-full max-w-md px-6">
        
        <!-- Header -->
        <div class="mb-10 text-center">
            <div class="w-3 h-3 bg-white mx-auto mb-6"></div>
            <h1 class="text-3xl font-bold tracking-widest uppercase mb-2">ACCESS TERMINAL</h1>
            <div class="font-mono text-xs text-zinc-500 tracking-widest uppercase">CMS CONTROL PANEL // SECURE LOGIN</div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 font-mono text-xs p-4 mb-6 rounded-sm">
                @foreach ($errors->all() as $error)
                    <div>> ERROR: {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="bg-[#121212] border border-[#222] p-8 shadow-2xl relative group">
            <!-- Decorative borders -->
            <div class="absolute -top-[1px] -left-[1px] w-4 h-4 border-t-2 border-l-2 border-zinc-500"></div>
            <div class="absolute -top-[1px] -right-[1px] w-4 h-4 border-t-2 border-r-2 border-zinc-500"></div>
            <div class="absolute -bottom-[1px] -left-[1px] w-4 h-4 border-b-2 border-l-2 border-zinc-500"></div>
            <div class="absolute -bottom-[1px] -right-[1px] w-4 h-4 border-b-2 border-r-2 border-zinc-500"></div>

            @csrf

            <div class="mb-6">
                <label for="email" class="block font-mono text-[10px] text-zinc-400 tracking-widest uppercase mb-2">CREDENTIAL_ID (EMAIL)</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-[#0a0a0a] border border-[#333] text-white px-4 py-3 font-mono text-sm focus:outline-none focus:border-white focus:bg-[#1a1a1a] transition-colors"
                       placeholder="admin@portofolio.com">
            </div>

            <div class="mb-8">
                <label for="password" class="block font-mono text-[10px] text-zinc-400 tracking-widest uppercase mb-2">ACCESS_KEY (PASSWORD)</label>
                <input id="password" type="password" name="password" required
                       class="w-full bg-[#0a0a0a] border border-[#333] text-white px-4 py-3 font-mono text-sm focus:outline-none focus:border-white focus:bg-[#1a1a1a] transition-colors"
                       placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-white text-black font-bold uppercase tracking-widest text-sm py-4 hover:bg-zinc-200 transition-colors flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                INITIATE LOGIN
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <a href="/" class="font-mono text-[10px] text-zinc-500 hover:text-white tracking-widest uppercase transition-colors">
                &larr; RETURN TO PORTFOLIO
            </a>
        </div>
    </div>
</body>
</html>
