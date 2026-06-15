<?php
namespace App\Controllers;

use App\Models\PeminjamanModel;
use CodeIgniter\Controller;

class Peminjaman extends Controller
{
    protected $PeminjamanModel;
    protected $validation;

    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        // Biar bisa akses /peminjaman langsung ke form
        return redirect()->to('/peminjaman/form');
    }

    //  Halaman form
    public function form()
    {
       $showPopup = session()->getFlashdata('showPopup');
        $success   = session()->getFlashdata('success');

return view('sipi4/peminjaman_form', [
    'validation' => $this->validation,
    'showPopup'  => session()->getFlashdata('showPopup'),
    'success'    => session()->getFlashdata('success'),
    'id_peminjaman' => session()->getFlashdata('id_peminjaman')
]);
    }

    // Simpan data
    public function simpan()
    {
        $rules = [
            'nama_ruangan'        => 'required',
            'nomor_ruangan'       => 'required',
            'tanggal'             => 'required',
            'jam'                 => 'required',
            'nama_kegiatan'       => 'required',
            'penanggung_jawab'    => 'required',
            'nama_organisasi'     => 'required',
            'no_wa'               => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('sipi4/peminjaman_form', [
                'validation' => $this->validator
            ]);
        }

        $data = [
            'nama_ruangan' => $this->request->getPost('nama_ruangan'),
            'nomor_ruangan' => $this->request->getPost('nomor_ruangan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'penanggung_jawab' => $this->request->getPost('penanggung_jawab'),
            'nama_organisasi' => $this->request->getPost('nama_organisasi'),
            'no_wa' => $this->request->getPost('no_wa'),
            'status' => 'pending'
        ];
        $this->PeminjamanModel->insert($data);
        $id_peminjaman = $this->PeminjamanModel->insertID();

    session()->setFlashdata('showPopup', true);
    session()->setFlashdata('success', 'Data berhasil diajukan!');
    session()->setFlashdata('id_peminjaman', $id_peminjaman);

    return redirect()->to('/peminjaman/success/' . $id_peminjaman);
}

    //  Popup upload
    public function success($id)
    {
        $tanggalHariIni = date('d-m-Y');
        $data = [
            'id_peminjaman' => $id,
            'tanggal' => $tanggalHariIni
        ];
        return view('sipi4/upload_page', $data);
    }

    public function uploadPage()
    {
        $data = [
            'tanggal' => date('d-m-Y'),
            'id_peminjaman' => null
        ];
        return view('sipi4/upload_page', $data);
    }

      //  Upload berkas
   public function uploadBerkas($id_peminjaman)
{
    $file = $this->request->getFile('scan_berkas');

    if ($file->isValid() && !$file->hasMoved()) {

        // Validasi ekstensi
        $allowed = ['jpg','jpeg','png','gif','pdf'];
        $ext = strtolower($file->getClientExtension());

        if (!in_array($ext, $allowed)) {
            return redirect()->back()->with('error', 'Format file tidak didukung!');
        }

        $filename = $file->getRandomName();
        $file->move('uploads/', $filename);

        $this->PeminjamanModel->update($id_peminjaman, [
            'scan_berkas' => $filename
        ]);

        return redirect()->to('/jadwal') ->with('success', 'File berhasil diupload!');
    }

    return redirect()->back()->with('error', 'Gagal upload file.');
    }

    public function uploadTanpaId()
    {
    return redirect()->back()->with('error', 'ID peminjaman tidak ditemukan. Silakan ajukan peminjaman dulu.');
    }

 public function jadwal()
    {
        $cariInput = $this->request->getVar('tanggal');
        $tanggalDB = null;

        if ($cariInput) {
            $bulan = [
                'januari' => 'january', 'februari' => 'february', 'maret' => 'march',
                'april' => 'april', 'mei' => 'may', 'juni' => 'june',
                'juli' => 'july', 'agustus' => 'august', 'september' => 'september',
                'oktober' => 'october', 'november' => 'november', 'desember' => 'december'
            ];

            $formatInggris = str_replace(array_keys($bulan), array_values($bulan), strtolower($cariInput));
            $tanggalDB = date('Y-m-d', strtotime($formatInggris));

            if ($tanggalDB === '1970-01-01') $tanggalDB = null;
        }

        $data = [
            'peminjaman' => $this->PeminjamanModel->getAll($tanggalDB),
            'pager' => $this->PeminjamanModel->pager(),
            'cari' => $cariInput
        ];

        return view('sipi4/jadwal', $data);
    }

    public function detail($id_peminjaman)
    {
        $peminjaman = $this->PeminjamanModel->detail($id_peminjaman);

        if (!$peminjaman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                "Jadwal dengan ID $id_peminjaman tidak ditemukan."
            );
        }

        return view('sipi4/detailjadwal', [
            'peminjaman' => $peminjaman ]);
    }

    public function updateStatus($id_peminjaman)
    {
        $status = $this->request->getPost('status');

        $this->PeminjamanModel->update($id_peminjaman, [
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah');
    }
}