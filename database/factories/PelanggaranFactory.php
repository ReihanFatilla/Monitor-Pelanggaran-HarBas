<?php

namespace Database\Factories;

use App\Models\Siswa;
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

        $fakeDate = $faker->dateTimeBetween('-2 months', '+2 months');

        return [
            'id_kategori' => rand(1, 5),
            'id_siswa' => Siswa::all()->random()->id,
            'pelapor' => $faker->name,
            'catatan' => $faker->sentence,
            'created_at' => $fakeDate,
            'updated_at' => $fakeDate
        ];
    }
}
