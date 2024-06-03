<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Klien;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Klien::firstOrCreate(
            ['nama' => 'klien1',
            'username' => 'klien',
            'email' => 'klien@example.com'],
            ['password' => Hash::make('klien1234')],
        );
        Klien::firstOrCreate(
            ['nama' => 'tyas wening',
            'username' => 'tyas',
            'email' => 'tyas@gmail.com'],
            ['password' => Hash::make('tyas12345')],
        );
    }
}
