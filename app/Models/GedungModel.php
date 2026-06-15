<?php
namespace App\Models;

use CodeIgniter\Model;

class GedungModel extends Model{
    protected $table = 'gedung';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nomor', 'kode', 'lantai'];

    public function getKode($kode, $lantai = null){
    $builder = $this->where('kode', $kode);

    if ($lantai !== null) {
        $builder = $builder->where('lantai', $lantai);
    }

    return $builder
        ->orderBy("kode")
        ->orderBy("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(nomor, '.', 2), '.', -1) AS UNSIGNED)")
        ->orderBy("CAST(SUBSTRING_INDEX(nomor, '.', -1) AS UNSIGNED)")
        ->findAll();
    }
}
?>