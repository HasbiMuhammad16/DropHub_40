<?php
/**
 * @var array $transaction
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-4xl mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Detail Transaksi</h1>
                <p class="text-slate-400 mt-1">Informasi lengkap transaksi barang.</p>
            </div>
            <div class="flex gap-3">
                <a href="/transaction" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-xl text-sm font-medium transition">Kembali ke Transaksi</a>
                <a href="/api/docs" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 rounded-xl text-sm font-medium transition">API Docs</a>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-xl shadow-slate-900/20">
            <div class="grid gap-6 sm:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">ID Transaksi</p>
                    <p class="text-lg font-medium text-white"><?= esc($transaction['id']) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">Tanggal</p>
                    <p class="text-lg font-medium text-white"><?= esc($transaction['tanggal_transaksi']) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">Barang</p>
                    <p class="text-lg font-medium text-white"><?= esc($transaction['item_name'] ?? 'Unknown') ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">Jenis</p>
                    <p class="text-lg font-medium text-white"><?= esc(ucfirst($transaction['jenis_transaksi'])) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">Jumlah</p>
                    <p class="text-lg font-medium text-white"><?= esc($transaction['jumlah_keluar']) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-slate-400 text-sm">User</p>
                    <p class="text-lg font-medium text-white"><?= esc($transaction['user_name'] ?? 'System') ?></p>
                </div>
            </div>

            <div class="mt-10 bg-slate-950 border border-slate-800 rounded-3xl p-6">
                <h2 class="text-xl font-semibold text-white mb-4">Detail Barang</h2>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-slate-400 text-sm">Kategori</p>
                        <p class="text-slate-200"><?= esc($transaction['item_category'] ?? '-') ?></p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-sm">Lokasi Loker</p>
                        <p class="text-slate-200"><?= esc($transaction['lokasi_loker'] ?? '-') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
