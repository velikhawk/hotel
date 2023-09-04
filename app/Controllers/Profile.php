<?php

namespace App\Controllers;

use \App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel =  new ProfileModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'profile' => $this->profileModel->getAllProfile()
        ];

        return view('profile/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Profile',
            'validation' => \Config\Services::validation()
        ];

        return view('profile/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('profile/tambah')->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/profile', $namaSampul);
        }
        // validasi data sukses
        $this->profileModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/profile');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Profil',
            'validation' => \Config\Services::validation(),
            'profile' => $this->profileModel->getProfileById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['profile'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('profile/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('profile/edit/' . $this->request->getVar('id'))->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('gambarLama');
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/profile', $namaSampul);

            // hapus file lama
            if ($this->request->getVar('gambarLama') != 'default.jpg') {
                unlink('img/profile/' . $this->request->getVar('gambarLama'));
            }
        }
        // validasi data sukses
        $this->profileModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/profile');
    }

    public function delete($id)
    {
        $profile = $this->profileModel->find($id);

        // cek jika gambar default
        if ($profile['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/profile/' . $profile['gambar']);
        }

        $this->profileModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('profile');
    }
}
