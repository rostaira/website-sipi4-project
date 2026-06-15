<?php
namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = [
        'nama_ruangan',
        'nomor_ruangan',
        'tanggal',
        'jam',
        'nama_kegiatan',
        'penanggung_jawab',
        'nama_organisasi',
        'no_wa',
        'scan_berkas',
        'status'
    ];
    public function getAll($cari = null)
    {
        $builder = $this->orderBy('tanggal', 'DESC');

        if ($cari) {
            $builder = $this->where('tanggal', $cari);
        }

        return $builder->paginate(5, 'jadwal');
    }

    public function detail($id_peminjaman)
    {
        return $this->where('id_peminjaman', $id_peminjaman)->first();
    }

    public function pager()
    {
        return $this->pager;
    }

    public function countByStatus($status)
    {
        return $this->where('status', $status)
                    ->countAllResults(true); // RESET builder
    }

    public function countAllPeminjaman()
    {
        return $this->countAllResults(true); // TOTAL SEMUA
    }
}