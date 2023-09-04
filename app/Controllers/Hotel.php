<?php

namespace App\Controllers;

use \App\Models\HotelModel;

class Hotel extends BaseController
{
    protected $HotelModel;

    public function __construct()
    {
        $this->HotelModel =  new HotelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Hotel',
            'hotel' => $this->HotelModel->getAllHotel()
        ];

        return view('hotel/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Hotel',
            'validation' => \Config\Services::validation()
        ];

        return view('hotel/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
           
            'nama_hotel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'bintang' => [
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
            
            'telp' => [
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
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('hotel/tambah')->withInput();
        }
       

       
        // validasi data sukses
        $this->HotelModel->save([
           
            'nama_hotel' => $this->request->getVar('nama_hotel'),
            'bintang' => $this->request->getVar('bintang'),
            'alamat' => $this->request->getVar('alamat'),           
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/hotel');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Hotel',
            'validation' => \Config\Services::validation(),
            'hotel' => $this->HotelModel->getHotelById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['hotel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('hotel/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama_hotel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_hotel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'bintang' => [
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
            
            'telp' => [
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
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('hotel/edit/' . $this->request->getVar('id'))->withInput();
        }
      
        // validasi data sukses
        $this->HotelModel->save([
            'id' => $id,
            'nama_hotel' => $this->request->getVar('nama_hotel'),
            'bintang' => $this->request->getVar('bintang'),
            'alamat' => $this->request->getVar('alamat'),
            
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/hotel');
    }

    public function delete($id)
    {
        $hotel = $this->HotelModel->find($id);
        $this->HotelModel->delete($id);

        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('hotel');
    }
}
