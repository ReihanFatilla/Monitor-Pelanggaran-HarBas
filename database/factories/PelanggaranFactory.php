<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;
use Faker\Factory as Faker;

class PelanggaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = Faker::create('id_ID');

        $fakeDate = $faker->dateTimeBetween('-3 weeks', '+2 weeks');

        return [
            'id_kategori' => Kategori::all()->random()->id,
            'id_siswa' => Siswa::all()->random()->id,
            'id_user_pelapor' => User::where('level', 'guru')->get()->random()->id,
            'catatan' => $faker->sentence,
            'created_at' => $fakeDate,
            'updated_at' => $fakeDate
        ];
    }
}
