<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Daftar');
?>
<h2 class="text-lg font-extrabold text-white text-center">Buat akun baru</h2>
<p class="text-sm text-slate-400 text-center mb-4">Daftar sebagai pengendara atau tukang tambal.</p>

<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
    <?= $this->Form->create($user) ?>
    <?= $this->Form->control('nama', ['label' => 'Nama lengkap', 'required' => true]) ?>
    <?= $this->Form->control('no_hp', ['label' => 'No. HP', 'required' => true, 'placeholder' => '08xxxxxxxxxx']) ?>
    <?= $this->Form->control('email', ['label' => 'Email (opsional)', 'type' => 'email', 'required' => false]) ?>
    <?= $this->Form->control('role', [
        'label' => 'Daftar sebagai',
        'type' => 'select',
        'id' => 'inRole',
        'options' => ['pengendara' => 'Pengendara', 'tukang' => 'Tukang Tambal'],
        'default' => 'pengendara',
    ]) ?>

    <div id="fieldBengkel" class="hidden">
        <?= $this->Form->control('nama_bengkel', [
            'label' => 'Nama bengkel / tambal ban',
            'type' => 'text',
            'required' => false,
            'placeholder' => 'Contoh: Tambal Ban Maju Jaya',
        ]) ?>
        <p class="text-[11px] text-amber-400 bg-amber-500/10 border border-amber-500/20 rounded-lg p-2 mb-3">
            Akun tukang perlu diverifikasi admin sebelum bisa menerima pesanan.
        </p>
    </div>

    <?= $this->Form->control('password', [
        'label' => 'Kata sandi (minimal 6 karakter)',
        'type' => 'password',
        'required' => true,
        'value' => '',
        'minlength' => 6,
        'autocomplete' => 'new-password',
    ]) ?>
    <?= $this->Form->control('konfirmasi_password', [
        'label' => 'Ulangi kata sandi',
        'type' => 'password',
        'required' => true,
        'value' => '',
        'autocomplete' => 'new-password',
    ]) ?>
    <?= $this->Form->button('Daftar', ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<p class="text-center text-sm text-slate-400 mt-4">
    Sudah punya akun?
    <?= $this->Html->link('Masuk', ['action' => 'login'], ['class' => 'text-amber-500 font-semibold']) ?>
</p>

<script>
(function () {
    var role = document.getElementById('inRole');
    var box = document.getElementById('fieldBengkel');
    function toggle() { box.classList.toggle('hidden', role.value !== 'tukang'); }
    role.addEventListener('change', toggle);
    toggle();
})();
</script>
