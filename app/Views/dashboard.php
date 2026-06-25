<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col">

    <?= view('navbar') ?>

    <main class="flex-1 p-8 max-w-7xl w-full mx-auto space-y-8">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-xl shadow-blue-600/10">
            <h1 class="text-3xl font-bold text-white">Selamat Datang di DropHub 4.0</h1>
            <p class="text-blue-100 mt-2 max-w-xl">Sistem distribusi pintar terintegrasi IoT untuk efisiensi pelacakan, manajemen loker otomatis, dan pemantauan rantai pasok secara real-time.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/user" class="group bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-blue-500 transition shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition">Manajemen User</h3>
                        <p class="text-sm text-slate-400 mt-1">Kelola data otentikasi akun, peran operator, dan hak akses penuh ke dalam sistem control panel.</p>
                    </div>
                    <span class="text-2xl text-slate-600 group-hover:text-blue-400 transition">→</span>
                </div>
            </a>

            <a href="/item" class="group bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-emerald-500 transition shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-emerald-400 transition">Master Data Barang</h3>
                        <p class="text-sm text-slate-400 mt-1">Kelola stok, lokasi loker, kategori, dan status aktif barang distribusi.</p>
                    </div>
                    <span class="text-2xl text-slate-600 group-hover:text-emerald-400 transition">→</span>
                </div>
            </a>

            <a href="/api/docs" class="group bg-slate-900 border border-slate-800 p-6 rounded-2xl hover:border-teal-500 transition shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-teal-400 transition">Dokumentasi API</h3>
                        <p class="text-sm text-slate-400 mt-1">Buka dokumentasi endpoint REST API untuk integrasi IoT dan aplikasi lain.</p>
                    </div>
                    <span class="text-2xl text-slate-600 group-hover:text-teal-400 transition">→</span>
                </div>
            </a>
        </div>
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 py-6">
        <div class="max-w-7xl mx-auto px-8 flex justify-between items-center text-slate-500 text-xs">
            <p>&copy; <?= date('Y') ?> DropHub 4.0. All Rights Reserved.</p>
            <p>Sistem Kontrol Industri Terintegrasi</p>
        </div>
    </footer>

</body>
</html>