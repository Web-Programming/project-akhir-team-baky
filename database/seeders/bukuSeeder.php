<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class bukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'judul_buku' => 'Pemrograman Web',
                'sampul_buku'=> 'buku1.jpeg',
                'kategori_id' => 1,
                'penerbit' => 'Gramedia Pustaka Utama',
                'pengarang' => 'John Doe',
                'stok' => 20
            ],
            [
                'judul_buku' => 'Database Systems',
                'sampul_buku'=> 'buku2.jpeg',
                'kategori_id' => 2,
                'penerbit' => 'Erlangga',
                'pengarang' => 'Jane Smith',
                'stok' => 15
            ],
            [
                'judul_buku' => 'Algoritma Pemrograman',
                'sampul_buku'=> 'buku3.jpeg',
                'kategori_id' => 1,
                'penerbit' => 'Andi Offset',
                'pengarang' => 'Michael Johnson',
                'stok' => 10
            ],
            [
                'judul_buku' => 'Mobile App Development',
                'sampul_buku'=> 'buku4.jpeg',
                'kategori_id' => 3,
                'penerbit' => 'Bentang Pustaka',
                'pengarang' => 'Emily Brown',
                'stok' => 25
            ],
            [
                'judul_buku' => 'Artificial Intelligence',
                'sampul_buku'=> 'buku5.jpeg',
                'kategori_id' => 2,
                'penerbit' => 'Penerbit ITB',
                'pengarang' => 'David Wilson',
                'stok' => 30
            ],
            [
                'judul_buku' => 'Networking Essentials',
                'sampul_buku'=> 'buku6.jpeg',
                'kategori_id' => 3,
                'penerbit' => 'Penerbit Universitas Indonesia',
                'pengarang' => 'Jessica Taylor',
                'stok' => 18
            ],
            [
                'judul_buku' => 'Machine Learning Techniques',
                'sampul_buku'=> 'buku7.jpeg',
                'kategori_id' => 2,
                'penerbit' => 'Penerbit Universitas Gadjah Mada',
                'pengarang' => 'Matthew Garcia',
                'stok' => 22
            ],
            [
                'judul_buku' => 'Cybersecurity Fundamentals',
                'sampul_buku'=> 'buku8.jpeg',
                'kategori_id' => 3,
                'penerbit' => 'Penerbit Institut Teknologi Sepuluh Nopember',
                'pengarang' => 'Olivia Martinez',
                'stok' => 12
            ],
            [
                'judul_buku' => 'Data Structures',
                'sampul_buku'=> 'buku9.jpeg',
                'kategori_id' => 1,
                'penerbit' => 'Penerbit Universitas Diponegoro',
                'pengarang' => 'Daniel Hernandez',
                'stok' => 17
            ],
            [
                'judul_buku' => 'Operating Systems Principles',
                'sampul_buku'=> 'buku10.jpeg',
                'kategori_id' => 2,
                'penerbit' => 'Penerbit Universitas Brawijaya',
                'pengarang' => 'Sophia Adams',
                'stok' => 14
            ],
        ]);
    }
}
