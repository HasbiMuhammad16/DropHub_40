<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col">
    <nav class="bg-slate-900 border-b border-slate-800 px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <span class="text-xl font-bold tracking-wider text-white">DropHub <span class="text-blue-500">4.0</span></span>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-right">
                <p class="text-sm font-medium text-white"><?= $username ?></p>
                <p class="text-xs text-slate-400 capitalize"><?= $role ?></p>
            </div>
            <a href="/auth/logout" class="px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 rounded-lg text-xs font-medium transition">Keluar</a>
        </div>
    </nav>

    <main class="flex-1 p-8 max-w-7xl w-full mx-auto space-y-8">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-xl shadow-blue-600/10">
            <h1 class="text-3xl font-bold text-white">Selamat Datang di DropHub 4.0</h1>
            <p class="text-blue-100 mt-2 max-w-xl">Sistem distribusi pintar terintegrasi IoT untuk efisiensi pelacakan, manajemen loker otomatis, dan pemantauan rantai pasok secara real-time.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="/user" class="group bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-blue-500 transition shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition">Manajemen User</h3>
                        <p class="text-sm text-slate-400 mt-1">Kelola data otentikasi akun, peran operator, dan hak akses penuh ke dalam sistem control panel.</p>
                    </div>
                    <span class="text-2xl text-slate-600 group-hover:text-blue-400 transition">→</span>
                </div>
            </a>

            <a href="/about" class="group bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-indigo-500 transition shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-indigo-400 transition">About Us</h3>
                        <p class="text-sm text-slate-400 mt-1">Lihat profil lengkap tim pengembang, rincian nomor induk mahasiswa, serta kontribusi dalam proyek.</p>
                    </div>
                    <span class="text-2xl text-slate-600 group-hover:text-indigo-400 transition">→</span>
                </div>
            </a>
        </div>
    </main>
</body>
</html>