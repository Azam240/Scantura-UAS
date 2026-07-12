<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ScanTura - Advanced Security Intelligence</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet">
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#0037B0",
                        "secondary": "#0058be",
                        "surface": "#f8f9ff",
                        "background": "#f8f9ff",
                        "on-background": "#0b1c30",
                        "on-surface": "#0b1c30",
                        "on-surface-variant": "#45464d",
                        "outline-variant": "#c6c6cd",
                        "surface-container-low": "#eff4ff",
                        "surface-container-highest": "#d3e4fe",
                        "error": "#ba1a1a",
                        "success": "#009668"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1.5rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "margin": "32px",
                        "3xl": "64px"
                    },
                    "fontFamily": {
                        "label-md": ["JetBrains Mono"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-md": ["Inter"]
                    }
                }
            }
        }
    </script>
    <style>
        .glass-pill {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 55, 176, 0.1);
            transition: all 0.3s ease;
        }
        .security-aura {
            background: radial-gradient(circle at center, rgba(0, 55, 176, 0.05) 0%, transparent 70%);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<!-- Mengaktifkan State Tab Global di Body -->
<body class="bg-background text-on-background font-body-md text-body-md min-h-screen" x-data="{ activeTab: 'ledger' }">

<header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-outline-variant/30">
    <div class="max-w-[1600px] mx-auto px-margin py-4 flex items-center justify-between gap-xl">
        <div class="flex items-center gap-8">
            <span class="text-2xl font-bold text-primary tracking-tight">ScanTura</span>
            <!-- Navigasi Atas Kini Berfungsi Penuh Mengubah Tab di Bawah -->
            <nav class="hidden lg:flex gap-6">
                <a class="text-sm font-bold font-label-md text-primary hover:text-secondary transition-colors" href="/">BACK</a>
                <a class="text-sm font-label-md transition-colors" :class="activeTab === 'intel' ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary'" href="#" @click.prevent="activeTab = 'intel'; document.getElementById('security-hub').scrollIntoView({behavior: 'smooth'})">INTEL</a>
                <a class="text-sm font-label-md transition-colors" :class="activeTab === 'network' ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary'" href="#" @click.prevent="activeTab = 'network'; document.getElementById('security-hub').scrollIntoView({behavior: 'smooth'})">NETWORK</a>
                <a class="text-sm font-label-md transition-colors" :class="activeTab === 'registry' ? 'text-primary font-bold' : 'text-on-surface-variant hover:text-primary'" href="#" @click.prevent="activeTab = 'registry'; document.getElementById('security-hub').scrollIntoView({behavior: 'smooth'})">REGISTRY</a>
            </nav>
        </div>

        @auth
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none bg-gray-50 px-3 py-1.5 rounded-full border border-gray-200">
                <span class="text-sm font-medium text-gray-700 mr-1">{{ Auth::user()->name }}</span>
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </button>

            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); this.closest('form').submit();" 
                       class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                       🚪 Keluar (Log Out)
                    </a>
                </form>
            </div>
        </div>
        @else
        <div class="flex items-center space-x-3">
            <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded-full font-semibold border border-blue-100">
                🎁 Sisa Scan Gratis: {{ 3 - session('guest_scan_count', 0) }}x
            </span>
            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">
                Masuk
            </a>
        </div>
        @endauth
    </div>
</header>

