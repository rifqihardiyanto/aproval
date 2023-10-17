<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'nama_member' => 'ari',
            'no_hp' => '081245678978',
            'email' => 'ad@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
