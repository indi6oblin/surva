<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrCreate(
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
            ],
            [
                'password' => Hash::make('admin1234'),
            ],
        );
        Admin::firstOrCreate(
            [
                'username' => 'absar',
                'email' => 'absar@gmail.com',
            ],
            [
                'password' => Hash::make('Absar12345'),
            ]
        );
        Admin::firstOrCreate(
            [
                'username' => 'aldo',
                'email' => 'Aldo@gmail.com',
            ],
            [
                'password' => Hash::make('Aldo12345'),
            ]
        );
    }
}
