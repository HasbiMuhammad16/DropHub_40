<?php
/**
 * @var string $action
 * @var array|null $item
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $action === 'create' ? 'Tambah Barang' : 'Edit Barang' ?> - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-3xl mx-auto">
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-xl shadow-slate-900/20">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight"><?= $action === 'create' ? 'Tambah Barang' : 'Edit Barang' ?></h1>
                    <p class="text-slate-400 mt-1"><?= $action === 'create' ? 'Masukkan data barang baru.' : 'Perbarui informasi barang.' ?></p>
                </div>
                <div class="flex gap-3">
                    <a href="/item" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-xl text-sm font-medium transition">Kembali ke Barang</a>
                    <a href="/api/docs" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 rounded-xl text-sm font-medium transition">API Docs</a>
                </div>
            </div>

            <form action="<?= $action === 'create' ? '/item/store' : '/item/update/'.$item['id'] ?>" method="post" class="space-y-6">
                <div class="grid grid-cols-1 gap-6">
                    <label class="block">
                        <span class="text-slate-300 text-sm">Nama Barang</span>
                        <input type="text" name="nama_barang" value="<?= esc($item['nama_barang'] ?? '') ?>" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none" />
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Kategori</span>
                        <input type="text" name="kategori" value="<?= esc($item['kategori'] ?? '') ?>" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none" />
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Stok</span>
                        <input type="number" name="stok" value="<?= esc($item['stok'] ?? 0) ?>" min="0" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none" />
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Lokasi Loker</span>
                        <input type="text" name="lokasi_loker" value="<?= esc($item['lokasi_loker'] ?? '') ?>" required class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none" />
                    </label>

                    <label class="block">
                        <span class="text-slate-300 text-sm">Status Aktif</span>
                        <select name="status_aktif" class="mt-2 w-full rounded-2xl bg-slate-950 border border-slate-800 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none">
                            <option value="aktif" <?= isset($item['status_aktif']) && $item['status_aktif'] === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= isset($item['status_aktif']) && $item['status_aktif'] === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </label>
                </div>

                <div class="flex flex-wrap gap-3 justify-end">
                    <button type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 rounded-2xl text-sm font-semibold transition">Simpan</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
