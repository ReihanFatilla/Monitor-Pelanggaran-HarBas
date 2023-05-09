<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@admin',
        //     'level' => 'admin',
        //     'email_verified_at' => now(),
        //     'password' => 'admin123',
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
