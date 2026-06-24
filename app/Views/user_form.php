<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 p-8 rounded-2xl shadow-xl w-full max-w-md">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-white">Tambah Pengguna Baru</h2>
            <p class="text-sm text-slate-400 mt-1">Daftarkan akun personel logistik baru</p>
        </div>
        
        <form action="/user/store" method="post" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Username</label>
                <input type="text" name="username" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Hak Akses (Role)</label>
                <select name="role" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff Logistik</option>
                </select>
            </div>
            <div class="flex space-x-3 pt-2">
                <a href="/user" class="w-1/2 text-center py-2.5 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Batal</a>
                <button type="submit" class="w-1/2 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition shadow-lg shadow-blue-600/20">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>