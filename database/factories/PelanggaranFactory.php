<?php

namespace Database\Factories;

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
            'nisn' => $faker->unique()->numberBetween(1000000000, 9999999999),
            'nama' => $faker->name,
            'kelas' => rand(10, 12).Str::random(1),
            'catatan' => $faker->sentence,
            'pelapor' => $faker->name,
            'created_at' => $fakeDate,
            'updated_at' => $fakeDate
        ];
    }
}
