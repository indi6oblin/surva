<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei_terjawab extends Model
{
    use HasFactory;
    protected $table = 'survei_terjawab';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array(
        'id_responden', 'id_survei',
    );

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei');
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden');
    }
}
