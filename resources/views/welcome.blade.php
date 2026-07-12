<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>ScanTura - Analisis Keamanan & Performa Website Anda</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;family=JetBrains+Mono:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-container": "#002113",
                        "on-surface-variant": "#45464d",
                        "on-secondary-container": "#fefcff",
                        "inverse-surface": "#213145",
                        "secondary-container": "#2170e4",
                        "on-background": "#0b1c30",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-fixed": "#002113",
                        "on-secondary-fixed": "#001a42",
                        "surface-dim": "#cbdbf5",
                        "surface-container-high": "#dce9ff",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed-variant": "#005236",
                        "secondary-fixed-dim": "#adc6ff",
                        "primary-fixed-dim": "#bec6e0",
                        "secondary-fixed": "#d8e2ff",
                        "on-tertiary-container": "#009668",
                        "background": "#f8f9ff",
                        "on-primary-fixed": "#131b2e",
                        "surface-container-highest": "#d3e4fe",
                        "primary-container": "#131b2e",
                        "tertiary-fixed-dim": "#4edea3",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#bec6e0",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-tint": "#565e74",
                        "primary-fixed": "#dae2fd",
                        "tertiary": "#000000",
                        "on-primary-fixed-variant": "#3f465c",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#f8f9ff",
                        "secondary": "#0058be",
                        "surface-variant": "#d3e4fe",
                        "on-surface": "#0b1c30",
                        "error": "#ba1a1a",
                        "surface-container-low": "#eff4ff",
                        "on-primary-container": "#7c839b",
                        "primary": "#000000",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed": "#6ffbbe",
                        "surface": "#f8f9ff",
                        "on-error": "#ffffff",
                        "outline-variant": "#c6c6cd",
                        "on-secondary-fixed-variant": "#004395",
                        "surface-container": "#e5eeff",
                        "outline": "#76777d",
                        "error-container": "#ffdad6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1.5rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "3xl": "64px",
                        "margin": "32px",
                        "lg": "24px",
                        "sm": "8px",
                        "2xl": "48px",
                        "base": "4px",
                        "md": "16px",
                        "xs": "4px",
                        "gutter": "24px",
                        "xl": "32px"
                    },
                    "fontFamily": {
                        "label-md": ["JetBrains Mono"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "label-sm": ["JetBrains Mono"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9ff; }
        
        .deep-glass {
            backdrop-filter: blur(24px);
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.08);
        }
        
        .dark-console {
            background: #0b1c30;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glow-text {
            text-shadow: 0 0 15px rgba(33, 112, 228, 0.4);
        }

        .glow-text-white {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .tracking-wider-tech {
            letter-spacing: 0.15em;
        }

        .hero-shader-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -10;
        }

        #three-canvas-container {
            width: 100%;
            height: 500px;
            position: relative;
        }

        .floating { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="text-on-surface overflow-x-hidden">

<header class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-margin py-sm deep-glass border-b border-white/20">
    <div class="flex items-center gap-xl">
        <a class="text-headline-md font-bold text-secondary tracking-tight" href="{{ url('/') }}">ScanTura</a>
    </div>
    
    <div class="flex items-center gap-md">
        @if (Route::has('login'))
            <div class="flex items-center gap-sm">
                @auth
                    <span class="text-xs text-green-400 font-mono bg-green-500/10 px-2 py-1 rounded border border-green-500/20 mr-2">
                        PRO ACCESS
                    </span>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-400 hover:text-red-300 transition-all">
                            Log Out
                        </button>
                    </form>
                @else
                    <button onclick="openAuthModal('login')" class="text-sm font-medium text-on-surface-variant hover:text-secondary transition-all px-2 py-1 cursor-pointer bg-transparent border-0">
                     Masuk
                    </button>
    
                     <button onclick="openAuthModal('register')" class="text-sm font-medium text-secondary hover:bg-white/10 transition-all bg-white/5 px-3 py-1.5 rounded-md border border-white/20 cursor-pointer">
                     Daftar Akun
                    </button>
                @endauth
            </div>
        @endif
    </div>
</header>

<main class="pt-2xl">
    <section class="relative min-h-[100vh] flex flex-col items-center justify-center text-center overflow-hidden">
        <canvas class="hero-shader-bg" id="hero-shader"></canvas>
        <div class="max-w-4xl px-margin space-y-md relative z-10 py-3xl">
            <span class="inline-block px-md py-xs bg-secondary/20 text-white rounded-full font-label-sm text-label-sm tracking-wider-tech uppercase backdrop-blur-md border border-white/20">Enterprise Security</span>
            <h1 class="font-display-lg text-display-lg text-white tracking-tight glow-text-white">
                Autentikasi Modern untuk <span class="text-secondary bg-clip-text text-transparent bg-gradient-to-r from-secondary to-tertiary-fixed-dim">Website Anda</span>
            </h1>
            <p class="font-body-lg text-body-lg text-white/80 max-w-2xl mx-auto">
                Tingkatkan kepercayaan pengunjung dengan sistem analisis parameter berlapis. Deteksi kelemahan SEO, uji kecepatan respons server, dan pastikan enkripsi SSL website Anda aman dalam satu platform terpadu.
            </p>
            <div class="flex flex-col sm:flex-row gap-md justify-center pt-md items-center">
                <a href="{{ route('portfolio.index') }}" class="bg-secondary text-white font-label-md text-label-md px-xl py-lg rounded-xl shadow-lg shadow-secondary/40 hover:scale-105 active:scale-95 transition-all tracking-wider-tech inline-block text-center min-w-[200px]">
                    Mulai Sekarang
                </a>
                <!-- 🔥 MENAMBAHKAN ONCLICK SMOOTH SCROLL -->
                <button onclick="document.getElementById('features-section').scrollIntoView({ behavior: 'smooth' })" class="deep-glass text-on-surface font-label-md text-label-md px-xl py-lg rounded-xl hover:bg-white/80 transition-all tracking-wider-tech min-w-[200px]">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>
        <div class="z-10 mt-xl" id="three-canvas-container"></div>
    </section>

    <!-- 🔥 MENAMBAHKAN ID target 'features-section' DI SINI -->
    <section id="features-section" class="py-3xl px-margin relative overflow-hidden bg-background">
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center mb-2xl space-y-sm">
                <h2 class="font-headline-lg text-headline-lg text-on-surface glow-text">Kenapa Memilih ScanTura?</h2>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-xl mx-auto">Solusi keamanan yang dirancang untuk mendukung skalabilitas dan kepercayaan tanpa hambatan teknis.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <div class="deep-glass p-xl rounded-2xl flex flex-col gap-md group transition-all hover:-translate-y-2">
                    <div class="w-14 h-14 bg-secondary/10 text-secondary flex items-center justify-center rounded-2xl group-hover:bg-secondary group-hover:text-white transition-all shadow-inner">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">security</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md">Keamanan</h3>
                    <p class="font-body-md text-on-surface-variant leading-relaxed">Proteksi berlapis dengan MFA, biometrik, dan enkripsi end-to-end berstandar industri perbankan.</p>
                    <div class="mt-auto pt-md flex flex-wrap gap-xs">
                        <span class="px-sm py-xs bg-secondary/10 text-secondary text-label-sm font-label-md rounded-lg border border-secondary/20 tracking-wider-tech">MFA</span>
                        <span class="px-sm py-xs bg-secondary/10 text-secondary text-label-sm font-label-md rounded-lg border border-secondary/20 tracking-wider-tech">AES-256</span>
                    </div>
                </div>
                <div class="deep-glass p-xl rounded-2xl flex flex-col gap-md group transition-all hover:-translate-y-2 md:mt-8">
                    <div class="w-14 h-14 bg-secondary/10 text-secondary flex items-center justify-center rounded-2xl group-hover:bg-secondary group-hover:text-white transition-all shadow-inner">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">link</span>
                    </div>
                         <h3 class="font-headline-md text-headline-md">Dashboard Scanner</h3>
                            <p class="font-body-md text-on-surface-variant leading-relaxed">Masuk ke panel instrumen utama untuk memindai performa, optimasi SEO, dan enkripsi keamanan SSL website Anda secara real-time.</p>
                        <div class="mt-auto pt-md">
                            <a class="inline-flex items-center text-secondary font-label-md hover:gap-2 transition-all tracking-wider-tech" href="{{ route('portfolio.index') }}">
                                Buka Dashboard <span class="material-symbols-outlined text-sm ml-xs">arrow_forward</span>
                            </a>
                        </div>
                </div>
                <div class="deep-glass p-xl rounded-2xl flex flex-col gap-md group transition-all hover:-translate-y-2">
                    <div class="w-14 h-14 bg-secondary/10 text-secondary flex items-center justify-center rounded-2xl group-hover:bg-secondary group-hover:text-white transition-all shadow-inner">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">analytics</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md">Analisis Web</h3>
                    <p class="font-body-md text-on-surface-variant leading-relaxed">Instant checkers untuk memantau kerentanan website dan performa SSL secara real-time 24/7.</p>
                    <div class="mt-auto pt-md">
                        <a class="inline-flex items-center text-secondary font-label-md hover:gap-2 transition-all tracking-wider-tech" href="{{ route('portfolio.index') }}">
                            Lihat Demo <span class="material-symbols-outlined text-sm ml-xs">speed</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3xl px-margin relative">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-3xl items-center">
            <div class="space-y-lg order-2 lg:order-1">
                <h2 class="font-headline-lg text-headline-lg glow-text">Kecepatan &amp; Keandalan Tanpa Kompromi</h2>
                <p class="font-body-md text-on-surface-variant">
                    Kami mengoperasikan infrastruktur global yang memastikan layanan Anda tetap aktif meskipun dalam beban traffic yang sangat tinggi.
                </p>
                <div class="space-y-md">
                    <div class="flex items-center gap-md deep-glass p-md rounded-xl border-l-4 border-l-secondary">
                        <span class="material-symbols-outlined text-secondary bg-secondary/10 p-xs rounded-full">public</span>
                        <div>
                            <strong class="block font-label-md text-on-surface tracking-wider-tech">Global Infrastructure</strong>
                            <p class="text-on-surface-variant text-sm">Distribusi server di 12+ region untuk latency minimal.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-md deep-glass p-md rounded-xl border-l-4 border-l-tertiary-fixed-dim">
                        <span class="material-symbols-outlined text-on-tertiary-fixed-variant bg-tertiary-fixed-dim/10 p-xs rounded-full">timer</span>
                        <div>
                            <strong class="block font-label-md text-on-surface tracking-wider-tech">99.99% Uptime SLA</strong>
                            <p class="text-on-surface-variant text-sm">Jaminan ketersediaan layanan tingkat enterprise.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-md deep-glass p-md rounded-xl border-l-4 border-l-secondary">
                        <span class="material-symbols-outlined text-secondary bg-secondary/10 p-xs rounded-full">dynamic_feed</span>
                        <div>
                            <strong class="block font-label-md text-on-surface tracking-wider-tech">Auto-Scaling</strong>
                            <p class="text-on-surface-variant text-sm">Menangani lonjakan pengguna secara instan tanpa downtime.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="order-1 lg:order-2 dark-console rounded-2xl overflow-hidden shadow-2xl relative min-h-[450px] flex flex-col p-lg font-label-md">
                <div class="flex justify-between items-center mb-xl border-b border-white/10 pb-md">
                    <div class="flex items-center gap-sm">
                        <div class="w-2 h-2 bg-tertiary-fixed-dim rounded-full animate-pulse"></div>
                        <span class="text-white/80 text-xs tracking-wider uppercase font-label-sm">SYSTEM_LEDGER.v2</span>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500/50"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500/50"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500/50"></div>
                    </div>
                </div>
                <div class="flex-grow space-y-md overflow-hidden">
                    <div class="flex justify-between text-[10px] text-white/40 mb-xs uppercase font-label-sm tracking-wider-tech">
                        <span>Traffic Analysis</span>
                        <span>Node: SEA-JKT-01</span>
                    </div>
                    <div class="flex items-end gap-1 h-32">
                        <div class="flex-1 bg-secondary/20 h-[30%] rounded-t-sm hover:bg-secondary/60 transition-all"></div>
                        <div class="flex-1 bg-secondary/20 h-[45%] rounded-t-sm hover:bg-secondary/60 transition-all"></div>
                        <div class="flex-1 bg-secondary/20 h-[38%] rounded-t-sm hover:bg-secondary/60 transition-all"></div>
                        <div class="flex-1 bg-secondary/40 h-[65%] rounded-t-sm hover:bg-secondary/80 transition-all"></div>
                        <div class="flex-1 bg-tertiary-fixed-dim h-[90%] rounded-t-sm animate-pulse"></div>
                        <div class="flex-1 bg-secondary/30 h-[55%] rounded-t-sm hover:bg-secondary/70 transition-all"></div>
                        <div class="flex-1 bg-secondary/20 h-[42%] rounded-t-sm hover:bg-secondary/60 transition-all"></div>
                        <div class="flex-1 bg-secondary/20 h-[25%] rounded-t-sm hover:bg-secondary/60 transition-all"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-md mt-lg">
                        <div class="p-md rounded-xl bg-white/5 border border-white/10 hover:border-secondary/50 transition-colors">
                            <span class="text-white/40 text-[10px] block mb-1 tracking-wider-tech">REQ / SECOND</span>
                            <span class="text-secondary text-headline-md font-label-md">1.2M</span>
                        </div>
                        <div class="p-md rounded-xl bg-white/5 border border-white/10 hover:border-tertiary-fixed-dim/50 transition-colors">
                            <span class="text-white/40 text-[10px] block mb-1 tracking-wider-tech">LATENCY</span>
                            <span class="text-tertiary-fixed-dim text-headline-md font-label-md">14ms</span>
                        </div>
                    </div>
                    <div class="mt-md p-md rounded-xl bg-white/5 border border-white/10 font-label-sm text-[11px] space-y-1">
                        <div class="flex justify-between"><span class="text-white/40 tracking-wider-tech">AUTH_STATUS:</span> <span class="text-tertiary-fixed-dim">VERIFIED</span></div>
                        <div class="flex justify-between"><span class="text-white/40 tracking-wider-tech">ENCRYPTION:</span> <span class="text-white/80">RSA_4096_SHA256</span></div>
                        <div class="flex justify-between"><span class="text-white/40 tracking-wider-tech">UPTIME_SLA:</span> <span class="text-white/80">99.9982%</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3xl px-margin">
        <div class="max-w-6xl mx-auto bg-on-background rounded-[2rem] p-2xl md:p-3xl text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-96 h-96 bg-secondary/20 blur-[100px] -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-tertiary-fixed-dim/10 blur-[100px] -ml-48 -mb-48"></div>
            <div class="relative z-10 space-y-lg">
                <h2 class="font-headline-lg text-headline-lg text-white glow-text-white">Ingin tau seberapa kuat website anda?</h2>
                <p class="font-body-lg text-white/70 max-w-2xl mx-auto leading-relaxed">Bergabunglah dengan ribuan bisnis yang telah mempercayakan keamanan sistem mereka kepada ScanTura.</p>
                <div class="pt-md">
                    <a href="{{ route('portfolio.index') }}" class="bg-white text-secondary font-bold text-label-md px-3xl py-lg rounded-xl shadow-xl hover:scale-105 hover:shadow-white/20 transition-all tracking-wider-tech inline-block text-center">
                        Daftar Gratis / Mulai Scan
                    </a>
                </div>
                <div class="flex justify-center items-center gap-xl text-white/40 font-label-sm tracking-wider-tech">
                    <span class="flex items-center gap-xs"><span class="material-symbols-outlined text-sm">shield</span> Tanpa Kartu Kredit</span>
                    <span class="flex items-center gap-xs"><span class="material-symbols-outlined text-sm">bolt</span> Setup 5 Menit</span>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="w-full py-xl px-margin flex flex-col md:flex-row justify-between items-center gap-md bg-surface-container-low border-t border-outline-variant/30 relative">
    <div class="flex flex-col items-center md:items-start gap-xs">
        <span class="text-headline-md font-bold text-secondary tracking-tight">ScanTura</span>
        <p class="text-label-sm text-on-surface-variant tracking-wider-tech">© 2026 ScanTura. Precision Trust Analytics.</p>
    </div>
    <nav class="flex flex-wrap justify-center gap-lg">
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors tracking-wider-tech" href="#">Trust Score Guide</a>
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors tracking-wider-tech" href="#">SSL &amp; Malware</a>
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors tracking-wider-tech" href="#">Performance</a>
        <a class="text-label-sm text-on-surface-variant hover:text-secondary transition-colors tracking-wider-tech" href="#">Compliance</a>
    </nav>
    <div class="flex gap-md">
        <span class="material-symbols-outlined text-outline cursor-pointer hover:text-secondary transition-all">language</span>
        <span class="material-symbols-outlined text-outline cursor-pointer hover:text-secondary transition-all">shield_with_heart</span>
    </div>
</footer>

<script>
    // --- BACKGROUND SHADER ---
    const canvas = document.getElementById('hero-shader');
    const gl = canvas.getContext('webgl');

    const vertexShaderSource = `
        attribute vec2 position;
        varying vec2 v_texCoord;
        void main() {
            v_texCoord = position * 0.5 + 0.5;
            gl_Position = vec4(position, 0.0, 1.0);
        }
    `;

    const fragmentShaderSource = `
        precision highp float;
        varying vec2 v_texCoord;
        uniform float u_time;
        uniform vec2 u_resolution;
        uniform vec2 u_mouse;

        void main() {
            vec2 uv = v_texCoord;
            vec2 p = (gl_FragCoord.xy * 2.0 - u_resolution.xy) / min(u_resolution.x, u_resolution.y);
            
            vec2 m = u_mouse / u_resolution;
            float time = u_time * 0.4;
            
            float d = length(p);
            float angle = atan(p.y, p.x);
            
            float pulse = sin(d * 10.0 - time * 5.0) * 0.5 + 0.5;
            float scan = smoothstep(0.4, 0.5, sin(p.y * 5.0 + time * 2.0));
            
            float lines = sin(p.x * 20.0 + sin(p.y * 10.0 + time) * 2.0) * 0.5 + 0.5;
            lines *= sin(p.y * 50.0 - time * 10.0) * 0.5 + 0.5;
            
            vec3 color1 = vec3(0.04, 0.07, 0.14); 
            vec3 color2 = vec3(0.08, 0.12, 0.25); 
            vec3 accent = vec3(0.2, 0.4, 0.9);   
            
            vec3 finalColor = mix(color1, color2, d * 0.5);
            finalColor += accent * pulse * 0.05 / (d + 0.1);
            finalColor += accent * lines * 0.03;
            finalColor += accent * scan * 0.02 * (1.0 - d);
            
            finalColor *= smoothstep(1.5, 0.2, d);

            gl_FragColor = vec4(finalColor, 1.0);
        }
    `;

    function createShader(gl, type, source) {
        const shader = gl.createShader(type);
        gl.shaderSource(shader, source);
        gl.compileShader(shader);
        return shader;
    }

    const program = gl.createProgram();
    gl.attachShader(program, createShader(gl, gl.VERTEX_SHADER, vertexShaderSource));
    gl.attachShader(program, createShader(gl, gl.FRAGMENT_SHADER, fragmentShaderSource));
    gl.linkProgram(program);

    const positionBuffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, -1, 1, 1, -1, 1, 1]), gl.STATIC_DRAW);

    const positionLocation = gl.getAttribLocation(program, 'position');
    const timeLocation = gl.getUniformLocation(program, 'u_time');
    const resolutionLocation = gl.getUniformLocation(program, 'u_resolution');
    const mouseLocation = gl.getUniformLocation(program, 'u_mouse');

    let mouseX = 0, mouseY = 0;
    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = window.innerHeight - e.clientY;
    });

    function renderShader(time) {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        gl.viewport(0, 0, canvas.width, canvas.height);

        gl.useProgram(program);
        gl.enableVertexAttribArray(positionLocation);
        gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
        gl.vertexAttribPointer(positionLocation, 2, gl.FLOAT, false, 0, 0);

        gl.uniform1f(timeLocation, time * 0.001);
        gl.uniform2f(resolutionLocation, canvas.width, canvas.height);
        gl.uniform2f(mouseLocation, mouseX, mouseY);

        gl.drawArrays(gl.TRIANGLES, 0, 6);
        requestAnimationFrame(renderShader);
    }
    requestAnimationFrame(renderShader);

    // --- THREE.JS HERO CORE ---
    const container = document.getElementById('three-canvas-container');
    const width = container.clientWidth || window.innerWidth;
    const height = container.clientHeight || 500;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });

    renderer.setSize(width, height);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    const pointLight = new THREE.PointLight(0x3b82f6, 1.5);
    pointLight.position.set(5, 5, 5);
    scene.add(pointLight);

    const geometry = new THREE.IcosahedronGeometry(2, 2);
    const material = new THREE.MeshPhongMaterial({
        color: 0x3b82f6,
        transparent: true,
        opacity: 0.15,
        shininess: 120
    });
    const shield = new THREE.Mesh(geometry, material);
    scene.add(shield);

    const wireframeMaterial = new THREE.MeshBasicMaterial({
        color: 0x60a5fa,
        wireframe: true,
        transparent: true,
        opacity: 0.25
    });
    const wireframe = new THREE.Mesh(geometry, wireframeMaterial);
    shield.add(wireframe);

    const coreGeo = new THREE.IcosahedronGeometry(0.8, 1);
    const coreMat = new THREE.MeshPhongMaterial({
        color: 0x93c5fd,
        emissive: 0x3b82f6,
        emissiveIntensity: 0.6
    });
    const core = new THREE.Mesh(coreGeo, coreMat);
    scene.add(core);

    camera.position.z = 6;

    let localMouseX = 0;
    let localMouseY = 0;
    window.addEventListener('mousemove', (e) => {
        localMouseX = (e.clientX / window.innerWidth) - 0.5;
        localMouseY = (e.clientY / window.innerHeight) - 0.5;
    });

    function animateThree() {
        requestAnimationFrame(animateThree);
        
        const time = Date.now() * 0.001;
        
        shield.position.y = Math.sin(time) * 0.15;
        core.position.y = Math.sin(time * 1.2) * 0.1;
        
        shield.rotation.y += 0.004 + (localMouseX * 0.04);
        shield.rotation.x += 0.002 + (localMouseY * 0.04);
        
        core.rotation.y -= 0.008;
        
        const pulse = Math.sin(time * 2.0) * 0.08 + 1.0;
        core.scale.set(pulse, pulse, pulse);
        
        renderer.render(scene, camera);
    }

    window.addEventListener('resize', () => {
        const w = container.clientWidth || window.innerWidth;
        const h = container.clientHeight || 500;
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    });

    animateThree();
