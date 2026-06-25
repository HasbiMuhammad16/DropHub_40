<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Transaksi - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Log Transaksi</h1>
                <p class="text-sm text-slate-400 mt-1">Riwayat perpindahan barang dan aktivitas operator.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Dashboard</a>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1fr_420px]">
            <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-800">
                    <h2 class="text-lg font-semibold">Daftar Transaksi</h2>
                    <p class="text-sm text-slate-500 mt-1">Tampilkan log terbaru dan detail operator.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-800/60 border-b border-slate-800 text-slate-300 text-sm font-semibold">
                                <th class="p-4">ID</th>
                                <th class="p-4">Barang</th>
                                <th class="p-4">Operator</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Jumlah</th>
                                <th class="p-4">Jenis</th>
                                <th class="p-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 text-sm">
                            <?php if (!empty($transactions)): ?>
                                <?php foreach ($transactions as $transaction): ?>
                                    <tr class="hover:bg-slate-800/20 transition">
                                        <td class="p-4 font-mono text-slate-400"><?= esc($transaction['id']) ?></td>
                                        <td class="p-4 font-medium text-white"><?= esc($transaction['id_barang']) ?></td>
                                        <td class="p-4">
                                            <?= esc($transaction['operator'] ?? 'User #' . $transaction['id_user']) ?>
                                        </td>
                                        <td class="p-4 text-slate-300"><?= esc($transaction['tanggal_transaksi']) ?></td>
                                        <td class="p-4"><?= esc($transaction['jumlah_keluar']) ?></td>
                                        <td class="p-4">
                                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold <?= $transaction['jenis_transaksi'] === 'masuk' ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20' : 'bg-red-500/10 text-red-300 border border-red-500/20' ?>">
                                                <?= strtoupper(esc($transaction['jenis_transaksi'])) ?></span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <a href="/transaction/<?= esc($transaction['id']) ?>" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-800 border border-slate-700 text-sm text-slate-200 hover:bg-slate-700 transition">Detail</a>
                                            <a href="/transaction/delete/<?= esc($transaction['id']) ?>" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-300 hover:bg-red-500/20 transition ml-2">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td class="p-6 text-slate-500" colspan="7">Belum ada catatan transaksi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-6">
                <h2 class="text-lg font-semibold">Catat Transaksi Baru</h2>
                <p class="text-sm text-slate-500 mt-1">Masukkan data log perpindahan barang.</p>

                <form action="/transaction/store" method="post" class="space-y-4 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">ID Barang</label>
                        <input type="text" name="id_barang" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">ID Operator</label>
                        <select name="id_user" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= esc($user['id']) ?>" <?= (isset($currentUser) && $currentUser == $user['id']) ? 'selected' : '' ?>><?= esc($user['username']) ?> (ID: <?= esc($user['id']) ?>)</option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">-- Tidak ada user --</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Tanggal Transaksi</label>
                        <input type="datetime-local" name="tanggal_transaksi" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Jumlah</label>
                        <input type="number" name="jumlah_keluar" required min="0" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Jenis Transaksi</label>
                        <select name="jenis_transaksi" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-semibold transition shadow-lg shadow-blue-600/20">Simpan Transaksi</button>
                </form>
            </section>
        </div>
    </main>
</body>
</html>
