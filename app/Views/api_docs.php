<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi API - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    <?= view('navbar') ?>

    <main class="p-8 max-w-6xl mx-auto space-y-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Dokumentasi REST API</h1>
                <p class="text-sm text-slate-400 mt-1">Endpoint API untuk integrasi data `items` dan `transactions`.</p>
            </div>
            <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Kembali ke Dashboard</a>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-6">
                <h2 class="text-xl font-semibold text-white">Items API</h2>
                <div class="mt-4 space-y-4 text-sm text-slate-300">
                    <div>
                        <p class="font-semibold">GET /api/items</p>
                        <p>Ambil semua item dalam format JSON.</p>
                    </div>
                    <div>
                        <p class="font-semibold">POST /api/items</p>
                        <p>Tambah item baru via JSON body.</p>
                    </div>
                    <div>
                        <p class="font-semibold">PUT /api/items/{id}</p>
                        <p>Update stok item berdasar ID.</p>
                    </div>
                    <div>
                        <p class="font-semibold">DELETE /api/items/{id}</p>
                        <p>Hapus item berdasar ID.</p>
                    </div>
                </div>
            </section>

            <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-6">
                <h2 class="text-xl font-semibold text-white">Transactions API</h2>
                <div class="mt-4 space-y-4 text-sm text-slate-300">
                    <div>
                        <p class="font-semibold">GET /api/transactions</p>
                        <p>Ambil semua transaksi dalam format JSON.</p>
                    </div>
                </div>
            </section>
        </div>

        <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-6">
            <h2 class="text-xl font-semibold text-white">Contoh Request</h2>
            <div class="mt-4 text-sm text-slate-300 space-y-3">
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">GET /api/items</pre>
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">POST /api/items
Content-Type: application/json

{
  "nama_barang": "Sensor Suhu",
  "kategori": "IoT",
  "stok": 5,
  "lokasi_loker": "Loker B2",
  "status_aktif": "aktif"
}</pre>
            </div>
        </section>
    </main>
</body>
</html>
