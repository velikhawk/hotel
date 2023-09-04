<?php

namespace App\Controllers;

use \App\Models\TipekamarModel;

class Tipekamar extends BaseController
{
    protected $TipekamarModel;

    public function __construct()
    {
        $this->TipekamarModel =  new TipekamarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tipekamar',
            'tipekamar' => $this->TipekamarModel->getAllTipekamar()
        ];

        return view('tipekamar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Tipe Kamar',
            'validation' => \Config\Services::validation()
        ];

        return view('tipekamar/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
           
            
            'kodekamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'namatipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'ukuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
           
            
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('tipekamar/tambah')->withInput();
        }
       

       
        // validasi data sukses
        $this->TipekamarModel->save([
           
            'kodekamar' => $this->request->getVar('kodekamar'),
            'namatipe' => $this->request->getVar('namatipe'),           
            'ukuran' => $this->request->getVar('ukuran'),           
            
           
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/tipekamar');
    }

    public function edit($idtipekamar)
    {
        $data = [
            'title' => 'Form Edit Data Tipe Kamar',
            'validation' => \Config\Services::validation(),
            'tipekamar' => $this->TipekamarModel->getTipekamarById($idtipekamar),
        ];
        // jika id data tidak ada di table
        if (empty($data['tipekamar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $idtipekamar . ' tidak ditemukan');
        };

        return view('tipekamar/edit', $data);
    }

    public function update($idtipekamar)
    {

        if (!$this->validate([
        
            'kodekamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'namatipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'ukuran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('/tipekamar/edit/' . $this->request->getVar('idtipekamar'))->withInput();
        }
      
        // validasi data sukses
        $this->TipekamarModel->save([
            'idtipekamar' => $idtipekamar,
           
            'kodekamar' => $this->request->getVar('kodekamar'),
            'namatipe' => $this->request->getVar('namatipe'),
            'ukuran' => $this->request->getVar('ukuran'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('tipekamar');
    }

    public function delete($idtipekamar)
    {
        $tipekamar = $this->TipekamarModel->find($idtipekamar);
        $this->TipekamarModel->delete($idtipekamar);

        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('tipekamar');
    }
}