<main class="max-w-[1600px] mx-auto px-margin pb-24 min-h-screen relative pt-24">
    
    <form action="{{ route('portfolio.store') }}" method="POST" class="max-w-2xl mx-auto mb-12 relative group">
        @csrf
        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
            <span class="material-symbols-outlined text-primary/50 group-focus-within:text-primary">shield</span>
        </div>
        <input name="url" class="w-full bg-white border border-outline-variant/30 rounded-full py-4 pl-12 pr-32 text-sm font-label-md focus:ring-2 focus:ring-primary/20 transition-all shadow-xl" placeholder="Analyze Secure Tunnel (contoh: google.com)..." type="text" value="{{ $targetUrl ?? '' }}" required>
        <button type="submit" class="absolute right-1.5 top-1.5 bottom-1.5 px-8 bg-primary text-white rounded-full text-xs font-bold uppercase tracking-wider hover:bg-secondary transition-all shadow-lg active:scale-95">
            RE-SCAN
        </button>
    </form>

    @if(session('error'))
        <div class="max-w-2xl mx-auto mb-8 p-4 bg-error/10 border border-error/20 text-error text-xs rounded-xl font-bold uppercase tracking-wider text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] security-aura pointer-events-none"></div>

    <div class="grid grid-cols-12 gap-8 items-center relative z-10">
        
        <div class="col-span-12 lg:col-span-3 space-y-6">
            <div class="glass-pill p-6 rounded-2xl shadow-md flex flex-col gap-2 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex justify-between items-start">
                    <span class="material-symbols-outlined text-success p-2 bg-success/10 rounded-lg">verified_user</span>
                    <span class="text-4xl font-display-lg font-bold text-success">{{ $scores['ssl'] ?? 0 }}</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-widest">SSL Certificate</h3>
                    <p class="text-xs text-on-surface-variant mt-1">Full encryption tunnel established and active.</p>
                </div>
            </div>
            
            <div class="glass-pill p-6 rounded-2xl shadow-md flex flex-col gap-2 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex justify-between items-start">
                    <span class="material-symbols-outlined text-success p-2 bg-success/10 rounded-lg">lock_reset</span>
                    <span class="text-4xl font-display-lg font-bold text-success">{{ $scores['malware'] ?? 0 }}</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-widest">Malware Scan</h3>
                    <p class="text-xs text-on-surface-variant mt-1">Heuristic analysis clear on 42 databases.</p>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-6 flex flex-col items-center justify-center relative">
            <div class="relative w-80 h-80 flex items-center justify-center">
                <div class="absolute inset-0 bg-primary/5 rounded-full animate-pulse"></div>
                
                <div class="relative z-20 w-64 h-64 bg-white rounded-full shadow-2xl flex flex-col items-center justify-center border-8 border-surface-container-low">
                    <span class="text-[10px] font-bold text-primary/50 tracking-[0.3em] uppercase mb-1">Domain Health</span>
                    <div class="flex items-baseline">
                        <span class="text-7xl font-display-lg font-bold text-primary tracking-tighter">{{ $scores['trust_score'] ?? 0 }}</span>
                        <span class="text-xl font-bold text-primary/30 ml-1">/100</span>
                    </div>
                    <div class="mt-4 px-4 py-1 bg-primary text-white rounded-full text-[10px] font-bold tracking-tighter">
                        {{ ($scores['trust_score'] ?? 0) > 60 ? 'STABLE SYSTEM' : 'PERLU PERHATIAN' }}
                    </div>
                </div>

                @if(isset($recommendations) && count($recommendations) > 0)
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-white border border-error/20 px-4 py-1.5 rounded-full flex items-center gap-2 shadow-md">
                        <span class="w-2 h-2 bg-error rounded-full animate-ping"></span>
                        <span class="text-[10px] font-bold text-on-surface tracking-tighter">{{ count($recommendations) }} SEVERITY ALERTS DETECTED</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-span-12 lg:col-span-3 space-y-6">
            <div class="glass-pill p-6 rounded-2xl shadow-md flex flex-col gap-2 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex justify-between items-start">
                    <span class="material-symbols-outlined text-secondary p-2 bg-secondary/10 rounded-lg">speed</span>
                    <span class="text-4xl font-display-lg font-bold text-secondary">{{ $scores['speed'] ?? 0 }}</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-widest">Page Speed</h3>
                    <p class="text-xs text-on-surface-variant mt-1">Analysis response at {{ $facts['duration'] ?? '0' }}s.</p>
                </div>
            </div>
            
            <div class="glass-pill p-6 rounded-2xl shadow-md flex flex-col gap-2 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex justify-between items-start">
                    <span class="material-symbols-outlined text-secondary p-2 bg-secondary/10 rounded-lg">policy</span>
                    <span class="text-4xl font-display-lg font-bold text-secondary">{{ $scores['mobile'] ?? 0 }}</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-widest">Compliance</h3>
                    <p class="text-xs text-on-surface-variant mt-1">Mobile core and structure validation parameters.</p>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-24 grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
        <div class="col-span-12 lg:col-span-8">
            <h2 class="text-xs font-bold text-primary/50 tracking-[0.4em] uppercase mb-6">System Optimization Path</h2>
            <div class="space-y-4">
                
                @if(isset($recommendations) && count($recommendations) > 0)
                    @foreach($recommendations as $rec)
                        <div class="group flex items-center gap-6 p-6 rounded-3xl bg-white border border-outline-variant/30 {{ $rec['type'] === 'danger' ? 'hover:border-error/30' : 'hover:border-amber-500/30' }} transition-all shadow-sm hover:shadow-md">
                            <div class="w-12 h-12 rounded-2xl {{ $rec['type'] === 'danger' ? 'bg-error/10 text-error' : 'bg-amber-500/10 text-amber-500' }} flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">{{ $rec['type'] === 'danger' ? 'warning' : 'gpp_maybe' }}</span>
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-sm font-bold text-on-surface {{ $rec['type'] === 'danger' ? 'group-hover:text-error' : 'group-hover:text-amber-500' }} transition-colors">
                                    {{ $rec['title'] }}
                                </h4>
                                <p class="text-xs text-on-surface-variant mt-0.5">{{ $rec['description'] }}</p>
                            </div>
                            <button class="px-4 py-2 text-[10px] font-bold border border-outline-variant rounded-full hover:bg-surface transition-colors shrink-0">FIX NOW</button>
                        </div>
                    @endforeach
                @else
                    <div class="p-12 text-center bg-white border border-dashed rounded-3xl border-outline-variant/50">
                        <span class="material-symbols-outlined text-primary/30 text-4xl mb-2">analytics</span>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Belum ada tugas audit. Masukkan URL diatas untuk memulai analisis.</p>
                    </div>
                @endif

            </div>
        </div>

        <!-- AREA PANEL HUB SINKRON DENGAN HEADER -->
        <div id="security-hub" class="col-span-12 lg:col-span-4 bg-slate-900 text-white rounded-3xl p-6 border border-slate-800 shadow-xl">
            
            <!-- Menu Pilihan Navigasi Tab Internal -->
            <div class="flex border-b border-slate-800 pb-3 mb-6 overflow-x-auto gap-4 text-[10px] font-bold tracking-widest uppercase whitespace-nowrap">
                <button @click="activeTab = 'ledger'" :class="activeTab === 'ledger' ? 'text-blue-400 border-b-2 border-blue-400 pb-1' : 'text-slate-400 hover:text-white pb-1'">LEDGER</button>
                <button @click="activeTab = 'intel'" :class="activeTab === 'intel' ? 'text-blue-400 border-b-2 border-blue-400 pb-1' : 'text-slate-400 hover:text-white pb-1'">INTEL</button>
                <button @click="activeTab = 'network'" :class="activeTab === 'network' ? 'text-blue-400 border-b-2 border-blue-400 pb-1' : 'text-slate-400 hover:text-white pb-1'">NETWORK</button>
                <button @click="activeTab = 'registry'" :class="activeTab === 'registry' ? 'text-blue-400 border-b-2 border-blue-400 pb-1' : 'text-slate-400 hover:text-white pb-1'">REGISTRY</button>
            </div>

            <!-- PANEL 1: TECHNICAL LEDGER -->
            <div x-show="activeTab === 'ledger'" class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">SCANNER ENGINE</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ $facts['location'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">IP ADDRESS</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ $facts['ip'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">SSL STATUS</span>
                    <span class="text-xs font-label-md font-bold text-emerald-400 text-right">{{ $facts['ssl_expiry'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">RESPONSE TIME</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ isset($facts['response_time']) && $facts['response_time'] > 0 ? $facts['response_time'] . 'ms' : '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">CORE ENGINE</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ $facts['tech_stack'] ?? '-' }}</span>
                </div>
            </div>

            <!-- PANEL 2: THREAT INTEL & OSINT -->
            <div x-show="activeTab === 'intel'" x-cloak class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">EMAIL SPOOF PROTECTION</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($intelData['spoof_protection']) && str_contains($intelData['spoof_protection'], 'Secure') ? 'text-emerald-400' : 'text-amber-400' }}">
                        {{ !empty($intelData) ? ($intelData['spoof_protection'] ?? '-') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">THREAT LEVEL</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($intelData['threat_level']) && str_contains($intelData['threat_level'], 'HIGH') ? 'text-rose-400' : 'text-emerald-400' }}">
                        {{ !empty($intelData) ? ($intelData['threat_level'] ?? '-') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">DNSSEC COMPLIANCE</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ !empty($intelData) ? ($intelData['dnssec_status'] ?? '-') : '-' }}</span>
                </div>
            </div>

            <!-- PANEL 3: HTTP NETWORK -->
            <div x-show="activeTab === 'network'" x-cloak class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">SERVER HOST IP</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right">{{ !empty($networkData) ? ($networkData['ip_address'] ?? '-') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">WEB SERVER ENGINE</span>
                    <span class="text-xs font-label-md font-bold text-slate-300 text-right max-w-[180px] truncate">{{ !empty($networkData) ? ($networkData['server_engine'] ?? '-') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">CLICKJACKING PROTECTION</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($networkData['clickjacking']) && str_contains($networkData['clickjacking'], 'Protected') ? 'text-emerald-400' : 'text-rose-400' }}">
                        {{ isset($networkData['clickjacking']) ? (str_contains($networkData['clickjacking'], 'Protected') ? 'PROTECTED' : 'VULNERABLE') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">MIME SNIFF DEFENSE</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($networkData['mime_sniffing']) && str_contains($networkData['mime_sniffing'], 'Protected') ? 'text-emerald-400' : 'text-rose-400' }}">
                        {{ isset($networkData['mime_sniffing']) ? (str_contains($networkData['mime_sniffing'], 'Protected') ? 'PROTECTED' : 'VULNERABLE') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">HSTS SECURITY MODE</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($networkData['hsts_status']) && str_contains($networkData['hsts_status'], 'Enforced') ? 'text-emerald-400' : 'text-amber-400' }}">
                        {{ isset($networkData['hsts_status']) ? (str_contains($networkData['hsts_status'], 'Enforced') ? 'ENFORCED' : 'PLAIN SSL') : '-' }}
                    </span>
                </div>
            </div>

            <!-- PANEL 4: DOMAIN REGISTRY -->
            <div x-show="activeTab === 'registry'" x-cloak class="space-y-4">
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">TARGET DOMAIN</span>
                    <span class="text-xs font-label-md font-bold text-blue-400 text-right max-w-[180px] truncate">{{ !empty($registryData) ? ($registryData['domain_name'] ?? '-') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">DOMAIN TLD EXTENSION</span>
                    <span class="text-xs font-label-md font-bold text-slate-300 text-right">{{ !empty($registryData) ? ($registryData['domain_tld'] ?? '-') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-slate-800 pb-3">
                    <span class="text-xs font-label-md text-slate-400">ROUTING STATUS</span>
                    <span class="text-xs font-label-md font-bold text-right {{ isset($registryData['registry_status']) && str_contains($registryData['registry_status'], 'Verified') ? 'text-emerald-400' : 'text-amber-400' }}">
                        {{ isset($registryData['registry_status']) ? (str_contains($registryData['registry_status'], 'Verified') ? 'VERIFIED' : 'UNVERIFIED') : '-' }}
                    </span>
                </div>
                <div class="flex flex-col border-b border-slate-800 pb-3 gap-1">
                    <span class="text-xs font-label-md text-slate-400">PRIMARY NAMESERVERS</span>
                    <span class="text-[11px] font-label-md font-bold text-blue-400 text-left break-all bg-slate-800/50 p-2 rounded mt-1">
                        {{ !empty($registryData) ? ($registryData['nameservers'] ?? '-') : '-' }}
                    </span>
                </div>
            </div>
            
        </div>
    </section>
</main>

<div class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 w-full max-w-xl px-4">
    <div class="glass-pill px-6 py-3 rounded-full shadow-2xl flex items-center justify-between gap-4 border border-white/50 bg-white/90">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white shadow-sm">
                <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
            </div>
            <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white shadow-sm">
                <span class="material-symbols-outlined text-sm">share</span>
            </div>
        </div>
        <div class="h-4 w-px bg-outline-variant"></div>
        <button class="text-xs font-bold text-primary uppercase tracking-widest hover:text-secondary transition-colors">Export Intelligence</button>
        <a href="/" class="px-5 py-2 bg-primary text-white rounded-full text-xs font-bold uppercase tracking-wider hover:bg-secondary transition-all shadow-md text-center">New Task</a>
    </div>
</div>

<footer class="w-full py-12 px-margin border-t border-outline-variant/30 bg-white mt-12">
    <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="flex flex-col gap-2">
            <span class="text-lg font-bold text-primary">ScanTura™</span>
            <span class="text-[10px] font-label-md text-on-surface-variant uppercase tracking-widest">Precision Trust Analytics Engine</span>
        </div>
        <div class="flex flex-wrap justify-center gap-8 text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">
            <a class="hover:text-primary transition-colors" href="#">Protocols</a>
            <a class="hover:text-primary transition-colors" href="#">Neural Mapping</a>
            <a class="hover:text-primary transition-colors" href="#">Compliance Engine</a>
            <a class="hover:text-primary transition-colors" href="#">API Docs</a>
        </div>
        <div class="text-[10px] font-label-md text-on-surface-variant/60">
            © 2026 SCANTURA CORP. SYSTEM STATUS: OPTIMAL
        </div>
    </div>
</footer>

</body>
</html>