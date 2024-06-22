<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class anggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                'nama' => 'John Doe',
                'gender' => 'Laki-laki',
                'npm' => '1234567890'
            ],
            [
                'nama' => 'Jane Doe',
                'gender' => 'Perempuan',
                'npm' => '0987654321'
            ],
            [
                'nama' => 'Michael Johnson',
                'gender' => 'Laki-laki',
                'npm' => '2345678901'
            ],
            [
                'nama' => 'Emily Smith',
                'gender' => 'Perempuan',
                'npm' => '3456789012'
            ],
            [
                'nama' => 'David Brown',
                'gender' => 'Laki-laki',
                'npm' => '4567890123'
            ],
            [
                'nama' => 'Jessica Taylor',
                'gender' => 'Perempuan',
                'npm' => '5678901234'
            ],
            [
                'nama' => 'Matthew Wilson',
                'gender' => 'Laki-laki',
                'npm' => '6789012345'
            ],
            [
                'nama' => 'Olivia Garcia',
                'gender' => 'Perempuan',
                'npm' => '7890123456'
            ],
            [
                'nama' => 'Daniel Martinez',
                'gender' => 'Laki-laki',
                'npm' => '8901234567'
            ],
            [
                'nama' => 'Sophia Hernandez',
                'gender' => 'Perempuan',
                'npm' => '9012345678'
            ],
        ]);
    }
}
