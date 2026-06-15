<?php
namespace App\Controllers;

use App\Models\GedungModel;
use App\Models\PeminjamanModel;

class Gedung extends BaseController {
    protected $GedungModel; 

    public function __construct() {
        $this->GedungModel = new GedungModel();
        $this->PeminjamanModel = new PeminjamanModel();
    }
    
    public function dashboard() {
        $data = [
            'total' => $this->PeminjamanModel->countAllPeminjaman(),
            'pending'   => $this->PeminjamanModel->countByStatus('pending'),
            'approved'  => $this->PeminjamanModel->countByStatus('approved'),
            'canceled'  => $this->PeminjamanModel->countByStatus('canceled'),
        ];

        return view('layout/header')
             . view('layout/sidebar')
             . view('layout/dashboard', $data);
    }

    public function index($gedung, $sub) {
        if ($gedung === 'gedut') {
            $judulSidebar = 'Gedung Utama';
            $menuSidebar = [
                ['nama' => 'Gedung A', 'url' => '/gedung/gedut/a'],
                ['nama' => 'Gedung B', 'url' => '/gedung/gedut/b'],
                ['nama' => 'Gedung D', 'url' => '/gedung/gedut/d'],
            ];

            $ruangan = $this->GedungModel->getKode(strtoupper($sub));

        } elseif ($gedung === 'gkb') {
            $judulSidebar = strtoupper($gedung);
            $menuSidebar = [];
            for ($i = 1; $i <= 5; $i++) {
                $menuSidebar[] = [
                    'nama' => "Lantai $i",
                    'url' => "/gedung/$gedung/$i"
                ];
            }

            $kode = 'I';
            $ruangan = $this->GedungModel->getKode($kode, $sub);

        } elseif ($gedung === 'gtil') {
            $judulSidebar = strtoupper($gedung);
            $menuSidebar = [];
            for ($i = 2; $i <= 5; $i++) {
                $menuSidebar[] = [
                    'nama' => "Lantai $i",
                    'url' => "/gedung/$gedung/$i"
                ];
            }

            $kode = 'J';
            $ruangan = $this->GedungModel->getKode($kode, $sub);

        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Gedung tidak ditemukan');
        }

        $data = [
            'judulSidebar' => $judulSidebar,
            'menuSidebar' => $menuSidebar,
            'ruangan' => $ruangan,
            'gedung' => strtoupper($gedung),
            'sub' => strtoupper($sub),
        ];

        return view('layout/header')
             . view('layout/side', $data)
             . view('gedung/gedung', $data);
    }

    private function getGedungURL($kode) {
        if (in_array($kode, ['A', 'B', 'D'])) return 'gedut';
        if ($kode === 'I') return 'gkb';
        if ($kode === 'J') return 'gtil';
        return null;
    }

    public function hapus($gedung, $sub, $id) {
        $this->GedungModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        // $gedung = $this->request->getVar('gedung');
        // $sub    = $this->request->getVar('sub');
        return redirect()->to("/gedung/$gedung/$sub");
    }

    public function tambah() {
        $data = [
            'title' => 'Form Tambah Data Ruangan',
            'validation' => \Config\Services::validation(),
            'gedungURL' => $this->request->getGet('gedung'),
            'subURL'    => $this->request->getGet('sub')
        ];
        return view('gedung/tambah', $data);
    }

    public function ubah($id) {
        $ruang = $this->GedungModel->find($id);

        $data = [
            'title' => 'Form Ubah Data Ruangan',
            'validation' => \Config\Services::validation(),
            'gedung' => $ruang
        ];

        return view('gedung/ubah', $data);
    }

    public function simpan() {
        if (!$this->validate([
            'nomor' => [
                'rules' => 'required|is_unique[gedung.nomor]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'Nomor ruangan ini sudah terdaftar'
                ]
            ],
        ])){
            return redirect()->to('/gedung/tambah')->withInput();
        }

        $nama   = $this->request->getVar('nama');
        $nomor  = $this->request->getVar('nomor');
        $kode   = strtoupper($this->request->getVar('kode'));
        $lantai = strtolower($this->request->getVar('lantai'));

        $this->GedungModel->save([
            'nama'   => $nama,
            'nomor'  => $nomor,
            'kode'   => $kode,
            'lantai' => $lantai,
        ]);

        $gedungUrl = $this->getGedungURL($kode);

        if (in_array($kode, ['A','B','D'])) {
            $subUrl = strtolower($kode);
        } else {
            $subUrl = $lantai;
        }

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to("/gedung/$gedungUrl/$subUrl");
    }

    public function update($id){
        if (!$this->validate([
            'nomor' => [
                'rules' => "required|is_unique[gedung.nomor,id,$id]",
                'errors' => ['required' => '{field} harus diisi']
            ]
        ])){
            return redirect()->to("/gedung/ubah/$id")->withInput();
        }

        $this->GedungModel->save([
            'id'     => $id,
            'nama'   => $this->request->getVar('nama'),
            'nomor'  => $this->request->getVar('nomor'),
            'kode'   => $this->request->getVar('kode'),
            'lantai' => $this->request->getVar('lantai'),
        ]);

        // session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        $gedung = $this->request->getVar('gedung');
        $sub    = $this->request->getVar('sub');

        return redirect()->to("/gedung/$gedung/$sub");
    }
}
