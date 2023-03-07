<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

class PelanggaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakeDate = $this->faker->dateTimeBetween('-1 years', 'now');
        return [
            'id_kategori' => rand(1, 5),
            'nisn' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nama' => $this->faker->name(),
            'kelas' => rand(10, 12).Str::random(1),
            'catatan' => $this->faker->sentence(),
            'pelapor' => $this->faker->name(),
            'created_at' => $fakeDate,
            'updated_at' => $fakeDate
        ];
    }
}
