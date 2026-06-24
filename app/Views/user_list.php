<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - DropHub 4.0</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    
    <?= view('navbar') ?>

    <main class="p-8 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Manajemen Pengguna</h1>
                <p class="text-sm text-slate-400 mt-1">Kelola data hak akses sistem DropHub 4.0</p>
            </div>
            <div class="flex space-x-3">
                <a href="/dashboard" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl text-sm font-medium transition">Dashboard</a>
                <a href="/user/create" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-xl text-sm font-medium transition shadow-lg shadow-blue-600/20">+ Tambah User</a>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-800/50 border-b border-slate-800 text-slate-300 text-sm font-semibold">
                        <th class="p-4">ID</th>
                        <th class="p-4">Username</th>
                        <th class="p-4">Role</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-sm">
                    <?php foreach($users as $u): ?>
                    <tr class="hover:bg-slate-800/30 transition">
                        <td class="p-4 text-slate-400 font-mono"><?= $u['id'] ?></td>
                        <td class="p-4 font-medium text-white"><?= $u['username'] ?></td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full <?= $u['role'] === 'admin' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' ?>">
                                <?= strtoupper($u['role']) ?>
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <a href="/user/delete/<?= $u['id'] ?>" class="text-red-400 hover:text-red-300 font-medium transition bg-red-500/10 hover:bg-red-500/20 px-3 py-1.5 rounded-lg border border-red-500/20">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>