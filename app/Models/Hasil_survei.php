<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_survei extends Model
{
    use HasFactory;
    protected $table = 'hasil_survei';
    protected $primaryKey = 'id_hasil';


    protected $fillable = array(

        'id_responden',
        'hasil_opsi',
        'hasil_essai',
        'id_survei'
    );

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden');
    }

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei');
    }
}
