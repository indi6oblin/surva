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
            ['password' => Hash::make('Klien12345')],
        );
    }
}
