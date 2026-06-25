<?php
/**
 * @var array $items
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Barang - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Master Data Barang</h1>
                <p class="text-slate-400 mt-1">Kelola stok, lokasi loker, kategori, dan status barang.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Dashboard</a>
                <a href="/item/create" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 rounded-xl text-sm font-medium transition shadow-lg shadow-emerald-500/20">Tambah Barang</a>
                <a href="/api/docs" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 rounded-xl text-sm font-medium transition">API Docs</a>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-xl">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-800/80 text-slate-300 text-sm uppercase tracking-wider">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nama Barang</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Stok</th>
                        <th class="p-4">Lokasi Loker</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/70 text-sm">
                    <?php foreach ($items as $item): ?>
                    <tr class="hover:bg-slate-800/50 transition">
                        <td class="p-4 font-mono text-slate-400"><?= $item['id'] ?></td>
                        <td class="p-4 font-medium text-white"><?= esc($item['nama_barang']) ?></td>
                        <td class="p-4 text-slate-300"><?= esc($item['kategori']) ?></td>
                        <td class="p-4 text-slate-300"><?= esc($item['stok']) ?></td>
                        <td class="p-4 text-slate-300"><?= esc($item['lokasi_loker']) ?></td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $item['status_aktif'] === 'aktif' ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20' : 'bg-red-500/10 text-red-300 border border-red-500/20' ?>">
                                <?= esc(ucfirst($item['status_aktif'])) ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="/item/edit/<?= $item['id'] ?>" class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 text-blue-300 border border-blue-500/20 rounded-lg text-sm hover:bg-blue-500/20 transition">Edit</a>
                            <a href="/item/delete/<?= $item['id'] ?>" class="inline-flex items-center gap-2 px-3 py-1.5 bg-red-500/10 text-red-300 border border-red-500/20 rounded-lg text-sm hover:bg-red-500/20 transition">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
