<?php
/**
 * @var array $items
 * @var array $transactions
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Riwayat Transaksi</h1>
                <p class="text-slate-400 mt-1">Lihat dan catat aliran barang masuk dan keluar.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-xl text-sm font-medium transition">Dashboard</a>
                <a href="/api/docs" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 rounded-xl text-sm font-medium transition">API Docs</a>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
        <div class="rounded-3xl bg-red-500/10 border border-red-500/20 p-4 text-red-200">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
        <?php endif; ?>

        <div class="grid gap-6 lg:grid-cols-[1.5fr_2fr]">
            <section class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h2 class="text-xl font-semibold text-white mb-4">Catat Transaksi Baru</h2>
                <form action="/transaction/store" method="post" class="space-y-4">
                    <label class="block">
                        <span class="text-slate-300 text-sm">Pilih Barang</span>
                        <select name="item_id" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none">
                            <option value="">Pilih barang...</option>
                            <?php foreach ($items as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= esc($item['nama_barang']) ?> - <?= esc($item['lokasi_loker']) ?> (stok: <?= esc($item['stok']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Jenis Transaksi</span>
                        <select name="jenis_transaksi" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none">
                            <option value="keluar">Keluar</option>
                            <option value="masuk">Masuk</option>
                        </select>
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Jumlah</span>
                        <input type="number" name="jumlah_keluar" min="1" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none" />
                    </label>

                    <button type="submit" class="w-full rounded-2xl bg-emerald-600 hover:bg-emerald-700 px-5 py-3 font-semibold transition">Simpan Transaksi</button>
                </form>
            </section>

            <section class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl overflow-x-auto">
                <h2 class="text-xl font-semibold text-white mb-4">Riwayat Transaksi</h2>
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="bg-slate-800/80 text-slate-300 uppercase tracking-wider">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Barang</th>
                            <th class="p-4">Jenis</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">User</th>
                            <th class="p-4">Tanggal</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/70">
                        <?php foreach ($transactions as $transaction): ?>
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="p-4 font-mono text-slate-400"><?= $transaction['id'] ?></td>
                            <td class="p-4 font-medium text-white"><?= esc($transaction['item_name'] ?? 'Unknown') ?></td>
                            <td class="p-4 text-slate-300"><?= esc(ucfirst($transaction['jenis_transaksi'])) ?></td>
                            <td class="p-4 text-slate-300"><?= esc($transaction['jumlah_keluar']) ?></td>
                            <td class="p-4 text-slate-300"><?= esc($transaction['user_name'] ?? 'System') ?></td>
                            <td class="p-4 text-slate-300"><?= esc($transaction['tanggal_transaksi']) ?></td>
                            <td class="p-4 text-right space-x-2">
                                <a href="/transaction/<?= $transaction['id'] ?>" class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 text-blue-300 border border-blue-500/20 rounded-lg text-sm hover:bg-blue-500/20 transition">Detail</a>
                                <a href="/transaction/delete/<?= $transaction['id'] ?>" class="inline-flex items-center gap-2 px-3 py-1.5 bg-red-500/10 text-red-300 border border-red-500/20 rounded-lg text-sm hover:bg-red-500/20 transition">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>
