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
            'id_user' => User::factory()->create(['level' => 'siswa'])->id,
            'id_kelas' => rand(1, 2),
            'nisn' => rand(1000000000, 9999999999),
        ];
    }
}
