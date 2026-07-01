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

        <section class="bg-amber-500/10 border border-amber-500/20 rounded-3xl p-6">
            <h2 class="text-lg font-semibold text-amber-300">Autentikasi</h2>
            <p class="mt-2 text-sm text-slate-300">Semua endpoint <code class="text-amber-300">/api/items</code> dan <code class="text-amber-300">/api/transactions</code> wajib menyertakan header <code class="text-amber-300">X-API-KEY</code>. Endpoint dokumentasi ini (<code class="text-amber-300">/api/docs</code>) tidak memerlukan API key.</p>
            <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto mt-3">X-API-KEY: &lt;isi sesuai nilai API_KEY di file .env&gt;</pre>
            <p class="mt-2 text-sm text-slate-400">Tanpa header ini atau jika nilainya salah, request akan dibalas <span class="text-amber-300 font-semibold">401 Unauthorized</span>.</p>
        </section>

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
                        <p>Ambil semua transaksi dalam format JSON (lengkap dengan nama user &amp; item).</p>
                    </div>
                    <div>
                        <p class="font-semibold">POST /api/transactions</p>
                        <p>Buat transaksi baru. Stok item otomatis disesuaikan (bertambah untuk "masuk", berkurang untuk "keluar").</p>
                    </div>
                    <div>
                        <p class="font-semibold">PUT /api/transactions/{id}</p>
                        <p>Update jumlah_keluar dan/atau jenis_transaksi. Stok item <span class="text-amber-300">tidak</span> otomatis disesuaikan ulang.</p>
                    </div>
                    <div>
                        <p class="font-semibold">DELETE /api/transactions/{id}</p>
                        <p>Hapus transaksi. Stok item <span class="text-amber-300">tidak</span> otomatis dikembalikan.</p>
                    </div>
                </div>
            </section>
        </div>

        <section class="bg-slate-900 border border-slate-800 rounded-3xl shadow-xl p-6">
            <h2 class="text-xl font-semibold text-white">Contoh Request</h2>
            <div class="mt-4 text-sm text-slate-300 space-y-3">
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">GET /api/items
X-API-KEY: &lt;api_key_anda&gt;</pre>
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">POST /api/items
Content-Type: application/json
X-API-KEY: &lt;api_key_anda&gt;

{
  "nama_barang": "Sensor Suhu",
  "kategori": "IoT",
  "stok": 5,
  "lokasi_loker": "Loker B2",
  "status_aktif": "aktif"
}</pre>
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">POST /api/transactions
Content-Type: application/json
X-API-KEY: &lt;api_key_anda&gt;

{
  "id_barang": 1,
  "id_user": 1,
  "jumlah_keluar": 5,
  "jenis_transaksi": "keluar"
}</pre>
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">PUT /api/transactions/1
Content-Type: application/json
X-API-KEY: &lt;api_key_anda&gt;

{
  "jumlah_keluar": 3
}</pre>
                <pre class="bg-slate-950 p-4 rounded-2xl text-xs overflow-x-auto">DELETE /api/transactions/1
X-API-KEY: &lt;api_key_anda&gt;</pre>
            </div>
        </section>
    </main>
</body>
</html>