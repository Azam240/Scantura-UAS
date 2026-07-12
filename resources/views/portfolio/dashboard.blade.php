<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScanTura - SEO Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between p-6">
            <div>
                <div class="flex items-center gap-2 text-[#005D8F] font-bold text-[20px]">
                    <span class="material-icons-outlined text-[24px]">shield</span> ScanTura
                </div>
                <p class="text-[12px] text-[#707881] mt-1 mb-8">Academic & Technical Security</p>
                <nav class="space-y-2">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 text-[14px] font-medium">
                        <span class="material-icons-outlined text-[20px]">home</span> Landing Page
                    </a>
                    
                    <a href="{{ route('portfolio.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-sky-50 text-[#005D8F] text-[14px] font-semibold">
                        <span class="material-icons-outlined text-[20px]">dashboard</span> Dashboard
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 text-[14px] font-medium">
                        <span class="material-icons-outlined text-[20px]">folder</span> Projects
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 text-[14px] font-medium">
                        <span class="material-icons-outlined text-[20px]">history</span> History
                    </a>
                </nav>
            </div>
            <div class="space-y-4">
                <button class="w-full bg-[#005D8F] text-white py-2 rounded-lg text-[14px] font-medium hover:bg-sky-700">Upgrade Plan</button>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
                <div class="flex gap-6 text-[14px] font-medium text-[#005D8F] border-b-2 border-[#005D8F] pb-5">
                    <a href="#">Lighthouse Overview</a>
                </div>
            </header>

            <main class="p-8 space-y-6">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Analyzed URL: <span class="text-blue-600 font-normal">{{ $url ?? 'Belum ada scan' }}</span></h2>
                        <p class="text-sm text-gray-500 mt-1">Engine status: Live Data</p>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-bold text-gray-400 uppercase">Performance Score</span>
                        <div class="text-3xl font-black text-amber-500">{{ $scores['performance'] ?? 0 }}<span class="text-sm text-gray-400 font-normal">/100</span></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center">
                        <div class="text-sm font-semibold text-gray-500">Performance</div>
                        <div class="text-4xl font-bold mt-2 text-emerald-600">{{ $scores['performance'] ?? 0 }}</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center">
                        <div class="text-sm font-semibold text-gray-500">Accessibility</div>
                        <div class="text-4xl font-bold mt-2 text-amber-500">{{ $scores['accessibility'] ?? 0 }}</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center">
                        <div class="text-sm font-semibold text-gray-500">Best Practices</div>
                        <div class="text-4xl font-bold mt-2 text-amber-500">{{ $scores['best_practices'] ?? 0 }}</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center">
                        <div class="text-sm font-semibold text-gray-500">SEO</div>
                        <div class="text-4xl font-bold mt-2 text-emerald-600">{{ $scores['seo'] ?? 0 }}</div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>