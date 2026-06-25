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
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Detail Transaksi</h1>
                <p class="text-sm text-slate-400 mt-1">Informasi lengkap riwayat transaksi barang.</p>
            </div>
            <a href="/transaction" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Kembali ke Daftar</a>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-8">
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <p class="text-sm text-slate-500">ID Transaksi</p>
                    <p class="mt-2 text-lg font-semibold"><?= esc($transaction['id']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Jenis</p>
                    <p class="mt-2 text-lg font-semibold capitalize"><?= esc($transaction['jenis_transaksi']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">ID Barang</p>
                    <p class="mt-2 text-lg font-semibold"><?= esc($transaction['id_barang']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Operator</p>
                    <p class="mt-2 text-lg font-semibold"><?= esc($transaction['operator'] ?? 'User #' . $transaction['id_user']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Tanggal Transaksi</p>
                    <p class="mt-2 text-lg font-semibold"><?= esc($transaction['tanggal_transaksi']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Jumlah</p>
                    <p class="mt-2 text-lg font-semibold"><?= esc($transaction['jumlah_keluar']) ?></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
