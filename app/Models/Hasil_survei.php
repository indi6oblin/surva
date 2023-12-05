<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_survei extends Model
{
    use HasFactory;
    protected $table = 'hasil_survei';
    protected $primaryKey = 'id_hasil';


    protected $fllable = array(
        'id_hasil', 'id_pertanyaan', 'id_responden', 'hasil_opsi',
    );

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function responden(){
        return $this->belongsTo(Responden::class, 'id_responden');
    }
}
