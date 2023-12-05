<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $table = 'survei';
    protected $primaryKey = 'id_survei';


    protected $fillable = array(
        'id_survei', 'id_klien', 'judul', 'deskripsi', 'deskripsi_bayar', 'tgl_mulai', 'tgl_selesai', 'jumlah_responden', 'bukti', 'poin', 'nominal', 'status',
    );

    protected $enumStatus = ['Sortir','Belum Bayar','Sudah Bayar','Disetujui','Dibatalkan'];

    public function klien(){
        return $this->belongsTo(Klien::class, 'id_klien');
    }

    public function pertanyaan()
    {
    return $this->hasMany(Pertanyaan::class, 'id_survei'); 
    }
}
