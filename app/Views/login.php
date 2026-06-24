<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(16px); }
        .scanlines { background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.1) 50%); background-size: 100% 4px; }
    </style>
</head>
<body class="bg-slate-950 flex items-center justify-center min-h-screen p-4 font-mono scanlines">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="glass w-full max-w-sm p-8 rounded-2xl shadow-2xl border border-slate-700/50 z-10">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-white tracking-widest uppercase">DropHub <span class="text-blue-500">4.0</span></h2>
            <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mt-2">Terminal Access System</p>
        </div>
        
        <?php if(session()->getFlashdata('msg')):?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-3 rounded-lg text-[11px] mb-6 text-center font-bold uppercase tracking-widest">
                [ERR]: <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="/auth/process" method="post" class="space-y-5">
            <div>
                <input type="text" name="username" placeholder="> USERNAME" required class="w-full px-4 py-3 bg-slate-950/50 border border-slate-700 rounded-lg text-white placeholder-slate-600 focus:outline-none focus:border-blue-500 transition">
            </div>
            
            <div class="relative">
                <input type="password" id="pass" name="password" placeholder="> PASSWORD" required class="w-full px-4 py-3 bg-slate-950/50 border border-slate-700 rounded-lg text-white placeholder-slate-600 focus:outline-none focus:border-blue-500 transition">
                <button type="button" onclick="togglePass()" class="absolute right-4 top-3.5 text-slate-500 hover:text-blue-400 transition">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold uppercase tracking-[0.1em] py-3 rounded-lg transition shadow-lg shadow-blue-900/20 active:scale-[0.98]">
                Login
            </button>
        </form>
    </div>

    <script>
        function togglePass() {
            const p = document.getElementById('pass');
            const icon = document.getElementById('eye-icon');
            if (p.type === "password") {
                p.type = "text";
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.77 9.77 0 012.804-3.71M15.75 15.75l-4.5-4.5m0 0l-4.5-4.5m4.5 4.5l-4.5-4.5m4.5 4.5l4.5 4.5" />';
            } else {
                p.type = "password";
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>