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
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Master Data Barang</h1>
                <p class="text-sm text-slate-400 mt-1">Kelola data inventaris barang yang didistribusikan.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Dashboard</a>
                <a href="/item/create" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-xl text-sm font-medium transition shadow-lg shadow-blue-600/20">Tambah Barang</a>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-slate-800">
                <h2 class="text-lg font-semibold">Daftar Item</h2>
                <p class="text-sm text-slate-500 mt-1">Lihat dan kelola stok, lokasi loker, serta status aktif.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-800/60 border-b border-slate-800 text-slate-300 text-sm font-semibold">
                            <th class="p-4">ID</th>
                            <th class="p-4">Nama Barang</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Stok</th>
                            <th class="p-4">Lokasi Loker</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-sm">
                        <?php if (!empty($items)): ?>
                            <?php foreach ($items as $item): ?>
                                <tr class="hover:bg-slate-800/20 transition">
                                    <td class="p-4 font-mono text-slate-400"><?= esc($item['id']) ?></td>
                                    <td class="p-4 font-medium text-white"><?= esc($item['nama_barang']) ?></td>
                                    <td class="p-4 text-slate-300"><?= esc($item['kategori']) ?></td>
                                    <td class="p-4"><?= esc($item['stok']) ?></td>
                                    <td class="p-4"><?= esc($item['lokasi_loker']) ?></td>
                                    <td class="p-4">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold <?= $item['status_aktif'] === 'aktif' ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20' : 'bg-red-500/10 text-red-300 border border-red-500/20' ?>">
                                            <?= esc(strtoupper($item['status_aktif'])) ?></span>
                                    </td>
                                    <td class="p-4 text-right space-x-2">
                                        <a href="/item/edit/<?= esc($item['id']) ?>" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-sm text-slate-200 hover:bg-slate-700 transition">Edit</a>
                                        <a href="/item/delete/<?= esc($item['id']) ?>" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-300 hover:bg-red-500/20 transition">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="p-6 text-slate-500" colspan="7">Belum ada data barang.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
