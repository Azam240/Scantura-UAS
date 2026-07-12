<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>ScanTura | Secure Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#ffffff",
                        "on-secondary-container": "#fefcff",
                        "tertiary-fixed": "#6ffbbe",
                        "surface-container": "#e5eeff",
                        "inverse-primary": "#bec6e0",
                        "on-background": "#0b1c30",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#7c839b",
                        "inverse-surface": "#213145",
                        "on-surface-variant": "#45464d",
                        "on-secondary-fixed-variant": "#004395",
                        "on-primary-fixed": "#131b2e",
                        "surface-container-high": "#dce9ff",
                        "secondary-container": "#2170e4",
                        "primary-container": "#131b2e",
                        "on-tertiary-fixed": "#002113",
                        "tertiary-fixed-dim": "#4edea3",
                        "on-tertiary-fixed-variant": "#005236",
                        "tertiary": "#000000",
                        "surface-container-low": "#eff4ff",
                        "secondary": "#0058be",
                        "surface": "#f8f9ff",
                        "background": "#f8f9ff",
                        "surface-bright": "#f8f9ff",
                        "on-primary": "#ffffff",
                        "surface-variant": "#d3e4fe",
                        "error": "#ba1a1a",
                        "tertiary-container": "#002113",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-tint": "#565e74",
                        "on-tertiary-container": "#009668",
                        "on-primary-fixed-variant": "#3f465c",
                        "primary-fixed": "#dae2fd",
                        "on-surface": "#0b1c30",
                        "surface-container-highest": "#d3e4fe",
                        "error-container": "#ffdad6",
                        "outline": "#76777d",
                        "secondary-fixed": "#d8e2ff",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#bec6e0",
                        "outline-variant": "#c6c6cd",
                        "on-secondary-fixed": "#001a42",
                        "primary": "#000000",
                        "secondary-fixed-dim": "#adc6ff",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface-dim": "#cbdbf5"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "32px",
                        "gutter": "24px",
                        "xs": "4px",
                        "2xl": "48px",
                        "sm": "8px",
                        "lg": "24px",
                        "3xl": "64px",
                        "base": "4px",
                        "md": "16px",
                        "margin": "32px"
                    },
                    "fontFamily": {
                        "label-sm": ["JetBrains Mono"],
                        "display-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-md": ["JetBrains Mono"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "500" }],
                        "display-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-md": ["14px", { "lineHeight": "20px", "fontWeight": "500" }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        
        .security-aura {
            background: radial-gradient(circle at center, rgba(33, 112, 228, 0.15) 0%, rgba(33, 112, 228, 0) 70%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .input-glow:focus-within {
            box-shadow: 0 0 15px rgba(33, 112, 228, 0.3);
            border-color: #2170e4;
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }
        
        .animate-aura {
            animation: pulse-slow 8s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-[#0b1c30] min-h-screen flex items-center justify-center font-body-md text-on-surface selection:bg-secondary-container selection:text-white overflow-hidden">

<div class="fixed inset-0 z-0">
    <div class="absolute inset-0 security-aura animate-aura"></div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#ffffff 0.5px, transparent 0.5px); background-size: 32px 32px;"></div>
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <circle cx="10%" cy="20%" fill="#2170e4" r="1"><animate attributeName="opacity" dur="5s" repeatCount="indefinite" values="0;1;0"></animate></circle>
            <circle cx="85%" cy="40%" fill="#2170e4" r="1.5"><animate attributeName="opacity" dur="7s" repeatCount="indefinite" values="0;1;0"></animate></circle>
            <circle cx="30%" cy="80%" fill="#2170e4" r="1"><animate attributeName="opacity" dur="4s" repeatCount="indefinite" values="0;1;0"></animate></circle>
        </svg>
    </div>
</div>

<main class="relative z-10 w-full max-w-[440px] px-md">
    
    <a href="{{ url('/portfolio') }}" class="flex flex-col items-center mb-xl group cursor-pointer">
        <div class="w-16 h-16 rounded-xl bg-secondary-container flex items-center justify-center shadow-[0_0_30px_rgba(33,112,228,0.4)] mb-md group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-white text-[40px]" style="font-variation-settings: 'FILL' 1;">shield_with_heart</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-white tracking-tight group-hover:text-secondary-container transition-colors">ScanTura</h1>
        <p class="font-label-sm text-label-sm text-on-primary-container mt-xs tracking-widest">PREMIUM SECURITY SOVEREIGNTY</p>
    </a>

    <div class="glass-card rounded-2xl p-xl shadow-2xl">
        <div class="mb-xl">
            <h2 class="font-headline-md text-headline-md text-white mb-xs">Secure Access</h2>
            <p class="font-body-md text-body-md text-on-primary-container">Identify yourself to enter the vault.</p>
        </div>

        @if (session('status'))
            <div class="mb-lg p-md bg-emerald-500/10 border border-emerald-500/20 rounded-lg text-emerald-400 text-xs font-semibold text-center">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-lg p-md bg-red-500/10 border border-red-500/20 rounded-lg text-red-400 text-xs font-semibold space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-[16px]">error</span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-lg">
            @csrf

            <div class="space-y-sm">
                <label class="font-label-md text-label-md text-on-primary-container flex items-center gap-xs" for="email">
                    <span class="material-symbols-outlined text-[18px]">alternate_email</span>
                    Email Address
                </label>
                <div class="input-glow group relative transition-all duration-300">
                    <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-md text-white font-body-md placeholder:text-on-primary-container/30 focus:outline-none focus:ring-0 transition-all focus:border-secondary-container" 
                           id="email" type="email" name="email" value="{{ old('email') }}" placeholder="name@company.com" required autofocus autocomplete="username"/>
                </div>
            </div>

            <div class="space-y-sm">
                <div class="flex justify-between items-center">
                    <label class="font-label-md text-label-md text-on-primary-container flex items-center gap-xs" for="password">
                        <span class="material-symbols-outlined text-[18px]">lock</span>
                        Password
                    </label>
                    @if (Route::has('password.request'))
                        <a class="font-label-sm text-label-sm text-secondary-container hover:text-white transition-colors" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>
                <div class="input-glow group relative transition-all duration-300">
                    <input class="w-full bg-white/5 border border-white/10 rounded-lg px-md py-md text-white font-body-md placeholder:text-on-primary-container/30 focus:outline-none focus:ring-0 transition-all focus:border-secondary-container" 
                           id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password"/>
                    <button id="toggle-password" class="absolute right-md top-1/2 -translate-y-1/2 text-on-primary-container hover:text-white transition-colors" type="button">
                        <span class="material-symbols-outlined">visibility_off</span>
                    </button>
                </div>
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 bg-white/5 border-white/10 text-secondary-container focus:ring-0 focus:ring-offset-0 rounded cursor-pointer">
                <label for="remember_me" class="ml-2 font-label-sm text-label-sm text-on-primary-container cursor-pointer select-none hover:text-white transition-colors">
                    Remember this secure session
                </label>
            </div>

            <button class="w-full bg-secondary-container hover:bg-secondary-container/90 text-white font-headline-md text-headline-md py-md rounded-lg shadow-[0_0_20px_rgba(33,112,228,0.3)] hover:shadow-[0_0_30px_rgba(33,112,228,0.5)] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-sm mt-xl" type="submit">
                <span>Access Dashboard</span>
                <span class="material-symbols-outlined">login</span>
            </button>
        </form>

        <div class="mt-2xl text-center">
            <p class="font-body-md text-body-md text-on-primary-container">
                Don't have an account? 
                @if (Route::has('register'))
                    <a class="text-white font-bold hover:underline decoration-secondary-container underline-offset-4 ml-xs" href="{{ route('register') }}">Sign up</a>
                @endif
            </p>
        </div>
    </div>

    <div class="mt-xl flex justify-center items-center gap-xl opacity-30">
        <div class="flex items-center gap-xs grayscale">
            <span class="material-symbols-outlined text-[20px] text-white">verified_user</span>
            <span class="font-label-sm text-label-sm text-white">SOC2 TYPE II</span>
        </div>
        <div class="flex items-center gap-xs grayscale">
            <span class="material-symbols-outlined text-[20px] text-white">security</span>
            <span class="font-label-sm text-label-sm text-white">AES-256</span>
        </div>
    </div>
</main>

<footer class="fixed bottom-0 w-full py-xl px-margin flex flex-col md:flex-row justify-between items-center gap-md z-10">
    <p class="font-label-sm text-label-sm text-on-primary-container/50">© 2026 ScanTura. Ensuring Digital Sovereignty.</p>
    <div class="flex gap-lg">
        <a class="font-label-sm text-label-sm text-on-primary-container/50 hover:text-white transition-colors" href="#">Security Policy</a>
        <a class="font-label-sm text-label-sm text-on-primary-container/50 hover:text-white transition-colors" href="#">Privacy Vault</a>
        <a class="font-label-sm text-label-sm text-on-primary-container/50 hover:text-white transition-colors" href="#">Status</a>
    </div>
</footer>

<script>
    // 1. Mouse Tracking Aura (Parallax Efek)
    document.addEventListener('mousemove', (e) => {
        const aura = document.querySelector('.security-aura');
        if(aura) {
            const x = e.clientX;
            const y = e.clientY;
            aura.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(33, 112, 228, 0.12) 0%, rgba(33, 112, 228, 0) 60%)`;
        }
    });

    // 2. Fitur Intip/Tampilkan Password (Fungsional)
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('toggle-password');
    
    if(togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePasswordBtn.querySelector('.material-symbols-outlined').textContent = isPassword ? 'visibility' : 'visibility_off';
        });
    }

    // 3. Animasi Kirim Form Otentikasi (Bekerja Saat Submit)
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', () => {
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Authenticating...</span>
        `;
    });
</script>
</body>
</html>