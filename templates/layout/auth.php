<?php
/**
 * Layout halaman masuk / daftar (tema gelap amber, mengikuti prototipe v2)
 *
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($this->fetch('title')) ?> - TambalBan Express</title>
    <?= $this->Html->meta('icon') ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .message { margin-bottom: .85rem; padding: .65rem .85rem; border-radius: .75rem; font-size: .8rem; font-weight: 600; cursor: pointer; }
        .message.error { background: rgba(244,63,94,.12); color: #fda4af; border: 1px solid rgba(244,63,94,.35); }
        .message.success { background: rgba(16,185,129,.12); color: #6ee7b7; border: 1px solid rgba(16,185,129,.35); }
        .message.warning, .message.info { background: rgba(245,158,11,.12); color: #fcd34d; border: 1px solid rgba(245,158,11,.35); }
        .input { margin-bottom: .85rem; }
        .input label { display: block; font-size: .75rem; font-weight: 600; color: #94a3b8; margin-bottom: .3rem; }
        .input input, .input select { width: 100%; background: #020617; border: 1px solid #1e293b; border-radius: .75rem; padding: .65rem .8rem; font-size: .9rem; color: #f1f5f9; }
        .input input::placeholder { color: #64748b; }
        .input input:focus, .input select:focus { outline: 2px solid #f59e0b; outline-offset: 1px; }
        .error-message { color: #fda4af; font-size: .75rem; margin-top: .25rem; }
        .btn-primary { width: 100%; padding: .8rem; border-radius: .75rem; background: #f59e0b; color: #020617; font-weight: 800; font-size: .9rem; cursor: pointer; }
        .btn-primary:hover { background: #d97706; }
        .btn-secondary { display: block; width: 100%; text-align: center; padding: .8rem; border-radius: .75rem; background: #0f172a; border: 1px solid #1e293b; color: #cbd5e1; font-weight: 700; font-size: .9rem; }
    </style>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased flex items-center justify-center p-4 selection:bg-amber-500 selection:text-slate-950">
    <main class="w-full max-w-md py-6">
        <div class="text-center mb-5">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-tr from-amber-600 to-amber-400 flex items-center justify-center text-slate-950 shadow-lg shadow-amber-500/20">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <h1 class="mt-3 font-extrabold text-xl text-white">TambalBan<span class="text-amber-500">Express</span></h1>
            <p class="text-xs text-slate-400">Bantuan ban darurat</p>
        </div>

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>
