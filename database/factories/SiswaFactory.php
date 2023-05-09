<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => User::factory()->create()->id,
            'nisn' => rand(1000000000, 9999999999),
            'kelas' => rand(10, 12).Arr::random(['A', 'B', 'C', 'D']),
        ];
    }
}
