<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen">
    <div class="bg-slate-800 p-8 rounded-2xl shadow-2xl w-full max-w-md border border-slate-700">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white tracking-tight">DropHub <span class="text-blue-500">4.0</span></h2>
            <p class="text-slate-400 text-sm mt-2">Smart Distribution System</p>
        </div>
        
        <?php if(session()->getFlashdata('msg')):?>
            <div class="bg-red-500/10 border border-red-500 text-red-500 p-3 rounded-lg text-sm mb-6 text-center">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="/auth/process" method="post" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Username</label>
                <input type="text" name="username" required class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-lg shadow-blue-600/30">
                Masuk ke Sistem
            </button>
        </form>
    </div>
</body>
</html>