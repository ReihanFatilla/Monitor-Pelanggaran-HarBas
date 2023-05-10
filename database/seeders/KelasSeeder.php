<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert(['nama' => 'XII RPL 1']);
        DB::table('kelas')->insert(['nama' => 'XI TKR 2']);
        DB::table('kelas')->insert(['nama' => 'X TKJ 3']);
    }
}
