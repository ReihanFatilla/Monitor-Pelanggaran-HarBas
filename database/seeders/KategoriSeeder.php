<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create single dummy data
        DB::table('Kategori')->insert([
            'nama_kategori' => 'Berkelahi',
        ]);
        DB::table('Kategori')->insert([
            'nama_kategori' => 'Pemalakan',
        ]);
        DB::table('Kategori')->insert([
            'nama_kategori' => 'bully',
        ]);
        DB::table('Kategori')->insert([
            'nama_kategori' => 'senjata tajam',
        ]);
        DB::table('Kategori')->insert([
            'nama_kategori' => 'Seragam',
        ]);
    }
}
