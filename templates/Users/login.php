<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Masuk');
?>
<h2 class="text-lg font-extrabold text-white text-center">Masuk ke akun</h2>
<p class="text-sm text-slate-400 text-center mb-4">Panggil tukang tambal ban terdekat dari HP.</p>

<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
    <?= $this->Form->create(null) ?>
    <?= $this->Form->control('no_hp', [
        'label' => 'No. HP',
        'type' => 'text',
        'required' => true,
        'autocomplete' => 'username',
        'placeholder' => '08xxxxxxxxxx',
    ]) ?>
    <?= $this->Form->control('password', [
        'label' => 'Kata sandi',
        'type' => 'password',
        'required' => true,
        'autocomplete' => 'current-password',
    ]) ?>
    <?= $this->Form->button('Masuk', ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<p class="text-center text-sm text-slate-400 mt-4">
    Belum punya akun?
    <?= $this->Html->link('Daftar', ['action' => 'register'], ['class' => 'text-amber-500 font-semibold']) ?>
</p>
