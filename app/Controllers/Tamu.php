<?php

namespace App\Controllers;

use \App\Models\TamuModel;

class Tamu extends BaseController
{
    protected $TamuModel;

    public function __construct()
    {
        $this->TamuModel =  new TamuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tamu',
            'tamu' => $this->TamuModel->getAllTamu()
        ];

        return view('tamu/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Tipe Kamar',
            'validation' => \Config\Services::validation()
        ];

        return view('tamu/tambah', $data);
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('tamu/tambah')->withInput();
        }
       

       
        // validasi data sukses
        $this->TamuModel->save([
           
            
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),           
            'email' => $this->request->getVar('email'),           
            'telp' => $this->request->getVar('telp'),           
           
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/tamu');
    }

    public function edit($idtamu)
    {
        $data = [
            'title' => 'Form Edit Data Tipe Kamar',
            'validation' => \Config\Services::validation(),
            'tamu' => $this->TamuModel->getTamuById($idtamu),
        ];
        // jika id data tidak ada di table
        if (empty($data['tamu'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $idtamu . ' tidak ditemukan');
        };

        return view('tamu/edit', $data);
    }

    public function update($idtamu)
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('/tamu/edit/' . $this->request->getVar('idtamu'))->withInput();
        }
      
        // validasi data sukses
        $this->TamuModel->save([
            'idtamu' => $idtamu,
           
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('tamu');
    }

    public function delete($idtamu)
    {
        $tamu = $this->TamuModel->find($idtamu);
        $this->TamuModel->delete($idtamu);

        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('tamu');
    }
}