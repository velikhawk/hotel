<?php
namespace App\Controllers;

use \App\Models\KamarModel;
use \App\Models\TipekamarModel;

class Kamar extends BaseController
{
    protected $KamarModel;
    protected $TipekamarModel;

    public function __construct()
    {
        $this->KamarModel =  new KamarModel();
        $this->TipekamarModel =  new TipekamarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kamar',
            'kamar' => $this->KamarModel->getAllKamar()
        ];

        return view('kamar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Kamar',
            'kamar' => $this->KamarModel->getKamarById(),
            'tipekamar'=>$this->TipekamarModel->getAllTipekamar(),
            'validation' => \Config\Services::validation()
        ];

        return view('kamar/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nokamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idtipekamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'allotment' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'picture' => [
                'rules' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('kamar/tambah')->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('picture');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/kamar', $namaSampul);
        }
        // validasi data sukses
        $this->KamarModel->save([
            'nokamar' => $this->request->getVar('nokamar'),
            'idtipekamar' => $this->request->getVar('idtipekamar'),
            'price' => $this->request->getVar('price'),
            'allotment' => $this->request->getVar('allotment'),
            'picture' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/kamar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Kamar',
            'validation' => \Config\Services::validation(),
            'kamar' => $this->KamarModel->getKamarById($id),
            'tipekamar' => $this->TipekamarModel->getTipekamarById(),
        ];
        // jika id data tidak ada di table
        if (empty($data['kamar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id. ' tidak ditemukan');
        };

        return view('kamar/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nokamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idtipekamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'allotment' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'picture' => [
                'rules' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('kamar/edit/' . $this->request->getVar('idkamar'))->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('picture');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('pictureLama');
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/kamar', $namaSampul);

            // hapus file lama
            // if ($this->request->getVar('gambarLama') != 'default.jpg') {
            //     unlink('img/kamar/' . $this->request->getVar('gambarLama'));
            // }
        }
        // validasi data sukses
        $this->KamarModel->save([
            'idkamar' => $id,
            'nokamar' => $this->request->getVar('nokamar'),
            'idtipekamar' => $this->request->getVar('idtipekamar'),
            'price' => $this->request->getVar('price'),
            'allotment' => $this->request->getVar('allotment'),
            'picture' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/kamar');
    }

    public function delete($id)
    {
        $kamar = $this->KamarModel->find($id);

        // cek jika gambar default
        if ($kamar['picture'] != 'default.jpg') {
            // hapus gambar
            unlink('img/kamar/' . $kamar['picture']);
        }

        $this->KamarModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('kamar');
    }
}