<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-3xl mx-auto">
        <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold tracking-tight">Tambah Item Baru</h1>
                <p class="text-sm text-slate-400 mt-1">Masukkan data barang inventaris untuk pendistribusian.</p>
            </div>

            <form action="/item/store" method="post" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" required class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Kategori</label>
                    <input type="text" name="kategori" required class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Stok</label>
                    <input type="number" name="stok" required min="0" value="0" class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Lokasi Loker</label>
                    <input type="text" name="lokasi_loker" required class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Status Aktif</label>
                    <select name="status_aktif" required class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
                <div class="flex flex-wrap gap-3 pt-4">
                    <a href="/item" class="px-5 py-3 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-2xl text-sm font-medium transition">Batal</a>
                    <button type="submit" class="px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-2xl text-sm font-semibold text-white transition shadow-lg shadow-blue-600/20">Simpan Item</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
