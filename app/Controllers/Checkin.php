<?php
namespace App\Controllers;

use \App\Models\CheckinModel;
use \App\Models\TamuModel;
use \App\Models\KamarModel;

class Checkin extends BaseController
{
    protected $CheckinModel;
    protected $TamuModel;
    protected $KamarModel;
    

    public function __construct()
    {
        $this->CheckinModel =  new CheckinModel();
        $this->TamuModel =  new TamuModel();

        $this->KamarModel =  new KamarModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Checkin',
            'checkin' => $this->CheckinModel->getAllCheckin()
        ];

        return view('checkin/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Kamar',
            'checkin'=>$this->CheckinModel->getAllCheckin(),
            'tamu' => $this->TamuModel->getTamuById(),
            'kamar' => $this->KamarModel->getKamarById(),
            'validation' => \Config\Services::validation()
        ];

        return view('checkin/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'idtamu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'checkin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'duration' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('checkin/tambah')->withInput();
        }
        
        // validasi data sukses
        $this->CheckinModel->save([
            'idtamu' => $this->request->getVar('idtamu'),
            'idkamar' => $this->request->getVar('idkamar'),           
            'checkin' => $this->request->getVar('checkin'),
            'duration' => $this->request->getVar('duration'),
            'status' => $this->request->getVar('status'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/checkin');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Checkin',
            'validation' => \Config\Services::validation(),
            'checkin' => $this->CheckinModel->getCheckinById($id),
            'tamu' => $this->TamuModel->getTamuById(),
            'kamar' => $this->KamarModel->getKamarById(),
           
        ];
        // jika id data tidak ada di table
        if (empty($data['checkin'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id. ' tidak ditemukan');
        };

        return view('checkin/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'idtamu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'checkin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'duration' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('checkin/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        
        // validasi data sukses
        $this->CheckinModel->save([
            'id' => $id,
            'idtamu' => $this->request->getVar('idtamu'),
            'idkamar' => $this->request->getVar('idkamar'),
            'checkin' => $this->request->getVar('checkin'),
            
            'duration' => $this->request->getVar('duration'),
            'status' => $this->request->getVar('status'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/checkin');
    }

    public function delete($id)
    {
        $checkin = $this->CheckinModel->find($id);

       
        

        $this->CheckinModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('checkin');
    }
}