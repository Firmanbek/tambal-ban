<?php
/**
 * Halaman sementara untuk mengetes login.
 *
 * @var \App\View\AppView $this
 * @var \Authentication\IdentityInterface $user
 */
$this->assign('title', 'Beranda');
$roleLabel = ['pengendara' => 'Pengendara', 'tukang' => 'Tukang Tambal', 'admin' => 'Admin'];
?>
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 text-center space-y-3">
    <div class="w-16 h-16 mx-auto rounded-full bg-slate-800 ring-2 ring-amber-500 flex items-center justify-center font-bold text-amber-500 text-lg">
        <?= h(mb_strtoupper(mb_substr((string)$user->get('nama'), 0, 1))) ?>
    </div>
    <div>
        <p class="text-xs text-slate-400">Berhasil masuk sebagai</p>
        <h2 class="font-bold text-lg text-white"><?= h($user->get('nama')) ?></h2>
        <p class="text-sm text-amber-500 font-semibold"><?= h($roleLabel[$user->get('role')] ?? $user->get('role')) ?></p>
    </div>
    <p class="text-xs text-slate-400">Halaman ini hanya untuk mengetes login. Halaman asli tiap role dibuat di langkah berikutnya.</p>
    <?= $this->Html->link('Keluar', ['action' => 'logout'], ['class' => 'btn-secondary']) ?>
</div>
