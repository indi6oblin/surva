<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'paket_pertanyaan';
    protected $primaryKey = 'id_pertanyaan';

    protected $fillable = [
        'id_survei',
        'pertanyaan',
        'opsi_1',
        'opsi_2',
        'opsi_3',
        'opsi_4',
        'opsi_5',
        'essai',
        'paket_pertanyaan',
    ];

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei');
    }
}
