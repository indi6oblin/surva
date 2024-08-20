<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responden extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'responden';
    protected $primaryKey = 'id_responden';


    protected $fillable = [
        'id_responden',
        'username',
        'password',
        'nama',
        'email',
        'poin',
        'jenis_kelamin',
        'umur'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
