<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Eko',
            'email' => 'eko@mynashir.com',
            'password' => bcrypt('nashir.eko'),
            'email_verified_at' => now(),
            'role' => 'keuangan'
        ]);
    }
}
