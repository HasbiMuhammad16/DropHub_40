<nav class="bg-slate-900 border-b border-slate-800 px-8 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        <span class="text-xl font-bold tracking-wider text-white">DropHub <span class="text-blue-500">4.0</span></span>
    </div>
    <div class="flex items-center space-x-4">
        <a href="/api/docs" class="px-3 py-1.5 bg-teal-500/10 hover:bg-teal-500/20 border border-teal-500/20 text-teal-300 rounded-lg text-xs font-medium transition">API Docs</a>
        <div class="text-right">
            <p class="text-sm font-medium text-white"><?= session()->get('username') ?></p>
            <p class="text-xs text-slate-400 capitalize"><?= session()->get('role') ?></p>
        </div>
        <a href="/auth/logout" class="px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 rounded-lg text-xs font-medium transition">Keluar</a>
    </div>
</nav>