<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'responden';
    protected $primaryKey = 'id_responden';


    protected $fillable = [
        'id_responden', 'username', 'password', 'nama', 'email', 'poin',
    ];


    public function hasil_survei()
    {
        return $this->hasMany(Hasil_survei::class, 'id_hasil');
    }

    public function survei_terjawab()
    {
        return $this->hasMany(Survei_terjawab::class, 'id_survei'); 
    }

}
