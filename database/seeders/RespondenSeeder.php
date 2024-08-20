<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\Responden;
use Illuminate\Database\Seeder;

class RespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Responden::firstOrCreate(
            ['username' => 'responden1',
             'nama' => 'Responden 1',
             'email' => 'responden@gmail.com',
             'poin' => null],
            ['password' => Hash::make('Responden12345')],
        );
        Responden::firstOrCreate(
            ['username' => 'Ririn Safitri',
             'nama' => 'ririn',
             'email' => 'ririn@gmail.com',
             'poin' => null],
            ['password' => Hash::make('Ririn12345')],
        );
    }
}
