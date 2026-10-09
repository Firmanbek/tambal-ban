<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * Login, daftar, logout, dan halaman beranda sementara.
 * Pembatasan akses per role dibuat di Langkah 4C.
 */
class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        // Halaman yang boleh dibuka tanpa login
        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('auth');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // Sudah login (atau baru berhasil login): arahkan ke beranda
        if ($result && $result->isValid()) {
            $target = $this->Authentication->getLoginRedirect()
                ?? ['controller' => 'Users', 'action' => 'beranda'];

            return $this->redirect($target);
        }

        if ($this->request->is('post') && $result && !$result->isValid()) {
            $this->Flash->error('No. HP atau kata sandi salah.');
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('auth');
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Admin tidak bisa mendaftar sendiri: hanya pengendara atau tukang
            $role = ($data['role'] ?? '') === 'tukang' ? 'tukang' : 'pengendara';
            $data['role'] = $role;
            $namaBengkel = trim((string)($data['nama_bengkel'] ?? ''));
            if (trim((string)($data['email'] ?? '')) === '') {
                $data['email'] = null;
            }

            $user = $this->Users->patchEntity($user, $data, [
                'fields' => ['nama', 'no_hp', 'email', 'password', 'role'],
            ]);

            if (($data['password'] ?? '') !== ($data['konfirmasi_password'] ?? '')) {
                $this->Flash->error('Kata sandi dan ulangi kata sandi tidak sama.');
            } elseif (strlen((string)($data['password'] ?? '')) < 6) {
                $this->Flash->error('Kata sandi minimal 6 karakter.');
            } elseif ($role === 'tukang' && $namaBengkel === '') {
                $this->Flash->error('Nama bengkel wajib diisi untuk tukang tambal.');
            } else {
                // User dan profil bengkel disimpan bersama: gagal satu, batal semua
                $ok = $this->Users->getConnection()->transactional(
                    function () use ($user, $role, $namaBengkel) {
                        if (!$this->Users->save($user)) {
                            return false;
                        }
                        if ($role === 'tukang') {
                            $tukangTable = $this->fetchTable('TukangTambal');
                            $tukang = $tukangTable->newEntity([
                                'user_id' => $user->id,
                                'nama_bengkel' => $namaBengkel,
                                'sedang_buka' => 0,
                                'status_verifikasi' => 'Menunggu',
                            ]);
                            if (!$tukangTable->save($tukang)) {
                                return false;
                            }
                        }

                        return true;
                    }
                );

                if ($ok) {
                    $this->Flash->success(
                        $role === 'tukang'
                            ? 'Pendaftaran berhasil. Akun tukang menunggu verifikasi admin.'
                            : 'Pendaftaran berhasil. Silakan masuk.'
                    );

                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error('Pendaftaran gagal. Periksa isian, atau no. HP mungkin sudah terdaftar.');
            }
        }

        $this->set(compact('user'));
    }

    /**
     * Halaman sementara untuk mengetes login. Diganti halaman per role nanti.
     */
    public function beranda()
    {
        $this->viewBuilder()->setLayout('auth');
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }
}