</script>
</body>
</html>

<div id="authModal" class="fixed inset-0 z-50 flex items-center justify-center hidden transition-all duration-300">
    
    <div class="absolute inset-0 bg-black/60 backdrop-blur-xl" onclick="closeAuthModal()"></div>
    
    <div class="absolute inset-0 security-aura pointer-events-none z-0"></div>

    <main class="relative z-10 w-full max-w-[440px] px-md scale-95 opacity-0 transition-all duration-300 transform" id="modalCard">
        
        <div class="flex flex-col items-center mb-md">
            <div class="w-14 h-14 rounded-xl bg-secondary-container flex items-center justify-center shadow-[0_0_30px_rgba(33,112,228,0.4)] mb-sm">
                <span class="material-symbols-outlined text-white text-[32px]" style="font-variation-settings: 'FILL' 1;">shield_with_heart</span>
            </div>
            <h1 class="font-headline-lg text-headline-md text-white tracking-tight">ScanTura</h1>
            <p class="font-label-sm text-xs text-on-primary-container mt-xs tracking-widest opacity-70">PREMIUM SECURITY SOVEREIGNTY</p>
        </div>

        <div class="glass-card rounded-2xl p-xl shadow-2xl relative border border-white/10 bg-white/[0.02]">
            
            <button onclick="closeAuthModal()" class="absolute top-md right-md text-on-primary-container hover:text-white transition-colors cursor-pointer">
                <span class="material-symbols-outlined">close</span>
            </button>

            <div id="loginFormContainer">
                <div class="mb-lg">
                    <h2 class="font-headline-md text-xl font-bold text-white mb-xs">Secure Access</h2>
                    <p class="text-sm text-on-primary-container opacity-80">Identify yourself to enter the vault.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-md p-sm bg-red-500/10 border border-red-500/20 rounded-lg text-xs text-red-400">
                        Peringatan parameter otentikasi salah.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-md">
                    @csrf
                    <div class="space-y-xs">
                        <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="login_email">
                            <span class="material-symbols-outlined text-[16px]">alternate_email</span> Email Address
                        </label>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="login_email" name="email" value="{{ old('email') }}" placeholder="name@company.com" type="email" required autofocus/>
                    </div>

                    <div class="space-y-xs">
                        <div class="flex justify-between items-center">
                            <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="login_password">
                                <span class="material-symbols-outlined text-[16px]">lock</span> Password
                            </label>
                            <a class="text-xs text-secondary-container hover:text-white transition-colors" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="login_password" name="password" placeholder="••••••••" type="password" required/>
                    </div>

                    <button class="w-full bg-secondary-container hover:bg-secondary-container/90 text-white font-medium py-sm rounded-lg shadow-[0_0_20px_rgba(33,112,228,0.3)] hover:shadow-[0_0_30px_rgba(33,112,228,0.5)] transition-all flex items-center justify-center gap-sm mt-lg cursor-pointer" type="submit">
                        <span>Access Dashboard</span>
                        <span class="material-symbols-outlined">login</span>
                    </button>
                </form>

                <div class="mt-xl text-center">
                    <p class="text-sm text-on-primary-container">
                        Don't have an account? 
                        <button onclick="switchTab('register')" class="text-white font-bold hover:underline bg-transparent border-0 cursor-pointer ml-xs">Sign up</button>
                    </p>
                </div>
            </div>

            <div id="registerFormContainer" class="hidden">
                <div class="mb-lg">
                    <h2 class="font-headline-md text-xl font-bold text-white mb-xs">Create Sovereign Account</h2>
                    <p class="text-sm text-on-primary-container opacity-80">Deploy your custom scanning node.</p>
                </div>
                @error('limit_error')
                    <div class="mb-md p-sm bg-blue-500/10 border border-blue-500/20 rounded-lg text-xs text-blue-400 flex items-center gap-2 font-mono animate-pulse">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    {{ $message }}
                    </div>
                @enderror
                <form method="POST" action="{{ route('register') }}" class="space-y-md">
                    @csrf
                    <div class="space-y-xs">
                        <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="reg_name">
                            <span class="material-symbols-outlined text-[16px]">person</span> Full Name
                        </label>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="reg_name" name="name" placeholder="Azam" type="text" required/>
                    </div>

                    <div class="space-y-xs">
                        <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="reg_email">
                            <span class="material-symbols-outlined text-[16px]">alternate_email</span> Email Address
                        </label>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="reg_email" name="email" placeholder="name@company.com" type="email" required/>
                    </div>

                    <div class="space-y-xs">
                        <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="reg_password">
                            <span class="material-symbols-outlined text-[16px]">lock</span> Password
                        </label>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="reg_password" name="password" placeholder="••••••••" type="password" required/>
                    </div>

                    <div class="space-y-xs">
                        <label class="text-xs font-semibold text-on-primary-container flex items-center gap-xs text-gray-300" for="reg_password_confirmation">
                            <span class="material-symbols-outlined text-[16px]">lock_clock</span> Confirm Password
                        </label>
                        <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-sm text-white focus:outline-none focus:border-secondary-container transition-all" id="reg_password_confirmation" name="password_confirmation" placeholder="••••••••" type="password" required/>
                    </div>

                    <button class="w-full bg-green-600 hover:bg-green-500 text-white font-medium py-sm rounded-lg shadow-[0_0_20px_rgba(22,163,74,0.3)] transition-all flex items-center justify-center gap-sm mt-lg cursor-pointer" type="submit">
                        <span>Initialize Account</span>
                        <span class="material-symbols-outlined">how_to_reg</span>
                    </button>
                </form>

                <div class="mt-xl text-center">
                    <p class="text-sm text-on-primary-container">
                        Already verified? 
                        <button onclick="switchTab('login')" class="text-white font-bold hover:underline bg-transparent border-0 cursor-pointer ml-xs">Sign in</button>
                    </p>
                </div>
            </div>

        </div>

        <div class="mt-md flex justify-center items-center gap-lg opacity-30">
            <div class="flex items-center gap-xs grayscale">
                <span class="material-symbols-outlined text-[16px] text-white">verified_user</span>
                <span class="text-[10px] font-mono text-white">SOC2 TYPE II</span>
            </div>
            <div class="flex items-center gap-xs grayscale">
                <span class="material-symbols-outlined text-[16px] text-white">security</span>
                <span class="text-[10px] font-mono text-white">AES-256</span>
            </div>
        </div>
    </main>
