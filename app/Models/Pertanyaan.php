<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';


    protected $fillable = array(
        'id_pertanyaan', 'id_survei', 'pertanyaan', 'opsi_1', 'opsi_2', 'opsi_3', 'opsi_4', 'opsi_5',
    );

    public function survei(){
        return $this->belongsTo(Survei::class, 'id_survei');
    }

    public function hasil_survei()
    {
    return $this->hasMany(Hasil_survei::class, 'id_hasil'); 
    }
}