</div>

<script>
    const authModal = document.getElementById('authModal');
    const modalCard = document.getElementById('modalCard');
    const loginForm = document.getElementById('loginFormContainer');
    const registerForm = document.getElementById('registerFormContainer');

    function openAuthModal(mode) {
        authModal.classList.remove('hidden');
        setTimeout(() => {
            modalCard.classList.remove('scale-95', 'opacity-0');
            modalCard.classList.add('scale-100', 'opacity-100');
        }, 10);
        switchTab(mode);
    }

    function closeAuthModal() {
        modalCard.classList.remove('scale-100', 'opacity-100');
        modalCard.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            authModal.classList.add('hidden');
        }, 300);
    }

    function switchTab(mode) {
        if (mode === 'login') {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        } else {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        }
    }

    document.addEventListener('mousemove', (e) => {
        const aura = document.querySelector('.security-aura');
        if(aura && !authModal.classList.contains('hidden')) {
            const x = e.clientX;
            const y = e.clientY;
            aura.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(33, 112, 228, 0.15) 0%, rgba(33, 112, 228, 0) 50%)`;
        }
    });

    @if ($errors->any())
        document.addEventListener("DOMContentLoaded", function() {
            openAuthModal('login');
        });
    @endif

document.addEventListener("DOMContentLoaded", function() {
    @if (session('force_auth_modal') == 'register')
        openAuthModal('register');
    @elseif ($errors->any())
        openAuthModal('login');
    @endif
});
</script>
</body>
</html>